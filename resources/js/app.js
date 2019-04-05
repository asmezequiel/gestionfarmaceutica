
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('bootstrap/dist/css/bootstrap.css');

window.Vue = require('vue');
import Vue from 'vue'
import axios 	from 'axios'
import BootstrapVue from 'bootstrap-vue'
import "bootstrap/dist/css/bootstrap.css";
import "bootstrap-vue/dist/bootstrap-vue.css";

Vue.use(BootstrapVue);

//import index from "./components/index/Index.vue";

import Dashboard from './components/Admin/Dashboard';


const app = new Vue({
    el: '#app',
    components: { 
    	//'index' : index,
    	"dashboard" : Dashboard,
    },
    template: '<dashboard/>',
});
