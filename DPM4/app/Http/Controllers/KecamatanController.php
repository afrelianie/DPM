<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\KecamatanModel;
use App\Models\UmkmModel;
use App\Models\CategoryModel;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;


class KecamatanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->UmkmModel = new UmkmModel();
        $this->KecamatanModel = new KecamatanModel();
        $this->CategoryModel = new CategoryModel();

    }

    public function index()
    {
        $kecamatan = [
            'kecamatan'=> $this->KecamatanModel->AllData(),
        ];
        return view('admin.kecamatan.index', $kecamatan);
    }


    public function create()
    {
        //
    }


    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            'kecamatan' => ['required'],
            'warna' => ['required'],
            'geojson' => ['required']

        ]);
        $kecamatan = KecamatanModel::create([
            'kecamatan' => $request->kecamatan,
            'warna' => $request->warna,
            'geojson' => $request->geojson,

        ]);
        return back()->with('success', 'Berhasil Ditambahkan');

    }


    public function show($id_kecamatan)
    {
        $kecamatan = [
            'kecamatan'=> $this->KecamatanModel->DetailData($id_kecamatan),
        ];
        return view('admin.kecamatan.show',$kecamatan);
    }


    public function edit($id_kecamatan)
    {
        //
    }


    public function update(Request $request, $id_kecamatan)
    {
         $request->validate([
            'kecamatan' => ['required'],
            'warna' => ['required'],
            'geojson' => ['required']
        ]);

        $kecamatan = $this->KecamatanModel->DetailData($id_kecamatan);
        $data = [
                'kecamatan' => $request->kecamatan,
                'warna' => $request->warna,
                'geojson' => $request->geojson,

            ];

        $this->KecamatanModel->UpdateData($id_kecamatan, $data);
        return redirect('admin/kecamatan')->with('success','Data Kecamatan anda berhasil di Update');
    }


    public function delete($id_kecamatan)
    {

        $this->KecamatanModel->DeleteData($id_kecamatan);
        return redirect('admin/kecamatan')->with('success','Data anda berhasil di Hapus');

    }
}
