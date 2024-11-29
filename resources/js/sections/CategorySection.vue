<template>

    <section ref="categorySection">
        <div class="row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center mt-5" v-if="categoryDetails.length > 0">
            <div v-for="category in categoryDetails" :key="category.id" class="col">
                <category-card :category_id="category.id" :title="category.name" :description="category.description" :image="category.category_image"/>
            </div>
        </div>
        <div class="row row-cols-xl-4 row-cols-md-3 row-cols-sm-2 row-cols-1 justify-content-center mt-5 " >

           <span v-if="categoryDetails.length ==0 && isLoading==0"> Data Not Available </span>

            <!-- <CategoryShimmer  v-for="item in 8" :key="item"></CategoryShimmer> -->
          
        </div>
    </section>

</template>
<script setup>
import { onMounted,ref} from 'vue';
import { CATEGORY_API} from '../data/api'; 
import CategoryCard from '../components/CategoryCard.vue';
import CategoryShimmer  from '../shimmer/CategoryShimmer.vue'
import {useSection} from '../store/index'
const store = useSection()
const categoryDetails = ref([]);
const categories = ref([]);
const isLoading=ref(1);

// get all category
const fetchTopCategories = async () => {
      try {
         const response = await fetch(CATEGORY_API({ per_page: 'all', status: 1 }));
         const data = await response.json();
         if (data && Array.isArray(data.data)) {
       
         const TotalServices = data.data.filter(user => user.services !== undefined);
         const sortedCategories = TotalServices.sort((a, b) => b.services - a.services);
         //const topCategories = sortedCategories.slice(0, 10);
         categories.value = sortedCategories;
         } else {
         console.error('Invalid data structure or missing array of providers.');
         }
      } catch (error) {
         console.error('Error fetching or processing data:', error);
      }
   };

const getCategoryDetails = async () => {
  try {
    await store.get_landing_page_setting_list({ per_page: 10, page: 1 });
    const settings = store.landing_page_setting_list_data.data.find(setting => setting.key === 'section_2' && setting.status === 1);
    if (settings) {
      const categoryIds = getJsonValue(settings.value, 'category_id');
      await fetchTopCategories();
      const allCategories = categories.value;
      const selectedCategories = allCategories.filter(category => categoryIds.includes(String(category.id)));
      categories.value = selectedCategories.map(category => ({
        id: category.id,
        name: category.name,
        description: category.description,
        category_image:category.category_image,
      }));
      categoryDetails.value = categories.value;
      isLoading.value=0
    }
  } catch (error) {
    console.error('Error fetching category details:', error);
  }
};


onMounted(async () => {
  await fetchTopCategories();
  await getCategoryDetails();
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
