<template>
    <section ref="servicesection">
        <h1>Hello World</h1>
    <Swiper  v-if="service_data.length > 0"
    :modules="modules"
    :slides-per-view="5"
    :space-between="30"
    :pagination="{ clickable: true, dynamicBullets: true  }"
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
        @slide-change-transition-start="changeSlide"
    >
    <SwiperSlide v-for="data in service_data" :key="data.id + 'section-slider'" >
    <div class=" mt-5 justify-content-center service-slide-items-4" >
        <div class="col">
            <ServiceCard :user_id="user_id" :service_id="data.id" :provider_id="data.provider_id" :image="data.attchments[0]" :userImage="data.provider_image" :userName="data.provider_name" :reviewNo="data.total_rating" :reviewCount="data.total_review" :title="data.name" :price="data.price" :duration="data.duration" :favourite="isFavourite(data.id)" />
        </div>
    </div>
</SwiperSlide>
</Swiper>

<Swiper  v-else
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
</section>
</template>

<script setup>

import ServiceCard from '../components/ServiceCard.vue';


import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
import ServiceShimmer  from '../shimmer/ServiceShimmer.vue';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

const modules = [Navigation, Pagination, Scrollbar, A11y];
const props = defineProps(['user_id','favourite']);


// Export component options
import { computed} from 'vue';
import {useSection} from '../store/index'
import {useObserveSection} from '../hooks/Observer'

const store = useSection()
const service_data = computed(() => store.service_list_data)

const [servicesection] = useObserveSection(() => store.get_service_list({per_page: 8, category_id: null}))

const isFavourite = (serviceId) => {
    return props.favourite !== null ? props.favourite.some(item => item.service_id === serviceId) : false;
};
const changeSlide = function() {
    var currentElement = jQuery(this.el);
    console.log(currentElement)
    var lastBullet = currentElement.find(".swiper-pagination-bullet:last");
    if (this.slides.length - (this.loopedSlides + 1) === this.activeIndex) {
        lastBullet.addClass("js_prefix-disable-bullate");
    } else {
        lastBullet.removeClass("js_prefix-disable-bullate");
    }
    if (jQuery(window).width() > 1199) {
        var innerTranslate = -(160 + swSpace[this.currentBreakpoint]) * (this.activeIndex);
        currentElement.find(".swiper-wrapper").css({
        "transform": "translate3d(" + innerTranslate + "px, 0, 0)"
        });
        currentElement.find('.swiper-slide:not(.swiper-slide-active)').css({
        width: "160px"
        });
        currentElement.find('.swiper-slide.swiper-slide-active').css({
        width: "476px"
        });
    }
}
</script>
