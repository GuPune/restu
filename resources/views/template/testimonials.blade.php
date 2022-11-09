@php
    $data = \App\CoreFunction\Cutstr::getnew();

    $locale = \App\CoreFunction\Cutstr::language();
    $localex = session()->get('locale');
    $st = 'B4';
    $loca = \App\CoreFunction\Cutstr::typelan($st);
    $new = 'B5';
    $allnew = \App\CoreFunction\Cutstr::typelan($new);
@endphp

<section id="testimonials" class="testimonials section section-diff">
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

      <div class="testimonials-slider swiper">
        <div class="swiper-wrapper">



@foreach($data as $datas)

<div class="swiper-slide">
    <div class="testimonial-wrap">
        <div class="card">
            @php
      $link = env('APP_URL');
      $fineUrlImg = $link . "/export/new/" . $datas->n_code;
      $imga = \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) != NULL  ? \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) : $link . "/img/no_photo.jpg";
@endphp

<a href="/new/{{$datas->id}}">

            <img src="{{$imga}}"  class="img-responsive" alt="Images" style="width: 100%; height:250px">
        </a>
            <div class="card-body">
              <h3 class="card-title">{{$datas->title_th}}</h3>
              <p class="card-text">{{$datas->title_th}}</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">{{ $diff = Carbon\Carbon::parse($datas->created_at)->format('H:i:s d-m-Y ')}}</small>
            </div>
          </div>
    </div>
  </div><!-- End testimonial item -->

@endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div align="center" style="padding: 20px;color:white">
        <a href="/new" class="btn btn-large btn-danger">

            @if($localex == 'th')
            {{$loca->name_th}}
            @elseif($localex == 'en')
            {{$loca->name_en}}
            @else
            {{$loca->name_ch}}
            @endif
             </a>
    </div>
    </div>


  </section><!-- End Testimonials Section -->
