<template>

<div>


    <div class="wrapper w3-animate-top">
  <!-- Sidebar  -->
  <nav id="sidebar">
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
  </nav>

  <!-- Page Content  -->
  <div id="content" v-if="currentRouteName === 'home'">

    <div class="px-3" style="margin-top:1rem;">
<Banner/>

			<hr class="style-two">
<h5><i class="fa fa-shopping-cart" aria-hidden="true"></i> ประเภทอาหาร {{this.currentRouteName}}</h5>
			<div class="row mb-3">

				<div class="col-4 pl-2 pr-2" v-for="i in this.typerest">
                    <a href="https://dinovery.app/app/index.php/Home/restaurant_detail/2553">
					<div class="card shadow">
						<div class="card-body text-center">
                             <img  :src="checkImage(i.images)" width="100%"/>
                             </div>
					</div>
					</a>
                    </div>
      </div>




    </div>

       <Navbar />
 <router-view></router-view>
		<div style="height:90px;"></div>
<Menu/>
  </div>

    <div v-else>
 <router-view></router-view>
 <Menu/>
  </div>

</div>
<div class="overlay"></div>

</div>
</template>


<script>
import Banner from "@components/Banner";
import Navbar from "@components/Navbar";
import Menu from "@components/Menu";
import { mapGetters,mapState } from "vuex";
import { FETCH_TYPERES } from "@store/actions.type";
export default {
    name: 'app',
    components: {
 Navbar,Menu,Banner
        },

        data() {
      return {
        form:{
            id:null
        },
        toe_id:0,
        typerest: "0",
        toeall:"0"
      }
    },
    mounted() {},
  computed: {
    currentRouteName() {
      return this.$route.name;
    }
  },
    async created(){
let typeres = await this.$store.dispatch(FETCH_TYPERES);
this.typerest = typeres;




        },
    mounted() {

        },
        methods: {

            checkImage(image){

                let a = 'http://restau.test/public/product/'+image;
return a;
            }





        }


}
</script>
