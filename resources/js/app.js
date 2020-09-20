/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import SurveyForm from './components/SurveyForm.vue';

Vue.use(VueRouter)
Vue.component('SurveyForm', require('./components/SurveyForm.vue').default);

const router = new VueRouter({
   routes
})

const routes = [{
    path: '*',
    component: SurveyForm,
    name: 'SurveyForm'
}];

const app = new Vue({
    el: '#app', // #app of the app.blade (views)
    router
});
