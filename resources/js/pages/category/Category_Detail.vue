<template>
    <v-row>
        <CarDetail/>
    <v-container>
                    <CarDetailFinance />
    </v-container>
    </v-row>



</template>

<script>
    import CarDetail from '@components/CarDetail';
    import CarDetailFinance from '@components/CarDetailFinance';
    export default {
        name: 'Category_Detail',
        components : { CarDetail,CarDetailFinance },
    }
</script>


