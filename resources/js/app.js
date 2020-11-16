/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window._ = require('lodash');
window.Vue = require("vue");
import Vuex from 'vuex'

import VueAwesomeSwiper from 'vue-awesome-swiper'
import Viewer from 'v-viewer'
import VTooltip from 'v-tooltip'
import VModal from 'vue-js-modal'
import { VLazyImagePlugin } from "v-lazy-image";

// import PrettyCheckbox from 'pretty-checkbox-vue/check';
// import VueSweetalert2 from 'vue-sweetalert2';

import VueApollo from 'vue-apollo'
import { ApolloClient } from 'apollo-client'
import { createHttpLink } from 'apollo-link-http'
import { InMemoryCache } from 'apollo-cache-inmemory'


// HTTP connection to the API
const httpLink = createHttpLink({
    // You should use an absolute URL here
    uri: 'http://127.0.0.1:8000/graphql',
})

// Cache implementation
const cache = new InMemoryCache()

// Create the apollo client
const apolloClient = new ApolloClient({
    link: httpLink,
    cache,
})

const apolloProvider = new VueApollo({
    defaultClient: apolloClient,
})


require('./components')

Vue.use(Vuex)
Vue.use(VueAwesomeSwiper);
Vue.use(Viewer);
Vue.use(VTooltip)
Vue.use(VModal)
Vue.use(VueApollo)
Vue.use(VLazyImagePlugin)


import { store } from './store.js';

const app = new Vue({
    el: "#app",
    store,
    apolloProvider
});
