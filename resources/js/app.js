/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import * as  VueGoogleMaps from 'vue2-google-maps'

Vue.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyAgLMkLWoC5jneYQtSiIMkQjFkeCo05B20',
        libraries: 'places'
    }
});

//
// import VueRouter from 'vue-router';
// Vue.use(VueRouter);
//
// import VueAxios from 'vue-axios';
// import axios from 'axios';
// Vue.use(VueAxios, axios);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('languages-component', require('./components/LanguagesComponent.vue').default);
Vue.component('banner-component', require('./components/BannerComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('owl-component', require('./components/OwlComponent.vue').default);
Vue.component('tabs-section-component', require('./components/TabsSectionComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);
Vue.component('article-component', require('./components/ArticleComponent').default);
Vue.component('new-component', require('./components/NewComponent').default);
Vue.component('service-component', require('./components/ServiceComponent').default);
Vue.component('page-header-component', require('./components/PageHeader').default);
Vue.component('about-content-component', require('./components/AboutPageContentComponent').default);
Vue.component('news-main-content-component', require('./components/NewsPageMainContent').default);
Vue.component('news-second-content-component', require('./components/NewsPageSecondContent').default);
Vue.component('page-map-component', require('./components/PageMapComponent').default);
Vue.component('page-counter-component', require('./components/PageCounter').default);
Vue.component('page-values-component', require('./components/CompanyValues').default);
Vue.component('partners-component', require('./components/PartnersComponent').default);
Vue.component('contacts-page-content-component', require('./components/ContactsPageContent').default);
Vue.component('testimonials-block', require('./components/TestimonialsBlock').default);
Vue.component('testimonials-page-content-component', require('./components/TestimonialsPageContent').default);
Vue.component('testimonials-page-form', require('./components/TestimonialsForm').default);

var app = new Vue({
    el: '#app'
});
