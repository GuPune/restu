<template>
  <div class="pay">
    <div class="card">
  <h6 class="text-center" style="padding-top: 5px;"></h6>
  <p style="font-size: 12px;text-align: center;"><i> {{ fulldatetime }}</i></p>
  <div class="card-body">
    <table class="table">
  <thead>
    <tr>
      <th scope="col-6">จำนวน / รายการ</th>
      <th scope="col-6">ลด</th>
      <th scope="col-6">ราคา</th>

    </tr>
  </thead>
  <tbody>
    <tr  v-for="i in this.orders">
      <th scope="row">{{i.qty}} {{i.name_list}}</th>
      <td v-if="i.discount">{{i.discount}}.00</td>
      <td v-else="i.discount">0.00</td>
      <td>{{i.full_total}}.00</td>
    </tr>

    <tr>
      <th scope="row">รวม</th>
      <td>{{this.disc}}.00</td>
      <td>{{this.full_total}}.00</td>
    </tr>
    <tr>
      <th scope="row">รวมทั้งสิน</th>
      <td></td>
      <td>{{this.total}}.00</td>
    </tr>
  </tbody>
</table>



  </div>
</div>
<br>
<div class="row" v-if="this.status">
        <div class="col-12" v-if="this.status == 'Y'">
            <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="payment()"> ชำระเงินทันที</button>
        </div>
        <div class="col-12" v-else>
            <button type="button" class="btn  btn-lg btn-block" style="background-color: #DEDA0D;"><i class="fa fa-spinner" aria-hidden="true"></i> รอพนักงาน</button>
        </div>
    </div>






    <div v-if="myModel">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="rating">
      <ul class="list">
        <li @click="rate(star)" v-for="star in this.maxStars" :class="{ 'active': star <= stars }" :key="star.stars" class="star">
        <i :class="star <= stars ? 'fas fa-star' : 'far fa-star'"></i>
        </li>
      </ul>

    </div>
                    <p style="text-align: center;">คุณสามารถให้คะแนนในความพึงพอใจได้</p>
              </div>



            </div>
            </div>
          </div>
      </transition>
</div>
  </div>
</template>
<style scoped lang="scss">
@import '../../sass/rating.scss';
</style>

<script>
import Rating from '../components/Rating.vue'
import { mapGetters,mapState } from "vuex";
import { GET_TOKEN,PAYMENT,GETORDER_RES,GET_ORDER_TOE_AND_CHECKBILL } from "@store/actions.type";
export default {
  name: 'pay',
  components: {
    Rating
        },
  data: () => ({
        form:{
            token:null,
        },
        stars: 0,
        myModel:false,
        order:null,
        orders:null,
        total:null,
        maxStars:5,
        status:null,
        fulldatetime: ''
        }),
  computed: {

    currentRouteName() {
      return this.$route.name;
    }
  },
  async created(){
   this.form.token = this.$route.params.token
   let gettoken = await this.$store.dispatch(GET_TOKEN,this.form);
   let order = await this.$store.dispatch(GET_ORDER_TOE_AND_CHECKBILL,this.form);

   this.orders = order.data;
   this.status = order.status;
   this.total = order.total;
   this.disc = order.disc;
   this.full_total = order.full_total;

},

mounted() {
        this.fulldatetime = this.printFullDate();
 },

methods: {

    printFullDate: function(){

this.date = new Date();
var strArray=['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
var d = this.date.getDate();
var m = strArray[this.date.getMonth()];
var y = this.date.getFullYear() + 543;

var x = new Date();
var n = x.toLocaleTimeString();


return '' + (d <= 9 ? '0' + d : d) + ' ' + m + ' ' + y;
},


   async payment(){

    if(this.orders == null){
return false;
    }
    this.myModel = true;
      //
    },
    async rating(){


    },
    async rate(star) {

        if (typeof star === 'number' && star <= this.maxStars && star >= 0) {
          this.stars = this.stars === star ? star - 1 : star
        }



       await setTimeout(() =>
                this.$swal.fire({
                    type: "success",
                    title: "ส่งข้อมูลเรียบร้อยแล้ว",
                    showConfirmButton: false,
                    timer: 1500
                }),
                1500,
            );

            await setTimeout(() =>
            this.myModel = false,
                700,
            );

            this.form.stars = this.stars
            this.status = 'O';
            let checkbill = await this.$store.dispatch(PAYMENT,this.form);
      }

},

}
</script>
