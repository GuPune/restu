@extends('layouts.admin')

@section('content')



<style>
    .card-pr {
        background-color: #20a8d8
    }
    .bt-sec {
        border-radius: inherit;
    }

    .table td img{
            width: 70px;
   height: 70px;
    border-radius: 10%;

    }
    </style>

  <div class="row">


    <div class="col-12 grid-margin">
        <div class="card-header container-fluid card-pr">
            <div class="row">
              <div class="col-md-10">
                <h3 class="w-75 p-3">ตั้งค่าสินค้า/บริการ</h3>
              </div>
              <div class="col-md-2 float-right">
                <button type="button" class="btn btn-success bt-sec" data-toggle="modal" data-target="#myModal">
                    + เพิ่มสินค้า
                  </button>
               </div>
            </div>
          </div>
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ค้นหา</h4>

              <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">ประเภทอาหาร</label>
                      <div class="col-sm-9">
                        <select class="form-control">
                            @foreach($type as $key => $types)
                            <option value="{{$types->id}}">
                               - {{$types->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">รหัสสินค้า</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" />
                      </div>

                    </div>
                  </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">ชื่ออาหาร</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" />
                    </div>
                  </div>
                </div>
              </div>

              <button type="submit" class="btn btn-primary mr-2"  onclick="fitter();" >ค้นหา</button>

          </div>
        </div>
      </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">

          <div class="card-body">
            <div>
                <table class="table table-bordered yajra-datatable" style="text-align: center;">
                    <thead>
                    <tr>
                        <th>รูปอาหาร</th>
                        <th>เลขบาร์โค้ด</th>
                        <th>รายการ</th>
                        <th>ประเภท</th>
                        <th>ราคา</th>
                        <th>สถานะการขาย</th>
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
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">เพิ่มรายการ โซนสินค้า</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id="add">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-striped" id="ProductDesc">
                <tbody>
                    <tr>
                <td width="35%" height="30">รหัส/เลขบาร์โค้ด</td>
                <td width="65%">
                    <div class="input-group">
                    <input type="text" name="code" id="code" class="form-control" style="width:100px">

                <button type="button" class="btn btn-primary" id="gencode">สร้าง</button>
            </div>
            <div class="help-block-code">กรุณากรอก Code</div>
                <input type="hidden" name="action" value="add">
                <input type="hidden" name="Ref_type_item_id" value="1">
             </td>
                </tr>
                <tr>
                <td height="30">ชื่อรายการ</td>
                <td>
                    <input type="text" name="name_list" id="name_list" class="form-control">
                    <div class="help-block-name_list">กรุณากรอกชื่อรายการ</div>
                </td>
                </tr>
                <tr>
                <td height="30">หมวด<br><small>กำหนดค่าใน เมนู A03</small></td>
                <td>
                    <select name="type" class="form-control" id="type">

                @foreach ($type as $key => $types)
                <option value="{{$types->id}}">{{$types->name}}</option>
                @endforeach
            </select>
        </td>
                </tr>
                <tr>
                <td height="30">พื้นที่จัดวาง (โซน) <br><small>กำหนดค่าใน เมนู A07</small></td>
                <td>
                    <select name="zone" class="form-control" id="zone">

                @foreach ($zone as $key => $zones)
                <option value="{{$zones->id}}">{{$zones->name}}</option>
                @endforeach
             </select>
            </td>
                </tr>



                <tr>
                <td height="30">ราคาขายปลีก</td>
                <td>
                    <input name="price_sell" type="text" class="form-control" id="price_sell" value="1" placeholder="บาท" required="required"></td>
                </tr>
                <tr>
                <td height="30">ราคาขายส่ง</td>
                <td>
                    <input name="unit_cost" type="text" class="form-control" id="unit_cost" value="1" placeholder="บาท" required="required"></td>
                </tr>
                <input name="images" type="hidden" class="form-control" id="images"   required="required">

                <tr>
                <td height="30">รูป</td>
                <td><input type="file" name="file-res" id="file-res"></td>
                </tr>
                <tr>
                <td height="30">หมายเหตุท้ายรายการ</td>
                <td><textarea name="note" id="note" class="form-control"></textarea>
               </td>
                </tr>
                <tr>

                <tr>


                </tbody>
            </table>
        </form>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>

        <!-- Modal body -->
        <div class="modal-body">
            <div class="form-group">
                <input type="hidden" class="form-control" id="editid" name="editid">
                <label for="recipient-name" class="col-form-label">ที่ตั้ง/ที่จัดเก็บสินค้า:</label>
                <input type="text" class="form-control" id="editname" name="editname">
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

<style type="text/css">
    .help-block-code,.help-block-name_list,.help-block-price{
        display: none;
        color: red;
        text-align: center;
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
        url:  "{!! route('restuitem.data') !!}",
        method: 'POST',
        data: RefreshTable,
    },
    columns: [
        {data: 'images'},
        {data: 'code'},
        {data: 'name_list'},
        {data: 'name'},
        {data: 'price_sell'},
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
                    targets: 0,
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row) {

                        var base_url = window.location.origin;
var x = base_url + '/public/product/';
var y = x+data;


var result = data ? '<img src="'+ y  +'" alt="'+ row.name +'" class="img-fluid" height="70" width="70"   data-toggle="tooltip" data-placement="top"  title="Tooltip on top" > <br>' : '';
    return result;
                    }
                },

            {
                    targets: 5,
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
                    targets: 6,
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
                    url: '/admin/restu/close',
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
                url: '/admin/restu/open',
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
                                id:id,name:name},
                    url: "/admin/restu/"  + id,
                    success: function(datas){

$('#editmyModal').modal('hide');


const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);
                    }
                })

});



$("#file-res").on('change', function(){
        if ($('input[name ="file-res"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "file-res"]').prop('files')[0];
            var _token = '{{ csrf_token() }}';
            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('file-res', file_data);
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

$('input[name=images]').val(resp.data);
swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

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

    function validateForm(){

var code = $('#code').val();
var name_list = $('#name_list').val();





if(code == ''){
    $('.help-block-code').show();
}
if(name_list == ''){
    $('.help-block-name_list').show();
}

if(code == ''|| name_list == ''){
    return false;
}else{
    return true;
}

}


$('body').on('click', '.save-add', function (e) {


var code = $('#code').val();
var name_list = $('#name_list').val();
var type = $('#type').val();
var zone = $('#zone').val();
var price_sell = $('#price_sell').val();
var unit_cost = $('#unit_cost').val();
var note = $('#note').val();
var images = $('#images').val();

let valform = validateForm();
            if(valform === true){
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
                            code:code,name_list:name_list,type:type,zone:zone,price_sell:price_sell,unit_cost:unit_cost,note:note,images:images},
                url: "/admin/restu",
                success: function(datas){

      swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

var code = $('#code').val('');
var name_list = $('#name_list').val('');
var type = $('#type').val('1');
var zone = $('#zone').val('1');
var price_sell = $('#price_sell').val('');
var unit_cost = $('#unit_cost').val('');
var note = $('#note').val('');
var images = $('#images').val('');

$("#file-res").val('');


      const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);

$('#myModal').modal('hide');

                }


            })

            }else{


            }




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
                url: "/admin/restu/" + id,
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
                    url: "/admin/restu/" + id +"/edit",
                    success: function(datas){

var editname = $('#editname').val(datas.name);
var id = $('#editid').val(datas.id);

                        $("#editmyModal").modal()
                    }
                })

});



    </script>







@endsection


