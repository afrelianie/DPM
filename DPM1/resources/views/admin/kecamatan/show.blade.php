@extends('template_a.header')
@section('judul','DPMPTSP | Kecamatan')
@section('sub_judul','Edit dan Detail Kecamatan')
@section('content')



<div class="row justify-content-center">
    <div class="col-md-11">

        <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Edit Kecamatan</h3>
                </div>
            <div class="container">
                <form action="{{ url('admin/kecamatan/update', $kecamatan->id_kecamatan) }}"
                    class="form-horizontal" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <input type="text" name="kecamatan" class="form-control" placeholder="Nama Kecamatan" value="{{ $kecamatan->kecamatan }}">
                                @error('kecamatan')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Warna</label>
                                <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="warna" value="{{ $kecamatan->warna }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-square"></i></span>
                                    </div>
                                </div>
                                @error('warna')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">GeoJson</label>
                                <textarea name="geojson" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Geojson Kecamatan" >{{ $kecamatan->geojson }}</textarea>
                            </div>
                            @error('geojson')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                        <div class="modal-footer">
                            <a href="{{ url('admin/kecamatan') }}" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>





 <!-- jQuery -->
 <script src="{{ url('/') }}/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ url('/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- bootstrap color picker -->
 <script src="{{ url('/') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

  <script>

     //Colorpicker
     $('.my-colorpicker1').colorpicker()
     //color picker with addon
     $('.my-colorpicker2').colorpicker()

     $('.my-colorpicker2').on('colorpickerChange', function(event) {
       $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
     })

 </script>


@endsection
