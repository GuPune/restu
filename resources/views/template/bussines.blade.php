@php
    $data = \App\CoreFunction\Cutstr::getbussines();

    $imga = \App\CoreFunction\Cutstr::getconfig();
    $locale = \App\CoreFunction\Cutstr::language();
    $localex = session()->get('locale');
    $st = 'B1';
    $loca = \App\CoreFunction\Cutstr::typelan($st);



@endphp



<section id="bussines" class="testimonials section section-diff section-bg-1">
    <div class="container" data-aos="fade-up">
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

      <div class="row bottom-gap">
        @foreach($data as $datas)
        <div class="col-sm-3">
                   <!-- Latest work ITEM -->
                   <div class="service fadeLeft" style="opacity: 1; left: 0px;">
                     <div class="service-icon m-t-n">
                        @php
                        $link = env('APP_URL');
      $fineUrlImg = $link . "/export/new/" . $datas->n_code;
    $imga = \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) != NULL  ? \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) : $link . "/img/no_photo.jpg";

@endphp
                       <a href="{{$datas->url}}"  target="_blank">
                        <img data-original="{{$imga}}" alt="ภาพข่าวกิจกรรม" class="lazy" src="{{$imga}}" style="display: inline;width: 100%; height:250px;">
                    </a>
                     </div>
                     <div class="service-header">
                        <h5 class="card-title">{{$datas->title_th}}</h5>
                     </div>
                     <div class="service-desc">
                        {{$datas->name_th}}
                             <br><font size="2px;" class="pull-right">{{$datas->create_at}}</font>
                     </div>
                   </div>
                   <!-- Latest work ITEM End -->
                </div>
                @endforeach

         </div>



    </div>


  </section><!-- End Testimonials Section -->
