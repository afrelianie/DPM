@extends('template_a.header')
@section('judul', 'DPMPTSP | UMKM Ketapang')
@section('sub_judul', 'Detail UMKM')
@section('content')



<div class="row justify-content-center">
    <div class="col-md-11">
         <!-- About Me Box 1 -->
        <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">FOTO USAHA UMKM</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <strong>Gambar Logo</strong><hr>
                            <img class="image" width="50%" height="50%" src="{{ asset($umkm->image)}}" alt="image">
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="form-group">
                            <strong>Foto Usaha</strong><hr>
                            <img class="image" width="350" height="200" src="{{ asset($umkm->foto)}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

        <!-- About Me Box 2 -->
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">DETAIL USAHA</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <strong><i class="fas fa-user-alt mr-1"></i> Nama Pemilik Usaha</strong>
                            <p class="text-muted">{{ $umkm->nama }}</p><hr>

                            <strong><i class="fas fa-solid fa-envelope"></i> Email</strong>
                            <p class="text-muted">{{ $umkm->email }}</p><hr>

                            <strong><i class="fas fa-solid fa-phone"></i> Contact</strong>
                            <p class="text-muted">{{ $umkm->no_hp }}</p><hr>

                            <strong><i class="fas fa-file"></i> NIK</strong>
                            <p class="text-muted">{{ $umkm->nik }}</p><hr>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong><i class="fas fa-home mr-1"></i> ID Proyek Usaha</strong>
                            <p class="text-muted">{{ $umkm->umkm }}</p><hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Nomor Induk Berusaha</strong>
                            <p class="text-muted">{{ $umkm->nib }}</p><hr>

                            <strong><i class="fas fa-book mr-1"></i> Status</strong>
                            <p class="text-muted">{{ $umkm->status }}</p><hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Skala Usaha</strong>
                            <p class="text-muted">{{ $umkm->name }}</p><hr>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <strong><i class="far fa-file-alt mr-1"></i> Tahun Beroperasi</strong>
                            <p class="text-muted">{{ $umkm->tahun }}</p><hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Jenis Usaha </strong>
                            <p class="text-muted">{{ $umkm->jenis }}</p><hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Tenaga Kerja Indonesia</strong>
                            <p class="text-muted">{{ $umkm->tki }}</p><hr>

                            <strong><i class="fas fa-map mr-1"></i> Kecamatan</strong>
                            <p class="text-muted">{{ $umkm->kecamatan }}</p><hr>
                        </div>
                    </div>



                    <div class="col-md-11">
                        <div class="form-group">
                            {{-- <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Usaha</strong>
                            <p class="text-muted">{{ $umkm->alamat }}</p><hr> --}}

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat Pemilik Usaha</strong>
                            <p class="text-muted">{{ $umkm->alamat_pribadi }}</p><hr>

                            <strong><i class="fas fa-table mr-1"></i> Keterangan Usaha</strong>
                            <p class="text-muted">{{ $umkm->deskripsi }}</p><hr>

                            <strong><i class="fas fa-table mr-1"></i> Keterangan Skala</strong>
                            <p class="text-muted">{{ $umkm->content }}</p><hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Me Box 3 -->
        <div class="card card-blue">
            <div class="card-header">
              <h3 class="card-title">MAPS LOKASI UMKM</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div id="map" style="width: 100%; height: 370px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->


        <div class="col-md-12">
            <div class="modal-footer">
                <a href="{{ url('admin/umkm') }}" class="btn btn-success">Kembali</a>
            </div>
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



<script>

    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});

    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});

    var map = L.map('map', {
        center: [{{$umkm->lokasi}}],
        zoom: 13,
        layers: [peta3],
    });

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Mapbox Streets": peta3,
        "Dark": peta4
    };

    L.control.layers(baseMaps).addTo(map);

    var iconumkm = L.icon({
        iconUrl: '{{ asset($umkm->image)}}',
        iconSize:     [40, 40],
    });

    L.marker([<?= $umkm->lokasi ?>],{icon: iconumkm}).addTo(map);



</script>



@endsection
