<template>

    <div class="bg-body search-box-wrapper">
       <div class="d-flex flex-wrap align-items-center justify-content-between">
           <div class="d-flex align-items-center flex-wrap">
              <div class="p-3 d-inline-flex align-items-center gap-2 f-none" data-bs-toggle="modal"
                 data-bs-target="#modal-location" v-for="setting in section1Data" :key="setting.id">
                 <svg v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'current_location') == 'on'" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 12 14" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                       d="M7.66659 6.00026C7.66659 5.07941 6.92043 4.33325 6.00026 4.33325C5.07941 4.33325 4.33325 5.07941 4.33325 6.00026C4.33325 6.92043 5.07941 7.66659 6.00026 7.66659C6.92043 7.66659 7.66659 6.92043 7.66659 6.00026Z"
                       stroke="#BFBFBF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path fill-rule="evenodd" clip-rule="evenodd"
                       d="M5.99967 13C5.20069 13 1 9.59892 1 6.04219C1 3.25776 3.23807 1 5.99967 1C8.76128 1 11 3.25776 11 6.04219C11 9.59892 6.79866 13 5.99967 13Z"
                       stroke="#BFBFBF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                 </svg>
                 <span class="font-size-14 text-body text-capitalize" style="cursor: pointer;" v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'current_location') === 'on'">{{$t('landingpage.current_location')}}</span>
              </div>
              <div class="p-3" v-for="setting in section1Data" :key="setting.id">
                 <div class="form-group input-group mb-0 ms-0 ps-3 border-start" v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'enable_search') == 'on'">
                      <span class="input-group-text bg-transparent border-0 p-0 pe-2">
                         <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round"></circle>
                            <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5"
                               stroke-linecap="round" stroke-linejoin="round"></path>
                         </svg>
                      </span>
                      <input type="text" class="font-size-14 bg-transparent border-0" placeholder="Search Service" @keyup="getServiceList" v-model="keyword">
                         <div :class="`top-width dropdown-menu dropdown-menu-end user-dropdown mt-5 ${keyword.length > 0 ? 'show' : ''}`" aria-labelledby="dropdownMenuButton1">
                            <!-- <button class="btn btn-close" @click="closeDropdown"></button> -->
                            <span type="button" class="text-primary custom-btn-close" @click="closeDropdown">
                               <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                                  <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z" fill="currentColor"></path>
                               </svg>
                            </span>
                            <div class="location-search-dropdown">
                               <div v-if="serviceList.length > 0 && !show" >
                                  <div class="searchbox-datalink global-search-result show-data" >
                                     <ul class="iq-post p-3">
                                        <li v-for="service in serviceList" :key="service.id" class="mr-0 mb-3 pb-0 d-block">
                                           <a :href="`${baseUrl}/service-detail/${service.id}`">
                                              <div class="post-img d-flex align-items-center">
                                              <div class="post-img-holder">
                                                    <a :href="`${baseUrl}/service-detail/${service.id}`">
                                                    <img :src="service.attchments[0] ? service.attchments[0] : baseUrl+'/images/default.png'" alt="">
                                                    </a>
                                              </div>
                                              <div class="post-blog pl-2">
                                                    <div class="blog-box">
                                                    <a class="nav-link">{{service.name}}</a>
                                                    </div>
                                              </div>
                                              </div>
                                           </a>
                                        </li>
                                     </ul>
                                  </div>
                               </div>
                               <div v-else>
                                  <div class="searchbox-datalink global-search-result show-data" >
                                     <ul class="iq-post p-3 list-inline mb-0">
                                        <li>
                                           {{$t('landingpage.record_not_found')}}
                                        </li>
                                     </ul>
                                  </div>
                               </div>
                            </div>
                         </div>
                   </div>
              </div>
           </div>

           <!-- <div class="py-2 px-3" v-for="setting in landingPageSettings" :key="setting.id">
              <button class="btn btn-primary" v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'enable_search') == 1">Search</button>
           </div> -->

           <div class="py-2 px-3" v-if="shouldShowSearchBox">
              <button class="btn btn-primary">{{$t('landingpage.search')}}</button>
           </div>
       </div>

       <div class="modal fade" id="modal-location" aria-labelledby="modal-locationLabel" aria-hidden="true">
             <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                         <h5 class="modal-title text-capitalize" id="modal-locationLabel">{{$t('landingpage.get_nearest_services')}}</h5>
                         <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
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
                         <form>
                            <p v-if="showofflocation">{{ $t('landingpage.continue_view_services') }}</p>
                            <p v-else>{{ $t('landingpage.discover_find_services') }}</p>
                            <div class="row row-cols-2 pt-4">
                               <div class="col">
                                  <button type="button" class="btn btn-secondary w-100" data-bs-dismiss="modal" aria-label="Close">{{ $t('messages.cancel')}}</button>
                               </div>
                               <div v-if="showofflocation" class="col">
                                  <button type="button" class="btn btn-primary w-100" @click="removeCurrentLocation" >{{ $t('messages.off_location') }}</button>
                               </div>
                               <div v-else class="col">
                                  <button type="button" class="btn btn-primary w-100" @click="getServices">{{ $t('messages.save')}}</button>
                               </div>
                                 
                            </div>
                         </form>
                      </div>
                </div>
             </div>
       </div>

    </div>
     <div class="mt-3 d-flex align-items-center justify-content-between gap-2 flex-wrap" >
         <div v-for="setting in section1Data" :key="setting.id">
             <ul class="p-0 list-inline categories-list mb-0" v-if="setting.key === 'section_1'&& getJsonValue(setting.value, 'enable_popular_services') == 'on'">
                <li class="d-inline-block text-capitalize font-size-14 position-relative p-1">
                <h6>{{getJsonValue(setting.value, 'title')}}</h6>
                </li>
                <li v-for="(categoryIds, categoryIndex) in getJsonValue(setting.value, 'category_id')" :key="categoryIndex" class="d-inline-block text-capitalize font-size-14 position-relative p-1">
                      <a v-if="getCategoryNames([categoryIds]) !=''" :href="`${baseUrl}/category-details/` + categoryIds" class="position-relative">

                         {{ getCategoryNames([categoryIds]) }}
                      </a>
                </li>
             </ul>
         </div>
          
          <div v-if="postjobservice === 1">
          <!-- <div v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'enable_post_job') == 'on'"> -->
            
        <!-- <div  class="d-inline-block text-capitalize font-size-14 cursor-pointer text-decoration-underline" data-bs-target="#modaladdservice" data-bs-toggle="modal" @show="onModalShow" v-if="setting.key === 'section_1' && getJsonValue(setting.value, 'enable_post_job') == 1"> -->
          <!-- <div class="d-inline-block text-capitalize font-size-14 cursor-pointer text-decoration-underline" @click="redirectToPostJob">
          <span>{{ $t('landingpage.post_job_service') }}</span>
         </div> -->
           <!-- <span>{{ $t('landingpage.post_job_service') }}</span> -->
        </div>
             <div class="modal fade " id="modaladdservice"  aria-labelledby="modal-locationLabel" aria-hidden="true">
                <div class="modal-dialog">
                   <div class="modal-content">
                      <div class="modal-header justify-content-center">
                         <div class="text-center">
                            <h5 class="modal-title text-capitalize" id="modal-locationLabel">{{ $t('landingpage.add_your_service') }}</h5>
                            <p>{{ $t('landingpage.add_service_page_msg') }}</p>
                         </div>

                         <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close" @click="resetFormData()">
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
                         <form @submit.prevent="submitService">
                            <input type="hidden" name="_token" :value="csrfToken">
                            <div class="row">
                               <div class="col-md-6">
                                  <label class="form-label text-capitalize">{{ $t('landingpage.Service_Category')}}</label>
                                  
                                  <select class="form-select" v-model="selectedCategory">
                                     <option value="" disabled selected>{{ $t('landingpage.select_category')}}</option>
                                     <option v-for="category in allCategory" :key="category.id" :value="category.id">{{ category.name }}</option>
                                  </select>
                                  <p v-if="allCategory.length === 0">{{ $t('landingpage.loading_categories') }}...</p>

                               </div>
                               <div class="mb-4 col-md-6">
                                  <label class="form-label text-capitalize">{{ $t('landingpage.service_name') }}</label>
                                  <input v-model="serviceName" type="text" class="form-control" placeholder="Write Service Name" aria-label="servicename" aria-describedby="basic-addon1">
                                  
                               </div>
                               <div class="mb-4 col-md-6">
                                  <label class="form-label text-capitalize">{{$t('landingpage.Type')}}</label>
                                  
                                  <select class="form-select" v-model="selectType">
                                    
                                     <option value="fixed" selected>{{ $t('messages.fixed')}}</option>
                                     <option value="hourly" >{{ $t('messages.hourly')}}</option>
                                     <option value="free" >{{ $t('messages.free')}}</option>
                                  </select>
                                  
                               </div>
                               <div class="mb-4 col-md-6">
                                  <label class="form-label text-capitalize">{{ $t('messages.price')}}</label>
                                  <input v-model="price" type="number" class="form-control" placeholder="Price" aria-label="price" aria-describedby="basic-addon1" min="1">
                                  
                               </div>
                               <div class="mb-4 col-md-6">
                                  <label class="form-label text-capitalize">{{ $t('messages.status')}}</label>
                                  
                                  <select class="form-select" v-model="status">
                                    
                                     <option value="active" selected>{{ $t('messages.active')}}</option>
                                     <option value="inactive" >{{ $t('messages.inactive')}}</option>
                                  </select>

                               </div>
                               <div class="mb-4 col-md-12">
                                     <label class="form-label text-capitalize">{{ $t('messages.description')}}</label>
                                     <textarea v-model="serviceDescription" class="form-control" rows="4" placeholder="Write Here..."></textarea>
                               </div>
                               <div class="mb-4">
                                     <button type="submit" class="btn btn-primary" :disabled="isLoading">{{ $t('messages.submit')}}</button>
                               </div>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
             </div>
     </div>

   
</template>

<script setup>
import { ref,computed, onMounted,defineProps} from 'vue';
import { CATEGORY_API,SERVICE_API, POST_SERVICE_API} from '../data/api'; 
import {useSection} from '../store/index'
//import {useObserveSection} from '../hooks/Observer'
const props = defineProps(['postjobservice','user_id']);

const store = useSection()
//const [userlogin] = useObserveSection(() => store.login({email : 'email', password: 'password'}))

const showofflocation = ref(false);

const categories = ref([]);
const allCategory = ref([]);
const redirectToPostJob = () => {
const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
if(props.user_id){
window.location.href = `${baseUrl}/post-job`;
}else{
window.location.href = `${baseUrl}/login-page`;
}
};

const closeDropdown = () => {
keyword.value = ''; 
show.value = false;
};
const fetchTopCategories = async () => {
try {
const response = await fetch(CATEGORY_API({ per_page: 'all', status: 1 }));
const data = await response.json();
if (data && Array.isArray(data.data)) {
const TotalServices = data.data.filter(user => user.services !== undefined);
const sortedCategories = TotalServices.sort((a, b) => b.services - a.services);
//const topCategories = sortedCategories.slice(0, 10);
categories.value = sortedCategories;
allCategory.value = TotalServices;
} else {
console.error('Invalid data structure or missing array of providers.');
}
} catch (error) {
console.error('Error fetching or processing data:', error);
}
};
onMounted(() => {
resetFormData();
fetchTopCategories();
});

const shouldShowSearchBox= async () => {
const settings = this.landingPageSettings.find(setting => setting.key === 'section_1');
return settings && settings.value.current_location === 1 && settings.value.enable_search === 1;
};

const getCategoryNames = (categoryIds) => {
if (!categoryIds || !Array.isArray(categoryIds)) {
return '';
}
return categoryIds.map(categoryId => getCategoryName(categoryId)).join(', ');
};

/* get category name */
const getCategoryName = (categoryId) => {
const categoryValues = Object.values(categories.value);
const category = categoryValues.find(cat => String(cat.id) === String(categoryId));
return category ? category.name : '';
};
const getServices = async () => {
try {
navigator.geolocation.getCurrentPosition(async (position) => {
 const currentLatitude = position.coords.latitude;
 const currentLongitude = position.coords.longitude;
 localStorage.setItem('loction_current_lat', currentLatitude);
 localStorage.setItem('loction_current_long', currentLongitude);
 localStorage.setItem('is_location_on', 'on');
 //const response = await fetch(SERVICE_API({ per_page: 'all', latitude: currentLatitude, longitude: currentLongitude }));
 const serviceUrl = `${baseUrl}/service-list?latitude=${currentLatitude}&longitude=${currentLongitude}`;
 window.location.href = serviceUrl;
 //const data = await response.json();
 //console.log(data);
 showofflocation.value = true;
});
closeModal();
} catch (error) {
console.error('Error fetching service list:', error);
}
};

const resetFormData = () => {
// Clear form data
selectedCategory.value = '';
serviceName.value = '';
selectType.value = 'fixed';
price.value = '';
status.value = 'active';
serviceDescription.value = '';
};

const removeCurrentLocation = async () => {
window.location.reload()
const response = await fetch(SERVICE_API({ per_page: 'all'}));
//const data = await response.json();
localStorage.removeItem('loction_current_lat')
localStorage.removeItem('loction_current_long')
localStorage.setItem('is_location_on','off')
closeModal();
};

const serviceList = ref([]);
const keyword = ref('');
const show = ref(true);
const getServiceList = async () => {
try {
 if (keyword.value.trim().length >= 2) {
    const response = await fetch(SERVICE_API({ per_page: "all", status: 1 }));
    const data = await response.json();

    if (data && Array.isArray(data.data)) {
       show.value = false;
       const filteredServices = data.data.filter(service =>
          service.name.toLowerCase().includes(keyword.value.toLowerCase().split(' ')) 
       );

       if (filteredServices.length > 0) {
          show.value = false;
          serviceList.value = filteredServices;
       } else {
         serviceList.value = [];
         show.value = true; 
     }
    } else {
       serviceList.value = [];
       show.value = true;
    }
 }else {
    serviceList.value = [];
    show.value = true;
 }

} catch (error) {
 console.error('Error fetching service list:', error);
}
};


const closeModal = () => {
$('.modal').modal('hide');
};


const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
const isLoading = ref(false);
const selectedCategory = ref('');
const serviceName = ref('');
const selectType = ref('fixed'); 
const price = ref('');
const status = ref('active');
const serviceDescription = ref('');
const submitService = async () => {
try {
isLoading.value = true;


const serviceData = {
 provider_id: window.Laravel && window.Laravel.user ? window.Laravel.user.id : null,
 category_id: selectedCategory.value,
 name: serviceName.value,
 description: serviceDescription.value,
 type: selectType.value,
 price: price.value,
 status: status.value.toLowerCase() === 'active' ? 1 : 0,
};
const response = await fetch(POST_SERVICE_API, {
method: 'POST',
headers: {
   'Content-Type': 'application/json',
   'X-CSRF-TOKEN': csrfToken,
},
body: JSON.stringify(serviceData),
});
if (response.ok) {
 isLoading.value = false;
 selectedCategory.value = '';
 serviceName.value = '';
 serviceDescription.value = '';
 price.value = '';
 closeModal();

} else {
console.error('Error posting service:', response.status);
}
} catch (error) {
console.error('Error submitting service:', error);
}
};


const landingPageSettings = ref([]);
const section1Data = ref([]);

onMounted(async () => {
try {
await store.get_landing_page_setting_list({ per_page: 10, page: 1 });
landingPageSettings.value = store.landing_page_setting_list_data.data;
section1Data.value = landingPageSettings.value.filter(item => item.key === 'section_1');
console.log(section1Data.value);
} catch (error) {
console.error('Error fetching landing page settings:', error);
}
});

function getJsonValue(jsonString, key) {
try {
const parsedJson = JSON.parse(jsonString);
return parsedJson[key];
} catch (error) {
console.error('Error parsing JSON:', error);
return null;
}
}

</script>

