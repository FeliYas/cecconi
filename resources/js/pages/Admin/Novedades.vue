<script setup>
import DashboardLayout from '@/layouts/DashboardLayout.vue';
import DataTable from '@/components/DataTable.vue';


defineOptions({
    layout: DashboardLayout
});

const columns = ['orden', 'path', 'epigrafe', 'titulo', 'descripcion'];

const createRoute = route('novedades.store');
const updateRoute = (id) => route('novedades.update', { id });
const deleteRoute = (id) => route('novedades.destroy', { id });

const props = defineProps({
    logo: {
        type: String,
        required: true
    },
    novedades: {
        type: Array,
        required: true
    },
});
</script>

<template>
    <div>
        <div class="py-3 text-xl text-gray-700">
            <h1>Novedades</h1>
        </div>
        <hr class="border-t-[3px] border-main-color rounded">
        <DataTable :columns="columns" :data="novedades" :createRoute="createRoute" :updateRoute="updateRoute"
            :deleteRoute="deleteRoute" recomendacion="808x422" />
    </div>
</template>
