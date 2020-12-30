import Axios from "axios"

export const admin = {
    namespaced: true,
    state: {
        admin: {}
    },

    getters: {
        getAdmin(state) {
            return state.admin
        }
    },

    actions: {
        getAdmin(context) {
            Axios.post('/api/admin/me?token='+localStorage.getItem('admin_access_token'))
                .then((result) => {
                    context.commit('getAdmin', result.data)
                }).catch((err) => {

                });

        },
    },

    mutations: {
        getAdmin(state, payload) {
            return state.admin = payload
        }
    }

}
