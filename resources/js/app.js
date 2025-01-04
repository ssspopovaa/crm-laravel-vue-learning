import './bootstrap';

import { createApp } from 'vue';
import * as VueRouter from 'vue-router';
import Home from './components/Home.vue';
import routes from './routes.js';

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
    mode:'history'
});

createApp({})
    .component('Home', Home)
    .use(router)
    .mount('#app')
