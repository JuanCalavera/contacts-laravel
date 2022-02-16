require('./bootstrap');

window.Vue = require('vue').default;
import router from './router';

Vue.component('contacts', require('./Main.vue').default);
const app = new Vue({
    el: '#app',
    router
});