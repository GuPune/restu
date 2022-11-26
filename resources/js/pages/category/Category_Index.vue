<template>
    <v-row>
        <Search :brands="brands_select" :brand_s="brand_s"/>
        <Car :cars_form="cars_form"/>
    </v-row>
</template>

<script>

    import Search from '@components/Search';
    import Car    from '@components/Car';
    import { mapGetters } from "vuex";
    import { FETCH_BRANDS_SELECT } from "@store/actions.type";
    export default {
        name: 'Category_Index',
        components : { Search, Car },
        data: () => ({
            type  : null,
        }),
        mounted() {
            let test = this.$store.dispatch(FETCH_BRANDS_SELECT, "inventory");
        },
        computed: {
            ...mapGetters(["brands_select","brand_s","cars_form"]),
        },
    }
</script>


<style lang="scss">
    .v-text-field > .v-input__control > .v-input__slot > .v-text-field__slot {
        font-size: 16px !important;
    }
</style>
