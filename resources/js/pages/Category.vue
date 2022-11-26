<template>
    <div class="category">
        <go-top bg-color="#00267d" :bottom="50"></go-top>
        <v-container class="grey lighten-5" fluid>
            <router-view></router-view>
        </v-container>
    </div>
</template>

<script>
    import GoTop from '@inotom/vue-go-top';
    export default {
        name: 'Category',
        components: { GoTop }
    }
</script>
