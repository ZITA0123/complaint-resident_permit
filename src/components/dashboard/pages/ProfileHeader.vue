<template>
     <header class="header-content" >
         <!--style="background-image: url(static/background/cityHall.jpg) " -->
              <b-navbar toggleable="lg" class="menuNav">
                   <b-navbar-brand  tag="h1" class="mb-0" > Info Commune</b-navbar-brand>
                  <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
                  <b-collapse  id="nav-collapse" is-nav>
                   <b-navbar-nav class="ml-auto" >
                        <b-nav-item  to="/" class="mr-5">Home  </b-nav-item>
                        <b-nav-item to="/gestion_cartes_sejour" class="mr-5" >Gestion Cartes Sejour</b-nav-item>
                        <b-nav-item to="gestion_plaintes" class="mr-5">Gestion Plaintes</b-nav-item>
                        <b-nav-item to="forum" class="mr-5">Forum</b-nav-item>
                    </b-navbar-nav >
                      <b-navbar-nav class="userSettings ml-auto"  >
                           <b-dropdown variant="white" right text="User right"> 
                               <template #button-content>
                                   <b-icon icon="person-circle"></b-icon>
                                </template>
                                <div style="width:auto">
                                    <b-dropdown-item varient="dark" to="/login">Sign in </b-dropdown-item>
                                    <b-dropdown-item >Sign out</b-dropdown-item>
                                    <b-dropdown-item to="/userSetting">Profile</b-dropdown-item>
                                    <b-dropdown-item to="/register">Register</b-dropdown-item>
                                </div>
                            </b-dropdown>
                      </b-navbar-nav> 
                  </b-collapse>
              </b-navbar>  
              <hr>    
        <div > 
            <slot name="backImage" style="position:fixed"></slot>  
            <slot name="cardInfo"></slot>
        </div>           
     </header> 
    
</template>

<script>

export default {
  name: 'HeaderContent',
  props: {
    
      },
      mounted() {

      },
  }

</script>

<style scoped>
.menuNav{
 font-size: 20px;
 height:80px;
 background-image: url(../../../../public/img/backHeader.jpg);
 background-size: cover;
 position: fixed;
 width: 77%;
 top: 0;
    /*left: 0;*/
    right: 0;
    z-index: 20;
}
header{
    margin-bottom: 20px;
    
}

/*.header-content{
    width: 100%;
}*/
.navbar-light .navbar-nav .nav-link {
      color:black!important
 }
 .navbar-light .navbar-nav .nav-link:hover {
      color:#476B79!important;
 }
/*You can use deep selector */
::v-deep .dropdown .nav-link {
   color: #000!important;
}
/*Or this: change the dropdown color */
/*::v-deep .nav-link {
   color: #000!important;
}*/



</style>
