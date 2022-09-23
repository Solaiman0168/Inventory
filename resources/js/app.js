
require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
// import Bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min.js'
import * as bootstrap from 'bootstrap';

Vue.use(VueRouter)

//Router imported
import {routes} from './routes';

// Import user class
import User from './Helpers/User';
window.User = User;

// Import Notification class
import Notification from './Helpers/Notification';
window.Notification = Notification;

//Import Sweet alert start
import Swal from 'sweetalert2';
// const Swal = require('sweetalert2');
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });




  window.Toast = Toast;
// Sweet alert end

// window.Vue = require('vue').default;
window.Reload = new Vue();


const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'history'
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


const app = new Vue({
    el: '#app',
    router
});
