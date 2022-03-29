import axios from "axios";
import router from "../router";

export default {
    namespaced: true,

    state: {
        token: null,
        user: null,
        role: null,
        authenticate: false,
    },

    getters: {
        user(state) {
            return state.user;
        },

        getRole(state) {
            return state.role;
        },
        authenticated(state) {
            return state.authenticate;
        },
    },

    mutations: {
        SET_TOKEN(state, token) {
            state.token = token;
        },
        SET_USER(state, user) {
            console.log("test: ", user);
            console.log("test: ", state.user);
            state.user = user;
            console.log("test2: ", state.user);
        },
        SET_ROLE(state, role) {
            state.role = role;
        },
        SET_AUTHENTICATED(state, data) {
            state.authenticate = data;
        },
    },
    actions: {
        async login({ dispatch }, credentials) {
            await axios.get('/sanctum/csrf-cookie')
            let response = await axios.post("/login", credentials);

            return dispatch("attempt", response.data.token).then(() =>
                router.push({ name: "dashboard" })
            );
        },
        async register(_, credentials) {
            let response = await axios({
                method: 'post',
                url: '/register',
                data: credentials,
                headers: {
                    'Content-Type': 'multipart/form-data'

                }
            });
            router.push({ name: "login" });

            console.log(response.data.token);
        },
        async attempt({ commit }, token) {
            commit("SET_TOKEN", token);

            try {
                let response = await axios.get("/me/data");
                commit("SET_USER", response.data.user);
                commit("SET_ROLE", response.data.role);
                commit("SET_AUTHENTICATED", true);
            } catch (e) {
                commit("SET_TOKEN", null);
                commit("SET_USER", null);
                commit("SET_ROLE", null);
                commit("SET_AUTHENTICATED", false);
            }
        },
        signOut({ commit }) {
            return axios.post("/logout").then(() => {
                commit("SET_TOKEN", null);
                commit("SET_USER", null);
                commit("SET_ROLE", null);
                commit('SET_AUTHENTICATED', false)
                localStorage.removeItem('token')
            });
        },
    },
};
