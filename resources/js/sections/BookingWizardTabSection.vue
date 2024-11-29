<template>
  <div class="forms">
    <div class="non-printable">
      <div class="d-flex justify-content-between align-items-center">
        <h4>{{ title }}</h4>
      </div>
    </div>
    <hr class="non-printable" />
    <component :is="dynamicComponent" @tab-change="nextTabChange" @on-reset="resetApp" :wizardNext="wizardNext" :wizardPrev="wizardPrev" :service="service"></component>
  </div>
</template>
<script setup>
// Library
import { computed, ref } from 'vue'
// import { useRequest } from '@/helpers/hooks/useCrudOpration'
// import {useQuickBooking} from '../store/quick-booking'

// Select Options List Request
// import { STORE_URL } from '@/vue/constants/quick_booking'

// const {  storeRequest } = useRequest()


// Components
import NotFound from '../components/NotFoundCard.vue'
import ScheduleService from '../components/booking-component/ScheduleService.vue'
import BookService from '../components/booking-component/BookService.vue'
import Payment from '../components/Payment.vue'

const IS_RESETTING = ref(false)

const props = defineProps({
  wizardNext: {
    default: '',
    type: [String, Number]
  },
  wizardPrev: {
    default: '',
    type: [String, Number]
  },
  type: {
    type: String
  },
  title: {
    type: String
  },
  service:{
    Object
  }
})

const dynamicComponent = computed(() => {
  switch (props.type) {
    case 'schedule-service':
      return ScheduleService
      break

    case 'book-service':
      return BookService
      break

    case 'select-payment':
      return Payment
      break

    default:
      return NotFound
      break
  }
})

const emit = defineEmits(['onClick'])

// const store = useQuickBooking()
// const booking = computed(() => store.booking)
// const user = computed(() => store.user)
const nextTabChange = (value) => {
//   if(value == 6){
//     const body = {
//       user: user.value,
//       booking: booking.value
//     }
//     storeRequest({ url: STORE_URL , body : body }).then((res) => {
//       store.updateBookingResponse(res.data)
//       emit('onClick', value)
//     })
//   }
//   else{
    console.log(value,'vak')
    emit('onClick', value)
//   }
}

const resetApp = () => {
//   store.resetState()
  emit('onClick', 1)
}
</script>
