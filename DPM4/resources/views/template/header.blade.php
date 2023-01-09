<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>DUMIK PRO | UMKM KETAPANG</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/img/PTSP.png" />
    <!-- Place favicon.ico in the root directory -->
    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />


    <style>
        .vertical-menu {
          width: 200px;
          height: 150px;
          overflow-y: auto;
        }

        .vertical-menu a {
          background-color: #eee;
          color: black;
          display: block;
          padding: 12px;
          text-decoration: none;
        }

        .vertical-menu a:hover {
          background-color: #ccc;
        }

        .vertical-menu a.active {
          background-color: #04AA6D;
          color: white;
        }
        </style>




    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/animate.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/css/main.css" />


  <!-- ========================= JS here ========================= -->
  <script src="{{ url('/') }}/assets/js/bootstrap.min.js"></script>
  <script src="{{ url('/') }}/assets/js/wow.min.js"></script>
  <script src="{{ url('/') }}/assets/js/tiny-slider.js"></script>
  <script src="{{ url('/') }}/assets/js/glightbox.min.js"></script>
  <script src="{{ url('/') }}/assets/js/main.js"></script>

  <!-- ========================= MAPS GIS ========================= -->
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
  integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
  crossorigin=""></script>

  <script src="https://code.jguery.com/jguery-3.5.1.min.js"></script>

  <!-- ========================= MAPS ========================= -->
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js" integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
  integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
  crossorigin=""/>


</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="nav-inner">
                        <nav class="navbar navbar-expand-lg">
                            <a href="http://dpmptsp.ketapangkab.go.id/">
                                <img src="{{ url('/') }}/img/logo1.png" width="300" height="70" alt="Logo">
                            </a>
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">

                                    <li class="nav-item">
                                        <a href="{{ url('/') }}" aria-label="Toggle navigation" class="nav-link {{ request ()->is('/') ? 'active' : ''}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-3"
                                            aria-controls="navbarSupportedContent" aria-expanded="true"
                                            aria-label="Toggle navigation">Kecamatan</a>
                                        <ul class="vertical-menu sub-menu collapse" id="submenu-1-3">
                                            @foreach ($kecamatan as $data)
                                            <li class="nav-item"><a href="/kecamatan/{{ $data->id_kecamatan }} ">{{ $data->kecamatan }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>


                                    <li class="nav-item">
                                        <a class=" dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-5"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Umkm</a>
                                        <ul class="sub-menu collapse" id="submenu-1-5">
                                            @foreach ($category as $data)
                                            <li class="nav-item"><a href="/category/{{ $data->id_category }} ">{{ $data->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->

                            <div class="button header-button">
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <a href="{{ url('/admin') }}" class="btn text-sm text-gray-700 dark:text-gray-500 underline">Selamat Datang Admin</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                                    @endauth
                                </div>
                                @endif
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </header>
    <!-- End Header Area -->








    @yield('content')

    @include('template.footer')

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <script src="https://unpkg.com/esri-leaflet@3.0.8/dist/esri-leaflet.js"
        integrity="sha512-E0DKVahIg0p1UHR2Kf9NX7x7TUewJb30mxkxEm2qOYTVJObgsAGpEol9F6iK6oefCbkJiA4/i6fnTHzM6H1kEA=="
        crossorigin="">
    </script>

    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
     integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
     crossorigin=""></script>

    <!-- DataTables  & Plugins -->
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="{{asset('js/jquery-3.1.0.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#tabel-data').DataTable();
        });
    </script>



</body>

</html>
