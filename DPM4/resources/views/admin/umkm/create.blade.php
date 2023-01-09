@extends('template_a.header')
@section('judul','DPMPTSP | UMKM Ketapang')
@section('sub_judul','Tambah UMKM')
@section('content')





{{-- <div class="row justify-content-center">
    <div class="col-md-11">

            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Tambah UMKM</h3>
                </div>
            <div class="container">
                <form action="{{ url('admin/umkm/store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Merek UMKM</label>
                                <input type="text" name="umkm" class="form-control" placeholder="Nama UMKM">
                                @error('umkm')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pemilik Usaha</label>
                                <select name="id_pemilik" class="form-control">
                                    <option value="" selected disabled>--Nama Pemilik Usaha --</option>
                                @foreach ($pemilik as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                                </select>
                                @error('id_pemilik')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Skala</label>
                                <select name="id_category" class="form-control">
                                    <option value="" selected disabled>-- Pilih Resiko Usaha --</option>
                                @foreach ($category as $data)
                                    <option value="{{ $data->id_category }}">{{ $data->name }}</option>
                                @endforeach
                                </select>
                                @error('id_category')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="id_kecamatan" class="form-control">
                                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                @foreach ($kecamatan as $data)
                                    <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>
                                @endforeach
                                </select>
                                @error('id_kecamatan')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat Usaha</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Alamat Umkm" ></textarea>
                            </div>
                            @error('alamat')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Skala Usaha</label>
                                <textarea name="skala" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Skala Usaha" ></textarea>
                            </div>
                            @error('skala')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Posisi</label>
                                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="lokasi UMKM">
                                @error('lokasi')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Usaha</label>
                                <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png">
                                @error('foto')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Map</label><label class="text-danger">(Drag and Drop Marker Atau Klik Map untuk menentukan posisi UMKM)</label>
                            <div id="map" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <a href="{{ url('admin/umkm') }}" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div> --}}









<div class="row justify-content-center">
    <div class="col-md-11">

        <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Tambah UMKM</h3>
                </div>
                <br>
            <div class="container">
                <form action="{{ url('admin/umkm/store') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pemilik Usaha</label>
                                <select name="id_pemilik" class="form-control">
                                    <option value="" selected disabled>--Nama Pemilik Usaha --</option>
                                @foreach ($pemilik as $data)
                                    <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                @endforeach
                                </select>
                                @error('id_pemilik')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Usaha</label>
                                <input type="text" name="umkm" class="form-control" placeholder="Nama Usaha/Produk/Toko">
                                @error('umkm')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Skala Usaha</label>
                                <select name="id_category" class="form-control">
                                    <option value="" selected disabled>-- Pilih Skala Usaha --</option>
                                @foreach ($category as $data)
                                    <option value="{{ $data->id_category }}">{{ $data->name }}</option>
                                @endforeach
                                </select>
                                @error('id_category')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sektor</label>
                                <input type="text" name="sektor" class="form-control" placeholder="Sektor KBLI">
                                @error('sektor')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Usaha</label>
                                <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png">
                                @error('foto')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Produk</label>
                                <input type="file" name="photo" class="form-control" accept="image/jpeg,image/png">
                                @error('photo')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>KBLI</label>
                                <input type="number" name="kbli" class="form-control" placeholder="No KBLI">
                                @error('kbli')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tahun Beroperasi</label>
                                <input type="number" name="tahun" class="form-control" placeholder="Tahun Beroperasi">
                                @error('tahun')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tenaga Kerja Indonesia</label>
                                <input type="number" name="tki" class="form-control" placeholder="Jumlah Tenaga Kerja">
                                @error('tki')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Keterangan Usaha / Produk yang dihasilkan" ></textarea>
                            </div>
                            @error('deskripsi')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat Usaha</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Alamat Umkm" ></textarea>
                            </div>
                            @error('alamat')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Posisi</label>
                                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="lokasi UMKM">
                                @error('lokasi')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kecamatan</label>
                                <select name="id_kecamatan" class="form-control">
                                    <option value="" selected disabled>-- Pilih Kecamatan --</option>
                                @foreach ($kecamatan as $data)
                                    <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>
                                @endforeach
                                </select>
                                @error('id_kecamatan')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label>Map</label><label class="text-danger">(Drag and Drop Marker Atau Klik Map untuk menentukan posisi UMKM)</label>
                            <div id="map" style="width: 100%; height: 400px;"></div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <a href="{{ url('admin/umkm') }}" class="btn btn-secondary">Kembali</a>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>











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
    layers: [peta3,
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
    var overlayer = {
        @foreach ($kecamatan as $data)
        "{{ $data->kecamatan }}" : data{{ $data->id_kecamatan }},
        @endforeach
        // "Umkm" : umkm,
    };
    L.control.layers(baseMaps, overlayer).addTo(map);
    // mengambil titik koordinat //
    var curLocation = [-1.8799378,110.037525];
    map.attributionControl.setPrefix(false);
    var marker = new L.marker(curLocation,{
        draggable : 'true',
    });
    // Ambil Warna Pada Kecamatan
    @foreach ( $kecamatan as $data)
        L.geoJSON (<?= $data->geojson ?>, {
            style : {
            color : 'black',
            fillColor : '{{ $data->warna }}',
            },
        }).addTo(data{{ $data->id_kecamatan }});
    @endforeach
    // Ambil Marker saat di drag and drop
    map.addLayer(marker);
    marker.on('dragend', function(event){
        var position = marker.getLatLng();
        marker.setLatLng(position,{
            draggable : 'true',
        }).bindPopup(position).update();
        // console.log(position.lat + "," + position.lng);
        $("#lokasi").val(position.lat + "," + position.lng).keyup();
    });
    // Ambil Korordinat Saat Map diKlik
    var lokasi = document.querySelector("[name=lokasi]");
    map.on("click", function(event){
        var lat = event.latlng.lat;
        var lng = event.latlng.lng;
    if(!marker)
    { marker = L.marker( event.latlng ).addTo(map);
    }else{
        marker.setLatLng(event.latlng);
    }
    lokasi.value = lat + "," + lng;
    });
</script>




// <script>

//     var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
// 		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
// 			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
// 			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
// 		id: 'mapbox/streets-v11'
// 	});

//     var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
// 		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
// 			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
// 			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
// 		id: 'mapbox/satellite-v9'
// 	});

//     var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
// 		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
// 	});

//     var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
// 		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
// 			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
// 			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
// 		id: 'mapbox/dark-v10'
// 	});

//     @foreach ($kecamatan as $data)
//         var data{{ $data->id_kecamatan }} = L.layerGroup();
//     @endforeach
//         var umkm = L.layerGroup();

//     var map = L.map('map', {
//     center: [-1.530378972293607, 110.55592408259345],
//     zoom: 8,
//     layers: [peta3,
//     @foreach ( $kecamatan as $data )
//         data{{ $data->id_kecamatan }},
//     @endforeach
//     umkm,
//     ]
//     });

//     var baseMaps = {
//         "Grayscale": peta1,
//         "Satellite": peta2,
//         "Mapbox Streets": peta3,
//         "Dark": peta4
//     };

//     var overlayer = {
//         @foreach ($kecamatan as $data)
//         "{{ $data->kecamatan }}" : data{{ $data->id_kecamatan }},
//         @endforeach
//         "Umkm" : umkm,
//     };

//     L.control.layers(baseMaps, overlayer).addTo(map);

//     // mengambil titik koordinat //
//     var curLocation = [-1.8799378,110.037525];
//     map.attributionControl.setPrefix(false);

//     var marker = new L.marker(curLocation,{
//         draggable : 'true',
//     });

//     // Ambil Marker saat di drag and drop
//     map.addLayer(marker);
//     marker.on('dragend', function(event){
//         var position = marker.getLatLng();
//         marker.setLatLng(position,{
//             draggable : 'true',
//         }).bindPopup(position).update();
//         // console.log(position.lat + "," + position.lng);
//         $("#lokasi").val(position.lat + "," + position.lng).keyup();
//     });

//     // Ambil Korordinat Saat Map diKlik
//     var lokasi = document.querySelector("[name=lokasi]");
//     map.on("click", function(event){
//         var lat = event.latlng.lat;
//         var lng = event.latlng.lng;

//     if(!marker)
//     { marker = L.marker( event.latlng ).addTo(map);
//     }else{
//         marker.setLatLng(event.latlng);
//     }
//     lokasi.value = lat + "," + lng;

//     });



// </script>







@endsection


