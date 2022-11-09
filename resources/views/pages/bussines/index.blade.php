@extends('layouts.admin')

@section('content')





  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">ธุรกิจของเรา</div>
          <div class="card-body">
            <div class="table-responsive pt-3">
              <table id="myTable">
                <thead>
                  <tr>
                    <th>
                      ลำดับ
                    </th>
                    <th>
                        รูป
                    </th>
                    <th>
                        เรื่อง / หัวข้อ
                    </th>
                    <th>
                        สถานะ
                    </th>
                    <th>
                        จัดการ
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @if($data)


                    @foreach($data as $k => $items)
                  <tr>
                    <td>{{ ++$k }}</td>
                    <td>

                        @php
                        $link = env('APP_URL');
      $fineUrlImg = $link . "/export/new/" . $items->n_code;

    $datas = \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) != NULL  ? \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) : $link . "/img/no_photo.jpg";

   // $fineimgInhtml = findimgInhtml($fineUrlImg) != NULL  ? findimgInhtml($fineUrlImg) : $link . "src/images/web/no-image-icon-11.png";

@endphp
<img src="<?= $datas ?>" style="height:100px; width:150px; " />
                    </td>
                    <td>
                        {{ $items->title_th }}
                    </td>
                    <td>
                        @if ($items->status == 'Y')
                        <label class="badge badge-info">ใข้งาน</label>

                        @else
                        <label class="badge badge-danger">ไม่ใช้งาน</label>
                        @endif



                    </td>
                    <td>
                        <a href="{{ url('/admin/bussines/' . $items->id . '/edit') }}" class="btnx editmdi btn-edit"><i class="mdi mdi-brush"></i></a>

                        <button type="button" class="btnx delmdi btn-delete" id="dele" onclick="del({{$items->id}});"><i class="mdi mdi-backspace"></i></button>
                    </td>
                  </tr>
              @endforeach
              @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>

    $(document).ready( function () {
      $('#myTable').DataTable();
  } );


  function del(id)
{
   // alert(id);

    deleteConf(id);
}

function edi(id)
{
    alert(id);


}



function deleteConf(id) {
            swal({
                title: "คุณต้องการลบจริงหรือไม่?",
                text: "ข้อมูลไม่สามารถกู้คืนได้!",
                icon: "warning",
                buttons: [
                    'ยกเลิกลบรายการ',
                    'ลบรายการ'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'ลบรายการ!',
                        text: 'ลบรายการเรียบร้อย',
                        icon: 'success'
                    }).then(function() {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            dataType: 'json',
                            type:'DELETE',
                            data:{
                                '_token': "{{ csrf_token() }}",
                                id:id},
                            url: '/admin/bussines/' + id,
                            success: function(datas){

                                location.reload();
                            }

                        })
                    });
                } else {
                    swal("ยกเลิก", "ยกเลิกรายการ", "error");
                }
            });
        } // error form show text


    </script>







@endsection


