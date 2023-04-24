import { createApp } from 'vue';
import App from './AppAdmin.vue';
import router from "./router";
import axios from "axios";

const app = createApp(App);
app
    .use(router)
    .mount('#app-admin');
