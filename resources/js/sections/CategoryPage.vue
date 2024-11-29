<template>

    <section ref="categorySection">
      <div class="row">
            <div class="col-md-12">
                <div class="float-end">
                    <div class="search-form input-group flex-nowrap align-items-center">
                        <input type="search" class="form-control rounded-3" name="search" v-model="search" placeholder="Search...">
                        <span class="input-group-text search-icon position-absolute text-body">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="11.7669" cy="11.7666" r="8.98856" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle><path d="M18.0186 18.4851L21.5426 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive rounded py-4">
            <table id="datatable" ref="tableRef" class="table custom-card-table"></table>
        </div>

    </section>

</template>

<script setup>
import { computed, ref, watch} from 'vue';
import CategoryCard from '../components/CategoryCard.vue';
import CategoryShimmer from '../shimmer/CategoryShimmer.vue';
import { useSection } from '../store/index';
import { useObserveSection } from '../hooks/Observer';
import useDataTable from '../hooks/Datatable'

const props = defineProps(['link']);
const search = ref('')
watch(() => search.value, () => ajaxReload())
const columns = ref([
  { data: 'name', title: '', orderable: true,order: 'desc' }
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
        search: search.value,
    }
  }
});

const store = useSection();
const category_data = ref([]);
const currentPage = ref(1);
const itemsPerPage = 8;

const totalPages = computed(() => {
  const totalItems = store.categories_list.pagination?.total_items;
  return totalItems ? Math.ceil(totalItems / itemsPerPage) : 0;
});

const [categorySection] = useObserveSection(async () => {
  await getCategoryData(itemsPerPage,currentPage.value);
  category_data.value = store.categries_list_data.data;
});

const getCategoryData = (itemsPerPage,currentPage) => {
    return store.get_categries_list({
      per_page: itemsPerPage,
      page: currentPage,
    });
};

const nextPage = async () => {
  if (currentPage.value < totalPages.value) {
    await getCategoryData(itemsPerPage,currentPage.value + 1);
    currentPage.value += 1;
    category_data.value = store.categries_list_data.data;
  }
};

const prevPage = async () => {
  if (currentPage.value > 1) {
    await getCategoryData(itemsPerPage,currentPage.value - 1);
    currentPage.value -= 1;
    category_data.value = store.categries_list_data.data;
  }
};
const gotoPage = async (page) => {
  if (page >= 1 && page <= totalPages.value) {
    await getCategoryData(itemsPerPage,page);
    currentPage.value = page;
    category_data.value = store.categries_list_data.data;
  }
};
const isPageActive = (page) => {
  return currentPage.value === page;
};
</script>

<style>
.custom-card-table thead {
    display: none;
}
.custom-card-table tbody td, .custom-card-table tbody tr{
    border:0 !important;
    display: block !important;
}
.custom-card-table thead,.custom-card-table  tbody,.custom-card-table  tfoot,.custom-card-table  tr,.custom-card-table  td,.custom-card-table  th {
    white-space: initial;
}
</style>
