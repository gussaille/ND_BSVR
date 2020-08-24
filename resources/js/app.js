/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue';
import VueRouter from 'vue-router';
import QuestionSurvey from './components/QuestionSurvey.vue';

Vue.use(VueRouter)
Vue.component('question-survey', require('./components/QuestionSurvey.vue').default);


const router = new VueRouter({
   routes
})


const routes = [{
    path: '*',
    component: QuestionSurvey,
    name: 'question-survey'
}];

const app = new Vue({
    el: '#app',
    router
});
