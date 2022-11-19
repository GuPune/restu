@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


@foreach ($item as $key => $node)

<div class="row">
    <div class="col-sm-12">
      <h3 class="mb-0 font-weight-bold">{{$node->name}}</h3>
    </div>
</div>
  <div class="row pt-2 pb-4">
    @foreach ($node->toe as $index => $toes)
    <div class="col-sm-3 col-lg-2" style="float:left;" name="product" id="77">

        <div class="card"
        @if ($toes->orderstatus == 'idle')
        style="background-color: #22F805;"
            @elseif($toes->orderstatus == 'notidle')
        style="background-color: #F81F05;"
        @elseif($toes->orderstatus == 'call')
        style="background-color: #F81F05;"
        @elseif($toes->orderstatus == 'request')
        style="background-color: #F8C105;"
        @else
        style="background-color: #A005F8;"
        @endif
        >
            <div class="card-body">
                <div class="text-muted text-right mb-2">
                    <i class="fa fa-home fa-3x"></i>
                </div>
              <h1 class="card-title">{{$toes->number_toe}}</h1>
              <p class="card-text">จำนวนที่นั้ง {{$toes->number_sit}} </p>
            </div>
            <div class="card-footer bg-transparent">

                @if ($toes->orderstatus == 'idle')
                สถานะ : ว่าง
                    @elseif($toes->orderstatus == 'notidle')
                    สถานะ : ไม่ว่าง
                @elseif($toes->orderstatus == 'call')
                สถานะ : เรียกพนักงาน
                @elseif($toes->orderstatus == 'request')
                สถานะ : ร้องขอ
                @else
                สถานะ : เช็คบิล
                @endif

            </div>
          </div>
    </div>
    @endforeach




</div>



@endforeach



<style>
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
        url:  "{!! route('toeitem.data') !!}",
        method: 'POST',
        data: RefreshTable,
    },
    columns: [
        {data: 'id'},
        {data: 'number_toe'},
        {data: 'number_sit'},
        {data: 'name'},
        {data: 'status'},
        {data: 'action', name: 'action', orderable:false, serachable:false},

    ],catch (Error) {
                if (typeof console != "undefined") {
                    console.log(Error);
                }
    },
    columnDefs: [{
                targets: [0,5],
            },

            {
                    targets: 4,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {

                        var dataid = row.id;
                        if(row.status == 'Y'){
                            var a = 'A';
                            var btnEdit = '<label class="switch"><input type="checkbox" checked onclick="onClickClose('+dataid +')"><span class="slider round"></span></label>';

                        }else {
                            var a = 'B';
                            var btnEdit = '<label class="switch"><input type="checkbox" onclick="onClickOpen('+dataid+ ')"><span class="slider round"></span></label>';

                        }

                         return btnEdit;
                    }
                },

            {
                    targets: 5,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {
                        var dataName = row.name_en;
                        var dataid = row.id;
                        var btnEdit = '<button type="button" class="btn btn-outline-warning btn-sm btn-show-modal" data-toggle="modal" data-id="'+dataid+'"  class="btn-modal">แก้ไข</button>';
                        var btnDel = '<button type="button" class="btn btn-outline-warning btn-sm save-delete" data-toggle="modal" data-id="'+dataid+'"   class="btn-modal">ลบ</button>';

                         return btnEdit + btnDel;
                    }
                },
        ]


});


function RefreshTable(data) {


    data._token = "{{ csrf_token() }}";
            return data;

}

function reloadData() {

table.ajax.reload(null, false);
}

function fitter() {

table.ajax.reload(null, false);
}



function onClickClose(id){

    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });

                $.ajax({
                    dataType: 'json',
                    type:'POST',

                    data:{
                        '_token': "{{ csrf_token() }}",
                        id:id},
                    url: '/admin/toe/close',
                    success: function(datas){
                //      swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

                    }
                })


                const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);

     }





     function onClickOpen(id){

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

            $.ajax({
                dataType: 'json',
                type:'POST',

                data:{
                    '_token': "{{ csrf_token() }}",
                    id:id},
                url: '/admin/toe/open',
                success: function(datas){
              //    swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

                }
            })


            const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);



 }


 function onClickEdit(id){



 }



 $('body').on('click', '.save-update', function (e) {


    var number_toe = $('#editnumber_toe').val();
    var number_sit = $('#editnumber_sit').val();
    var zone_id = $('#editzone_id').val();
    var id = $('#editid').val();

    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    dataType: 'json',
                    type: "PUT",
                    data:{
                                '_token': "{{ csrf_token() }}",
                                id:id,number_toe:number_toe,number_sit:number_sit,zone_id:zone_id},
                    url: "/admin/toe/"  + id,
                    success: function(datas){

$('#editmyModal').modal('hide');


const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);
                    }
                })

});




$('body').on('click', '.save-add', function (e) {


var number_toe = $('#number_toe').val();
var number_sit = $('#number_sit').val();
var zone_id = $('#zone_id').val();

$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                type: "POST",
                data:{
                            '_token': "{{ csrf_token() }}",
                            number_toe:number_toe,number_sit:number_sit,zone_id:zone_id},
                url: "/admin/toe",
                success: function(datas){

      swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");



      const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);

$('#myModal').modal('hide');

                }


            })

});


$('body').on('click', '.save-delete', function (e) {


    var id = $(this).attr("data-id");



$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                dataType: 'json',
                type: 'DELETE',
                data:{
                            '_token': "{{ csrf_token() }}",
                            id:id},
                url: "/admin/toe/" + id,
                success: function(datas){

      swal("ลบสำเร็จ!", "ลบสำเร็จ!", "success");



      const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);


                }


            })

});





 $('body').on('click', '.btn-show-modal', function (e) {


    var id = $(this).attr("data-id");




$.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    dataType: 'json',
                    type: "GET",
                    url: "/admin/toe/" + id +"/edit",
                    success: function(datas){

var number_toe = $('#editnumber_toe').val(datas.number_toe);
var number_sit = $('#editnumber_sit').val(datas.number_sit);
var id = $('#editid').val(datas.id);
var zone = $('#editzone_id').val(datas.zone_id);

$("#editmyModal").modal('show');
                    }
                })

});



    </script>







@endsection


