/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

// uncomment these for production
Vue.config.performance = false;
Vue.config.devtools = false;
Vue.config.debug = false;
Vue.config.silent = true;

Vue.component('job-counter', require('./components/JobCounter.vue'));
Vue.component('search-results', require('./components/SearchResults.vue'));
Vue.component('custom-job-puff', require('./components/CustomJobPuff.vue'));
Vue.component('job-puff', require('./components/JobPuff.vue'));

const app = new Vue({
    el: 'body',
    data:{
        applicationFormShowing: false
    },
    methods:{
        toggleApplicationForm: function(){
            this.applicationFormShowing = !this.applicationFormShowing;
        },

        resetSearchFilters: function(){
            $(".filters option[selected]").removeAttr('selected');
            $(".defaultOption").attr('selected','selected');
        }
    }
});
