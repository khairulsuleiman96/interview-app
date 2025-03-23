import Dashboard from "./components/Dashboard.vue";
import ListUsers from "./components/ListUsers.vue";

export default [
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
    },
    {
        path: '/users',
        name: 'users',
        component: ListUsers,
    },
    // {
    //     path: '/settings',
    //     name: 'settings',
    //     component: UpdateSettings,
    // }
]