import './bootstrap';

import jQuery from 'jquery';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import { createRouter, createWebHistory } from 'vue-router';

import Routes from './routes.js';

import PrimeVue from 'primevue/config';

import ToastService from 'primevue/toastservice';

import Aura from '@primeuix/themes/aura';

import Button from "primevue/button"
import Dialog from 'primevue/dialog';
import { Form, FormField } from '@primevue/forms';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from 'primevue/inputtext';
import InputNumber from 'primevue/inputnumber';
import Select from 'primevue/select';
import Toast from 'primevue/toast';
import Message from 'primevue/message';

const app = createApp({});

const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});

app.use(router);

app.use(PrimeVue, {
    // Default theme configuration
    theme: {
        preset: Aura,
        options: {
            prefix: 'p',
            darkModeSelector: 'system',
            cssLayer: false
        }
    }
});

app.use(ToastService);

app.component('Button', Button);
app.component('Dialog', Dialog);
app.component('DataTable', DataTable);
app.component('Column', Column);
app.component('InputText', InputText);
app.component('InputNumber', InputNumber);
app.component('Select', Select);
app.component('Toast', Toast);
app.component('Message', Message);
app.component('Form', Form).component('FormField', FormField);

app.mount('#app');