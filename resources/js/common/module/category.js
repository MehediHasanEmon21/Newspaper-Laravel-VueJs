import Axios from "axios"

export const category = {
    namespaced: true,
    state: {
        categoryList: {}
    },

    getters: {
        categoryList(state) {
            return state.categoryList
        }
    },

    actions: {
        categoryList(context,payload) {
            Axios.get('/admin/all-category?page='+payload)
                .then((result) => {
                    context.commit('categoryList', result.data.categories)
                }).catch((err) => {

                });

        },
        allCategory(context) {

             Axios.get('/admin/all-categories')
                .then((result) => {
                    context.commit('categoryList', result.data.categories)
                }).catch((err) => {

                });

        },
        frontendCategory(context) {
            Axios.get('/all-categories')
                .then((result) => {
                    context.commit('categoryList', result.data.categories)
                }).catch((err) => {

                });
        },


    },

    mutations: {
        categoryList(state, payload) {
            return state.categoryList = payload
        }
    }

}
