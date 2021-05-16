<template>
  <div style="padding:40px;">
     <div>
       <header-content></header-content>
     </div>
    <div class="plainte container"> 
      <section>
        <div>
          <b-card border-variant="danger">
            <b-card-text>
              <p>Ce service vous permet d'effectuer une déclaration pour des faits dont vous êtes directement et
                personnellement
                victime et pour lesquels vous ne connaissez pas l'auteur, concernant :
                <ul>
                  <li>Une atteinte aux biens (vols, dégradation, escroqueries...)</li>
                  <li> un fait discriminatoire (discrimination, diffamation, injure, provocation individuelle à la
                    haine)</li>

                </ul>
                Cette démarche vise essentiellement à vous faire gagner du temps lors de votre présentation à l'unité ou
                service
                choisi.</p>
            </b-card-text>
          </b-card>
        </div> <br>
      </section>


      <div class="row infosupplementaires">
        <div class="col-md-6">
          <p>
            Avoir une idee sur la procedure penale: cliquez
            <a target="_blank" href=" http://comprendrelajusticepenale.tn/fr/">ICI</a>
          </p>
        </div>
        <div class="col-md-6">
          <p>Savoir qui peut porter plainte, les objectifs d'une plaintes, le delai pour porter une plainte,...
            Consulter la boite d'aide:
            <a target="_blank"
              href="https://www.service-public.fr/particuliers/vosdroits/F1435#:~:text=Vous%20pouvez%20porter%20plainte%20directement,'auteur%20de%20l'infraction.">ICI</a>
          </p>

        </div>
      </div>
        <div align="right">
                <router-link to="identite">
                    <button ><strong> Deposer votre plainte</strong> </button>
                </router-link>
          </div>
        
    </div>
    <div>
       <app-footer></app-footer>
    </div>
  </div>
</template>

<script>
import AppFooter from '../dashboard/pages/AppFooter.vue'
import HeaderContent from '../dashboard/pages/HeaderContent.vue'
  export default {
  components: { AppFooter, HeaderContent },
    name: 'gestionPlaintes',

  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .infosupplementaires p {
    font-size: 18px;
    font-style: italic;
  }
  button {
        width: 500px;
        height: 50px;
        background-color: #ed3f4e;
    }

  .plainte {
     margin: 0 auto;
    
        margin-top: 70px;
        padding: 80px;
 font-size: 18px;
        border-radius: 7px;
        box-shadow: 0 0 40px rgba(0, 0, 0, .13);
   
    
    

   
  }
</style>
