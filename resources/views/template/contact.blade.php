<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        @php
        $bra = \App\CoreFunction\Cutstr::brand();


        $localex = session()->get('locale');
    $st = 'B8';
    $loca = \App\CoreFunction\Cutstr::typelan($st);

    $new = 'C0';
    $locas = \App\CoreFunction\Cutstr::messages($new);

    @endphp
      <div class="section-title">
        <h2>
            @if($localex == 'th')
            {{$loca->name_th}}
            @elseif($localex == 'en')
            {{$loca->name_en}}
            @else
            {{$loca->name_ch}}
            @endif
        </h2>

        <p>
            @if($localex == 'th')
            {{$loca->title_th}}
            @elseif($localex == 'en')
            {{$loca->title_en}}
            @else
            {{$loca->title_cn}}
            @endif
        </p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <div class="contact-image">
                    <img src="https://iddrives.co.th/web/src/images/web/map_iddrives.png" class="img-responsive" style="width: 100%;" alt="Smiling Two Girls">
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="col-lg-6">
          <form action="#" method="post" role="form" class="php-email-form">
            @foreach($locas as $k => $items)
            @if($items->system_encodeid == 'C1')
            <div class="row">
                <div class="col form-group">
                    @if($localex == 'th')
            <input type="text" name="name" class="form-control" id="name" placeholder="{{$items->name_th}}" required>
            @elseif($localex == 'en')

            <input type="text" name="name" class="form-control" id="name" placeholder="{{$items->name_en}}" required>
            @else

            <input type="text" name="name" class="form-control" id="name" placeholder="{{$items->name_cn}}" required>
            @endif

                  <div class="help-block-des help-block-name">
                    กรุณากรอกรายละเอียด
                </div>
                </div>
              </div>

            @elseif($items->system_encodeid == 'C2')
            <div class="form-group">
                @if($localex == 'th')
                <input type="text" class="form-control" name="tel" id="tel" placeholder="{{$items->name_th}}" required>
                @elseif($localex == 'en')

                <input type="text" class="form-control" name="tel" id="tel" placeholder="{{$items->name_en}}" required>
                @else

                <input type="text" class="form-control" name="tel" id="tel" placeholder="{{$items->name_cn}}" required>
                @endif
                <div class="help-block-des help-block-tel">
                    กรุณากรอกรายละเอียด
                </div>
              </div>

            @elseif($items->system_encodeid == 'C3')

            <div class="col form-group">
                @if($localex == 'th')
                <input type="email" class="form-control" name="email" id="email" placeholder="{{$items->name_th}}" required>
                @elseif($localex == 'en')
                <input type="email" class="form-control" name="email" id="email" placeholder="{{$items->name_en}}" required>
                @else
                <input type="email" class="form-control" name="email" id="email" placeholder="{{$items->name_cn}}" required>
                @endif
                <div class="help-block-des help-block-email">

                    กรุณากรอกรายละเอียด</div>
              </div>


            @elseif($items->system_encodeid == 'C4')

            <div class="form-group">


                @if($localex == 'th')
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="{{$items->name_th}}" required></textarea>

                @elseif($localex == 'en')
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="{{$items->name_en}}" required></textarea>
                @else
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="{{$items->name_cn}}" required></textarea>
                @endif
                <div class="help-block-des help-block-message">กรุณากรอกรายละเอียด</div>
              </div>

            <div class="form-group mb-4">
                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                <div class="help-block-des help-block-captcha">กรุณากรอกรายละเอียด</div>
            </div>

            <div class="form-group mt-4 mb-4">
                <div class="captcha">
                    @php
                    $rand = \App\CoreFunction\Cutstr::ask();
                 @endphp
                    <span class="btn btn-primary">{{$rand->ask}}

                    </span>
                    <input id="answer" type="hidden" class="form-control" placeholder="Enter Captcha" name="answer" id="answer" value="{{$rand->answer}}">
                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                    </button>
                </div>
            </div>

            <div class="text-center">

                @if($localex == 'th')
                <button type="button" class="btn btn-danger btn-save"  >{{$items->name_th}}</button>
                @elseif($localex == 'en')
                <button type="button" class="btn btn-danger btn-save"  >{{$items->name_en}}</button>
                @else
                <button type="button" class="btn btn-danger btn-save"  >{{$items->name_cn}}</button>
                @endif

            </div>

            @endif
            @endforeach

          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
  <style type="text/css">
    .help-block-name,.help-block-email,.help-block-tel,.help-block-message,.help-block-captcha,.help-block-tel,.help-block-email,.help-block-name-under,.help-block-gende,.help-block-name-en,.help-block-name-th,.help-block-stock,.help-block-price,.help-block-sku,.help-block-barcode,.help-block-image_thump,.help-block-image_zoom,.help-block-image{
        display: none;
        color: red;
        text-align: center;
    }


</style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>


$('body').on('click', '.btn-save', function () {


let valform = validateForm();
    var name = $('#name').val();
    var email = $('#email').val();
    var tel = $('#tel').val();
    var message = $('#message').val();
    var captcha = $('#captcha').val();


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
                   name:name,email:email,tel:tel,message:message,captcha:captcha},
               url: '/captcha-validation',
               success: function(datas){
                swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");
               }
           })

}else {
    swal("ส่งข้อมูลไม่สำเร็จ!", "ส่งข้อมูลไม่สำเร็จ!", "error");

}

   });

   function validateForm(){
    var name = $('#name').val();
    var email = $('#email').val();
    var tel = $('#tel').val();
    var message = $('#message').val();
    var captcha = $('#captcha').val();
    var answer = $('#answer').val();


    if(name == ''){
$('.help-block-name').show();
}else {
$('.help-block-name').hide();
}

if(email == ''){
$('.help-block-email').show();
}else {
$('.help-block-email').hide();
}

if(tel == ''){
$('.help-block-tel').show();
}else {
$('.help-block-tel').hide();
}

if(message == ''){
$('.help-block-message').show();
}else {
$('.help-block-message').hide();
}

if(captcha == ''){
$('.help-block-captcha').show();
}else {
$('.help-block-captcha').hide();
}


if(captcha == '' || email == '' || tel == '' || message == '' || name == ''){
return false;
}else{


if(parseInt(answer) == parseInt(captcha)){
    return true;
}else {
    return false;
}

}





}

function save(){


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
                    url: '/admin/bussines',
                    success: function(datas){

                      swal("บันทึกสำเร็จ!", "บันทึกสำเร็จ!", "success");



                    }
                })

}


$('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
console.log(data)

var answer = $('#answer').val(data.answer);
            $(".captcha span").html(data.ask);
            }
        });
    });

    </script>
