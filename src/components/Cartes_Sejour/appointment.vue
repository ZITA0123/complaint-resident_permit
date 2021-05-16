<template>
    <div class="yourRDV">
        <div class="priseRDV">
            <header-content></header-content>
            <div class="rdv">
                <h2>Effectuer votre rendez-vous</h2>
            </div>
            <div class="myBack">

                <b-progress :value="progress" variant="success"></b-progress>
                <div>
                    <ValidationObserver v-slot="{ handleSubmit }">
                        <b-form @submit.prevent="handleSubmit(addRdv)">

                            <div v-if="current_step==1">
                                <div class="infoUtile">

                                    <!--<button @click="show=!show">Informations Utiles</button>-->

                                    <div style="margin-top:20px">
                                        <p class="rappel">
                                            <span style="color:#ed3f4e">Rappel:</span> Le depot de votre dossier se fera
                                            sur
                                            place dans le
                                            service administratif de votre commune qui est prevu à cet. <br>
                                            Le traitement de chaque dossier prend au <i> <strong>maximum 15 min</strong>
                                            </i> <br>
                                            La reception des dossiers ce fait en <i> <strong>semaine de 9h à
                                                    13h.</strong></i>
                                        </p>
                                    </div>
                                    <div>
                                        <p class="h3">Conditions de réservation</p>
                                        <dl>

                                            <dt> <u class="marge"> Type de réservation:</u> </dt>

                                            <dd>Tranche horaire</dd>


                                            <dt><u class="marge">Réservation par tranche de:</u> </dt>

                                            <dd>15 minute(s)</dd>


                                            <dt><u class="marge">Réservation possible jusqu'à:</u> </dt>

                                            <dd>une semaine à l'avance</dd>
                                        </dl>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Select a date</h4>
                                        <ValidationProvider name="Appointment date" rules="required"
                                            v-slot="{ errors }">
                                            <b-form-datepicker @input="yes()" v-model="value"
                                                :date-disabled-fn="dateDisabled" 
                                                @context="onContext" locale="en"></b-form-datepicker>
                                            <span class="validate">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                        <br>

                                        <div v-if="value">
                                            <h4>Select a time</h4>
                                            <ValidationProvider name="time" rules="required" v-slot="{ errors }">
                                                <b-form-select v-model="selectedValue" class="mb-3">
                                                    <b-form-select-option v-for="(item,i) in myPlage" :value="item"
                                                        :key="i">
                                                        {{ item }}</b-form-select-option>
                                                </b-form-select>
                                                <span class="validate">{{ errors[0] }}</span>
                                            </ValidationProvider>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div v-if="value">
                                            <div>
                                                <table>
                                                    <tr>
                                                        <th colspan="2">Avaible Time</th>
                                                    </tr>
                                                    <td>
                                                        <tr v-for="(e,i) in myPlage.slice(0,8)" :key="i"> {{e}}</tr>

                                                    </td>
                                                    <td>
                                                        <tr v-for="(e,i) in myPlage.slice(8,myPlage.length)" :key="i">
                                                            {{e}}
                                                        </tr>
                                                    </td>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div align="right">

                                    <b-button type="submit" class="float-right" variant="primary">Continuer>></b-button>
                                </div>

                            </div>
                            <div v-if="current_step==2">
                                <h2>Details de votre rdv</h2>
                                <p>you need to submit your residence permit application file on :{{formatted}} at:
                                    {{selectedValue}} AM</p>
                                <!--<p>vous déposez votre dossier de demande de carte de séjour le :{{formatted}} à : {{selectedValue}} du matin</p>-->
                                <div align="right">
                                    <b-button type="submit" class="float-right" variant="primary">Continuer>></b-button>
                                    <b-button type="" style="float:left" @click="onClickBack">back</b-button>
                                </div>
                            </div>
                            <div v-if="current_step==3">
                                <h2>Informations personnelles</h2>
                                <p>Si les identifiants mentionnés au depart etaient incorrects, veillez les rectifier
                                    <b-button size="sm" @click="x">ici</b-button>!</p>
                                <div v-if="iden">

                                    <label for="">First Name</label>
                                    <b-input type="text" name="prenom" v-model="prenom"></b-input>
                                    <label for="">Last Name</label>
                                    <b-input type="text" name="nom" v-model="nom"></b-input>

                                    <label for="">Email</label>
                                    <b-input type="text" name="email" v-model="email"></b-input>
                                </div>

                                <div align="right">
                                    <b-button type="submit">Confirmer RDV</b-button>
                                     <b-button type="" style="float:left" @click="onClickBack">back</b-button>
                                </div>
                            </div>
                            
                            <p v-if="showerror" style="color:red">{{myerror}} </p>
                            
                            
                        </b-form>
                    </ValidationObserver>
                </div>

            </div>
            <app-footer></app-footer>

        </div>
    </div>
</template>

<script>
    import Users from '../dashboard/userProfile/user'
    import Axios from 'axios'
    import moment from 'moment'
    import PlageH from './horaires'
    import HeaderContent from '../dashboard/pages/HeaderContent.vue'
    import AppFooter from '../dashboard/pages/AppFooter.vue'
    // import bus from '../../main'
    export default {
        components: {
            HeaderContent,
            AppFooter
        },
        data() {

            return {

                iden: false,

                //prenom:'',
                //nom: '',
                showerror: false,
                myerror: '',
                formatted: '',
                current_step: 1,
                max_step: 3,
                selectedValue: '',
                rdvs: [],
                nom: '',
                prenom: '',
                email: '',
                allDates: [],
                allTimes: [],
                plageHoraire: [],
                status: '',
                disabled: false,
                tabselectedDates: [],
                tabselectedTimes: [],
                selected: '',
                state: '',
                lire: false,
                value: '',
              ////  min: new Date(2021, 8, 1),
             //   max: new Date(2021, 8, 30),
                show: false,
                service: ' ',
                disableddates: [{
                        weekdays: [1, 7]
                    },
                    new Date(2020, 8, 11)
                ],

                mindate: new Date(2020, 8, 1),
                maxdate: new Date(2020, 8, 30),

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

        computed: {

            progress: function () {
                return Math.round(100 / this.max_step) * this.current_step;
            },
            myPlage() {
                return this.showPlage(this.value);
            },

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


        },
        mounted() {
            this.plageHoraire = PlageH.getPlageHoraire();
            this.currentUser = Users.getUsers();
            this.getRDVDates();
            this.getRDVs();
            // this.getUsers();
        },
        methods: {

            x() {
                if (this.iden == false) {
                    this.iden = true;

                } else {
                    this.iden = false;
                }

            },
            updateData() {

            },
            onContext(ctx) {

                this.formatted = ctx.selectedFormatted

            },
            onClickNext: function () {
                this.current_step++;
            },
            onClickBack: function () {
                this.current_step--;
            },
            onClickFirst: function () {
                this.current_step = 1;
            },
            addRdv() {
                if (this.current_step == 3) {
                    let user_id = localStorage.getItem('user')
                    let token = localStorage.getItem('token')
                    const config = {
                        headers: {
                            Authorization: 'Bearer ' + token
                        }
                    };
                    let data = {

                        date: this.value,
                        time: this.selectedValue,
                        // id: user_id
                    }
                    if (this.iden == true) {
                        let data1 = {
                            firstName: this.nom,
                            lastName: this.prenom,
                            email: this.email,
                        }
                        Axios.put('http://127.0.0.1:8000/api/user/' + user_id, data1)
                            .then(response => {
                                //window.location.reload()
                                console.log(response)

                            })
                            .catch(error => {

                                console.log(error)
                                this.errored = true
                            })

                    }
                    Axios
                        .post('http://127.0.0.1:8000/api/rdvs', data, config)
                        .then(() => {
                            //alert("reussi")
                            this.$router.push('/userSetting')
                        })
                        //.then(() => this.$router.push('/admin'))
                        .catch(error => {
                            console.log(error)
                            this.myerror ="vous avez deja effectuer un rendez-vous, veuillez l'annuler ou le modifier"
                            this.showerror = true
                            this.$router.push({
                                name: 'userSetting'
                            });
                            this.errored = true
                        })
                    console.log(user_id + 'rrrrrrrrrrrrrrrrr')
                    return
                }
                this.current_step++;
            },


            getRDVs() {
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
            getRDVDates() {
                Axios
                    .get('http://127.0.0.1:8000/api/rdvs/dates')
                    .then(response => {
                        response.data.forEach(e => {
                            this.allDates.push(e.date);
                            // console.log(this.allDates)
                        });
                        //this.allDates = response.data
                        console.log(this.allDates)
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() => this.loading = false)
            },

            getRDVTimes() {
                Axios
                    .get('http://127.0.0.1:8000/api/rdvs/times/' + this.value)
                    .then(response => {
                        response.data.forEach(e => {
                            this.allTimes.push(e.time);
                            // console.log(this.allTimes)
                        });


                        // this.allTimes = response.data
                        console.log(this.allTimes)

                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
                    .finally(() => this.loading = false)
            },

            showPlage(date) {

                let tab = [];

                let t = [];
                // this.getRDVTimes();
                if (this.allDates.includes(date)) {
                    tab = [...this.plageHoraire];
                    for (var i = 0; i < this.rdvs.length; i++) {
                        if (this.rdvs[i].date == date) {
                            t = this.rdvs[i].time;
                        }
                    }
                    for (var j = 0; j < tab.length; j++) {
                        if (t.includes(tab[j])) {
                            tab[j] = tab[j] + " Non dispo";
                            tab.splice(j, 1) //delete time at position j
                        }

                    }
                    return tab;
                } else {
                    console.log(this.plageHoraire);
                    return this.plageHoraire;
                }

            },

            listMonth(year, month) {
                var monthIndex = month - 1; // 0..11 instead of 1..12
                var names = ['sun', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat'];
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

                if (this.tabselectedDates.includes(this.value)) {
                    if (this.tabselectedTimes.includes(this.selected)) {
                        // this.status='indispo';
                        console.log("date and time exist")
                        //nothing to do disable
                    } else {
                        //enable
                        console.log("date exist, but time doesn't")
                    }

                } else {
                    if (this.value) {
                        this.tabselectedDates.push(this.value);
                        this.tabselectedDates.forEach(function (item) {
                            console.log(item);
                        });
                        console.log("ajout date");
                        if (this.selected) {
                            this.tabselectedTimes.push(this.selected);
                            this.disabled = true;

                            this.tabselectedTimes.forEach(function (item) {
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
    .myBack {
        background-color: #e0e0d3;
    }

    .yourRDV {
        min-height: 100vh;
        background-color: #f4f5e7;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        color: #ed3f4e;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    /*tr:hover  { 
    color:#ed3f4e;
    background:#EDEDED;
     }
*/
    .priseRDV {

        margin: 0 auto;
        width: 80%;

    }

    .marge {
        margin-right: 1em;
    }

    u {
        border-bottom: 1px dashed #999;
        text-decoration: none;
    }

    dt {
        float: left;
    }

    dd {
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