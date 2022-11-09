@php
    $data = \App\CoreFunction\Cutstr::getproduct();


    $locale = \App\CoreFunction\Cutstr::language();
$localex = session()->get('locale');

$st = 'B3';
    $loca = \App\CoreFunction\Cutstr::typelan($st);


    $stx = 'B9';
    $locall = \App\CoreFunction\Cutstr::typelan($stx);
@endphp

<section id="testproduct" class="testimonials section section-diff section-bg-1">
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
        <div class="col-sm-4">
                   <!-- Latest work ITEM -->
                   <div class="service fadeLeft" style="opacity: 1; left: 0px;padding:5px;">
                     <div class="service-icon m-t-n">
                        @php
                        $link = env('APP_URL');
      $fineUrlImg = $link . "/export/new/" . $datas->n_code;
    $imga = \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) != NULL  ? \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) : $link . "/img/no_photo.jpg";

@endphp
                       <a href="/product/{{$datas->id}}">
                        <img data-original="{{$imga}}" alt="ภาพข่าวกิจกรรม" class="lazy"  src="{{$imga}}" style="display: inline;width: 100%; height:250px;">
                    </a>
                     </div>
                     <div class="service-header">
                        <h5 class="card-title">{{$datas->title_th}}</h5>
                     </div>
                     <div class="service-desc">
                        {{$datas->name_th}}
                     </div>
                   </div>
                   <!-- Latest work ITEM End -->
                </div>

                @endforeach



         </div>

      <div align="center" style="padding: 20px;color:white">
        <a href="/product" class="btn btn-large btn-danger">
            @if($localex == 'th')
            {{$locall->name_th}}
            @elseif($localex == 'en')
            {{$locall->name_en}}
            @else
            {{$locall->name_cn}}
            @endif
        </a>
    </div>

    </div>


  </section><!-- End Testimonials Section -->
