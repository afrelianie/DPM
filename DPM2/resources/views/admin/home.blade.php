@extends('template_a.header')
@section('judul','DPMPTSP | Sistem Informasi UMKM Ketapang')
@section('sub_judul','Home')
@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $kecamatan }}</h3>
                  <p>Kecamatan</p>
                </div>
                <div class="icon">
                  <i class="fas fa-map"></i>
                </div>
                <a href="{{ url('admin/kecamatan') }}" class="small-box-footer">Detail info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{ $umkm }}</h3>
                  <p>UMKM</p>
                </div>
                <div class="icon">
                  <i class="fas fa-cubes"></i>
                </div>
                <a href="{{ url('admin/umkm') }}" class="small-box-footer">Detail info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{ $pemilik }}</h3>
                  <p>Kepemilikan</p>
                </div>
                <div class="icon">
                  <i class="fab fa-fw fa-wpforms"></i>
                </div>
                <a href="{{ url('admin/pemilik') }}" class="small-box-footer">Detail info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{ $user }}</h3>
                  <p>Pengguna</p>
                </div>
                <div class="icon">
                  <i class="fas fa-users"></i>
                </div>
                <a href="{{ url('admin/user') }}" class="small-box-footer">Detail info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
        </div>
    </div>
</section>



@endsection
