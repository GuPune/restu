@extends('layouts.admin')

@section('content')



@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header py-3">
                บัญชี
            </div>
            <div class="py-2"  style="text-align:right;padding:3px;">
                <a href="{{ route('bank.create') }}" class="btn btn-success">
                   เพิ่มบัญชี
                </a>
            </div>
          <div class="card-body">
            <div class="table-responsive pt-3">
              <table id="myTable">
                <thead>
                  <tr>
                    <th>
                      ลำดับ
                    </th>
                    <th>
                        ชื่อ
                    </th>
                    <th>
                        เลขบัญชี
                    </th>
                    <th>
                       รูป
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
                    @foreach($bank as $k => $items)
                    <tr>
                        <td>{{ ++$k }}</td>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->credit }}</td>

                        <td class="text-center">
                            <img class="img-profile"
                            src="/public/product/{{$items->images}}" width="150" height="100">
                        </td>
                        <td>
                            @if ($items->type == 'Y')
                            <label class="badge badge-info">ใข้งาน</label>

                            @else
                            <label class="badge badge-danger">ไม่ใช้งาน</label>
                            @endif


                        </td>
                        <td>
                            <a href="{{ url('/admin/bank/' . $items->id . '/edit') }}" class="btnx editmdi btn-edit"><i class="mdi mdi-brush"></i></a>
                            <button type="button" class="btnx delmdi btn-delete" id="dele" onclick="del({{$items->id}});"><i class="mdi mdi-backspace"></i></button>
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
                            url: '/admin/bank/' + id,
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


