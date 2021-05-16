<template>
  <div>

    <headercontent>
      <div :slot="'backImage'" class="homeImage">
        <!-- <img src="../../../public/img/mairieTunis.jpg" alt="no available">-->
        <!--  <img src="../../../public/img/vueAerienneTunis.jpg" alt="no available">
        <h1>lkfdxfgchvjbknlmlmlmlml</h1>
        -->
        <div>
          <b-carousel controls id="carousel-fade" style="text-shadow: 0px 0px 2px #000" fade interval=5000 >

            <b-carousel-slide class="bcaro1 bcaro" contr>
              <h2>STOP SILENCE</h2>
              <template v-slot:img>
                <img class="d-block img-fluid c1 " src="../../../public/img/plainteBanner.jpg" alt="image slot">
              </template>
            </b-carousel-slide>
            <b-carousel-slide class="bcaro2 bcaro">
              <h2>A PLATFORM FOR
                <br> 
                COMPLAINT FILING
              </h2>
              <template v-slot:img>
                <img class="d-block img-fluid c1 " src="../../../public/img/parquetPlainte.jpg" alt="image slot">
              </template>
            </b-carousel-slide>
            <b-carousel-slide class="bcaro3 bcaro">
              <h2>GET YOUR RESIDENT PERMIT!</h2>
              
              <template v-slot:img>
                <img class="d-block img-fluid c1 " src="../../../public/img/sejourBanner.jpg" alt="image slot">
              </template>
            </b-carousel-slide>
          </b-carousel>
        </div>
      </div>
    </headercontent>
 <h1 style="margin:0 auto; text-align:center; padding-top:20px; "> <strong>How it works</strong></h1>
    <section class="howIsWork container-fluid">
      <div class="row">
        <div class=" col-md-6 ">
         <div class="carte">
           <div>
              <b-icon icon="credit-card2-front" img-top variant="danger"
                style="width: 100px; height: 100px; margin: 0 auto;" class="rounded-circle  p-2"></b-icon>
           </div>
            <div style="min-height:200px;">
              <h3> Online appointment for the resident permit</h3>
              <p> 
                Pour une  demande de carte de sejour il fvous faut prealable  constituer un dossier.
                    Ci-dessous les informations relatives à la constitution d'un dossier de demande de carte de sejour.
                    
                <span v-if="readMore"></span>
                <span v-else>...</span>
              </p>
              
              <section v-show="readMore">
                <div class="row dossier" >
                   <h3>Elements constitutifs du dossier</h3>
                    <div >
                        <b-card  title="En cas d'exercise d'une activité rémunérée:" >
                              <b-card-text>
                                 <ul>
                                   <li> Contrat de travail visé ou une attestation de non 
                                    soumission à l'obligation du visa du contrat de travail.</li>
                                   <li>Copie du statut de la société et sa publication au J.O.R.T.</li>
                                   <li>Justificatif d'hébergement.</li>
                                   <li>Copie du passeport encore valide.</li>
                                   <li>04 photos d'identité.</li>
                                   <li>Remplir le formulaire de la demande de visa - Carte de séjour. </li>
                                 </ul>
                              </b-card-text>
                          </b-card> <br>
                      
                    </div>

                     <div >
                        <b-card title="En cas d'étude:">
                             <b-card-text>
                               <ul>
                                  <li> Attestation de scolarité ou d'inscription pour
                                       l'année scolaire ou universitaire en cours.</li>
                                  <li>Attestation de presence et de paiement integral pour 
                                       l'année scolaire ou universitaire en cours. </li>
                                  <li>Attestation d'un revenu.</li>
                                  <li>Copie du passeport encore valide.</li>
                                  <li>04 photos d'identité.</li>
                                  <li>Justificatif d'hébergement.</li>
                                  <li>Remplir le formulaire de la demande de visa - Carte de séjour.</li>
                               </ul>
                             </b-card-text>
                            </b-card> <br>
                     </div>
                </div>
              </section>
              <button style=" color:blue" class="btn" @click="readMore =! readMore">
                <span v-if="readMore">Read Less</span>
                <span v-else>Read More...</span>
              </button>
            </div>
         </div>
        </div>

        <div class=" col-md-6 ">
        <div class="plainte">
          <div>
              <b-iconstack font-scale="6" style="padding-top:25px; margin: 0 auto;">
                <b-icon stacked icon="hdd" variant="danger" scale="0.75"></b-icon>
                <b-icon stacked icon="hammer" variant="danger" shift-v="4" shift-h="5"></b-icon>
              </b-iconstack>
          </div>
           <div style="min-height:200px;">
              <h3> Online complaint filing</h3>
              <p>QUI PEUT PORTER PLAINTE?
                <span v-if="readMore1"></span>
                <span v-else>...</span>
              </p>
             
              <section v-show="readMore1">
                 
     <section>
        <div class="porterPlainte">
          <b-card title="QUI PEUT PORTER PLAINTE?">
            <b-card-text>
              <p>Toute personne (même mineure) victime d'une infraction peut porter plainte.
                es personnes morales (sociétés et associations) peuvent aussi porter
                plainte pour défendre leurs intérêts ou les objectifs qu'elles poursuivent.</p>
            </b-card-text>
            <b-icon icon="exclamation-diamond-fill" variant="danger" font-scale="2" style="float:left;"></b-icon>
            <p>les officiers et agents de police judiciaire sont obligés de recevoir les plaintes,
              même si les faits ne relèvent pas de leur zone géographique de compétence.</p>
          </b-card>
        </div> <br>
       
        <div class="objectifs">
          <b-card title="OBJECTIFS DE LA PLAINTE">
            <b-card-text>
              <p>La plainte permet de sanctionner pénalement (prison, amende...) l'auteur des faits.
       
                is elle ne suffit pas pour que la justice le condamne à réparer le préjudice subi par la victime
                (remboursement d'un objet volé par exemple).
       
                ur que la justice puisse condamner l'auteur des faits à indemniser la victime, il faut qu'en plus de la
                plainte la victime se constitue partie civile. Elle peut le faire tout au long de la procédure.</p>
              <b-icon icon="exclamation-diamond-fill" variant="danger" font-scale="2" style="float:left;"></b-icon>
              <p> il est possible de saisir directement le juge pénal par une citation directe. Cette procédure permet de
                convoquer l'auteur présumé de l'infraction devant le tribunal.</p>
            </b-card-text>
          </b-card>
        </div><br>
       
        <div class="delais">
          <b-card title="DELAIS POUR PORTER UNE  PLAINTE">
            <b-card-text>
              <div>
                <h5>Le plaignant dispose de délais pour porter plainte. Au delà de ces délais, la plainte ne peut plus aboutir. <br>
                On parle de délais de prescription.
                </h5>
               
       
               <h4> ces délais sont les suivants :</h4>

                <ul>
                 <li> pour les contraventions (trouble anormal de voisinage ...),</li>
                <li>pour les délits (vol, coups et blessures, escroqueries ...),</li>
                 <li>pour les crimes (meurtre, viol ...).</li>
                </ul>
             <div>
                 <h5> Les délais peuvent être réduits ou allongés pour certaines infractions.</h5>
                 <ul>
                    <li> le délai de prescription pour les injures est de 3 mois, </li>
                    <li> alors que celui prévu pour les crimes commis sur
                mineurs et les crimes jugés très graves (terrorisme, grand banditisme) est de 30 ans.</li>
                 </ul>
                 
                 
             </div>
       
            <p>Le delai commence en principe à partir du jour où
                l'infraction a été commise. Mais, pour un crime sur un mineur, un nouveau délai commence à partir de la majorité
                de la victime. Par exemple, une victime mineure d'un viol peut porter plainte jusqu'à ses 48 ans, soit 30
                ans après sa majorité.</p>
       
                
                
                </div>
            </b-card-text>
          </b-card>
        </div><br>
       
        <div class="gestionPlainte">
          <b-card title="COMMENT PORTER PLAINTE?">
            <b-card-text>
              <p>Vous devez vous rendre dans un commissariat de police ou à la gendarmerie de votre choix.</p>
              <p>Grace à cette plateforme, il vous est possible de porter plainte sans vous deplacer</p>
            </b-card-text>
            <router-link to="gestion_plaintes">
              <b-button class="float-left" variant="danger"> Essayer notre service de plainte en ligne:</b-button>
            </router-link>
          </b-card>
        </div><br>
     </section>
             
              </section>
              <button style=" color:blue" class="btn" @click="readMore1 =! readMore1">
                <span v-if="readMore1">Read Less</span>
                <span v-else>Read More...</span>
              </button>
           </div>
        </div>
        </div>
        
      </div>
    </section>

    <div class="AppFooter">
      <footercontent></footercontent>
    </div>
  </div>
</template>

<script>
  import headercontent from './pages/HeaderContent'
  import footercontent from './pages/AppFooter'

  //import sidebar from './pages/sidebar'

  export default {
    name: 'Home',
    components: {
      headercontent,
      footercontent,
      //sidebar

    },
    props: {},
    data() {
      return {
        activeClass: 'menu-active',
        //textPlainte: '',
       // textCarte: " Your skin just like pearls The best thing in the world Never trade you for anybody else Singin brown skin girl Your skin just like pearls",
       // readMoreActivated: false,
       // shortText: '',
        readMore: false,
        readMore1: false,
        show: false,
            show1: false,
      }
    },
    computed: {

    },
    methods: {
      /*activateReadMore() {
        this.readMoreActivated = true;
      },
      hide() {
        this.hideText = true;
      },
      change() {
        return this.shortText = this.textCarte.slice(0, 50);
      }*/

    }

  }
</script>


<style scoped>
ul li{
  list-style-type: none;
}
  .c1 {
    width: 100%;
    height: 600px;
    
  }
  .bcaro h2{
    font-size: 50px;
   font-style:oblique;
   font-weight: 500;
  position: relative;
  }
   .bcaro1 h2 {
        margin-bottom: 90px;
        text-align: center;
        color: #fff;
  }
  .bcaro2 h2 {
        margin-bottom: 50px;
        text-align: center;
       color: rgb(106, 97, 241);
  }
  .bcaro3 h2 {
       color: black;
  }

  .howIsWork{
    padding-top:70px;
    padding-bottom:70px;
    margin: 0 auto;
    font-family: Tahoma, Geneva, sans-serif;
  }
  .plainte, .carte{
    background-color: #ddddde;
    text-align: center;
      padding: 60px;
      border-radius: 7px;
      box-shadow: 0 0 40px rgba(0, 0, 0, .13);
  }

</style>