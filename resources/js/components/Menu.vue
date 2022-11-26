<template>
  <div class="menu">
    <div class="p-2 shadow fixed-bottom" style="background-color:#ec7d23;">
  <div class="row" style="margin-bottom:2%; font-family:Mitr;">
    <div class="col-3 text-center text-white" style="padding-top:1%;">

      <router-link :to="{ name: 'home' }"><i class="fa fa-th fa-2x" aria-hidden="true"></i><br>เมนู</router-link>


    </div>
    <div class="col-3 text-center text-white" style="padding-top:1%;">
                <router-link :to="{ name: 'orderbuy' }"><i class="fa fa-history fa-2x" aria-hidden="true"></i><br>รายการที่สั่ง</router-link>
    </div>
    <div class="col-3 text-center text-white" style="padding-top:1%;">
         <router-link :to="{ name: 'callstaff' }"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i><br>เรียกพนักงาน</router-link>
    </div>

    <div class="col-3 text-center text-white" style="padding-top:1%;">

  <router-link :to="{ name: 'paymoney' }"><i class="fa fa-user-circle fa-2x" aria-hidden="true"></i><br>ชำระเงิน</router-link>

    </div>
  </div>
</div>
  </div>
</template>

<script>
export default {
   name: "menuxx",// OK
}
</script>
