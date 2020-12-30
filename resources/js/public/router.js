import Vue from 'vue'


import VueRouter from 'vue-router'


Vue.use(VueRouter)

Vue.component('public-master', require('../components/public/PublicMaster.vue').default);

import HomeComponent from '../components/public/Home.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: HomeComponent,
            name: 'Home'
        }

    ]
})

export default router;
