import Axios from "axios"

export const ads = {
    namespaced: true,
    state: {
        ads: {}
    },

    getters: {
        adsList(state) {
            return state.ads
        }
    },

    actions: {
        adsList(context,payload) {
            Axios.get('/admin/all-ads?page='+payload)
                .then((result) => {
                    context.commit('adsList', result.data.ads)
                }).catch((err) => {

                });

        },

    },

    mutations: {
        adsList(state, payload) {
            return state.ads = payload
        }
    }

}
