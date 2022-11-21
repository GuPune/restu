<template>
    <div>
        <div id="v12listsale_tran" class="myBox"><table id="example2" style=" font-size:12px; " class="table table-striped">
            <tbody>

            <tr v-for="(item, index) in this.orders">
            <td width="36" style=" font-weight:bold; font-size:14px">
            <div>{{index+1}} </div>
            <div>
            <button class="btn btn-danger" style="width:30px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4728"> ลบ </button> </div> </td>
            <td width="158"> <span style=" font-weight:bold; font-size:14px">{{item.code}}</span><br>
            <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" style="width:60px; height:15px; font-size: 12px; padding:2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ส่วนลด </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2" >
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (บาท)" data-name="น้ำพริกชอุ่ม (50.00)" data-iddiscount="2" data-id="4728" data-txtdiscount="0">บาท (฿)</button>
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (%)" data-name="น้ำพริกชอุ่ม (50.00)" data-iddiscount="1" data-id="4728" data-txtdiscount="0">%</button>
            </div>
            </div>
            </td>
            <td width="583">
            <div align="right" style=" font-weight:bold; font-size:14px">
                {{item.name_list}} </div>
            <div>
                <td>
                    {{item.price_sell}} x
                </td>
                <td>
                    <vue-numeric-input  :min="1" :step="1" :value="item.quantity" @change="onChange($event,item.id)"  size="small" :disabled="disabled == 1" controls-type="updown" width="100px"></vue-numeric-input>
                </td>
                <td>
                    <input name="totalproduct" type="text" readonly="" style="text-align:right; width:50px" :value="item.totalPrice">
                </td>

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
            </tbody></table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-primary" id="savediscount">บันทึก</button>
            </div>
            </div>
            </div>
            </div>

            </div>
</div>
</template>


<script>
import { mapGetters,mapState } from "vuex";
import { UPDATE_ORDER } from "@store/actions.type";

export default {
    data() {
      return {
        value: 1,
        disabled: 0,
form:{
    id:null,
    quantity:null,

}
      }
    },
    computed: {
   ...mapGetters(["orders"]),

        },
    mounted() {

        },
        methods: {

           async onChange(event,id){




            this.form.id = id;
            this.form.quantity = event;
            // return 50;

            let add_producttocart = await this.$store.dispatch(UPDATE_ORDER,this.form);
            }

        },
}
</script>
