@extends('layouts.admin')

@section('content')





  <div class="row">
    <div class="card">
        <div class="card-header card-inverse card-primary">
        <h5><span style="float: left">สรุปรายรับรายจ่าย (รายวัน)</span> </h5>
        </div>
        <div class="card-body" style="padding:5px">
        <div class="col-sm-12 col-md-12">
        <div class="card card-accent-primary ">
        <div class="card-header">
        <strong> ค้นหา</strong>
        </div>
        <div class="row" style="padding:5px">
        <div class="col-md-5" align="left">
            <form name="search" action="{{ route('reportday') }}">

        <div class="card-block">
        <div class="form-group row">
        <label class="col-md-3 form-control-label" for="email-input">ปี</label>
        <div class="col-md-9">

        </div>
        </div>
        <div class="form-group row">
        <label class="col-md-3 form-control-label" for="email-input">เดือน</label>
        <div class="col-md-9">
        <select name="txtmonth" id="txtmonth" class="form-control" style="width:200px">

     </select>
        </div>
        </div>
        </div>
        <div class="form-group row">
        <label class="col-md-3 form-control-label"> </label>
        <div class="col-md-9">
        <input name="" class="btn btn-primary" id="search" type="submit" value="ค้นหา">
        </div>
        </div>
        </form>
    </div>
        </div>
        </div>
        </div>
        {{-- <span style="float: right"><a href="report/733.php?txtyear=&amp;txtmonth=&amp;Shop_id=43" class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i> ดาวน์โหลดข้อมูลไฟล์ Excel</a>&nbsp;&nbsp;&nbsp;&nbsp;</span><br> --}}

        <span style="float: right"><a  href="export/"  class="btn btn-info"><i class="fa fa-file-excel-o" aria-hidden="true"></i> ดาวน์โหลดข้อมูลไฟล์ Excel</a>&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        <br>
        <div id="Thisprint">
        <strong>สรุปรายรับรายจ่าย (รายวัน)</strong>
        <table width="100%" class="table table-hover" id="example2" style=" margin-top:10px">
        <thead>
        <tr>
        <th width="885"><div align="left">วันที่</div></th>

        <th width="585" align="center"><div align="right">รายรับ</div></th>
        </tr>
        </thead>
         <tbody>



        <tr>
        <td><div align="right" style="font-weight: bold">รวม</div></td>
        <td><div align="right" style="font-weight: bold"></div></td>
        </tr>
        </tbody>
        <tfoot>
        </tfoot>
        </table>
        </div></div></div>
  </div>





  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .checked {
  color: orange;
}
    .switch {
  position: relative;
  display: inline-block;
  width: 45px;
  height: 20px;
  vertical-align: middle;
  margin-top: 8px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #A1A6AB;
  -webkit-transition: .4s;
  transition: .4s;

}

.slider:before {
  position: absolute;
  content: "";
 height: 16px;
width: 14px;
left: 2px;
bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #800080;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}
/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}

    </style>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
  <script>

var $link = "<?php echo url('/public/product/'); ?>";
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

        var searchData = {};

        var table = $('.yajra-datatable').DataTable({});


















    </script>







@endsection


