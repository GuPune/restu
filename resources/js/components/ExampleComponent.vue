<template>
    <div>
 <div class="card-header card-primary" style=" margin-bottom:5px"><span>
<i class="dropdown">
<button class="classname" style="width:30px; height:25px; font-size: 0.9rem; padding :2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>
<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
<button class="dropdown-item" data="sort" type="button" value="0">เรียงตามค่าเริ่มต้น</button>
<button class="dropdown-item" data="sort" type="button" value="1">เรียงตามสินค้าขายดี</button>
<button class="dropdown-item" data="sort" type="button" value="2">เรียงตามชื่อสินค้า</button>
<button class="dropdown-item" data="sort" type="button" value="3">เรียงตามบาร์โค้ด</button>
<button class="dropdown-item" data="sort" type="button" value="4">เรียงตามกำหนดเอง (เมนู A10) </button>
</div>
</i><select name="Table_id" class="classname" id="Table_id" style="width:100px; height:25px; font-size: 0.9rem; padding:2px;">
<option value="77" style="text-align:right">1 4 ที่นั่ง</option> <option value="78" style="text-align:right">2 4 ที่นั่ง</option> <option value="79" style="text-align:right">VIP 10 ที่นั่ง</option><option value="80" selected="" style="text-align:right">9 10 ที่นั่ง</option> </select>
&nbsp;&nbsp;<input name="ref_retail_id" id="ref_retail_id" type="hidden" value="1"> &nbsp;&nbsp;
<select name="Groups_id" class="classname" id="Groups_id" style="width:110px; height:25px; font-size: 0.9rem; padding:2px;  ">
<option value="">หมวดทั้งหมด</option>
<option value="1">ทั่วไป (20) </option><option value="29">BEVERAGE (0) </option><option value="43">MEAT (0) </option><option value="46">VEGS (1) </option><option value="47">SAUCE (0) </option><option value="48">DRIED HERB (0) </option><option value="49">DAIRY (0) </option><option value="50">COLD CUT (0) </option><option value="51">FLOUR&amp;BAKERY (0) </option><option value="52">CHIPS (0) </option><option value="53">ຊາຊິມິ (0) </option> </select>&nbsp;&nbsp;
<input type="text" name="txtproduct" placeholder="Barcode/ค้นหา" class="classname" id="txtproduct" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;    " autocomplete="off">
</span> <span>
<button type="button" class="classname  btn-danger" style="width:130px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer  " data-toggle="modal" data-target="#changetable">ย้ายโต๊ะ/รวมโต๊ะ</button>
&nbsp;&nbsp;
<button type="button" id="printer" class="classname  btn-success" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer " data-toggle="modal" data-target="#detailsent"><i class="fa fa-print" aria-hidden="true"></i> พิมพ์ส่งครัว&amp;บาร์ </button> &nbsp;&nbsp;<button type="button" class="classname  btn-warning" style="width:150px; height:25px; font-size: 0.9rem; padding:2px;  cursor:pointer  " name="esc">ยกเลิกรายการ [F2]</button>
</span>
<span style="float:right"><strong style="font-size: 0.9rem;">ลูกค้า:</strong> <input name="Namecustomer" type="text" id="Namecustomer" data-toggle="modal" data-target="#CusModal" style="width:110px; height:25px; font-size: 0.7rem; padding:2px;  cursor:pointer  ; text-align:right" value="ทั่วไป" readonly="readonly" class="classname"></span>
</div>

<div class="row">
<div class="col-sm-12 col-lg-7">
    <div class="col-sm-3" id="3" note="" serial="0" align="center" style="font-size:10px">
    <div class="card" style="background-color: ; cursor:pointer; height:180px;padding:10px">
    <div style="font-size:0.9rem">
    <img src="https://www.e-posshop.com/system/img/0000043/item/1579598785.jpg" width="80" height="80"><br> <strong>กุ้งโสร่ง</strong><br>50.00
    </div>
    </div>
    </div>
</div>
<div class="col-sm-12 col-lg-5" id="div2" style="padding-top:5px;margin-bottom:10px;background-color:#FFFFFF ">
<div style="border:#666666 1px solid ; padding:10px">
<div class="row">
<div class="col-lg-6">
<div style="bottom: 40px;">
<small style="font-size: 0.9rem;"><strong>ส่วนลดท้ายบิล</strong></small>
<br>
<select class="form-control-sm" id="discount_id" name="discount_id" style="width:110px; height:25px; font-size: 0.9rem; padding:2px;">
<option value="2">ส่วนลด (บาท)</option>
<option value="1">ส่วนลด %</option>
</select><input id="inputdiscount" name="inputdiscount" type="number" size="15" class="form-control-sm" style="width:80px; height:25px; font-size: 0.9rem; padding:2px;  text-align:right " placeholder="0.00">
</div>
</div>
<div align="right" class="col-lg-6">
<strong> <span id="totalammount">0</span> รายการ <span id="totalnumbershow">0</span> ชิ้น คะแนนสะสม <span id="totalscoreshow">0</span> </strong>
<div align="right" style="text-align: right"> <span>
<s id="txtbalance" style="font-size: 2.0rem; color:#999999"></s>
</span>
</div>
<div align="right" id="showbalance" style="font-size: 3.2rem; text-align: right">0.00</div> </div>
</div>
<div class="bg-primary" align="center">
<button type="button" class="form-control  btn btn-success" name="checkbill" style="font-size: 1.5rem; width:100% ">เซ็คบิล [F8]</button>
<button type="button" class="form-control  btn btn-primary" name="txtpayment" style="font-size: 1.5rem; width:100% " disabled="">ชำระเงิน [F9]</button>
</div>
</div>
<div>
    <div id="v12listsale_tran" class="myBox"><table id="example2" style=" font-size:12px; " class="table table-striped">
            <tbody>
            <tr>
            <td width="36" style=" font-weight:bold; font-size:14px">
            <div>6. </div>
            <div>
            <button class="btn btn-danger" style="width:30px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4728"> ลบ </button> </div> </td>
            <td width="158"> <span style=" font-weight:bold; font-size:14px">30002</span><br>
            <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" style="width:60px; height:15px; font-size: 12px; padding:2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ส่วนลด </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (บาท)" data-name="น้ำพริกชอุ่ม (50.00)" data-iddiscount="2" data-id="4728" data-txtdiscount="0">บาท (฿)</button>
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (%)" data-name="น้ำพริกชอุ่ม (50.00)" data-iddiscount="1" data-id="4728" data-txtdiscount="0">%</button>
            </div>
            </div>
            </td>
            <td width="583">
            <div align="right" style=" font-weight:bold; font-size:14px">
            น้ำพริกชอุ่ม </div>
            <div align="right">
            50.00 <span name="changeprice" data="11"> <input name="price" type="hidden" value="50.00"></span>
            x
            <input name="amountproduct" type="number" size="3" onkeydown="if(event.key==='.'){event.preventDefault();}" value="0" data="11" dataid="4728" style="text-align:center ; width: 70px " tabindex="1">
            <input name="totalproduct" type="text" readonly="" style="text-align:right; width:70px" value="0">
            <input name="pricehidden_novat" type="hidden" value="0"> </div></td>
            </tr>
            <tr>
            <td width="36" style=" font-weight:bold; font-size:14px">
            <div>5. </div>
            <div>
            <button class="btn btn-danger" style="width:30px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4727"> ลบ </button> </div> </td>
            <td width="158"> <span style=" font-weight:bold; font-size:14px">10007</span><br>
            <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" style="width:60px; height:15px; font-size: 12px; padding:2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ส่วนลด </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (บาท)" data-name="กุ้งโสร่ง (50.00)" data-iddiscount="2" data-id="4727" data-txtdiscount="0">บาท (฿)</button>
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (%)" data-name="กุ้งโสร่ง (50.00)" data-iddiscount="1" data-id="4727" data-txtdiscount="0">%</button>
            </div>
            </div>
            </td>
            <td width="583">
             <div align="right" style=" font-weight:bold; font-size:14px">
            กุ้งโสร่ง </div>
            <div align="right">
            50.00 <span name="changeprice" data="3"> <input name="price" type="hidden" value="50.00"></span>
            x
            <input name="amountproduct" type="number" size="3" onkeydown="if(event.key==='.'){event.preventDefault();}" value="2" data="3" dataid="4727" style="text-align:center ; width: 70px " tabindex="2">
            <input name="totalproduct" type="text" readonly="" style="text-align:right; width:70px" value="100">
            <input name="pricehidden_novat" type="hidden" value="100"> </div></td>
            </tr>
            <tr>
            <td width="36" style=" font-weight:bold; font-size:14px">
            <div>4. </div>
            <div>
            <button class="btn btn-danger" style="width:30px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4721"> ลบ </button> </div> </td>
            <td width="158"> <span style=" font-weight:bold; font-size:14px">30005</span><br>
            <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" style="width:60px; height:15px; font-size: 12px; padding:2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ส่วนลด </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (บาท)" data-name="น้ำพริกนางลอย (50.00)" data-iddiscount="2" data-id="4721" data-txtdiscount="0">บาท (฿)</button>
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (%)" data-name="น้ำพริกนางลอย (50.00)" data-iddiscount="1" data-id="4721" data-txtdiscount="0">%</button>
            </div>
            </div>
            </td>
            <td width="583">
            <div align="right" style=" font-weight:bold; font-size:14px">
            น้ำพริกนางลอย </div>
            <div align="right">
            50.00 <span name="changeprice" data="14"> <input name="price" type="hidden" value="50.00"></span>
            x
            <input name="amountproduct" type="number" size="3" onkeydown="if(event.key==='.'){event.preventDefault();}" value="2" data="14" dataid="4721" style="text-align:center ; width: 70px " tabindex="3">
            <input name="totalproduct" type="text" readonly="" style="text-align:right; width:70px" value="100">
            <input name="pricehidden_novat" type="hidden" value="100"> </div></td>
            </tr>
            <tr>
            <td width="36" style=" font-weight:bold; font-size:14px">
            <div>3. </div>
            <div>
            <button class="btn btn-danger" style="width:30px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4720"> ลบ </button> </div> </td>
            <td width="158"> <span style=" font-weight:bold; font-size:14px">20003</span><br>
            <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" style="width:60px; height:15px; font-size: 12px; padding:2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ส่วนลด </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (บาท)" data-name="ยำญวน (65.00)" data-iddiscount="2" data-id="4720" data-txtdiscount="0">บาท (฿)</button>
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (%)" data-name="ยำญวน (65.00)" data-iddiscount="1" data-id="4720" data-txtdiscount="0">%</button>
            </div>
            </div>
            </td>
            <td width="583">
            <div align="right" style=" font-weight:bold; font-size:14px">
            ยำญวน </div>
            <div align="right">
            65.00 <span name="changeprice" data="6"> <input name="price" type="hidden" value="65.00"></span>
            x
            <input name="amountproduct" type="number" size="3" onkeydown="if(event.key==='.'){event.preventDefault();}" value="1" data="6" dataid="4720" style="text-align:center ; width: 70px " tabindex="4">
            <input name="totalproduct" type="text" readonly="" style="text-align:right; width:70px" value="65">
            <input name="pricehidden_vat" type="hidden" value="65"> </div></td>
            </tr>
            <tr>
            <td width="36" style=" font-weight:bold; font-size:14px">
            <div>2. </div>
            <div>
            <button class="btn btn-danger" style="width:30px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4719"> ลบ </button> </div> </td>
            <td width="158"> <span style=" font-weight:bold; font-size:14px">30007</span><br>
            <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" style="width:60px; height:15px; font-size: 12px; padding:2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ส่วนลด </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (บาท)" data-name="น้ำพริกกะปิ (65.00)" data-iddiscount="2" data-id="4719" data-txtdiscount="0">บาท (฿)</button>
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (%)" data-name="น้ำพริกกะปิ (65.00)" data-iddiscount="1" data-id="4719" data-txtdiscount="0">%</button>
            </div>
            </div>
            </td>
            <td width="583">
            <div align="right" style=" font-weight:bold; font-size:14px">
            น้ำพริกกะปิ </div>
            <div align="right">
            65.00 <span name="changeprice" data="16"> <input name="price" type="hidden" value="65.00"></span>
            x
            <input name="amountproduct" type="number" size="3" onkeydown="if(event.key==='.'){event.preventDefault();}" value="2" data="16" dataid="4719" style="text-align:center ; width: 70px " tabindex="5">
            <input name="totalproduct" type="text" readonly="" style="text-align:right; width:70px" value="130">
            <input name="pricehidden_novat" type="hidden" value="130"> </div></td>
            </tr>
            <tr>
             <td width="36" style=" font-weight:bold; font-size:14px">
            <div>1. </div>
            <div>
            <button class="btn btn-danger" style="width:30px; height:15px; font-size: 12px; padding:2px;cursor:pointer;  " type="button" name="dellist" id="4718"> ลบ </button> </div> </td>
            <td width="158"> <span style=" font-weight:bold; font-size:14px">10006</span><br>
            <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" style="width:60px; height:15px; font-size: 12px; padding:2px;  " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ส่วนลด </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (บาท)" data-name="ข้าวกระเพราหมู (60.00)" data-iddiscount="2" data-id="4718" data-txtdiscount="0">บาท (฿)</button>
            <button class="dropdown-item" type="button" data-toggle="modal" style=" cursor:pointer" data-target="#modaldiscount" data-title="ลดราคา (%)" data-name="ข้าวกระเพราหมู (60.00)" data-iddiscount="1" data-id="4718" data-txtdiscount="0">%</button>
            </div>
            </div>
            </td>
            <td width="583">
            <div align="right" style=" font-weight:bold; font-size:14px">
            ข้าวกระเพราหมู </div>
            <div align="right">
            60.00 <span name="changeprice" data="2"> <input name="price" type="hidden" value="60.00"></span>
            x
            <input name="amountproduct" type="number" size="3" onkeydown="if(event.key==='.'){event.preventDefault();}" value="2" data="2" dataid="4718" style="text-align:center ; width: 70px " tabindex="6">
            <input name="totalproduct" type="text" readonly="" style="text-align:right; width:70px" value="120">
            <input name="pricehidden_novat" type="hidden" value="120"> </div></td>
            </tr>
            </tbody>
            <tfoot>
            </tfoot>
            </table>
            <input name="countitem" id="countitem" type="hidden" value="6">
            <input name="Score" id="Score" type="hidden" value="25">

            <div class="modal fade" id="modaldiscount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header  card-primary">
            <h6 class="modal-title" id="exampleModalLabel">ส่วนลด</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>
            <div class="modal-body">
            <table width="518" border="0" cellspacing="0" cellpadding="0">
            <tbody><tr>
            <td width="31%" height="40"><strong>รายการ
            <input type="hidden" name="iddiscount" value="" id="iddiscount">
            <input type="hidden" name="id" value="" id="id">
            <input type="hidden" name="Table_id" value="79 " id="Table_id">
            </strong></td>
            <td width="69%" id="name">&nbsp;</td>
            </tr>
            <tr>
            <td height="40"><strong>ส่วนลด</strong></td>
            <td><input name="txtdiscount" type="number" id="txtdiscount" style="width:150px" autofocus="" class="form-control"> </td>
            </tr>
            <tr>
            <td height="40">&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            </tbody></table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-primary" id="savediscount">บันทึก</button>
            </div>
            </div>
            </div>
            </div>

            </div>
</div>
</div>
</div>
<div class="col-sm-12 col-lg-12 alert alert-info" style="margin-top:20px">
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
</div>
</div>
</template>

<script>
export default {
    mounted() {

        }
}
</script>
