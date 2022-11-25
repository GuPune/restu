@extends('layouts.front')

@section('content')


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- <title>DINO DELIVERY</title> -->


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://dinovery.app/app/assets/vendor/bootstrap/dist/css/bootstrap.min.css?v1">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="https://dinovery.app/app/assets/css/custom.css?v1">
    <link rel="stylesheet" href="https://dinovery.app/app/assets/css/sidebar.css?v1">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css?v1">
    <!-- Font Awesome All -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css?v1">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Mitr&display=swap" rel="stylesheet">

		<!-- jQuery -->
		<script src="https://dinovery.app/app/assets/js/jquery-3.4.1.min.js"></script>

    <style media="screen">
      body{
        /* font-family: 'Mitr', sans-serif !important; */
        background: #F8F8FF !important;
      }

      h1, h2, h3, h4, h5, h6{
        font-family: 'Mitr', sans-serif !important;
      }
	  .tabbable .nav-pills {
         overflow-x: auto;
         overflow-y:hidden;
         flex-wrap: nowrap;
		 white-space: nowrap;
      }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-162912447-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-162912447-1');
</script>

</head>

<body>


    <title>DINO DELIVERY</title>
<style>
/* Gradient transparent - color - transparent */
hr.style-two {
	border: 0;
	height: 1px;
	background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
}
</style>
<script type="text/javascript">
$(document).ready(function(){

	// validate support storage
	if(typeof(Storage) == "undefined") {
		alert("Not storage support");
	}
  // set storage
  localStorage.setItem("customer_id", "");
  localStorage.setItem("customer_name", "");

  $("#customer_id").html( localStorage.getItem("customer_id"));
  $("#customer_name").html( localStorage.getItem("customer_name"));

});
</script>


<div id="app">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
        <res/>
    </div>
</div>



    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://dinovery.app/app/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">

        function goBack() {
          window.history.back();
        }

    </script>


</body>

</html>







@endsection
<script src="{{ mix('js/app.js') }}"></script>


