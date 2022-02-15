
require('./bootstrap');

window.Vue = require('vue').default;
import store from './store'
import router from './router'
import App from './App.vue'
import BootstrapVue from 'bootstrap-vue'
import "bootstrap-vue/dist/bootstrap-vue.css"
import Vuetify from '../plugins/vuetify'


// Vue.use(Vuex)
Vue.use(BootstrapVue)


//Register Routes

const app = new Vue({
    vuetify: Vuetify, 
    el: '#app',
    router:router,
    store:store,
    render: h=> h(App)
});


// const app = new Vue({
//     history: VueRouter.createWebHistory(),
//     router
// }).$mount('#app')