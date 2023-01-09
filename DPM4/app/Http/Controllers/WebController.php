<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebModel;
use App\Models\KecamatanModel;
use App\Models\UmkmModel;
use App\Models\PemilikModel;
use Illuminate\Support\Facades\DB;


class WebController extends Controller
{
    public function __construct()
    {
        $this->WebModel = new WebModel();
        // $this->middleware('auth');
    }

    public function welcome()
    {
        if(isset($_GET['query']) && strlen($_GET['query']) > 2){
            $search_text = $_GET['query'];
            $countries = DB::table('tbl_pemilik')->where('nama','LIKE','%'.$search_text.'%')->paginate(3);
            $countries->appends($request->all());
            return view('search',['countries'=>$countries]);

        }

        $data =
        [
            'title'=> 'Pemetaan',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'umkm' => $this->WebModel->AllDataUmkm(),
            'category' => $this->WebModel->DataCategory(),
            'pemilik'=> $this->WebModel->DataPemilik(),
        ];
        return view('welcome', $data);

    }

    public function kecamatan($id_kecamatan)
    {
        $kec = $this->WebModel->DetailKecamatan($id_kecamatan);
        $data =
        [
            'title'=> 'Kecamatan '. $kec->kecamatan,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'umkm' => $this->WebModel->DataUmkm($id_kecamatan),
            'category' => $this->WebModel->DataCategory(),
            'pemilik'=> $this->WebModel->DataPemilik(),
            'kec' => $kec,
        ];
        return view('kecamatan', $data);

    }

    public function category($id_category)
    {
        $um = $this->WebModel->DetailCategory($id_category);
        $data =
        [
            'title'=> 'Skala Umkm '. $um->name,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'umkm' => $this->WebModel->DataUmkmCategory($id_category),
            'category' => $this->WebModel->DataCategory(),
            'pemilik'=> $this->WebModel->DataPemilik(),
        ];
        return view('usaha', $data);

    }

    public function detail($id_umkm)
    {
        $umkm = $this->WebModel->DetailDataUmkm($id_umkm);
        $data =
        [
            'title'=> 'Detail '. $umkm->umkm,
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'category' => $this->WebModel->DataCategory(),
            'pemilik'=> $this->WebModel->DataPemilik(),
            'umkm' => $umkm,

        ];
        return view('detail', $data);

    }




    // public function search(Request $request)
    // {
    //     if (Auth::user()->role_name=='admin')
    //     {
    //     $category = DB::table('tbl_category')->get();
    //     $kecamatan = DB::table('tbl_kecamatan')->get();


    //     if($request->name)
    //     {
    //         $result = CategoryModel::where('name','LIKE','%'.$request->name.'%')->get();
    //     }
    //     if($request->kecamatan)
    //     {
    //         $result = KecamatanModel::where('kecamatan','LIKE','%'.$request->kecamatan.'%')->get();
    //     }
    //     if($request->name && $request->kecamatan)
    //     {
    //         $result = CategoryModel::where('name','LIKE','%'.$request->name.'%')
    //                     ->Where('kecamatan','LIKE','%'.$request->kecamatan.'%')->get();
    //     }
    //     return view('kecamatan',compact('category','kecamatan'));

    //     }
    //     else
    //     {
    //         return redirect()->route('welcome');
    //     }
    // }



    public function notfound(){
        return view('auth.404');
    }



    public function search(Request $request)
    {
        if(isset($_GET['query']) && strlen($_GET['query']) > 2){
            $search_text = $_GET['query'];
            $countries = DB::table('tbl_pemilik')->where('nama','LIKE','%'.$search_text.'%')->paginate(3);
            $countries->appends($request->all());
            return view('search',['countries'=>$countries]);


        }else{
            return view('search');
        }
    }










    public function kbli()
    {
        $data =
        [
            'title'=> 'Pemetaan',
            'kecamatan' => $this->WebModel->DataKecamatan(),
            'umkm' => $this->WebModel->AllDataUmkm(),
            'category' => $this->WebModel->DataCategory(),
            'pemilik'=> $this->WebModel->DataPemilik(),
        ];
        return view('admin.kbli.index', $data);

    }
}





