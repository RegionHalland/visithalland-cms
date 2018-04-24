import Vue from 'vue';
import VueRouter from 'vue-router';
import VueGeolocation from 'vue-browser-geolocation';
import VueisOffLine from 'vue-isoffline';

import Home from './Home.vue';
import Loc from './Location.vue';
import Time from './Time.vue';
import Activities from './Activities.vue';
import Results from './Results.vue';
import Navigation from './Navigation.vue';

Vue.component('Navigation', Navigation);
Vue.use(VueRouter);
Vue.use(VueGeolocation);
Vue.use(VueisOffLine);

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
    { path: '/', component: Home, name: "home", meta: { title: "Få inspiration" }, props: true },
    { path: '/location', component: Loc, name: "location", meta: { title: "Platsinformation" }, props: true },
    { path: '/time', component: Time, name: "time", meta: { title: "När vill du göra något?" }, props: true },
    { path: '/activities', component: Activities, name: "activities", meta: { title: "Vad är du intresserad av?" }, props: true },
    { path: '/results', component: Results, name: "results", meta: { title: "Våra rekommendationer" }, props: true }
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    routes, // short for `routes: routes`
    //mode: 'history'
})

// 4. Create and mount the root instance.
// Make sure to inject the router with the router option to make the
// whole app router-aware.
const app = new Vue({
    router,
    data: {
        message: "loooo"
    }
}).$mount('#app')

// Now the app has started!
