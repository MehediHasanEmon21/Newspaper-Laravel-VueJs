import Axios from "axios"

export const post = {
    namespaced: true,
    state: {
        posts: {},
        post: {},
        comments: {}
    },

    getters: {
        postList(state) {
            return state.posts
        },
        homePost(state) {
            return state.posts
        },
        singlePost(state) {
            return state.post
        },
        allComments(state) {
            return state.comments
        },
        categoriesPost(state) {
            return state.posts
        },


    },

    actions: {
        postList(context,payload) {
            Axios.get('/admin/all-post?page='+payload)
                .then((result) => {
                    context.commit('postList', result.data.posts)
                }).catch((err) => {

                });

        },
        homePost(context) {
            Axios.get('/home-post')
                .then((result) => {
                    context.commit('homePost', result.data)
                }).catch((err) => {

                });
        },
         singlePost(context,payload) {
            Axios.get('/single-post/'+payload)
                .then((result) => {
                    context.commit('singlePost', result.data)
                }).catch((err) => {

                });
        },
         allComments(context,payload) {
            Axios.get('/all-comments/'+payload)
                .then((result) => {
                    context.commit('allComments', result.data.comments)
                }).catch((err) => {

                });
        },
         allCommentsBackend(context) {
            Axios.get('/admin/all-comments')
                .then((result) => {
                    context.commit('allComments', result.data.comments)
                }).catch((err) => {

                });
        },
        categoriesPost(context,payload) {
            Axios.get('/all-categories-post/'+payload.slug+'?page='+payload.page)
                .then((result) => {
                    context.commit('categoriesPost', result.data)
                }).catch((err) => {

                });
        },
        breakingPost(context) {
            Axios.get('/admin/breaking-posts')
                .then((result) => {
                    context.commit('postList', result.data.posts)
                }).catch((err) => {

                });
        },

    },

    mutations: {
        postList(state, payload) {
            return state.posts = payload
        },
        homePost(state, payload) {
            return state.posts = payload
        },
         singlePost(state, payload) {
            return state.post = payload
        },
         allComments(state, payload) {
            return state.comments = payload
        },
          categoriesPost(state, payload) {
            return state.posts = payload
        },

    }

}
