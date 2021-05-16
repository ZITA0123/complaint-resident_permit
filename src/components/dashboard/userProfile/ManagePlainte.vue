<template>
  <!--<b-card style="background-color: #f4f5e7" >-->
  <div class="profile">
    <div class="profile1">
      <div class="profile2">
        <div class="useravatar">
           <div v-if="!l">
            <h2>Your Complaints</h2>
            <b-table-simple sticky-header=""  bordered outlined hover striped responsive=true  fixed>
              
              <b-tbody>
                <b-tr>
                 <!-- <b-th>Complaint </b-th>-->
                   <b-th>Motif</b-th>
                  <b-th>fait</b-th>
                  <b-th>First name</b-th>
                   <b-th>Last name</b-th>
                    <b-th>Adresse Plaignant</b-th>
                   <b-th colspan="3">Actions</b-th>
                </b-tr>
                <b-tr v-for="p in active" :key="p.id">
                   <!-- <b-td> {{p.id}}  </b-td>--> 
                   <b-td> {{p.motif}}  </b-td> 
                   <b-td> {{p.Type_Fait}}  </b-td> 
                    <b-td>  {{p.EC_Prenom}} </b-td> 
                    <b-td> {{p.EC_Nom_Naissance}} </b-td> 
                    <b-td> {{p.D_Adresse}} </b-td> 
                    
                    <b-td> <b-button variant="info" @click="updatePlainte(p.id)"> Update </b-button> </b-td> 
                    <b-td> <b-button variant="danger" @click="deletePlainte(p.id)" >delete </b-button> </b-td> 
                    <b-td> <b-button variant="success" @click="infoPlainte(p.id)" >Details </b-button> </b-td> 
                </b-tr>
              </b-tbody>
            </b-table-simple>
        </div>
         <div v-else >
          <h3 style="color:#ed3f4e">Aucune plainte deposee!</h3>
        </div>
       <!-- <div v-if="ac" >
          <h3 style="color:#ed3f4e">Vous avez annulé vos plaintes!</h3>
        </div>-->
          
        </div>
       
      </div>
    </div>

  </div>



</template>

<script>
import Axios from 'axios'
export default {
  data () {
    return {
        plaintes:[],
       // activeP:[],
    }
  },
  computed:{
    active(){
      let activeP = [...this.plaintes]
      let t=[]
       for (var j = 0; j < activeP.length; j++) {
                        if (activeP[j].lieu_no_mentionned==0) {
                         // activeP.splice(j, 1) ;//delete time at position j
                               t.push(activeP[j])  
                        }

                    }
           return t
    },
       l(){
        if(this.plaintes.length==0){
          return true
        }else{
          return false
        }
      },
      ac(){
        if(this.active.length==0){
          return true
        }else{
          return false
        }
      }
  },
  methods: {
    updatePlainte(id){
       localStorage.setItem('plainte_id',id)
        // this.$router.push({ name: 'updatePlainte'});
    },

      infoPlainte(id){
         localStorage.setItem('plainte_id',id)
         this.$router.push({ name: 'userdetailPlainte'});
      },


       getPlainte () { 
         let id = localStorage.getItem('user')
     Axios
      .get('http://127.0.0.1:8000/api/plainte/user/'+id)
      .then(response => {
        this.plaintes = response.data
         //this.activeP = [...this.plaintes]
      
        //console.log(this.plaintes)
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)
    },
     deletePlainte (id) { 
      if(confirm("Do you really want to cancel this complaint?")){
         Axios
      .put('http://127.0.0.1:8000/api/plainte/'+id)
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
 /* .profile .profile1 {
    display: flex;
    justify-content: center;
    align-items: center;
  }*/

  .profile {
    padding-top: 85px;
    padding-bottom: 25px;
    background-color: #f5f5f5;
  }

  .profile .profile2 {
    position: relative;
    z-index: 1;
    width: 90%;
    padding: 60px;
    min-width: 100%;
    border-radius: 7px;
    background-color: #fff;
    box-shadow: 0 0 40px rgba(0, 0, 0, .13);
  }

  

 /* .table-bordered td,
  .table-bordered th {
    border: 1px solid #616769 !important;

  }*/

</style>