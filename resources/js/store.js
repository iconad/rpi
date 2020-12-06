import { isObject } from 'lodash';
import Vue from 'vue';


import gql from 'graphql-tag'
import productQuery from "../../gql/frontend/queries/product.gql";

import graphqlClient from './apollo';


import axios from 'axios';
import Vuex from 'vuex';
import _ from 'lodash'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        publicUrl: "http://worki.xyz/storage/",
        //Order
        selectedPaperFinishing: [],
        notSelectedPaperFinishing: [],
        selectedShirtPrinting: [],
        notSelectedShirtPrinting: [],
        selectedShirt: {
            color: "Natural"
        },
        // Product
        productGallery: [],
        product: null,
        selectedPackage: null,
        isProduct: false


    },
    mutations: {
        selectedPackage (state, payload) {
        state.selectedPackage = payload;
      },
      isProduct (state, payload) {
        state.isProduct = payload;
      },
      mutateProduct (state, payload) {
        state.product = payload;
      },
      mutateSelectedPaperFinishing (state, payload) {
        state.selectedPaperFinishing.push(payload);
      },
      mutateNotSelectedPaperFinishing (state, payload) {
        state.notSelectedPaperFinishing.push(payload);
      },
      removeSelectedPaperFin (state, payload) {
        state.selectedPaperFinishing.splice(payload, 1);
      },
      mutateSelectedShirtPrinting (state, payload) {
        state.selectedShirtPrinting.push(payload);
      },
      mutateNotSelectedShirtPrinting (state, payload) {
        state.selectedShirtPrinting.push(payload);
      },
      removSelectedShirtPrinting (state, payload) {
        state.selectedShirtPrinting.splice(payload, 1);
      },
      mutateSelectedShirtColor (state, payload) {
        state.selectedShirt.color = (payload);
      },
    //   mutateProductGallery (state, payload) {
    //     state.productGallery = payload;
    //   }
    },

    actions: {
      dipatchSelectedPaperFinishing ({ commit }, payload) {
            commit("mutateSelectedPaperFinishing", payload)
      },
      getProductGallery ({ commit }, payload) {
        // console.log(payload)

        axios.get(`/api/products/${payload}/gallery`).then(response => {
            this.gallery = response.data.gallery
        });

      },
        async getProduct({ commit }, pid) {
        commit('isProduct', false)
        const response = await graphqlClient.query({
          query: productQuery,
          variables: { id: pid },
        });
        commit('mutateProduct', response.data.product)
        commit('isProduct', true)
      },


    },




  })









