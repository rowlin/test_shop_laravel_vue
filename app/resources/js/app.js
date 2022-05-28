/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */



/*
const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
*/

Vue.component('shopListComponent', require('./components/ShopListComponent.vue').default);
Vue.component('slider' , require('./components/Slider.vue').default );
Vue.component('addToCart' , require('./components/AddToCart').default);
Vue.component('printList' , require('./components/PrintList').default);
Vue.component('sideBarComponent' , require('./components/SideBarComponent').default );
Vue.component('cart-button' , require('./components/CartButton').default);
import VueCookies from 'vue-cookies'
Vue.use(VueCookies)

//maybe better to use vuex
import Store from './store'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    data: Store,
    el: '#app',
});
