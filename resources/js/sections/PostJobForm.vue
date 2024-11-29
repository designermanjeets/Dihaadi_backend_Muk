<template>
   <div class="row">
      <div class="col-12">
         <div class="text-center mb-5">
            <h3>Request Post Job Services</h3>
         </div>
      </div>
   </div>
   <form @submit.prevent="submitPostJob">
      <div class="row">
         <div class="col-lg-8 col-md-7">
            <div class="card bg-light rounded-3 mb-0">
               <div class="card-body">
                  <input type="hidden" name="_token" :value="csrfToken">
                  <div class="custom-form-field mb-4">
                     <input type="text" class="form-control" v-model="title" placeholder="Title" id="title" name="title" @input="clearError('title')">
                     <div class="error-message" style="color: red;margin-top: 5px;">{{ titleError }}</div>
                  </div>   
                  <div class="custom-form-field mb-4">
                     <textarea class="form-control" v-model="description" id="description" placeholder="Description"  name="description" @input="clearError('description')"></textarea>
                     <div class="error-message" style="color: red;margin-top: 5px;">{{ descriptionError }}</div>
                  </div>
                  <div class="custom-form-field">
                     <input type="number" class="form-control" v-model="price" id="price" placeholder="Price"  name="price" @input="clearError('price')" min="1">
                     <div class="error-message" style="color: red;margin-top: 5px;">{{ priceError }}</div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-5 mt-md-0 mt-5">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
               <h5 class="m-0 text-capitalize">Services</h5>
               <a href="#modaladdservice" class="btn btn-primary text-capitalize" data-bs-toggle="modal" @show="onModalShow">
                  <i class="fas fa-plus font-size-14"></i>
                  Create Service
               </a>
            </div>
            <div class="error-message" style="color: red;">{{ serviceError }}</div>
            <div class="post-job-service-list mt-3">
               <ul class="list-inline m-0 p-0">
                  <li v-for="service in serviceData" :key="service.id">
                     <div class="bg-light rounded-3 p-3 mb-3">
                        <div class="d-flex align-items-center justify-content-between gap-3">
                           <div class="d-flex align-items-center gap-3">
                              <div class="flex-shrink-0">
                                 <img :src="service.attchments[0]" class="object-cover avatar-40 rounded-circle" alt="service-image"/>
                              </div>
                              <div class="content">
                                 <h6 class="m-0 line-count-2">{{ service.name }}</h6>
                                 <div class="d-inline-flex gap-2">
                                    <span type="button" class="text-primary" @click="editService(service.id)">
                                       <i class="fas fa-edit"></i>
                                       <span class="visually-hidden">Edit</span>
                                    </span>
                                    <span type="button" class="text-danger"  @click="deleteService(service.id)">
                                       <i class="fas fa-trash"></i>
                                       <span class="visually-hidden">Delete</span>
                                    </span>
                                 </div>
                              </div>
                           </div>
                           <div class="flex-shrink-0">
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="" id="servicecheck">
                              </div>
                              <!-- <button
                              type="button"
                              class="btn btn-sm px-2 btn-primary"
                              @click="toggleService(service.id)"
                           >
                              <i :class="{ 'fas fa-plus': !isServiceAdded(service.id), 'fas fa-minus': isServiceAdded(service.id) }"></i>
                              <span class="visually-hidden">{{ isServiceAdded(service.id) ? 'Remove' : 'Add' }}</span>
                              </button> -->
                              <!-- <button type="button" class="btn btn-sm btn-primary" @click="addService(service.id)">
                                 Add
                              </button> -->
                           </div>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
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
                                                
                                                <select class="form-select" v-model="selectedCategory" @change="clearCategoryError">
                                                   <option value="" disabled selected>{{ $t('landingpage.select_category')}}</option>
                                                   <option v-for="category in allCategory" :key="category.id" :value="category.id">{{ category.name }}</option>
                                                </select>
                                                <div class="error-message" style="color: red; margin-top: 5px;">{{ categoryError }}</div>
                                                <p v-if="allCategory.length === 0">{{ $t('landingpage.loading_categories') }}...</p>

                                             </div>
                                             <div class="mb-4 col-md-6">
                                                <label class="form-label text-capitalize">{{ $t('landingpage.service_name') }}</label>
                                                <input v-model="serviceName" type="text" class="form-control" placeholder="Write Service Name" aria-label="servicename" aria-describedby="basic-addon1" @input="clearServiceError('serviceName')">
                                                <div class="error-message" style="color: red;margin-top: 5px;">{{ serviceNameError }}</div>
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
                                                <label class="form-label text-capitalize">{{ $t('messages.status')}}</label>
                                                
                                                <select class="form-select" v-model="status">
                                                
                                                   <option value="active" selected>{{ $t('messages.active')}}</option>
                                                   <option value="inactive" >{{ $t('messages.inactive')}}</option>
                                                </select>
         
                                             </div>
                                             <div class="mb-4 col-md-6">
                                                <div class="mb-4 col-md-6">
                                                <input type="file" ref="fileInput" @change="handleFileChange" />
                                                <img v-if="selectedImage" :src="selectedImage" alt="Selected Service Image" style="max-width: 100%; margin-top: 10px;">
                                                <div class="error-message" style="color: red; margin-top: 5px;">{{ imageError }}</div>
                                             </div>
                                             <!-- <input type="file" ref="fileInput" multiple @change="handleFileChange" />
                                             <div class="error-message" style="color: red; margin-top: 5px;">{{ imageError }}</div> -->
                                             </div>
                                             <div class="mb-4 col-md-12">
                                                   <label class="form-label text-capitalize">{{ $t('messages.description')}}</label>
                                                   <textarea v-model="serviceDescription" class="form-control" rows="4" placeholder="Description" @click="clearServiceError('serviceDescription')"></textarea>
                                                   <div class="error-message" style="color: red;margin-top: 5px;">{{ serviceDescriptionError }}</div>
                                             </div>
                                             <div class="mb-4">
                                                   <button type="submit" class="btn btn-primary">{{ $t('messages.submit')}}</button>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                 </div>
                              </div>
                              <div style="margin-left: 10px;"> 
                              </div>
                              <div style="margin-left: 10px;"> 
                           </div>
                    
      </div>

      <div class="text-center mt-5">
         <button type="submit" class="btn btn-primary">Post Request Save</button>
      </div>
   </form>
</template> 

<script setup>
import { STORE_POST_JOB_API,POST_SERVICE_API,CATEGORY_API,SERVICE_API,SERVICE_DELETE_API} from '../data/api'; 
import { ref,onMounted,defineProps} from 'vue';
const isModalOpen = ref(false);
const serviceData = ref([]);
const selectedService = ref([]);
const props = defineProps(['user_id']);

const categories = ref([]);
  const allCategory = ref([]);
  const isLoading = ref(false);
  const selectedCategory = ref('');
  const serviceName = ref('');
  const selectType = ref('fixed');
  const status = ref('active');
  const serviceDescription = ref('');
  const titleError = ref('');
  const descriptionError = ref('');
  const priceError = ref('');
  const serviceNameError = ref('');
  const serviceDescriptionError = ref('');
  const categoryError = ref('');
  const imageError = ref('');
  const serviceError = ref('');


const resetFormData = () => {
    // Clear form data
    selectedCategory.value = '';
    serviceName.value = '';
    selectType.value = 'fixed';
    status.value = 'active';
    serviceDescription.value = '';
  };

// get all category
const fetchTopCategories = async () => {
      try {
         const response = await fetch(CATEGORY_API({ per_page: 'all', status: 1 }));
         const data = await response.json();
         if (data && Array.isArray(data.data)) {
         const TotalServices = data.data.filter(user => user.services !== undefined);
         const sortedCategories = TotalServices.sort((a, b) => b.services - a.services);
         categories.value = sortedCategories;
         allCategory.value = TotalServices;
         } else {
         console.error('Invalid data structure or missing array of providers.');
         }
      } catch (error) {
         console.error('Error fetching or processing data:', error);
      }
   };

   //get all service
   const fetchService = async () => {
     const user_id = props.user_id;
      try {
         const response = await fetch(SERVICE_API({ customer_id: user_id}));
         const data = await response.json();
         if (data && Array.isArray(data.user_services)) {
          const listService = data.user_services;
          serviceData.value = listService;
         } else {
         console.error('Invalid data structure or missing array of providers.');
         }
      } catch (error) {
         console.error('Error fetching or processing data:', error);
      }
   };

   onMounted(async () => {
    //resetFormData();
    fetchTopCategories();
    await fetchService();
});

const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
let title = '';
let description = '';
let price='';
let service_id='';


//close the service model
const closeModal = () => {
    isModalOpen.value = false;
};

const clearCategoryError = () => {
  categoryError.value = '';
};

// clear the post job field error message
const clearError = (fieldName) => {
  switch (fieldName) {
    case 'title':
      titleError.value = '';
      break;
    case 'description':
      descriptionError.value = '';
      break;
    case 'price':
      priceError.value = '';
      break;
  }
};

// clear the post job field error message
const clearServiceError = (fieldName) => {
  switch (fieldName) {
    case 'serviceName':
      serviceNameError.value = '';
      break;
    case 'serviceDescription':
         serviceDescriptionError.value = '';
      break;
    case 'price':
      priceError.value = '';
      break;
  }
};

// save post job   
const submitPostJob = async () => {
   if (title === '') {
    titleError.value = 'Title is required.';
  } else {
    titleError.value = '';
  }
  if (description === '') {
    descriptionError.value = 'Description is required.';
  } else {
    descriptionError.value = '';
  }

  if (price === '') {
   priceError.value = 'Price is required.';
  } else {
   priceError.value = '';
  }
  if (!selectedService.value || selectedService.value.length === 0) {
   serviceError.value = 'Please select at least one service.';
   return;
} else {
   serviceError.value = '';
}
  if (titleError.value || descriptionError.value || priceError.value) {
    return;
  }
     try {
        const postJobData = {
            title: title,
            description: description,
            price:price,
            service_id: Array.from(selectedService.value),
            status:"requested",
        };
        //console.log(postJobData);
      const formData = new FormData();
      formData.append('title', title);
      formData.append('description', description);
      formData.append('price', price);
      formData.append('status', 'requested');
      formData.append('service_id', JSON.stringify(selectedService.value));
        const response = await fetch(STORE_POST_JOB_API, {
           method: 'POST',
           headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken,
           },
           body: JSON.stringify(postJobData),
        });
        if (response.ok) {
            title = '';
            description = '';
            price = '';
            service_id = '';
            window.location.href = `${baseUrl}/post-job-list`;
         //   console.log(response);
        } else if (response.status === 401) {
            // Redirect to the login page
            window.location.href = `${baseUrl}/login-page`;
        } else {
           console.error('Error posting service:', response.status);
        }
     } catch (error) {
        console.error('Error submitting service:', error);
     }
  };
  const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
  const fileInput = ref(null);
  const selectedImage = ref(null);
   const handleFileChange = () => {
   const selectedFile = fileInput.value.files[0];
   if (!selectedFile) {
    imageError.value = 'Please select an image.';
  } else {
    imageError.value = '';
  }
  const reader = new FileReader();
  reader.onload = () => {
    selectedImage.value = reader.result;
  };
  reader.readAsDataURL(selectedFile);

  // Set fileInputModified to true when file input is changed
  //fileInputModified.value = true;
   };

   const addOrRemoveService = (serviceId) => {
  if (selectedService.value.includes(serviceId)) {
    removeService(serviceId);
  } else {
    addService(serviceId);
  }
};


const addService = (serviceId) => {
  serviceId = Number(serviceId);
   const uniqueServiceIds = new Set(selectedService.value);
   uniqueServiceIds.add(serviceId);
   selectedService.value = Array.from(uniqueServiceIds);
   serviceError.value = '';
};

const removeService = (serviceId) => {
   selectedService.value = selectedService.value.filter((id) => id !== serviceId);
};

const toggleService = (serviceId) => {
   addOrRemoveService(serviceId);
};

const isServiceAdded = (serviceId) => selectedService.value.includes(serviceId);

// load image
function loadImage(url) {
  return new Promise((resolve, reject) => {
    const xhr = new XMLHttpRequest();
    xhr.responseType = 'blob';
    xhr.onload = () => {
      if (xhr.status === 200) {
        resolve(xhr.response);
      } else {
        reject(new Error(`Failed to load image (status ${xhr.status})`));
      }
    };
    xhr.onerror = () => {
      reject(new Error('Network error while loading image'));
    };
    xhr.open('GET', url);
    xhr.send();
  });
}


//edit service model form 
const editService = (serviceId) => {
  const selectedService = serviceData.value.find(service => service.id === serviceId);
  if (selectedService) {
   service_id= selectedService.id;
    selectedCategory.value = selectedService.category_id;
    serviceName.value = selectedService.name;
    selectType.value = selectedService.type;
    status.value = selectedService.status === 1 ? 'active' : 'inactive';
    serviceDescription.value = selectedService.description;
    const oldSelectedImageFilename = selectedService.attchments[0];
    selectedImage.value = oldSelectedImageFilename;
    const imageUrl = selectedService.attchments[0];

// Load the image URL and convert it to Blob
loadImage(imageUrl)
  .then(blob => {
    const fileName = imageUrl.substring(imageUrl.lastIndexOf('/') + 1);
    const file = new File([blob], fileName, { type: blob.type });
    const fileList = new DataTransfer();
    fileList.items.add(file);
    fileInput.value.files = fileList.files;
    $('#modaladdservice').modal('show');
  })
  .catch(error => {
    console.error('Error loading image:', error);
  });
    $('#modaladdservice').modal('show');
  }
};



  //save service
  const submitService = async () => {
         if (serviceName.value === '') {
         serviceNameError.value = 'Name is required.';
         } else {
            serviceNameError.value = '';
         }
         if (serviceDescription.value === '') {
            serviceDescriptionError.value = 'Description is required.';
         } else {
            serviceNameError.value = '';
         }
         if (selectedCategory.value === '') {
            categoryError.value = 'Select your category.';
         } else {
            categoryError.value = '';
         }
         const selectedFile = fileInput.value.files[0];
         if (!selectedFile) {
            imageError.value = 'Select image.';
         } else {
            imageError.value = '';
         }

         if (serviceNameError.value || serviceDescriptionError.value || categoryError.value || imageError.value) {
            return;
         }
     try {
      const user_id = props.user_id;
      isLoading.value = true;
      const formData = new FormData();
      formData.append('attachment_count', 1);
      formData.append('service_attachment_0', fileInput.value.files[0]);
      formData.append('provider_id', user_id);
      formData.append('category_id', selectedCategory.value);
      formData.append('name', serviceName.value);
      formData.append('description', serviceDescription.value);
      formData.append('type', selectType.value);
      formData.append('price', 0);
      formData.append('status', status.value.toLowerCase() === 'active' ? 1 : 0);
      if (service_id) {
      formData.append('id', service_id);
      formData.append('operation', 'update');
    } else {
      formData.append('operation', 'create');
    }
        const response = await fetch(POST_SERVICE_API, {
           method: 'POST',
           headers: {
              //'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken,
           },
           body: formData,
        });
        if (response.ok) {
            isLoading.value = false;
            selectedCategory.value = '';
            serviceName.value = '';
            serviceDescription.value = '';
            //price.value = '';
            window.location.href = `${baseUrl}/post-job`;
            closeModal();
            isModalOpen.value = false;
           
        } else if (response.status === 401) {
            // Redirect to the login page
            window.location.href = `${baseUrl}/login-page`;
        }
        else if (response.status === 422) {
         const responseBody = await response.json();
      if (responseBody.all_message && responseBody.all_message.name) {
         serviceNameError.value = responseBody.all_message.name[0] || 'Service name is already taken.';
      } else {
         console.error('Unhandled error:', responseBody);
         }
   } else {
      console.error('Unhandled status code:', response.status);
   }
   } catch (error) {
   console.error('Error submitting service:', error);
   }
  };


  // delete service
  const deleteService = async (serviceId) => {
        try {
            const response = await fetch(`${SERVICE_DELETE_API}/${serviceId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
            });
            if (response.ok) {
                serviceData.value = serviceData.value.filter(service => service.id !== serviceId);
                console.log("Service deleted successfully!!!")
            } else {
                console.error('Error deleting service:', response.status);
            }
        } catch (error) {
            console.error('Error deleting service:', error);
        }
};

</script>
