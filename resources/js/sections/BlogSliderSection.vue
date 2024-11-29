<template>
    <section ref="blogSection">
        <Swiper
        :modules="modules"
        :slides-per-view="3"
        :space-between="30"

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
        <SwiperSlide v-for="data in blog_data" :key="data">
            <BlogCard :blogId="data.id" :blogImage="data.attchments[0]" :blogAuthImage="data.author_image" :viewNumbers="data.total_views" :blogPublishDate="data.publish_date" :blogTitle="data.title" :blogAuthor="data.author_name"/>

        </SwiperSlide>
        </Swiper>
    </section>

</template>
<script setup>
import { computed} from 'vue';
import BlogCard from '../components/BlogCard.vue';

import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';
import {useSection} from '../store/index'
import {useObserveSection} from '../hooks/Observer'

const modules = [Navigation, Pagination, Scrollbar, A11y];
const store = useSection()
const blog_data = computed(() => store.blog_list_data)

const [blogSection] = useObserveSection(() => store.get_blog_list({per_page: "all"}))

</script>
