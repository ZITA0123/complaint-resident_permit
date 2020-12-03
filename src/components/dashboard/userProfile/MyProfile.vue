<template>
   <!--<b-card style="background-color: #f4f5e7" >-->
     <div class="profile">
       <div class="profile1">
         <div class="profile2">
             <div class="useravatar">
            <b-avatar></b-avatar>
            <h4>@username</h4>
            <h4>@email</h4>
            </div>
            <div class="userinfo">
              <b-table-simple  bordered outlined hover striped responsive=true  fixed>
              
              <b-tbody>
                <b-tr>
                  <b-th>First Name</b-th>
                  <b-td>Seraphine Zita</b-td>
                </b-tr>
                <b-tr>
                  <b-th>Last Name</b-th>
                  <b-td> Gnekou Fontsing</b-td>
                </b-tr>
                <b-tr>
                  <b-th>Email</b-th>
                  <b-td>zita@gmail.com </b-td>
                </b-tr>
                <b-tr>
                  <b-th>Adresse</b-th>
                  <b-td>Tunis,ariana</b-td>
                </b-tr>
                <b-tr>
                  <b-th>Rendez-vouz</b-th>
                  <b-td>Aucun rendez-vous </b-td>
                </b-tr>
                <b-tr>
                  <b-th>Plaintes</b-th>
                  <b-td>Aucune plainte deposée</b-td>
                </b-tr>
              </b-tbody>
            </b-table-simple>
          </div>
         </div>
       </div>
     </div>
    
      
    
        <!--  <div class="useravatar">
            <b-avatar></b-avatar>
            <h4>@username</h4>
            <h4>@email</h4>
          </div>
          <div class="userinfo">
            -->
            <!--sticky-header="" pour le scroll -->
            
      
   
  
</template>

<script>

  export default {
    name: 'MyProfile',
    components: {
      

    },
    data() {
      return {
      
      }

    }


  };
</script>

<style scoped>
  .useravatar {
    text-align: center;  
  }
   .profile .profile1 {
        display: flex;
        justify-content:center;
        align-items: center;
    }

    .profile {
        padding-top: 85px;
        padding-bottom: 35px;
        background-color: #f5f5f5;
    }
  .profile .profile2{
     position: relative;
        z-index: 1;
        width: 90%;
        padding: 60px;
        border-radius: 7px;
        background-color: #fff;
        box-shadow: 0 0 40px rgba(0, 0, 0, .13);
  }
  .userinfo {
    text-align: center;
    padding-top: 20px;
    padding-bottom: 30px;
    margin: auto;
    width: 100%;
    /*width: 100%;
  max-width: 400px;
  background: #f4f5e7;
  border-radius: 5px;
 */
  }
 
.table-bordered td, .table-bordered th {
    border: 1px solid #627378 !important;
   
}

 /* #walletContent p:last-of-type {
    margin: 0;
  }*/
</style>