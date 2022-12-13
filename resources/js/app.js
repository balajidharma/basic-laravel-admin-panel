import './bootstrap';

import Alpine from 'alpinejs';
import {createApp} from 'vue';
import products from './components/products/index';

// const app = createApp({});
// app.component('products-grid',ProductsGrid);
// app.mount('#app')


const vm = createApp(products).mount("#app");


global.$ = global.jQuery = require('jquery');

window.Alpine = Alpine;
Alpine.start();
