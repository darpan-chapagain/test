import axios from "axios";
import router from '../router'


export default({
    namespaced: true,
    
    state: {
        token: null, 
        user: null,
        role: null,
        authenticated: false,
    },

    getters: {
        authenticated(state) {
            return state.authenticated
        },

        user (state){

            console.log(state.user);
            return state.user
        },

        getRole (state){
            return state.role
        }
    },

    mutations: {
        SET_TOKEN (state, token) {
            
            state.token = token
        }, 
        SET_USER (state, user) {
            state.user = user
        },
        SET_ROLE (state, role){
            state.role = role
        },
        SET_AUTHENTICATED (state){
            if(state.token && state.user){
                state.authenticated = true
            }
            console.log(state.authenticated);
        }
    },
    actions: {
        async login ({ dispatch }, credentials) {
            let response = await axios.post('/login', credentials);
            
            return dispatch('attempt', response.data).then(() => router.push({name:'UserDashboard'}));
        },
        async register(_, credentials){
            let response = await axios.post('/register', credentials);
            $router.push({name:'login'})
            
            console.log(response.data);
        },
        async attempt ({ commit }, data) {
            commit('SET_TOKEN', data.token)

            try{
                let response = await axios.get('/me/data')
                console.log(response.data, response.data);
                commit('SET_USER', response.data.user);
                commit('SET_ROLE', response.data.role);
                commit('SET_AUTHENTICATED', response.data);
            } catch (e){
                    commit('SET_TOKEN', null);
                    commit('SET_USER', null);
                    commit('SET_ROLE', null);
            }
        }
    },
})