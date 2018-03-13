
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./fontawesome-all');

import vmodal from 'vue-js-modal'

window.Vue = require('vue');
Vue.use(vmodal, { dialog: true });
/**
 * Instantiate all the custom components
 */
Vue.component('s-checkbox', require('./components/Checkbox.vue'));
Vue.component('s-switch', require('./components/Switch.vue'));
Vue.component('s-radio', require('./components/Radio.vue'));
Vue.component('s-table', require('./components/Table.vue'));

const app = new Vue({
    el: '#app'
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
