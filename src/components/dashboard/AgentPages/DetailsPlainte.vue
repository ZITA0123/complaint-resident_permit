<template>
  <div class="container fluid plainte">
    <router-link style="float:left;" to="/agentdashboard">Dashboard</router-link>
    <h1>Details de la plainte</h1>
    <div class="details">
      <section>
        <div>
          <h3>Plainte</h3>
          <p>Motif :{{p.motif}} </p>
          <p>Description du motif:{{p.desc_motif}} </p>
          <p>Vous deposez plainte en qualite de: {{p.Type_Fait}} </p>
          <p></p>
          <p></p>
          <h3>User details</h3>
          <p>Nom: {{p.EC_Nom_Naissance}} </p>
          <p>Nom epoux : {{p.EC_Nom_epoux}}</p>
          <p>Prenom : {{p.EC_Prenom}}</p>
          <p>Profession : {{p.EC_Profession}}</p>
          <p>Situation familiale : {{p.EC_Situation_familiale}}</p>
          <p>Nationalite : {{p.EC_Nationalité}}</p>
          <h3>Lieu de naissance du plaignant</h3>
          <p>Date de naissance : {{p.EC_Date_naissance}}</p>
          <p> Commune:{{p.EC_Commune}} </p>
          <p>Departement : {{p.EC_Département}} </p>
          <p>Code postal:{{p.EC_Code_postal}} </p>
          <p></p>
        </div>
        <div>
          <h3>Domicile du Plaignant</h3>
          <p>Pays : {{p.D_Pays}}</p>
          <p>departement : {{p.D_Departement}}</p>
          <p>code postal : {{p.D_CodePostal}}</p>
          <p>adresse : {{p.D_Adresse}}</p>
          <p>commune : {{p.D_Commune}}</p>
        </div>
      </section>
      <section>
        <h3>Lieu de l'infraction : </h3>
        <p>Pays : {{p.Inf_Pays}}</p>
        <p>departement : {{p.Inf_Departement}}</p>
        <p>code postal : {{p.Inf_Code_postal}}</p>
        <p>commune : {{p.Inf_Commune}}</p>
        <p>Precision du lieu : {{p.Desc_lieu}}</p>
      </section>
      <section>
        <h3>Outils d'orientation de l'enquete</h3>
        <p>Documents : {{p.Eléments_susceptibles}}</p>
        <p>Prejudice subit : {{p.Description_Prejudice}}</p>
      </section>
    </div>

  </div>

</template>
<script>
  import Axios from 'axios'

  export default {
    methods: {
      getPlainte() {
        let id = localStorage.getItem('plainte_id')
       
        Axios
          .get('http://127.0.0.1:8000/api/plainte/' + id)
          .then(response => {
            this.p = response.data
          })
          .catch(error => {
            console.log(error)
            this.errored = true
          })
          .finally(() => this.loading = false)
      },


    },
    data() {
      return {
        p: []


      }
    },
    created() {},

    mounted() {
      this.getPlainte();


    }

  }
</script>
<style scoped>
.plainte{
background-color: rgb(252, 245, 245);
     min-height: 100vh;
     text-align: center;
     
       padding-top: 30px;

}
.plainte h1, h3{
  color: #ed3f4e;
}
.plainte  h3{
  color: #3f3f64;
}
  .details{
    
    margin: 0 auto;
    position: relative;
    padding: 60px;
    padding-top: 90px;
    border-radius: 7px;
    box-shadow: 0 0 40px rgba(0, 0, 0, .13);
    
 
  }
  .details p{
    font-size: 20px;
    font-weight: lighter;
  }
</style>