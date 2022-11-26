<template>
  <div class="app">
    <Navbar></Navbar>
    <router-view></router-view>
  </div>
</template>

<script>

export default {
  name: 'app',
  components: {
    Navbar: () => import('./Navbar.vue')
  }
}
</script>
