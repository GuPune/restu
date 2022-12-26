
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue');

 import Vue from 'vue';
 import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
 import store from '@store';
 import ApiService from "@services/api.service";
 import VueSweetalert2 from 'vue-sweetalert2';
import VueNumericInput from 'vue-numeric-input';
import App from './App.vue';
import VueRouter from 'vue-router';
import router from './Router/index';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';




 // If you don't need the styles, do not connect
 import 'sweetalert2/dist/sweetalert2.min.css';

 Vue.use(VueSweetalert2);

 // Install BootstrapVue
 Vue.use(BootstrapVue)
 // Optionally install the BootstrapVue icon components plugin
 Vue.use(IconsPlugin)
 Vue.use(VueNumericInput)
 Vue.use(VueRouter)

Vue.use(VueToast);


 ApiService.init();

 Vue.filter('formatNumber', (value) => {
     return parseInt(value).toLocaleString()
 })

 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */

 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))




 Vue.component('pos', require('./components/pos/Index.vue').default)
 Vue.component('res', require('./components/listres/Index.vue').default)
 Vue.component('app', require('./components/App.vue').default)

 Vue.component('order', require('./components/order/Index.vue').default)
 Vue.component('orderdrink', require('./components/orderdrink/Index.vue').default)
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */



 const app = new Vue({
     el: '#app',
     store,
     router,
     components: { App }
 });


 require('./bootstrap');






