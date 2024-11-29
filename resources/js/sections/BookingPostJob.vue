 <template>
    <div class="row">
        <div class="col-12 mt-5">
          <form  @submit="formSubmit">
           <input type="hidden" name="_token" :value="csrfToken">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-8">
                      <div  class="booking-list-content-active">
                          <h5 class="text-capitalize">schedule service</h5>
        
                          <div class="mt-5 card bg-light rounded-3">
                            <div class="card-body booking-service-form">
                              <div class="row">
                                  
                                  <div class="col-12">
                                      <label class="form-label">Date And Time</label>
                                      <div class="input-group icon-left custom-form-field flex-nowrap">
                                          <span class="input-group-text flex-shrink-0" id="dateandtime">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                                  <path d="M1.32031 6.5531H14.6883" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  <path d="M11.3322 9.4823H11.3392" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  <path d="M8.00408 9.4823H8.01103" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  <path d="M4.66815 9.4823H4.67509" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  <path d="M11.3322 12.3971H11.3392" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  <path d="M8.00408 12.3971H8.01103" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  <path d="M4.66815 12.3971H4.67509" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  <path d="M11.0329 1V3.46809" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  <path d="M4.97435 1V3.46809" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M11.1787 2.18433H4.82822C2.6257 2.18433 1.25 3.41128 1.25 5.6666V12.4538C1.25 14.7446 2.6257 15.9999 4.82822 15.9999H11.1718C13.3812 15.9999 14.75 14.7659 14.75 12.5106V5.6666C14.7569 3.41128 13.3882 2.18433 11.1787 2.18433Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                              </svg>
                                          </span>
                                          <flat-pickr
                                                v-model="date"
                                                :config="config"
                                                class="form-control"
                                                placeholder="Select date and time"
                                                name="date" />
                                      </div>
      
                                      <span v-if="errorMessages['date']">
                                          <ul class="text-danger">
                                            <li v-for="err in errorMessages['date']" :key="err">{{ err }}</li>
                                          </ul>
                                        </span>
                                        <span class="text-danger">{{ errors.date }}</span>
                                  </div>
                                
                                  <div class="col-12 mt-5">
                                      <label class="form-label">location</label>
                                      <div class="input-group icon-left custom-form-field">
                                          <span class="input-group-text align-items-start pt-4">
                                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15"
                                                  viewBox="0 0 14 15" fill="none">
                                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M8.875 6.37538C8.875 5.33943 8.03557 4.5 7.00038 4.5C5.96443 4.5 5.125 5.33943 5.125 6.37538C5.125 7.41057 5.96443 8.25 7.00038 8.25C8.03557 8.25 8.875 7.41057 8.875 6.37538Z"
                                                      stroke="currentColor" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round" />
                                                  <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M6.99963 14.25C6.10078 14.25 1.375 10.4238 1.375 6.42247C1.375 3.28998 3.89283 0.75 6.99963 0.75C10.1064 0.75 12.625 3.28998 12.625 6.42247C12.625 10.4238 7.89849 14.25 6.99963 14.25Z"
                                                      stroke="currentColor" stroke-width="1.5"
                                                      stroke-linecap="round" stroke-linejoin="round" />
                                              </svg>
                                          </span>
                                          <textarea class="form-control"
                                              placeholder="Address" v-model="address" name="address"></textarea>
      
                                          
                                      </div>
                                      <span v-if="errorMessages['address']">
                                          <ul class="text-danger">
                                            <li v-for="err in errorMessages['address']" :key="err">{{ err }}</li>
                                          </ul>
                                        </span>
                                        <span class="text-danger">{{ errors.address }}</span>

                                        <div>
                                            <a @click="getCurrentLocation" class="btn btn-primary mt-5">Get Current Location</a>
                                        </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="mt-5 pt-md-5 pt-3 text-center">
                <div class="d-inline-flex align-items-center flex-wrap gap-3">
                    <a :href="`${baseUrl}/post-job-detail/${post_job.post_request_detail.id}`" class="btn btn-outline-primary">Cancel</a>
                    
                    <button type="submit" class="btn btn-primary"><span>Save Booking</span></button>
                </div>
            </div>
           </form>
        </div>
    </div>
 </template>

<script setup>
import { ref, defineProps,computed,onMounted} from 'vue';
import Payment from '../components/Payment.vue';
import FlatPickr from 'vue-flatpickr-component'
import { useField, useForm } from 'vee-validate'
import 'flatpickr/dist/flatpickr.css';
import * as yup from 'yup'
import { STORE_BOOKING_API} from '../data/api'; 
import couponcard from '../components/CouponCard.vue';
import { confirmcancleSwal} from '../data/utilities'; 
import Swal from 'sweetalert2';
import { Calendar, DatePicker } from 'v-calendar';
import 'v-calendar/style.css';
import moment from 'moment'
const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
const props = defineProps(['post_job','user_id']);

const firstServiceId = ref(props.post_job.post_request_detail.service[0].id);

const config = ref({
      enableTime: true,
      dateFormat: 'Y-m-d H:i',
      static: true,
      minDate: "today",
});

onMounted(() => {
    defaultData()
})


const defaultData = () => {
  errorMessages.value = {}
  return {
    address: '',
    date: new Date(),
    start_time:''
  }
}


const validationSchema = yup.object({
    address: yup.string().required('Address is Required'),
    date: yup.string().required('Date is Required'), 
})

const { handleSubmit, errors, resetForm,setValues } = useForm({
  validationSchema
})
const { value: address } = useField('address')
const { value: date } = useField('date')
const getCurrentLocation = async () => {
    try {
        const position = await new Promise((resolve, reject) => {
            navigator.geolocation.getCurrentPosition(resolve, reject);
        });

        const currentLatitude = position.coords.latitude;
        const currentLongitude = position.coords.longitude;

        const response = await fetch(`https://maps.googleapis.com/maps/api/geocode/json?latlng=${currentLatitude},${currentLongitude}&key=AIzaSyCtTed7y_ePqg1QoDMHOyu01FtP_Ot-mDU`);
        const data = await response.json();

        const formattedAddress = data.results[0]?.formatted_address;

        setValues({ address: formattedAddress });
        trigger('address');
    } catch (error) {
        console.error('Error fetching current location:', error);
    }
};

const errorMessages = ref({})

const formSubmit = handleSubmit(async(values) => {
    values.id = '';
    values.post_request_id = props.post_job.post_request_detail.id;
    values.service_id = firstServiceId.value;
    values.customer_id = props.user_id;
    values.provider_id = props.post_job.post_request_detail.provider_id;
    values.amount = props.post_job.post_request_detail.job_price;
    values.total_amount = props.post_job.post_request_detail.job_price;
    values.coupon_id = '';
    values.type = 'user_post_job';
    values.status = 'accept';

    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

    const response = await fetch(STORE_BOOKING_API, {
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
                window.location.href = baseUrl + '/booking-list';
            }
        })
    }  
    else { 
        Swal.fire({
            title: 'Error',
            text: 'Something Went Wrong!',
            icon: 'error',
            iconColor: '#5F60B9'
        }).then((result) => {

        })
    }
})


</script>