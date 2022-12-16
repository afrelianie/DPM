@extends('template_a.header')
@section('judul','DPMPTSP | UMKM Ketapang')
@section('sub_judul','Edit UMKM')
@section('content')



<div class="row justify-content-center">
    <div class="col-md-11">

            <div class="card card-default">
                <div class="card-header">
                  <h3 class="card-title">Edit UMKM</h3>
                </div>
            <div class="container">
                <form action="{{ url('admin/umkm/update', $umkm->id_umkm) }}"
                        class="form-horizontal" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pemilik Usaha</label>
                                <select name="id_pemilik" class="form-control">
                                    <option value="{{ $umkm->id_pemilik }}">{{ $umkm->nama }}</option>
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
                                <label>Merek UMKM</label>
                                <input type="text" name="umkm" class="form-control" placeholder="Nama UMKM" value="{{ $umkm->umkm }}">
                                @error('umkm')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Resiko Usaha</label>
                                <select name="id_category" class="form-control">
                                    <option value="{{ $umkm->id_category }}">{{ $umkm->name }}</option>
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
                                    <option value="{{ $umkm->id_kecamatan }}">{{ $umkm->kecamatan }}</option>
                                @foreach ($kecamatan as $data)
                                    <option value="{{ $data->id_kecamatan }}">{{ $data->kecamatan }}</option>
                                @endforeach
                                </select>
                                @error('id_kecamatan')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label>Skala Usaha</label>
                            <select name="skala" class="form-control">
                                <option value="{{ $umkm->skala }}">{{ $umkm->skala }}</option>
                                <option value="Mikro">Mikro</option>
                                <option value="Kecil">Kecil</option>
                                <option value="Menengah">Menengah</option>
                            </select>
                            @error('skala')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah Investasi</label>
                                <input type="text" name="investasi" class="form-control" value="{{ $umkm->investasi }}">
                                @error('investasi')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tenaga Kerja Indonesia</label>
                                <input type="number" name="tki" class="form-control" value="{{ $umkm->tki }}" >
                                @error('tki')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Alamat Usaha</label>
                                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Alamat Umkm" >{{ $umkm->alamat }}</textarea>
                            </div>
                            @error('alamat')
                                <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Posisi</label>
                                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="lokasi UMKM" value="{{ $umkm->lokasi }}">
                                @error('lokasi')
                                    <div class="text-danger mt-2 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Foto Usaha</label>
                                <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png" >
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
                            <button class="btn btn-primary">Edit</button>
                            <a href="{{ url('admin/umkm') }}" class="btn btn-secondary">Kembali</a>
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

    var map = L.map('map', {
        center: [{{ $umkm->lokasi }}],
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

    // mengambil titik koordinat //
    var curLocation = [{{ $umkm->lokasi }}];
    map.attributionControl.setPrefix(false);

    var marker = new L.marker (curLocation,{
        draggable : 'true',
    });

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

    // Ambil Koordinat Saat Map diKlik
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


@endsection


