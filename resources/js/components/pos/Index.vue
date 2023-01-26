<template>
    <div>
 <div class="card-header card-primary" style=" margin-bottom:5px"><span>
<i class="dropdown">
<button class="classname" style="width:30px; height:25px; font-size: 0.9rem; padding :2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>
<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
<!-- <button class="dropdown-item" data="sort" type="button" value="0">เรียงตามค่าเริ่มต้น</button>
<button class="dropdown-item" data="sort" type="button" value="1">เรียงตามสินค้าขายดี</button>
<button class="dropdown-item" data="sort" type="button" value="2">เรียงตามชื่อสินค้า</button>
<button class="dropdown-item" data="sort" type="button" value="3">เรียงตามบาร์โค้ด</button>
<button class="dropdown-item" data="sort" type="button" value="4">เรียงตามกำหนดเอง (เมนู A10) </button> -->
</div>
</i>
<select name="Table_id" class="classname" id="Table_id" style="width:100px; height:25px; font-size: 0.9rem; padding:2px;"  @change="onChangeToeId()" v-model="toe_id">
<option value="0" style="text-align:right">- เลือกโต๊ะ - {{this.ToeStatus}}</option>
<option :value="toealls.id" style="text-align:right" v-for="(toealls, key) in toeall" :key="toealls.id">{{toealls.number_toe}} {{toealls.number_sit}} ที่นั่ง</option>
 </select>
<input name="ref_retail_id" id="ref_retail_id" type="hidden" value="1">
<select name="Groups_id" class="classname" id="Groups_id" style="width:110px; height:25px; font-size: 0.9rem; padding:2px;" @change="ChangeTyperes($event)">
<option value="0">หมวดทั้งหมด</option>
<option :value="typeres.id"  v-for="(typeres, index) in typerest" :key="typeres.id" >{{typeres.name}} </option>
</select>
<button type="button" class="classname btn-success" style="width:130px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer  " data-toggle="modal" data-target="#changetable" @click="MyQrcode()"><i class="fa fa-print" aria-hidden="true"></i>พิมพ์ QRCode</button>

</span>
<span v-if="ToeStatus == 'idle'" @click="OpenToe()">
<button type="button" id="printer" class="classname  btn-success" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer " data-toggle="modal" data-target="#detailsent"> เปิดใช้งาน</button> &nbsp;&nbsp;

</span>

<span v-else-if="ToeStatus == 'check'">
<button type="button" id="printer" class="classname  btn-info" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer " data-toggle="modal" data-target="#detailsent"> เช็คบิล</button> &nbsp;&nbsp;

</span>


<span v-else-if="ToeStatus == 'call'">
<button type="button" id="printer" class="classname  btn-warning" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer " data-toggle="modal" data-target="#detailsent"> เรียกพนักงาน</button> &nbsp;&nbsp;

</span>
<span v-else-if="ToeStatus == 'request'">
<button type="button" id="printer" class="classname  btn-warning" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer " data-toggle="modal" data-target="#detailsent"> กำลังทำงาน</button> &nbsp;&nbsp;

</span>

<span v-else-if="ToeStatus == 'notidle'">
<button type="button" id="printer" class="classname  btn-danger" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer " data-toggle="modal" data-target="#detailsent"> ปิดใช้งาน</button> &nbsp;&nbsp;

</span>
<span v-else>
    <button type="button" id="printer" class="classname  btn-danger" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer " data-toggle="modal" data-target="#detailsent"> เลือกโต๊ะ</button> &nbsp;&nbsp;
</span>

<span >
<button type="button" class="classname  btn-danger" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer  " name="esc" @click="ChangeT()">ย้ายโต๊ะ</button>
</span>

<span >
<button type="button" class="classname  btn-warning" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer  " name="esc" @click="Cancel()">ยกเลิกรายการ</button>
</span>
<span >
<button type="button" class="classname  btn-success" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer  " name="esc" @click="Sendres()">ส่งรายการอาหาร</button>
</span>
<span style="float:right"><strong style="font-size: 0.9rem;">สถานะ:</strong> {{this.ToeStatus}}</span>
</div>


<div class="row">
    <div class="col-sm-12 col-lg-7" id="div1">
    <div>
    <div id="listproduct_tran">
<Product/>
</div>
    </div>
    </div>

<div class="col-sm-12 col-lg-5" id="div2" style="padding-top:5px;margin-bottom:10px;background-color:#FFFFFF ">
<Bill/>
<div>
    <Cal/>
</div>
</div>
</div>
<div class="col-sm-12 col-lg-12 alert alert-info" style="margin-top:20px">
<SumP/>
</div>



<div v-if="Qrcode">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas screen" id="modalInvoice">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-sm">

  <div class="modal-content">
<div class="modal-header  card-primary">
<h5 class="modal-title" id="exampleModalLabel">{{this.formtoe.number_toe}}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true"></span>
</button>
</div>
       <div class="modal-body">
        <form>
          <div class="form-group" style="text-align: center;">
             <img  :src="Checkimage(this.formtoe.images_qrcode)" width="100%" height="100%">
          </div>
          <div class="form-group" style="text-align: center;">
            <label for="message-text" class="col-form-label">โต๊ะที่นั้ง {{this.formtoe.number_sit}}</label>
          </div>
        </form>
      </div>
      <div style="page-break-after: always"> </div>
<div class="modal-footer btnPri">
<button type="button" class="btn btn-secondary" data-dismiss="modal" @click="Close()">ปิด</button>
<button type="button" class="btn btn-primary" id="btnPrintbill" @click="Printqr()">พิมพ์</button>
</div>
</div>


            </div>
            </div>
          </div>
      </transition>
</div>

<div v-if="ChangeToe">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas screen" id="modalInvoice">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">

  <div class="modal-content">
<div class="modal-header  card-primary">
<h1 class="modal-title" id="exampleModalLabel">ย้ายโต๊ะ</h1>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true"></span>
</button>
</div>

      <div class="modal-body" id="load_changetable">
        <table width="500px" border="0" cellspacing="0" cellpadding="0" style="font-size:12px" class="table table-hover">
<tbody>
    <tr>
<td width="307" height="30"><div align="left"><strong>ย้ายโต๊ะ</strong>
</div>
</td>
<td width="131">
    <div align="center">
        <strong>สถานะ</strong>
    </div>
</td>
<td width="62">
    <div align="right"></div></td>
</tr>
<tr  v-for="x in this.show">
<td height="30">
    <div align="left">{{x.number_toe}}</div></td>
<td>
    <div align="center"><i class="fa fa-cutlery"> </i> ว่าง</div></td>
<td>
    <div align="right"><button type="button" class="btn btn-danger btn-sm" name="changetable" id="78" data="2"  @click="ChangeToesuss(x)">ย้ายโต๊ะ</button></div></td>
</tr>


</tbody></table>
</div>
<div class="modal-footer btnPri">
<button type="button" class="btn btn-secondary" data-dismiss="modal" @click="Close()">ปิด</button>
</div>

</div>


            </div>
            </div>
          </div>
      </transition>
</div>
<div>time: <strong>{{ time }}</strong></div>

</div>



</template>

<style>



@media print {
    .container-scroller{
        display: none;
    }
    .pagebreak {
        clear: both;
        page-break-after: always;
    }
}

@media print {



    @page
{

    size: auto;   /* auto is the initial value */
    margin: 5mm 5mm 5mm 5mm;
}

 body {

  visibility:hidden;

  }
  #print, #print * {
    visibility:visible;
  }
  #print {
    position:absolute;
    left:0;
    top:0;
    padding: 10mm;
  }
  #print {
    page-break-after:always;
  }
  .btnPri{
    display: none;
  }
  .pagebreak { page-break-before: always; } /* page-break-after works, as well */
}


.modal-content {

    border: 0px solid #e8eff9;

}

</style>
<script>

import { mapGetters,mapState } from "vuex";
import Product from "../pos/Product.vue";
import Cal from "../pos/Cal.vue";
import SumP from "../pos/SumPos.vue";
import Bill from "../pos/Bill.vue";
import { FETCH_TYPEPRODUCT,FETCH_PRODUCT_FITTER,FETCH_ORDER,FETCH_TOE,OPENTOE,CANCELTOE,FETCH_QRCODE,SEND_ORDER_TO_CHEF,SHOWTOE,CHANGETOESUSS } from "@store/actions.type";
export default {
    components: {
        Product,Cal,SumP,Bill
        },
        data() {
      return {
        time:30,
        form:{
            id:null
        },
        toe_id:0,
        typerest: "0",
        toeall:"0",
        Qrcode:false,
        show:null,
        CheckBill:false,
        ChangeToe:false,
        toe_name:"Test",
        formchangetoe:{
toeold:null,
toenew:null
        },
        formtoe:{
            images_qrcode:null,
            number_sit:null,
            number_toe:null
        }
      }
    },
    computed: {
   ...mapGetters(["ToeStatus"]),

        },
        async created(){


let typeres = await this.$store.dispatch(FETCH_TYPEPRODUCT);
let toe = await this.$store.dispatch(FETCH_TOE);

this.typerest = typeres;
this.toeall = toe;


setInterval(() => {
      this.getNow();
    }, 1000)


        },
    mounted() {

        },
        methods: {

            Checkimage(image){

                return image;
        },

            async ChangeTyperes(event){
this.form.id = event.target.value;
                let typeres = await this.$store.dispatch(FETCH_PRODUCT_FITTER,this.form);

            },



            async onChangeToeId(){
                this.form.toe_id = this.toe_id;



                let orders = await this.$store.dispatch(FETCH_ORDER,this.form);

                let qr = this.toeall.find(x => x.id === this.toe_id);



this.formtoe.images_qrcode = qr.images_qrcode
this.formtoe.number_sit = qr.number_sit
this.formtoe.number_toe = qr.number_toe

            },

           async OpenToe(){
  let open_toe = await this.$store.dispatch(OPENTOE,this.form);


            },


            async Close(){
                this.Qrcode = false;
                this.ChangeToe = false;
            },

            async ChangeT(){

                if(this.toe_id == 0){
                this.$toast.open({
        message: "กรุณาเลือกโต๊ะ",
        type: "error",
        duration: 2000,
        dismissible: true
      })
                return false;
            }
                this.ChangeToe = true;
                let showtoenull = await this.$store.dispatch(SHOWTOE);
                this.show = showtoenull;

            },

            async ChangeToesuss(i){

                this.ChangeToe = false;
                this.formchangetoe

                if(this.toe_id == 0){
                this.$toast.open({
        message: "กรุณาเลือกโต๊ะ",
        type: "error",
        duration: 2000,
        dismissible: true
      })
                return false;
            }


        this.formchangetoe.toeold = this.toe_id;
        this.formchangetoe.toenew = i.id;
        let changetoesus = await this.$store.dispatch(CHANGETOESUSS,this.formchangetoe);
        this.fetchdata();

            },


            async Sendres(){


            if(this.toe_id == 0){
                this.$toast.open({
        message: "กรุณาเลือกโต๊ะ",
        type: "error",
        duration: 2000,
        dismissible: true
      })
                return false;
            }
            if(this.ToeStatus == 'idle'){
                this.$toast.open({
        message: "กรุณาเปิดโต๊ะก่อน",
        type: "error",
        duration: 2000,
        dismissible: true
      })
                return false;
            }


                this.form.toe_id = this.toe_id;
                let send_order = await this.$store.dispatch(SEND_ORDER_TO_CHEF,this.form);
                let orders = await this.$store.dispatch(FETCH_ORDER,this.form);

                this.$toast.open({
        message: "ส่งไปยังครัวเรียบร้อย",
        type: "success",
        duration: 1500,
        dismissible: true
      })



            },

            async getNow(){

this.time--;
if(this.time == 0){
    this.time = 30;
    this.form.toe_id = this.toe_id;
    let orders = await this.$store.dispatch(FETCH_ORDER,this.form);

}
            },


async fetchdata(){

    this.form.toe_id = this.toe_id;
    let orders = await this.$store.dispatch(FETCH_ORDER,this.form);



},

            async Cancel(){


                if(this.toe_id == 0){
                this.$toast.open({
        message: "กรุณาเลือกโต๊ะ",
        type: "error",
        duration: 2000,
        dismissible: true
      })
                return false;
            }

    let cancel_toe = await this.$store.dispatch(CANCELTOE,this.form);
            },

           async MyQrcode(){

            if(this.toe_id == 0){
                this.$toast.open({
        message: "กรุณาเลือกโต๊ะ",
        type: "error",
        duration: 2000,
        dismissible: true
      })
                return false;
            }
            if(this.ToeStatus == 'idle'){
                this.$toast.open({
        message: "กรุณาเปิดโต๊ะก่อน",
        type: "error",
        duration: 2000,
        dismissible: true
      })
                return false;
            }



            this.form.toe_id = this.toe_id;

let qrcode = await this.$store.dispatch(FETCH_QRCODE,this.form);

this.formtoe.images_qrcode = qrcode.images_qrcode;
this.formtoe.number_sit = qrcode.number_sit;
this.formtoe.number_toe = qrcode.number_toe;


this.Qrcode = true;




            },

            Printqr(){
                const modal = document.getElementById("modalInvoice")
                const cloned = modal.cloneNode(true)
                let section = document.getElementById("print")



  if (!section) {
     section  = document.createElement("div")
     section.id = "print"
     document.body.appendChild(section)
  }

  section.innerHTML = "";
  section.appendChild(cloned);
  window.print();


    section.innerHTML = "";
  //  section.appendChild();

        //        window.print();

            }



        }


}
</script>
