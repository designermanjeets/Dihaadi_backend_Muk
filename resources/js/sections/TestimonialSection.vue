<template>
    <section ref="testimonialsection">
    <Swiper class="swiper-container" v-if="testimonial_data.length > 0"
    :modules="modules"
    :slides-per-view="3"
    :space-between="30"
    :pagination="{ clickable: true  }"
    :loop="true"
    :autoplay="{ delay: 3000, disableOnInteraction: false }"
    :breakpoints="{
          320: { slidesPerView: 1 },
          550: { slidesPerView: 2 },
          991: { slidesPerView: 3 },
          1400: { slidesPerView: 3 },
          1500: { slidesPerView: 3 },
          1920: { slidesPerView: 4 },
          2040: { slidesPerView: 4 },
          2440: { slidesPerView: 4 }
        }"
    >
    <SwiperSlide v-for="data in testimonial_data" :key="data">
        <TestimonialCard :is-light-bg="data.isLightBg" :is-rating="data.isRating" :rating="data.rating" :title="data.service_name" :content="data.review" :quote-image="data.quoteImage" :user-image="data.profile_image" :user-name="data.customer_name" :user-meta="data.created_at"/>

    </SwiperSlide>
</Swiper>

    <!-- <Swiper v-else  class="swiper-container"
    :modules="modules"
    :slides-per-view="3"
    :space-between="30"
    :pagination="{ clickable: true  }"
    :loop="true"
    :autoplay="{ delay: 3000, disableOnInteraction: false }"
    :breakpoints="{
          320: { slidesPerView: 1 },
          550: { slidesPerView: 2 },
          991: { slidesPerView: 3 },
          1400: { slidesPerView: 3 },
          1500: { slidesPerView: 3 },
          1920: { slidesPerView: 4 },
          2040: { slidesPerView: 4 },
          2440: { slidesPerView: 4 }
        }"
    >
    <SwiperSlide  v-for="item in 8" :key="item">
        <div class=" mt-5 justify-content-center service-slide-items-4">
        <div  class="col">
            <ClientsShimmer class="col-12" ></ClientsShimmer>
        </div>
        </div>
    </SwiperSlide>
</Swiper> -->
<div v-if="testimonial_data.length==0 && loading==0" class="row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center mt-5 " >
    <span> Data Not Available </span>
</div>

</section>

</template>


<script setup>
import TestimonialCard from "../components/TestimonialCard.vue"
import ClientsShimmer  from '../shimmer/ClientsShimmer.vue'

import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

const modules = [Navigation, Pagination, Scrollbar, A11y];

import {ref, computed} from 'vue';
import {useSection} from '../store/index'
import {useObserveSection} from '../hooks/Observer'

const loading = ref(1);

const store = useSection()
const testimonial_data = computed(() => store.testimonial_list_data)
const [testimonialsection] = useObserveSection(async () => {
    
    try {
        await store.get_testimonial_list();
    } catch (error) {
        console.error('Error fetching testimonial list:', error);
    } finally {
        loading.value = 0;
    }
});
</script>


