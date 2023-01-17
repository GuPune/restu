<template>
    <div>
        <b-container fluid="xl" >
  <b-row>
    <b-col  sm="12" md="6" lg="6" xl="6">
        <div class="card" v-if="order">
            <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-align: center;">
         <button type="button" class="btn btn-sm" style="background-color: #DEDA0D;">รอดำเนินการ</button></li>
  </ul>
  <div class="card-footer text-muted" v-if="order.length > 0">
<button type="button" class="btn btn-secondary btn-sm"  @click="checkall('O')">เลือกทั้งหมด</button>
<button type="button" class="btn btn-primary btn-sm" @click="updateorder()">รับออเดอร์</button>
  </div>

    <div class="card-footer text-muted" v-else>
<p>ไม่มีข้อมูล</p>
  </div>
        <div class="bg-white p-3 mb-1"  data-target="#exampleModal31126" v-for="(i, key, index) in order" :key="index">
            <div class="row" style="">
              <div class="col-3">
                                  <!-- <img src="https://image.makewebeasy.net/noimage.png" width="100%"/> -->
                  <img :src="Checkimage(i.images)" width="100%">

                              </div>
              <div class="col-6">
                <div>
                  {{i.name_list}}<br>
                  <span style="font-size:0.6em;"></span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
                <div>
                  <br>
                  <span style="font-size:0.6em;">Note:{{i.note}}</span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
                <div>
                  <br>
                  <span style="font-size:0.6em;">โต๊ะ:{{i.toe_id}}</span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
              </div>
              <div class="col-1">
                <div>
                    {{i.qty}}<br>
                  <span style="font-size:0.6em;"></span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
              </div>
              <div class="col-2 text-right">
                <div>
                    <b-form-group>
      <b-form-checkbox-group
        id="checkbox-group-2"
        v-model="selected_pad"

        name="flavour-2"
      >
        <b-form-checkbox :value="i.id"></b-form-checkbox>
      </b-form-checkbox-group>
    </b-form-group>


                </div>
              </div>
            </div>
          </div>

        </div>


    </b-col>
    <!-- <b-col  sm="12" md="6" lg="6"  xl="6">
        <div class="card" v-if="order_doing">


  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-align: center;">  <button type="button" class="btn btn-sm"
      style="background-color: #1080DC;"
    >กำลังเตรียมอาหาร </button></li>
  </ul>
  <div class="card-footer text-muted" v-if="order_doing.length > 0">

<button type="button" class="btn btn-secondary btn-sm" @click="checkall('I')">เลือกทั้งหมด</button>
<button type="button" class="btn btn-primary btn-sm" @click="updatedoing()">เสร็จสิ้น</button>
  </div>

    <div class="card-footer text-muted" v-else>
<p>ไม่มีข้อมูล</p>
  </div>
            <div class="bg-white p-3 mb-1"  data-target="#exampleModal31126" v-for="(i, key, index) in order_doing" :key="index">
            <div class="row" style="">
              <div class="col-3">

                  <img :src="Checkimage(i.images)" width="100%">

                              </div>
              <div class="col-5">
                <div>
                  {{i.name_list}}<br>
                  <span style="font-size:0.6em;"></span><br>

                </div>
                <div>
                  <br>
                  <span style="font-size:0.6em;">Note:{{i.note}}</span><br>

                </div>
                <div>
                  <br>
                  <span style="font-size:0.6em;">โต๊ะ:{{i.toe_id}}</span><br>

                </div>
              </div>
              <div class="col-1">
                <div>
                    {{i.qty}}<br>
                  <span style="font-size:0.6em;"></span><br>

                </div>
              </div>
              <div class="col-2 text-right">
                <div>
                    <b-form-group>
      <b-form-checkbox-group
        id="checkbox-group-2"
        v-model="selected_do"

        name="flavour-2"
      >
        <b-form-checkbox :value="i.id"></b-form-checkbox>
      </b-form-checkbox-group>
    </b-form-group>


                </div>
              </div>
            </div>
          </div>

        </div>



    </b-col> -->

    <b-col  sm="12" md="5" lg="5"  xl="5">
        <div class="card" v-if="order_waiting">
            <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-align: center;">  <button type="button" class="btn btn-sm"
      style="
    background-color: #16CE64;"
    >รอเสริฟ </button></li>
  </ul>
  <div class="card-footer text-muted" v-if="order_waiting.length > 0">
<button type="button" class="btn btn-secondary btn-sm" @click="checkall('S')">เลือกทั้งหมด</button>
<button type="button" class="btn btn-primary btn-sm" @click="updatewait()">เสริฟ</button>
  </div>


     <div class="card-footer text-muted" v-else>
<p>ไม่มีข้อมูล</p>
  </div>
            <div class="bg-white p-3 mb-1"  data-target="#exampleModal31126" v-for="(i, key, index) in order_waiting" :key="index">
            <div class="row" style="">
              <div class="col-3">
                                  <!-- <img src="https://image.makewebeasy.net/noimage.png" width="100%"/> -->
                  <img :src="Checkimage(i.images)" width="100%">

                              </div>
              <div class="col-5">
                <div>
                  {{i.name_list}}<br>
                  <span style="font-size:0.6em;"></span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
                <div>
                  <br>
                  <span style="font-size:0.6em;">Note:{{i.note}}</span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
                <div>
                  <br>
                  <span style="font-size:0.6em;">โต๊ะ:{{i.toe_id}}</span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
              </div>
              <div class="col-1">
                <div>
                    {{i.qty}}<br>
                  <span style="font-size:0.6em;"></span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
              </div>
              <div class="col-2 text-right">
                <div>
                    <b-form-group>
      <b-form-checkbox-group
        id="checkbox-group-2"
        v-model="selected_wait"
        name="flavour-2"
      >
        <b-form-checkbox :value="i.id"></b-form-checkbox>
      </b-form-checkbox-group>
    </b-form-group>
                </div>
              </div>
            </div>
          </div>

        </div>

    </b-col>

  </b-row>

  <div>time: <strong>{{ time }}</strong></div>
</b-container>




    </div>
  </template>





<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_ORDER_CUS,UPDATE_ORDER_WAIT,UPDATE_ORDER_PENDING,UPDATE_ORDER_DOING } from "@store/actions.type";
import { IMAGE_URL } from "../environment/environment";
export default {
    components: {
        },
        data() {
            return {
                time:30,
                order:null,
                 allSelected:false,
                order_waiting:null,
                order_doing:null,
                form:{
statusorder:'Y',
                },
      selected_pad: [],
      selected_wait: [],
      selected_do: [],
      options: [
        { text: 'Orange', value: 'orange' },
        { text: 'Apple', value: 'apple' },
        { text: 'Pineapple', value: 'pineapple' },
        { text: 'Grape', value: 'grape' }
      ]
    }
    },
    async created(){

        let ordercus = await this.$store.dispatch(FETCH_ORDER_CUS,this.form);
        console.log('this.selected_pad',JSON.stringify(ordercus.pending));
this.order = ordercus.pending;
this.order_doing = ordercus.doing;
this.order_waiting = ordercus.waiting;





setInterval(() => {
      this.getNow();
    }, 1000)


        },
    mounted() {

        },
        methods: {

        checkall(e){

if(e == 'O'){
    this.selected_pad = [];
            if (!this.allSelected) {
                 this.order.forEach((select) => {
             this.selected_pad.push(select.id)
            })

            }
}
if(e == 'I'){
    this.selected_do = [];
    if (!this.allSelected) {
                 this.order_doing.forEach((select) => {
             this.selected_do.push(select.id)
            })

            }


}
if(e == 'S'){
    this.selected_wait = [];
    if (!this.allSelected) {
                 this.order_waiting.forEach((select) => {
             this.selected_wait.push(select.id)
            })

    }
}


          //  console.log('this.selected_pad',this.selected_pad);
        },

        Checkimage(image){
                let public_images = IMAGE_URL+''+image;
                return public_images;
        },

           async getNow(){

                this.time--;
                if(this.time == 0){
                    this.time = 30;
                    let ordercus = await this.$store.dispatch(FETCH_ORDER_CUS,this.form);
                    this.order = ordercus.pending;
this.order_doing = ordercus.doing;
this.order_waiting = ordercus.waiting;


                    this.selected = [];
                }

            },


       async updateorder(){

               let updatepending = await this.$store.dispatch(UPDATE_ORDER_PENDING,this.selected_pad);
              let y =  await this.updateorderb()

        },
      async updatewait(){

        let updatewait = await this.$store.dispatch(UPDATE_ORDER_WAIT,this.selected_wait);
         let y =  await this.updateorderb()
        },
       async updatedoing(){



 let updatedoing = await this.$store.dispatch(UPDATE_ORDER_DOING,this.selected_do);
  let y =  await this.updateorderb()
        },

        async updateorderb(){
         let ordercus = await this.$store.dispatch(FETCH_ORDER_CUS,this.form);
                    this.order = ordercus.pending;
                    this.order_doing = ordercus.doing;
                    this.order_waiting = ordercus.waiting;
                    this.selected_pad = [];



        },






        }


}
</script>
