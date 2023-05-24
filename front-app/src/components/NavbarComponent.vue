<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-success">
      <div class="container-fluid">
        <router-link to="/" class="navbar-brand">MD5</router-link>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapseNavbar">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item" v-if="!isLoggedIn">
              <router-link class="nav-link" to="/register">Sign Up</router-link>
            </li>
            <li class="nav-item" v-if="!isLoggedIn">
              <router-link class="nav-link" to="/login">Sign In</router-link>
            </li>
            <li class="nav-item" v-if="isLoggedIn">
              <a class="nav-link logout-link" @click="logout()">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </template>
  
<script>
export default {
    name: 'NavbarComponent',

    data () {
        return {
            isLoggedIn: false
        }
    },

    mounted () {
        if (localStorage.getItem('haveUser')) {
            this.isLoggedIn = true
        }
    },
    
    methods: {
        logout () {
            localStorage.removeItem('haveUser')
            window.location.reload()
        }
    }
}
</script>
  
<style scoped>
.logout-link {
    cursor: pointer !important;
}
button:focus {
    box-shadow: none;
}
</style>