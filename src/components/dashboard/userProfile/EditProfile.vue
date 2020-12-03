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
                            <b-form-group id="group1" label="username" label-for="input1">
                                <b-form-input id="input1" type="text" value="zita" name="username" v-model="username" required>
                
                                </b-form-input>
                            </b-form-group>
                        </div>
                
                        <div>
                            <b-form-group id="group2" label="Email" label-for="input2">
                                <b-form-input id="input2" clearable name="Email" v-model="email" type="email" value="zi@gmail.cm"
                                    required>
                                </b-form-input>
                            </b-form-group>
                        </div>
                
                
                        <div>
                            <b-form-group label="Address" label-for="input3" id="group3">
                                <b-form-input id="input3" v-model="address" type="text" required value="ariana 1235">
                                </b-form-input>
                            </b-form-group>
                        </div>
                        <div>
                            <p>Edit password</p>
                        </div>
                
                
                
                
                
                
                
                        <b-button @click="onSubmit">Update</b-button>
                
                    </b-card-body>
                </b-card>
           </div>
       </div>
    </div>

</template>
<script>
    export default {
        components: {},
        data() {
            return {
                user: "",
                model: {
                    username: "",
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
        methods: {

            /* onSubmit() {
               this.$validator.validateAll().then(res => {
                 if (res) {
                   let postBody = {
                     user_name: this.model.username,
                     email: this.model.email,
                     birthDate: this.model.date,
                     address: this.model.address,
                     lang: "eng",
                     birthPlace: this.model.place,
                     city: this.model.city,
                     postcode: this.model.postCode,
                     custom: this.model.currency,
                     id: this.$currentUser
                   };*/

            /*handleSuccess(res, file) {
              if (res) {
                this.model.imageUrl = URL.createObjectURL(file.raw);
              }
            },*/
            /*beforeUpload(file) {
              let isIMG = file.type.match("jpeg|png");
              const isLt = file.size / 1024 / 1024 < 0.25;
              if (!isIMG) {
                this.$message.error("Avatar picture must be JPG or PNG format!");
              }
              if (!isLt) {
                this.$message.error("Avatar picture size can not exceed 250 KB!");
              }
              if (isIMG === undefined || isIMG === null) {
                isIMG = false;
              }
              return isIMG && isLt;
            }*/
        },

    };
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