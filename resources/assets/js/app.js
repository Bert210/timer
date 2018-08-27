
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
Vue.component('timer', require('./components/Timer.vue'));
Vue.component('newjobmodal', require('./components/Modal/NewJobModal.vue'));
// Vue.component('timeformatter', require('./components/Util/Formatters/TimeFormatter.vue'));
Vue.component('timeformatter', require('./components/Util/Formatters/TimeFormatter.vue'));
Vue.component('startendtimeformatter', require('./components/Util/Formatters/StartEndTimeFormatter.vue'));


const app = new Vue({
    el: '#app'
});