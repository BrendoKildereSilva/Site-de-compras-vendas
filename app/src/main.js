
import { createApp } from 'vue'
import App from './App.vue'

import './assets/main.css';
import router from '@plugins/router.js';
import LayoutDefalt from '@layouts/defalt.vue';
import LayoutAuth from '@layouts/auth.vue';

createApp(App)
.use(router)
.component('layout-defalt', LayoutDefalt)
.component('layout-auth', LayoutAuth)
.mount('#app')
