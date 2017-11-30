
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

// Vue.component('modal-create-expense', require('./components/ModalCreateExpense.vue'));
// Vue.component('notification', require('./components/Notification.vue'));

Vue.component('modals-create-budget', require('./components/modals/create-budget.vue'));
Vue.component('modals-create-category', require('./components/modals/create-category.vue'));
// Vue.component('list-budgets', require('./components/ListBudgets.vue'));

Vue.component('list-budgets', require('./components/list-budgets.vue'));
Vue.component('panels-budgets', require('./components/panels/budgets.vue'));
Vue.component('panels-categories', require('./components/panels/categories.vue'));
Vue.component('panels-info-budget', require('./components/panels/infos-budget.vue'));

Vue.component('pages-list-budgets', require('./pages/list-budgets.vue'));
Vue.component('pages-show-budget', require('./pages/show-budget.vue'));

Vue.component('elements-progress-bar', require('./components/elements/progress-label.vue'));

Vue.component('modals-create-quickly-expense', require('./components/modals/create-quickly-expense.vue'));


// window.onload = function () {
// 	const app = new Vue({
// 	    el: '#app'
// 	});
// }
