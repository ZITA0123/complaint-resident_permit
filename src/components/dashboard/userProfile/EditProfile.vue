<template>

    <div class="editprofile">
       <div class="edit1">
           <div class="edit2">
                <b-card >
                    <b-card-title>
                        <div>
                            <b-icon icon="card-list"></b-icon> Edit Profile
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="picture-container">
                                    <h6>Choose Avatar</h6>
                                    <b-avatar></b-avatar>
                                   <!--<small>jpg/png files with a size less than 250kb</small>--> 
                                    <br>
                                </div>
                            </div>
                        </div>
                    </b-card-title>
                    <b-card-body>
                
                
                        <div>
                            <b-form-group id="group1" label="FirstName" label-for="input1">
                                <b-form-input id="input1" type="text"  name="firstName" v-model="firstName" required>               
                                </b-form-input>
                            </b-form-group>
                        </div>
                         <div>
                            <b-form-group id="group4" label="LastName" label-for="input4">
                                <b-form-input id="input4" type="text"  name="lastName" v-model="lastName" required>               
                                </b-form-input>
                            </b-form-group>
                        </div>
                
                        <div>
                            <b-form-group id="group2" label="Email" label-for="input2">
                                <b-form-input id="input2" clearable name="Email" v-model="email" type="email"
                                    required>
                                </b-form-input>
                            </b-form-group>
                        </div>
                
                
                       <!-- <div>
                            <b-form-group label="Address" label-for="input3" id="group3">
                                <b-form-input id="input3" v-model="address" type="text" required >
                                </b-form-input>
                            </b-form-group>
                        </div>-->
                       <!-- <div>
                            <p>Edit password</p>
                        </div>
                        -->
                        <b-button @click="onSubmit">Update</b-button>
                
                    </b-card-body>
                </b-card>
           </div>
       </div>
    </div>

</template>
<script>
import Axios from 'axios';
    export default {
        components: {},
        data() {
            return {
                users:[],
                firstName:"",
                lastName:"",
                email: "",
                address:'',
                id:'',
                model: {
                    username: "rrr",
                    date: "",
                    city: "",
                    place: "",
                    postCode: "",
                    currency: "",
                    address: "",
                    email: "",
                    imageUrl: "static/img/user-logo.png"
                },
                modelValidations: {
                    address: {
                        required: true
                    },
                    city: {
                        required: true,
                        regex: /^[a-z\s]{0,255}$/i
                    },
                    currency: {
                        required: true
                    },
                    postCode: {
                        required: true,
                        numeric: true
                    },
                    username: {
                        required: true,
                        regex: /^(?=[a-z_\d]*[a-z])[a-z_\d]{6,}$/i
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    place: {
                        required: true,
                        regex: /^[a-z\s]{0,255}$/i
                    },
                    date: {
                        required: true
                    }
                },

            };
        },
    mounted() {
      this.getUsers()
    },
        methods: {
             getUsers() {
        let user = localStorage.getItem('user')
        Axios.get('http://127.0.0.1:8000/api/users/' + user)
          .then(response => {
            this.users = response.data
            this.firstName=this.users.firstName
            this.lastName=this.users.lastName
            this.email=this.users.email
            this.id=this.users.id
            console.log(this.users)

          })
          .catch(error => {
            console.log(error)
            this.errored = true
          })
          
      },
             onSubmit() {
                let data = {
            firstName: this.firstName,
            lastName: this.lastName,
            email: this.email,
        }
           Axios.put('http://127.0.0.1:8000/api/user/'+this.id ,data)
          .then(response => {
           window.location.reload()
            console.log(response)

          })
          .catch(error => {

            console.log(error)
            this.errored = true
          })
         
        },

    }
}
</script>
<style scoped>
    .picture-container  {
        text-align: center;
    }
    .editprofile {
       padding-top: 85px;
        padding-bottom: 35px;
        background-color: #f5f5f5;
    }
    .editprofile .edit1{
       /* display: flex;*/
        justify-content:center;
        align-items: flex-start;
    }
     .editprofile .edit1{
        position: relative;
        z-index: 1;
        width: 90%;
        padding: 60px;
        border-radius: 7px;
        background-color: #fff;
        box-shadow: 0 0 40px rgba(0, 0, 0, .13);
    }
</style>