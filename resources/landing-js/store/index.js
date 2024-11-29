import { defineStore } from 'pinia';
import { sectionState } from './state';
import { CATEGORY_API, BLOG_API, SERVICE_API, FEATURED_CATEGORY_API , LANDING_PAGE_SETTING_API} from '../data/api';
import { TESTIMONIAL_API } from '../data/api';
import { PROVIDER_API,LOGIN_API,BOOKINGLIST_API,BOOKINGSTATUS_API } from '../data/api';

import axios from 'axios';
export const useSection = defineStore('section', {
    state: () => (sectionState),
    getters: {
        isLoggedIn: (state) => state.isLoggedIn,
        categries_list_data: (state) => state.categories_list,
        blog_list_data: (state) => state.blog_list.data,
        blog_list_page: (state) => state.blog_list.pagination,
        booking_list_data:(state) => state.booking_list.data,
        provider_list_data:(state) => state.provider_list.data,
        service_list_data:(state) => state.service_list.data,
        testimonial_list_data:(state) => state.testimonial_list.data,
        featured_category_list_data:(state) => state.featured_category_list.data,
        booking_status_data: (state) => state.booking_status,
        landing_page_setting_list_data: (state) => state.landing_page_settings_list,
    },
    actions:{
        async get_categries_list({per_page,page}){
            const searchData = { per_page: per_page,page:page }
            const response = await axios.get(CATEGORY_API(searchData))
            this.categories_list = response.data
        },
        async get_blog_list({per_page}){
            const searchData = { per_page: per_page }
            const response = await axios.get(BLOG_API(searchData))
            this.blog_list = response.data
        },
        async get_provider_list({per_page, user_type}){
            const searchData = { per_page: per_page, user_type: user_type }
            const response = await axios.get(PROVIDER_API(searchData))
            this.provider_list = response.data

        },
        async get_landing_page_setting_list({per_page,page}){
          const searchData = { per_page: per_page,page:page }
          const response = await axios.get(LANDING_PAGE_SETTING_API(searchData))
          this.landing_page_settings_list= response.data
      },
        async login({ email, password }) {
            try {
              // Make a request to your login API
              const response = await axios.post(LOGIN_API, { email:email, password:password });

              // Assuming your API returns user data on successful login
              const user = response.data.user;

              // Update the user state and set isLoggedIn to true
              sectionState.user = user;
              sectionState.isLoggedIn = true;
            } catch (error) {
              console.error('Login failed:', error);
              // Handle login failure, show error message, etc.
            }
          },

          async get_service_list({ per_page, category_id, provider_id, is_price_min, is_price_max }) {
            try {
              const searchData = { per_page };

              if (category_id !== undefined && category_id !== null) {
                searchData.category_id = category_id;
              }

              if (provider_id !== undefined && provider_id !== null) {
                searchData.provider_id = provider_id;
              }

              if (is_price_min !== undefined && is_price_max !== undefined) {
                searchData.is_price_min = is_price_min;
                searchData.is_price_max = is_price_max;
              }

              const response = await axios.get(SERVICE_API(searchData));
              this.service_list = response.data;
            } catch (error) {
              console.error('Error fetching service list:', error);
            }
          },

        async get_testimonial_list(){

            const response = await axios.get(TESTIMONIAL_API())
            this.testimonial_list = response.data
        },

        async get_featured_category_list({is_featured}){
            const searchData = { is_featured: is_featured }
            const response = await axios.get(FEATURED_CATEGORY_API(searchData))
            this.featured_category_list = response.data
        },

        async get_booking_list({per_page}){
            const searchData = { per_page: per_page }
            const response = await axios.get(BOOKINGLIST_API(searchData))
            this.booking_list = response.data
        },

        async get_booking_status({per_page}){
          const searchData = { per_page: per_page }
          const response = await axios.get(BOOKINGSTATUS_API(searchData))
          this.booking_status = response.data
      },

    }
})
window.pinia = useSection
