<template>
    <div v-for="data in serviceData" :key="data">
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
              :visit_type="data.visit_type"
            />
        </div>
          </div>
        </div>
  </template>
  
  <script setup>
  import { defineProps } from 'vue'
  import ServiceCard from '../components/ServiceCard.vue'
  import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
  // Import Swiper Vue.js components
  import { Swiper, SwiperSlide } from 'swiper/vue'
  const modules = [Navigation, Pagination, Scrollbar, A11y]
  const props = defineProps(['service','user_id','favourite'])

  const serviceData = props.service;
  
  </script>
  