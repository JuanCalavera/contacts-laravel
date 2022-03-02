import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const routes = [
    {name: 'home', path: '/', component: require('./components/pages/Contacts.vue').default},
    {name: 'single', path: '/single-contact', component: require('./components/pages/SingleContact.vue').default},
];

export default new VueRouter({
    routes,
    mode: 'history'
});