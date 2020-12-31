import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)


import { admin } from './module/admin'
import { category } from './module/category'

export const store = new Vuex.Store({
    modules: {
        admin: admin,
        category: category
    }
})
