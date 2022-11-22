@extends('template.header')
@section('content')



<section class="call-action overlay about-us section ">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div id="map" style="width: 100%; height: 390px;"></div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <!-- content-1 start -->
                <div class="content-right wow fadeInRight">
                    <h2 class="m-0 text-white">{{ $umkm->umkm }}</h2>
                    <img src="{{ asset($umkm-> foto)}}" style="width: 100%;">
                        <h3 class="m-0 text-white">{{ $umkm->deskripsi }}</h3>
                    <p class="m-0 text-white">{{ $umkm->content }}</p>
                    <!-- End Heading -->
                </div>
            </div>
        </div>
    </div>
</section>


<section class="why-choose section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Data Umkm {{ $title }}</h2>
                </div>

            <div class="col-lg-12 offset-lg-12 col-md-12 col-12">
                <div class="card-body bg-secondary">


                <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">DETAIL USAHA</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <strong><i class="fas fa-user mr-1"></i> Nama Pemilik Usaha</strong>
                                    <p class="text-muted">{{ $umkm->nama }}</p><hr>

                                    <strong><i class="fas fa-book mr-1"></i> Nama Usaha</strong>
                                    <p class="text-muted">{{ $umkm->umkm }}</p><hr>

                                    <strong><i class="far fa-file-alt mr-1"></i>Jenis UMKM</strong>
                                    <p class="text-muted">{{ $umkm->name }}</p><hr>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="form-group">
                                    <strong><i class="fas fa-file mr-1"></i>Skala Umkm</strong>
                                    <p class="text-muted">{{ $umkm->content }}</p><hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Alamat</strong>
                                    <p class="text-muted">{{ $umkm->alamat }}</p><hr>

                                    <strong><i class="fas fa-map mr-1"></i>Kecamatan</strong>
                                    <p class="text-muted">{{ $umkm->kecamatan }}</p><hr>
                                </div>
                            </div>

                            <div class="col-md-11">
                                <div class="form-group">
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Usaha Berupa</strong>
                                    <p class="text-muted">{{ $umkm->deskripsi }}</p><hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>










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
        layers: [peta1],
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
