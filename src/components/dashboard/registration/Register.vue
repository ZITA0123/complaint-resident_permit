<template>
    <section>
        <div>
            <appHeader></appHeader>
        </div>
        <section class="l-authentification register">

            <div class="container">
                <div class="parent-blck">
                    <div class="auth">
                        <h1 class="custom-title">Créer un compte</h1>

                        <ValidationObserver v-slot="{ invalid }">

                            <b-form @submit.prevent="register" @reset="onReset" v-if="show">


                                <ValidationProvider name="First Name" rules="required|alpha" v-slot="{ errors }">
                                    <b-form-group id="input-group-1" label="First Name:" label-for="input-1"
                                        v-if="description='please enter your first name'">
                                        <b-form-input id="input-1" type="text" v-model="firstName" required
                                            placeholder="Enter first name">
                                        </b-form-input>
                                    </b-form-group>
                                    <span class="validate">{{ errors[0] }}</span>
                                </ValidationProvider>

                                <ValidationProvider name="Last Name" rules="required|alpha" v-slot="{ errors }">
                                    <b-form-group id="input-group-2" label="Last Name:" label-for="input-2">
                                        <b-form-input id="input-2" type="text" v-model="lastName" required
                                            placeholder="Enter last name">
                                        </b-form-input>
                                    </b-form-group>
                                    <span class="validate">{{ errors[0] }}</span>
                                </ValidationProvider>
                                <ValidationProvider name="E-mail" rules="required|email" v-slot="{ errors }">
                                    <b-form-group id="input-group-3" label="Email address:" label-for="email">
                                        <b-form-input id="email" v-model="email" type="email" required
                                            placeholder="Enter email">
                                        </b-form-input>
                                    </b-form-group>
                                    <span class="validate">{{ errors[0] }}</span>
                                </ValidationProvider>


                                <ValidationProvider name="Password" rules="required|min:6" v-slot="{ errors }">
                                    <b-form-group id="input-group-4" label="Password:" label-for="input-4"
                                        >
                                        <b-form-input id="input-4" v-model="password" type="password" required
                                            placeholder="enter password" min="6"></b-form-input>

                                    </b-form-group>
                                    <span class="validate">{{ errors[0] }}</span>
                                </ValidationProvider>


                                <!--
                            <b-form-group id="input-group-5" label="Confirm password:" label-for="input-5"
                                description="your password confirmation .">
                                 <b-form-input id="input-5" v-model="confirm_password" type="password" required
                                    placeholder="confirm password" min="6" ></b-form-input>

                            </b-form-group>
                            -->

                                <b-button type="submit" :disabled="invalid">Submit</b-button>
                                <!--<b-button type="reset" variant="danger">Reset</b-button>-->
                            </b-form>

                        </ValidationObserver>
































                        <p class="auth-text">Déjà inscrit ? <a class="auth-link" href="/login">Se connecter</a></p>
                    </div>
                    <div class="side-img">
                        <h2 class="side-img-text">
                            Make the administrative systeme easy <br>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
        <div>
            <appFooter></appFooter>
        </div>
    </section>

</template>

<script>
    import appHeader from '../pages/HeaderContent'
    import appFooter from '../pages/AppFooter'
    //  import {mapGetters} from 'vuex'

    import axios from 'axios'
    axios.defaults.baseURL = 'http://127.0.0.1:8000/api/auth'
    export default {
        components: {
            appHeader,
            appFooter

        },
        data() {
            return {
                email: '',
                firstName: '',
                lastName: '',
                password: null,
                confirm_password: null,
                description: false,
                show: true
            }
        },
        methods: {
            register: function () {
                let data = {
                    firstName: this.firstName,
                    lastName: this.lastName,
                    email: this.email,
                    password: this.password,
                    // confirm_password:this.confirm_password
                    // is_admin: this.is_admin
                }
                this.$store.dispatch('register', data)
                    .then(() => this.$router.push('/login'))
                    .catch(err => console.log(err))
            },

            /*  onSubmit:function(){
                   let data = {
                  firstName: this.firstName,
                  lastName: this.lastName,
                  email: this.email,
                  password: this.password,  
               }
                  axios.post('/register',data)
                  .then(
                      res=>{console.log(res);
                      }
                  )
              },*/

            /* onSubmit: function() {
                 let data = {
                 firstName: this.firstName,
                 lastName: this.lastName,
                 email: this.email,
                 password: this.password,  
              } let data = {
                 firstName: this.firstName,
                 lastName: this.lastName,
                 email: this.email,
                 password: this.password,  
              }
                /* evt.preventDefault()
                 alert(JSON.stringify(this.form))
                 console.log("submitted")*/
            /*
                 this.$store
                .dispatch('register',data)
                .then(() => {
                this.$router.push({ name: 'login' })
                })
                .catch(err => {
                console.log(err)
                })
            },*/


            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.email = ''
                this.form.firstName = ''
                this.form.lastName = ''
                this.form.password = ''
                this.form.confirm_password = ''
                // Trick to reset/clear native browser form validation state
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
            }
        }
    }
</script>
<style scoped>
    .custom-title {
        font-size: 36px;
        font-weight: 500;
        position: relative;
        margin-bottom: 90px;
        text-align: center;
        color: #ed3f4e;
    }

    /*Important */

    .l-authentification .auth {
        position: relative;
        z-index: 1;
        width: 60%;
        padding: 60px;
        border-radius: 7px;
        background-color: #fff;
        box-shadow: 0 0 40px rgba(0, 0, 0, .13);
    }

    .l-authentification.register .side-img {
        background-image: url(../../../../public/img/administrationTunisie.jpg);
    }

    .l-authentification .side-img {
        position: relative;
        left: -70px;
        width: 60%;
        min-height: 900px;
        padding: 60px 30px 60px 120px;
        border-radius: 7px;
        background-position: 50%;
        background-size: cover;
    }

    .l-authentification .parent-blck {
        display: flex;
        justify-content: flex-start;
        align-items: center;
    }

    .l-authentification {
        padding-top: 85px;
        padding-bottom: 85px;
        background-color: #f5f5f5;
    }

    .l-authentification .side-img-text {
        padding-top: 250px;
        line-height: 62px;
        text-align: center;
        font-size: 50px;
        font-style: oblique;
        font-weight: 500;
        position: relative;
        color: #ed3f4e;
    }

    .auth button[type="submit"] {
        margin-top: 20px;
        width: 100%;
        height: 80%;
        padding: 15px;
        background-color: #ed3f4e;
        border: 0;
        box-sizing: border-box;
        cursor: pointer;
        font-weight: bold;
        color: #ffffff;
    }
    span .validate {
  display: block;
  color:#ed3f4e;
}
</style>