<template>
  <div class="listres">
    <div class="tabbable">
    <ul class="nav nav-pills mb-2 shadow-sm">
        <li class="nav-item" style="font-weight: bold; color:black;"  v-for="x in this.typegroup" @click="scrollFind(x.id)">
          <a class="nav-link active" style="color:orange;" data-toggle="pill" href="#category0">{{x.name}}<p></p></a>
        </li>

    </ul>
            </div>
    <div class="bg-white p-3 mb-1" data-toggle="modal" data-target="#exampleModal31126" @click="scrollToTops(i)" v-for="i in this.res">
            <div class="row" style="">
              <div class="col-3">
                                  <!-- <img src="https://image.makewebeasy.net/noimage.png" width="100%"/> -->
                  <img :src="checkImage(i.images)" width="100%">

                              </div>
              <div class="col-6">
                <div>
                  {{i.name_list}}<br>
                  <span style="font-size:0.6em;"></span><br>
                  <!-- <span style="font-size:0.8em;"></span> -->
                </div>
              </div>
              <div class="col-3 text-right">
                <div> {{i.price_sell}}.00</div>
              </div>
            </div>
          </div>
          <div v-if="myModel">
    <transition name="model modal-open">
          <div class="modal-mask modal fad xtdas">
            <div class="modal-wrapper">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header" style="font-size:1.3em;">
                  <div class="modal-title">{{this.name}}</div>
                  <div class="modal-title"> {{this.price}}.00</div>
                </div>
                <div class="modal-body">
                  <div class="">
                                                              <!-- <center><img src="https://gg.dinovery.app/myadmin/images/menu/menu_20200622121831.jpg" width="80%"/></center> -->
                      <br>
                                        <div class="form-group">

                      <label>หมายเหตุ</label>
                      <small>(ไม่ระบุก็ได้)</small>
                      <textarea name="partner_menu_detail" autofocus="autofocus" class="form-control form-control-sm input-border-bottom" placeholder="รายละเอียด และข้อมูลเพิ่มเติมของรายการนี้!" v-model="note"></textarea>
                    </div>
                  </div>


                  <div class="text-center mb-3" style="font-size:2em;">
                    <i class="far fa-minus-square text-muted mr-2" @click="downper()"></i>
                    <input type="text" min="1"  v-model="qty" style="width:15%; text-align:center;">
                    <i class="far fa-plus-square text-muted ml-2" @click="uppper()"></i>
                </div>
                  <div class="text-center">

                    <input class="btn btn-warning btn-block btn-lg" name="button"  value="เพิ่มไปยังตะกร้า" @click="Addcart()" >
                    <input class="btn btn-danger btn-block btn-lg" name="button"  value="ปิด" @click="Close()">
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

.tabbable .nav-pills {
    overflow-x: auto;
    overflow-y: hidden;
    flex-wrap: nowrap;
    white-space: nowrap;
}
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
import { FETCH_RES,FETCH_RES_CART,FETCH_TYPERES_GROUP  } from "@store/actions.type";
import { IMAGE_URL } from "../components/environment/environment";
export default {
  name: 'listres',
    data: () => ({
        myModel:false,
form:{
    typeres:null
},
formadd:{},
res:null,
typegroup:null,
name:null,
price:null,
qty:1,
note:null,
id:null
        }),
        computed: {
    currentRouteName() {
      return this.$route.name;
    }
  },

        async created(){

            this.form.typeres = this.$route.params.id
      let befres = await this.$store.dispatch(FETCH_RES,this.form);
this.res = befres;

let gettypegroup = await this.$store.dispatch(FETCH_TYPERES_GROUP,this.form);
this.typegroup = gettypegroup;

                },
        mounted() {

        },

        methods: {

            Close(){
                this.myModel = false;
            },

            Addcart(){

                this.myModel = false;
            this.formadd.id = this.id;
            this.formadd.name_list = this.name;
            this.formadd.price_sell = this.price;
            this.formadd.qty = this.qty;
            this.formadd.note = this.note;
            this.formadd.token = this.$route.params.token;
            this.formadd.total_res = null;
          let befres =  this.$store.dispatch(FETCH_RES_CART,this.formadd);
            },


        scrollToTops(i) {


            this.myModel = true;
            this.qty = 1;
            this.id = i.id;
            this.note = null;
            this.name = i.name_list;
            this.price = i.price_sell;


        },

        async scrollFind(x){

            this.form.typeres = x

      let befres = await this.$store.dispatch(FETCH_RES,this.form);
this.res = befres;


        },

        checkImage(image){

let a = IMAGE_URL+''+image;


return a;
},

downper(){

if(this.qty == 1){

}else {

    this.qty--;
}



},
uppper(){

this.qty++;

}


},
}
</script>
