<template>
  <v-parallax class="not-found">
          <v-layout column align-center justify-center class="white--text">
            <img src="/images/logo.png" alt="Vuetify.js" height="200" class="hidden-md-and-down">
            <h1 class="black--text mb-2 mt-10 display-1 text-center"> THE PAGE NOT FOUND ! </h1>
            <router-link :to="{ path: '/'} ">
                <v-btn class="mt-12" color="blue lighten-2" dark large>
                    Go To Home Page
                </v-btn>
            </router-link>
          </v-layout>
        </v-parallax>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>
