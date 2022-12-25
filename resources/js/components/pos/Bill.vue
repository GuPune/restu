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


<div v-if="Checkbill">
    <transition name="model modal-open"  id="printThis">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog">

  <div class="modal-content" style="width:320px;">

       <div class="modal-body">

      <table width="290px" border="0" cellspacing="0" cellpadding="0">
<tbody>
  <tr>
<td colspan="3" style="font-size:27px;color:#000" align="center"> <strong>9</strong></td>
</tr>
<tr>
<td colspan="3" align="center">
<img src="http://127.0.0.1:8000/cms/images/logo.jpg" width="100px"> </td>
</tr>
<tr>
<td height="20" colspan="3" style="font-size:14px;color:#000">
<div align="left"><strong></strong> </div></td></tr>
<tr>
<td colspan="3" style="font-size:15px;color:#000">&nbsp;</td>
</tr>
<tr>
<td colspan="3" style="font-size:15px;color:#000"><div align="center"><strong>รายการเรียกเก็บเงิน</strong></div></td>
</tr>
<tr>
<td colspan="3"> <hr></td>
</tr>

<tr  v-for="(item, index) in this.orders">
<td width="112" valign="top">
  <div align="left" style="font-size:13px;color:#000">{{item.quantity}} {{item.name_list}}<br>
ส่วนลด 1 ฿
</div>
</td>
<td width="53" valign="top">
  <div align="left" style="font-size:13px;color:#000">@<s>@{{item.price_sell}}.00</s><br>@{{item.price_sell}}.00
  </div>
  </td>
<td width="45" valign="top"><div align="right" style="font-size:13px;color:#000">
  <s>@{{item.totalPrice}}.00</s><br>@{{item.totalPrice}}.00
  </div>
  </td>
</tr>
<tr>
<td colspan="2" style="font-size:13px;color:#000">
  <div align="right">({{this.total.quantity}})&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวมเงิน
    </div>
  </td>
<td style="font-size:13px;color:#000"><div align="right">{{this.total.pricetotal}}.00</div>
</td>
</tr>
<tr>
<td colspan="2" style="font-size:13px;color:#000"><div align="right">ส่วนลด</div>
 </td>
<td style="font-size:13px;color:#000"><div align="right">{{this.discount}}.00</div>
</td>
</tr>
<tr>
<td colspan="2" style="font-size:13px;color:#000"><div align="right">ยอดสุทธิ</div>
</td>
<td style="font-size:13px"><div align="right">{{this.total.pricediscount}}.00</div></td>
</tr>
<tr>
<td colspan="3" style="font-size:15px;color:#000" align="center">Exchange Rate: 1THB / 450LAK | 1USD / 15,000 LAK
Facebook: Naoki Japanese Restaurant
ຂອບໃຈທີ່ມາອຸດໜູນ ໂອກາດໜ້າເຊີນໃໝ່</td>
</tr>
</tbody></table>
      </div>
<div class="modal-footer" id="btfoot">
<button type="button" class="btn btn-secondary" data-dismiss="modal" @click="Close()">ปิด</button>
<button type="button" class="btn btn-primary" id="btnPrintbill" @click="Print()" >พิมพ์</button>
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

@media screen {
  #printSection {
      display: none;
  }
}

@media print {
  body * {
    visibility:visible;
  }
  #printSection, #printSection * {
    visibility:visible;
  }
  #printSection {
    position:absolute;
    left:0;
    top:0;
  }
    #btfoot {
      display: none;
  }
  #printThis{
    position:absolute;
      visibility:visible;

    left:0;
    top:0;
  }
}



  </style>



<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_DISCOUNT,CLEAR_BILL,FETCH_ORDER } from "@store/actions.type";
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
    toe_id:null,
    discount:null,
    typediscount:null
}
      }
    },
    computed: {
   ...mapGetters(["total","orders","toe_id"]),

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
        Print(){

   this.printElement(document.getElementById("printThis"));

window.print();
        },

       printElement(elem) {

    window.print();
},
         checkbill(){

            if(this.toe_id == 0){
return alert('กรุณาเลือกโต๊ะ');
            }
this.Checkbill = true;


this.form.toe_id = this.toe_id;

let orders = this.$store.dispatch(FETCH_ORDER,this.form);



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
           this.form.toe_id = this.toe_id;


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
