<template>
    <div>
        <b-container fluid="xl" >
  <b-row>
    <b-col  sm="12" md="4" lg="4" xl="4">
        <div class="card" v-if="order">
            <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-align: center;">
         <button type="button" class="btn btn-sm" style="background-color: #DEDA0D;">รอดำเนินการ</button></li>
  </ul>
        <div class="bg-white p-3 mb-1"  data-target="#exampleModal31126" v-for="(i, key, index) in order" :key="index">
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
          <div class="card-footer text-muted" v-if="order.length > 0">
<button type="button" class="btn btn-secondary btn-sm"  @click="checkall('O')">เลือกทั้งหมด</button>
<button type="button" class="btn btn-primary btn-sm" @click="updateorder()">รับออเดอร์</button>
  </div>

    <div class="card-footer text-muted" v-else>
<p>ไม่มีข้อมูล</p>
  </div>
        </div>


    </b-col>
    <b-col  sm="12" md="4" lg="4"  xl="4">
        <div class="card" v-if="order_doing">


  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-align: center;">  <button type="button" class="btn btn-sm"
      style="background-color: #1080DC;"
    >กำลังเตรียมอาหาร </button></li>
  </ul>
            <div class="bg-white p-3 mb-1"  data-target="#exampleModal31126" v-for="(i, key, index) in order_doing" :key="index">
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
          <div class="card-footer text-muted" v-if="order_doing.length > 0">

<button type="button" class="btn btn-secondary btn-sm" @click="checkall('I')">เลือกทั้งหมด</button>
<button type="button" class="btn btn-primary btn-sm" @click="updatedoing()">เสร็จสิ้น</button>
  </div>

    <div class="card-footer text-muted" v-else>
<p>ไม่มีข้อมูล</p>
  </div>
        </div>



    </b-col>

    <b-col  sm="12" md="4" lg="4"  xl="4">
        <div class="card" v-if="order_waiting">
            <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-align: center;">  <button type="button" class="btn btn-sm"
      style="
    background-color: #16CE64;"
    >รอเสริฟ </button></li>
  </ul>
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
          <div class="card-footer text-muted" v-if="order_waiting.length > 0">
<button type="button" class="btn btn-secondary btn-sm" @click="checkall('S')">เลือกทั้งหมด</button>
<button type="button" class="btn btn-primary btn-sm" @click="updatewait()">เสริฟ</button>
  </div>


     <div class="card-footer text-muted" v-else>
<p>ไม่มีข้อมูล</p>
  </div>
        </div>

    </b-col>

  </b-row>
  <div>Selected: <strong>{{ selected_pad }} {{ selected_wait }} {{ selected_do }}</strong></div>
  <div>time: <strong>{{ time }}</strong></div>
</b-container>




    </div>
  </template>





<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_ORDER_CUS,UPDATE_ORDER_WAIT,UPDATE_ORDER_PENDING,UPDATE_ORDER_DOING,FETCH_ORDER_CUS_DRINK } from "@store/actions.type";
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

        let ordercus = await this.$store.dispatch(FETCH_ORDER_CUS_DRINK,this.form);
        console.log('this.selected_pad',JSON.stringify(ordercus.pending));
this.order = ordercus.pending;
this.order_doing = ordercus.doing;
this.order_waiting = ordercus.waiting;

 console.log('this.order_doing',this.order_doing);



setInterval(() => {
      this.getNow();
    }, 1000)


        },
    mounted() {

        },
        methods: {

        checkall(e){

if(e == 'O'){
console.log('o');
}
if(e == 'I'){
console.log('i');
}
if(e == 'S'){
console.log('s');
}

            this.selected_pad = [];
            if (!this.allSelected) {
                 this.order.forEach((select) => {
             this.selected_pad.push(select.id)
            })

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
                    let ordercus = await this.$store.dispatch(FETCH_ORDER_CUS_DRINK,this.form);
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
         let ordercus = await this.$store.dispatch(FETCH_ORDER_CUS_DRINK,this.form);
                    this.order = ordercus.pending;
                    this.order_doing = ordercus.doing;
                    this.order_waiting = ordercus.waiting;
                    this.selected_pad = [];



        },






        }


}
</script>
