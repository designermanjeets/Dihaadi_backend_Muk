<template>
   <div class="modal fade show couponmodal" id="couponModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{$t('messages.available_coupon')}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"  @click="closeModal()"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="row g-3">

              <div class="col-6" v-for="(coupon, index) in coupons" :key="index">
                <div class="form-check custom-check" @click="selectCoupon( coupon.id)">

                <input class="form-check-input" type="radio" name="coupon"  :id="coupon.code + coupon.id"  v-model="coupon_id" :value="coupon.id" >
                <label class="form-check-label"  :for="coupon.code + coupon.id">
                  <span class="h6 d-block mb-2">{{ coupon.code }}</span>
                    <span class="d-block mb-1">
                      <span v-if="coupon.discount_type=='fixed'" class="d-block small"> ${{coupon.discount}} {{$t('landingpage.off')}}</span>
                      <span v-else class="d-block small"> {{coupon.discount}}% {{$t('landingpage.off')}}</span>
                    </span>
                    <span v-if="coupon.discount_type=='fixed'" class="d-block small">{{$t('landingpage.exp')}}: {{ moment(coupon.expire_date).format('D MMM, YYYY') }}</span>
                </label>
              </div>
              </div>
             
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button  class="btn btn-primary" v-if="is_applied==1"  @click="getSelectedCoupon()">{{$t('landingpage.applied')}}</button>
            
          <button  class="btn btn-primary" v-if="is_applied!=1" :disabled="!(is_applied === 0 && !!couponId)" @click="getSelectedCoupon()"> {{$t('messages.apply')}}</button>
        </div>
      </div>
    </div>  
   </div>
   
</template>

<script setup>
import { ref, defineProps,onMounted } from 'vue';
import moment from 'moment'

const props = defineProps(['coupons','service_price','SeletedCouponId']);

const emit = defineEmits(['getSelectedCoupon'])

const couponId=ref(0);
const coupon_id=ref(null)

const selectCoupon=(coupon_id)=>{

  couponId.value=coupon_id

  if(couponId.value==props.SeletedCouponId){

    is_applied.value =1

  }else{

    is_applied.value =0

  }
}

const is_applied=ref(0)

onMounted(() => {
  if(props.SeletedCouponId>0){

    is_applied.value =1

    couponId.value=props.SeletedCouponId

    coupon_id.value=props.SeletedCouponId

  }

})


const getSelectedCoupon =()=>{

  emit('getSelectedCoupon', couponId.value)

}

const closeModal=()=>{

  couponId.value=props.SeletedCouponId

  emit('getSelectedCoupon', couponId.value)


}



</script>