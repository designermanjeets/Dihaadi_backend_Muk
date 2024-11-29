<template>

<div class="iq-title-box mb-5" v-if="section1Setting">
  <div class="iq-title-box">
    <h2 class="text-capitalize line-count-3">
      {{ section1Setting.key === 'section_1' && section1Setting.status === 1 ? getJsonValue(section1Setting.value, 'title') : '' }}
      <!-- Your Instant Connection to Right -->
      <span class="highlighted-text">
        <span class="highlighted-text-swipe"></span>
        <span class="highlighted-image">
          <svg xmlns="http://www.w3.org/2000/svg" width="254" height="11" viewBox="0 0 254 11" fill="none">
            <path
              d="M2 9C3.11607 8.76081 129.232 -2.95948 252 4.4554"
              stroke="currentColor"
              stroke-width="4"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </span>
      </span> 
    </h2>
    <p class="iq-title-desc line-count-3 text-body mt-3 mb-0">
      {{ section1Setting.key === 'section_1' ? getJsonValue(section1Setting.value, 'description') : '' }}
    </p>
  </div>
</div>

  </template>
  
  <script setup>
import { ref, onMounted } from 'vue';
import {useSection} from '../store/index'
const store = useSection()

const landingPageSettings = ref([]);
const section1Setting = ref([]);

onMounted(async () => {
  try {
    await store.get_landing_page_setting_list({ per_page: 10, page: 1 });
    landingPageSettings.value = store.landing_page_setting_list_data.data;
    section1Setting.value = landingPageSettings.value.find(setting => setting.key === 'section_1');

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

  