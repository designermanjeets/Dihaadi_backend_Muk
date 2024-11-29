<template>
    <a :href="`${baseUrl}/category-details/${category_id}`" >
        <div class="card text-center bg-light circle-clip-effect rounded-3">
            <div class="card-body category-card">
                <div class="img-bg d-inline-block rounded-3">
                <img :src="image" alt="icon" class="img-fluid avatar-70">
            </div>
            <h5 class="categories-name text-capitalize mt-4 mb-2 line-count-1">{{ title }}</h5>
            <p class="categories-desc mb-0 text-capitalize line-count-2">{{ description }}</p>
        </div>
    </div>
</a>
</template>
<script setup>
defineProps({
    image: {type: String, default: ''},
    title : {type: String, default: ''},
    description : {type: String, default: ''},
    category_id: { type: Number, default: 0 },
})
const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');

</script>
