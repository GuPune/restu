@extends('layouts.admin')

@section('content')





  <div class="row">
    <div class="col-sm-12 col-md-12" style="margin-top:5px">
      <div align="right">

      <button class="btn btn-danger" name="cancel" type="button" onclick="goBack()"><i class="fa fa-trash-o" aria-hidden="true"></i> กลับ</button>
      </div>
      <div>
      <div class="col-sm-12 col-md-12">
      <div class="card card-accent-primary " style="margin-top:10px" id="printThissale">
      <link href="css/style.css" rel="stylesheet">
      <style>
              @media print {
                  html,body{padding-left:0px}
                  * {-webkit-print-color-adjust:exact;}
                  #printSection {
                  font-family:"Sarabun";
                  font-size:12px;
                  position:absolute;
                  left:30px;
                  padding-top:50px;
                  padding-right:30px;
                }
              }

          .border {
          border:#333333 1px solid;
          }


      </style>
      <div id="Thisprintdiv">
      <div class="card-header">
      <strong>ข้อมูลการขาย</strong> (สถานะ: ปกติ)</div>
      <form name="savereture" enctype="multipart/form-data"><input name="code" type="hidden" value="">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
      <tbody><tr>
      <td width="46%"><strong>เลขที่บิล :</strong>  {{$bill->bill_number}}</td>
      <td width="54%"><strong>วันที่ขาย :</strong>  {{$bill->created_at}} </td>
      </tr>
      <tr>
      <td><strong>ประเภทการขาย :</strong> อาหาร</td>
      <td><strong>ลูกค้า :</strong> ทั่วไป</td>
      </tr>
      <tr>
      <td><strong>การชำระเงิน :</strong>
        @if($bill->type_pay =='1')
         <span>เงินสด</span>
         @elseif($bill->type_pay =='2')
         <span>พร้อมเพย์</span>
         @else
         <span>เงินโอน</span>
      @endif

        </td>
      <td><strong>ที่อยู่ : </strong> ไม่ระบุ </td>
      </tr>
      <tr>
      <td> <strong>ข้อมูลภาษี :</strong> ไม่มี vat.</td>
      <td><strong>พนักงานทำรายการ:</strong> ไม่มี </td>
      </tr>
      <tr>
      <td><strong>ยอดที่ชำระ : </strong> {{$bill->pricetotal}}.00 บาท</td>
      <td><strong>ค้างชำระ : </strong> 0.00 บาท</td>
      </tr>
      </tbody></table>
      <table width="770" border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
      <tbody><tr>
      <td width="87" height="30" bgcolor="#999999">
      <div align="center"><strong>ลำดับที่ </strong></div></td>
      <td width="321" height="30" bgcolor="#999999" class="border">
        <div align="center"><strong>คำอธิบาย </strong></div></td>
      <td width="124" height="30" bgcolor="#999999">
      <div align="center"><strong>จำนวน </strong></div></td>
      <td width="115" height="30" bgcolor="#999999"><div align="center"><strong>ราคาต่อหน่วย </strong></div></td>
      <td width="115" height="30" bgcolor="#999999"><div align="center"><strong>ส่วนลด </strong></div></td>
      <td width="116" bgcolor="#999999" class="border"><div align="center"><strong>รวมเงิน </strong></div></td>
      </tr>
      @foreach($order as $key => $datas)
      <tr>
      <td height="25" valign="top"><div align="center">{{$key +1}}</div></td>
      <td height="25" valign="top" style="padding-left:5px; padding-right:2px ">{{$datas->name_list}}</td>
      <td height="25" valign="top"><div align="center">{{$datas->quantity}}</div></td>
      <td height="25" valign="top">
      <div align="center">{{$datas->price_sell}}.00</div> <div align="right"></div></td>
      <td height="25" valign="top">
        <div align="center">{{$datas->discount}}.00</div> <div align="right"></div></td>
      <td height="25" valign="top" style="padding-right:5px;"><div align="right">
        {{$datas->total_price}}.00 </div></td>
      </tr>
      @endforeach
      <tr>
      <td colspan="3" rowspan="3" valign="top" class="border" style="padding-right:5px">&nbsp;</td>
      <td height="30" colspan="2" style="padding-right:5px; border-top:#000000 1px solid"><div align="right">รวมเงิน / Total </div></td>
      <td class="border" style="padding-right:5px"><div align="right"><strong>{{$bill->total}}.00</strong></div></td>
      </tr>
      <tr>
      <td height="30" colspan="2" style="padding-right:5px"><div align="right">ส่วนลดท้ายบิล / Discount </div></td>
      <td class="border" style="padding-right:5px"><div align="right"><strong>{{$bill->pricediscount}}.00</strong></div></td>
      </tr>
      <tr>
      <td height="30" colspan="2" style="padding-right:5px"><div align="right">แลกคะแนนสะสม
      -
      คะแนน </div></td>
      <td class="border" style="padding-right:5px"><div align="right"><strong>0.00</strong></div></td>
      </tr>
      <tr>
      <td height="30" colspan="3" bgcolor="#CCCCCC" class="border" style="padding-right:5px; padding-left:20px"></td>
      <td height="30" colspan="2" style="padding-right:5px"><div align="right">จำนวนเงินทั้งสิ้น </div></td>
      <td class="border" style="padding-right:5px"><div align="right"><strong>{{$bill->pricetotal}}.00</strong></div></td>
      </tr>
      <tr>
      <td height="30" colspan="5" class="border" style="padding-right:5px; padding-left:20px">คะแนนสะสม: 0</td>
      </tr>
      </tbody></table>
      </form>
      </div>
      </div>
      </div>

      <div class="modal fade" id="PrintModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="width:320px;">
      <div class="modal-content">
      <div class="modal-header  card-primary">
      <h5 class="modal-title" id="exampleModalLabel">พิมพ์ใบเสร็จ</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
      </button>
      </div>
      <div class="modal-body" id="printThis">
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      <button type="button" class="btn btn-primary" id="btnPrints">พิมพ์</button>
      </div>
      </div>
      </div>
      </div>
      <div class="modal fade" id="ModalPage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg1000" role="document">
      <div class="modal-content">
      <div class="modal-header  card-primary">
      <h5 class="modal-title" id="exampleModalLabel"></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
      </button>
      </div>
      <div class="modal-body" id="loadpage">
      </div>
      </div>
      </div>
      </div>
      <div class="modal fade" id="PassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header  card-primary">
      <h5 class="modal-title" id="exampleModalLabel">ยืนยันยกเลิกการขาย</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
      </button>
      </div>
      <div class="modal-body">
      <form enctype="multipart/form-data" name="add" id="add">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-striped" id="ProductDesc">
      <tbody><tr>
      <td width="35%" height="30">รหัสผ่าน
      </td>
      <td width="65%"><input type="password" name="Password" id="Password" class="form-control" autofocus="">
      <input name="ref_id" type="hidden" id="ref_id" value=""></td>
      </tr>
      </tbody></table>
      </form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      <button type="button" class="btn btn-primary" name="sent_add" id="sent_add" data-dismiss="modal">ยืนยัน</button>
      </div>
      </div>
      </div>
      </div>
      <iframe id="loadarea1672067362" style="display:none;"></iframe>

      <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe></div></div>


      <div class="card">
        <div class="card-block">
        <div class="row">
        <div class="col-8">
        <h4 class="card-title">ยอดขายวันนี้</h4>
        <p class="text-muted">&nbsp;วันจันทร์ที่ 26 เดือนธันวาคม พ.ศ.2565</p>
        <br>
        <div class="col-sm-4" style="float:left">
        <div class="card">
        <div class="card-block">
        <div class="h1 text-muted text-right mb-2">
        <i class="fa fa-usd"></i>
        </div>
        <div class="h4 mb-0">0.00</div>
        <small class="text-muted text-uppercase font-weight-bold">รายได้</small>
        <div class="progress progress-xs mt-1 mb-0">
        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        </div>

        <div class="col-sm-4" style="float:left">
        <div class="card">
        <div class="card-block">
        <div class="h1 text-muted text-right mb-2">
        <i class="fa fa-cart-plus"></i>
        </div>
        <div class="h4 mb-0">0</div>
        <small class="text-muted text-uppercase font-weight-bold">จำนวนครั้งที่ขาย</small>
        <div class="progress progress-xs mt-1 mb-0">
        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        </div>

        <div class="col-sm-4" style="float:left">
        <div class="card">
        <div class="card-block">
        <div class="h1 text-muted text-right mb-2">
        <i class="fa fa-cubes"></i>
        </div>
        <div class="h4 mb-0">0</div>
        <small class="text-muted text-uppercase font-weight-bold">จำนวนรายการที่ขาย</small>
        <div class="progress progress-xs mt-1 mb-0">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        </div>
        <h4 class="card-title">ยอดขาย 7 วันย้อนหลัง</h4>
        <br>
        <div class="col-sm-4" style="float:left">
        <div class="card">
        <div class="card-block">
        <div class="h1 text-muted text-right mb-2">
        <i class="fa fa-usd"></i>
        </div>
        <div class="h4 mb-0">0.00</div>
        <small class="text-muted text-uppercase font-weight-bold">รายได้</small>
        <div class="progress progress-xs mt-1 mb-0">
        <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        </div>

        <div class="col-sm-4" style="float:left">
        <div class="card">
        <div class="card-block">
        <div class="h1 text-muted text-right mb-2">
        <i class="fa fa-cart-plus"></i>
        </div>
        <div class="h4 mb-0">0</div>
        <small class="text-muted text-uppercase font-weight-bold">จำนวนครั้งที่ขาย</small>
        <div class="progress progress-xs mt-1 mb-0">
        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        </div>

        <div class="col-sm-4" style="float:left">
        <div class="card">
        <div class="card-block">
        <div class="h1 text-muted text-right mb-2">
        <i class="fa fa-cubes"></i>
        </div>
        <div class="h4 mb-0">0</div>
        <small class="text-muted text-uppercase font-weight-bold">จำนวนรายการที่ขาย</small>
        <div class="progress progress-xs mt-1 mb-0">
        <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="col-4">
        <h4 class="card-title">สินค้าขายดี 7 วันย้อนหลัง </h4>
        </div>
        </div>
        </div>
        </div>
  </div>


  <style type="text/css">
.btnx {
    display: inline-block;
    font-weight: 400;
    color: #001737;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    font-size: 0.875rem;
    line-height: 1;
    border-radius: 0.1875rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.delmdi{
    color: red;
}
.editmdi{
    color: rgb(255, 187, 0);
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


  <script>

function goBack() {
  window.history.back();
}

    </script>







@endsection


