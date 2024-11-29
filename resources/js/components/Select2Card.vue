<template>
    <select class="select2 form-control" :id="`select2-${randID}`">
        <template v-if="!isObject">
            <option :value="option.id" selected v-for="option in props.modelValue" :key="option">{{option.text}}</option>
        </template>
        <template v-else>
            <option :value="option" v-for="option in props.options" :key="option">{{option}}</option>
        </template>
    </select>
</template>

<script setup>
import  {onMounted, watch, ref, onUnmounted} from 'vue'
import $ from 'jquery';
import select2 from 'select2';
select2($);
function uniqueID() {
return Math.floor(Math.random() * Date.now())
}
const randID = ref(uniqueID())

const props = defineProps({
    options: {type: Array, default: () => []},
    config: {type: Object, default: () => {}},
    modelValue:{type: String,default:''},
    isObject: {type: Boolean, default: false}
})

const emit = defineEmits([
    'update:modelValue',
    'change',
    'change-select2',
    'select2-close',
    'select2-opening',
    'select2-selecting',
    'select2-select',
    'select2-open',
    'select2-unselecting',
    'select2-unselect',
    'select2-clearing',
    'select2-clear',
])

const updateModelValue = (value) => {
  emit('update:modelValue', value)
}

const initSelect2 = () => {
    $(`#select2-${randID.value}`)
    .select2(props.config)
    .on("change", (e) => emit('change', e))
    .on("change.select2", (e) => emit('change-select2', e))
    .on("select2:close", (e) => emit('select2-close', e))
    .on("select2:opening", (e) => emit('select2-opening', e))
    .on("select2:selecting", (e) => emit('select2-selecting', e))
    .on("select2:open", (e) => emit('select2-open', e))
    .on("select2:select", (e) => {
        updateModelValue(e.params.data)
        emit('select2-select', e)
    })
    .on("select2:unselecting", (e) => emit('select2-unselecting', e))
    .on("select2:unselect", (e) => emit('select2-unselect', e))
    .on("select2:clearing", (e) => emit('select2-clearing', e))
    .on("select2:clear", (e) => emit('select2-clear', e))

    if(props.isObject) {
        var newOption = new Option(props.modelValue.text, props.modelValue.id, false, false);
        $(`#select2-${randID.value}`).append(newOption).trigger('change');
    }
}

const destroySelect2 = () => {
    $(`#select2-${randID.value}`).select2({
        destroy: true
    })
}
onMounted(() => {
    $(`#select2-${randID.value}`).empty()
    initSelect2()
})

onUnmounted(() => {
    destroySelect2()
})

watch(() => props.options, () => {
    destroySelect2()

    setTimeout(() => {
        initSelect2()
    }, 500)
})
</script>
