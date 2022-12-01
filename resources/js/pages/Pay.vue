<template>
  <div class="pay">
    <div class="card">
  <h6 class="text-center" style="padding-top: 5px;">โต๊ะ ห้องแอร์ 8</h6>
  <p style="font-size: 12px;text-align: center;"><i>25 พฤศจิกายน 2022</i></p>
  <div class="card-body">
    <table class="table">
  <thead>
    <tr>
      <th scope="col-6">จำนวน / รายการ</th>
      <th scope="col-6">ราคา</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1 น้ำอัดลม</th>
      <td>0.00</td>
    </tr>
    <tr>
      <th scope="row">1 น้ำอัดลม</th>
      <td>0.00</td>
    </tr>
    <tr>
      <th scope="row">รวมทั้งสิน</th>
      <td>458</td>
    </tr>
  </tbody>
</table>



  </div>
</div>
<br>
<div class="row">
        <div class="col-12">
            <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="payment()"> ชำระเงินทันที</button>

        </div>
    </div>

  </div>
</template>

<script>
import { mapGetters,mapState } from "vuex";
import { GET_TOKEN } from "@store/actions.type";
export default {
  name: 'pay',
  data: () => ({
        form:{
            token:null,
        },
        order:null
        }),
  computed: {
    currentRouteName() {
      return this.$route.name;
    }
  },
  async created(){
   this.form.token = this.$route.params.token
   let gettoken = await this.$store.dispatch(GET_TOKEN,this.form);
},

methods: {

    payment(){
   alert('ชำระเงิน');
    },
},
}
</script>
