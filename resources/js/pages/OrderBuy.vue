<template>


  <div class="orderbuy">
        <hr class="style-two">
<h5>
    <i class="fa fa-shopping-cart" aria-hidden="true">

    </i> อาหารที่สั่ง {{this.currentRouteName}}</h5>
    <div class="row" v-for="i in this.order" style="margin-top: 0.5rem;">
        <div class="col-4 pl-2 pr-2" style="background-color: white;">
                <div class="col-12">
                    <div>
                            <div class="text-center">
                                <img :src="checkImage(i.images)" width="100%">
                            </div>
                            </div>
                        </div>

  </div>

  <div class="col-6 pl-2 pr-2" style="background-color: white;">
            <div class="col-12">
                <h4 class="card-title" style="margin-top: 1.5rem;">{{i.name_list}}</h4>
            </div>
            <div class="col-12">
                <p class="card-text" style="margin-top: 1rem;font-size: 15px;">นาทีที่แล้ว</p>

            </div>
            <div class="col-12" style="margin-top: 0.5rem;">
                <h5 class="card-text">{{i.quantity}} รายการ {{i.total_price}} บาท</h5>
            </div>
</div>

<div class="col-2" style="background-color: rgb(236, 125, 35);" v-if="i.status == 'Y'">
    <p class="card-text textAlignVer" style="margin-top: 1rem;font-size: 15px;color: azure;">รับรายการ</p>
</div>
<div class="col-2" style="background-color: rgb(98, 212, 25);" v-if="i.status == 'S'">
    <p class="card-text textAlignVer" style="margin-top: 1rem;font-size: 15px;color: azure;">เสิร์ฟแล้ว</p>
</div>
<div class="col-2" style="background-color: rgb(216, 213, 27);" v-if="i.status == 'I'">
    <p class="card-text textAlignVer" style="margin-top: 1rem;font-size: 15px;color: azure;">กำลังปรุง</p>
</div>
   </div>
    </div>
</template>



<script>
import { mapGetters,mapState } from "vuex";
import { GET_ORDER_TOE,GET_TOKEN } from "@store/actions.type";
export default {
  name: 'orderbuy',
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
            console.log('this.form.route orderbuy',this.$route)
            this.form.token = this.$route.params.token
            let gettoken = await this.$store.dispatch(GET_TOKEN,this.form);
            let toe = await this.$store.dispatch(GET_ORDER_TOE,this.form);
            this.order = toe;
        },
        mounted() {



        },
        methods:{
            checkImage(image){

let a = 'https://restu.idtest.work/public/product/'+image;

return a;
},
        }
}
</script>
