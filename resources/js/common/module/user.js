import Axios from "axios"

export const user = {
    namespaced: true,
    state: {
        user: {},
        users: {}
    },

    getters: {
        getUser(state) {
            return state.user
        },
         userList(state) {
            return state.users
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

        userList(context) {

            Axios.get('/admin/all-users')
            .then((result) => {
                context.commit('userList', result.data.users)
            }).catch((err) => {

            });




        },



    },

    mutations: {
        getUser(state, payload) {
            return state.user = payload
        },
        userList(state, payload) {
            return state.users = payload
        }
    }

}
