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
  <div id="content">

    <div class="px-3" style="margin-top:1rem;">
      <div class="row mb-3">
        <div class="col-12 px-3"> <a href="https://dinovery.app/app/index.php/Home/restaurant_list">           <div class="card shadow" style="background-color:#000;">
            <div class="card-body text-center" style="background-image:url(https://f.ptcdn.info/117/038/000/nz1iume3wkic0Doh44T-o.jpg); background-repeat: no-repeat;  background-position: center; background-size: cover; box-shadow: inset 0px 0px 400px 110px rgba(0, 0, 0, .5);">
              <!--<h1><i class="fas fa-utensils text-dino"></i> <i class="fas fa-wine-glass-alt text-dino"></i></h1>-->
              <h5 style="font-size:6vw; color:#FFF; padding:35px;">อาหารและเครื่องดื่ม</h5>
            </div>
          </div>
          </a> </div>
      </div>

			<hr class="style-two">
<h5><i class="fa fa-shopping-cart" aria-hidden="true"></i> ประเภทอาหาร</h5>
			<div class="row mb-3">

				<div class="col-4 pl-2 pr-2" v-for="i in this.typerest">
                    <a href="https://dinovery.app/app/index.php/Home/restaurant_detail/2553">
					<div class="card shadow">
						<div class="card-body text-center">
                             <img  :src="checkImage(i.images)" width="100%"/>
                             </div>
					</div>
					</a> </div>

				<!-- <div class="col-4 pl-2 pr-2"> <a href="https://dinovery.app/app/index.php/Home/restaurant_detail/330">
					<div class="card shadow">
						<div class="card-body text-center"> <img src="https://dinovery.app/app/assets/img/7-11.png" width="100%"/> </div>
					</div>
					</a> </div>


				<div class="col-4 pl-2 pr-2"> <a href="https://dinovery.app/app/index.php/Home/restaurant_detail/1094">
          <div class="card shadow">
            <div class="card-body text-center"> <img src="https://dinovery.app/app/assets/img/tops.png" width="100%"/> </div>
          </div>
          </a> </div> -->







      </div>




    </div>
		<div style="height:90px;"></div>
		<div class="p-2 shadow fixed-bottom" style="background-color:#ec7d23;">
  <div class="row" style="margin-bottom:2%; font-family:Mitr;">
    <div class="col-3 text-center text-white" style="padding-top:1%;">
      <a href="#"><i class="fa fa-th fa-2x" aria-hidden="true"></i><br>เมนู</a>
    </div>
    <div class="col-3 text-center text-white" style="padding-top:1%;">
      <a href="#"><i class="fa fa-history fa-2x" aria-hidden="true"></i><br>รายการที่สั่ง</a>
    </div>
    <div class="col-3 text-center text-white" style="padding-top:1%;">
      <a href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i><br>เรียกพนักงาน</a>
    </div>
    <div class="col-3 text-center text-white" style="padding-top:1%;">
      <a href="#"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><br>ชำระเงิน</a>
    </div>
  </div>
</div>
  </div>

</div>
<div class="overlay"></div>

</div>
</template>


<script>
import { mapGetters,mapState } from "vuex";
import { FETCH_TYPERES } from "@store/actions.type";
export default {
    components: {

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
