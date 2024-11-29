<template>
   <div class="service-box-card bg-light rounded-3 mb-5">
  <div class="iq-image position-relative">
      <span v-if="visit_type == 'ONLINE'" class="online-service"></span>
     <a :href="`${baseUrl}/service-detail/${service_id}`"  @click="storeRecentlyViewed" class="service-img">
        <img :src="image ? image : baseUrl+'/images/default.png'" alt="service"
        class="service-img w-100 object-cover img-fluid rounded-3">
     </a>

      <div v-if="user_id !== null">
         <div v-if="favourite == false">
               <form @submit.prevent="saveFavourite">
                  <input type="hidden" name="service_id"  :value="service_id">
                  <input type="hidden" name="user_id"  :value="user_id">
                  <button type="submit" class="btn-link serv-whishlist text-primary">
                     <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                  </button>
               </form>
         </div>
         <div v-else>
            <form @submit.prevent="deleteFavourite">
               <input type="hidden" name="service_id"  :value="service_id">
               <input type="hidden" name="user_id"  :value="user_id">
               <button type="submit" class="btn-link serv-whishlist text-primary">
                  <svg width="12" height="13" viewBox="0 0 12 13" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </button>
            </form>
         </div>
      </div>
      <div v-else>
         <form @submit.prevent="redirectToLogin">
            <button type="submit" class="btn-link serv-whishlist text-primary">
               <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
            </button>
         </form>
      </div>

  </div>
   <a :href="`${baseUrl}/service-detail/${service_id}`" class="service-heading mt-4 d-block p-0" @click="storeRecentlyViewed">
     <h5 class="service-title font-size-18 line-count-2">{{title }}</h5>
   </a>
   <ul class="list-inline p-0 mt-1 mb-0 price-content">
     <li class="text-primary fw-500 d-inline-block position-relative font-size-18"><span v-if="price>0">{{ formatCurrencyVue(price) }}</span> <span v-else>Free</span></li>
     <li class="d-inline-block fw-500 position-relative service-price">({{ formattedDuration(duration) }})</li>
   </ul>
  <div
     class="mt-3">
     <div class="d-flex align-items-center gap-2">
        <img :src="userImage" alt="service" class="img-fluid rounded-3 object-cover avatar-24">
        <a :href="`${baseUrl}/provider-detail/${provider_id}`"><span class="font-size-14 service-user-name">{{ userName }}</span></a>
     </div>
     <div class="d-flex align-items-center gap-1 f-none mt-2">
      <rating-component :readonly = true :showrating ="false" :ratingvalue="props.reviewNo" />              

        <h6 class="font-size-14">{{reviewNo }}
    <a :href="`${baseUrl}/rating-all?service_id=${service_id}`"><span v-if="reviewCount>1" class="text-body ms-1">({{ reviewCount }} {{ $t('messages.reviews') }})</span><span v-else class="text-body ms-1">({{ reviewCount }} {{ $t('messages.review') }})</span>
    </a>
   </h6>
     </div>
  </div>
</div>
</template>

<script setup>
import { ref ,onMounted} from 'vue';
import axios from 'axios';
import { SAVE_FAVOURITE_API, DELETE_FAVOURITE_API} from '../data/api';
import Swal from 'sweetalert2';
import { extendWith } from 'lodash';

const props = defineProps({
    image: {type:String ,default:''},
    userImage: {type:String ,default:''},
    userName: {type:String ,default:''},
    reviewNo: {type:Number ,default:0},
    reviewCount: {type:Number ,default:0},
    title: {type:String ,default:''},
    price: {type:Number ,default:0},
    duration: {type:String ,default:''},
    service_id : {type: Number, default: 0},
    provider_id : {type: Number, default: 0},
    user_id : {type: Number, default: 0},
    favourite : {type: Boolean, default: ''},
    visit_type : {type: String, default: ''},
})

const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
const saveFavourite = async(values) => {
   values.service_id = props.service_id;
   values.user_id = props.user_id;

   if(props.user_id !== ""){
      try {
         const response = await fetch(SAVE_FAVOURITE_API, {
            method: 'POST',
            headers: {
               'Content-Type': 'application/json',
               'X-CSRF-TOKEN': csrfToken,
            },
            body:JSON.stringify(values),
         });

         if(response.ok) {
            const responseData = await response.json();
            Swal.fire({
            title: 'Done',
            text: responseData.message,
            icon: 'success',
            iconColor: '#5F60B9'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            })
        }
      } catch (error) {
         console.error(error);
      }
   }
   else{
      window.location.href = baseUrl + '/login-page';
   }
};
const deleteFavourite = async(values) => {
   values.service_id = props.service_id;
   values.user_id = props.user_id;
   try {
      const response = await fetch(DELETE_FAVOURITE_API, {
         method: 'POST',
         headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
         },
         body:JSON.stringify(values),
      });

      if(response.ok) {
         const responseData = await response.json();
         Swal.fire({
         title: 'Done',
         text: responseData.message,
         icon: 'success',
         iconColor: '#5F60B9'
         }).then((result) => {
               if (result.isConfirmed) {
                  window.location.reload();
               }
         })
      }
   } catch (error) {
      console.error(error);
   }
};
const redirectToLogin = () => {
   window.location.href = baseUrl + '/login-page';
}

const storeRecentlyViewed = async () => {
   try {
      const response = await axios.post(`${baseUrl}/save-recently-viewed/${props.service_id}`);
      if (response.data.success) {

         return response.data.success;
      } else {

         console.error(response.data.success);
      }
   } catch (error) {
      console.error('Error storing service ID in session for recently viewed', error);
   }
};

const formatCurrencyVue = (value) => {

   if(window.currencyFormat !== undefined) {
   return window.currencyFormat(value)
   }
   return value
}

import { useI18n } from 'vue-i18n';

const { t } = useI18n();

const formattedDuration = () => {
    if (props.duration) {
        const durationParts = props.duration.split(':');
        const hours = parseInt(durationParts[0], 10);
        const minutes = parseInt(durationParts[1], 10);

        if (hours > 0) {
            return `${hours} ${t('landingpage.hrs')} ${minutes} ${t('landingpage.min')}`;
        } else {
            return `${minutes} ${t('landingpage.min')}`;
        }
    } else {
        return ''; // or any default value you want to show if duration is not provided
    }
}
</script>
