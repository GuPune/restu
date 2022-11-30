<template>
  <div class="pay">
    <h2>
      Pay {{this.currentRouteName}}
    </h2>
  </div>
</template>

<script>
import { mapGetters,mapState } from "vuex";
import { GET_TOKEN } from "@store/actions.type";
export default {
  name: 'pay',
  data: () => ({
        form:{
            token:null,
        },
        order:null
        }),
  computed: {
    currentRouteName() {
      return this.$route.name;
    }
  },

  async created(){
   this.form.token = this.$route.params.token
   let gettoken = await this.$store.dispatch(GET_TOKEN,this.form);
},
}
</script>
