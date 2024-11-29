<template>
    <section ref="servicesection">
    <Swiper class="swiper-container"  v-if="serviceDetails.length > 0"
    :modules="modules"
    :slides-per-view="5"
    :space-between="30"
    :pagination="{ clickable: true  }"
    :loop="false"
    :autoplay="{ delay: 3000, disableOnInteraction: false }"
    :breakpoints="{
          320: { slidesPerView: 1 },
          550: { slidesPerView: 2 },
          991: { slidesPerView: 3 },
          1400: { slidesPerView: 3 },
          1500: { slidesPerView: 4 },
          1920: { slidesPerView: 4 },
          2040: { slidesPerView: 4 },
          2440: { slidesPerView: 4 }
        }"
      @slide-change-transition-start="changeSlide"
    >
    
    <SwiperSlide v-for="service in serviceDetails" :key="service.id">
    <div class=" mt-5 justify-content-center  service-slide-items-4">
        <div class="col">
            <ServiceCard 
              :user_id="user_id" 
              :service_id="service.id"  
              :provider_id="service.provider_id" 
              :title="service.name" 
              :image="service.attchments[0]" 
              :userName="service.provider_name" 
              :userImage="service.provider_image" 
              :reviewNo="service.total_rating" 
              :reviewCount="service.total_review"
              :price="service.price" 
              :duration="service.duration"
              :favourite="isFavourite(service.id)"
              :visit_type="service.visit_type"
              />
        </div>
    </div>
</SwiperSlide>
</Swiper>


<Swiper class="swiper-container" v-if="IS_LOADER ==true && serviceDetails.length == 0"
    :modules="modules"
    :slides-per-view="4"
    :space-between="30"
    :pagination="{ clickable: true  }"
    :loop="true"
    :autoplay="{ delay: 3000, disableOnInteraction: false }"
    :breakpoints="{
          320: { slidesPerView: 1 },
          550: { slidesPerView: 2 },
          991: { slidesPerView: 3 },
          1400: { slidesPerView: 3 },
          1500: { slidesPerView: 4 },
          1920: { slidesPerView: 4 },
          2040: { slidesPerView: 4 },
          2440: { slidesPerView: 4 }
        }"
    >
    <SwiperSlide v-for="item in 4" :key="item" >
    <div class=" mt-5 justify-content-center service-slide-items-4">
        <div  class="col">
            <ServiceShimmer ></ServiceShimmer>
        </div>
    </div>
</SwiperSlide>
</Swiper>
<span v-if="IS_LOADER ==false && serviceDetails.length == 0"> Data Not Available </span>
</section>
</template>

<script setup>

import ServiceCard from '../components/ServiceCard.vue';


import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
import ServiceShimmer  from '../shimmer/ServiceShimmer.vue';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

const modules = [Navigation, Pagination, Scrollbar, A11y];
const props = defineProps(['user_id','favourite','type']);

const IS_LOADER=ref(false)

// Export component options
import { computed} from 'vue';
import { onMounted,ref} from 'vue';
import {useSection} from '../store/index'
import {useObserveSection} from '../hooks/Observer'
import { SERVICE_API,PROVIDER_API} from '../data/api'; 

const store = useSection()
const service_data = computed(() => store.service_list_data)

const services = ref([]);
const serviceDetails = ref([]);
const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
const [servicesection] = useObserveSection(() => store.get_service_list({per_page: 8, category_id: null}))

const fetchService = async () => {
      try {
         IS_LOADER.value=true
         const response = await fetch(SERVICE_API({ per_page: 'all', status: 1 }));
         const data = await response.json();
         if (data && Array.isArray(data.data)) {
         const TotalServices = data.data;
         const topServices = TotalServices.slice(0, 10);
         services.value = TotalServices;
         } else {
         console.error('Invalid data structure or missing array of providers.');
         }
      } catch (error) {
         console.error('Error fetching or processing data:', error);
      }
   };

   const fetchProviders = async () => {
    try {
      const response = await fetch(PROVIDER_API({ user_type: 'provider', status: 1, per_page: 'all' }));
      const data = await response.json();

      if (data && Array.isArray(data.data)) {
        return data.data; 
      } else {
        console.error('Invalid data structure or missing array of providers.');
        return [];
      }
    } catch (error) {
      console.error('Error fetching or processing data:', error);
      return [];
    }
  };

  const defaultEarningType = async () => {
    try {
        const response = await fetch(`${baseUrl}/api/configurations`, {
            method: 'POST', 
            headers: {
                'Content-Type': 'application/json' 
            },
            body: JSON.stringify({}) 
        });
        
        const data = await response.json();

        console.log( data );
        const earningType = data && data.earning_type ? data.earning_type : 'commission';
        return earningType;
    } catch (error) {
        console.error('Error fetching or processing AppSetting:', error);
        return 'commission'; 
    }
};

   const getCategoryDetails = async () => {
  try {
    await store.get_landing_page_setting_list({ per_page: 10, page: 1 });

    const settings = store.landing_page_setting_list_data.data.find(
      setting => 
        (props.type === 'ac' && setting.key === 'section_3') ||
        (props.type === 'cleaning' && setting.key === 'section_4') ||
        (props.type === 'recently_view' && setting.key === 'section_8') && 
        setting.status === 1
    );

    if (settings) {
      let serviceIds;

      if (props.type === 'recently_view') {
        const recentlyViewedIds = await fetchRecentlyViewed();
        serviceIds = recentlyViewedIds.map(item => String(item.id));
      } else {
        await fetchService();
        const allService = services.value;
        serviceIds = getJsonValue(settings.value, 'service_id');
      }

      const allService = services.value;
      const selectedServices = allService.filter(service => serviceIds.includes(String(service.id)));
      const earningtype = await defaultEarningType();
      const providers = await fetchProviders();
      const uniqueServiceIds = new Set();
      if (earningtype === 'subscription') {
        const filteredServices = selectedServices.filter(service => {
          if (providers.length > 0) {
            const provider = providers.find(provider => service.provider_id === provider.id);
            if (provider && provider.id && provider.status === 1 && provider.is_subscribe === 1) {

              if (!uniqueServiceIds.has(service.id)) {
                uniqueServiceIds.add(service.id);
                return true;
              }
            }
          }
          return false;
        });

        serviceDetails.value = filteredServices;
      } else{
        const uniqueServices = selectedServices.filter(service => {
          if (!uniqueServiceIds.has(service.id)) {
            uniqueServiceIds.add(service.id);
            return true;
          }
          return false;
        });
        serviceDetails.value = uniqueServices;
      }
      IS_LOADER.value=false

    }
  } catch (error) {
    console.error('Error fetching service details:', error);
  }
};

const fetchRecentlyViewed = async () => {
  try {
    const response = await fetch(`${baseUrl}/api/get-recently-viewed`);
    const data = await response.json();

    if (data && Array.isArray(data)) {
      return data; 
    } else {
      console.error('Invalid data structure or missing array of recently viewed service IDs.');
      return [];
    }
  } catch (error) {
    console.error('Error fetching or processing recently viewed services:', error);
    return []; 
  }
};

function getJsonValue(jsonString, key) {
  try {
    const parsedJson = JSON.parse(jsonString);
    return parsedJson[key];
  } catch (error) {
    console.error('Error parsing JSON:', error);
    return null;
  }
}

const isFavourite = (serviceId) => {
    return props.favourite !== null ? props.favourite.some(item => item.service_id === serviceId) : false;
};


onMounted(async () => {
  await fetchService();
  await getCategoryDetails();
});

function changeSlide (elem) {
  // console.log(this, elem)
    // var currentElement = jQuery(elem.el);
    // var lastBullet = currentElement.find(".swiper-pagination-bullet:last");
    // console.log(lastBullet)
    // if (elem.slides.length - (elem.loopedSlides + 1) === elem.activeIndex) {
    //     lastBullet.addClass("js_prefix-disable-bullate");
    // } else {
    //     lastBullet.removeClass("js_prefix-disable-bullate");
    // }
    // if (jQuery(window).width() > 1199) {
    //     var innerTranslate = -(160 + swSpace[this.currentBreakpoint]) * (this.activeIndex);
    //     currentElement.find(".swiper-wrapper").css({
    //     "transform": "translate3d(" + innerTranslate + "px, 0, 0)"
    //     });
    //     currentElement.find('.swiper-slide:not(.swiper-slide-active)').css({
    //     width: "160px"
    //     });
    //     currentElement.find('.swiper-slide.swiper-slide-active').css({
    //     width: "476px"
    //     });
    // }
}
</script>
