<template>
  <div class="booking-list-content">
    <h5 class="mt-5 mb-0 text-capitalize">{{ $t('messages.wallet_balance') }}: {{ formatCurrencyVue(wallet_amount)}}</h5>
    <div class="mt-0">
      <form @submit="formSubmit">
        <input type="hidden" name="_token" :value="csrfToken">
        <h6 class="mb-2 mt-3 text-capitalize">{{ $t('messages.wallet_top_up') }}</h6>
        <p>What amount would you prefer to top up with?</p>
        <div class="d-flex align-items-center flex-wrap gap-3">
          <div class="input-group ml-auto">
            <input type="number" min="0" step="any" v-model="amount" class="form-control" placeholder="Amount..." aria-label="Amount" aria-describedby="addon-wrapping">
<ul class="nav nav-tabs nav-fill tabslink gap-3 provider-slot">
  <li class="nav-item m-0">
    <!-- Add a click event to set the amount -->
    <a href="javascript:void(0)" class="nav-link" :class="{ 'active': amount === 100 }" @click="setAmount(100)" data-bs-toggle="tab" rel="tooltip">100</a>
  </li>
  <li class="nav-item m-0">
    <a href="javascript:void(0)" class="nav-link" :class="{ 'active': amount === 200 }" @click="setAmount(200)" data-bs-toggle="tab" rel="tooltip">200</a>
  </li>
  <li class="nav-item m-0">
    <a href="javascript:void(0)" class="nav-link" :class="{ 'active': amount === 250 }" @click="setAmount(250)" data-bs-toggle="tab" rel="tooltip">250</a>
  </li>
  <li class="nav-item m-0">
    <a href="javascript:void(0)" class="nav-link" :class="{ 'active': amount === 500 }" @click="setAmount(500)" data-bs-toggle="tab" rel="tooltip">500</a>
  </li>
  <li class="nav-item m-0">
    <a href="javascript:void(0)" class="nav-link" :class="{ 'active': amount === 1000 }" @click="setAmount(1000)" data-bs-toggle="tab" rel="tooltip">1000</a>
  </li>
  <li class="nav-item m-0">
    <a href="javascript:void(0)" class="nav-link" :class="{ 'active': amount === 5000 }" @click="setAmount(5000)" data-bs-toggle="tab" rel="tooltip">5000</a>
  </li>
  <li class="nav-item m-0">
    <a href="javascript:void(0)" class="nav-link" :class="{ 'active': amount === 10000 }" @click="setAmount(10000)" data-bs-toggle="tab" rel="tooltip">10000</a>
  </li>
</ul>
          </div>
        </div>
        <div class="d-flex align-items-center flex-wrap gap-3">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="payment_method" v-model="payment_method" id="stripe" value="stripe" :checked="payment_method === 'stripe'">
            <label class="form-check-label h6 fw-normal text-capitalize" for="stripe">{{$t('messages.stripe')}}</label>
          </div>
        </div>
        <div class="mt-3">
          <div class="d-inline-flex align-items-center flex-wrap gap-3">
            <button class="btn btn-primary" type="submit">
              <span v-if="IsLoading === 1" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
              <span v-else>{{ $t('landingpage.Proceed_To_Payment') }}</span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>
<script setup>
import { ref, defineProps,computed,onMounted} from 'vue';
import * as yup from 'yup'
import { useField, useForm } from 'vee-validate'
import { GET_WALLET_PAYMENT_METHOD, GET_WALLET_STRIPE_PAYMENT_URL,WALLET_PAYMENT_API} from '../data/api'; 
import Swal from 'sweetalert2';
import { confirmcancleSwal} from '../data/utilities'; 
import Wallet from '../components/Wallet.vue';
const props = defineProps(['booking_id','customer_id','discount','total_amount','advance_payment_amount','wallet_amount']);

onMounted(() => {
      
  setFormData(defaultData())

})
const setAmount = (selectedAmount) => {
    amount.value = selectedAmount;
  }
const IsLoading=ref(0);

const defaultData = () => {
  errorMessages.value = {}
  return {
    payment_method:'stripe',

  
  }
}

const setFormData = (data) => {
  resetForm({
    values: {

      payment_method: data.payment_method,
      amount: data.amount,

    }
  })
}

const validationSchema = yup.object({

})

const { handleSubmit, errors, resetForm } = useForm({
  validationSchema
})

const { value: payment_method } = useField('payment_method')
const { value: amount } = useField('amount')


const errorMessages = ref({})

const formSubmit = handleSubmit(async(values) => {
      values.booking_id=props.booking_id;
      values.customer_id=props.customer_id;
      values.discount=props.discount;
      values.payment_type = values.payment_method;
      values.amount = values.amount;
      if(props.advance_payment_amount !=null){
        values.total_amount=props.advance_payment_amount;
        values.type='advance_payment';
      }else{
        values.total_amount=props.total_amount;
        values.type='full_payment'
      }
      IsLoading.value=1;
      const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

      const response = await fetch(GET_WALLET_PAYMENT_METHOD, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken,
            },
            body:JSON.stringify(values),
        });
        if(response.ok){

          IsLoading.value=0;

          const responseData = await response.json();
console.log(responseData);
          if(responseData.payment_geteway_data != null ){

            Openstripepayment(responseData)
    
          }else{

            IsLoading.value=0;

            Swal.fire({
              title: 'Error',
              text: 'check Your Stripe key Integration !',
              icon: 'error',
              iconColor: '#5F60B9'
            }).then((result) => {
    
            })

          }

        } else {

          IsLoading.value=0;

            Swal.fire({
              title: 'Error',
              text: 'Something Went Wrong!',
              icon: 'error',
              iconColor: '#5F60B9'
            }).then((result) => {
    
            })
        }
  

  })

  const Openstripepayment = async(data) => {

const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

const res= await fetch(GET_WALLET_STRIPE_PAYMENT_URL, {
         method: 'POST',
         headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
         },
         body:JSON.stringify(data),
      });
      if(res.ok){

        const responseData = await res.json();

        if(responseData.message){

             Swal.fire({
               title:'Error',
               text: responseData.message,
               icon: 'error', 
               iconColor: '#5F60B9'
             }).then((result) => {
     
             })
        }else{
            window.location.href = responseData.url;
        }
 

      }else{

          Swal.fire({
            title: 'Error',
            text: 'Something Went Wrong!',
            icon: 'error',
            iconColor: '#5F60B9'
          }).then((result) => {
  
          })
      }


}

 
const formatCurrencyVue = (value) => {

if(window.currencyFormat !== undefined) {
  return window.currencyFormat(value)
}
return value
}
const isChildComponentVisible = ref(false);
const currentComponent = ref(null);

const showChildComponent = () => {
  currentComponent.value  = Wallet;
  isChildComponentVisible.value = true;
};

</script>

