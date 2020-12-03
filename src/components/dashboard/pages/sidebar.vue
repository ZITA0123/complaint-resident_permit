<template>
<div>
    <div class="home sidenav">
       <div>
            <h1> Info Commune</h1>
           <hr>
       </div>
        <!-- <b-icon icon="person-circle"></b-icon>-->
        <router-link  to="/" class="nav-link">Home </router-link>
        <router-link class="nav-link" to="/gestion_cartes_sejour">Gestion Cartes Sejour</router-link>
        <router-link to="gestion_plaintes" class="nav-link">Gestion Plaintes</router-link>
        <router-link to="forum" class="nav-link">Forum</router-link>
    </div>  
    <div class="main">
        <slot></slot>
    </div>     
</div>

</template>

<script>
export default {
  name: 'Home',
  components:{
  
  },
  props: {
  }, 
  data(){
    return{
       activeClass: 'menu-active'
    }
  }
       
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style >
.sidenav h1{
  /*  color:gainsboro;*/
    color:#B1BBBE;
}

/* The sidebar menu */
.main {
  margin-left: 25%; /* Same as the width of the sidebar */
  padding: 0px 10px;
}

.sidenav {
  height: 100%; /* Full-height: remove this if you want "auto" height */
  width: 25%; /* Set the width of the sidebar */
  position: fixed; /* Fixed Sidebar (stay in place on scroll) */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background: linear-gradient( #2A0D0B, #580904);
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 20px;
}

/* The navigation menu links */
.sidenav .nav-link {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #D5C5C2;
  display: block;
}

/* When you mouse over the navigation links, change their color */
.sidenav .nav-link:hover {
  color:#E3FAFA;
}

/* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav .nav-link {font-size: 18px;}
}
</style>
