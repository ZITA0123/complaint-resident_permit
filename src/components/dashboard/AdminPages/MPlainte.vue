<template>
    <div>
       
        <div v-if="!l">
            <h2>Manage Complaints</h2>
            <b-table-simple sticky-header=""  bordered outlined hover striped responsive=true  fixed>
              
              <b-tbody>
                <b-tr>
                  <b-th>Complaint </b-th>
                   <b-th>Motif</b-th>
                  <b-th>fait</b-th>
                  <b-th>First name</b-th>
                   <b-th>Last name</b-th>
                    <b-th>Adresse Plaignant</b-th>
                   <b-th colspan="2">Actions</b-th>
                </b-tr>
                <b-tr v-for="p in plaintes" :key="p.id">
                  <b-td> {{p.id}}  </b-td> 
                   <b-td> {{p.motif}}  </b-td> 
                   <b-td> {{p.Type_Fait}}  </b-td> 
                    <b-td>  {{p.EC_Prenom}} </b-td> 
                    <b-td> {{p.EC_Nom_Naissance}} </b-td> 
                    <b-td> {{p.D_Adresse}} </b-td> 
                    
                    <b-td> <b-button variant="info"> Update </b-button> </b-td> 
                    <b-td> <b-button variant="danger" @click="deletePlainte(p.id)" >Delete </b-button> </b-td> 
                   <!-- <b-td> <b-button variant="success" @click="infoPlainte(p.id)" >Details </b-button> </b-td>--> 
                </b-tr>
              </b-tbody>
            </b-table-simple>
        </div>
         <div v-else >
          <h3 style="color:#ed3f4e">Aucune plainte deposee!</h3>
        </div>
    </div>
</template>
<script>
import Axios from 'axios'
export default {
  data () {
    return {
        plaintes:[],
    }
  },
  computed:{
       l(){
        if(this.plaintes.length==0){
          return true
        }else{
          return false
        }
      }
  },
  methods: {
      infoPlainte(id){
         localStorage.setItem('plainte_id',id)
         this.$router.push({ name: 'detailsPlainte'});
      },
       getPlainte () { 
     Axios
      .get('http://127.0.0.1:8000/api/plainte')
      .then(response => {
        this.plaintes = response.data
        //console.log(this.plaintes)
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)
    },
     deletePlainte (id) { 
      if(confirm("Do you really want to delete this complaint?")){
         Axios
      .delete('http://127.0.0.1:8000/api/plainte/'+id)
      .then( ()=>{
         console.log("Suppression ok")
         this.getPlainte()
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
     
      }
    }
  },
   mounted () {
    this.getPlainte();
   
    
  }
    
}
</script>
<style scoped>

</style>