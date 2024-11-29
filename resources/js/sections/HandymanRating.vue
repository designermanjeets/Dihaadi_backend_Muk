<template>
    <a v-if="handymanrating==''" href="javascript:void(0);" class="d-inline-block text-capitalize fw-bold mt-2"
        data-bs-toggle="modal" data-bs-target="#ratingModal">{{$t('landingpage.rate_handyman')}}</a>

    <a v-if="handymanrating!==''" href="javascript:void(0);" class="d-inline-block text-capitalize fw-bold mt-2"
        @click="editRating" data-bs-target="#ratingModal">{{$t('landingpage.edit_your_review')}}</a>

    <!-- ===================
    Review Modal
    ========================== -->
    <div class="modal fade" id="ratingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="ratingModalLabel">{{$t('landingpage.your_review')}}</h5>
                    <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close" @click="closeModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                            <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z"
                                fill="currentColor">
                            </path>
                        </svg>
                    </span>
                </div>
                <div class="modal-body">
                    <form @submit="formSubmit">
                        <input type="hidden" name="_token" :value="csrfToken">
                        <div class="mb-4">
                            <label class="form-label text-capitalize">{{$t('landingpage.your_rating')}}</label>
                            <div class="rating-component">
                                <rating-component :key="componentKey" @add-service-rating="addServiceRating" :ratingvalue="ratingval" />
                                <input type="hidden" name="rating" v-model="rating">
                                <span v-if="errorMessages['rating']">
                                    <ul class="text-danger">
                                        <li v-for="err in errorMessages['rating']" :key="err">{{ err }}</li>
                                    </ul>
                                    </span>
                                <span class="text-danger">{{ errors.rating }}</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-capitalize">{{$t('messages.description')}}</label>
                            <textarea class="form-control" v-model="review" id="description" name="review" rows="4" placeholder="Write Here..."></textarea>
                        </div>
                        <div class="d-flex align-items-center gap-3 flex-wrap">
                            <button type="submit" class="btn btn-primary">{{$t('messages.submit')}}</button>
                            <span class="btn btn-danger" id="deletebtn" style="display:none;" @click="deleteRating(handymanrating.id)">{{$t('landingpage.delete')}}</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref,computed,onMounted} from 'vue';
import { useField, useForm } from 'vee-validate';
import { STORE_HANDYMAN_RATING_API, DELETE_HANDYMAN_RATING_API} from '../data/api'; 
import * as yup from 'yup';
import Swal from 'sweetalert2';

const props = defineProps(['booking_id','service_id','customer_id','handyman_id','handymanrating']);


const ratingval = ref(0)
const componentKey = ref(0)

const addServiceRating = (ratingval) => {
    // console.log(ratingval);
    rating.value = ratingval
};

const errorMessages = ref({})
const defaultData = () => {
  errorMessages.value = {}
  return {
    rating: '',
    review:''
  }
}

const validationSchema = yup.object({
    rating: yup.string().required('Rating is Required'),
})

const { handleSubmit, errors, resetForm } = useForm({
  validationSchema
})
const { value: rating } = useField('rating')
const { value: review } = useField('review')

const formSubmit = handleSubmit(async(values) => { 
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    values.booking_id = props.booking_id;
    values.service_id = props.service_id;
    values.customer_id = props.customer_id;
    values.handyman_id = props.handyman_id;

    if(props.handymanrating && props.handymanrating.id){
        values.id = props.handymanrating.id
    }

    try{ 
        const response = await fetch(STORE_HANDYMAN_RATING_API, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(values),
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
            resetForm();
        } else{
            console.error('Error saving rating:', response.statusText);
        }
    } catch (error) {
        console.error('Error saving rating:', error);
    }
});  

const editRating = () =>{
    ratingval.value = props.handymanrating.rating
    rating.value = props.handymanrating.rating
    review.value = props.handymanrating.review
    document.getElementById('deletebtn').style.display = 'inline-block';
    $('#ratingModal').modal('show');
}

const deleteRating = async(id) =>{
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const result = await Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
    });

    if(result.isConfirmed) {
        const response = await fetch(DELETE_HANDYMAN_RATING_API, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({id}),
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
        } else{
            console.error('Error delete rating:', response.statusText);
        }
    }
}

const closeModal=()=>{
    ratingval.value = 0
    componentKey.value += 1
    review.value = ''
}

onMounted(() => {
    defaultData()
})

</script>