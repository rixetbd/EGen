<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('backend_assets')}}/images/favicon-32x32.png" type="image/png" />
  <!--plugins-->
  <link href="{{asset('backend_assets')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="{{asset('backend_assets')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="{{asset('backend_assets')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{asset('backend_assets')}}/css/bootstrap.min.css" rel="stylesheet" />
  <link href="{{asset('backend_assets')}}/css/bootstrap-extended.css" rel="stylesheet" />
  <link href="{{asset('backend_assets')}}/css/style.css" rel="stylesheet" />
  <link href="{{asset('backend_assets')}}/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
	<link href="{{asset('backend_assets')}}/css/pace.min.css" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="{{asset('backend_assets')}}/css/dark-theme.css" rel="stylesheet" />
  <link href="{{asset('backend_assets')}}/css/light-theme.css" rel="stylesheet" />
  <link href="{{asset('backend_assets')}}/css/semi-dark.css" rel="stylesheet" />
  <link href="{{asset('backend_assets')}}/css/header-colors.css" rel="stylesheet" />

  <title>Onedash - Bootstrap 5 Admin Template</title>
</head>

<body>
<div class="error-404 d-flex align-items-center justify-content-center vh-100">
    <div class="container">
    <div class="card p-5">
        <div class="row g-0">
        <div class="col col-xl-5">
            <div class="card-body p-4">
            <h1 class="display-1"><span class="text-danger">4</span><span class="text-primary">0</span><span class="text-success">4</span></h1>
            <h2 class="font-weight-bold display-4">Lost in Space</h2>
            <p>You have reached the edge of the universe.
                <br>The page you requested could not be found.
                <br>Dont'worry and return to the previous page.</p>
            <div class="mt-5"> <a href="{{route('home')}}" class="btn btn-primary btn-lg px-md-5 radius-30">Back Home</a>
            </div>
            </div>
        </div>
        <div class="col-xl-7">
            <img src="{{asset('backend_assets')}}/images/error/404-error.png" class="img-fluid" alt="">
        </div>
        </div>
        <!--end row-->
    </div>
    </div>
</div>
<!--end page main-->



  <!-- Bootstrap bundle JS -->
  <script src="{{asset('backend_assets')}}/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="{{asset('backend_assets')}}/js/jquery.min.js"></script>
  <script src="{{asset('backend_assets')}}/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="{{asset('backend_assets')}}/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="{{asset('backend_assets')}}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="{{asset('backend_assets')}}/js/pace.min.js"></script>
  <!--app-->
  <script src="{{asset('backend_assets')}}/js/app.js"></script>

</body>

</html>
