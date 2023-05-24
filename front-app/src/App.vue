<template>
  <div id="app">
    <NavbarComponent />
    <div class="content my-4 container">
      <router-view/>
    </div>
  </div>
</template>

<script>
import NavbarComponent from './components/NavbarComponent.vue'
export default {
  name: 'App',
  components: {
    NavbarComponent
  }
}
</script>