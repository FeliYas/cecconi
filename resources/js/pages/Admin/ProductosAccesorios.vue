<script setup>
import DashboardLayout from '@/layouts/DashboardLayout.vue';
import DataTable from '@/components/DataTable.vue';


defineOptions({
    layout: DashboardLayout
});

// Definición de las columnas
const columns = ['orden', 'path', 'titulo', 'descripcion', 'accesorio_categoria_id'];

// Definición de rutas
const createRoute = route('accesoriosproductos.store');
const updateRoute = (id) => route('accesoriosproductos.update', { id });
const deleteRoute = (id) => route('accesoriosproductos.destroy', { id });
const destacadoRoute = (id) => route('accesoriosproductos.toggleDestacado', { id });

const props = defineProps({
    logo: {
        type: String,
        required: true
    },
    categorias: {
        type: Array,
        required: true
    },
    productos: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <div>
        <div class="py-3 text-xl text-gray-700">
            <h1>Productos</h1>
        </div>
        <hr class="border-t-[3px] border-main-color rounded">
        <DataTable :columns="columns" :data="productos.map(p => ({ ...p, galeria: p.galeria || [] }))"
            entityType="accesorio" :categorias="categorias" :createRoute="createRoute" :updateRoute="updateRoute"
            :deleteRoute="deleteRoute" :toggleDestacadoRoute="destacadoRoute" recomendacion="600x600px"/>
    </div>
</template>
