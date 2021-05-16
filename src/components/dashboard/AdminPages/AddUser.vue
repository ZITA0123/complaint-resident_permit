<template>
    <div class="add">

        <div class="user">
            <b-form @submit.prevent="addUser">
                <b-form-group id="input-group-1" label="First Name:" label-for="input-1"
                    v-if="description='please enter your first name'">
                    <b-form-input id="input-1" type="text" v-model="firstName" required placeholder="Enter first name">
                    </b-form-input>
                </b-form-group>
                <b-form-group id="input-group-2" label="Last Name:" label-for="input-2">
                    <b-form-input id="input-2" type="text" v-model="lastName" required placeholder="Enter last name">
                    </b-form-input>
                </b-form-group>

                <b-form-group id="input-group-3" label="Email address:" label-for="input-3">
                    <b-form-input id="input-3" v-model="email" type="email" required placeholder="Enter email">
                    </b-form-input>
                </b-form-group>

                <b-form-group id="input-group-4" label="Password:" label-for="input-4">
                    <b-form-input id="input-4" v-model="password" type="password" required placeholder="enter password"
                        min="6"></b-form-input>

                </b-form-group>
                <b-button type="submit">Ajouter User</b-button>
            </b-form>
        </div>
    </div>
</template>
<script>
    import Axios from 'axios'
    export default {
        data() {
            return {
                email: '',
                firstName: '',
                lastName: '',
                password: null,
            }
        },
        created() {},
        methods: {
            addUser() {
                let data = {
                    firstName: this.firstName,
                    lastName: this.lastName,
                    email: this.email,
                    password: this.password,
                }
                Axios
                    .post('http://127.0.0.1:8000/api/auth/register', data)
                    .then(() => this.$router.push('/admin'))
                    .catch(error => {
                        console.log(error)
                        this.errored = true
                    })
            },

        },

    }
</script>
<style scoped>
    .add {
        margin: 0 auto;
        width: 50%;
        padding: 85px 85px;
    }

    .user {
        padding: 60px;
        border-radius: 7px;
        box-shadow: 0 0 40px rgba(0, 0, 0, .13);
    }
</style>