<template>
    <div>
        <b-container class="bv-example-row">
  <b-row>
    <b-col  sm="12" md="4" lg="4">
        <div class="card">
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
              <div class="col-6">
                <div>
                  {{i.status}}<br>
                  <span style="font-size:0.6em;"></span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
              </div>
              <div class="col-3 text-right">
                <div>
                    <b-form-group>
      <b-form-checkbox-group
        id="checkbox-group-2"
        v-model="selected"

        name="flavour-2"
      >
        <b-form-checkbox :value="i.id"></b-form-checkbox>
      </b-form-checkbox-group>
    </b-form-group>


                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-muted">

<button type="button" class="btn btn-secondary btn-sm">เลือกทั้งหมด</button>
<button type="button" class="btn btn-primary btn-sm">รับออเดอร์</button>
  </div>
        </div>
    </b-col>
    <b-col  sm="12" md="4" lg="4">
        <div class="card">


  <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-align: center;">  <button type="button" class="btn btn-sm"
      style="
    background-color: #1080DC;"
    >กำลังเตรียมอาหาร</button></li>
  </ul>
            <div class="bg-white p-3 mb-1"  data-target="#exampleModal31126" v-for="(i, key, index) in order_doing" :key="index">
            <div class="row" style="">
              <div class="col-3">
                                  <!-- <img src="https://image.makewebeasy.net/noimage.png" width="100%"/> -->
                  <img :src="Checkimage(i.images)" width="100%">

                              </div>
              <div class="col-6">
                <div>
                  {{i.status}}<br>
                  <span style="font-size:0.6em;"></span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
              </div>
              <div class="col-3 text-right">
                <div>
                    <b-form-group>
      <b-form-checkbox-group
        id="checkbox-group-2"
        v-model="selected"

        name="flavour-2"
      >
        <b-form-checkbox :value="i.id"></b-form-checkbox>
      </b-form-checkbox-group>
    </b-form-group>


                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-muted">

<button type="button" class="btn btn-secondary btn-sm">เลือกทั้งหมด</button>
<button type="button" class="btn btn-primary btn-sm">รับออเดอร์</button>
  </div>
        </div>
    </b-col>

    <b-col  sm="12" md="4" lg="4">
        <div class="card">
            <ul class="list-group list-group-flush">
    <li class="list-group-item" style="text-align: center;">  <button type="button" class="btn btn-sm"
      style="
    background-color: #16CE64;"
    >รอเสริฟ</button></li>
  </ul>
            <div class="bg-white p-3 mb-1"  data-target="#exampleModal31126" v-for="(i, key, index) in order_waiting" :key="index">
            <div class="row" style="">
              <div class="col-3">
                                  <!-- <img src="https://image.makewebeasy.net/noimage.png" width="100%"/> -->
                  <img :src="Checkimage(i.images)" width="100%">

                              </div>
              <div class="col-6">
                <div>
                  {{i.status}}<br>
                  <span style="font-size:0.6em;"></span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
              </div>
              <div class="col-3 text-right">
                <div>
                    <b-form-group>
      <b-form-checkbox-group
        id="checkbox-group-2"
        v-model="selected"

        name="flavour-2"
      >
        <b-form-checkbox :value="i.id"></b-form-checkbox>
      </b-form-checkbox-group>
    </b-form-group>


                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-muted">

<button type="button" class="btn btn-secondary btn-sm">เลือกทั้งหมด</button>
<button type="button" class="btn btn-primary btn-sm">รับออเดอร์</button>
  </div>
        </div>
    </b-col>

  </b-row>
  <div>Selected: <strong>{{ selected }}</strong></div>
  <div>time: <strong>{{ time }}</strong></div>
</b-container>




    </div>
  </template>





<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_ORDER_CUS } from "@store/actions.type";
import { IMAGE_URL } from "../environment/environment";
export default {
    components: {
        },
        data() {
            return {
                time:30,
                order:null,
                form:{
statusorder:'Y',
                },
      selected: [], // Must be an array reference!
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
this.order = ordercus.pending;
this.order_doing = ordercus.doing;
this.order_waiting = ordercus.waiting;

console.log('this.order',this.order.pending);

setInterval(() => {
      this.getNow();
    }, 1000)


        },
    mounted() {

        },
        methods: {

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

            }





        }


}
</script>
