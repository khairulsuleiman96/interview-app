<template>
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Categories</h1>
        </div>
    </header>
    <main class="bg-white shadow-sm">
        <div class="px-4 py-4">
            <Button type="button" class="mb-4" label="Add New" icon="bi bi-plus" :loading="loading" @click="visible = true"/>

            <DataTable v-model:value="categories" paginator showGridlines :rows="10" dataKey="id" :loading="loading"
                    sortField="id" :sortOrder="1">
                <template #empty> No products found. </template>
                <template #loading> Loading products. Please wait. </template>
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
            </DataTable>
        </div>
    </main>

    <!-- Components -->
    <Toast />

    <Dialog v-model:visible="visible" modal header="Edit Profile" :style="{ width: '25rem' }" @hide="clearForm">
        <Form class="flex flex-col gap-4 w-full">
            <FormField name="name" class="flex flex-col gap-1">
                <InputText v-model="form.name" type="text" placeholder="Name" />
                <Message v-if="formErrors.name" severity="error" size="small" variant="simple">{{ formErrors.name[0] }}</Message>
            </FormField>
            
            <Button type="button" severity="secondary" label="Save" @click="addCategories" />
            <Button type="button" label="Cancel" severity="secondary" @click="visible = false"></Button>
        </Form>
    </Dialog>
</template>

<script setup>
import axios from 'axios';
import { ref, onMounted, reactive } from 'vue';
import { useToast } from 'primevue/usetoast';

const toast = useToast();

const visible = ref(false); //to control modal
const loading = ref(true);

const categories = ref([]); //make variable reactive

const form = reactive({
    name: "",
});

const formErrors = ref({}); // to store laravel errors

const getCategories = () => {
    loading.value = true;
    axios.get('/api/categories')
    .then((response) => {
        categories.value = response.data;
        loading.value = false;
    });
}

const addCategories = () => {
    axios.post('/api/categories', form)
    .then((response) => {
        // toast.add({
        //     severity: 'success',
        //     summary: 'Category Added!',
        //     detail: 'Category added successfully.',
        //     life: 3000, // milliseconds
        // });
        // categories.value.unshift(response.data);
        formErrors.value = {};
        visible.value = false;
    }).catch((error) => {
        if (error.response) {
            if(error.response.status === 422){
                formErrors.value = error.response.data.errors;
            } else {
                toast.add({
                    severity: 'error',
                    summary: 'Operation failed.',
                    detail: 'Failed to add category.',
                    life: 3000,
                });
            }
        }
    });
};

const clearForm = () => {
    formErrors.value = {};
    Object.assign(form, { name: ''});
}

onMounted(() => {
    Echo.channel(`list-categories`).listen('.categories.added', (e) => {
        toast.add({
            severity: 'success',
            summary: 'New Category Added!',
            detail: `A new category, "${e.category.name}" was added.`,
            life: 3000,
        });
        categories.value.unshift(e.category);
    });
    getCategories();
});

</script>