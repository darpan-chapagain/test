
require('./bootstrap');

window.Vue = require('vue').default;
import store from './store'
import router from './router'
import App from './App.vue'
import BootstrapVue from 'bootstrap-vue'
import "bootstrap-vue/dist/bootstrap-vue.css"
import Vuetify from '../plugins/vuetify'
import moment from 'moment';


// Vue.use(Vuex)
Vue.use(BootstrapVue)
window.moment = require('moment');
// Vue.use(require('vue-moment'));


//Register Routes

const app = new Vue({
    vuetify: Vuetify, 
    el: '#app',
    router:router,
    store:store,
    moment:moment,
    render: h=> h(App),
});


// const app = new Vue({
//     history: VueRouter.createWebHistory(),
//     router
// }).$mount('#app')