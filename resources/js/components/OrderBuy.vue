<template>
  <nav class="navBar">
    <ul class="navBar__link">
      <li><router-link :to="{ name: 'home' }">Homex</router-link></li>
      <li><router-link :to="{ name: 'about' }">Aboutx</router-link> </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'orderbuy'
}
</script>
