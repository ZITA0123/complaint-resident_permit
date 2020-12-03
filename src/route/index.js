import Home from '../components/dashboard/Home.vue'
import CarteSejour from '../components/Cartes_Sejour/Cartes.vue'
import RDV from '../components/Cartes_Sejour/appointment.vue'
import Plaintes from '../components/gestion_Plaintes/plaintes.vue'
import identite from '../components/gestion_Plaintes/Identite.vue'
import Fait from '../components/gestion_Plaintes/Faits.vue'
import testSidebar from '../components/gestion_Plaintes/TestSidebar'
import Fait2 from '../components/gestion_Plaintes/Faits2.vue'
import Confirm from '../components/gestion_Plaintes/Confirmation.vue'
import contact from '../components/gestion_Plaintes/ContactRendezVS.vue'
import Forum from '../components/Forum/Forum.vue'
import UserSetting from '../components/dashboard/userProfile/UserSetting.vue'
import login from '../components/dashboard/registration/Login.vue'
import register from '../components/dashboard/registration/Register.vue'
import test from '../components/dashboard/registration/test.vue'


import Vue from 'vue'
import Router from 'vue-router' 
Vue.use(Router)

export default new Router({
    routes: [
      {path:'/',name:'home', component:Home},
      {path:'/contact',name:'contact', component:contact},
      {path:'/fait',name:'fait', component:Fait},
      {path:'/sidebar',name:'sidebar', component:testSidebar},
      {path:'/fait2',name:'fait2', component:Fait2},
      {path:'/identite',name:'identite', component:identite},
      {path:'/confirm',name:'confirm', component:Confirm},
     // {path:'/register',name:'register', component:Register},
      {path:'/gestion_cartes_sejour',name:'gestionCartes', component:CarteSejour},
      {path:'/rdv',name:'rdv', component:RDV},
      {path:'/gestion_plaintes',name:'gestionPlaintes', component:Plaintes},
      {path:'/forum',name:'forum', component:Forum},
      {path:'/login',name:'login', component:login},
      {path:'/register',name:'register', component:register},
      {path:'/test',name:'test', component:test},
      

      {path:'/userSetting',name:'userSetting', component:UserSetting}
     /* children:[
        {
          path:'/profile',name:'profile', component:MyProfile
        },
        {
          path:'/editProfile',name:'editProfile', component:EditProfile
        }
      ]*/
    
      
    ],
    mode:'history'
  })