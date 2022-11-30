<template>

<div>




    <div class="wrapper w3-animate-top">

  <!-- Sidebar  -->
  <!-- <nav id="sidebar">
    <div id="dismiss"> <i class="fas  fa-arrow-left"></i> </div>
    <div class="sidebar-header">
      <h5 >Main Menu</h5 >
    </div>
    <ul class="list-unstyled components">
      <li> <a href="https://dinovery.app/app/index.php/Home/history"><i class="far fa-list-alt text-dino mr-1"></i> ออเดอร์ของฉัน</a> </li>
      <li> <a href="#" onclick="return confirm('เมนูนี้ยังไม่เปิดให้บริการ')" ><i class="far fa-user-circle text-dino mr-1"></i> โปรไฟล์ของฉัน</a> </li>
      <li> <a href="https://dinovery.app/app/index.php/Home/order_location"><i class="fas fa-map-marker-alt text-dino mr-1"></i> ที่อยู่ของฉัน</a> </li>
      <li> <a href="https://dinovery.app/app/index.php/Auth/logout"><i class="fas fa-sign-out-alt text-dino mr-1"></i> ออกจากระบบ</a> </li>
    </ul>
  </nav> -->




  <!-- Page Content  -->
  <div id="content" v-if="currentRouteName === '/'">

    <div class="px-3" style="margin-top:6rem;">
<Banner/>




    </div>

       <Navbar />

       <div class="px-3" style="margin-top:1rem;">




        <router-view></router-view>


    </div>


		<div style="height:90px;"></div>
<Menu/>
  </div>

    <div v-else>
        <Navbar />
        <div class="px-3" style="margin-top:7rem;">
 <router-view></router-view>
</div>
 <Menu/>
  </div>

</div>
<div class="overlay"></div>

</div>
</template>
<style>
body {margin:0;}

.navbar {
    background-color: rgb(236, 125, 35);
  position:fixed;
  z-index:1; /*Add this*/
  width:100%;
  height:50px;
  text-align:center;
  vertical-align:middle;

  top:0px;
}

.navbar a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

</style>

<script>
import Banner from "@components/Banner";
import Navbar from "@components/Navbar";
import Menu from "@components/Menu";
import { mapGetters,mapState } from "vuex";
import { FETCH_TYPERES,FETCH_TOE_FRONT } from "@store/actions.type";
export default {
    name: 'app',
    components: {
 Navbar,Menu,Banner
        },

        data() {
      return {
        form:{
            token:null,
        },
        toe_id:0,
        typerest: "0",
        toeall:"0",
        x:1,

      }
    },
    mounted() {},
  computed: {
    currentRouteName() {
      return this.$route.name;
    }
  },
    async created(){

    //     this.form.token = this.$route.params.token;
    //     console.log('this.form.token',this.form.token)
    //     console.log(this.$route.query)
    //     let toe = await this.$store.dispatch(FETCH_TOE_FRONT,this.form);
    // let typeres = await this.$store.dispatch(FETCH_TYPERES,this.form);
    // this.typerest = typeres;







        },
   async mounted() {



        },
        methods: {

            checkImage(image){

                let a = 'http://restau.test/public/product/'+image;

return a;
            }

        }


}
</script>
