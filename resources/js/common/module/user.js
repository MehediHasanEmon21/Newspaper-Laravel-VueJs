import Axios from "axios"

export const user = {
    namespaced: true,
    state: {
        user: {}
    },

    getters: {
        getUser(state) {
            return state.user
        }
    },

    actions: {

        getUser(context) {

            let token = localStorage.getItem('user_access_token')

            if (token) {
                Axios.get('/user/get-user?token='+token)
                .then((result) => {
                    context.commit('getUser', result.data.user)
                }).catch((err) => {

                });
            } else {
                context.commit('getUser', {user: ''})
            }



        },



    },

    mutations: {
        getUser(state, payload) {
            return state.user = payload
        }
    }

}
