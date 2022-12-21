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
                <h3 class="w-75 p-3">ตั้งค่าระบบ</h3>
              </div>
              <div class="col-md-2 float-right">

               </div>
            </div>
          </div>
        <div class="card">
          <div class="card-body">

              <div class="row">
                <div class="col-md-6">
                    <input class="form-check-input" type="text" name="id" id="id" value="{{$system->id}}" hidden>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Line Notify</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="line_notify" id="line_notify" placeholder="รหัสสินค้า" value="{{$system->line_notify}}"/>
                      </div>
                    </div>
                  </div>

              </div>



                <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">Order Day by</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="C"  @if($system->order_set == 'C') checked @endif>
                          <label class="form-check-label" for="gridRadios1">
                            Original Day
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="S" @if($system->order_set == 'S') checked @endif >
                          <label class="form-check-label" for="gridRadios2">
                            Special Day
                          </label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
              <button type="submit" class="btn btn-primary mr-2 save"   >บันทึก</button>
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


$('body').on('click', '.save', function (e) {


swal("บันทึก!", "บันทึก!", "success");


});
</script>






@endsection


