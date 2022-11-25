@extends('layouts.admin')

@section('content')





  <div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header container-fluid">
                <div class="row">
                  <div class="col-md-10">
                    <h3 class="w-75 p-3">ตั้งค่าประเภทอาหาร</h3>
                  </div>
                  <div class="col-md-2 float-right">
                    <button type="button" class="btn btn-success" onclick="Showmodal();">
                        เพิ่มประเภทอาหาร
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
                        <th>ชื่อประเภทอาหาร</th>
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
            <h4 class="modal-title" id="exampleModalLabel">เพิ่มรายการ ประเภทอาหาร</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Modalclose('i');">
            <span aria-hidden="true">×</span>
            </button>
            </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">ชื่อประเภทอาหาร:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <input type="hidden" class="form-control" name="icon" id="icon" placeholder="icon"   required>

            <div class="row">
                <div class="form-group" style="padding-left:15px;">
                    <label for="filemagazine"><B>รูปประเภทอาหาร</B></label><br>
                    <input type="file" name="images_type_res" id="images_type_res" ><br>
                    <img src="/public/product/no_photo.jpg" alt="รูปภาพประจำสินค้า" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" width="300" height="150">
                </div>
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
            <h4 class="modal-title" id="exampleModalLabel">แก้ไข้รายการ โซนสินค้า</h4>
            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="Modalclose('e');">
                <input type="hidden" class="form-control" name="editimages" id="editimages" placeholder="icon" required >
            <span aria-hidden="true">×</span>
            </button> --}}
            </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group"
            >
                <input type="hidden" class="form-control" id="editid" name="editid">
                <label for="recipient-name" class="col-form-label">ชื่อประเภทอาหาร:</label>
                <input type="text" class="form-control" id="editname" name="editname">
                <input type="hidden" class="form-control" name="eimages" id="eimages">
            </div>

            <div class="row">
                <div class="form-group" style="padding-left:15px;">
                    <label for="filemagazine"><B>รูปประเภทอาหาร</B></label><br>
                    <input type="file" name="edit_images_type_res" id="edit_images_type_res" ><br>
                    <img src="/public/product/no_photo.jpg" alt="รูปภาพประจำสินค้า" class="img-fluid rounded mx-auto d-block profile-image" id="EditshowImage" width="300" height="150">
                </div>
            </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button> --}}
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

var $link = "<?php echo url('/public/product/'); ?>";
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
        url:  "{!! route('typeitem.data') !!}",
        method: 'POST',
        data: RefreshTable,
    },
    columns: [
        {data: 'id'},
        {data: 'name'},
        {data: 'status'},
        {data: 'action', name: 'action', orderable:false, serachable:false},

    ],catch (Error) {
                if (typeof console != "undefined") {
                    console.log(Error);
                }
    },
    columnDefs: [{
                targets: [0,2],
            },

            {
                    targets: 2,
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
                    targets: 3,
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


function Showmodal() {


    $("#myModal").modal("show");
   // alert('ok');
}

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

function Modalclose(id) {
    $('#myModal').modal('hide');

  //  $('#myModal').modal('hide');
}




function hideModal() {
//   $("#myModal").removeClass("in");
//   $(".modal-backdrop").remove();
//   $('body').removeClass('modal-open');
//   $('body').css('padding-right', '');
//   $("#myModal").hide();
    var name = $('#name').val('');
    $("#images_type_res").val('');
    $('#showImage').attr("src", $link +'/'+ 'no_photo.jpg');
  $('#myModal').modal('hide');
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
                    url: '/admin/typeres/close',
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
                url: '/admin/typeres/open',
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


    var name = $('#editname').val();
    var id = $('#editid').val();
    var images = $('#eimages').val();

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
                                id:id,name:name,images:images},
                    url: "/admin/typeres/"  + id,
                    success: function(datas){

$('#editmyModal').modal('hide');


const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);
                    }
                })

});




$('body').on('click', '.save-add', function (e) {


var name = $('#name').val();
var images = $('#icon').val();



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
                            name:name,images:images},
                url: "/admin/typeres",
                success: function(datas){

      swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");



      const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);

//     $("#myModal").removeClass("in");
//   $(".modal-backdrop").remove();
//   $("#myModal").hide();

  hideModal();

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
                url: "/admin/typeres/" + id,
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
                    url: "/admin/typeres/" + id +"/edit",
                    success: function(datas){
                        $("#editmyModal").modal('show');
var editname = $('#editname').val(datas.name);
var id = $('#editid').val(datas.id);
var editimages = $('#eimages').val(datas.images);

$('#EditshowImage').attr("src", $link +'/'+ datas.images);
console.log($link +'/'+ datas.images);

                    }
                })

});


$("#edit_images_type_res").on('change', function(){
        if ($('input[name ="edit_images_type_res"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "edit_images_type_res"]').prop('files')[0];
            var _token = '{{ csrf_token() }}';
            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('edit_images_type_res', file_data);
                    form_data.append("_token", _token);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/admin/restu/uploadimage',
                        dataType: 'json',
                        type: 'POST',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function success(resp) {

                            $('input[name=eimages]').val(resp.data);
                                $('#EditshowImage').attr("src", $link +'/'+ resp.data);

                            //    swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

                        },
                        error: function error(xhr, textStatus, errorThrown) {

                            console.log(errorThrown);
                        }
                    });
                };
                img.onerror = function() {
                    alert( "not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }
        }
    })



$("#images_type_res").on('change', function(){
        if ($('input[name ="images_type_res"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "images_type_res"]').prop('files')[0];
            var _token = '{{ csrf_token() }}';
            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('images_type_res', file_data);
                    form_data.append("_token", _token);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/admin/restu/uploadimage',
                        dataType: 'json',
                        type: 'POST',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function success(resp) {

                            $('input[name=icon]').val(resp.data);
                                $('#showImage').attr("src", $link +'/'+ resp.data);

                            //    swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

                        },
                        error: function error(xhr, textStatus, errorThrown) {

                            console.log(errorThrown);
                        }
                    });
                };
                img.onerror = function() {
                    alert( "not a valid file: " + file.type);
                };
                img.src = _URL.createObjectURL(file);
            }
        }
    })




    </script>







@endsection


