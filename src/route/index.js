import Home from '../components/dashboard/Home.vue'
import CarteSejour from '../components/Cartes_Sejour/Cartes.vue'
import RDV from '../components/Cartes_Sejour/appointment.vue'
//import RDVS from '../components/Cartes_Sejour/rdvs.vue'
import Plaintes from '../components/gestion_Plaintes/plaintes.vue'
import identite from '../components/gestion_Plaintes/Identite.vue'


import contact from '../components/gestion_Plaintes/ContactRendezVS.vue'
import Forum from '../components/Forum/Forum.vue'
import UserSetting from '../components/dashboard/userProfile/UserSetting.vue'
import UserPlainte  from '../components/dashboard/userProfile/DetailsPlainte'
import UserUpdatePlainte from '../components/dashboard/userProfile/UpdatePlainte'
import login from '../components/dashboard/registration/Login.vue'
import register from '../components/dashboard/registration/Register.vue'




/////////// ADMINISTRATION
import AdminView from '../components/dashboard/AdminPages/Dashboard.vue'
import MUsers from '../components/dashboard/AdminPages/MUsers.vue'
import MRdvs from '../components/dashboard/AdminPages/MRdvs.vue'
import addUser from '../components/dashboard/AdminPages/AddUser.vue'


///////////AGENT  ADMINISTRATION
import AgentView from '../components/dashboard/AgentPages/Dashboard.vue'
import ManageUser from '../components/dashboard/AgentPages/MUsers.vue'
import ManageRdv from '../components/dashboard/AgentPages/MRdvs.vue'
import detailsPlainte from  '../components/dashboard/AgentPages/DetailsPlainte'



import Vue from 'vue'
import Router from 'vue-router' 
import store from '../store/store'

Vue.use(Router)

let router = new Router({
    routes: [
    
      /////Site Web Page
      {path:'/',name:'home', component:Home},
      {path:'/contact',name:'contact', component:contact},
      {path:'/identite',name:'identite', component:identite,
        meta: {
          requiresAuth: true}
      },
      {path:'/gestion_cartes_sejour',name:'gestionCartes', component:CarteSejour},
      {path:'/rdv',name:'rdv', component:RDV,
          meta: {
            requiresAuth: true,
          },
      },
      {path:'/gestion_plaintes',name:'gestionPlaintes', component:Plaintes},
      {path:'/forum',name:'forum', component:Forum},
      
      
     
     // {path:'/register',name:'register', component:Register},

      ////Registration
      {path:'/login',name:'login', component:login},

      {path:'/register',name:'register',
      beforeEnter:store.getters.isLoggedIn,
       component:register},

      ///ADMINISTRATION AdminView
      {  path:'/dashboard',name:'dashboard',
          meta: {
            requiresAuth: true,
            adminOnly: true, 
          },
            component:AdminView
      },
      {  path:'/admin',name:'admin',
      //beforeEnter: requireAuth,
      meta: {
        requiresAuth: true,
        adminOnly: true, 
      },
        component:MUsers
      },

      {  path:'/mrdv',name:'mrdv',
          //beforeEnter: requireAuth,
          meta: {
            requiresAuth: true,
            adminOnly: true, 
          },
            component:MRdvs
          },

            
        {path:'/addUser',
          name:'addUser',
        
          component:addUser
         },

     //// USER PROFILE
        {path:'/userSetting',name:'userSetting', component:UserSetting},
        {path:'/userdetailPlainte',name:'userdetailPlainte', component:UserPlainte},
        {path:'/updatePlainte',name:'updatePlainte', component:UserUpdatePlainte},
     /* children:[
        {
          path:'/profile',name:'profile', component:MyProfile
        },
        {
          path:'/editProfile',name:'editProfile', component:EditProfile
        }
      ]*/

  ///AGENT ADMINISTRATION 
  {  path:'/agentdashboard',name:'agentdashboard',
    meta: {
      requiresAuth: true,
      admin_Agent_Only: true, 
    },
      component:AgentView
  },
  {  path:'/detailPlainte',name:'detailsPlainte',
    meta: {
      requiresAuth: true,
      admin_Agent_Only: true, 
    },
      component:detailsPlainte
  },
  {  path:'/agent_user',name:'agent_user',
 
      meta: {
      requiresAuth: true,
      admin_Agent_Only: true, 
      },
      component:ManageUser
  },

  {  path:'/agent_rdv',name:'agent_rdv',
    
      meta: {
        requiresAuth: true,
        admin_Agent_Only: true, 
      },
        component:ManageRdv
    },


        { path: '*', redirect: '/' },
    
      
    ],
    mode:'history'
  })

  router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
      if (store.getters.isLoggedIn) {
        next()
        return
      }
      next('/login')
    } else {
      next()
    }
  });
  router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.adminOnly)) {
      if ( localStorage.getItem('permission')==2) {
        next()
        return
      }
      next('/')
    } else {
      next()
    }
  });
  router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.admin_Agent_Only)) {
      if ( localStorage.getItem('permission')>0) {
        next()
        return
      }
      next('/')
    } else {
      next()
    }
  });
 
 


/* Admin Route Check
  router.beforeEach((to, from, next) => {
    if(to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('jwt') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath }
            })
        } else {
            let user = JSON.parse(localStorage.getItem('user'))
            if(to.matched.some(record => record.meta.is_admin)) {
                if(user.is_admin == 1){
                    next()
                }
                else{
                    next({ name: 'userboard'})
                }
            }else {
                next()
            }
        }
    } else if(to.matched.some(record => record.meta.guest)) {
        if(localStorage.getItem('jwt') == null){
            next()
        }
        else{
            next({ name: 'userboard'})
        }
    }else {
        next()
    }
})
*/


  export default router
 