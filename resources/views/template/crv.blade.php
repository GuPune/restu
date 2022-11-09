
<style>
    .inone{
        opacity: 1!important;
        filter: none!important;

    }
    </style>

@php

$localex = session()->get('locale');
$st = 'B7';
$loca = \App\CoreFunction\Cutstr::typelan($st);

@endphp
<section id="clients" class="clients">
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
      @php
        $crs = \App\CoreFunction\Cutstr::cr();
    @endphp

      <div class="container" data-aos="zoom-in">


        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">

            @foreach($crs as $crss)
            <div class="swiper-slide">
                <img src="/public/product/{{$crss->slide_path}}" class="img-fluid inone" alt="">
            </div>
            @endforeach

          </div>

        </div>

      </div>
    </section><!-- End Clients Section -->
