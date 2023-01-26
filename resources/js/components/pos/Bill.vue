<template>

<div style="border:#666666 1px solid ; padding:10px">
<div class="row">
<div class="col-lg-6">
<div style="bottom: 40px;">
<small style="font-size: 0.9rem;"><strong>ส่วนลดท้ายบิล</strong></small>
<br>
<select class="form-control-sm" id="discount_id" name="discount_id" style="width:110px; height:25px; font-size: 0.9rem; padding:2px;" v-model="typediscount">
<option value="1">ส่วนลด (บาท)</option>

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
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog">

  <div class="modal-content" style="width:320px;">

       <div class="modal-body" id="checkbill">

 <table width="290px" border="0" cellspacing="0" cellpadding="0">
<tbody>
  <tr>
<td colspan="3" style="font-size:27px;color:#000" align="center"> <strong></strong></td>
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

<tr>
<td colspan="3">วันที่ {{ fulldatetime }}</td>


</tr>

<tr>
<td colspan="3"> <hr></td>
</tr>

<tr>
<td colspan="1">จำนวน | รายการ</td>
<td colspan="1"> - </td>
<td colspan="1">รวม</td>

</tr>
<tr>
<td colspan="3"> <hr></td>
</tr>

<tr  v-for="(item, index) in this.orders">
<td width="112" valign="top">
  <div align="left" style="font-size:13px;color:#000">{{item.quantity}} {{item.name_list}}<br>

<span v-if="item.type_discount === 'B'">ส่วนลด 1 ฿</span>
</div>
</td>
<td width="53" valign="top">
  <div align="left" style="font-size:13px;color:#000" v-if="item.type_discount === 'B'">
    <s>@{{item.price_sell}}.00</s>
    <br>@{{item.price_sell}}.00
  </div>
  <div align="left" style="font-size:13px;color:#000" v-else>
    @{{item.price_sell}}.00
  </div>
  </td>
<td width="45" valign="top">
    <div align="right" style="font-size:13px;color:#000"  v-if="item.type_discount === 'B'">
  <s>@{{item.totalPrice}}.00</s><br>@{{item.totalPrice}}.00
  </div>
  <div align="right" style="font-size:13px;color:#000" v-else>
    @{{item.totalPrice}}.00
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
<td colspan="2" style="font-size:15px;color:#000"><div align="right">ยอดสุทธิ</div>
</td>
<td style="font-size:15px"><div align="right">{{this.total.pricediscount}}.00</div></td>
</tr>
<tr>
<!-- <td colspan="3" style="font-size:15px;color:#000" align="center">Exchange Rate: 1THB / 450LAK | 1USD / 15,000 LAK
Facebook: Naoki Japanese Restaurant
ຂອບໃຈທີ່ມາອຸດໜູນ ໂອກາດໜ້າເຊີນໃໝ່</td> -->
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
<select name="Ref_type_payment_id" class="bg-warning p-1 px-2 font-1xl" id="Ref_type_payment_id" style=" width:150px;"  v-model="typepay">
<option value="1" style="text-align:right" selected="">เงินสด</option>
<option value="2" style="text-align:right" selected="">พร้อมเพย์</option>
<option value="3" style="text-align:right" selected="">เงินโอน</option>
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



<div v-if="Printbill">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog">

  <div class="modal-content" style="width:320px;">

       <div class="modal-body" id="printbill">

 <table width="290px" border="0" cellspacing="0" cellpadding="0">
<tbody>
  <tr>
<td colspan="3" style="font-size:27px;color:#000" align="center"> <strong></strong></td>
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

<tr>
<td colspan="3">วันที่ {{ fulldatetime }}</td>
</tr>
<tr>
<td colspan="3">เลขที่บิล {{ this.bill }}</td>
</tr>

<tr>
<td colspan="3"> <hr></td>
</tr>

<tr>
<td colspan="1">จำนวน | รายการ</td>
<td colspan="1"> - </td>
<td colspan="1">รวม</td>

</tr>
<tr>
<td colspan="3"> <hr></td>
</tr>

<tr  v-for="(item, index) in this.orders">
<td width="112" valign="top">
  <div align="left" style="font-size:13px;color:#000">{{item.quantity}} {{item.name_list}}<br>

<span v-if="item.type_discount === 'B'">ส่วนลด 1 ฿</span>
</div>
</td>
<td width="53" valign="top">
  <div align="left" style="font-size:13px;color:#000" v-if="item.type_discount === 'B'">
    <s>@{{item.price_sell}}.00</s>
    <br>@{{item.price_sell}}.00
  </div>
  <div align="left" style="font-size:13px;color:#000" v-else>
    @{{item.price_sell}}.00
  </div>
  </td>
<td width="45" valign="top">
    <div align="right" style="font-size:13px;color:#000"  v-if="item.type_discount === 'B'">
  <s>@{{item.totalPrice}}.00</s><br>@{{item.totalPrice}}.00
  </div>
  <div align="right" style="font-size:13px;color:#000" v-else>
    @{{item.totalPrice}}.00
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
<td colspan="2" style="font-size:15px;color:#000"><div align="right">ยอดสุทธิ</div>
</td>
<td style="font-size:15px"><div align="right">{{this.total.pricediscount}}.00</div></td>
</tr>
<tr>
<!-- <td colspan="3" style="font-size:15px;color:#000" align="center">Exchange Rate: 1THB / 450LAK | 1USD / 15,000 LAK
Facebook: Naoki Japanese Restaurant
ຂອບໃຈທີ່ມາອຸດໜູນ ໂອກາດໜ້າເຊີນໃໝ່</td> -->
</tr>
</tbody></table>
      </div>
<div class="modal-footer" id="btfoot">
<button type="button" class="btn btn-secondary" data-dismiss="modal" @click="Closebill()">ปิด</button>

<button type="button" class="btn btn-primary" id="btnPrintbill" @click="PrintBill()" >พิมพ์</button>
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

    @page
{

}

  body * {
    visibility:hidden;
    color: #000;
	font-family:"Tahoma";
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
        typepay:1,
        paymoney:0,
        paychange:0,
        myModel:false,
        Checkbill:false,
        Printbill:false,

form:{
    toe_id:null,
    discount:null,
    typediscount:null
},
fulldatetime: ''
      }
    },
    computed: {
   ...mapGetters(["total","orders","toe_id"]),

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


    return '' + (d <= 9 ? '0' + d : d) + ' ' + m + ' ' + y + ' ' + n;
          },

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
        PrintBill(){
            const modal = document.getElementById("printbill")

const cloned = modal.cloneNode(true)
let section = document.getElementById("printSection")

if (!section) {
section  = document.createElement("div")
section.id = "printSection"
document.body.appendChild(section)
}

setTimeout(function(){
                            window.location.href = '/admin/pos'
}, 1000);

section.innerHTML = "";
section.appendChild(cloned);
window.print();
section.innerHTML = "";




        },
        Print(){

            const modal = document.getElementById("checkbill")

            const cloned = modal.cloneNode(true)
            let section = document.getElementById("printSection")

if (!section) {
   section  = document.createElement("div")
   section.id = "printSection"
   document.body.appendChild(section)
}

section.innerHTML = "";
section.appendChild(cloned);
window.print();
section.innerHTML = "";

        },

       printElement(elem) {

    window.print();
},
         checkbill(){
            this.fulldatetime = this.printFullDate();
            if(this.toe_id == 0){

                              this.$toast.open({
        message: "กรุณาเลือกโต๊ะ",
        type: "error",
        duration: 2000,
        dismissible: true
      })
return false;
            }
this.Checkbill = true;


this.form.toe_id = this.toe_id;

let orders = this.$store.dispatch(FETCH_ORDER,this.form);



        },
        Close(){
this.Checkbill = false;

        },
        Closebill(){
this.Printbill = false;

setTimeout(function(){
                            window.location.href = '/admin/pos'
}, 1000);

        },

       async checkmoney(){
           if(this.total.list == 0){
            this.myModel = false;
return false;
           }else {


            this.form.paymoney = this.paymoney;
            this.form.pricetotal = this.total.pricetotal;
            this.form.pricediscount = this.total.pricediscount;
            this.form.type_pay = this.typepay;
           if(this.total.pricediscount > this.paymoney){

return alert('จ่ายเงินไม่ได้');
           }
           this.form.toe_id = this.toe_id;


         let checkbill = await this.$store.dispatch(CLEAR_BILL,this.form);
         this.myModel = false;
         this.Printbill = true;
        this.bill = checkbill.billnumber;


//            setTimeout(function(){
//                             window.location.href = '/admin/pos'
// }, 1000);
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

                if(this.toe_id == 0){

                              this.$toast.open({
        message: "กรุณาเลือกโต๊ะ",
        type: "error",
        duration: 2000,
        dismissible: true
      })
return false;
            }

      this.myModel = true;

  },
  Checkimage(){

  }






        },
}


</script>
