
require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//Router imported
import {routes} from './routes';

// window.Vue = require('vue').default;


const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    router
});
