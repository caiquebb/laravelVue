
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'Vuex';

Vue.use(Vuex);

// Vuex

const store = new Vuex.Store({
    state: {
        item: {}
    },
    mutations: {
        setItem(state, obj) {
            state.item = obj;
        }
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('vue-top', require('./components/Top.vue'));
Vue.component('vue-page', require('./components/Page.vue'));
Vue.component('vue-panel', require('./components/Panel.vue'));
Vue.component('vue-box', require('./components/Box.vue'));
Vue.component('vue-list-table', require('./components/ListTable.vue'));
Vue.component('vue-breadcrumbs', require('./components/Breadcrumbs.vue'));
Vue.component('vue-modal-content', require('./components/modal/Content.vue'));
Vue.component('vue-modal-button', require('./components/modal/Button.vue'));
Vue.component('vue-form', require('./components/Form.vue'));
Vue.component('vue-article-card', require('./components/ArticleCard.vue'));

import VueCkeditor from 'vue-ckeditor2';

const app = new Vue({
    el: '#app',
    components: {
        VueCkeditor
    },
    store,
    mounted: function () {
        document.getElementById('app').style.display = "block";
    }
});
