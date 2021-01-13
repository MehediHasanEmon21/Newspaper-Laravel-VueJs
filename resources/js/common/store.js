import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)


import { category } from './module/category'
import { post } from './module/post'
import { ads } from './module/ads'
import { user } from './module/user'
import { setting } from './module/setting'

export const store = new Vuex.Store({
    modules: {
        category: category,
        post: post,
        ads: ads,
        user: user,
        setting: setting,
    }
})
