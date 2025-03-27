<template>
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Categories</h1>
        </div>
    </header>
    <main class="bg-white shadow-sm">
        <div class="px-4 py-4">
            <DataTable v-model:value="categories" paginator showGridlines :rows="10" dataKey="id" :loading="loading"
                sortField="id" :sortOrder="1">
            <template #empty> No categories found. </template>
            <template #loading> Loading categories. Please wait. </template>
            <Column field="id" header="ID" sortable>
                <template #body="{ data }">
                    {{ data.id }}
                </template>
            </Column>
            <Column field="name" header="Name" style="min-width: 12rem" sortable>
                <template #body="{ data }">
                    {{ data.name }}
                </template>
            </Column>
        </DataTable>
        </div>
    </main>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';

const categories = ref([]); //make variable reactive

const getCategories = () => {
    axios.get('/api/categories')
    .then((response) => {
        categories.value = response.data;
    });
}

onMounted(() => {
    getCategories();
});

</script>