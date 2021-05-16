<template>
    <div class="priseRDV">
        <header-content></header-content>
        <div class="rdv">
            <h2>Effectuer votre rendez-vous
                {{plainte}}
            </h2>
        </div>
        <div class="infoUtile">

          <!--<button @click="show=!show">Informations Utiles</button>-->  
        
            <div style="margin-top:20px">
                <p class="rappel">
                    <span style="color:#ed3f4e">Rappel:</span> Le depot de votre dossier se fera sur place dans le
                    service administratif de votre commune qui est prevu à cet. <br>
                    Le traitement de chaque dossier prend au <i> <strong>maximum 15 min</strong> </i> <br>
                    La reception des dossiers ce fait en <i> <strong>semaine de 9h à 13h.</strong></i>
                </p>
            </div>
               <div>
               <p class="h3">Conditions de réservation</p>
                <dl>
                   
                        <dt> <u class="marge"> Type de réservation:</u> </dt> 
                   
                    <dd>Tranche horaire</dd>
               
                  
                        <dt ><u class="marge">Réservation par tranche de:</u> </dt>
                 
                    <dd>15 minute(s)</dd>
               
                
                        <dt ><u class="marge">Réservation possible jusqu'à:</u> </dt> 
                  
                    <dd>une semaine  à l'avance</dd>
                </dl>
               
           </div>
        </div>


        <form action="">

            <div>
            <!--
                <label for="">Nom:</label>
                <b-input type="text" name="nom" v-model="nom"></b-input>
                <label for="">Prenom:</label>
                <b-input type="text" name="prenom" v-model="prenom"></b-input>
            -->
            
                <label for="">Adresse</label>
                <b-input type="text" name="adresse" v-model="adresse"></b-input>
                <label for="">Telephone</label>
                <b-input type="text" name="tel" v-model="tel"></b-input>
                
              
               <!--
                 <label for="">Ville</label>
                <b-input type="text" name="ville" v-model="ville"></b-input>
                <label for="">Commune</label>
                <b-input type="text" name="commune" v-model="commune"></b-input>
                -->
            </div>
            <div>
                <label for=""> Choisir une date</label>
                <vc-date-picker :model-config="modelConfig" is24hr trim-weeks :min-date="mindate" :max-date="maxdate"
                    v-model="selecteddate" :disabled-dates='disableddates'>
                    <template v-slot="{ inputValue, inputEvents }">
                        <input class="px-2 py-1 border rounded focus:outline-none focus:border-blue-300"
                            :class="{ 'border-red-600': errorMessage }" :value="inputValue" v-on="inputEvents" />
                    </template>
                </vc-date-picker>
                <button type="button" class=" font-bold py-2 px-4 rounded-r user-select-none focus:outline-none"
                    :class="selecteddate ? 'bg-red-500' : 'bg-red-300'" :disabled="!selecteddate"
                    @click="selecteddate = null">
                    Clear
                </button>
                <p class="text-red-600 text-xs italic mt-1" v-if="errorMessage">
                    {{ errorMessage }}
                </p>
            </div>
            <div>
                <label> choisir l'heure </label>
                <vc-date-picker mode="time" v-model="hour" :timezone="timezone" :minute-increment="15" is24hr
                    @click="disableDate()">
                    <template v-slot="{ inputValue, inputEvents }">
                        <input class="px-2 py-1 border rounded focus:outline-none focus:border-blue-300"
                            :value="inputValue" v-on="inputEvents" />
                    </template>
                </vc-date-picker>
            </div>
            <div align="right">
                <b-button type="submit">Confirmer</b-button>
            </div>
        </form>


        <button @click="test()">test</button>

        <h4>date selected: {{selecteddate}} </h4>
        <h4>hour selected: {{formattedDate}} </h4>

        <div>
            <b-form-datepicker @input="yes()" v-model="value" :date-disabled-fn="dateDisabled" :min="min" :max="max"
                locale="en"></b-form-datepicker>
        </div>

        <div v-if="lire">
            <h4>date selected: {{value}} </h4>
            <h4>choose time</h4>

            <b-form-group label="Select date picker interactive state" v-slot="{ ariaDescribedby }">
                <b-form-radio-group v-model="state" :aria-describedby="ariaDescribedby"
                    aria-controls="ex-disabled-readonly">
                    <b-form-radio value="disabled" :disabled="lock">Disabled</b-form-radio>
                    <b-form-radio value="readonly">Readonly</b-form-radio>
                    <b-form-radio value="normal">Normal</b-form-radio>
                </b-form-radio-group>
            </b-form-group>
            {{state}}
            <button type="submit" @click="locks"> send</button>
        </div>





        <div>
            <b-form-select v-model="selected" class="mb-3">
                <b-form-select-option :value="null">Please select an option</b-form-select-option>
                <b-form-select-option value="a">Option A</b-form-select-option>
                <b-form-select-option value="b" :disabled="disabled" >Option B (disabled)</b-form-select-option>

                <b-form-select-option value="09:00" :disabled="disabled">09:00 à 09:15 {{status}} </b-form-select-option>
                <b-form-select-option value="09:15" :disabled="disabled">09:15 à 09:30 {{status}}</b-form-select-option>
                <b-form-select-option value="09:30" :disabled="disabled">09:30 à 09:45 {{status}}</b-form-select-option>
                <b-form-select-option value="09:45" :disabled="disabled">09:45 à 10:00</b-form-select-option>
                <b-form-select-option value="10:00" :disabled="disabled">10:00 à 10:15</b-form-select-option>
                <b-form-select-option value="10:15" :disabled="disabled">10:15 à 10:30</b-form-select-option>
                <b-form-select-option value="10:15" :disabled="disabled">10:30 à 10:45</b-form-select-option>
                <b-form-select-option value="10:30" :disabled="disabled">10:45 à 11:00</b-form-select-option>
                <b-form-select-option value="10:45" :disabled="disabled">11:00 à 11:15</b-form-select-option>
                <b-form-select-option value="11:00" :disabled="disabled">11:15 à 11:30</b-form-select-option>
                <b-form-select-option value="11:15" :disabled="disabled">11:30 à 11:45</b-form-select-option>
                <b-form-select-option value="11:30" :disabled="disabled">11:45 à 12:00</b-form-select-option>
                <b-form-select-option value="11:45" :disabled="disabled">12:00 à 12:15</b-form-select-option>
                <b-form-select-option value="12:00" :disabled="disabled">12:15 à 12:30</b-form-select-option>
                <b-form-select-option value="12:15" :disabled="disabled">12:30 à 12:45</b-form-select-option>
                <b-form-select-option value="12:30" :disabled="disabled">12:45 à 13:00</b-form-select-option>
            </b-form-select>
        </div>




<h1>LISTE Horaire</h1>
<ul>
    <li v-for="p in plageHoraire" :key="p" >
        {{p}}
    </li>
</ul>
<button @click=" listMonth(2021,1)">LIST MOIS</button>









<app-footer></app-footer>

    </div>
</template>

<script>
    import moment from 'moment'
    import PlageH from './horaires'
import HeaderContent from '../dashboard/pages/HeaderContent.vue'
import AppFooter from '../dashboard/pages/AppFooter.vue'
    // import bus from '../../main'
    export default {
  components: { HeaderContent, AppFooter },
        data() {
            return {
                plageHoraire:[],
                status:'',
                disabled:false,
                tabselectedDates:[],
                tabselectedTimes:[],
                selected:'',
                state: '',
                lire: false,
                value: '',
                min: new Date(2020, 8, 1),
                max: new Date(2020, 8, 30),
                show: false,
                service: ' ',
                disableddates: [{
                    weekdays: [1, 7]
                },
                 new Date(2020, 8, 11)],

                mindate: new Date(2020, 8, 1),
                maxdate: new Date(2020, 8, 30),
                //date: moment().format('YYYY-MM-DD'),
                //this.selecteddate.toDateString()
                selecteddate: '',
                hour: new Date(),
                timezone: '',
                form: '',
                count: 2,
                modelConfig: {
                    type: 'string',
                    mask: 'YYYY-MM-DD', // Uses 'iso' if missing
                },



            }
        },
        created() {
            /* bus.$on('pl',(data)=>{
            this.$store.state.plainte=data;
         })*/

        },
        computed: {

            plainte() {
                return this.$store.state.plainte;
            },
            formattedDate() {
                // let dates = moment(this.date).format('YYYY-MM-DD')
                return moment(this.hour).format('hh:mm ')
            },
            errorMessage() {
                if (!this.selecteddate) return 'Date is required.';
                return '';
            },
            /* MyPlainte: function () {
             return this.$store.getters.MyPlainte
            },*/

        },
        mounted(){
            this.plageHoraire=PlageH.getPlageHoraire();
        },
        methods: {
            
            listMonth(year,month){ 
            var monthIndex = month - 1; // 0..11 instead of 1..12
            var names = [ 'sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat' ];
            var date = new Date(year, monthIndex, 1);
            var result = [];
            while (date.getMonth() == monthIndex) {
                result.push(date.getDate() + '-' + names[date.getDay()]);
                date.setDate(date.getDate() + 1);
            }
                /*for (var prop in result) {
   
                 console.log(prop)
                }  */
                  console.log(result)  
            },

            locks() {
                if (this.state == 'disabled') {
                    return this.lock = true
                }

            },

            yes() {
                this.lire = true;
            },
            dateDisabled(ymd, date) {
                // Disable weekends (Sunday = `0`, Saturday = `6`) and
                // disable days that fall on the 13th of the month
                const weekday = date.getDay()
                const day = date.getDate()
                // Return `true` if the date should be disabled
                return weekday === 0 || weekday === 6 || day === 13
            },
            test() {
                
                 if(this.tabselectedDates.includes(this.value)){
                     if(this.tabselectedTimes.includes(this.selected)){
                        // this.status='indispo';
                        console.log("date and time exist")
                          //nothing to do disable
                     } else{
                         //enable
                         console.log("date exist, but time doesn't")
                     }
                       
                 }
                else{
                   if(this.value){
                        this.tabselectedDates.push(this.value);
                           this.tabselectedDates.forEach(function(item) {
                             console.log(item);
                        });
                         console.log("ajout date");
                         if(this.selected){
                              this.tabselectedTimes.push(this.selected);
                        this.disabled=true;
                       
                          this.tabselectedTimes.forEach(function(item) {
                             console.log(item);
                        });
                        console.log("ajout time");
                         }
                      
                   }

                }
            
            },
            /*inputEvents(){
                console.log(this.count)   
            },*/
            disableDate() {
                let valid = true
                while (this.selecteddate && valid) {
                    this.count -= this.count
                    if (this.count == 0) {
                        valid = false
                        //this.disableddates=this.selecteddate
                        this.selecteddate
                    }
                }
                console.log("this.count")
            }

        }

    }
</script>
<style scoped>
.priseRDV{
    margin: 0 auto;
     width: 80%;
   
}
.marge {
margin-right: 1em;
}
u{
     border-bottom: 1px dashed #999;
     text-decoration: none; 
}
dt{
    float: left;
}
dd{
    float: none;
}
   .rdv {
        color: #ed3f4e;
        text-align: center;
        margin: 100px 0px 20px 0px;
       /* margin: 0 auto;*/
        position: relative;
        padding: 40px;
    }

   .infoUtile {
     /* margin-left: 280px;*/
        margin-bottom: 30px;
        font-size: 20px;
    }

    form {
        margin: 20px 0px 20px 0px;
        margin: 0 auto;
        position: relative;
        padding: 60px;
        padding-top: 90px;
        border-radius: 7px;
      /*  width: 80%;*/
        /*background-color: #fff;*/
        box-shadow: 0 0 40px rgba(0, 0, 0, .13);
    }
</style>