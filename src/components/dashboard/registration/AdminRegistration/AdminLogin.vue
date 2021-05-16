<template>
  
       
        <section class="login-form">
            
            <div class="log">
                <h1 class="title">Admin Login</h1>
                <p class="sub-title">Hello! Log in with your email.</p>

                <b-form @submit.prevent="login" >
                    <div v-if="errors[0]=='error' " style="color:#ed3f4e; font-weight: bold;text-align:center;">
                        <p> Your email or your password is wrong!</p>
                    </div>
                    <b-form-group
                    id="group1"
                    label-for="input1"
                    label="Email"
                   :description="description">
                        <b-form-input
                        type="email" placeholder="enter your email" required v-model="email" id="input1"></b-form-input>
                    </b-form-group>
                     <b-form-group
                    id="group2"
                    label-for="input2"
                    label="Password"
                    description="">
                        <b-form-input
                        type="password" placeholder="enter password" required v-model="password" id="input2"></b-form-input>
                    </b-form-group>
                    <b-button type="submit" v-on:click="getuser()"  >Log In</b-button>
                </b-form>
        
            </div>

        
        </section>
     
 
</template>

<script>
// import axios from 'axios'
 //axios.defaults.baseURL = 'http://127.0.0.1:8000/api/auth'
    export default {
        components: {
        
        },
        data() {
            return {
                errors: [],
                email: null,
                password: null,
               
                
            }
        },
       

        methods: {
            checkForm: function (e) {
                this.errors = [];
                if (!this.email) {
                    //this.errors.push('Email required.');
                    this.errors.push('email');
                } else if (!this.validEmail(this.email)) {
                    // this.errors.push('Valid email required.');
                    this.errors.push('vemail');
                }
                if (!this.errors.length) {
                    return true;
                }
                if (!this.password) {
                    //this.errors.push('Password required.');
                    this.errors.push('pass');

                }
                e.preventDefault();
            },

            login:function(){    
             
            let email = this.email
            let password = this.password
            this.$store.dispatch('loginAdmin', { email, password })
            .then(() =>{ 
                this.$router.push('/admin')})
            .catch(err => {console.log(err),
                this.errors.push("error")
            }
        )
        
            },
          



            validEmail: function (email) {
                var re =
                    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            }
        }
    }
</script>

<style>
    .alert {
        color: maroon;
        font-size: 13px;
        font-weight: 400;
        line-height: 1rem;
    }


    .login-form {
        padding-top: 85px;
        padding-bottom: 85px;
        margin: 0 auto;
        width: 40%;
        font-family: Tahoma, Geneva, sans-serif;
    }

    .log {
        position: relative;
        padding: 60px;
        border-radius: 7px;
        /*background-color: #fff;*/
        box-shadow: 0 0 40px rgba(0, 0, 0, .13);
    }

 
    .title {
        font-size: 36px;
        font-weight: 500;
        text-align: center;
        color: #ed3f4e;
    }

    .sub-title {
        font-size: 18px;
        font-weight: 200;
        margin-bottom: 40px;
        text-align: center;
        color: #4d4d4d;
    }

    .another-action a {
        color: black;
        font-weight: bold;
        text-decoration: none;
    }

    .another-action a:hover {
        color: #ff7300;
        font-weight: bold;
        text-decoration: none;
    }

    .login-form input[type="password"],
    .login-form input[type="email"] {
        width: 100%;
        padding: 15px;
        border: 1px solid #ddddde;
        box-sizing: border-box;
       /* background-color: #D7D3D2;*/
    }

    .login-form button[type="submit"] {
        margin-top: 20px;
        width: 100%;
        padding: 15px;
       /* background-color: #ff7300;*/
        background-color:#ed3f4e;
        border: 0;
        box-sizing: border-box;
        cursor: pointer;
        font-weight: bold;
        color: #ffffff;
    }
</style>