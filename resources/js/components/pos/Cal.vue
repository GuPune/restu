<template>
    <div>
        <div id="v12listsale_tran" class="myBox">
            <table id="example2" style=" font-size:12px; " class="table table-striped">
                <tbody>
    <tr v-for="(item, index) in this.orders">

        <td width="36" style=" font-weight:bold; font-size:14px">
            <div>{{index+1}}. </div>
            <div>
                <button class="btn btn-danger" style="width:30px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4822"> ลบ </button> </div>
        </td>
        <td width="150">
            <span style=" font-weight:bold; font-size:14px">{{item.code}}</span>
            <br>
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" style="width:60px; height:15px; font-size: 12px; padding:2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ส่วนลด </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <button class="dropdown-item" type="button" @click="Discount(item)">บาท (฿)</button>

                </div>
            </div>
            <button class="btn btn-primary" style="width:50px; height:15px; font-size: 12px; padding:2px; " type="button" v-if="item.type_discount == 'B'">{{item.discount}} ฿</button>

        </td>
        <td width="91" style=" font-weight:bold; font-size:14px">
            <div v-if="item.status === 'N'">
                <div> </div>
                <button class="btn btn-secondary" style="width:60px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4822"> ยังไม่ส่ง </button>
            </div>
            <div v-else-if="item.status === 'Y'">
                <button class="btn btn-danger" style="width:60px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4822"> ดำเนินการ </button>
            </div>
            <div v-else-if="item.status === 'O'">
                <button class="btn btn-warning" style="width:60px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4822"> ปรุง </button>
            </div>
            <div v-else-if="item.status === 'I'">
                <button class="btn btn-warning" style="width:60px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4822"> รอเสิร์ฟ </button>
            </div>
            <div  v-else>
                <button class="btn btn-success" style="width:60px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4822"> เสร็จ </button>
            </div>
        </td>
        <td width="500">
            <div align="right" style=" font-weight:bold; font-size:14px">
                {{item.name_list}} </div>
            <div align="right">
                {{item.price_sell}} <span name="changeprice" data="5"> <input name="price" type="hidden" value="65.00"></span>
                x

                <input name="amountproduct" type="number" size="3"  :value="item.quantity" data="2" dataid="4718" style="text-align:center ; width: 70px;position: relative;padding-right: 20px; " tabindex="6"  @change="onChange($event,item.id,item.order_id)" min="0" @keypress="(e) => onKeypress(e, 'max')">



<input name="totalproduct" type="text" readonly="" style="text-align:right; width:50px" :value="item.totalPrice">
            </div>
        </td>
    </tr>
    </tbody>
            <tfoot>
            </tfoot>
            </table>
            <input name="countitem" id="countitem" type="hidden" value="6">
            <input name="Score" id="Score" type="hidden" value="25">

            <div class="modal fade" id="modaldiscount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header  card-primary">
            <h6 class="modal-title" id="exampleModalLabel">ส่วนลด</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
            <table width="518" border="0" cellspacing="0" cellpadding="0">
            <tbody><tr>
            <td width="31%" height="40"><strong>รายการ
            <input type="hidden" name="iddiscount" value="" id="iddiscount">
            <input type="hidden" name="id" value="" id="id">
            <input type="hidden" name="Table_id" value="79 " id="Table_id">
            </strong></td>
            <td width="69%" id="name">&nbsp;</td>
            </tr>
            <tr>
            <td height="40"><strong>ส่วนลด</strong></td>

            <td><input name="txtdiscount" type="number" id="txtdiscount" style="width:150px" autofocus="" class="form-control"  :min="1" > </td>
            </tr>
            <tr>
            <td height="40">&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            </tbody>
        </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-primary" id="savediscount" >บันทึก</button>
            </div>
            </div>
            </div>
            </div>
            </div>


            <div v-if="mydiscounttotal">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header" style="font-size:1.3em;">
                  <div class="modal-title">ลดราคา (บาท)</div>
                  <div class="modal-title"> x</div>
                </div>
                <div class="modal-body">
                    <table width="518" border="0" cellspacing="0" cellpadding="0">
<tbody><tr>
<td width="31%" height="40"><strong>รายการ
<input type="hidden" name="iddiscount" value="2" id="iddiscount">
<input type="hidden" name="id" value="4822" id="id">
<input type="hidden" name="Table_id" value="80 " id="Table_id">
</strong></td>
<td width="69%" id="name">{{this.name}}</td>
</tr>
<tr>
<td height="40"><strong>ส่วนลด</strong></td>
<td><input name="txtdiscount" type="number" id="txtdiscount" style="width:150px" autofocus="" class="form-control" v-model="disc"> </td>
</tr>
<tr>
<td height="40">&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tbody>
</table>

                </div>
 <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal"  @click="Canc()">ยกเลิก</button>
<button type="button" class="btn btn-primary" id="savediscount" @click="Savediscount()">บันทึก</button>
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
import { UPDATE_ORDER,DELTLE_ORDER,FETCH_ORDER,UPDATE_ORDER_DISC } from "@store/actions.type";

export default {
    data() {
      return {
        value: 1,
        disabled: 0,
        disc:0,
        mydiscounttotal:false,
        name:null,
        id:null,
form:{
    id:null,
    quantity:null,
    toe_id:1,
    order_id:null
}
      }
    },
    computed: {
   ...mapGetters(["orders","toe_id"]),

        },
    mounted() {

        },
        methods: {

        restrictChars ($event) {
   //console.log($event.keyCode); //keyCodes value
   let keyCode = ($event.keyCode ? $event.keyCode : $event.which);
   if ((keyCode < 48 || keyCode > 57) && keyCode !== 46) { // 46 is dot
      $event.preventDefault();
   }
},
async Del(id,key){


    this.form.order_id = id;
    this.form.key = key;
    this.form.toe_id = this.toe_id;

   let del_orders = await this.$store.dispatch(DELTLE_ORDER,this.form);
   let orders = await this.$store.dispatch(FETCH_ORDER,this.form);
},

onKeypress(evt,id){
    evt.preventDefault();
},

Discount(i){

    this.mydiscounttotal = true;
    this.name = i.name_list;
    this.id = i.order_id;

},
Canc(){

this.mydiscounttotal = false;

},
async Savediscount(){
this.mydiscounttotal = false;
this.form.id = this.id;
this.form.discount = this.disc;
this.form.type_discount = "B";
let update_disc = await this.$store.dispatch(UPDATE_ORDER_DISC,this.form);


this.FetchData();
},

           async onChange(event,id,order_id){

           this.form.id = id;
           this.form.quantity = event.target.value;
           this.form.order_id = order_id;


      let update_orders = await this.$store.dispatch(UPDATE_ORDER,this.form);
            },


            async FetchData(){
this.form.toe_id = this.toe_id;
let orders = await this.$store.dispatch(FETCH_ORDER,this.form);
},


        },
}
</script>
