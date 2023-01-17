@extends('layouts.admin')

@section('content')





<div class="row">


  <div class="col-lg-12">
  <div class="card">
  <div class="card-block">
  <div class="row">
  <div class="col-8">
  <h4 class="card-title">ยอดขายวันนี้</h4>
  <p class="text-muted">&nbsp;{{ date('Y-m-d H:i:s') }}</p>
  <br>
  <div class="col-sm-4" style="float:left">
  <div class="card">
  <div class="card-block">
  <div class="h1 text-muted text-right mb-2">
  <i class="fa fa-usd"></i>
  </div>
  <div class="h4 mb-0">{{$datas['sum']}}</div>
  <small class="text-muted text-uppercase font-weight-bold">รายได้</small>
  <div class="progress progress-xs mt-1 mb-0">
  <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  </div>
  </div>
  </div>

  <div class="col-sm-4" style="float:left">
  <div class="card">
  <div class="card-block">
  <div class="h1 text-muted text-right mb-2">
  <i class="fa fa-cart-plus"></i>
  </div>
  <div class="h4 mb-0">{{$datas['bill']}}</div>
  <small class="text-muted text-uppercase font-weight-bold">จำนวนบิลครั้งที่ขาย</small>
  <div class="progress progress-xs mt-1 mb-0">
  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  </div>
  </div>
  </div>

  <div class="col-sm-4" style="float:left">
  <div class="card">
  <div class="card-block">
  <div class="h1 text-muted text-right mb-2">
  <i class="fa fa-cubes"></i>
  </div>
  <div class="h4 mb-0">{{$datas['order']}}</div>
  <small class="text-muted text-uppercase font-weight-bold">จำนวนรายการอาหารที่ขาย</small>
  <div class="progress progress-xs mt-1 mb-0">
  <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  </div>
  </div>
  </div>
  <h4 class="card-title">ยอดขาย 7 วันย้อนหลัง</h4>
  <br>
  <div class="col-sm-4" style="float:left">
  <div class="card">
  <div class="card-block">
  <div class="h1 text-muted text-right mb-2">
  <i class="fa fa-usd"></i>
  </div>

  <div class="h4 mb-0">{{$datas['sumlast']}}</div>
  <small class="text-muted text-uppercase font-weight-bold">รายได้</small>
  <div class="progress progress-xs mt-1 mb-0">
  <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  </div>
  </div>
  </div>

  <div class="col-sm-4" style="float:left">
  <div class="card">
  <div class="card-block">
  <div class="h1 text-muted text-right mb-2">
  <i class="fa fa-cart-plus"></i>
  </div>
  <div class="h4 mb-0">{{$datas['billlast']}}</div>
  <small class="text-muted text-uppercase font-weight-bold">จำนวนบิลครั้งที่ขาย</small>
  <div class="progress progress-xs mt-1 mb-0">
  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  </div>
  </div>
  </div>

  <div class="col-sm-4" style="float:left">
  <div class="card">
  <div class="card-block">
  <div class="h1 text-muted text-right mb-2">
  <i class="fa fa-cubes"></i>
  </div>
  <div class="h4 mb-0">{{$datas['orderlast']}}</div>
  <small class="text-muted text-uppercase font-weight-bold">จำนวนรายการอาหารที่ขาย</small>
  <div class="progress progress-xs mt-1 mb-0">
  <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
  </div>
  </div>
  </div>
  </div>

  </div>

  </div>
  </div>
  </div>

  </div>




  </div>

  <div class="row">
    <div class="col-lg-12">
    <div class="card">

    <canvas id="myChart" height="300px"></canvas>
    </div>
</div>
  </div>



  <style type="text/css">

.card-block {
    flex: 1 1 auto;
    padding: 1.25rem;
}

.text-muted {
    color: #c0cadd!important;
}
.text-right {
    text-align: right!important;
}
.card-title {
    margin-bottom: 0.75rem;
}
.card {
    margin-bottom: 1.5rem;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

<script type="text/javascript">

    var labels =  {{ Js::from($labels) }};
    var users =  {{ Js::from($data) }};
    var currentTime = new Date();
    var year = currentTime.getFullYear();

    const data = {
      labels: labels,
      datasets: [{
        label: 'กราฟแสดงยอดขายต่อเดือน',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: users,
      }]
    };

    const config = {
  type: 'line',
  data: data,
  options: {
    responsive: false,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'ปี '+ year
      }
    }
  },
};

    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );

</script>







@endsection


