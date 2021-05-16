<template>
    <div class="container fluid">  
        <div>
            <b-table-simple sticky-header=""  bordered outlined hover striped responsive=true  fixed>
              
              <b-tbody>
                <b-tr>
                  <b-th>First Name  </b-th>
                   <b-th>Last Name</b-th>
                  <b-th>Email</b-th>
                   <b-th colspan="2">Actions</b-th>
                </b-tr>
                <b-tr v-for="user in users" :key="user.id">
                  <b-td> {{user.firstName}}  </b-td> 
                   <b-td> {{user.lastName}}  </b-td> 
                    <b-td> {{user.email}}  </b-td> 
                    <b-td> <b-button variant="info"> Modifier </b-button> </b-td> 
                    <b-td> <b-button variant="danger" @click="deleteUser(user.id)">Supprimer </b-button> </b-td> 
                </b-tr>
              </b-tbody>
            </b-table-simple>
        </div>
        <div> <router-link to="/addUser"><b-button variant="info">Ajouter un user</b-button></router-link> </div> <br>

       <!--<router-link to="/mrdv">Manage rdv</router-link>-->
    </div>
    
</template>
<script>
import Axios from 'axios'
export default {
  methods: {
    getUsers () { 
     Axios
      .get('http://127.0.0.1:8000/api/users')
      .then(response => {
        this.users = response.data
        console.log(this.users)
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)
    },
    deleteUser (id) { 
      if(confirm("Do you really want to delete this user?")){
         Axios
      .delete('http://127.0.0.1:8000/api/users/'+id)
      .then( ()=>{
         console.log("Suppression ok")
         this.getUsers()
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
     
      }
    }
     
  },
  data () {
    return {
      users:[],
      
    }
  },
  created () {
  },
 
    mounted () {
    this.getUsers();
  }
    
}
</script>
<style scoped>

</style>