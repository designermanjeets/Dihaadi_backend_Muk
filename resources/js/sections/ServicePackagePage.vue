<template>
  <div class="col-lg-4 col-md-6 mb-5" v-for="data in servicepackage" :key="data">
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
  </div>
</template>
<script setup>
import ServicePackageCard from '../components/ServicePackageCard.vue'
defineProps(['servicepackage','service_id','auth_user_id'])
</script>
