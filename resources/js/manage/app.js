require('./../bootstrap');
window.Vue = require("vue");
import Vuex from 'vuex'

import VTooltip from 'v-tooltip'
import VModal from 'vue-js-modal'
import PrettyCheckbox from 'pretty-checkbox-vue/check';
import VueApollo from 'vue-apollo'
import VueSweetalert2 from 'vue-sweetalert2';
import { VLazyImagePlugin } from "v-lazy-image";

import { ApolloClient } from 'apollo-client'
import { createHttpLink } from 'apollo-link-http'
import { InMemoryCache } from 'apollo-cache-inmemory'

// HTTP connection to the API
const httpLink = createHttpLink({
    // You should use an absolute URL here
    uri: 'https://www.printo.ae/graphql',
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


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(Vuex)
Vue.use(VTooltip)
Vue.use(VModal)
Vue.use(VueApollo)
Vue.use(VueSweetalert2);
Vue.use(VLazyImagePlugin)
Vue.use(require('vue-moment'));

Vue.component( "p-check", PrettyCheckbox);

import { store } from './store';

const app = new Vue({
    el: "#app",
    store,
    apolloProvider
});

