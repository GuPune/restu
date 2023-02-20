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
            <form method="POST" action="{{ route('bank.update',$bank->id) }}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}
          <h4 class="card-title">แบบฟอร์ม บัญชี</h4>
            <div class="form-group">
              <label for="exampleInputUsername1">ชื่อ</label><label  style="color:red;"> * </label>
              <input type="hidden" class="form-control" id="id" name="id" value="{{$bank->id}}">
              <input type="text" class="form-control" id="name" name="name" placeholder="ใส่ภาษาไทย"  value="{{$bank->name}}">
              <div class="help-block-name help-block-name-th">กรุณากรอกชื่อ</div>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">เลขบัญชี</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="credit" name="credit" placeholder="ใส่ภาษาอังกฤษ"  value="{{$bank->credit}}">
                <div class="help-block-name help-block-name-en">กรุณากรอกเลขบัญชี</div>
            </div>
              <div class="form-group">
                <label for="exampleInputUsername1">รายละเอียด</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="des" name="des" placeholder="รายละเอียด"  value="{{$bank->credit}}">
                <div class="help-block-name help-block-name-ch">กรุณากรอกรายละเอียด</div>
            </div>


              <div class="form-group">
                <label for="exampleInputUsername1">สถานะ </label>
                <select class="form-control" id="type" name="type">
                    <option value="Y" @if($bank->type == 'Y') selected @endif>ใช้งาน</option>
                    <option value="N" @if($bank->type == 'N') selected @endif>ไม่ใช้งาน</option>
                  </select>
              </div>


            <div class="form-group" style="padding-left:15px;">
                <label for="filemagazine"><B>รูปภาพ</B><font color="red">*</font></label><br>
                <input type="file" name="bank_img" id="bank_img" class="filestyle" ><br>
                <input type="hidden" name="images" id="images" value="{{$bank->images}}" required>
                <img src="/public/product/{{$bank->images}}" alt="รูปภาพประจำสินค้า" class="img-fluid rounded mx-auto d-block profile-image" id="showImage" width="1440" height="500">
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


