import Axios from "axios"

export const setting = {
    namespaced: true,
    state: {
        settings: {}
    },

    getters: {
        settingList(state) {
            return state.settings
        }
    },

    actions: {
        settingList(context) {
            Axios.get('/admin/all-settings')
                .then((result) => {
                    context.commit('settingList', result.data.settings)
                }).catch((err) => {

                });

        },

    },

    mutations: {
        settingList(state, payload) {
            return state.settings = payload
        }
    }

}
