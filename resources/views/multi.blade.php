@extends('layouts.admin')

@section('content')


<style type="text/css">
    .btnx {
        display: inline-block;
        font-weight: 400;
        color: #001737;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        font-size: 0.875rem;
        line-height: 1;
        border-radius: 0.1875rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .delmdi{
        color: red;
    }
    .editmdi{
        color: rgb(255, 187, 0);
    }
    </style>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">

            <div class="card">

                <div class="card-header py-3">
                    ตั้งค่าภาษา
                </div>
                <div class="py-2"  style="text-align:right;padding:3px;">

                </div>
              <div class="card-body">
                <div class="table-responsive pt-1">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ไทย</th>
                                <th>อังกฤษ</th>
                                <th>จีน</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $k => $datas)
                            <tr>
                                <td>{{++$k}}</td>
                                <td><input type="text" id="th{{$datas->id}}" value="{{$datas->name_th}}"></td>
                                <td><input type="text" id="en{{$datas->id}}" value="{{$datas->name_en}}"></td>
                                <td><input type="text" id="cn{{$datas->id}}" value="{{$datas->name_cn}}"></td>
                                <td>
                                    <button type="button" class="btn btn-primary" class="save" id="save" data-id="{{$datas->id}}" onclick="handle({{$datas}});">
save
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
              </div>
            </div>
          </div>
      </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  <script>

$(document).ready(function () {
    var table = $('#example').DataTable({
        columnDefs: [
            {
                orderable: false,
                targets: [1, 2, 3],
            },
        ],
    });

});



function handle(event){


    var th = $('#th'+event.id).val();
    var en = $('#en'+event.id).val();
    var cn = $('#cn'+event.id).val();


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
                        name_th:th,name_en:en,name_cn:cn},
                    url: '/admin/mutli/'+ event.id,
                    success: function(datas){


                        swal("แก้สำเร็จ!", "แก้สำเร็จ!", "success");

                    }
                })

}

















</script>



@endsection


