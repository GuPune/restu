@php
$imga = \App\CoreFunction\Cutstr::getconfig();

$locale = \App\CoreFunction\Cutstr::language();
$localex = session()->get('locale');
$st = 'menu';
$me = \App\CoreFunction\Cutstr::menufr($st);


@endphp

<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>บริษัท ไอดีไดรฟ์ จำกัด<span></span></h3>
            <p>
                สำนักงานใหญ่<br>
                เลขประจำตัวผู้เสียภาษี 0405536000531<br>
                200/222 หมู่ที่ 2 ถนนชัยพฤกษ์<br>
                ตำบลในเมือง อำเภอเมืองขอนแก่น<br>
              ขอนแก่น 40000<br><br>
              <strong>Phone:</strong> 043 224 000<br>
              <strong>Email:</strong> -<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>

                @foreach($me as $k => $mes)



                @if($mes->system_encodeid == 'A1')
                <li><i class="bx bx-chevron-right"></i>
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
               <li><i class="bx bx-chevron-right"></i>
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
               <li><i class="bx bx-chevron-right"></i>
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
               <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto" href="#bussines">

                   @if($localex == 'th')
                   {{$mes->name_th}}
                   @elseif($localex == 'en')
                   {{$mes->name_en}}
                   @else
                   {{$mes->name_cn}}
                   @endif

               </a></li>
               @elseif($mes->system_encodeid == 'A5')
               <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto " href="#carou">
                   @if($localex == 'th')
                   {{$mes->name_th}}
                   @elseif($localex == 'en')
                   {{$mes->name_en}}
                   @else
                   {{$mes->name_cn}}
                   @endif

               </a></li>
               @elseif($mes->system_encodeid == 'A6')
               <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto" href="#contact">
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



            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>©</span></strong> บริษัท ไอดีไดรฟ์ จำกัด
        </div>
      </div>
      <div class="social-links text-center text-md-end pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->
