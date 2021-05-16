<template>
    <div class="container fluid">  
       <!-- <div> <router-link to="/addUser"><b-button variant="info">Ajouter un rendez-vous</b-button></router-link> </div>--> <br>
        
        <div v-if="rdvs.length!==0">
            <b-table-simple sticky-header=""  bordered outlined hover striped responsive=true  fixed>
              
              <b-tbody>
                <b-tr>
                  <b-th>Rendez-vous </b-th>
                   <b-th>Date</b-th>
                  <b-th>Heure</b-th>
                  <b-th>First name</b-th>
                   <b-th>Last name</b-th>
                    <b-th >Email</b-th>
                  <!-- <b-th colspan="2">Actions</b-th>-->
                </b-tr>
                <b-tr v-for="rdv in rdvs" :key="rdv.id">
                  <b-td> {{rdv.id}}  </b-td> 
                   <b-td> {{rdv.date}}  </b-td> 
                    <b-td> {{rdv.time}}  </b-td> 
                    <b-td> {{rdv.firstName}}  </b-td> 
                    <b-td> {{rdv.lastName}}  </b-td> 
                    <b-td> {{rdv.email}}  </b-td> 
                   <!-- <b-td> <b-button variant="info"> Modifier </b-button> </b-td> 
                    <b-td> <b-button variant="danger" @click="deleteRdv(rdv.id)">Supprimer </b-button> </b-td> -->
                </b-tr>
              </b-tbody>
            </b-table-simple>
        </div>
        <div v-else >
          <h3 style="color:#ed3f4e">Aucun rendez-vous pris!</h3>
        </div>
    </div>
    
</template>
<script>
import Axios from 'axios'

export default {
  methods: {
    getRDVs () { 
     Axios
      .get('http://127.0.0.1:8000/api/rdvs')
      .then(response => {
        this.rdvs = response.data
        console.log(this.rdvs)
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)
    },
    deleteRdv (id) { 
      if(confirm("Do you really want to delete this rdv?")){
         Axios
      .delete('http://127.0.0.1:8000/api/rdvs/'+id)
      .then( ()=>{
         console.log("Suppression ok")
         this.getRDVs()
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
      rdvs:[],
     
      
    }
  },
  created () {
  },
 
    mounted () {
    this.getRDVs();
   
    
  }
    
}
</script>
<style scoped>

</style>