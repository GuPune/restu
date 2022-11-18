<template>

<div>
 <form>
  <div class="form-row">
    <div class="form-group col-md-6">
 
      <input type="text" class="form-control" id="inputEmail4" placeholder="ทะเบียนรถ">
    </div>
    <div class="form-group col-md-6">
    
      <input type="text" class="form-control" id="inputPassword4" placeholder="เลขที่บัตรประชาชน">
    </div>
  </div>
  <div class="form-group">
  
    <input type="text" class="form-control" id="inputAddress" placeholder="ชื่อนามสกุล">
  </div>
<div class="form-row">
    <div class="form-group col-md-6">
    
      <input type="text" class="form-control" id="inputEmail4" placeholder="วันเกิด">
    </div>
    <div class="form-group col-md-6">
  
      <input type="text" class="form-control" id="inputPassword4" placeholder="เบอร์ติดต่อ">
    </div>
  </div>
  <div class="form-group">
 
    <input type="text" class="form-control" id="inputAddress" placeholder="ที่อยู่">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
  
     <input type="text" class="form-control" id="inputAddress" placeholder="ผู้ลงข้อมูลลูกค้า">
    </div>
 
 
  </div>

 
</form>
  </div>


</template>


<script>
import { mapGetters } from "vuex";
  export default {
    data() {
    return {
      IsLogin: false,
      slide: 0,
        sliding: null,
         text: ''
    };
  },


     computed: {
      ...mapGetters(["itempos"]),

        },



          async created(){



        },




      mounted() {

         },

      methods: {





        }



        }


</script>
