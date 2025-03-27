import ListProducts from "./components/ListProducts.vue";
import ListCategories from "./components/ListCategories.vue";

export default [
    {
        path: '/products',
        name: 'products',
        component: ListProducts,
    },
    {
        path: '/categories',
        name: 'categories',
        component: ListCategories,
    },
    // {
    //     path: '/settings',
    //     name: 'settings',
    //     component: UpdateSettings,
    // }
]