
/*import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/auth'

export default new Vuex.Store({
  state: {
    user: null,
    users:[]
  },

  mutations: {
    setUserData (state, userData) {
      state.user = userData
      localStorage.setItem('user', JSON.stringify(userData))
      axios.defaults.headers.common.Authorization = `Bearer ${userData.token}`
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











    /*
    clearUserData () {
      localStorage.removeItem('user')
      location.reload()
    },
    CREATE_USER(state, user) {
      state.users.unshift(user)
  },
  FETCH_USERS(state, users) {
      return state.users = users
  },
  DELETE_USER(state, user) {
      let index = state.users.findIndex(item => item.id === user.id)
      state.users.splice(index, 1)
  }
  */
 /*
  },

  actions: {
  /*1er
    login ({ commit }, credentials) {
      return axios
        .post('/login', credentials)
        .then(({ data }) => {
          commit('setUserData', data)
        })
    },
*/

    /* 1er
    
    */
   /*
   logout ({ commit }) {
    commit('clearUserData')
  },

   /*2ieme
    logout({commit}){
      return new Promise((resolve, reject) => {
        commit('logout')
        localStorage.removeItem('token')
        delete axios.defaults.headers.common['Authorization']
        resolve()
      })
    },

*/

/*
    createUser({commit},user) {
      axios.post('/register', user)
          .then(res => {
              commit('CREATE_USER', res.data)
          }).catch(err => {
          console.log(err)
      })

  },
  */
 /*
  register({commit}, user){
    return new Promise((resolve, reject) => {
      commit('auth_request')
      axios({url:'/login', data: user, method: 'POST' })
      .then(resp => {
        const token = resp.data.token
        const user = resp.data.user
        localStorage.setItem('token', token)
        axios.defaults.headers.common['Authorization'] = token
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

  login({commit}, user){
    return new Promise((resolve, reject) => {
      commit('auth_request')
      axios({url: '/login', data: user, method: 'POST' })
      .then(resp => {
        const token = resp.data.token
        const user = resp.data.user
        localStorage.setItem('token', token)
        axios.defaults.headers.common['Authorization'] = token
        commit('auth_success', token, user)
        resolve(resp)
      })
      .catch(err => {
        commit('auth_error')
        localStorage.removeItem('token')
        reject(err)
      })
    })
},

  /*
  fetchUsers({commit}) {
      axios.get('/users')
          .then(res => {
              commit('FETCH_USERS', res.data)
          }).catch(err => {
          console.log(err)
      })
  },
  deleteUser({commit}, user) {
      axios.delete(`/users/${user.id}`)
          .then(res => {
              if (res.data === 'ok')
                  commit('DELETE_USER',user)
          }).catch(err => {
          console.log(err)
      })
  }
  */
/*
  },

  getters : {
    isLogged: state => !!state.user,
   users: state => state.users,
   authStatus: state => state.status,
  }
  
})
*/