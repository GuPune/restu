@extends('layouts.admin')

@section('content')





  <div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header container-fluid">
                <div class="row">
                  <div class="col-md-10">
                    <h3 class="w-75 p-3">คะแนนรีวิว</h3>
                  </div>

                </div>
              </div>
          <div class="card-body">
            <div>
                <table class="table table-bordered yajra-datatable" style="text-align: center;">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อโต๊ะ</th>
                        <th>เลขบิล</th>
                        <th>คะแนน</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($rating as $key => $ratings)

                        <tr >
                            <td>{{$key+1}}</td>
                            <td>{{$ratings->number_toe}}</td>
                            <td>{{$ratings->qr_code}}</td>
                            <td>

                                @for ($i = 0; $i < $ratings->rating; $i++)
                                <span class="fa fa-star"></span>
                                @endfor
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


