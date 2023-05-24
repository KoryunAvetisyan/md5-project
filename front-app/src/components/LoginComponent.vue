<template>
    <div class="card" align="left">
        <div class="card-header text-center fs-2 fw-bold">Sign In</div>
        <div class="card-body">
            <form @submit.prevent="signIn()">
                <div class="alert alert-danger" role="alert" v-if="notExist === 1">
                    <p class="text-danger m-0">Invalid credentials!</p>
                </div>
                <div>
                    <label>Email</label>
                    <input type="text" v-model="userData.email" name="email" id="email" class="form-control shadow-none" :class="{ 'outline-error' : errorsIndexes.includes(1) }"/>
                </div>
                <p class="text-danger small m-0" v-if="errorsIndexes.includes(1)">{{ emailError }}</p>
                <div class="mt-3">
                    <label>Password</label>
                    <input type="password" v-model="userData.password" name="password" id="password" class="form-control shadow-none" autocomplete="on" :class="{ 'outline-error' : errorsIndexes.includes(2) }"/>
                </div>
                <p class="text-danger small m-0" v-if="errorsIndexes.includes(2)">{{ passwordError }}</p>
                <div class="d-sm-flex mt-3 justify-content-between align-items-center">
                    <router-link to="/register">Don't have an account?</router-link>
                    <div>
                        <vue-recaptcha ref="recaptcha" @verify="onVerify" sitekey="6Lcv03klAAAAAEG-EA-LwaZwxf5Ewqc1x_ZH4b-S"></vue-recaptcha>
                        <p class="text-danger small m-0" v-if="errorsIndexes.includes(3)">{{ captchaError }}</p>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <input type="submit" value="Sign In" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</template>
  
<script>
import axios from 'axios'
import { VueRecaptcha } from 'vue-recaptcha'
  
export default {
    name: 'LoginComponent',
    components: { 'vue-recaptcha': VueRecaptcha },
    data () {
        return {
            result: {},
            userData: {
                email: '',
                password: ''
            },
            emailError: '',
            passwordError: '',
            captchaError: '',
            notExist: 0,
            errorsIndexes: [],
            captchaChecked: false
        }
    },
    
    methods: {
        signIn () {
            this.emailError = ''
            this.passwordError = ''
            this.captchaError = ''
            this.notExist = 0
            this.errorsIndexes = []
            const regex = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)
            if (!this.userData.email) {
                this.emailError = 'The email field is required!'
                this.errorsIndexes.push(1)
            }
            if (this.userData.email && !regex.test(this.userData.email)) {
                this.emailError = 'Your email is incorrect!'
                this.errorsIndexes.push(1)
            }
            if (!this.userData.password) {
                this.passwordError = 'The password field is required!'
                this.errorsIndexes.push(2)
            }
            if (this.userData.password && this.userData.password.length < 6) {
                this.passwordError = 'The lastname field must be at least 6 characters!'
                this.errorsIndexes.push(2)
            }
            if (!this.captchaChecked) {
                this.captchaError = 'The captcha is required!'
                this.errorsIndexes.push(3)
            }
            if (!this.errorsIndexes.length) {
                axios.post('http://127.0.0.1:8000/api/login', this.userData)
                .then(
                    ({data}) => {
                        try {
                            if (data.status === true) {
                                localStorage.setItem('haveUser', JSON.stringify({
                                    email: this.userData.email
                                }))
                                this.$router.push({ name: 'HomeComponent', path: '/', params: { fromAnotherComponent: 'yes' } })
                            } else {
                                this.notExist = 1
                            }
                        } catch (err) {
                            alert(err)
                        }
                    }
                )
            }
        },
        onVerify: function (response) {
            axios.post('http://127.0.0.1:8000/api/check-captcha', response)
                .then(response => {
                    if (response.data.success === true) {
                        this.captchaChecked = true
                    }
                }).catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>
  
<style scoped>
.outline-error {
    border-color: #d9534f;
}
</style>
  