
require('./bootstrap');

window.Vue = require('vue').default;
import store from './store'
import router from './router'
import App from './App.vue'
import axios from 'axios';
import BootstrapVue from 'bootstrap-vue'
import "bootstrap-vue/dist/bootstrap-vue.css"
import Vuetify from '../plugins/vuetify'
import Vuex from 'vuex'
import moment from 'moment';


Vue.use(Vuex)
Vue.use(BootstrapVue)
window.moment = require('moment');
axios.defaults.baseURL ='http://127.0.0.1:8000/api/';


//Register Routes

const app = new Vue({
    vuetify: Vuetify, 
    el: '#app',
    router,
    store,
    moment:moment,
    render: h=> h(App),
});


// const app = new Vue({
//     history: VueRouter.createWebHistory(),
//     router
// }).$mount('#app')