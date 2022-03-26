import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(VueRouter)

/* Guest Component */
const Test2 = () => import('../components/pages/chat.vue' /* webpackChunkName: "resource/js/components/login" */)
const Test = () => import('../components/pages/categoryTest.vue' /* webpackChunkName: "resource/js/components/login" */)
const Login = () => import('../components/pages/Login.vue' /* webpackChunkName: "resource/js/components/login" */)
const Register = () => import('../components/pages/Register.vue' /* webpackChunkName: "resource/js/components/register" */)
const PostJob = () => import('../components/pages/PostJob.vue' /* webpackChunkName: "resource/js/components/register" */)
const Proposal = () => import('../components/pages/PostJob.vue' /* webpackChunkName: "resource/js/components/register" */)
const Requests = () => import('../components/pages/Requests.vue' /* webpackChunkName: "resource/js/components/register" */)
const UserProfile = () => import('../components/pages/UserProfile.vue' /* webpackChunkName: "resource/js/components/register" */)
const ARequest = () => import('../components/pages/Arequest.vue' /* webpackChunkName: "resource/js/components/register" */)
const Application = () => import('../components/pages/Application.vue' /* webpackChunkName: "resource/js/components/register" */)
/* Guest Component */

/* Layouts */
const DahboardLayout = () => import('../components/Layouts/Dashboard.vue' /* webpackChunkName: "resource/js/components/layouts/dashboard" */)
/* Layouts */

/* Authenticated Component */
const EmployeeDashboard = () => import('../components/pages/EmployeeDashboard.vue' /* webpackChunkName: "resource/js/components/dashboard" */)
const UserDashboard = () => import('../components/pages/UserDashboard.vue' /* webpackChunkName: "resource/js/components/dashboard" */)
/* Authenticated Component */


const Routes = [
    {
        name:"login",
        path:"/login",
        component:Login,
        meta:{
            middleware:"guest",
            title:`Login`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },{
        name:"test",
        path:"/test",
        component:Test,
        meta:{
            middleware:"guest",
            title:`Login`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },{
        name:"test",
        path:"/test2",
        component:Test2,
        meta:{
            middleware:"guest",
            title:`Login`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },
    {
        name:"register",
        path:"/register",
        component:Register,
        meta:{
            middleware:"guest",
            title:`Register`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },
    {
        path:"/",
        name: 'dashboard',
        component:DahboardLayout,
        children:[
            {
                name:"UserDashboard",
                path: '/user/dashboard',
                component: UserDashboard,
                // beforeEnter: (to, from, next) => {
                //     let role = store.getters['auth/authenticated']
                //     if(role == 1){
                //         next()
                //     }
                //     if(role == 3){
                //         router.push({
                //             name: 'EmployeeDashboard'
                //         })
                //     }
                // }
                
            },
            {
                name:"EmployeeDashboard",
                path: '/employee/dashboard',
                component: EmployeeDashboard,
                
            }
        ],
        beforeEnter: (to, from, next) => {
            if (!store.getters['auth/authenticated']){
                return next({
                    name: 'login'
                })
            }
            next()
        }
        // beforeRouteEnter(to, from, next) {
        //     if (!window.Laravel.isLogged) {
        //         return next('login');
        //     }
        //     next();
        // }
    },
    {
        name:"postJob",
        path:"/post-job",
        component:PostJob,
        meta:{
            middleware:"guest",
            title:`PostJob`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },
    {
        name:"proposal",
        path:"/proposal",
        component:Proposal,
        meta:{
            middleware:"guest",
            title:`proposal`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },
    {
        name:"requests",
        path:"/requests",
        component:Requests,
        meta:{
            middleware:"guest",
            title:`Requests`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },
    {
        name:"profile",
        path:"/profile",
        component:UserProfile,
        meta:{
            middleware:"guest",
            title:`Profile`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },
    {
        name:"request",
        path:"/request",
        component:ARequest,
        meta:{
            middleware:"guest",
            title:`request`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },
    {
        name:"application",
        path:"/application",
        component:Application,
        meta:{
            middleware:"guest",
            title:`Application`
        },
        // beforeRouteEnter(to, from, next) {
        //     if (window.Laravel.isLogged) {
        //         return next('dashboard');
        //     }
        //     next();
        // }
    },
]

var router  = new VueRouter({
    mode: 'history',
    routes: Routes
})

// router.beforeEach((to, from, next) => {
//     document.title = `${to.meta.title} - ${process.env.MIX_APP_NAME}`
//     if(to.meta.middleware=="guest"){
//         if(store.state.auth.authenticated){
//             console.log(store.state.auth.authenticated)
//             next({path:"/login"})
//         }
//         else{
//             next({path:"/login"})
//         }
//         next()
//     }else{
//         if(store.state.auth.authenticated){
//             next()
//         }else{
//             next({path:"/login"})
//         }
//     }
// })

export default router
