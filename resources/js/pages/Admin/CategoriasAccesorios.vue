<script setup>
import DashboardLayout from '@/layouts/DashboardLayout.vue';
import DataTable from '@/components/DataTable.vue';


defineOptions({
    layout: DashboardLayout
});

// Definición de las columnas
const columns = ['orden', 'titulo'];

// Definición de rutas
const createRoute = route('accesorioscategorias.store');
const updateRoute = (id) => route('accesorioscategorias.update', { id });
const deleteRoute = (id) => route('accesorioscategorias.destroy', { id });

const props = defineProps({
    logo: {
        type: String,
        required: true
    },
    categorias: {
        type: Array,
        required: true
    },
});
</script>

<template>
    <div>
        <div class="py-3 text-xl text-gray-700">
            <h1>Categorias de Accesorios</h1>
        </div>
        <hr class="border-t-[3px] border-main-color rounded">
        <DataTable :columns="columns" :data="categorias" :createRoute="createRoute" :updateRoute="updateRoute"
            :deleteRoute="deleteRoute"/>
    </div>
</template>
