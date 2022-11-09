<style>


    .bga{
        opacity: 1!important;
        filter: none!important;
        background: #f47e2b!important;

    }

    .lang {

        padding-left: 5px;padding-right:5px;
    }



        /* @media only screen and (min-width : 992px) {
            .langmob {
            display: none;
        }

        .langdes{
                display: none;

            }

        } */

        @media only screen and (max-width: 992px) {
            .langdes{
                display: none;
            }
            .langmobile{
                display: none
            }
        }

        @media (min-width:320px)  {
             /* smartphones, iPhone, portrait 480x320 phones */
             .langmobile{
                display: block;
            }
            }
@media (min-width:481px)  {
    /* portrait e-readers (Nook/Kindle), smaller tablets @ 600 or @ 640 wide. */
    .langmobile{
                display: block
            }
}

@media only screen and (min-width : 1200px) {
    .langmobile{
                display: none;
            }
}




    </style>
<header id="header" class="fixed-top d-flex align-items-center bga">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto">
        @php
$imga = \App\CoreFunction\Cutstr::getconfig();

$locale = \App\CoreFunction\Cutstr::language();
$localex = session()->get('locale');
$st = 'menu';
$me = \App\CoreFunction\Cutstr::menufr($st);


@endphp


        <img src="/public/product/{{$imga->image_logo}}" alt="logo"/>
    </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
            @foreach($me as $k => $mes)



         @if($mes->system_encodeid == 'A1')
         <li>
            <a class="nav-link scrollto active" href="#">
                @if($localex == 'th')
                {{$mes->name_th}}
                @elseif($localex == 'en')
                {{$mes->name_en}}
                @else
                {{$mes->name_cn}}
                @endif

        </a>
         </li>

        @elseif($mes->system_encodeid == 'A2')
        <li>
            <a class="nav-link scrollto" href="#testproduct">
                @if($localex == 'th')
                {{$mes->name_th}}
                @elseif($localex == 'en')
                {{$mes->name_en}}
                @else
                {{$mes->name_cn}}
                @endif
            </a>
        </li>
        @elseif($mes->system_encodeid == 'A3')
        <li>
            <a class="nav-link scrollto" href="#testimonials">
                @if($localex == 'th')
                {{$mes->name_th}}
                @elseif($localex == 'en')
                {{$mes->name_en}}
                @else
                {{$mes->name_cn}}
                @endif

            </a></li>
        @elseif($mes->system_encodeid == 'A4')
        <li><a class="nav-link scrollto" href="#bussines">

            @if($localex == 'th')
            {{$mes->name_th}}
            @elseif($localex == 'en')
            {{$mes->name_en}}
            @else
            {{$mes->name_cn}}
            @endif

        </a></li>
        @elseif($mes->system_encodeid == 'A5')
        <li><a class="nav-link scrollto " href="#carou">
            @if($localex == 'th')
            {{$mes->name_th}}
            @elseif($localex == 'en')
            {{$mes->name_en}}
            @else
            {{$mes->name_cn}}
            @endif

        </a></li>
        @elseif($mes->system_encodeid == 'A6')
        <li><a class="nav-link scrollto" href="#contact">
            @if($localex == 'th')
            {{$mes->name_th}}
            @elseif($localex == 'en')
            {{$mes->name_en}}
            @else
            {{$mes->name_cn}}
            @endif
        </a></li>



        @endif



            @endforeach


            <li>       </li>

<div class="langmobile">
            <li>
                <a  href="{{ url('lang/en') }}">
                    <img src="assets/img/en.jpg" title="English">
                </a>

        </li>
        <li>
            <a  href="{{ url('lang/th') }}">
                <img src="assets/img/thai.jpg" title="Thai">
                </a>

    </li>
    <li>
        <a  href="{{ url('lang/cn') }}">
            <img src="assets/img/cn.png" title="Chaina">
            </a>

</li>
</div>

<li  class="langdes">
    <a  style="padding-left: 5px;padding-right:5px;" href="{{ url('lang/en') }}">
        <img src="assets/img/en.jpg" title="English">
    </a>

</li>
<li class="langdes">
<a style="padding-left: 5px;padding-right:5px;" href="{{ url('lang/th') }}">
    <img src="assets/img/thai.jpg" title="Thai">
    </a>

</li>
<li class="langdes">
<a  style="padding-left: 5px;padding-right:5px;" href="{{ url('lang/cn') }}">
<img src="assets/img/cn.png" title="Chaina">
</a>

</li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
