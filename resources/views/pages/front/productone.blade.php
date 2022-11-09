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

          <article class="entry entry-single">

            <div class="entry-img">

            </div>

            <h2 class="entry-title">
              <a href="#">{{$data->title_th}}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#">  <time datetime="2020-01-01">{{ $diff = Carbon\Carbon::parse($data->created_at)->format('H:i:s d-m-Y ')}}</time></a></li>
                <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a href="#">{{$data->view}}</a></li>
              </ul>
            </div>

            <div class="entry-content">


                <?php echo html_entity_decode($data->detail_th);


?>
            </div>

            {{-- <div class="entry-footer">
              <i class="bi bi-folder"></i>
              <ul class="cats">
                <li><a href="#">Business</a></li>
              </ul>

              <i class="bi bi-tags"></i>
              <ul class="tags">
                <li><a href="#">Creative</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
              </ul>
            </div> --}}

          </article><!-- End blog entry -->



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



              <div class="post-item clearfix">
                <a href="/product"> <button type="button" class="btn btn-primary btn-sm btn-block" style="width:100%" >สินค้าและบริการทั้งหมด</button></a>
              </div>
            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->


      </div>

    </div>
  </section><!-- End Blog Single Section -->




@endsection


