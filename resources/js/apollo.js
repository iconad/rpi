import VueApollo from 'vue-apollo'
import { ApolloClient } from 'apollo-client'
import { createHttpLink } from 'apollo-link-http'
import { InMemoryCache } from 'apollo-cache-inmemory'

export default new ApolloClient({
    // Provide the URL to the API server.
    link: new createHttpLink({ uri: 'http://rpiuae.ae/graphql' }),
    // Using a cache for blazingly
    // fast subsequent queries.
    cache: new InMemoryCache(),
});
