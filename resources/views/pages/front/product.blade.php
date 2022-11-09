@extends('layouts.apps')

@section('content')



<section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="/">หน้าหลัก</a></li>
        <li>สินค้าและบริการ</li>
      </ol>

    </div>
  </section><!-- End Breadcrumbs -->



  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-8 entries">
            @foreach($data as $k => $items)
          <article class="entry">
            <div class="entry-img">

                @php
                $link = env('APP_URL');
$fineUrlImg = $link . "/export/new/" . $items->n_code;

$datas = \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) != NULL  ? \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) : $link . "/img/no_photo.jpg";

// $fineimgInhtml = findimgInhtml($fineUrlImg) != NULL  ? findimgInhtml($fineUrlImg) : $link . "src/images/web/no-image-icon-11.png";

@endphp
              <img src="<?= $datas ?>" alt="" class="img-fluid">
            </div>
            <h2 class="entry-title">
              <a href="new/{{$items->id}}">{{$items->title_th}}</a>
            </h2>
            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html">  <time datetime="2020-01-01">{{ $diff = Carbon\Carbon::parse($items->created_at)->format('H:i:s d-m-Y ')}}</time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="blog-single.html">{{$items->view}}</a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                {{$items->name_th}}
              </p>
              <div class="read-more">

                <a href="{{ url('/product/' . $items->id) }}">อ่านเพิ่มเติม</a>
              </div>
            </div>

          </article><!-- End blog entry -->

          @endforeach



          {{-- <div class="blog-pagination">
            <ul class="justify-content-center">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
            </ul>
          </div> --}}

        </div><!-- End blog entries list -->

        <div class="col-lg-4">
          <div class="sidebar">
            <h3 class="sidebar-title">บล็อคล่าสุด</h3>
            <div class="sidebar-item recent-posts">
                @foreach($lastnew as $k => $lastnews)
              <div class="post-item clearfix">

                @php
                $link = env('APP_URL');
$fineUrlImg = $link . "/export/new/" . $lastnews->n_code;

$x = \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) != NULL  ? \App\CoreFunction\Cutstr::findimgInhtml($fineUrlImg) : $link . "/img/no_photo.jpg";

// $fineimgInhtml = findimgInhtml($fineUrlImg) != NULL  ? findimgInhtml($fineUrlImg) : $link . "src/images/web/no-image-icon-11.png";
$gettype = \App\CoreFunction\Cutstr::gettype($lastnews->type);
@endphp
                <img src="<?= $x ?>" alt="">
                <h4><a href="{{ url($gettype.'/' . $lastnews->id) }}" >{{$lastnews->title_th}}</a></h4>
                <time datetime="2020-01-01">{{ $diff = Carbon\Carbon::parse($lastnews->created_at)->format('H:i:s d-m-Y ')}}</time>
              </div>
              @endforeach


            </div><!-- End sidebar recent posts-->
{{--
            <h3 class="sidebar-title">Tags</h3>
            <div class="sidebar-item tags">
              <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
            </div> --}}

            <!-- End sidebar tags-->

          </div><!-- End sidebar -->

        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->



@endsection


