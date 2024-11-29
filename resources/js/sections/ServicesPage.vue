<template>
    <section ref="servicesection">

      <div class="row align-items-center">
          <div class="col-lg-6">
              <div class="row gx-3">
                  <div class="col-sm-4">
                    <select ref="categoryDropdownRef" id="categoryDropdown" v-model="selectedCategory" class="me-5 form-select select2" :disabled="isEmpty">
                        <option value="">{{$t('landingpage.all_categories')}}</option>
                        <option v-for="category in category_data" :key="category.id" :value="category.id">{{ category.name }}</option>
                    </select>
                    
                  </div>
                  <div class="col-sm-4 mt-sm-0 mt-3">
                    <select ref="providerDropdownRef" id="providerDropdown" v-model="selectedProvider" class="me-5 form-select select2" :disabled="isEmpty">
                        <option value="">{{$t('landingpage.all_providers')}}</option>
                        <option v-for="providers in provider_data" :key="providers.id" :value="providers.id">{{ providers.first_name }}</option>
                    </select>
                  </div>
                  <div class="col-sm-4 mt-sm-0 mt-3">
                      <select ref="priceDropdownRef" id="priceDropdown" v-model="selectedPriceRange" class="me-5 form-select select2" :disabled="isEmpty">
                          <option value="">{{$t('landingpage.all_price')}}</option>
                          <option :value="price" v-for="price in priceRanges" :key="price">{{ CURRENCY_SYMBOL }} {{ price }}</option>
                      </select>
                  </div>
              </div>
          </div>
          <div class="col-lg-6 mt-lg-0 mt-3">
              <div class="row">
                  <div class="col-l2">
                      <div class="d-flex align-items-center flex-sm-row flex-column gap-3 justify-content-lg-end">
                          <div class="d-flex align-items-center gap-1 flex-shrink-0">
                            <h6 class="text-body flex-shrink-0">{{$t('landingpage.sort_by')}}:</h6>
                            <select ref="sortOptionRef" v-model="selectedSortOption" class="form-select select2" :disabled="isEmpty">
                              <option value="">{{$t('landingpage.select')}}</option>
                              <option value="best_selling">{{$t('landingpage.best_selling')}}</option>
                              <option value="top_rated">{{$t('landingpage.top_rated')}}</option>
                              <option value="newest">{{$t('landingpage.newest')}}</option>
                            </select>
                          </div>
                          <div class="flex-shrink-0">
                            <div class="search-form input-group flex-nowrap align-items-center">
                              <input type="text" class="form-control rounded-3" v-model="search" placeholder="Search" :disabled="isEmpty">
                              <span class="input-group-text search-icon position-absolute text-body">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                  </circle>
                                  <path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                  </path>
                                </svg>
                              </span>
                            </div>
                          </div>
                          <button  v-if="checkDropdowns" class="btn btn-outline-primary" @click="refreshDropdowns" :disabled="isEmpty">{{$t('landingpage.reset')}}</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="table-responsive rounded py-4">
            <table id="datatable" ref="tableRef" class="table custom-card-table service-card-table"></table>
      </div>
      
    </section>
  </template>

  <script setup>
  import ServiceCard from '../components/ServiceCard.vue';
  import ServiceShimmer from '../shimmer/ServiceShimmer.vue';
  import { computed, onMounted, ref, watch } from 'vue';
  import { useSection } from '../store/index';
  import { useObserveSection } from '../hooks/Observer';
  import useDataTable from '../hooks/Datatable'

  const CURRENCY_SYMBOL = ref(window.defaultCurrencySymbol)

  const categoryDropdownRef = ref(null);
  const providerDropdownRef = ref(null);
  const priceDropdownRef = ref(null);
  const sortOptionRef = ref(null);
  const props = defineProps(['link', 'isEmpty', 'service']);

  const isEmpty = props.isEmpty;

  const selectedCategory = ref('')
  watch(() => selectedCategory.value, () => ajaxReload())

  const selectedProvider = ref('')
  watch(() => selectedProvider.value, () => ajaxReload())
  
  const selectedPriceRange = ref('')
  watch(() => selectedPriceRange.value, () => ajaxReload())

  const selectedSortOption = ref('')
  watch(() => selectedSortOption.value, () => ajaxReload())

  const search = ref('')
  watch(() => search.value, () => ajaxReload())

  const columns = ref([
    { data: 'name', title: '', orderable: false, order: 'desc'}
  ]);

  const ajaxReload = () => window.$(tableRef.value).DataTable().ajax.reload(null, false)
  const tableRef = ref(null);

  useDataTable({
    tableRef: tableRef,
    columns: columns.value,
    url: props.link,
    dom: '<"row align-items-center"><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" l><"col-md-6 mt-md-0 mt-3" p>><"clear">',
    advanceFilter: () => {
    return {
        selectedCategory: selectedCategory.value,
        selectedProvider: selectedProvider.value,
        selectedPriceRange: selectedPriceRange.value,
        selectedSortOption: selectedSortOption.value,
        search: search.value,
    }
  }
  });

  const store = useSection();
  const service_data = computed(() => store.service_list_data);
  const featured_category_data = computed(() => store.featured_category_list_data);
  const category_data = computed(() => store.categries_list_data.data);
  const provider_data = computed(() => store.provider_list_data);

  const minPrice = computed(() => Math.min(...service_data.value.map(item => item.price)));
  const maxPrice = computed(() => Math.max(...service_data.value.map(item => item.price)));

  const priceRanges = computed(() => {
  const range = maxPrice.value - minPrice.value;
  const step = 10;
  const count = Math.ceil(range / step);

  const ranges = Array.from({ length: count + 1 }, (_, index) => ({
    min: minPrice.value + index * step,
    max: minPrice.value + (index + 1) * step,
  }));

  return ranges.map(range => `${range.min}-${range.max}`);
});
  
  const loadServiceData = () => {
      store.get_service_list({ per_page: 'all' });
    };

  const loadCategoryData = () =>{
    store.get_categries_list({ per_page: 'all' });
  }

  const loadProviderData = () =>{
    store.get_provider_list({ per_page: 'all', user_type: 'provider' });
  }

  const loadFeaturedCategoryData = () => {
    store.get_featured_category_list({ is_featured: 1 });
  };

  
  onMounted(() => {
    $(categoryDropdownRef.value).select2();
    $(providerDropdownRef.value).select2();
    $(priceDropdownRef.value).select2();
    $(sortOptionRef.value).select2();
    $(categoryDropdownRef.value).on('change', function() {
      selectedCategory.value = $(this).val();
    });
    $(providerDropdownRef.value).on('change', function() {
      selectedProvider.value = $(this).val();
    });
    $(priceDropdownRef.value).on('change', function() {
      selectedPriceRange.value = $(this).val();
    });
    $(sortOptionRef.value).on('change', function() {
      selectedSortOption.value = $(this).val();
    });
    loadServiceData();
    loadCategoryData();
    loadProviderData();
    loadFeaturedCategoryData();
  });
  
  const refreshDropdowns = () => {
    $(categoryDropdownRef.value).val('').trigger('change');
    $(providerDropdownRef.value).val('').trigger('change');
    $(priceDropdownRef.value).val('').trigger('change');
    $(sortOptionRef.value).val('').trigger('change');
  }

  const checkDropdowns = computed(() => {
    return selectedCategory.value || selectedProvider.value || selectedPriceRange.value || selectedSortOption.value
  });


  </script>
