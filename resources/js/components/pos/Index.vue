<template>
    <div>
 <div class="card-header card-primary" style=" margin-bottom:5px"><span>
<i class="dropdown">
<button class="classname" style="width:30px; height:25px; font-size: 0.9rem; padding :2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>
<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
<button class="dropdown-item" data="sort" type="button" value="0">เรียงตามค่าเริ่มต้น</button>
<button class="dropdown-item" data="sort" type="button" value="1">เรียงตามสินค้าขายดี</button>
<button class="dropdown-item" data="sort" type="button" value="2">เรียงตามชื่อสินค้า</button>
<button class="dropdown-item" data="sort" type="button" value="3">เรียงตามบาร์โค้ด</button>
<button class="dropdown-item" data="sort" type="button" value="4">เรียงตามกำหนดเอง (เมนู A10) </button>
</div>
</i>
<select name="Table_id" class="classname" id="Table_id" style="width:100px; height:25px; font-size: 0.9rem; padding:2px;"  @change="onChangeToeId()" v-model="toe_id">
<option value="0" style="text-align:right">- เลือกโต๊ะ -</option>
<option :value="toealls.id" style="text-align:right" v-for="(toealls, key) in toeall" :key="toealls.id">{{toealls.number_toe}} {{toealls.number_sit}} ที่นั่ง</option>
 </select>
;<input name="ref_retail_id" id="ref_retail_id" type="hidden" value="1">
<select name="Groups_id" class="classname" id="Groups_id" style="width:110px; height:25px; font-size: 0.9rem; padding:2px;" @change="ChangeTyperes($event)">
<option value="0">หมวดทั้งหมด</option>
<option :value="typeres.id"  v-for="(typeres, index) in typerest" :key="typeres.id" >{{typeres.name}}</option>
</select>
<input type="text" name="txtproduct" placeholder="Barcode/ค้นหา" class="classname" id="txtproduct" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;    " autocomplete="off">
</span>
<span>
<button type="button" class="classname  btn-danger" style="width:130px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer  " data-toggle="modal" data-target="#changetable">ย้ายโต๊ะ/รวมโต๊ะ</button>

<button type="button" id="printer" class="classname  btn-success" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer " data-toggle="modal" data-target="#detailsent"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์ส่งครัว&amp;บาร์ </button> &nbsp;&nbsp;<button type="button" class="classname  btn-warning" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer  " name="esc">ยกเลิกรายการ [F2]</button>
</span>
<span style="float:right"><strong style="font-size: 0.9rem;">ลูกค้า:</strong> <input name="Namecustomer" type="text" id="Namecustomer" data-toggle="modal" data-target="#CusModal" style="width:110px; height:25px; font-size: 0.7rem; padding:2px;  cursor:pointer  ; text-align:right" value="ทั่วไป" readonly="readonly" class="classname"></span>
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
</div>
</template>


<script>

import { mapGetters,mapState } from "vuex";
import Product from "../pos/Product.vue";
import Cal from "../pos/Cal.vue";
import SumP from "../pos/SumPos.vue";
import Bill from "../pos/Bill.vue";
import { FETCH_TYPEPRODUCT,FETCH_PRODUCT_FITTER,FETCH_ORDER,FETCH_TOE } from "@store/actions.type";
export default {
    components: {
        Product,Cal,SumP,Bill
        },
        data() {
      return {
        form:{
            id:null
        },
        toe_id:0,
        typerest: "0",
        toeall:"0"
      }
    },
        async created(){
let typeres = await this.$store.dispatch(FETCH_TYPEPRODUCT);
let toe = await this.$store.dispatch(FETCH_TOE);

this.typerest = typeres;
this.toeall = toe;

        },
    mounted() {

        },
        methods: {

            async ChangeTyperes(event){
this.form.id = event.target.value;
                let typeres = await this.$store.dispatch(FETCH_PRODUCT_FITTER,this.form);

            },

            async onChangeToeId(){
            this.form.toe_id = this.toe_id;

                let orders = await this.$store.dispatch(FETCH_ORDER,this.form);

            }

        }


}
</script>
