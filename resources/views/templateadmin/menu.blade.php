<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <div class="d-flex sidebar-profile">
          <div class="sidebar-profile-image">
            <img src="{{ asset('cms/images/faces/face29.png') }}" alt="image">

            <span class="sidebar-status-indicator"></span>
          </div>
          <div class="sidebar-profile-name">
            <p class="sidebar-name">
                {{Auth::user()->name}}
            </p>

          </div>
        </div>

        <p class="sidebar-menu-title">Dash menu</p>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">ข้อมูลทั่วไป <span class="badge badge-primary ml-3">New</span></span>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="typcn typcn-briefcase menu-icon"></i>
          <span class="menu-title">รูปภาพ</span>
          <i class="typcn typcn-chevron-right menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="/admin/logoweb">โลโก้เว็บไซค์</a></li>
            <li class="nav-item"> <a class="nav-link" href="/admin/logoslide">ภาพสไลค์</a></li>
            <li class="nav-item"> <a class="nav-link" href="/admin/logobrand">โลโก้แบรนด์</a></li>
            <li class="nav-item"> <a class="nav-link" href="/admin/logoabout">ภาพสไลค์(เกี่ยวกับองค์กร)</a></li>
            <li class="nav-item"> <a class="nav-link" href="/admin/logocustomer">โลโก้ลูกค้าของเรา</a></li>
            <li class="nav-item"> <a class="nav-link" href="/admin/logocer">โลโก้การรับรอง</a></li>
            <li class="nav-item"> <a class="nav-link" href="/admin/logobussines">โลโก้ธุรกิจของเรา</a></li>
            <li class="nav-item"> <a class="nav-link" href="/admin/bu">Business Unit</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <p class="sidebar-menu-title">ข่าว</p>
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
          <i class="typcn typcn-film menu-icon"></i>
          <span class="menu-title">ข่าวสาร / กิจกรรม</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/new/create">แบบฟอร์ม</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/new">ข้อมูลข่าว</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/new-setting">ตั้งค่า</a></li>
            </ul>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-bs" aria-expanded="false" aria-controls="form-bs">
         <i class="typcn typcn-th-small-outline menu-icon"></i>
          <span class="menu-title">ธุรกิจของเรา</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="form-bs">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/bussines/create">แบบฟอร์ม</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/bussines">ข้อมูลข่าว</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/bussines-setting">ตั้งค่า</a></li>
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-product" aria-expanded="false" aria-controls="form-product">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">สินค้าและบริการ</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="form-product">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/product/create">แบบฟอร์ม</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/product">ข้อมูลข่าว</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/product-setting">ตั้งค่า</a></li>
            </ul>
          </div>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-slid" aria-expanded="false" aria-controls="form-slid">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">ตั้งค่าผู้ใช้งาน</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-slid">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/users">ผู้ใช้งาน</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/roles">สิทธิผู้ใช้งาน</a></li>
            </ul>
          </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-ord" aria-expanded="false" aria-controls="form-ord">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">รายการอาหาร</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-ord">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/restu">อาหาร</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/typeres">ประเภทอาหาร</a></li>
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-toe" aria-expanded="false" aria-controls="form-toe">
            <i class="typcn typcn-th-small-outline menu-icon"></i>
          <span class="menu-title">รายการโต๊ะอาหาร</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-toe">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/toe">โต๊ะอาหาร</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/zone">โซนโต๊ะ</a></li>
            </ul>
          </div>
      </li>




      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-contact" aria-expanded="false" aria-controls="form-contact">
         <i class="typcn typcn-th-small-outline menu-icon"></i>
          <span class="menu-title">ติดต่อ</span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="form-contact">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/contact">ข้อมูลติดต่อ</a></li>

            </ul>
          </div>
      </li> --}}

      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-multi" aria-expanded="false" aria-controls="form-multi">
            <i class="typcn typcn-globe-outline menu-icon"></i>
          <span class="menu-title">ตั้งค่าภาษา </span>
          <i class="menu-arrow"></i>
        </a>

        <div class="collapse" id="form-multi">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="/admin/mutli/menu">Menu</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/mutli/input">Input</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/mutli/message">Message</a></li>
              <li class="nav-item"> <a class="nav-link" href="/admin/title">Title</a></li>
            </ul>
          </div>
      </li> --}}
  </nav>
