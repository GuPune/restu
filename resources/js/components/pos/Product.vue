<template>


<div class="row">
    <div class="col-sm-3" v-for="i in this.product" id="3" note="" serial="0" align="center" style="font-size:10px"  @click="Sendorder(i)">
    <div class="card" style="background-color: ; cursor:pointer; height:180px;padding:10px">
    <div style="font-size:0.9rem">
    <img  :src="Checkimage(i.images)"width="80" height="80"><br> <strong>{{i.name_list}}</strong><br>{{i.price_sell}}
    </div>
    </div>
    </div>
</div>






</template>


<script>
import { mapGetters } from "vuex";
import { FETCH_PRODUCT,ADD_PRODUCT,FETCH_ORDER } from "@store/actions.type";
import { IMAGE_URL } from "../environment/environment";

  export default {
    data() {
      return {
        items: [],
        form:{
        toe_id:null
        },
      }
    },

    computed: {
   ...mapGetters(["product","toe_id"]),

        },

  mounted() {
  //  let a = this.$store.dispatch(FETCH_PRODUCT);

//    let a = this.$store.dispatch(FETCH_CATEGORY_SHELL);
this.Loadcategory();
this.Loadorder();

     },

  methods: {

  async Loadcategory() {
         let data = await this.$store.dispatch(FETCH_PRODUCT);
    },

    async Loadorder() {

        this.form.toe_id = this.toe_id;
         let ord = await this.$store.dispatch(FETCH_ORDER,this.form);
    },
    Checkimage(image){
                let public_images = IMAGE_URL+''+image;
                return public_images;
        },

        async Sendorder(data){
            Vue.set(data, 'res_id', data.id);
             Vue.set(data, 'toe_id', this.toe_id);



           let add_producttocart = await this.$store.dispatch(ADD_PRODUCT,data);
        }



  },




        }


</script>
