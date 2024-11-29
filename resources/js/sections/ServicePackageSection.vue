<template>
  <Swiper
    :modules="modules"
    :slides-per-view="2"
    :space-between="30"
    :loop="false"
    :autoplay="{ delay: 3000, disableOnInteraction: false }"
    :breakpoints="{
      320: { slidesPerView: 1 },
      767: { slidesPerView: 2 },
      992: { slidesPerView: 2 },
      1026: { slidesPerView: 2 }
    }"
  >
    <SwiperSlide v-for="data in servicepackage" :key="data">
      <ServicePackageCard
        :serviceid="service_id"
        :packageid="data.id"
        :auth_user_id="auth_user_id"
        :servicetitle="data.name"
        :serviceprice="data.price"
        :servicetime="data.servicetime"
        :servicedesc="data.description"
        :serviceimage="data.attchments[0]"
        :servicerating="data.servicerating"
        :listitem1="data.listitem1"
        :listitem2="data.listitem2"
        :buttonurl="data.buttonurl"
        :buttontext="'Book Now'"
      />
    </SwiperSlide>
  </Swiper>
</template>

<script setup>
import { defineProps } from 'vue';
import ServicePackageCard from '../components/ServicePackageCard.vue';
import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
import { Swiper, SwiperSlide } from 'swiper/vue'

const modules = [Navigation, Pagination, Scrollbar, A11y]
const props = defineProps(['servicepackage','service_id','auth_user_id'])
</script>
