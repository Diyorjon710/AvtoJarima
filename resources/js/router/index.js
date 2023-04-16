import {createWebHistory, createRouter} from "vue-router";
import MainView from "../views/MainView.vue";
import store from "../store";

const routes = [
    {
        path: "/",
        name: "Main",
        component: MainView,
    },
    {
        path: "/car-info",
        name: "Car",
        component: () => import("../views/CarView.vue"),
        meta: {
            requireData: true,
        }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const data = to.meta.requireData;

    if (data && store.getters.getCarData) {
        next();
    } else if(data && !store.getters.getCarData) {
        next('/?number=noData');
    } else {
        next();
    }
});

export default router;
