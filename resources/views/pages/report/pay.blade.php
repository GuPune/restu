@extends('layouts.admin')

@section('content')



<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header container-fluid">
                <div class="row">
                  <div class="col-md-10">
                    <h3 class="w-75 p-3">รายงานยอดประเภทชำระเงิน</h3>
                  </div>
                </div>
              </div>
          <div class="card-body">
            <form name="search" action="{{ route('reportpay') }}">
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">วันที่
                </label>
                <div class="col-sm-10">
                    <input name="inputdaterange" id="inputdaterange" style="width:180px" class="form-control" type="text" value="">

                </div>
                <div class="col-md-2 float-right">
                    <button type="submit" class="btn btn-success">
                        ค้นหา
                      </button>
                   </div>
              </div>
                </form>

            <div>
                <table class="table table-bordered yajra-datatable" style="text-align: center;">
                    <thead>
                    <tr>
                        <th>ลำดับ
                        </th>
                        <th>ชื่อ
                        </th>
                        <th>รูป
                        </th>
                        <th>จำนวนเงิน
                        </th>

                    </tr>
                    </thead>
                    <tbody>

                        @foreach($typebill as $k => $types)
                        <tr>
                            <td>
                            <div align="left">{{$k + 1}}</div>
                        </td>
                        <td>
                            <div align="left">
                             {{$types->name}}

                            </div>
                        </td>
                        <td class="text-center">
                            <img class="img-profile"
                            src="/public/product/{{$types->images}}" width="150" height="100">
                        </td>
                        <td>
                            <div align="left">{{$types->total}}</div>
                        </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
          </div>
        </div>
      </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script>



$('input[name="inputdaterange"]').daterangepicker({
    locale: {
        format: 'YYYY-MM-DD' // --------Here
    },

});

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


