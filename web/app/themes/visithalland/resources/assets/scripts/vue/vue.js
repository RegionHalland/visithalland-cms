import Vue from 'vue';
import VueRouter from 'vue-router';
import VueGeolocation from 'vue-browser-geolocation';
import VueisOffLine from 'vue-isoffline';
import VueAnalytics from 'vue-analytics'
import '../autoload/icons';

// Used to detect language
import i18next from 'i18next';
import LngDetector from 'i18next-browser-languagedetector';
import VueI18Next from '@panter/vue-i18next';

import Progress from './Progress.vue';
import Home from './Home.vue';
import Loc from './Location.vue';
import Time from './Time.vue';
import Activities from './Activities.vue';
import Results from './Results.vue';
import Navigation from './Navigation.vue';
import Shimmer from './Shimmer.vue';

Vue.component('Shimmer', Shimmer);
Vue.component('Navigation', Navigation);
Vue.use(VueRouter);
Vue.use(VueGeolocation);
Vue.use(VueisOffLine);
Vue.use(VueI18Next);
i18next.use(LngDetector);
i18next.init({
    fallbackLng: {
        'nb': ['sv'],
        'nn': ['sv'],
        'default': ['en']
    }
});

const i18n = new VueI18Next(i18next);

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
    {
        path: '/', component: Progress, name: "progress", props: true, children:
            [
                { path: '', component: Home, name: "home", meta: { order: 1, title: "Få inspiration" }, props: true },
                { path: 'location', component: Loc, name: "location", meta: { order: 2, title: "location" }, props: true },
                { path: 'time', component: Time, name: "time", meta: { order: 3, title: "time" }, props: true },
                { path: 'activities', component: Activities, name: "activities", meta: { order: 4, title: "activities" }, props: true },
                { path: 'results', component: Results, name: "results", meta: { order: 5, title: "results" }, props: true }
            ]
    },
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes, // short for `routes: routes`
    base: "/coastal-living/a-day-in-halland",
    mode: 'history'
})

// Add analytics page tracking
Vue.use(VueAnalytics, {
    id: 'UA-89278649-4',
    checkDuplicatedScript: true,
    router, 
    autoTracking: {
        pageviewTemplate(route) {
            return {
                page: "coastal-living/a-day-in-halland" + route.path,
                title: route.name,
                location: window.location.href
            }
        }
    }
})

// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.
const app = new Vue({
    router,
    i18n,
    data: {
        transitionName: "fade"
    },
}).$mount('#app')

// Now the app has started!
