import Vue from 'vue'
import App from './App.vue'
import vueRouter from 'vue-router'
import router from './route'
//import store from './store'
import axios from 'axios'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import VModal from 'vue-js-modal'
Vue.use(VModal, { dialog: true })


import VueCookie from 'vue-cookie'
Vue.use(VueCookie )

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import store from './store/store'
import plainteStore from './store/plainteStore'

Vue.use(vueRouter)
import { ValidationProvider } from 'vee-validate/dist/vee-validate.full.esm';
import { ValidationObserver} from 'vee-validate';

Vue.component('ValidationProvider',ValidationProvider);
Vue.component('ValidationObserver',ValidationObserver);


/*Use V-Calendar */
import VCalendar from 'v-calendar';

// Use v-calendar & v-date-picker components
Vue.use(VCalendar, {
  componentPrefix: 'vc',  // Use <vc-calendar /> instead of <v-calendar />
  //Now use vc-calendar and vc-date-picker
});
/*Use V-Calendar */






Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);

// Install BootstrapVue
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)
Vue.use(axios)

Vue.prototype.$http = axios;

/*Auto-Authentication:
Right now if we refresh the app, we do have the state correctly 
set to the previous token. However, the authorization Axios header isn’t set. Let’s fix it! */
const token = localStorage.getItem('token')
if (token) {
  Vue.prototype.$http.defaults.headers.common['Authorization'] = token
}


export const bus=new Vue();

Vue.config.productionTip = false

/*Authentication
https://www.digitalocean.com/community/tutorials/handling-authentication-in-vue-using-vuex
Vuex
https://github.com/maoberlehner/vuex-map-fields
https://vuex.vuejs.org/fr

RDV
https://medium.com/js-dojo/getting-start-with-vue-scheduler-b9a91bd4d14e

2nd authentication
https://pusher.com/tutorials/laravel-vue-axios
https://dev.to/romanpaprotsky/vue-js-token-based-authentication-with-laravel-sanctum-3a84

*/
new Vue({
  router,
  store,
  plainteStore,
  beforeCreate() { this.$store.commit('initialisePlainte');},
  /*
  created () {
    const userInfo = localStorage.getItem('user')
    if (userInfo) {
      const userData = JSON.parse(userInfo)
      this.$store.commit('setUserData', userData)
    }
    axios.interceptors.response.use(
      response => response,
      error => {
        if (error.response.status === 401) {
          this.$store.dispatch('logout')
        }
        return Promise.reject(error)
      }
    )

  },*/
  render: h => h(App),
  
}).$mount('#app')

/*router.beforeEach((to, from, next) => {
  const loggedIn = localStorage.getItem('user')

  if (to.matched.some(record => record.meta.auth) && !loggedIn) {
    next('/login')
    return
  }
  next()
})
*/
