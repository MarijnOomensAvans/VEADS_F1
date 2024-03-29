
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

Vue.use(require('vue-the-mask'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('project-search-component', require('./components/ProjectSearchComponent.vue').default);
Vue.component('event-search-component', require('./components/EventSearchComponent.vue').default);
Vue.component('partner-search-component', require('./components/PartnerSearchComponent.vue').default);
Vue.component('volunteer-add-project-component', require('./components/VolunteerAddProjectComponent.vue').default);
Vue.component('volunteer-add-event-component', require('./components/VolunteerAddEventComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
