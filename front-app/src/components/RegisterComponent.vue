<template>
    <div class="card" align="left">
      <div class="card-header text-center fs-2 fw-bold">Sign Up</div>
      <div class="card-body">
        <form @submit.prevent="signUp()">
          <div>
            <label>Firstname</label>
            <input type="text" v-model="userData.first_name" name="first_name" id="first_name" class="form-control shadow-none" :class="{ 'outline-error': errorsIndexes.includes(1) }"/>
          </div>
          <p class="text-danger small m-0" v-if="errorsIndexes.includes(1)">{{ firstnameError }}</p>
          <div class="mt-3">
            <label>Lastname</label>
            <input type="text" v-model="userData.last_name" name="last_name" id="last_name" class="form-control shadow-none" :class="{ 'outline-error': errorsIndexes.includes(2) }"/>
          </div>
          <p class="text-danger small m-0" v-if="errorsIndexes.includes(2)">{{ lastnameError }}</p>
          <div class="mt-3">
            <label>Email</label>
            <input type="text" v-model="userData.email" name="email" id="email" class="form-control shadow-none" :class="{ 'outline-error': errorsIndexes.includes(3) }"/>
          </div>
          <p class="text-danger small m-0" v-if="errorsIndexes.includes(3)">{{ emailError }}</p>
          <div class="mt-3">
            <label>Password</label>
            <input type="password" v-model="userData.password" name="password" id="password" class="form-control shadow-none" autocomplete="on" :class="{ 'outline-error': errorsIndexes.includes(4) }"/>
          </div>
          <p class="text-danger small m-0" v-if="errorsIndexes.includes(4)">{{ passwordError }}</p>
          <div class="mt-3">
            <label>Confirm password</label>
            <input type="password" v-model="userData.confirm_password" name="confirm_password" id="confirm_password" class="form-control shadow-none" autocomplete="on" :class="{ 'outline-error': errorsIndexes.includes(5) }"/>
          </div>
          <p class="text-danger small m-0" v-if="errorsIndexes.includes(5)">{{ confirmPasswordError }}</p>
          <div class="mt-3">
            <label>Phone</label>
            <input type="number" v-model="userData.phone" name="phone" id="phone" class="form-control" :class="{ 'outline-error': errorsIndexes.includes(6) }"/>
          </div>
          <p class="text-danger small m-0" v-if="errorsIndexes.includes(6)">{{ phoneError }}</p>
          <div class="mt-3">
            <router-link to="/login">Have an account?</router-link>
          </div>
          <div class="mt-3 d-flex justify-content-end">
            <input type="submit" value="Sign Up" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </template>
  
<script>
import axios from 'axios'
  
export default {
    name: 'RegisterComponent',
    
    data () {
        return {
            userData: {
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                confirm_password: '',
                phone: ''
            },
            firstnameError: '',
            lastnameError: '',
            emailError: '',
            passwordError: '',
            confirmPasswordError: '',
            phoneError: '',
            errorsIndexes: []
        }
    },

    methods: {
        signUp () {
            this.firstnameError = ''
            this.lastnameError = ''
            this.emailError = ''
            this.passwordError = ''
            this.confirmPasswordError = ''
            this.phoneError = ''
            this.errorsIndexes = []
            const regex = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/)
            if (!this.userData.first_name) {
                this.firstnameError = 'The firstname field is required!'
                this.errorsIndexes.push(1)
            }
            if (this.userData.first_name && this.userData.first_name.length < 3) {
                this.firstnameError = 'The firstname field must be at least 3 characters!'
                this.errorsIndexes.push(1)
            }
            if (!this.userData.last_name) {
                this.lastnameError = 'The lastname field is required!'
                this.errorsIndexes.push(2)
            }
            if (this.userData.last_name && this.userData.last_name.length < 3) {
                this.lastnameError = 'The lastname field must be at least 3 characters!'
                this.errorsIndexes.push(2)
            }
            if (!this.userData.email) {
                this.emailError = 'The email field is required!'
                this.errorsIndexes.push(3)
            }
            if (this.userData.email && !regex.test(this.userData.email)) {
                this.emailError = 'Your email is incorrect!'
                this.errorsIndexes.push(3)
            }
            if (!this.userData.password) {
                this.passwordError = 'The password field is required!'
                this.errorsIndexes.push(4)
            }
            if (this.userData.password && this.userData.password.length < 6) {
                this.passwordError = 'The lastname field must be at least 6 characters!'
                this.errorsIndexes.push(4)
            }
            if (!this.userData.confirm_password) {
                this.confirmPasswordError = 'The confirm password field is required!'
                this.errorsIndexes.push(5)
            }
            if (this.userData.confirm_password && this.userData.confirm_password !== this.userData.password) {
                this.confirmPasswordError = 'Confirm password field must match with password field!'
                this.errorsIndexes.push(5)
            }
            if (!this.userData.phone) {
                this.phoneError = 'The phone field is required!'
                this.errorsIndexes.push(6)
            }
            if (!this.errorsIndexes.length) {
                axios.post('http://127.0.0.1:8000/api/register', this.userData).then(
                    ({data}) => {
                        try {
                            if (data.status === true) {
                                localStorage.setItem('haveUser', JSON.stringify({
                                    email: this.userData.email
                                }))
                                this.$router.push({ name: 'HomeComponent', path: '/', params: { fromAnotherComponent: 'yes' } })
                            } else {
                                alert('Something went wrong!')
                            }
                        } catch (err) {
                            alert(err)
                        }
                    }
                )
            }
        }
    }
}
</script>
  
<style scoped>
.outline-error {
    border-color: #d9534f;
}
</style>
  