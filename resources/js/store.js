import { isObject } from 'lodash';
import Vue from 'vue';
import axios from 'axios';
import Vuex from 'vuex';
import _ from 'lodash'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        publicUrl: "http://127.0.0.1:8001/storage/",
        //Order
        selectedPaperFinishing: [],
        notSelectedPaperFinishing: [],
        selectedShirtPrinting: [],
        notSelectedShirtPrinting: [],
        selectedShirt: {
            color: "Natural"
        },
        productGallery: ['hello']


    },
    mutations: {
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

      }
    },
  })







