/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import Survey from './components/Survey.vue';

Vue.use(VueRouter)
Vue.component('survey', require('./components/Survey.vue').default);

const router = new VueRouter({
   routes
})

const routes = [{
    path: '*',
    component: Survey,
    name: 'survey'
}];

const app = new Vue({
    el: '#app', // #app of the app.blade (views)
    router
});
