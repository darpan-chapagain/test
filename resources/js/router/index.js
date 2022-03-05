import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(VueRouter)

/* Guest Component */
// const Test = () => import('../components/pages/test.vue' /* webpackChunkName: "resource/js/components/login" */)
const Test = () => import('../components/pages/dateTest.vue' /* webpackChunkName: "resource/js/components/login" */)
const Login = () => import('../components/pages/Login.vue' /* webpackChunkName: "resource/js/components/login" */)
const Register = () => import('../components/pages/Register.vue' /* webpackChunkName: "resource/js/components/register" */)
const Application = () => import('../components/pages/Application.vue' /* webpackChunkName: "resource/js/components/register" */)
const Proposal = () => import('../components/pages/Proposal.vue' /* webpackChunkName: "resource/js/components/register" */)
const Profile = () => import('../components/pages/UserProfile.vue' /* webpackChunkName: "resource/js/components/register" */)
/* Guest Component */

/* Layouts */
const DahboardLayout = () => import('../components/Layouts/Dashboard.vue' /* webpackChunkName: "resource/js/components/layouts/dashboard" */)
/* Layouts */

/* Authenticated Component */
const Dashboard = () => import('../components/pages/Dashboard.vue' /* webpackChunkName: "resource/js/components/dashboard" */)
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
    },
    {
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
        name:"application",
        path:"/application",
        component:Application,
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
        name:"proposal",
        path:"/proposal",
        component:Proposal,
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
        name:"profile",
        path:"/profile",
        component:Profile,
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
        component:DahboardLayout,
        meta:{
            middleware:"auth"
        },
        children:[
            {
                name:"dashboard",
                path: '/dashboard',
                component: Dashboard,
                meta:{
                    title:`Dashboard`
                }
            }
        ],
        // beforeRouteEnter(to, from, next) {
        //     if (!window.Laravel.isLogged) {
        //         return next('login');
        //     }
        //     next();
        // }
    }
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
