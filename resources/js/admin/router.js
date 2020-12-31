import Vue from 'vue'


import VueRouter from 'vue-router'


Vue.use(VueRouter)


Vue.component('admin-master', require('../components/admin/AdminMaster.vue').default)

import AdminDashboard from '../components/admin/AdminDashboard'

//category component
import CategoryAdd from '../components/admin/category/CategoryAdd'
import CategoryList from '../components/admin/category/CategoryList'
import CategoryEdit from '../components/admin/category/CategoryEdit'

import AdminLogin from '../components/admin/auth/AdminLogin'

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
