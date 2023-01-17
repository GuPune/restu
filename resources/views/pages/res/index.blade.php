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
            width: 100px;
   height: 100px;
    border-radius: 10%;

    }
    #showImageProductEdit{
        width: 200px;
   height: 200px;

    }
    #showImageProduct{
        width: 200px;
   height: 200px;

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
                        <select class="form-control" name="searchtype" id="searchtype">
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
                        <input type="text" class="form-control" name="serachcode" id="serachcode" placeholder="รหัสสินค้า"/>
                      </div>

                    </div>
                  </div>

              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">ชื่ออาหาร</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="serachname_list" id="serachname_list"  placeholder="ชื่อสินค้า"/>
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
                        <td height="30" colspan="2" id="images" align="center">
                            <img  width="250"
                            id="showImageProduct"
                            ></td>
                    </tr>
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
                <td height="30">หมวด<br><small>กำหนดค่าใน เมนู ประเภทอาหาร</small></td>
                <td>
                    <select name="type" class="form-control" id="type">

                @foreach ($type as $key => $types)
                <option value="{{$types->id}}">{{$types->name}}</option>
                @endforeach
            </select>
        </td>
                </tr>
                <tr>
                <td height="30">พื้นที่จัดวาง (โซน) <br><small>กำหนดค่าใน โซน</small></td>
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
                    <input name="price_sell" type="number" class="form-control" id="price_sell" value="1" min="1" placeholder="บาท" required="required" onkeypress="return onlyNumberKey(event)"></td>
                </tr>
                <tr>
                <td height="30">ราคาขายส่ง</td>
                <td>
                    <input name="unit_cost" type="number" class="form-control" id="unit_cost" value="1" min="1" placeholder="บาท" required="required" onkeypress="return onlyNumberKey(event)"></td>
                </tr>
                <input name="images" type="text" class="form-control" id="images"   required="required" hidden>

                <tr>
                <td height="30">รูป</td>
                <td><input type="file" name="file-res" id="file-res"></td>
                </tr>
                <tr>
                    <td height="30">เลือกครัว</td>
                    <td>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optradio" value="R" checked>ครัวอาหาร
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="optradio" value="S">บาร์น้ำ
                            </label>
                          </div>
                    </td>
                    </tr>
                    <tr>
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
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">เพิ่มรายการ อาหาร</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form id="add">
                <input name="editid" type="hidden" class="form-control" id="editid"></td>
                <input name="editimages" type="hidden" class="form-control" id="editimages"   required="required">

            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-striped" id="ProductDesc">
                <tbody>
                    <tr>
                        <td height="30" colspan="2" id="images" align="center">
                            <img
                            id="showImageProductEdit"
                            ></td>
                    </tr>
                    <tr>
                <td width="35%" height="30">รหัส/เลขบาร์โค้ด</td>
                <td width="65%">
                    <div class="input-group">
                    <input type="text" name="editcode" id="editcode" class="form-control" style="width:100px">

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
                    <input type="text" name="editname_list" id="editname_list" class="form-control">
                    <div class="help-block-name_list">กรุณากรอกชื่อรายการ</div>
                </td>
                </tr>
                <tr>
                <td height="30">หมวด<br><small>กำหนดค่าใน เมนู ประเภทอาหาร</small></td>
                <td>
                    <select name="type" class="form-control" id="edittype" name="edittype">

                @foreach ($type as $key => $types)
                <option value="{{$types->id}}">{{$types->name}}</option>
                @endforeach
            </select>
        </td>
                </tr>
                <tr>
                <td height="30">พื้นที่จัดวาง (โซน) <br><small>กำหนดค่าใน โซน</small></td>
                <td>
                    <select name="editzone" class="form-control" id="editzone">

                @foreach ($zone as $key => $zones)
                <option value="{{$zones->id}}">{{$zones->name}}</option>
                @endforeach
             </select>
            </td>
                </tr>



                <tr>
                <td height="30">ราคาขายปลีก</td>
                <td>
                    <input name="editprice_sell" type="number" min="1" class="form-control" id="editprice_sell" value="1" placeholder="บาท" required="required" onkeypress="return onlyNumberKey(event)"></td>
                </tr>
                <tr>
                <td height="30">ราคาขายส่ง</td>
                <td>
                    <input name="editunit_cost" type="number" min="1" class="form-control" id="editunit_cost" value="1" placeholder="บาท" required="required" onkeypress="return onlyNumberKey(event)"></td>
                </tr>
                <input name="editimages" type="hidden" class="form-control" id="editimages"   required="required">

                <tr>
                <td height="30">รูป</td>
                <td><input type="file" name="file-res-edit" id="file-res-edit"></td>
                </tr>

                <tr>
                    <td height="30">เลือกครัว</td>
                    <td>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input radio1" id="resa1" name="optradio1" value="R">ครัวอาหาร
                            </label>
                          </div>
                          <div class="form-check-inline">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input radio1" id="resa2" name="optradio1" value="S">บาร์น้ำ
                            </label>
                          </div>
                    </td>
                    </tr>
                <tr>
                <td height="30">หมายเหตุท้ายรายการ</td>
                <td><textarea name="editnote" id="editnote" class="form-control"></textarea>
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

function onlyNumberKey(evt) {

              // Only ASCII character in that range allowed
              var ASCIICode = (evt.which) ? evt.which : evt.keyCode
              if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
                  return false;
              return true;
          }

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
    "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
    "infoEmpty":      "Showing 0 to 0 of 0 entries",
        "searching": false,
        "oLanguage": {
        "sLengthMenu": "แสดง _MENU_ เรดคอร์ด",
        "sZeroRecords": "ไม่มีข้อมูลในตาราง",
      "sSearch": "ค้นหา :",
      "sEmptyTable": "ไม่มีข้อมูลในตาราง",
      "sLoadingRecords": "Please wait - loading...",
      "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ เรดคอร์ด",
      "oPaginate": {
        "sNext": "ถัดไป",
        "sPrevious": "ก่อนหน้า"
      }
    },

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

            data.serachname_list = $('input[name=serachname_list]').val();
            data.serachcode = $('input[name=serachcode]').val();
            data.searchtype = $('select[name=searchtype]').val();

console.log(data.searchtype);
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

 $('body').on('click', '.bt-sec', function (e) {

    $('#showImageProduct').attr("src", $link +'/'+ 'no_photo.jpg');
 });


 $('body').on('click', '.save-update', function (e) {



    var id = $('#editid').val();
    var code = $('#editcode').val();
    var name_list = $('#editname_list').val();
    var price_sell = $('#editprice_sell').val();
    var unit_cost = $('#editunit_cost').val();
    var note = $('#editnote').val();
    var images = $('#editimages').val();
    var type = $('#edittype').val();
    var zone = $('#editzone').val();

    var selectedOption = $("[name=optradio1]:checked").val();


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
                                id:id,code:code,name_list:name_list,price_sell:price_sell,unit_cost:unit_cost,note:note,images:images,type:type,zone:zone,selectedOption:selectedOption},
                    url: "/admin/restu/"  + id,
                    success: function(datas){

$('#editmyModal').modal('hide');
swal("แก้ไขสำเร็จ!", "แก้ไขสำเร็จ!", "success");

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
$('#showImageProduct').attr("src", $link +'/'+ resp.data);
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


    $("#file-res-edit").on('change', function(){
        if ($('input[name ="file-res-edit"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "file-res-edit"]').prop('files')[0];
            var _token = '{{ csrf_token() }}';
            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('file-res-edit', file_data);
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

$('input[name=editimages]').val(resp.data);
$('#showImageProductEdit').attr("src", $link +'/'+ resp.data);
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
var selectedOption = $("input:radio[name=optradio]:checked").val()



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
                            code:code,name_list:name_list,type:type,zone:zone,price_sell:price_sell,unit_cost:unit_cost,note:note,images:images,selectedOption:selectedOption},
                url: "/admin/restu",
                success: function(datas){

      swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

var code = $('#code').val('');
var name_list = $('#name_list').val('');
var type = $('#type').val('1');
var zone = $('#zone').val('1');
var price_sell = $('#price_sell').val('1');
var unit_cost = $('#unit_cost').val('1');
var note = $('#note').val('');
var images = $('#images').val('');

$("#file-res").val('');
$('#showImageProduct').attr("src", $link +'/'+ 'no_photo.jpg');


      const timeoutId = setTimeout(function(){
                table.ajax.reload(null, false);
}, 500);

hideModal();

                }


            })

            }else{

                return false;
            }
$("#myModal").hide();

//$('#myModal').modal('hide');

});

function hideModal() {
    $("#myModal").removeClass("in");
  $(".modal-backdrop").remove();
  $("#myModal").hide();
}


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
console.log(datas);
var id = $('#editid').val(datas.id);
var name_list = $('#editname_list').val(datas.name_list);
var price_sell = $('#editprice_sell').val(datas.price_sell);
var unit_cost = $('#editunit_cost').val(datas.unit_cost);
var code = $('#editcode').val(datas.code);
var note = $('#editnote').val(datas.note);
$("#edittype").val(datas.type_of_food_id);
$("#editzone").val(datas.zone_id);
$("#editimages").val(datas.images);
$('#showImageProductEdit').attr("src", $link +'/'+ datas.images);


//var optradio = $('#resa').val('S');
// document.querySelector('input[name="optradio"]:checked').value = 'S';
// $('input[name="optradio"]:checked').val('S');
// document.getElementById("resa").value = "S";
//document.getElementsByName("optradio").checked = true;
//var varName = $('input[name="optradio"]:checked').val('R');

//document.querySelector('input[name=optradio]:checked').value = "R";
$("input:radio[value=" + datas.res_kit + "]").prop('checked',true);
// $("input:checked", "#radioButton").val()

//$('input[type="radio"][name="optradio"]:checked').val('S');
// $("input[type='radio'][name='optradio']:checked").val(datas.res_kit);
// document.querySelector("input[name=optradio]:checked").value
                        $("#editmyModal").modal('show');
                    }
                })

});



    </script>







@endsection


