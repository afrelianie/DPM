@extends('template.header')
@section('judul','DPMPTSP | Sistem Informasi UMKM Ketapang')
@section('sub_judul','Home')
@section('content')





<section class="call-action overlay section hero-area overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="hero-text text-center">
                    <!-- Start Hero Text -->
                    <div class="section-heading">
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">DUMIK PRO <br> Data UMKM Produktif</h2>
                    </div>

                    <!-- Start Search Form -->
                <form action="{{ url('search') }}" method="get">
                        @csrf
                    <div class="search-form wow fadeInUp" data-wow-delay=".7s">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12 p-0">
                                <div class="search-input">
                                    <label for="keyword"><i class="lni lni-search-alt theme-color"></i></label>
                                    <input type="text" name="query" id="keyword" placeholder="Search here.....">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-12 p-0">
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
                            </div>

                            <div class="col-lg-2 col-md-2 col-12 p-0">
                                <div class="search-btn button">
                                    <button class="btn"><i class="lni lni-search-alt"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>


                </div>
            </div>
        </div>
        <br>
        <div id="map" style="width: 100%; height: 500px;"></div>
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




    @foreach ($kecamatan as $data)
        var data{{ $data->id_kecamatan }} = L.layerGroup();
    @endforeach
        var umkm = L.layerGroup();

    var map = L.map('map', {
    center: [-1.530378972293607, 110.55592408259345],
    zoom: 8,
    layers: [peta2,
    @foreach ( $kecamatan as $data )
        data{{ $data->id_kecamatan }},
    @endforeach
    umkm,
    ]
    });

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Mapbox Streets": peta3,
        "Dark": peta4
    };


    @foreach ( $umkm as $data )
    var iconumkm = L.icon({
        iconUrl: '{{ asset($data->image)}}',
        iconSize:     [40, 40],
    });

    var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{ asset($data->foto)}}" width="100%"></td><tr><tbody><tr><td>Nama Usaha</td><td>: {{ $data->umkm }}</td></tr><tr><td>Pemilik Usaha</td><td>: {{ $data->nama }}</td></tr><tr><td>Kecamatan</td><td>: {{ $data->kecamatan }}</td></tr><tr><td colspan="2" class="text-center"><a href="/umkm/detail/{{ $data->id_umkm }}" class=" btn btn-sm btn-success text-white">Detail</a></td></tr></tbody></table>'

        L.marker([<?= $data->lokasi?>],{icon: iconumkm}).addTo(umkm)
        .bindPopup(informasi);
    @endforeach


    ///// Jika DiKlik Maka Akan Keluar LatLng /////
    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("kelik untuk melihat " + e.latlng.toString())
            .openOn(map);
    }
    map.on('click', onMapClick);



    var overlayer = {
        @foreach ($kecamatan as $data)
        "{{ $data->kecamatan }}" : data{{ $data->id_kecamatan }},
        @endforeach
        "Umkm" : umkm,
    };


    L.control.layers(baseMaps, overlayer).addTo(map);

    @foreach ( $kecamatan as $data)
            L.geoJSON (<?= $data->geojson ?>, {
                style : {
                    color : 'black',
                    fillColor : '{{ $data->warna }}',
                    fillOpacity : 1.0,
                },

        }).addTo(data{{ $data->id_kecamatan }});
    @endforeach




</script>


@endsection
