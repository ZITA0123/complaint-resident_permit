<template>
  <!--<b-card style="background-color: #f4f5e7" >-->
  <div class="profile">
    <div class="profile1">
      <div class="profile2">
        <div class="useravatar">
          <b-avatar></b-avatar>
          <h4>{{ username}}</h4>
          <h4>{{users.email}}</h4>
        </div>
        <div class="userinfo">
          <b-table-simple bordered outlined hover striped responsive=true fixed>

            <b-tbody>
              <b-tr>
                <b-th>First Name </b-th>
                <b-td>{{users.firstName}} </b-td>
              </b-tr>
              <b-tr>
                <b-th>Last Name</b-th>
                <b-td> {{users.lastName}} </b-td>
              </b-tr>
              <b-tr>
                <b-th>Email</b-th>
                <b-td>{{users.email}} </b-td>
              </b-tr>
              <!-- <b-tr>
                  <b-th>Adresse</b-th>
                  <b-td>Tunis,ariana</b-td>
                </b-tr>-->
              <b-tr>
                <b-th>Rendez-vous  </b-th>
                 <b-td v-if="l">Aucun rendez-vous </b-td>
                <b-td v-else>rendez-vous prévu le {{rdv.date}} à {{rdv.time}} 
                  <a style="color:red; border: 1px solid black"  @click="deleteRdv(rdv.id)" variant="danger">Cancel it!</a><br>
                  <!--<a style="color:blue; border: 1px solid black; float:right"  @click="updateRdv(rdv.id)" variant="danger">update it!</a> --> 
                </b-td> 
              </b-tr>
            </b-tbody>
          </b-table-simple>
          <p style="color:red">Pour changer de rendez-vous, vous devez supprimer celui existant et prendre un nouveau</p>
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
  import Axios from 'axios';
  //this.$router.push({ name: 'detailsPlainte'});
 // console.log(Object.keys(this.rdv).length +"hhhhhhhhhhhhhh")
  //import { mapState } from 'vuex'
  export default {
    name: 'MyProfile',
    data() {
      return {
        users: [],
        rdv: [],
       
       
       
      }
    },
    components: {},
    computed: {
      l(){
        if(Object.keys(this.rdv).length==0){
            return true}
            else{
            return false
            }

      },
    
      username() {
        return this.users.firstName+""+this.users.lastName
      },
      isLoggedIn: function () {
        
        return this.$store.getters.isLoggedIn
      },
      myUser: function () {
       
        return this.$store.getters.myUser
      },
    },
    methods: {
      getUsers() {
        let user = localStorage.getItem('user')
        Axios.get('http://127.0.0.1:8000/api/users/' + user)
          .then(response => {
            
            this.users = response.data
            
            
          })
          .catch(error => {
            console.log(error)
            this.errored = true
          })
          .finally(() => this.loading = false)
      },
       getRdv() {
        let user = localStorage.getItem('user')
        Axios.get('http://127.0.0.1:8000/api/rdvs/user/' + user)
          .then(response => {
            this.rdv = response.data
           
            console.log(this.rdv)
            
          })
          .catch(error => {
            console.log(error)
            this.errored = true
          })
          .finally(() => this.loading = false)
      },

       deleteRdv(id) { 
      if(confirm("Do you really want to cancel this appoitment ?")){
         Axios
      .delete('http://127.0.0.1:8000/api/rdvs/'+id)
      .then( ()=>{
        // console.log("Suppression ok")
        window.location.reload()
        // this.getRdv()
        // this.$forceUpdate();
        
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
     
      }
    },
    updateRdv(id){
      this.deleteRdv(id);
     this.$router.push({ name: 'rdv'});

    }
    },
    mounted() {
      this.getUsers();
      this.getRdv();
    },
  }
</script>

<style scoped>
  .useravatar {
    text-align: center;
  }

  .profile .profile1 {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .profile {
    padding-top: 85px;
    padding-bottom: 35px;
    background-color: #f5f5f5;
  }

  .profile .profile2 {
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

  .table-bordered td,
  .table-bordered th {
    border: 1px solid #627378 !important;

  }

  /* #walletContent p:last-of-type {
    margin: 0;
  }*/
</style>