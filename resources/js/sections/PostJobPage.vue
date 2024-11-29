<template>
<section ref="jobpostsection">
  <div class="row align-items-center">
          <div class="col-md-4">
            <div class="text-md-start text-center">
              <a :href="`${baseUrl}/post-job`" class="btn btn-primary text-capitalize">add post job</a>
            </div>
          </div>
          <div class="col-md-8 mt-md-0 mt-3">
              <div class="row">
                  <div class="col-l2">
                      <div class="d-flex align-items-center flex-sm-row flex-column gap-3 justify-content-md-end justify-content-center">
                          <div class="d-flex align-items-center gap-1 flex-shrink-0">
                            <h6 class="text-body flex-shrink-0">{{$t('landingpage.sort_by')}}:</h6>
                            
                          </div>
                          <div class="flex-shrink-0">
                            <div class="search-form input-group flex-nowrap align-items-center">
                              <input type="text" class="form-control rounded-3" v-model="search" placeholder="Search">
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
                      </div>
                  </div>
              </div>
          </div>
      </div>
    <div class="table-responsive rounded py-4">
            <table id="post-job-datatable" ref="tableRef" class="table custom-card-table"></table>
        </div>
</section>
</template>

<script setup>
import 'flatpickr/dist/flatpickr.css';
import { ref, watch } from 'vue';
import {useSection} from '../store/index'
import {useObserveSection} from '../hooks/Observer'
import useDataTable from '../hooks/Datatable'
const props = defineProps(['link']);

const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');

const post_job_data = ref('')
const search = ref('')
  watch(() => search.value, () => ajaxReload())
// watch(() => post_job_data.value, () => ajaxReload())
// Datatable
const ajaxReload = () => window.$(tableRef.value).DataTable().ajax.reload(null, false)
const tableRef = ref(null)
const columns = ref([
    { data: 'name', title: '', orderable: false, searchable: false}
]);
useDataTable({
  tableRef: tableRef,
  columns: columns.value,
  url: props.link,
  per_page: 10,
  dom: '<"row align-items-center"><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" l><"col-md-6 mt-md-0 mt-3" p>><"clear">',
  advanceFilter: () => {
    return {
        post_job_data: post_job_data.value,
        search: search.value,
    }
  }
});
const store = useSection()
const [jobpostsection] = useObserveSection(() => store.get_post_job_list({per_page: "all"}))

</script>