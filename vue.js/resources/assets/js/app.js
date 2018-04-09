
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('hello', require('./components/Hello.vue'));



const app = new Vue({
    el: '#app',
    data: {
      results: [
        {title: "the very first post", abstract: "lorem ipsum some test dimpsum"},
        {title: "and then there was the second", abstract: "lorem ipsum some test dimsum"},
        {title: "third time's a charm", abstract: "lorem ipsum some test dimsum"},
        {title: "four the last time", abstract: "lorem ipsum some test dimsum"}
      ]
    }
});
