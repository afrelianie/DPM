<?php

namespace App\Http\Controllers;
use App\Models\ModelPemilik;
use Illuminate\Http\Request;
use App\Models\KecamatanModel;
use App\Models\CategoryModel;
use App\Models\UmkmModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        // $kecamatan['kecamatan'] = KecamatanModel::count();
        // $category['category'] = CategoryModel::count();
        // $umkm['umkm'] = UmkmModel::count();
        // $user['user'] = User::count();


        $data = [
            'umkm'=> DB::table('tbl_umkm')->count(),
            'category'=> DB::table('tbl_category')->count(),
            'user'=> DB::table('users')->count(),
            'kecamatan'=> DB::table('tbl_kecamatan')->count(),
        ];

        return view('admin.home', $data);
        // return view('admin.home', $kecamatan,$category,$umkm,$user);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request) {
        // dd($request->all());

    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
