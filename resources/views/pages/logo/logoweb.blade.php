@extends('layouts.admin')

@section('content')


<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
            <input type="hidden" id="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <label for="exampleInputUsername1">โลโก้เว็บไซต์
                *</label>
                <input type="hidden" name="id" id="id"  value="{{$logo->id}}">

              <div class="form-group" style="padding-left:15px;">
                <label for="filemagazine"><B>โลโก้</B><font color="red">*</font></label><br>
                <input type="file" name="images_logo" id="images_logo" ><br>
                <input type="hidden" class="form-control" name="image_logo" id="image_logo" value="{{$logo->image_logo}}">
                <img src="/public/product/{{$logo->image_logo}}" alt="รูปภาพประจำสินค้า" class="img-fluid rounded mx-auto d-block profile-image" id="showImagelogo" width="300" height="150">
            </div>
            </div>

        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
        <div class="form-group">
            <label for="exampleInputUsername1">Shortcut icon
              *</label>
            <div class="form-group" style="padding-left:15px;">

              <input type="file" name="images_shotcut" id="images_shotcut" ><br>
              <input type="hidden" class="form-control" name="image_shotcut" id="image_shotcut" value="{{$logo->image_shotcut}}">
              <img src="/public/product/{{$logo->image_shotcut}}" alt="รูปภาพประจำสินค้า" class="img-fluid rounded mx-auto d-block profile-image" id="showImageshotcut" width="300" height="150">
          </div>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
          <div class="form-group">
              <label for="exampleInputUsername1">ผู้นำด้านนวัตกรรม
                *</label>
              <div class="form-group" style="padding-left:15px;">

                <input type="file" name="images_fut" id="images_fut" ><br>
                <input type="hidden" class="form-control" name="image_fut" id="image_fut" value="{{$logo->image_fut}}">
                <img src="/public/product/{{$logo->image_fut}}" alt="รูปภาพประจำสินค้า" class="img-fluid rounded mx-auto d-block profile-image" id="showImagefut" width="300" height="150">
            </div>
            </div>

          </div>
        </div>
      </div>


      <div class="col-md-12 grid-margin stretch-card">
        <button type="button" class="btn btn-info btn-lg btn-block save-fut">บันทึก
        </button>
      </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <script>


    var $link = "<?php echo url('/public/product/'); ?>";



    $('body').on('click', '.save-fut', function () {

        var id = $('#id').val();
        var image_logo = $('#image_logo').val();
        var image_shotcut = $('#image_shotcut').val();
        var image_fut = $('#image_fut').val();


        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });

                $.ajax({
                    dataType: 'json',
                    type:'PUT',
                    data:{
                        '_token': "{{ csrf_token() }}",
                        images_logo:image_logo,images_shotcut:image_shotcut,images_fut:image_fut},
                    url: '/admin/logoweb/'+ id,

                    success: function(datas){

                        swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");

                    }
                })
});






    $("#images_logo").on('change', function(){
        if ($('input[name ="images_logo"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "images_logo"]').prop('files')[0];

            var _token = $('input#_token').val();

            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('images_logo', file_data);
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

;                               $('input[name=image_logo]').val(resp.data);
                                $('#showImagelogo').attr("src", $link +'/'+ resp.data);
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


    $("#images_shotcut").on('change', function(){
        if ($('input[name ="images_shotcut"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "images_shotcut"]').prop('files')[0];

            var _token = $('input#_token').val();

            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('images_shotcut', file_data);
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
                             $('input[name=image_shotcut]').val(resp.data);
                            $('#showImageshotcut').attr("src", $link +'/'+ resp.data);
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

    $("#images_fut").on('change', function(){
        if ($('input[name ="images_fut"]').val() != '') {
            var _URL = window.URL || window.webkitURL;
            var file, img;
            var file_data = $('input[name= "images_fut"]').prop('files')[0];

            var _token = $('input#_token').val();

            var form_data = new FormData();
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function() {
                    form_data.append('images_fut', file_data);
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

;                               $('input[name=image_fut]').val(resp.data);
                                $('#showImagefut').attr("src", $link +'/'+ resp.data);
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


