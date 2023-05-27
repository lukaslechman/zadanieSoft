import './bootstrap';


import {createApp} from 'vue';
import App from './Vue/app.vue';
import router from './Vue/router'
createApp(App).use(router).mount('#app');
