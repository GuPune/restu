@extends('layouts.admin')

@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>



  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">แก้ไข้แบบฟอร์ม ข่าวสาร</h4>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" value="{{$data->id}}">
              <label for="exampleInputUsername1">หัวข้อ / ชื่อเรื่อง  (ไทย)</label><label  style="color:red;"> * </label>
              <input type="text" class="form-control" id="title_th" placeholder="ใส่ภาษาไทย" value="{{$data->title_th}}">
              <div class="help-block-name help-block-name-th">กรุณากรอกชื่อเรื่อง</div>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">หัวข้อ / ชื่อเรื่อง  (อังกฤษ)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="title_en" placeholder="ใส่ภาษาอังกฤษ" value="{{$data->title_en}}">
                <div class="help-block-name help-block-name-en">กรุณากรอกชื่อเรื่อง</div>
            </div>
              <div class="form-group">
                <label for="exampleInputUsername1">หัวข้อ / ชื่อเรื่อง  (จีน)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="title_ch" placeholder="ใส่ภาษาจีน" value="{{$data->title_ch}}">
                <div class="help-block-name help-block-name-ch">กรุณากรอกชื่อเรื่อง</div>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (ไทย)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="name_th" placeholder="ใส่ภาษาไทย" value="{{$data->name_th}}">
                <div class="help-block-name-under help-block">กรุณากรอกข้อความแสดงใต้หัวเรื่อง</div>
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (อังกฤษ)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="name_en" placeholder="ใส่ภาษาอังกฤษ" value="{{$data->name_en}}">
                <div class="help-block-name-under help-block">กรุณากรอกข้อความแสดงใต้หัวเรื่อง</div>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (จีน)</label><label  style="color:red;"> * </label>
                <input type="text" class="form-control" id="name_ch" placeholder="ใส่ภาษาจีน" value="{{$data->name_ch}}">
                <div class="help-block-name-under help-block">กรุณากรอกข้อความแสดงใต้หัวเรื่อง</div>
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (ไทย)</label><label  style="color:red;"> * </label>
                <textarea name="details_th"  id="details_th">{!! $data->detail_th !!}</textarea>
                <div class="help-block-des help-block">กรุณากรอกรายละเอียด</div>
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (อังกฤษ)</label><label  style="color:red;"> * </label>
                <textarea name="details_en"  id="details_en">{!! $data->detail_en !!}</textarea>
                <div class="help-block-des help-block">กรุณากรอกรายละเอียด</div>
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">ข้อความแสดงใต้หัวเรื่อง (จีน)</label><label  style="color:red;"> * </label>
                <textarea name="details_ch"  id="details_ch">{!! $data->detail_ch !!}</textarea>
                <div class="help-block-des help-block">กรุณากรอกรายละเอียด</div>
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">URL  </label>
                <input type="text" class="form-control" id="url" placeholder="Url" value="{{$data->url}}">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Keywords ใส่เครื่องหมาย (,) เพื่อคั่นประโยค  </label>
                <input type="text" class="form-control" id="keyword" placeholder="Keyword" value="{{$data->keywords}}">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">สถานะ </label>
                <select class="form-control" id="status">
                    <option value="Y" @if($data->status == 'Y'){{'selected'}}@endif>Active</option>
                    <option value="N" @if($data->status == 'N'){{'selected'}}@endif>Isactive</option>
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
    .help-block-name,.help-block-name-th,.help-block-name-en,.help-block-name-ch,.help-block-des,.help-block-tel,.help-block-email,.help-block-name-under,.help-block-gende,.help-block-name-en,.help-block-name-th,.help-block-stock,.help-block-price,.help-block-sku,.help-block-barcode,.help-block-image_thump,.help-block-image_zoom,.help-block-image{
        display: none;
        color: red;
        text-align: center;
    }
</style>
  <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script type="text/javascript">



    CKEDITOR.replace('details_th', {
            filebrowserUploadUrl: "{{route('uploadx', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
        });

        CKEDITOR.replace('details_en', {
            filebrowserUploadUrl: "{{route('uploadx', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
        });

        CKEDITOR.replace('details_ch', {
            filebrowserUploadUrl: "{{route('uploadx', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form',
        });


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
        var id = $('#id').val();



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
                        title_th:title_th,title_en:title_en,title_ch:title_ch,detail_th:detail_th,detail_en:detail_en,detail_ch:detail_ch,url:url,keyword:keyword,status:status,name_ch:name_ch,name_th:name_th,name_en:name_en},
                    url: '/admin/new/'+ id,
                    success: function(datas){


                        swal("แก้สำเร็จ!", "แก้สำเร็จ!", "success");

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

</script>





@endsection


