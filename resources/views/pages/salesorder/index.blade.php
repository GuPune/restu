@extends('layouts.admin')

@section('content')





  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">รายการขาย</div>
          <div class="card-body">
            <form name="search">
                <input type="hidden" name="id" id="id" />
                <input name="svalue" type="hidden" value="1">
                <div class="card-block">
                <div class="form-group row">
                <label class="col-md-2 form-control-label" for="Number">เลขที่บิล</label>
                <div class="col-md-3">
                <input type="text" id="billNumber" value="" name="billNumber" class="form-control" style="width:180px">
                </div>
                <div class="col-md-4">
                {{-- <span style="float:right"><a href="product/history_excel.php?date=23/12/2022-26/12/2022&amp;c=&amp;b=&amp;r=&amp;p=&amp;s=&amp;txtsearch=" class="btn btn-info" target="_blank"><i class="fa fa-file-excel-o" aria-hidden="true"></i> ดาวน์โหลดข้อมูลไฟล์ Excel</a></span> --}}
                </div>
                </div>
                <div class="form-group row">
                <label class="col-md-2 form-control-label" for="email-input">วันที่ทำรายการ</label>
                <div class="col-md-3">
                <input name="inputdaterange" id="inputdaterange" style="width:180px" class="form-control" type="text" value="">
                </div>
                <label class="col-md-1 form-control-label" for="email-input">สถานะ</label>
                <div class="col-md-2">
                <select name="status" class="form-control" id="status" style="width:180px">
                <option value="">ทั้งหมด</option>
                <option value="C">ยกเลิกรายการ</option>
                <option value="S">ชำระแล้ว</option>
                </select>
                </div>

                </div>
                <div class="form-group row">
                    <label class="col-md-2 form-control-label" for="email-input">ประเภทการชำระเงิน</label>
                    <div class="col-md-2">
                    <select name="type_pay" class="form-control" id="type_pay" style="width:180px">
                    <option value="">ทั้งหมด</option>
                    <option value="1">เงินสด </option><option value="2">พร้อมเพย์ </option><option value="3">เงินโอน </option> </select>
                    </div>
                <label class="col-md-3 form-control-label"> </label>
                <div class="col-md-9">

                <input name="search" class="btn btn-primary" id="search" type="button" value="ค้นหา"  onclick="fitter();">
                </div>
                </div>
                </div>
                </form>
            <div class="table-responsive pt-3">
                <table width="100%" class="table table-striped table-hover table-bordered yajra-datatable">
                    <thead>
                    <tr>
                    <th width="142" bgcolor="#CCCCCC"><div align="center">เลขที่บิล</div></th>
                    <th width="113" bgcolor="#CCCCCC"><div align="right">จำนวน(ชิ้น)</div></th>
                    <th width="128" bgcolor="#CCCCCC"><div align="right">การชำระ</div></th>
                    <th width="133" bgcolor="#CCCCCC"><div align="right">จำนวนเงิน</div></th>
                    <th width="150" align="center" bgcolor="#CCCCCC"><div align="right">ส่วนลด</div></th>
                    <th width="116" align="center" bgcolor="#CCCCCC"><div align="right">เงินสุทธิ</div></th>
                    <th width="103" align="center" bgcolor="#CCCCCC"><div align="right">รับเงิน</div></th>
                    <th width="152" align="center" bgcolor="#CCCCCC"><div align="right">เงินทอน</div></th>
                    <th width="176" bgcolor="#CCCCCC"><div align="center"></div></th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    </tfoot>
                    </table>

            </div>
          </div>
        </div>
      </div>


      <div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 col-md-12" style="margin-top:5px">

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

                    <tbody>
                        <tr>
                    <td width="46%"><strong>เลขที่การขาย :</strong> 202212000898</td>
                    <td width="54%"><strong>วันที่ขาย :</strong> 15/12/2565 </td>
                    </tr>
                    <tr>
                    <td><strong>ประเภทการขาย :</strong> ขายปลีก</td>
                    <td><strong>ลูกค้า :</strong> ทั่วไป</td>
                    </tr>
                    <tr>
                    <td><strong>การชำระเงิน :</strong> เงินสด</td>
                    <td><strong>ที่อยู่ : </strong> ไม่ระบุ </td>
                    </tr>
                    <tr>
                    <td> <strong>ข้อมูลภาษี :</strong> ไม่มี vat.</td>
                    <td><strong>พนักงานทำรายการ:</strong> demo1 </td>
                    </tr>
                    <tr>
                    <td><strong>ยอดที่ชำระ : </strong> 130.00 บาท</td>
                    <td><strong>ค้างชำระ : </strong> 0.00 บาท</td>
                    </tr>
                    </tbody>
                </table>
                    <table id="mySear"  border="0" cellspacing="0" cellpadding="0" class="table table-bordered">
                        <thead>
                            <tr>
                            <th width="142" bgcolor="#CCCCCC"><div align="center">ลำดับที่
                            </div></th>
                            <th width="113" bgcolor="#CCCCCC"><div align="right">คำอธิบาย </div></th>
                            <th width="128" bgcolor="#CCCCCC"><div align="right">จำนวน
                            </div></th>
                            <th width="133" bgcolor="#CCCCCC"><div align="right">ราคาต่อหน่วย
                            </div></th>
                            <th width="150" align="center" bgcolor="#CCCCCC"><div align="right">ส่วนลด</div></th>
                            <th width="116" align="center" bgcolor="#CCCCCC"><div align="right">เงินสุทธิ</div></th>


                            </tr>
                            </thead>
                    <tbody>
                        <tr>
                    <td width="87" height="30" bgcolor="#999999">
                    <div align="center"><strong>ลำดับที่ </strong></div></td><td width="321" height="30" bgcolor="#999999" class="border">
                        <div align="center"
                        ><strong>คำอธิบาย </strong>
                    </div>
                </td>
                    <td width="124" height="30" bgcolor="#999999">
                    <div align="center"><strong>จำนวน </strong></div></td>
                    <td width="115" height="30" bgcolor="#999999"><div align="center"><strong>ราคาต่อหน่วย </strong></div></td>
                    <td width="116" bgcolor="#999999" class="border"><div align="center"><strong>รวมเงิน </strong></div></td>
                    </tr>
                    <tr>
                    <td height="25" valign="top"><div align="center">1</div></td>
                    <td height="25" valign="top" style="padding-left:5px; padding-right:2px ">ยำเขมร</td>
                    <td height="25" valign="top"><div align="center">2</div></td>
                    <td height="25" valign="top">
                    <div align="center">65.00</div> <div align="right"></div></td>
                    <td height="25" valign="top" style="padding-right:5px;"><div align="right">
                    130.00 </div></td>
                    </tr>
                    <tr>
                    <td colspan="2" rowspan="3" valign="top" class="border" style="padding-right:5px">&nbsp;</td>
                    <td height="30" colspan="2" style="padding-right:5px; border-top:#000000 1px solid"><div align="right">รวมเงิน / Total </div></td>
                    <td class="border" style="padding-right:5px"><div align="right"><strong>130.00</strong></div></td>
                    </tr>
                    <tr>
                    <td height="30" colspan="2" style="padding-right:5px"><div align="right">ส่วนลดท้ายบิล / Discount </div></td>
                    <td class="border" style="padding-right:5px"><div align="right"><strong>0.00</strong></div></td>
                    </tr>
                    <tr>
                    <td height="30" colspan="2" style="padding-right:5px"><div align="right">แลกคะแนนสะสม
                    -
                    คะแนน </div></td>
                    <td class="border" style="padding-right:5px"><div align="right"><strong>0.00</strong></div></td>
                    </tr>
                    <tr>
                    <td height="30" colspan="2" bgcolor="#CCCCCC" class="border" style="padding-right:5px; padding-left:20px">ตัวอักษร TEXT : หนึ่งร้อยสามสิบบาทถ้วน</td>
                    <td height="30" colspan="2" style="padding-right:5px"><div align="right">จำนวนเงินทั้งสิ้น / Grand Total</div></td>
                    <td class="border" style="padding-right:5px"><div align="right"><strong>130.00</strong></div></td>
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
                    <iframe id="loadarea1672048301" style="display:none;"></iframe>

                    <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe></div></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Modalclose('i');">Close</button>
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


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <script>



  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


  var searchData = {};

var table = $('.yajra-datatable').DataTable({
processing: true,
serverSide: true,
ajax: {
url:  "{!! route('saleorder.data') !!}",
method: 'POST',
data: RefreshTable,
},
columns: [
{data: 'bill_number'},
{data: 'qty'},
{data: 'type_pay'},
{data: 'total'},
{data: 'pricediscount'},
{data: 'pricetotal'},
{data: 'get_paid'},
{data: 'accept_change'},
{data: 'action', name: 'action', orderable:false, serachable:false},

],catch (Error) {
        if (typeof console != "undefined") {
            console.log(Error);
        }
},
columnDefs: [{
        targets: [0,2,8],
    },
    {
                    targets: 0,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {

                        if(row.status == 'S'){
                            var btnDetail = '<label for="css">'+row.bill_number+'</label><br><label for="css" style="font-size: 10px;">'+row.day_fort+'<a role="button" class="btn btn-info btn-sm"> ชำระ</a>'

                        }else{
                            var btnDetail = '<label for="css">'+row.bill_number+'</label><br><label for="css" style="font-size: 10px;">'+row.day_fort+'</label><a role="button" class="btn btn-danger btn-sm"> ยกเลิก</a>'
                        }


                        return btnDetail;
                    }
                },
    {
                    targets: 2,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {

                        if(row.type_pay == '1'){
                            var btnDetail = 'เงินสด'

                        }else if(row.type_pay == '2'){
                            var btnDetail = 'พร้อมเพย์'

                        }else{
                            var btnDetail = 'โอนเงิน'
                        }

                        return btnDetail;
                    }
                },
    {
                    targets: 8,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        var dataid = row.id;

                       var btnDetail = '<a role="button" href="/admin/salesorder/'+dataid+'" class="btn btn-outline-primary btn-sm" data-id="'+dataid+'"><i class="typcn typcn-globe-outline menu-icon"></i> ดูรายละเอียด</a> ';
                        return btnDetail;
                    }
                },

]


});


  function RefreshTable(data) {
data._token = "{{ csrf_token() }}";
data.typepay = $('select[name=type_pay]').val();
data.status = $('select[name=status]').val();
data.billnumber = $('input[name=billNumber]').val();
data.inputdaterange = $('input[name=inputdaterange]').val();
return data;
}

function RefreshTablex(data) {

data._token = "{{ csrf_token() }}";
data.typepay = $('select[name=type_pay]').val();
data.id = $('input[name=id]').val();

console.log(data);

return data;
}

function reloadData() {

table.ajax.reload(null, false);
}

function fitter() {
table.ajax.reload(null, false);
}


$('input[name="inputdaterange"]').daterangepicker();


$('body').on('click', '.btn-show-modal', function (e) {
    var id = $(this).attr('data-id');
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

    $("#myModal").modal("show");
});

function Modalclose(id) {
    $('#myModal').modal('hide');

  //  $('#myModal').modal('hide');
}

    </script>







@endsection


