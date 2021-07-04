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
        selectedPaperFinishingExtraPrice: null,
        selectedPaperFinishingExtraDays: null,
        notSelectedPaperFinishing: [],
        selectedShirtPrinting: [],
        notSelectedShirtPrinting: [],
        // Product
        productGallery: [],
        product: null,
        selectedPackage: null,
        isProduct: false,
        printingDays: {
            front: 0,
            back: 0,
            sleeves: 0
        },
        printingPrice: {
            front: 0,
            back: 0,
            sleeves: 0
        },


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
        state.selectedPaperFinishingExtraPrice = _.sum(state.selectedPaperFinishing.map(e => e.price));
        state.selectedPaperFinishingExtraDays = _.sum(state.selectedPaperFinishing.map(e => e.days));
      },
      mutateNotSelectedPaperFinishing (state, payload) {
        state.notSelectedPaperFinishing.push(payload);
      },
      removeSelectedPaperFin (state, payload) {
        state.selectedPaperFinishing.splice(payload, 1);
        state.selectedPaperFinishingExtraPrice = _.sum(state.selectedPaperFinishing.map(e => e.price));
        state.selectedPaperFinishingExtraDays = _.sum(state.selectedPaperFinishing.map(e => e.days));
      },
      mutateSelectedShirtPrinting ( state, payload) {
        state.selectedShirtPrinting.push(payload);

        if(state.selectedShirtPrinting.length != 0) {
            state.selectedShirtPrinting.map(s => {
                if(s.options['front side']) {
                    state.printingPrice.front += s.options['front side'].price
                    state.printingDays.front += s.options['front side'].days
                }
                if(s.options['back side']) {
                    state.printingPrice.back += s.options['back side'].price
                    state.printingDays.back += s.options['back side'].days
                }
                if(s.sleaves.length != 0) {
                    state.printingPrice.sleeves += _.sum(s.sleaves.map(s => s.price))
                    state.printingDays.sleeves += _.sum(s.sleaves.map(s => s.days))
                }
            })
        }else{
            state.printingPrice.front = 0
            state.printingPrice.back = 0
            state.printingPrice.sleeves = 0

            state.printingDays.front = 0
            state.printingDays.back = 0
            state.printingDays.sleeves = 0
        }

      },
      mutateNotSelectedShirtPrinting (state, payload) {
        state.selectedShirtPrinting.push(payload);
      },
      clearSelectedShirtPrinting (state, payload) {
        state.selectedShirtPrinting = [];

        state.printingPrice.front = 0
        state.printingPrice.back = 0
        state.printingPrice.sleeves = 0

        state.printingDays.front = 0
        state.printingDays.back = 0
        state.printingDays.sleeves = 0
      },
      removSelectedShirtPrinting (state, payload) {
        state.selectedShirtPrinting.splice(payload, 1);

        if(state.selectedShirtPrinting.length != 0) {
            state.selectedShirtPrinting.map(s => {
                if(s.options['front side']) {
                    state.printingPrice.front -= s.options['front side'].price
                    state.printingDays.front -= s.options['front side'].days
                }
                if(s.options['back side']) {
                    state.printingPrice.back -= s.options['back side'].price
                    state.printingDays.back -= s.options['back side'].days
                }
                if(s.sleaves.length != 0) {
                    state.printingPrice.sleeves -= _.sum(s.sleaves.map(s => s.price))
                    state.printingDays.sleeves -= _.sum(s.sleaves.map(s => s.days))
                }
            })
        }else{
            state.printingPrice.front = 0
            state.printingPrice.back = 0
            state.printingPrice.sleeves = 0

            state.printingDays.front = 0
            state.printingDays.back = 0
            state.printingDays.sleeves = 0

        }



      },

    //   mutateSelectedShirtColor (state, payload) {
    //     state.selectedShirt.color = (payload);
    //   },
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









