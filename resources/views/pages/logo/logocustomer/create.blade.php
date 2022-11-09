@extends('layouts.admin')

@section('content')



<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">เพิ่ม โลโก้ลูกค้า</h4>
            <div class="form-group">
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
              <label for="exampleInputUsername1">หัวข้อ / ชื่อเรื่อง </label><label  style="color:red;"> * </label>
              <input type="text" class="form-control" id="title_th" placeholder="ใส่ภาษาไทย">
              <div class="help-block-name help-block-title_th">กรุณากรอกชื่อเรื่อง</div>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">รายละเอียด</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="detais" placeholder="ใส่ภาษาอังกฤษ">
                <div class="help-block-name help-block-detais">กรุณากรอกรายละเอียด</div>
            </div>


              <div class="form-group">
                <label for="exampleInputUsername1">URL</label>
                <input type="text" class="form-control" id="url" placeholder="Url">
                <div class="help-block-name help-block-url">กรุณากรอก URL</div>
              </div>


              <div class="form-group">
                <label for="exampleInputUsername1">Upload รูปภาพ</label>
                <input type="file" name="image_slide" id="image_slide" ><br>
                <input type="hidden" class="form-control" name="images_slide" id="images_slide">
                <img src="/img/no_photo.jpg" alt="รูปภาพสไลด์" class="img-fluid rounded mx-auto d-block profile-image" id="showImageslide" width="300" height="150">
              </div>





              <div class="form-group">
                <label for="exampleInputUsername1">สถานะ </label>
                <select class="form-control" id="status">
                    <option value="Y">Active</option>
                    <option value="N">Isactive</option>
                  </select>
              </div>
            <button type="button" class="btn btn-info btn-lg btn-block btn-save">Save
                <i class="typcn typcn-th-menu float-right"></i>
              </button>
        </div>
      </div>
    </div>
  </div>

  <style type="text/css">
    .help-block-title_th,.help-block-url,.help-block-detais,.help-block-images_slide,.help-block-des,.help-block-tel,.help-block-email,.help-block-name-under,.help-block-gende,.help-block-name-en,.help-block-name-th,.help-block-stock,.help-block-price,.help-block-sku,.help-block-barcode,.help-block-image_thump,.help-block-image_zoom,.help-block-image{
        display: none;
        color: red;
        text-align: center;
    }
</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <script>


    var $link = "<?php echo url('/public/product/'); ?>";



    $('body').on('click', '.btn-save', function () {

        var id = $('#id').val();
        var url = $('#url').val();
        var title_th = $('#title_th').val();
        var detais = $('#detais').val();
        var status = $('#status').val();
        var images_slide = $('#images_slide').val();



        let valform = validateForm();
/// check ค่าว่าง
if(valform === true){

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
                        url:url,title_th:title_th,detais:detais,images_slide:images_slide,status:status},
                    url: '/admin/logocustomer',

                    success: function(datas){

                        swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

                        setTimeout(function(){
                            window.location.href = '/admin/logocustomer'
}, 2000);



                    }
                })

}else {


}

});



function validateForm(){

        var url = $('#url').val();
        var title_th = $('#title_th').val();
        var detais = $('#detais').val();

        var images_slide = $('#images_slide').val();


if(title_th == ''){
    $('.help-block-title_th').show();
}else {
    $('.help-block-title_th').hide();
}


if(detais == ''){
    $('.help-block-detais').show();
}else {
    $('.help-block-detais').hide();
}

if(images_slide == ''){
    $('.help-block-images_slide').show();
}else {
    $('.help-block-images_slide').hide();
}






if(title_th == '' || detais == '' || images_slide == ''){
    return false;
}else{
    return true;
}

}




    $("#image_slide").on('change', function(){
        if ($('input[name ="image_slide"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "image_slide"]').prop('files')[0];
            var _token = $('input#_token').val();

            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('image_slide', file_data);
                    form_data.append("_token", _token);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '/admin/product/uploadimage',
                        dataType: 'json',
                        type: 'POST',
                        data: form_data,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function success(resp) {

;                               $('input[name=images_slide]').val(resp.data);
                                $('#showImageslide').attr("src", $link +'/'+ resp.data);
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


