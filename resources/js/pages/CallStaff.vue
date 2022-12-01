<template>
  <div class="callstaff">
    <div class="row">
        <div class="col-12">
            <button type="button" class="btn  btn-lg btn-block" style="background-color: darkorange;" @click="callstaff()"> <i class="fa fa-bell"></i> เรียกพนักงาน</button>

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
        note:null,
        myModel:false
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

        closecallstaff(){
            this.myModel = false;
        }







},
}
</script>
