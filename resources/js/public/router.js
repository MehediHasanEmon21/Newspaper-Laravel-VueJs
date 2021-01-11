import Vue from 'vue'


import VueRouter from 'vue-router'


Vue.use(VueRouter)

Vue.component('public-master', require('../components/public/PublicMaster.vue').default);

import HomeComponent from '../components/public/Home.vue'
import DetailsComponent from '../components/public/Details.vue'
import LoginComponent from '../components/public/Login.vue'
import LogoutComponent from '../components/public/Logout.vue'
import RegisterComponent from '../components/public/Register.vue'
import ContactComponent from '../components/public/Contact.vue'
import CategoriesComponent from '../components/public/Categories.vue'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/',
            component: HomeComponent,
            name: 'Home'
        },
        {
            path: '/details/:slug',
            component: DetailsComponent,
            name: 'Details'
        },
        {
            path: '/categories/:slug',
            component: CategoriesComponent,
            name: 'Categories'
        },
        {
            path: '/user/user-login',
            component: LoginComponent,
            name: 'Login'
        },
         {
            path: '/user/user-register',
            component: RegisterComponent,
            name: 'Register'
        },
         {
            path: '/contact',
            component: ContactComponent,
            name: 'Contact'
        },
         {
            path: '/user/user-logout',
            component: LogoutComponent,
            name: 'Logout'
        },

    ]
})

export default router;
