<template>
    <div class="shadow fixed-top" style="background-color:#ec7d23;">
  <div class="row" style="margin-bottom:2%; font-family:Mitr;">
    <div class="col-3 text-center text-white" style="padding-top:1%;">

    </div>
    <div class="col-6 text-white text-center" style="padding-top:1%;" v-if="this.toe">
        <i class="fa fa-qrcode fa-2x" aria-hidden="true"></i> โต๊ะ {{this.toe.number_toe}}
    </div>
    <div class="col-3 text-center text-white" style="padding-top:1%;">
        <i class="fa fa-cart-plus fa-2x" aria-hidden="true">{{this.cartTotal}}</i>
    </div>
  </div>
</div>
</template>

<script>

import { FETCH_TOE_FRONT } from "@store/actions.type";
import { mapGetters,mapState } from "vuex";
export default {
  name: 'navbar',
  data() {
      return {
        form:{
            token:null,
        },
        toe_id:0,
        typerest: "0",
        toeall:"0",
        x:1,

      }
    },
  computed: {
   ...mapGetters(["toe","cartTotal"]),


        },

        async created(){


       // this.form.token = this.$route.params.token;
      //  let toe = await this.$store.dispatch(FETCH_TOE_FRONT,this.form);








        },

        mounted() {

     this.form.token = this.$route.params.token
     let toe = this.$store.dispatch(FETCH_TOE_FRONT,this.form);

},
}
</script>
