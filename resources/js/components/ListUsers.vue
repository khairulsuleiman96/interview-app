<template>
    <header class="bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Users</h1>
        </div>
    </header>
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <DataTable v-model:value="users" paginator showGridlines :rows="10" dataKey="id" :loading="loading"
                sortField="id" :sortOrder="1">
            <template #empty> No users found. </template>
            <template #loading> Loading users data. Please wait. </template>
            <Column field="id" header="ID" style="min-width: 12rem" sortable>
                <template #body="{ data }">
                    {{ data.id }}
                </template>
            </Column>
            <Column field="name" header="Name" style="min-width: 12rem" sortable>
                <template #body="{ data }">
                    {{ data.name }}
                </template>
            </Column>
            <Column field="email" header="Name" style="min-width: 12rem" sortable>
                <template #body="{ data }">
                    {{ data.email }}
                </template>
            </Column>
        </DataTable>
        </div>
    </main>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';

import DataTable from 'primevue/datatable';
import Column from 'primevue/column';

const users = ref([]); //make variable reactive

const getUsers = () => {
    axios.get('/api/users')
    .then((response) => {
        users.value = response.data;
    });
}

onMounted(() => {
    getUsers();
});

</script>