<template>
    <div class="userSetting">
        <div>
            <appHeader></appHeader>
        </div>
        <section class="row userContent">

            <div class="sidebar col-md-3">
                <b-nav vertical>
                    <b-nav-item @click="componentType='profile'" class="usermenu">
                        <p>My Profile</p>

                    </b-nav-item>
                    <b-nav-item @click="componentType='editProfile'" class="usermenu">
                        <p> Edit Profile</p>

                    </b-nav-item>
                    <b-nav-item @click="componentType='ManagePlainte'" class="usermenu">
                        <p>Vos Plaintes</p>

                    </b-nav-item>
                    <hr>
                    <!--  <b-nav-item @click="componentType='deleteProfile'" class="usermenu">
                        <p>Change the password</p>
                       
                    </b-nav-item>-->
                </b-nav>
            </div>

            <div class="list col-md-9">
                <!--<h3>Insert dynamic componenet</h3>-->
                <div v-if="componentType">
                    <keep-alive>
                        <component :is="componentType"></component>
                    </keep-alive>
                </div>
            </div>
        </section>
        <div>
            <appFooter></appFooter>
        </div>

        <!-- <hr style="height:1px;border-width:0;color:gray;background-color:gray">-->
    </div>
</template>

<script>
    import appHeader from '../pages/HeaderContent'
    import appFooter from '../pages/AppFooter'
    import ManagePlainte from './ManagePlainte'
    import editProfile from './EditProfile'
    import profile from './MyProfile'
    import deleteProfile from './deleteProfile'
    export default {

        name: 'UserSetting',
        components: {
            ManagePlainte,
            appHeader,
            appFooter,
            profile,
            editProfile,
            deleteProfile
        },
        data() {
            return {
                componentType: profile

            }

        },
        /* created () {
             if(this.componentType=="profile"){
                //<router-link :to="{ name: 'user', params: { userId: 123 }}">User</router-link>
                 this.$router.push({ name: 'userSetting', params: {p:'profile' } }) // -> /user/123
             }else{
                  this.$router.push({ name: 'userSetting', params: {p:'editProfile' } }) // -> /user/123
             }
         },*/

        /*  mounted(){
              if(this.$router.push({path:'/profile'} )){
                  this.$router.push({path:'/userSetting'} )
              }
          },
          computed: {
                currentTabComponent: function() {
                  return "tab-" + this.currentTab.toLowerCase();
                }
          }*/
    };
</script>

<style scoped>
    .usermenu p:hover {
        background-color: #ccbfc0;
    }

    .userContent {
        margin-top: 30px;
        /* height: 550px;*/
    }

    .sidebar {
        margin: 20px 0px 20px 0px;
        margin: 5% auto;
        position: relative;
        padding: 25px 5px 25px 15px;
        border-radius: 3px;
        box-shadow: 0 0 30px rgba(17, 16, 16, 0.13);
        /* background-color: ##f4f5e7;*/
        min-height: 100vh;
    }

    .usermenu p {
        color: black;
        font-size: 20px;
    }

    .userSetting {
        background-color: #f4f5e7;
        min-height: 100vh;
    }
</style>