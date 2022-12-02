<template>
    <div>
        <hr class="style-two">
<h5>
    <i class="fa fa-shopping-cart" aria-hidden="true">

    </i> ประเภทอาหาร {{this.currentRouteName}}  {{this.form.token}}</h5>
        <div class="row mb-3">
				<div class="col-4 pl-2 pr-2" v-for="i in this.typerest">

                     <router-link :to="{ name: 'listres', params: { token:i.token,id: i.id }}">
					<div class="card shadow">
						<div class="card-body text-center">
                             <img  :src="checkImage(i.images)" width="100%"/>
                             </div>
                                 <h5 class="card-title" style="text-align: center;">{{i.name}}</h5>

					</div>


                     </router-link>
                    </div>
      </div>
    </div>
</template>
<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_TYPERES,FETCH_TOE_FRONT,GET_TOKEN } from "@store/actions.type";
import { IMAGE_URL } from "../components/environment/environment";

export default {
    name: 'home',
    components: {

        },
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
    currentRouteName() {
      return this.$route.name;
    }
  },
  async created(){

        this.form.token = this.$route.params.token;
        // let toe = await this.$store.dispatch(FETCH_TOE_FRONT,this.form);
        let gettoken = await this.$store.dispatch(GET_TOKEN,this.form);
        let typeres = await this.$store.dispatch(FETCH_TYPERES,this.form);
        this.typerest = typeres;







        },
    mounted() {

        },
        methods: {

checkImage(image){

    let a = IMAGE_URL+''+image;


return a;
}

}
}
</script>


