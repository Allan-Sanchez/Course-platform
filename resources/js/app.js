/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


// Vue.component('stripe-form', require('./components/stripeFormComponents.vue').default);
import StripeForm from './components/stripeFormComponents.vue';
Vue.component('stripe-form', StripeForm);


const app = new Vue({
    el: '#app',
});
