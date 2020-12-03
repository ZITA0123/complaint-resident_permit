<template>
    <div class="userSetting">
        <div >
            <appHeader></appHeader>
        </div>
        <section class="row userContent">

            <div class="userSidebar col-md-3">
                <b-nav vertical>
                    <b-nav-item @click="componentType='profile'"  class="usermenu">
                        <p>My Profile</p>
                       
                    </b-nav-item>
                    <b-nav-item @click="componentType='editProfile'" class="usermenu">
                        <p> Edit Profile</p>
                       
                    </b-nav-item>
                    <hr>
                  <!--  <b-nav-item @click="componentType='deleteProfile'" class="usermenu">
                        <p>Change the password</p>
                       
                    </b-nav-item>-->
                </b-nav>
            </div>

            <div class="list col-md-9">
                <!--<h3>Insert dynamic componenet</h3>-->
                <div v-if="componentType"  >
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

    import editProfile from './EditProfile'
    import profile from './MyProfile'
    import deleteProfile from './deleteProfile'
    export default {
        name: 'UserSetting',
        components: {
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
    .userContent {
        margin-top: 30px;
       /* height: 550px;*/
    }

    .userSidebar {
       /* height: 450px;*/
        margin: 5% auto;
       /* background-color: gray;*/
    }

    .usermenu p {
        color: black;
        font-size: 20px;
    }
    .userSetting{
         background-color: #f4f5e7;
         
    }
</style>