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
<button type="button" class="form-control  btn btn-success" name="checkbill" style="font-size: 1.5rem; width:100% ">เซ็คบิล [F8]</button>
<button type="button" class="form-control  btn btn-primary" name="txtpayment" style="font-size: 1.5rem; width:100% " disabled="">ชำระเงิน [F9]</button>
</div>
</div>
</template>


<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_DISCOUNT } from "@store/actions.type";
export default {
    data() {
      return {
        discount:null,
        typediscount:1,

form:{
    toe_id:1,
    discount:null,
    typediscount:null
}
      }
    },
    computed: {
   ...mapGetters(["total"]),

        },
    mounted() {

        },
        methods: {

         async onChangeDis() {

this.form.typediscount = this.typediscount;
this.form.discount = parseInt(this.discount);
let a = this.$store.dispatch(FETCH_DISCOUNT,this.form);
        },

        onKeypress(evt,id){
    evt.preventDefault();
},

        },
}


</script>
