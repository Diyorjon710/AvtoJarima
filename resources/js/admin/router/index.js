import {createRouter, createWebHistory} from "vue-router";

const router = createRouter({
    history: createWebHistory(),

    routes: [
        {
            path: '/login',
            name: 'login',
            component: () => import('../views/Login.vue')
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: () => import('../views/Dashboard.vue')
        },
        {
            path: '/users',
            name: 'users',
            component: () => import('../views/Users.vue')
        },
        {
            path: '/cars',
            name: 'cars',
            component: () => import('../views/Cars.vue')
        },
        {
            path: '/areas',
            name: 'areas',
            component: () => import('../views/Areas.vue')
        }
    ]
})

export default router;
