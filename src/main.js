import Vue from 'vue'
import App from './App.vue'
import vueRouter from 'vue-router'
import router from './route'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import VModal from 'vue-js-modal'
Vue.use(VModal, { dialog: true })

// Install BootstrapVue
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'



Vue.use(vueRouter)



Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
