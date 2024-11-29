<template>

    <section ref="subcategorySection">


        <div class="table-responsive rounded py-4">
            <table id="datatable" ref="tableRef" class="table custom-card-table"></table>
        </div>

    </section>

</template>

<script setup>
import { computed, ref } from 'vue';
import { useSection } from '../store/index';
import { useObserveSection } from '../hooks/Observer';
import useDataTable from '../hooks/Datatable'

const props = defineProps(['link']);

const columns = ref([
  { data: 'name', title: '', orderable: true,order: 'desc' }
]);

const tableRef = ref(null);

useDataTable({
  tableRef: tableRef,
  columns: columns.value,
  url: props.link
});
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
