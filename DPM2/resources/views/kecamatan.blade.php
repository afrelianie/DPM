@extends('template.header')
@section('content')






<!-- Start Call Action Area -->
<section class="call-action overlay section">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12 offset-lg-12 col-md-12 col-12">
                <div class="inner">
                   <h3 class="m-0 text-white">{{ $title }}</h3>
                    <div class="content">
                        <div id="map" style="width: 100%; height: 500px;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Call Action Area -->


<section class="why-choose section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Data Umkm {{ $title }}</h2>
                </div>

            <div class="col-lg-12 offset-lg-12 col-md-12 col-12">
                <div class="card-body bg-secondary">
                    <div class="card-body bg-white">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="30px">No</th>
                                <th>Nama Usaha</th>
                                <th>Pemilik Usaha</th>
                                <th>Alamat</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; ?>
                            @foreach ($umkm as $data )
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $data->umkm }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->lokasi }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
			'Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});

    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery ?? <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});



    var data{{ $kec->id_kecamatan }} = L.layerGroup();
    @foreach ( $category as $data )
        var category{{ $data->id_category }} = L.layerGroup();
    @endforeach

    var map = L.map('map', {
    center: [-1.530378972293607, 110.55592408259345],
    zoom: 7,
    layers: [peta3, data{{ $kec->id_kecamatan }},
        @foreach ( $category as $data )
            category{{ $data->id_category }},
        @endforeach
    ]
    });

    var baseMaps = {
        "Grayscale": peta1,
        "Satellite": peta2,
        "Mapbox Streets": peta3,
        "Dark": peta4
    };


    var overlayer = {
        "{{ $kec->kecamatan }}" : data{{ $kec->id_kecamatan }},
        @foreach ( $category as $data )
        "{{ $data->name }}" : category{{ $data->id_category }},
        @endforeach

    };


    layerControl = L.control.layers(baseMaps, overlayer).addTo(map);

        var kec = L.geoJSON (<?= $kec->geojson ?>,{
                style : {
                    color : 'black',
                    fillColor : '{{ $kec->warna }}',
                },
            // }).addTo(kecamatan).bindPopup("{{ $kec->kecamatan }}");
        }).addTo(data{{ $kec->id_kecamatan }});

        map.fitBounds(kec.getBounds());


    @foreach ( $umkm as $data )
    var iconumkm = L.icon({
        iconUrl: '{{ asset($data->image)}}',
        iconSize:     [40, 40],
    });

    var informasi = '<table class="table table-bordered"><tr><td colspan="2"><img src="{{ asset($data->foto)}}" width="100%"></td><tr><tbody><tr><td>Nama Umkm</td><td>: {{ $data->umkm }}</td></tr><tr><td>Jenis Umkm</td><td>: {{ $data->name }}</td></tr><tr><td>Pemilik Usaha</td><td>: {{ $data->nama }}</td></tr><tr><td colspan="2" class="text-center"><a href="/umkm/detail/{{ $data->id_umkm }}" class=" btn btn-sm btn-success text-white">Detail</a></td></tr></tbody></table>'

        L.marker([<?= $data->lokasi?>],{icon: iconumkm}).addTo( category{{ $data->id_category }} )
        .bindPopup(informasi);
    @endforeach



</script>



@endsection
