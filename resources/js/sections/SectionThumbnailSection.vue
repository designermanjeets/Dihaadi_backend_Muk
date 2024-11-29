<template>
    <div class="tab-slider">
        <Swiper class="swiper-content position-relative overflow-hidden" :modules="[Controller]" direction="horizontal" :loop-slide="5" :mousewheel="true"
            :grabCursor="true" @swiper="setThumbSwiper" :controller="{ control: mainSwiper }">
            <SwiperSlide v-for="(data, index) in props.attachments" :key="index">
                <div class="">
                    <img :src="data" alt="" loading="lazy" class="img-fluid object-cover rounded-3"/>
                </div>
            </SwiperSlide>
        </Swiper>
    </div>
    <div class="tab-slider">
    <Swiper class="swiper-thumb overflow-hidden mt-3" :modules="[Controller]" direction="horizontal" :slide-to-clicked-slide="true" :spaceBetween="3 "  @swiper="setMainSwiper"
        :controller="{ control: thumbSwiper }">
        <SwiperSlide v-for="data in props.attachments" :key="data">
            <div class="thumb-wrapper p-1 rounded-3">
                <img :src="data" alt="" loading="lazy" class="img-fluid object-cover rounded-3"  />
            </div>
        </SwiperSlide>
    </Swiper>
</div>
</template>
<script setup>
import { ref } from 'vue';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Controller } from 'swiper';

const props = defineProps(['attachments']);

// Export component options
const mainSwiper = ref(null)
const thumbSwiper = ref(null)
const setMainSwiper = (swiper) => {
    mainSwiper.value = swiper
}
const setThumbSwiper = (swiper) => {
    thumbSwiper.value = swiper
}
</script>
