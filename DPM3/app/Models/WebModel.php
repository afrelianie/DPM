<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WebModel extends Model
{
    public function DataKecamatan()
    {
       return DB::table('tbl_kecamatan')->get();
    }


    public function DataPemilik()
    {
       return DB::table('tbl_pemilik')->get();
    }


    public function DataCategory()
    {
       return DB::table('tbl_category')->get();
    }

    public function DetailCategory($id_category)
    {
       return DB::table('tbl_category')
       ->where('id_category', $id_category)->first();

    }

    public function DataUmkmCategory($id_category)
    {
        return DB::table('tbl_umkm')
        ->join('tbl_category', 'tbl_category.id_category', '=', 'tbl_umkm.id_category')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_umkm.id_kecamatan')
        ->join('tbl_pemilik', 'tbl_pemilik.id', '=', 'tbl_umkm.id_pemilik')
        ->where('tbl_umkm.id_category', $id_category)
        ->get();
    }

    public function DetailKecamatan($id_kecamatan)
    {
       return DB::table('tbl_kecamatan')
       ->where('id_kecamatan', $id_kecamatan)->first();

    }


    public function DataUmkm($id_kecamatan)
    {
        return DB::table('tbl_umkm')
        ->join('tbl_category', 'tbl_category.id_category', '=', 'tbl_umkm.id_category')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_umkm.id_kecamatan')
        ->join('tbl_pemilik', 'tbl_pemilik.id', '=', 'tbl_umkm.id_pemilik')
        ->where('tbl_umkm.id_kecamatan', $id_kecamatan)
        ->get();
    }

    public function AllDataUmkm()
    {
        return DB::table('tbl_umkm')
        ->join('tbl_category', 'tbl_category.id_category', '=', 'tbl_umkm.id_category')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_umkm.id_kecamatan')
        ->join('tbl_pemilik', 'tbl_pemilik.id', '=', 'tbl_umkm.id_pemilik')
        ->get();
    }

    public function DetailDataUmkm($id_umkm)
    {
        return DB::table('tbl_umkm')
        ->join('tbl_category', 'tbl_category.id_category', '=', 'tbl_umkm.id_category')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_umkm.id_kecamatan')
        ->join('tbl_pemilik', 'tbl_pemilik.id', '=', 'tbl_umkm.id_pemilik')
        ->where('id_umkm', $id_umkm)
        ->first();
    }


}
