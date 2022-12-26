@extends('layouts.admin')

@section('content')





<div class="row">
  <div class="col-lg-9">
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
  <br>
  </div>
  </div>
  </div>
  </div>

  </div>

  <div class="col-lg-3">
  <div class="card">
  <div class="card-block">
  <h4 class="card-title">ระยะเวลาการใช้งานระบบ</h4>
  <p class="text-muted">ลงทะเบียนเข้าใช้ : 09/05/2562 </p>
  <p class="text-muted">หมดอายุ: 24/05/2568 </p>
  <br>
  <div align="center">
  <font color="#006600" size="38">คงเหลือ<br>
  880 วัน</font>
  </div>
  </div>
  </div>
  <div class="card">
  <div class="card-block">
  <h6 class="card-title">ทำรายการขายต่อเดือน</h6>
  <div align="center">
  <font color="#FF0000" size="9">
  11</font> <font color="#666666" size="6">/1,000,000 </font>
  </div>
  </div>
  </div>
  <div class="card">
  <div class="card-block"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; inset: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
  <h4 class="card-title">รายรับรายจ่าย</h4>
  <canvas id="canvas-2" align="center" width="344" height="344" style="display: block; width: 344px; height: 344px;"></canvas>
  <br>
  </div>
  </div>
  <div class="card">
  <div class="card-block">
  <h6 class="card-title"><strong>สินค้าใกล้หมด </strong> </h6> อ้างอิงข้อมูลต่ำกว่าสินค้าที่ต้องการ เมนู E42
  <div align="center">
  <table width="387" class="table table-bordered table-hover" id="example2">
  <thead>
  <tr>
  <th width="301">รายการสินค้า</th>
  <th width="92"><div align="center">สต๊อค</div></th>
  </tr>
  </thead>
  <tbody>
  <tr>
  <td>นมชมพู</td>
  <td>
  <div align="center">
  0 </div></td>
  </tr>
  </tbody>
  </table>
  </div>
  </div>
  </div>
  </div>

  </div>

  <style type="text/css">

.card-block {
    flex: 1 1 auto;
    padding: 1.25rem;
}

.text-muted {
    color: #c0cadd!important;
}
.text-right {
    text-align: right!important;
}
.card-title {
    margin-bottom: 0.75rem;
}
.card {
    margin-bottom: 1.5rem;
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
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

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
                        return '<label for="css">'+row.bill_number+'</label><br><label for="css" style="font-size: 10px;">'+row.day_fort+'</label>';
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


