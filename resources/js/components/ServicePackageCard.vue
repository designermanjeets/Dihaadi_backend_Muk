<template>
  <div class="booking-service-box p-5 bg-light rounded-3">
    <div class="service-image">
      <img :src="serviceimage" class="service-image object-cover rounded-2" alt="service-image" />
      <div class="rating-box px-3 py-1 d-inline-block bg-body rounded-3">
        <h6 class="m-0 service-price lh-1">${{ serviceprice }}</h6>
      </div>
    </div>
    <div class="service-info mt-4">
      <h6 class="mb-2 font-size-18 text-capitalize service-title">{{ servicetitle }}</h6>
      <p class="m-0 font-size-14 fw-500 text-capitalize readmore-text">
        {{ servicedesc }}
      </p>
      <a href="javascript:void(0);" class="readmore-btn">{{$t('landingpage.read_more')}}</a>
    </div>
    <div class="mt-3">
      <a v-if="auth_user_id !== null" :href="`${baseUrl}/book-service?id=${serviceid}&package_id=${packageid}`" class="fw-500">{{ buttontext }}</a>
      <a v-else :href="`${baseUrl}/login-page`" class="fw-500">{{ buttontext }}</a>
    </div>
  </div>
</template>
<script setup>
defineProps({
  servicetitle: { type: String, default: '' },
  serviceprice: { type: Number, default: 0 },
  servicetime: { type: String, default: '' },
  servicedesc: { type: String, default: '' },
  serviceimage: { type: String, default: '' },
  servicerating: { type: String, default: '' },
  listitem1: { type: String, default: '' },
  listitem2: { type: String, default: '' },
  buttontext: { type: String, default: '' },
  buttonurl: { type: String, default: '' },
  serviceid: { type: Number, default: 0 },
  packageid: { type: Number, default: 0 },
  auth_user_id: { type: Number, default: 0 },
})
const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
</script>
