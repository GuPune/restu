<template>

<div style="border:#666666 1px solid ; padding:10px">
<div class="row">
<div class="col-lg-6">
<div style="bottom: 40px;">
<small style="font-size: 0.9rem;"><strong>ส่วนลดท้ายบิล</strong></small>
<br>
<select class="form-control-sm" id="discount_id" name="discount_id" style="width:110px; height:25px; font-size: 0.9rem; padding:2px;" v-model="typediscount">
<option value="1">ส่วนลด (บาท)</option>
<option value="2">ส่วนลด (%)</option>
</select>
<input id="inputdiscount" name="inputdiscount" type="number" size="15" class="form-control-sm" style="width:80px; height:25px; font-size: 0.9rem; padding:2px;  text-align:right " placeholder="0.00"  @change="onChangeDis()" v-model="discount" min="0" @keypress="(e) => onKeypress(e, 'max')">
</div>
</div>
<div align="right" class="col-lg-6">
<strong> <span id="totalammount">{{this.total.list}}</span> รายการ <span id="totalnumbershow">{{this.total.quantity}}</span> ชิ้น คะแนนสะสม <span id="totalscoreshow">0</span> </strong>
<div align="right" style="text-align: right" v-if="this.discount > 0"> <span>
<s id="txtbalance" style="font-size: 2.0rem; color:#999999">{{this.total.pricetotal}}.00</s>
</span>
</div>
<div align="right" style="text-align: right"> <span>
<s id="txtbalance" style="font-size: 2.0rem; color:#999999"></s>
</span>
</div>
<div align="right" id="showbalance" style="font-size: 3.2rem; text-align: right">{{this.total.pricediscount}}.00</div> </div>
</div>
<div class="bg-primary" align="center">
<button type="button" class="form-control  btn btn-success" name="checkbill" style="font-size: 1.5rem; width:100% "  @click="checkbill()">เช็คบิล</button>
<button type="button" class="form-control  btn btn-primary" name="txtpayment" style="font-size: 1.5rem; width:100% " @click="scrollToTop()">ชำระเงิน</button>
</div>
<div v-if="myModel">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">

                <div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="exampleModalLabel">ชำระเงิน</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true"></span>
</button>
</div>
<div class="modal-body" id="resultdetail">
<form name="bill"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody><tr>
<td width="27%" height="50" class="bg-success p-1 px-2 font-1xl">ลูกค้า</td>
<td width="26%" align="left" style="padding-left:15px">ทั่วไป</td>
<td width="15%" align="left" class="bg-success p-1 px-2 font-1xl">การชำระ</td>
<td width="32%" align="left"><span style="padding-left:15px">
<select name="Ref_type_payment_id" class="bg-warning p-1 px-2 font-1xl" id="Ref_type_payment_id" style=" width:150px;">
<option value="1" style="text-align:right" selected="">เงินสด</option>
</select>
</span></td>
</tr>
<tr>
<td height="50" class="bg-success p-1 px-2 font-1xl">รายการสินค้า</td>
<td align="left" style="padding-left:15px">{{this.total.list}} รายการ </td>

<td align="left"><span style="padding-left:15px">
- </span></td>
</tr>
<tr>
<td height="50" class="bg-success p-1 px-2 font-1xl">จำนวนเงินที่ต้องชำระ</td>
<td colspan="3" style="padding-left:15px"><h4>{{this.total.pricediscount}} บาท </h4>
<div align="right"></div></td>
</tr>

<tr>
<td height="50" class="bg-success p-1 px-2 font-1xl">จำนวนเงินที่รับ
</td>
<td colspan="3" style="padding-left:15px">
    <input name="payment" type="number" id="payment" data="number" class="h2" style="text-align:right; width:150px"  @keyup="calculate" v-model="paymoney" min="0" @change="CheckMoney()">
   <button type="button" style="background-color: #CCCCCC" name="del" @click="clear()">ลบ</button> </td>
</tr>
<tr>
<td height="50" class="bg-success p-1 px-2 font-1xl">เงินทอน</td>
<td style="padding-left:15px"><input name="valchange" type="number" class="h2" id="valchange" readonly="" style="width:150px; text-align:right; font-weight:bold" placeholder="ทอนเงิน" data="number" v-model="paychange" ></td>
<td><div align="right"></div></td>
<td>&nbsp;</td>
</tr>
<tr>
<td colspan="4" height="60"><div align="center">
<button type="button" class="btn btn-primary" id="bill" name="bill" @click="checkmoney()">บันทึกการชำระเงิน/พิมพ์ใบเสร็จ</button>
</div></td>
</tr>
</tbody></table>
</form>

</div>
<div class="modal-footer">
</div>
</div>

            </div>
            </div>
          </div>
      </transition>
</div>


<div v-if="Checkbill">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog">

  <div class="modal-content">
<div class="modal-header card-primary centerImage">
   <p>
<img src="http://127.0.0.1:8000/cms/images/logo.jpg" width="80" height="80">
   </p>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true"></span>
</button>
</div>
       <div class="modal-body">

        <h3>รายการ</h3>
        <table class="table table-striped">
    <thead>
      <tr>

      </tr>
    </thead>
    <tbody>
      <tr  v-for="(item, index) in this.orders">
        <td>{{item.quantity}}</td>
        <td>{{item.name_list}}</td>
        <td>@{{item.price_sell}}.00</td>
        <td>@{{item.totalPrice}}.00</td>
      </tr>

      <tr>
        <td></td>
        <td>({{this.total.quantity}})</td>
        <td> รวมเงิน</td>
        <td>{{this.total.pricetotal}}.00</td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td> ส่วนลด</td>
        <td>{{this.discount}}</td>
      </tr>

      <tr>
        <td></td>
        <td></td>
        <td> ยอดสุทธิ
</td>
        <td>{{this.total.pricediscount}}.00</td>
      </tr>

    </tbody>
  </table>
      </div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal" @click="Close()">ปิด</button>
<button type="button" class="btn btn-primary" id="btnPrintbill">พิมพ์</button>
</div>
</div>


            </div>
            </div>
          </div>
      </transition>
</div>
</div>

</template>

<style>


   .modal-mask {
     position: fixed;
     z-index: 1050;
     top: 0;
     left: 0;
     width: 100%;
     height: 100%;
     background-color: rgba(0, 0, 0, .5);
     display: grid;
     overflow  : scroll;
     transition: opacity .3s ease;
   }

   .modal-open {
    overflow: hidden;
}

    .modal-mask .modal-wrapper {
     display: -ms-flexbox;

    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
   }

    .imgtax{
    width: 70%;
    height: auto;
  }

  .xtdas {
    overflow: auto;
}

.modal-open {
   overflow: hidden;
}



.centerImage
{
 text-align:center;
 display:block;
}

  </style>



<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_DISCOUNT,CLEAR_BILL } from "@store/actions.type";
export default {
    data() {
      return {
        discount:0,
        typediscount:1,
        paymoney:0,
        paychange:0,
        myModel:false,
        Checkbill:false,

form:{
    toe_id:1,
    discount:null,
    typediscount:null
}
      }
    },
    computed: {
   ...mapGetters(["total","orders"]),

        },
    mounted() {

        },
        methods: {

         async onChangeDis() {

this.form.typediscount = this.typediscount;
this.form.discount = parseInt(this.discount);
let a = this.$store.dispatch(FETCH_DISCOUNT,this.form);
        },

        CheckMoney(){
            this.paychange = this.paymoney - this.total.pricediscount;
        },
        clear(){

        this.paymoney = 0;
        this.paychange = 0;

        },
        checkbill(){
this.Checkbill = true;
        },
        Close(){
this.Checkbill = false;

        },

        checkmoney(){
           if(this.total.list == 0){
            this.myModel = false;
return false;
           }else {


            this.form.paymoney = this.paymoney;
            this.form.pricetotal = this.total.pricetotal;
            this.form.pricediscount = this.total.pricediscount;
           if(this.total.pricediscount > this.paymoney){

return alert('จ่ายเงินไม่ได้');
           }
           let checkbill = this.$store.dispatch(CLEAR_BILL,this.form);
           this.myModel = false;

           setTimeout(function(){
                            window.location.href = '/admin/order'
}, 1000);
           }

        },
        onKeyMoney(evt,id){
            evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        evt.preventDefault();;
      } else {
    //    return true;
    //    console.log(this.paymoney);
    //onPressPeriod();
      }
        },

        onKeypress(evt,id){
    evt.preventDefault();
},
calculate: function () {
    this.paychange = this.paymoney - this.total.pricediscount;
    },
scrollToTop() {

      this.myModel = true;

  },
  Checkimage(){

  }


        },
}


</script>
