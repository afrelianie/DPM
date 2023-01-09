<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>DPMPTSP | UMKM KETAPANG</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/img/PTSP.png" />

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
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12" style="margin-top:40px">
                    <h4>Search Everything</h4> <hr>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="hero-text text-center">
                    <!-- Start Hero Text -->
                    <div class="section-heading">
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">Selamat Datang Didata UMKM Ketapang</h2>
                        <p class="wow fadeInUp" data-wow-delay=".5s"> Pengajuan Perizinan dengan Adanya Kegiatan Usaha Yang Terdata
                            <br>Khusus UMKM yang Sudah Terseleksi</p>
                    </div>

                    <!-- Start Search Form -->
                <form action="{{ url('search') }}" method="get">
                        @csrf
                    <div class="search-form wow fadeInUp" data-wow-delay=".7s">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-12 p-0">
                                <div class="search-input">
                                    <label for="keyword"><i class="lni lni-search-alt theme-color"></i></label>
                                    <input type="text" name="query" id="keyword" placeholder="Search here.....">
                                </div>
                            </div>
                            {{-- <div class="col-lg-3 col-md-3 col-12 p-0">
                                <div class="search-input">
                                    <label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
                                    <select name="category" id="category">
                                        <option value="none" selected disabled>Kategori UMKM</option>
                                        @foreach ( $category as $role )
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 p-0">
                                <div class="search-input">
                                    <label for="location"><i class="lni lni-map-marker theme-color"></i></label>
                                    <select name="kecamatan" id="lokasi">
                                        <option value="none" selected disabled>Lokasi</option>
                                        @foreach ($kecamatan as $data)
                                            <option value="{{ $data->kecamatan }}">{{ $data->kecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-lg-2 col-md-2 col-12 p-0">
                                <div class="search-btn button">
                                    <button class="btn"><i class="lni lni-search-alt"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @if (isset($countries))

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>NIB</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($countries) > 0)
                            @foreach ( $countries as $countrie )
                                <tr>
                                    <td>{{$countrie->nama}}</td>
                                    <td>{{ $countrie->nik }}</td>
                                    <td>{{ $countrie->nib }}</td>
                                </tr>
                            @endforeach
                        @else

                        <tr><td>No Result Found!</td></tr>
                        @endif
                    </tbody>
                </table>

                <div class="pagination-block">
                    {{ $countries->links() }}
                </div>
                @endif


                </div>
            </div>
        </div>
    </div>



                </div>
            </div>
        </div>

    </body>
</html>
