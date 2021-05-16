import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

//import { api, setToken, clearToken } from "../api";


/*
export const api = axios.create({
  baseURL: "https://conduit.productionready.io/api"
});

export function setToken(jwt) {
  api.defaults.headers.common["Authorization"] = `Token ${jwt}`;
}

export function clearToken() {
  delete api.defaults.headers.common["Authorization"];
}
© 2021 GitHub, In
*/ 
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    status: '',
    token: localStorage.getItem('token') || '',
    user : {},
    profile: null,
   
  },
  mutations: {
    initialisePlainte(state){
      if (localStorage.getItem('plainte')) {
        state.plainte
      }
    },
    updateMessage (state, message) {
      state.message = message
     
    },
    updatePlainte (state, plainte) {
      localStorage.setItem('plainte',plainte)
      state.plainte = plainte
    },
  
        auth_request(state){
          state.status = 'loading'
        },
        auth_success(state, token, user){
          state.status = 'success'
          state.token = token
          state.user = user
        },
        auth_error(state){
          state.status = 'error'
        },
        logout(state){
          state.status = ''
          state.token = ''
        },
     
      setUser(state, payload) {
        state.user = payload;
      },

  },
  actions: {
    
    getUser: async function({ commit }) {
      const user = await axios.get("http://127.0.0.1:8000/api/user");
      commit("setUser", user);
    },

    login({commit}, user){
        return new Promise((resolve, reject) => {
          commit('auth_request')
          axios({url: 'http://127.0.0.1:8000/api/auth/login', data: user, method: 'POST' })
          .then(resp => {
            const token = resp.data.token
            const user = resp.data.user
           
            localStorage.setItem('token', token)
            axios.defaults.headers.common['Authorization'] = token
            commit('auth_success', token, user)
            commit("setUser", user);
            resolve(resp)
          })
          .catch(err => {
            commit('auth_error')
            localStorage.removeItem('token')
            reject(err)
          })
        })
    },

    register({commit}, user){
        return new Promise((resolve, reject) => {
          commit('auth_request')
          axios({url: 'http://127.0.0.1:8000/api/auth/register', data: user, method: 'POST' })
          .then(resp => {
            const token = resp.data.token
            const user = resp.data.user
            localStorage.setItem('token', token)
            axios.defaults.headers.common['Authorization'] = token
           // axios.defaults.headers.common.Authorization = `Bearer ${token}`;

            commit('auth_success', token, user)
            resolve(resp)
          })
          .catch(err => {
            commit('auth_error', err)
            localStorage.removeItem('token')
            reject(err)
          })
        })
      },

      logout({commit}){
        return new Promise((resolve) => {
          commit('logout')
          localStorage.removeItem('token')
          delete axios.defaults.headers.common['Authorization']
          resolve()
        })
      }

  },
  getters : {
    isLoggedIn: state => !!state.token,
    authStatus: state => state.status,
    myUser: state => state.user,
    username(state) {
      return (state.user && state.user.username) || null;
    }
  },
 /* modules: {
    users,
    plaintes
  }*/
  
})