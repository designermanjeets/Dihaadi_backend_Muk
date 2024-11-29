<template>
  <Swiper
    :modules="modules"
    :slides-per-view="3"
    :space-between="30"
    :loop="false"
    :autoplay="{ delay: 3000, disableOnInteraction: false }"
    :breakpoints="{
      320: { slidesPerView: 1 },
      550: { slidesPerView: 2 },
      991: { slidesPerView: 2 },
      1400: { slidesPerView: 3 },
      1500: { slidesPerView: 3 },
      1920: { slidesPerView: 3 },
      2040: { slidesPerView: 3 },
      2440: { slidesPerView: 3 }
    }"
  >
    <SwiperSlide v-for="data in service" :key="data">
      <div class="mt-5 justify-content-center service-slide-items-4">
        <div class="col">
          <ServiceCard
            :user_id="user_id"
            :service_id="data.id"
            :provider_id="data.provider_id"
            :image="data.attchments[0]"
            :userImage="data.provider_image"
            :userName="data.provider_name"
            :reviewNo="data.total_rating"
            :reviewCount="data.total_review"
            :title="data.name"
            :price="data.price"
            :duration="data.duration"
            :favourite="isFavourite(data.id)"
            :visit_type="data.visit_type"
          />
        </div>
      </div>
    </SwiperSlide>
  </Swiper>
</template>

<script setup>
import { defineProps } from 'vue'
import ServiceCard from '../components/ServiceCard.vue'
import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue'
const modules = [Navigation, Pagination, Scrollbar, A11y]
const props = defineProps(['service','user_id','favourite'])

const isFavourite = (serviceId) => {
    return props.favourite !== null ? props.favourite.some(item => item.service_id === serviceId) : false;
};

</script>
