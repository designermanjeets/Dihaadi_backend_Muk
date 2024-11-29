<!-- Pagination.vue -->
<template>
  <div class="pagination justify-content-center mt-5">
    <button class="pagination-link" @click="prevPage" :disabled="currentPage === 1">
      <i class="fas fa-chevron-left"></i> {{$t('pagination.previous')}}
    </button>
    <button
      class="pagination-link"
      v-for="page in totalPages"
      :class="{ active: isPageActive(page) }"
      :key="page"
      @click="gotoPage(page)"
    >
      {{ page }}
    </button>
    <button class="pagination-link">...</button>
    <button class="pagination-link" @click="nextPage" :disabled="currentPage === totalPages">
      {{$t('pagination.next')}} <i class="fas fa-chevron-right"></i>
    </button>
  </div>
</template>

<script setup>
const { currentPage, totalPages, prevPage, nextPage, gotoPage, isPageActive } = defineProps([
  'currentPage',
  'totalPages',
  'prevPage',
  'nextPage',
  'gotoPage',
  'isPageActive'
])
</script>
