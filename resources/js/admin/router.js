import Vue from 'vue'


import VueRouter from 'vue-router'


Vue.use(VueRouter)


Vue.component('admin-master', require('../components/admin/AdminMaster.vue').default)

import AdminDashboard from '../components/admin/AdminDashboard'

//category component
import CategoryAdd from '../components/admin/category/CategoryAdd'
import CategoryList from '../components/admin/category/CategoryList'
import CategoryEdit from '../components/admin/category/CategoryEdit'

//post component
import PostAdd from '../components/admin/post/PostAdd'
import PostEdit from '../components/admin/post/PostEdit'
import PostList from '../components/admin/post/PostList'

//ads component
import AddsAdd from '../components/admin/ads/AddsAdd'
import AddsEdit from '../components/admin/ads/AddsEdit'
import AddsList from '../components/admin/ads/AddsList'

import AdminLogin from '../components/admin/auth/AdminLogin'
import AdminLogout from '../components/admin/auth/AdminLogout'

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        //auth route
        {
            path: '/admin/admin-login',
            component: AdminLogin,
            name: 'AdminLogin'
        },
        {
            path: '/admin/dashboard',
            component: AdminDashboard,
            name: 'AdminDashboard'
        },
        {
            path: '/admin/logout',
            component: AdminLogout,
            name: 'AdminLogout'
        },
        //category route
        {
            path: '/admin/category-add',
            component: CategoryAdd,
            name: 'CategoryAdd'
        },
         {
            path: '/admin/category-list',
            component: CategoryList,
            name: 'CategoryList'
        },
        {
            path: '/admin/category-edit/:slug',
            component: CategoryEdit,
            name: 'CategoryEdit'
        },

        //post route

        {
            path: '/admin/post-add',
            component: PostAdd,
            name: 'PostAdd'
        },
         {
            path: '/admin/post-list',
            component: PostList,
            name: 'PostList'
        },
        {
            path: '/admin/post-edit/:slug',
            component: PostEdit,
            name: 'PostEdit'
        },

        //ads route

        {
            path: '/admin/ads-add',
            component: AddsAdd,
            name: 'AddsAdd'
        },
         {
            path: '/admin/ads-list',
            component: AddsList,
            name: 'AddsList'
        },
        {
            path: '/admin/ads-edit/:id',
            component: AddsEdit,
            name: 'AddsEdit'
        },

    ]
})

router.beforeEach((to, from, next) => {

    let isAuthenticated = '';
    let admin_token = localStorage.getItem('admin_access_token') ? localStorage.getItem('admin_access_token') : false
    if (admin_token) {

        isAuthenticated = admin_token ? true : false;

    } else {
        isAuthenticated = false;
    }

    if (to.name !== 'AdminLogin' && !isAuthenticated) next({ name: 'AdminLogin' })
    else if (to.name === 'AdminLogin' && isAuthenticated) next({ name: 'AdminDashboard' })
    else next()
})

export default router;
