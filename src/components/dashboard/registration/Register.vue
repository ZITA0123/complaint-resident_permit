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
                        <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                            <b-form-group id="input-group-1" label="First Name:" label-for="input-1"
                                v-if="description='please enter your first name'">
                                <b-form-input id="input-1" type="text" v-model="form.first_name" required
                                    placeholder="Enter first name">
                                </b-form-input>
                            </b-form-group>
                            <b-form-group id="input-group-2" label="Last Name:" label-for="input-2">
                                <b-form-input id="input-2" type="text"
                                 v-model="form.last_name" required
                                    placeholder="Enter last name">
                                </b-form-input>
                            </b-form-group>

                            <b-form-group id="input-group-3" label="Email address:" label-for="input-3">
                                <b-form-input id="input-3" v-model="form.email" type="email" required
                                    placeholder="Enter email">
                                </b-form-input>
                            </b-form-group>

                            <b-form-group id="input-group-4" label="Password:" label-for="input-4"
                                description="We'll never share your password.">
                                <b-form-input id="input-5" v-model="form.password" type="password" required
                                    placeholder="enter password"></b-form-input>

                            </b-form-group>
                            <b-form-group id="input-group-5" label="Confirm password:" label-for="input-5"
                                description="your password confirmation .">
                                <b-form-input id="input-1" v-model="form.confirm_password" type="password" required
                                    placeholder="confirm password"></b-form-input>
                            </b-form-group>

                            <b-button type="submit" >Submit</b-button>
                            <!--<b-button type="reset" variant="danger">Reset</b-button>-->
                        </b-form>
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
    export default {
        components: {
            appHeader,
            appFooter
        },
        data() {
            return {
                form: {
                    email: '',
                    first_name: '',
                    last_name: '',
                    password: '',
                    confirm_password: ''
                },
                description: false,
                show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault()
                alert(JSON.stringify(this.form))
            },
            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.email = ''
                this.form.first_name = ''
                this.form.last_name = ''
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
   font-style:oblique;
   font-weight: 500;
  position: relative;
    color: #ed3f4e;
}
     .auth button[type="submit"] {
        margin-top: 20px;
        width: 100%;
        height: 80%;
        padding: 15px;
        background-color:#ed3f4e;
        border: 0;
        box-sizing: border-box;
        cursor: pointer;
        font-weight: bold;
        color: #ffffff;
    }
</style>