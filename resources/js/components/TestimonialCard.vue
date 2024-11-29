<template>
    <div v-if="isLightBg" class="iq-testimonial testimonial position-relative bg-light rounded-5">
    <div class="quote text-center rounded-circle">
        <img :src="quoteImage" class="img-fluid" alt="quote">
    </div>
    <h5 class="about-review-title line-count-1">{{title}}</h5>
    <p class="mt-3 mb-0 testimonial-content line-count-3 fw-500">{{quoteImage}}</p>
    <div
        class="mt-4 d-flex align-items-sm-center align-items-start justify-content-between flex-sm-row flex-column gap-3">
        <div v-if="isRating" class="ratting-block">
        </div>
        <div class="d-inline-flex align-items-center gap-3">
            <div class="testimonial-user-image flex-shrink-0">
                <img :src="userImage" class="img-fluid rounded-2"
                alt="user-image">
            </div>
            <div class="user-content">
                <h6 class="testimonial-user line-count-1">{{userImage}}</h6>
                <span class="testimonial-user-meta font-size-14 line-count-1">{{userMeta}}</span>
            </div>
        </div>
    </div>
</div>
<div v-else class="iq-testimonial testimonial position-relative bg-body rounded-5">
    <div class="quote text-center rounded-circle">
        <img :src="baseUrl+'/landing-images/testimonial/quote.svg'" class="img-fluid" alt="quote">
    </div>
    <h5 class="about-review-title line-count-1">{{title}}</h5>
    <p class="mt-3 mb-0 testimonial-content line-count-3 fw-500">{{content}}</p>
    <div class="row align-items-center justify-content-between mt-4">
        <div class="col-sm-7">
            <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-3">
                <div class="testimonial-user-image flex-shrink-0">
                    <img :src="userImage" class="avatar-50 object-cover rounded-2"
                        alt="user-image">
                </div>
                <div class="user-content">
                    <h6 class="testimonial-user line-count-1">{{userName}}</h6>
                    <span class="testimonial-user-meta font-size-14 line-count-1">{{ new Date(userMeta).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) }}</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5 mt-sm-0 mt-3">
            <div class="ratting-block text-sm-end">
                <rating-component :readonly = true :showrating ="false" :ratingvalue="rating" />
            </div>
        </div>
    </div>
</div>
</template>

<script setup>

defineProps({
    isLightBg : {type: Boolean, default: false},
    isRating : {type: Boolean, default: false},
    quoteImage : {type: String, default: ''},
    rating : {type: Number, default: 0},
    title : {type: String, default: ''},
    content : {type: String, default: ''},
    userImage : {type: String, default: ''},
    userName : {type: String, default: ''},
    userMeta : {type: String, default: ''},
})

const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
</script>

