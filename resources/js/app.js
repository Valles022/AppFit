/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
import 'bootstrap/dist/js/bootstrap.min.js';
import Axios from 'axios';

import CoShowListEjerciciosEntrenamiento from './components/ShowListEjerciciosEntrenamiento.vue';
import CoShowClientes from './components/ShowClientes.vue';
import CoShowEntrenamiento from './components/ShowEntrenamiento.vue';
import CoListEntrenamientos from './components/ListEntrenamientos.vue';
import CoListEjercicios from './components/ListAddEjercicio.vue';
import CoAddEjercicio from './components/AddEjercicio.vue';
import CoShowEjercicio from './components/ShowEjercicio.vue';
import CoSearchEjercicio from './components/SearchEjercicio.vue';



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('show-list-ejercicios', CoShowListEjerciciosEntrenamiento);
Vue.component('show-clientes', CoShowClientes);
Vue.component('show-entrenamiento', CoShowEntrenamiento);
Vue.component('listado-entrenamientos', CoListEntrenamientos);
Vue.component('listado-ejercicios', CoListEjercicios);
Vue.component('add-ejercicio', CoAddEjercicio);
Vue.component('show-ejercicio', CoShowEjercicio);
Vue.component('search-ejercicio', CoSearchEjercicio);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 new Vue({
    el: '#contenedorEjercicios',
    data: function(){
        return{
            clientes:[],
            visible:false,
        }
    }
 })

new Vue({
    el: '#contenedor-clientes',
 })