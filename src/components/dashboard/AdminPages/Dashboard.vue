<template>

  <div class="tout  ">
    <div class="row struct">
      <div class="col-md-2 sidebar">
        <!--<b-icon icon="list-ul" font-scale="2" class="icon" v-b-toggle.sidebar-1>Toggle Sidebar</b-icon>
        <b-sidebar id="sidebar-1" visible="true" no-close-on-esc title="" shadow></b-sidebar>-->
         <div>
            <b-nav vertical >
               <b-nav-item  @click="componentType='manageUser'" class="menu"><p>Manage User</p></b-nav-item>
              <b-nav-item  @click="componentType='manageRdv'" class="menu"><p>Manage RDVs</p></b-nav-item>
              <b-nav-item  @click="componentType='managePlainte'" class="menu"><p>Manage Complaints</p></b-nav-item>
             <!-- <b-nav-item  @click="componentType='manageAgent'; changeStyle()" class="menu"><p  :style="filterStyle">Manage Agents</p></b-nav-item>
             use many function in @click()-->

             <!-- <b-nav-item disabled>Disabled</b-nav-item>-->
            </b-nav>
          </div>
      </div>
      <div class="col-md-10 manage" >
         <h3  v-if="componentType">{{name}} </h3>
        <hr> <br>
          <div v-if="componentType"  >
                    <keep-alive>
                        <component :is="componentType"></component>
                    </keep-alive>
                </div>
      </div>

    </div>
  </div>

</template>
<script>
import manageUser from './MUsers'
import managePlainte from './MPlainte'
import manageRdv from './MRdvs'
  export default {
  methods: {
   /* changeStyle(){
       this.filterStyle.background="red"
    }*/
  },
  data () {
    return {
       componentType: manageUser,
      /* filterStyle: {
            top: 0,
            background: "#dfe4ea",
            marginTop: "15px",
            marginBottom: "15px",
        },*/
    }
  },
    components: {
      manageUser,
      managePlainte ,
      manageRdv

    },
    computed:{
      name(){
        if(this.componentType=="manageUser"){
            return "Manage User"
        } else if(this.componentType=="manageRdv"){
          return " Manage Appointment"
        }else if(this.componentType=="managePlainte") {
           return "Manage Complaint"
        }else{
          return "Admin Dashboard"
        }
         
      }
    },
     created () {
       
            //if(this.componentType=="profile"){
               /* <router-link :to="{ name: 'user', params: { userId: 123 }}">User</router-link>*/
               /* this.$router.push({ name: 'userSetting', params: {p:'profile' } }) // -> /user/123
            }else{
                 this.$router.push({ name: 'userSetting', params: {p:'editProfile' } }) // -> /user/123
            }
            */
        },

  }
</script>
<style scoped>
/*background-image: url("../../../../public/static/background/rouge.jpg");*/
.menu p{
  color: black;
  font-size: 20px;
}
.menu p:hover{
  background-color:#917c7d;
}
.manage{
 padding:25px 5px 25px 10px;
 
}
  .sidebar{
    margin: 20px 0px 20px 0px;
    margin: 0 auto;
    position: relative;
    padding:25px 5px 25px 15px;
    border-radius: 3px;
    box-shadow: 0 0 40px rgba(17, 16, 16, 0.13);
    background-color: #d5d6bd;
    min-height: 100vh;
     
  }
  .tout {
    display: flex;
    flex-direction: column;
    background-color: #e7e7fa;
   /* min-height: 100%;*/
     min-height: 100vh;
  }

  .siz {
    width: 100%;
  }
  .icon{
    float: left;
  }
</style>