<template>
  <div class="checkout" v-if="(this.cart.length > 0)">
    <div class="row">
        <div class="col-6">
            <button type="button" class="btn btn-danger btn-sm btn-block">ยกเลิกรายการทั้งหมด</button>
        </div>
        <div class="col-6">
            <button type="button" class="btn btn-success btn-sm btn-block"  @click="Checkout()">ยืนยันรายการทั้งหมด</button>
        </div>
    </div>
    <br>

    <div class="bg-white p-3 shadow">
      <h5><i class="fa fa-clone" aria-hidden="true"></i> รายการคำสั่งซื้อ {{this.currentRouteName}}</h5>
      <div class="row" style="padding-bottom:2%; padding-top:2%;"  v-for="i in this.cart">
        <div class="col-1">{{i.qty}}</div>
        <div class="col-1">x</div>
        <div class="col-6">{{i.name_list}}
            <span class="text-dino" @click="scrollToTop(i)">แก้ไข</span>
        </div>
        <div class="col-3 text-right"> {{i.total_res}}.00</div>
      </div>

       <hr class="style-two">
            <!-- ส่วนลด -->
            <div class="row" style="padding-bottom:2%; padding-top:2%;">
        <div class="col-8"> รวมในตะกร้า </div>
        <div class="col-4 text-right"> {{this.cartTotal}} รายการ </div>
      </div>

                  <div class="row" style="padding-bottom:2%;">
        <div class="col-8"> รวมทั้งสิน  </div>
        <div class="col-4 text-right">
                    {{this.cartALLPrice}}.00 บาท

        </div>
      </div>
    </div>

    <div v-if="myModel">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header" style="font-size:1.3em;">
                  <div class="modal-title">{{this.name}}</div>
                  <div class="modal-title"> {{this.price_sell}}.00</div>
                </div>
                <div class="modal-body">
                  <div class="">

                      <br>
                                        <div class="form-group">

                      <label>หมายเหตุ</label>
                      <small>(ไม่ระบุก็ได้)</small>
                      <textarea name="partner_menu_detail" autofocus="autofocus" class="form-control form-control-sm input-border-bottom" placeholder="รายละเอียด และข้อมูลเพิ่มเติมของรายการนี้!" v-model="note"></textarea>
                    </div>
                  </div>


                  <div class="text-center mb-3" style="font-size:2em;">
                    <i class="far fa-minus-square text-muted mr-2"  @click="downper()"></i>
                    <input type="text" min="1"  v-model="qty" style="width:15%; text-align:center;" :disabled="true">
                    <i class="far fa-plus-square text-muted ml-2"  @click="uppper()"></i>
                </div>
                  <div class="text-center">

                    <input class="btn btn-warning btn-block btn-lg" name="button"  value="เพิ่มไปยังตะกร้า" @click="Addcart()" >
                    <input class="btn btn-danger btn-block btn-lg" name="button"  value="ลบ"  @click="Delcart()">
                  </div>
                </div>
              </div>



            </div>
            </div>
          </div>
      </transition>
</div>
  </div>

  <div class="checkout" v-else>
    <div class="bg-white p-3 shadow">
      <h5><i class="fa fa-clone" aria-hidden="true"></i> รายการคำสั่งซื้อไม่มี {{this.currentRouteName}}</h5>





       <hr class="style-two">
            <!-- ส่วนลด -->



    </div>

  </div>
</template>

<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_RES,FETCH_RES_CART,CHECKOUT,UPDATE_CART,GET_TOKEN,DEL_CART} from "@store/actions.type";
export default {
  name: 'checkout',
  data: () => ({
     myModel:false,
    form:{
    typeres:null,
    token:null
    },
    formcheckout:{
    token:null
    },
    note:null,
    qty:null,

    formupdate:{},

        }),
        computed: {

   ...mapGetters(["cart","cartTotal","cartALLPrice"]),
   currentRouteName() {
      return this.$route.name;
    }
        },


        async created(){
            this.form.token = this.$route.params.token
            let gettoken = await this.$store.dispatch(GET_TOKEN,this.form);

},
mounted() {

},
methods: {

    Delcart(){
        this.myModel = false;


        this.formupdate.id = this.id;

          let del =  this.$store.dispatch(DEL_CART,this.formupdate);
    },

    scrollToTop(i) {

      //  alert('scrollToTop')
    this.myModel = true;

            this.qty = i.qty;
            this.id = i.id;
            this.note = i.note;
            this.name = i.name_list;
            this.price_sell = i.price_sell;

    },

    Addcart(){
this.myModel = false;


            this.formupdate.id = this.id;
            this.formupdate.name_list = this.name;
            this.formupdate.price_sell = this.price_sell;
            this.formupdate.qty = this.qty;
            this.formupdate.note = this.note;
            this.formupdate.token = this.$route.params.token;
            this.formupdate.total_res = null;
          let befres =  this.$store.dispatch(UPDATE_CART,this.formupdate);
    },
    downper(){

        if(this.qty == 0){

        }else {

            this.qty--;
        }



    },
    uppper(){
        this.qty++;
    },
    Checkout(){

        let checkout =  this.$store.dispatch(CHECKOUT,this.$route.params.token);

    }


}

}
</script>
