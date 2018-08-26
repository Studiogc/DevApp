
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

Vue.component('categoria', require('./components/Categoria.vue'));
Vue.component('card', require('./components/Card.vue'));

const app = new Vue({
    el: '#app',
    data:{
        menu : 0
    }
});
