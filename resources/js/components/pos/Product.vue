<template>

<div class="row">

    <div class="col-sm-3" v-for="i in items" id="3" note="" serial="0" align="center" style="font-size:10px">
    <div class="card" style="background-color: ; cursor:pointer; height:180px;padding:10px">
    <div style="font-size:0.9rem">
    <img  :src="Checkimage(i.images)"width="80" height="80"><br> <strong>{{i.name_list}}</strong><br>{{i.price_sell}}
    </div>
    </div>
    </div>

</div>






</template>


<script>

import { FETCH_PRODUCT } from "@store/actions.type";
import { IMAGE_URL } from "../environment/environment";

  export default {
    data() {
      return {
        items: [],
      }
    },
  mounted() {
  //  let a = this.$store.dispatch(FETCH_PRODUCT);

//    let a = this.$store.dispatch(FETCH_CATEGORY_SHELL);
this.Loadcategory()
     },

  methods: {

  async Loadcategory() {
         let data = await this.$store.dispatch(FETCH_PRODUCT);
this.items = data;
    },
    Checkimage(image){
                let public_images = IMAGE_URL+''+image;
                return public_images;
        },



  },




        }


</script>
