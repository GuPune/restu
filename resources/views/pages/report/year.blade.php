@extends('layouts.admin')

@section('content')




<div class="card">
    <div>
        <div class="card-body">
        <table class="table table-bordered yajra-datatable" style="text-align: center;">
            <thead>
            <tr>
                <th>ปี
                </th>
                <th>Jan
                </th>
                <th>Feb
                </th>
                <th>Mar
                </th>
                <th>Apr
                </th>
                <th>May
                </th>
                <th>Jun
                </th>
                <th>Jul
                </th>
                <th>Aug
                </th>
                <th>Sep
                </th>
                <th>Oct
                </th>
                <th>Nov
                </th>
                <th>Dec
                </th>

            </tr>
            </thead>
            <tbody>

                @foreach($year as $k => $years)
                <tr>
                <td>
                    <div align="left">{{$years->year}}</div>
                </td>

                <td>
                    <div align="left">
                        @if ($years->Jan === null)
                        {{'0'}}

                        @else
                        {{$years->Jan}}
                        @endif
                       </div>
                </td>
                <td>
                    <div align="left">
                        @if ($years->Feb === null)
                        {{'0'}}
                        @else
                        {{$years->Feb}}
                        @endif
                        </div>
                </td>
                <td>
                    <div align="left">


                        @if ($years->Mar === null)
                        {{'0'}}
                        @else
                        {{$years->Mar}}
                        @endif

                    </div>
                </td>
                <td>
                    <div align="left">
                        @if ($years->Apr === null)
                        {{'0'}}
                        @else
                        {{$years->Apr}}
                        @endif
                    </div>
                </td>
                <td>
                    <div align="left">
                        @if ($years->May === null)
                        {{'0'}}
                        @else
                        {{$years->May}}
                        @endif
                    </div>
                </td>
                <td>
                    <div align="left">{{$years->Jun}}
                        @if ($years->Jun === null)
                        {{'0'}}
                        @else
                        {{$years->Jun}}
                        @endif
                    </div>
                </td>
                <td>
                    <div align="left">
                        @if ($years->Jul === null)
                        {{'0'}}
                        @else
                        {{$years->Jul}}
                        @endif
                    </div>
                </td>
                <td>
                    <div align="left">

                        @if ($years->Aug === null)
                        {{'0'}}
                        @else
                        {{$years->Aug}}
                        @endif
                    </div>
                </td>
                <td>
                    <div align="left">
                        @if ($years->Sep === null)
                        {{'0'}}
                        @else
                        {{$years->Sep}}
                        @endif
                    </div>
                </td>
                <td>
                    <div align="left">
                        @if ($years->Oct === null)
                        {{'0'}}
                        @else
                        {{$years->Oct}}
                        @endif
                    </div>
                </td>
                <td>
                    <div align="left">
                        @if ($years->Nov === null)
                        {{'0'}}
                        @else
                        {{$years->Nov}}
                        @endif
                    </div>
                </td>

                <td>
                    <div align="left">
                        @if ($years->Dec === null)
                        {{'0'}}
                        @else
                        {{$years->Dec}}
                        @endif
                    </div>
                </td>

                </tr>
                @endforeach

            </tbody>
        </table>
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


