<template>
  <div class="callstaff">
    <div class="row">
        <div class="col-12 py-2">
            <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="addcallstaffcheckbill()"> <i class="fa fa-bell"></i> เช็คบิล</button>
        </div>
        <div class="col-12 py-2">
            <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="addcallstaffdishes()"> <i class="fa fa-bell"></i> เก็บจาน</button>
        </div>
        <div class="col-12 py-2">
            <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="callstaffkit()"> <i class="fa fa-bell"></i> ขอเพิ่มเติม</button>
        </div>
        <div class="col-12 py-2">
            <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="callstaffetc()"> <i class="fa fa-bell"></i> อื่นๆ</button>
        </div>
    </div>



    <div v-if="myModel">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header" style="font-size:1.3em;">
                  <div class="modal-title">เรียกพนักงาน</div>
                  <div class="modal-title" @click="closecallstaff()"> x</div>
                </div>
                <div class="modal-body">
                  <div class="">
                      <br>
                        <div class="form-group">
                      <label>หมายเหตุ</label>

                      <textarea name="partner_menu_detail" autofocus="autofocus" class="form-control form-control-sm input-border-bottom" placeholder="รายละเอียด และข้อมูลเพิ่มเติมของรายการนี้!" v-model="note"></textarea>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="addcallstaff()"> <i class="fa fa-bell"></i> เรียกพนักงาน</button>

                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
      </transition>
</div>

<div v-if="CheckBillModel">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header" style="font-size:1.3em;">
                  <div class="modal-title">เรียกพนักงาน เช็คบิล</div>
                  <div class="modal-title" @click="closecallstaffCheckBillModel()"> x</div>
                </div>
                <div class="modal-body">
                  <div class="">
                      <br>
                        <div class="form-group">
                      <label>หมายเหตุ</label>

                      <textarea name="partner_menu_detail" autofocus="autofocus" class="form-control form-control-sm input-border-bottom" placeholder="รายละเอียด และข้อมูลเพิ่มเติมของรายการนี้!" v-model="note"></textarea>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="addcallstaffcheckbill()"> <i class="fa fa-bell"></i> เรียกพนักงาน</button>

                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
      </transition>
</div>


<div v-if="DishesModel">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header" style="font-size:1.3em;">
                  <div class="modal-title">เรียกพนักงาน เก็บจาน</div>
                  <div class="modal-title" @click="closecallstaffDishesModel()"> x</div>
                </div>
                <div class="modal-body">
                  <div class="">
                      <br>
                        <div class="form-group">
                      <label>หมายเหตุ</label>

                      <textarea name="partner_menu_detail" autofocus="autofocus" class="form-control form-control-sm input-border-bottom" placeholder="รายละเอียด และข้อมูลเพิ่มเติมของรายการนี้!" v-model="note"></textarea>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="addcallstaffdishes()"> <i class="fa fa-bell"></i> เรียกพนักงาน</button>

                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
      </transition>
</div>


<div v-if="KitchenwareModel">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header" style="font-size:1.3em;">
                  <div class="modal-title">เรียกพนักงาน ขอเพิ่มเติม</div>
                  <div class="modal-title" @click="closecallstaffKitchenwareModel()"> x</div>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                                    <label for="filter">เครื่องครัวเพิ่มเติม</label>
                                    <select class="form-control" v-model="fitt">
                                        <option value="0" selected>- เลือก -</option>
                                        <option value="1" selected>ซ้อนส้อม/จาน/แก้วน้ำ</option>
                                        <option value="2">จาน</option>
                                        <option value="3">แก้วน้ำ</option>
                                        <option value="4">ซ้อนส้อม</option>
                                    </select>
                 </div>
                  <div class="form-group">
    <label for="exampleInputEmail1">จำนวน</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="จำนวน" v-model="tem">
  </div>
        <div class="">
                      <br>
                        <div class="form-group">
                      <label>หมายเหตุ</label>
                      <textarea name="partner_menu_detail" autofocus="autofocus" class="form-control form-control-sm input-border-bottom" placeholder="รายละเอียด และข้อมูลเพิ่มเติมของรายการนี้!" v-model="note"></textarea>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="addcallstaffkit()"> <i class="fa fa-bell"></i> เรียกพนักงาน</button>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
      </transition>
</div>

<div v-if="EtcModel">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header" style="font-size:1.3em;">
                  <div class="modal-title">เรียกพนักงาน อื่นๆ</div>
                  <div class="modal-title" @click="closecallstaffEtcModel()"> x</div>
                </div>
                <div class="modal-body">
                  <div class="">
                      <br>
                        <div class="form-group">
                      <label>หมายเหตุ</label>

                      <textarea name="partner_menu_detail" autofocus="autofocus" class="form-control form-control-sm input-border-bottom" placeholder="รายละเอียด และข้อมูลเพิ่มเติมของรายการนี้!" v-model="note"></textarea>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="addcallstaffetc()"> <i class="fa fa-bell"></i> เรียกพนักงาน</button>

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




  </style>

<script>
import { mapGetters,mapState } from "vuex";
import { GET_TOKEN,CALL_STAFF } from "@store/actions.type";
export default {
  name: 'callstaff',
  data: () => ({
        form:{
            token:null,
            note:null
        },
        fitt:0,
        note:null,
        tem:null,
        myModel:false,
        CheckBillModel:false,
        DishesModel:false,
        KitchenwareModel:false,
        EtcModel:false,
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

        callstaff(){
        this.myModel = true;
        },
        callstaffcheck(){
        this.CheckBillModel = true;
        },

        callstaffdishes(){
        this.DishesModel = true;
        },

        callstaffkit(){
        this.KitchenwareModel = true;
        },
        callstaffetc(){
        this.EtcModel = true;
        },


        async addcallstaff(){
            this.form.note = this.note;
            let call = await this.$store.dispatch(CALL_STAFF,this.form);
            this.myModel = false;
            this.note = null;

            setTimeout(() =>
                this.$swal.fire({
                    type: "success",
                    title: "ส่งข้อมูลเรียบร้อยแล้ว",
                    showConfirmButton: false,
                    timer: 1500
                }),
                1500
            );

        },

        async addcallstaffcheckbill(){

            this.form.note = "เช็คบิล";
            let call = await this.$store.dispatch(CALL_STAFF,this.form);
            setTimeout(() =>
                this.$swal.fire({
                    type: "success",
                    title: "ส่งข้อมูลเรียบร้อยแล้ว",
                    showConfirmButton: false,
                    timer: 1500
                }),
                1500
            );
        },

        async addcallstaffdishes(){
            this.form.note = "เก็บจาน";
            let call = await this.$store.dispatch(CALL_STAFF,this.form);

            setTimeout(() =>
                this.$swal.fire({
                    type: "success",
                    title: "ส่งข้อมูลเรียบร้อยแล้ว",
                    showConfirmButton: false,
                    timer: 1500
                }),
                1500
            );
        },

        async addcallstaffkit(){

            if(this.fitt == 0){
return alert('กรุณาเลือกสิ่งที่ต้องการขอเพิ่ม');
            }else {
                if(this.tem != null){
                    this.KitchenwareModel = false;

this.form.note = this.note;
this.form.fitt = this.fitt;
this.form.tem = this.tem;
let call = await this.$store.dispatch(CALL_STAFF,this.form);
this.note = null;
this.tem = null;
this.fitt = 0;
this.form.note = null;
this.form.fitt = null;
this.form.tem = null;

setTimeout(() =>
this.$swal.fire({
type: "success",
title: "ส่งข้อมูลเรียบร้อยแล้ว",
showConfirmButton: false,
timer: 1500
}),
1500
);
                }else{
                  return alert('กรุณากรอกจำนวนที่ต้องการ');
                }


            }





        },


        async addcallstaffetc(){


            this.form.note = this.note;
            let call = await this.$store.dispatch(CALL_STAFF,this.form);
            this.EtcModel = false;
            this.note = null;

            setTimeout(() =>
                this.$swal.fire({
                    type: "success",
                    title: "ส่งข้อมูลเรียบร้อยแล้ว",
                    showConfirmButton: false,
                    timer: 1500
                }),
                1500
            );
        },

        closecallstaff(){
            this.myModel = false;
        },
        closecallstaffCheckBillModel(){
            this.CheckBillModel = false;
        },
        closecallstaffDishesModel(){
            this.DishesModel = false;
        },
        closecallstaffKitchenwareModel(){
            this.KitchenwareModel = false;
        },
        closecallstaffEtcModel(){
            this.EtcModel = false;
        }








},
}
</script>
