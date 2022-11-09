
 @php
  $localex = session()->get('locale');
 $carou = \App\CoreFunction\Cutstr::carou($localex);



@endphp

<section id="carou" class="carou section section-diff section-bg-2">
    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->

        <div class="carousel-inner">
            @foreach($carou as $key => $carous)

            @if ($key == 0)
            <div class="carousel-item active">
                <img src="/public/product/{{$carous->slide_path}}" alt="Los Angeles" width="1100" height="500">
              </div>
                @else
                <div class="carousel-item">
                    <img src="/public/product/{{$carous->slide_path}}" alt="Los Angeles" width="1100" height="500">
                  </div>
            @endif



          @endforeach
        </div>


        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>


  </section><!-- End Testimonials Section -->



  <style type="text/css">

    .carousel-inner img {
    width: 100%;
    height: 100%;
  }


</style>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
