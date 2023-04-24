import '../bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from "./router";
import store from "./store";
import axios from "axios";

// const settings = {
//     apiKey: '290b07a7-a3b9-46ab-ac3a-568bda05ed05',
//     lang: 'ru_RU',
//     coordorder: 'latlong',
//     enterprise: false,
//     version: '2.1'
// }

const app = createApp(App);

app
    .use(router)
    .use(store)
    .mount('#app');
