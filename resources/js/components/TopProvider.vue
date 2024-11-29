<template v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'enable_popular_provider') == 'on'">
      <Swiper  v-if="providerDetails.length > 0"
      :modules="modules"
      :slides-per-view="auto"
      :space-between="30"
      :pagination="{ clickable: true  }"
      :autoplay="{ delay: 3000, disableOnInteraction: false }"
      >
      <SwiperSlide v-for="provider in providerDetails" :key="provider.id">
        <div class=" mt-5 justify-content-center service-slide-items-4">
        <div class="col">
        <div class="iq-banner-img position-relative">
            <img :src="provider.profile_image" :alt="provider.display_name" class="img-fluid border-radius-12 position-relative">
            <div class="position-relative d-flex justify-content-center card-box">
              <div class="card-description d-inline-block text-center rounded-3">
                <div class="cart-content">
                  <h6 class="heading text-capitalize fw-500">{{ provider.display_name }}</h6>
                  <span class="desc text-white d-flex align-items-center justify-content-center">
                    <rating-component :readonly="true" :showrating="false" :ratingvalue="provider.providers_service_rating" />
                    <span style="margin-left: 5px;">({{ provider.providers_service_rating }})</span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          </div>
          </div>
      </SwiperSlide>

        <!-- <div v-for="provider in providerDetails" :key="provider.id" class="swiper-slide">
          <div class="iq-banner-img position-relative">
            <img :src="provider.profile_image" :alt="provider.display_name" class="img-fluid border-radius-12 position-relative">
            <div class="position-relative d-flex justify-content-center card-box">
              <div class="card-description d-inline-block text-center rounded-3">
                <div class="cart-content">
                  <h6 class="heading text-capitalize fw-500">{{ provider.display_name }}</h6>
                  <span class="desc text-white">{{ provider.providers_service_rating }} {{ $t('landingpage.services_booked') }}</span>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </Swiper>
    
    
</template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import { PROVIDER_API } from '../data/api';
  import {useSection} from '../store/index'
  import { Swiper, SwiperSlide } from 'swiper/vue';
  const store = useSection()
  
  const providers = ref([]);
  const providerDetails = ref([]);
  const setting = ref([]);
  console.log(setting.value);
  const fetchTopProviders = async () => {
    try {
      const response = await fetch(PROVIDER_API({ user_type: 'provider', status: 1 ,per_page: 'all'}));
      const data = await response.json();
      if (data && Array.isArray(data.data)) {
        const TotalProviders = data.data.filter(user => user.providers_service_rating !== undefined);
        const sortedUsers = TotalProviders.sort((a, b) => b.providers_service_rating - a.providers_service_rating);
        //const topUsers = sortedUsers.slice(0, 4);
        providers.value = sortedUsers;
        console.log(providers.value);
      } else {
        console.error('Invalid data structure or missing array of providers.');
      }
    } catch (error) {
      console.error('Error fetching or processing data:', error);
    }
  };

  //get provider details
  const getProviderDetails = async () => {
  try {
    await store.get_landing_page_setting_list({ per_page: 10, page: 1 });
    const settings = store.landing_page_setting_list_data.data.find(setting => setting.key === 'section_1' && setting.status === 1);
    setting.value = settings.value;
    if (settings) {
      const providerIds = getJsonValue(settings.value, 'provider_id');
      await fetchTopProviders();
      const allProviders = providers.value;
      const selectedProviders = allProviders.filter(provider => providerIds.includes(String(provider.id)));
      providers.value = selectedProviders.map(provider => ({
        id: provider.id,
        display_name: provider.display_name,
        providers_service_rating: provider.providers_service_rating,
        profile_image:provider.profile_image,
      }));
      providerDetails.value = providers.value;
    }
  } catch (error) {
    console.error('Error fetching category details:', error);
  }
};
  
  onMounted(() => {
    fetchTopProviders();
    getProviderDetails();
  });

  function getJsonValue(jsonString, key) {
  try {
    const parsedJson = JSON.parse(jsonString);
    return parsedJson[key];
  } catch (error) {
    console.error('Error parsing JSON:', error);
    return null;
  }
}
  </script>
  