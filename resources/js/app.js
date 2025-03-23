import './bootstrap';

import jQuery from 'jquery';

import { createApp } from 'vue/dist/vue.esm-bundler.js';

import { createRouter, createWebHistory } from 'vue-router';

import Routes from './routes.js';

import PrimeVue from 'primevue/config';

import Aura from '@primeuix/themes/aura';

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

app.mount('#app');