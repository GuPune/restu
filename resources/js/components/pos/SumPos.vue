<template>

<div class="row form-inline">
<div class="col-sm-6 col-lg-4">
<div class="form-group"><label for="inputdiscount" style="width:120px;display:block;text-align:left; font-weight:bold;">รวมราคา :</label>
<input name="total" id="total" type="text" data="number" class="form-control classname" style="text-align:right;width:150px" readonly="">
</div>
</div>
<div class="col-sm-6 col-lg-4">
<div class="form-group">
<label for="discount" style="width:120px;display:block;text-align:left; font-weight:bold;">ส่วนลดท้ายบิล :</label>
<input name="discount" type="text" data="number" id="discount" style="text-align:right;width:150px" class="form-control classname" readonly=""> <input name="Ref_type_payment_id" type="hidden" value="1">
</div>
</div>
<div class="col-sm-6 col-lg-4">
<div class="form-group"><label for="scorechange" style="width:120px;display:block;text-align:left; font-weight:bold;">แลกคะแนน :</label>
<select name="scorechange" id="scorechange" class="form-control classname" style="text-align:right;width:150px">
 <option value="0">แลกคะแนน</option>
</select>
</div>
</div>
<div class="col-sm-6 col-lg-4">
<div class="form-group">
<label for="totalprice" style="width:120px;display:block;text-align:left; font-weight:bold;">ราคา :</label>
<input name="totalprice" type="text" data="number" class="form-control classname" id="totalprice" style="text-align:right;width:150px" readonly="">
</div>
</div>
<div class="col-sm-6 col-lg-4">
<div class="form-group">
<label for="tax" style="width:120px;display:block;text-align:left; font-weight:bold;"> ภาษีมูลค่าเพิ่ม :</label>
<input name="tax" type="text" data="number" class="form-control classname" id="tax" style="text-align:right;width:150px" readonly="" value="0">
</div>
</div>
<div class="col-sm-6 col-lg-4">
<div class="form-group">
<label for="result" style="width:120px;display:block;text-align:left; font-weight:bold;">รวมทั้งหมด :</label>
<input name="result" type="text" data="number" class="form-control classname" id="result" style="text-align:right;width:150px" readonly="" value="0">
</div>
</div>
</div>


</template>


<script>

  export default {



        }


</script>
