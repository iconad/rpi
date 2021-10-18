import { isObject } from 'lodash';
import Vue from 'vue';
import axios from 'axios';
import Vuex from 'vuex';
import _ from 'lodash'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {
        publicUrl: "https://printo.ae/storage/",
        productGallery: [],
        isSidebar: false,
        sidebarType: null,
        editingTable: null,
        isSizeEdit: false,
        newFinishings: [],


    },
    mutations: {
      mutateProductGallery (state, payload) {
        state.productGallery = payload;
      },
      isSidebar (state, payload) {
        state.isSidebar = payload;
      },
      isSizeEdit (state, payload) {
        state.isSizeEdit = payload;
      },
      sidebarType (state, payload) {
        state.sidebarType = payload;
      },
      editingTable (state, payload) {
        state.editingTable = payload;
      },
      newFinishings (state, payload) {
          if (payload == 'clear') {
              state.newFinishings = []
          }else{
            state.newFinishings.push(payload);
          }
      },
      deleteSizePriceFromPackage (state, payload) {
        state.editingTable.data.sizes.splice(payload, 1);
      }
    },

    actions: {
      getProductGallery ({ commit }, payload) {
        axios.get(`/api/products/${payload}/gallery`).then(response => {
            commit("mutateProductGallery", response.data.data)
        });

      }
    },
  })







