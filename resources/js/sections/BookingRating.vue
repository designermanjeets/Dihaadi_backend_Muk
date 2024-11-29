<template>
    <div v-if="showForm" class="pt-lg-5 pt-3 mt-lg-5 mt-3">
        <div class="mt-3 rating-component">
            <h4 class="text-capitalize mt-0 mb-4">{{ $t('landingpage.your_review') }}</h4>
            <form @submit="formSubmit">
                <input type="hidden" name="_token" :value="csrfToken">
                <div class="mb-4">
                    <label class="form-label text-capitalize">{{ $t('landingpage.your_rating') }}</label>
                    <rating-component @add-service-rating="addServiceRating" :ratingvalue="ratingval" />
                    <input type="hidden" name="rating" v-model="rating">
                    <span v-if="errorMessages['rating']">
                        <ul class="text-danger">
                            <li v-for="err in errorMessages['rating']" :key="err">{{ err }}</li>
                        </ul>
                        </span>
                    <span class="text-danger">{{ errors.rating }}</span>
                </div>
                <div class="mb-4">
                    <label class="form-label text-capitalize">{{ $t('messages.description') }}</label>
                    <textarea class="form-control" v-model="review" id="description" name="review" rows="4" placeholder="Write Here..."></textarea>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">{{ $t('messages.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
    <div v-if="bookingrating != null" class="pt-lg-5 pt-3 mt-lg-5 mt-3">
        <div class="mt-3 rating-component">
            <div class="d-flex justify-content-between">
                <h5 class="mb-5">{{ $t('landingpage.your_review') }}</h5>
                <div class="d-inline-flex align-items-center gap-2">
                    <button @click="editRating" class="btn btn-sm btn-primary-subtle px-2"><i class="fas fa-edit"></i></button>
                    <button @click="deleteRating(bookingrating.id)" class="btn btn-sm btn-danger-subtle px-2"><i class="fas fa-trash"></i></button>
                </div>
            </div>
            <ul class="comment-list list-inline m-0">
                <li class="comment mb-5 pb-5 border-bottom">
                    <div class="comment-box">
                        <div
                            class="d-flex align-items-sm-center align-items-start flex-sm-row flex-column justify-content-between gap-3">
                            <div
                                class="d-inline-flex align-items-sm-center align-items-start flex-sm-row flex-column gap-3">
                                <div class="user-image flex-shrink-0">
                                    <img :src="bookingrating.profile_image"
                                        class="avatar-70 object-cover rounded-circle" alt="comment-user" />
                                </div>
                                <div class="comment-user-info">
                                    <h6 class="font-size-18 text-capitalize mb-2">{{ bookingrating.display_name }}</h6>
                                    <span class="text-primary">
                                        <rating-component :readonly = true :showrating ="false" :ratingvalue="bookingrating.rating" />
                                    </span>
                                </div>
                            </div>
                            <div class="date text-capitalize">{{ bookingrating.date }}</div>
                        </div>
                        <div class="mt-4">
                            <p class="commnet-content m-0">
                                {{ bookingrating.review}}
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>    
</template>

<script setup>
import { ref,computed,onMounted} from 'vue';
import { useField, useForm } from 'vee-validate';
import { STORE_BOOKING_RATING_API, DELETE_BOOKING_RATING_API} from '../data/api'; 
import * as yup from 'yup';
import Swal from 'sweetalert2';

const props = defineProps(['booking_id','service_id','customer_id','bookingrating']);

const ratingval = ref(0)
const showForm = ref(true)

if(props.bookingrating !== null){
    showForm.value = false;
}

const addServiceRating = (ratingval) => {

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

    if(props.bookingrating && props.bookingrating.id){
        values.id = props.bookingrating.id
    }

    try { 
        const response = await fetch(STORE_BOOKING_RATING_API, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify(values),
        });
    
        if (response.ok) {
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
        } else {
            console.error('Error saving rating:', response.statusText);
        }
    } catch (error) {
        console.error('Error saving rating:', error);
    }
});  

const editRating = () =>{
    showForm.value = true;
    ratingval.value = props.bookingrating.rating
    rating.value = props.bookingrating.rating
    review.value = props.bookingrating.review
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
        const response = await fetch(DELETE_BOOKING_RATING_API, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({id}),
        });

        if (response.ok) {
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
        } else {
            console.error('Error delete rating:', response.statusText);
        }
    }
}

onMounted(() => {
    defaultData()
})

</script>