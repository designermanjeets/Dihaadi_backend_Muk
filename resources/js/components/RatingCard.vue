<template>
  <div>
    <VueStarRating
      :inline="true"
      :increment="0.5"
      :star-size="18"
      :read-only="readonly"
      :show-rating="showrating"
      :rating="ratingvalue"
      active-color="#5f60b9"
      inactive-color="#e1e2ed"
      @update:rating="updateRatingHandler"
    >
    </VueStarRating>
  </div>
</template>

<script setup>
import { ref,computed,onMounted, watch} from 'vue';
import VueStarRating from 'vue-star-rating';

// const props = defineProps(['readonly', 'showrating', 'ratingvalue']);
const props = defineProps({
  readonly: Boolean,
  showrating: {
    type: Boolean,
    default: false,
  },
  ratingvalue: Number,
});

const emit = defineEmits(['add-service-rating'])

function updateRatingHandler (rating){
  emit('add-service-rating',rating);
  // emit('add-service-rating',rating.toString());
}
</script>
