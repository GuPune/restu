@extends('layouts.admin')

@section('content')





  <div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header container-fluid">
                <div class="row">
                  <div class="col-md-10">
                    <h3 class="w-75 p-3">รายการโต๊ะนั่ง</h3>
                  </div>
                  <div class="col-md-2 float-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        เพิ่มรายการโต๊ะนั่ง
                      </button>
                   </div>
                </div>
              </div>
          <div class="card-body">
            <div>
                <table class="table table-bordered yajra-datatable" style="text-align: center;">
                    <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>โต๊ะ</th>
                        <th>จำนวนที่นั้ง</th>
                        <th>สถานะ</th>
                        <th>จัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

            </div>
          </div>
        </div>
      </div>
  </div>




  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">เพิ่มหมวดหมู่</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">ชื่อโต๊:</label>
                <input type="text" class="form-control" id="number_toe" name="number_toe">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">จำนวนที่นั้ง:</label>
                <input type="text" class="form-control" id="number_sit" name="number_sit">
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-primary save-add" id="save_group">บันทึก</button>
            </div>

      </div>
    </div>
  </div>


  <div class="modal" id="editmyModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">แก้ไขหมวดหมู่</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <input type="hidden" class="form-control" id="editid" name="editid">
                <label for="recipient-name" class="col-form-label">ชื่อโต๊:</label>
                <input type="text" class="form-control" id="editnumber_toe" name="editnumber_toe">
            </div>
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">จำนวนที่นั้ง:</label>
                <input type="text" class="form-control" id="editnumber_sit" name="editnumber_sit">
            </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
            <button type="button" class="btn btn-primary save-update" id="save_group">บันทึก</button>
            </div>

      </div>
    </div>
  </div>

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
        {data: 'status'},
        {data: 'action', name: 'action', orderable:false, serachable:false},

    ],catch (Error) {
                if (typeof console != "undefined") {
                    console.log(Error);
                }
    },
    columnDefs: [{
                targets: [0,4],
            },

            {
                    targets: 3,
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
                    targets: 4,
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
                                id:id,number_toe:number_toe,number_sit:number_sit},
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
                            number_toe:number_toe,number_sit:number_sit},
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

                        $("#editmyModal").modal()
                    }
                })

});



    </script>







@endsection


