<template>
  <div>

    <headercontent>
      <div :slot="'backImage'" class="homeImage">
        <!-- <img src="../../../public/img/mairieTunis.jpg" alt="no available">-->
        <!--  <img src="../../../public/img/vueAerienneTunis.jpg" alt="no available">
        <h1>lkfdxfgchvjbknlmlmlmlml</h1>
        -->
        <div>
          <b-carousel controls id="carousel-fade" style="text-shadow: 0px 0px 2px #000" fade interval="5000">

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
              <p>Lorem ipsum dolor sit amet,
                <span v-if="readMore"></span>
                <span v-else>...</span>
              </p>
              
              <p v-show="readMore">Ligula ullamcorper malesuada proin
                libero nunc consequat interdum varius. Turpis egestas pretium aenean pharetra magna ac
                libero nunc consequat interdum varius. Turpis egestas pretium aenean pharetra magna ac
              </p>
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
              <p>Lorem ipsum dolor sit amet,
                <span v-if="readMore1"></span>
                <span v-else>...</span>
              </p>
             
              <p v-show="readMore1">Ligula ullamcorper malesuada proin
                libero nunc consequat interdum varius. Turpis egestas pretium aenean pharetra magna ac
             
              </p>
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
        textPlainte: '',
        textCarte: " Your skin just like pearls The best thing in the world Never trade you for anybody else Singin brown skin girl Your skin just like pearls",
        readMoreActivated: false,
        shortText: '',
        readMore: false,
        readMore1: false
      }
    },
    computed: {

    },
    methods: {
      activateReadMore() {
        this.readMoreActivated = true;
      },
      hide() {
        this.hideText = true;
      },
      change() {
        return this.shortText = this.textCarte.slice(0, 50);
      }
    }

  }
</script>


<style scoped>
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