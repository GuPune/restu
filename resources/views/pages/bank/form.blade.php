@extends('layouts.admin')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <form method="POST" action="/admin/bank" >
                {{ csrf_field() }}
          <h4 class="card-title">แบบฟอร์ม บัญชี</h4>
            <div class="form-group">
              <label for="exampleInputUsername1">ชื่อ</label><label  style="color:red;"> * </label>
              <input type="text" class="form-control" id="name" name="name" placeholder="ใส่ภาษาไทย">
              <div class="help-block-name help-block-name-th">กรุณากรอกชื่อ</div>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">เลขบัญชี</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="credit" name="credit" placeholder="ใส่ภาษาอังกฤษ">
                <div class="help-block-name help-block-name-en">กรุณากรอกเลขบัญชี</div>
            </div>
              <div class="form-group">
                <label for="exampleInputUsername1">รายละเอียด</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="des" name="des" placeholder="ใส่ภาษาจีน">
                <div class="help-block-name help-block-name-ch">กรุณากรอกรายละเอียด</div>
            </div>


              <div class="form-group">
                <label for="exampleInputUsername1">สถานะ </label>
                <select class="form-control" id="type" name="type">
                    <option value="Y">ใช้งาน</option>
                    <option value="N">ไม่ใช้งาน</option>
                  </select>
              </div>


              <div class="form-group" style="padding-left:15px;">
                <label for="filemagazine"><B>รูปภาพ</B><font color="red">*</font></label><br>
                <input type="file" name="bank_img" id="bank_img" class="filestyle" ><br>
                <input type="hidden" name="images" id="images" value="" required>
                <img src="{{ $image_display }}" alt="รูปภาพประจำสินค้า" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" width="1440" height="500">
            </div>
            <button type="submit" class="btn btn-info btn-lg btn-block btn-save">Save
                <i class="typcn typcn-th-menu float-right"></i>
              </button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <style type="text/css">
    .help-block-name,.help-block-name-th,.help-block-name-en,.help-block-name-ch,.help-block-des,.help-block-tel,.help-block-email,.help-block-name-under,.help-block-gende,.help-block-name-en,.help-block-name-th,.help-block-stock,.help-block-price,.help-block-sku,.help-block-barcode,.help-block-image_thump,.help-block-image_zoom,.help-block-image{
        display: none;
        color: red;
        text-align: center;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">


var $link = "<?php echo url('/public/product/'); ?>";


        $('body').on('click', '.btn-save', function () {


     let valform = validateForm();



     if(valform === true){

        var title_th = $('#title_th').val();
        var title_en = $('#title_en').val();
        var title_ch = $('#title_ch').val();
        var detail_th = CKEDITOR.instances.details_th.getData();
        var detail_en = CKEDITOR.instances.details_en.getData();
        var detail_ch = CKEDITOR.instances.details_ch.getData();
        var url = $('#url').val();
        var keyword = $('#keyword').val();
        var status = $('#status').val();
        var name_ch = $('#name_ch').val();
        var name_th = $('#name_th').val();
        var name_en = $('#name_en').val();




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
                        title_th:title_th,title_en:title_en,title_ch:title_ch,detail_th:detail_th,detail_en:detail_en,detail_ch:detail_ch,url:url,keyword:keyword,status:status,name_ch:name_ch,name_th:name_th,name_en:name_en},
                    url: '/admin/new',
                    success: function(datas){

                      swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");


        var title_th = $('#title_th').val('');
        var title_en = $('#title_en').val('');
        var title_ch = $('#title_ch').val('');
        var detail_th = CKEDITOR.instances.details_th.setData();
        var detail_en = CKEDITOR.instances.details_en.setData();
        var detail_ch = CKEDITOR.instances.details_ch.setData();
        var url = $('#url').val('');
        var keyword = $('#keyword').val('');
        var name_ch = $('#name_ch').val('');
        var name_th = $('#name_th').val('');
        var name_en = $('#name_en').val('');


                    }
                })

     }else {


     }

        });

        function validateForm(){
var title_th = $('#title_th').val();
var title_en = $('#title_en').val();
var title_ch = $('#title_ch').val();



if(title_th == ''){
    $('.help-block-name-th').show();
}else {
    $('.help-block-name-th').hide();
}

if(title_en == ''){
    $('.help-block-name-en').show();
}else {
    $('.help-block-name-en').hide();
}

if(title_ch == ''){
    $('.help-block-name-ch').show();
}else {
    $('.help-block-name-ch').hide();
}





if(title_th == '' || title_en == '' || title_ch == ''){
    return false;
}else{
    return true;
}

}

$("#bank_img").on('change', function(){
        if ($('input[name ="bank_img"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "bank_img"]').prop('files')[0];
            var _token = '{{ csrf_token() }}';
            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('bank_img', file_data);
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
$('#showImage').attr("src", $link +'/'+ resp.data);
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



</script>





@endsection


