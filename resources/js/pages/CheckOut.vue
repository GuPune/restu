<template>
  <div class="checkout">
    <div class="bg-white p-3 shadow">
      <h5><i class="fa fa-clone" aria-hidden="true"></i> รายการคำสั่งซื้อ</h5>
      <div class="row" style="padding-bottom:2%; padding-top:2%;">
        <div class="col-1">1</div>
        <div class="col-1">x</div>
        <div class="col-6">ขนมจีบไก่
            <span class="text-dino" @click="scrollToTop()">แก้ไข</span>
        </div>
        <div class="col-4 text-right"> 19.00</div>
      </div>

      <div class="row" style="padding-bottom:2%; padding-top:2%;">
        <div class="col-1">1</div>
        <div class="col-1">x</div>
        <div class="col-6">ไส้กรอกอกไก่
        <span class="text-dino">แก้ไข</span>
        </div>
        <div class="col-4 text-right"> 35.00</div>
      </div>

       <hr class="style-two">
            <!-- ส่วนลด -->
            <div class="row" style="padding-bottom:2%; padding-top:2%;">
        <div class="col-8"> ค่าสินค้าทั้งหมด </div>
        <div class="col-4 text-right"> 54.00 บาท</div>
      </div>
                            <div class="row" style="padding-bottom:2%; padding-top:2%; font-weight:bold;">
          <div class="col-8"> ส่วนลดค่าอาหาร<!--<br>15% สำหรับลูกค้าใหม่--> </div>
          <div class="col-4 text-right"> 0.00 บาท</div>
        </div>
                  <div class="row" style="padding-bottom:2%; padding-top:2%;">
        <div class="col-8"> ค่าบริการจัดส่ง  </div>
        <div class="col-4 text-right">
                    45.00 บาท

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
                  <div class="modal-title">x</div>
                  <div class="modal-title"> 00</div>
                </div>
                <div class="modal-body">
                  <div class="">
                                                              <!-- <center><img src="https://gg.dinovery.app/myadmin/images/menu/menu_20200622121831.jpg" width="80%"/></center> -->
                      <br>
                                        <div class="form-group">

                      <label>หมายเหตุ</label>
                      <small>(ไม่ระบุก็ได้)</small>
                      <textarea name="partner_menu_detail" autofocus="autofocus" class="form-control form-control-sm input-border-bottom" placeholder="รายละเอียด และข้อมูลเพิ่มเติมของรายการนี้!"></textarea>
                    </div>
                  </div>


                  <div class="text-center mb-3" style="font-size:2em;">
                    <i class="far fa-minus-square text-muted mr-2"></i>
                    <input type="text" min="1"  v-model="qty" style="width:15%; text-align:center;">
                    <i class="far fa-plus-square text-muted ml-2" ></i>
                </div>
                  <div class="text-center">

                    <input class="btn btn-warning btn-block btn-lg" name="button"  value="เพิ่มไปยังตะกร้า" @click="Addcart()" >
                  </div>
                </div>
              </div>



            </div>
            </div>
          </div>
      </transition>
</div>
  </div>
</template>

<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_RES,FETCH_RES_CART } from "@store/actions.type";
export default {
  name: 'checkout',
  data: () => ({
     myModel:false,
    form:{
    typeres:null
    },

        }),
        async created(){



},
mounted() {

},
methods: {

    scrollToTop() {
      //  alert('scrollToTop')
    this.myModel = true;
    },


}

}
</script>
