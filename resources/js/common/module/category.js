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
        categoryList(context) {
            Axios.get('/admin/all-category')
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
