<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UmkmModel extends Model
{
    protected $guarded =['id_umkm'];
    protected $fillable = ['umkm','id_category','id_kecamatan','id_pemilik','alamat','lokasi','tki','investasi','foto','skala'];
    protected $keyType ='string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->id_umkm = (string) Str::orderedUuid();
        });
    }
    public $table = "tbl_umkm";


    public function products(){
    return $this->belongsTo('App\Models\UmkmModel');

    }


    public function AllData()
    {
        return DB::table('tbl_umkm')
            ->join('tbl_category', 'tbl_category.id_category', '=', 'tbl_umkm.id_category')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_umkm.id_kecamatan')
            ->join('tbl_pemilik', 'tbl_pemilik.id', '=', 'tbl_umkm.id_pemilik')
            // ->select('tbl_category.name', 'tbl_kecamatan.kecamatan')
            ->get();
    }

    public function StoreData($data)
    {
        DB::table('tbl_umkm')
            ->store($data);
    }

    public function DetailData($id_umkm)
    {
        return DB::table('tbl_umkm')
            ->join('tbl_category', 'tbl_category.id_category', '=', 'tbl_umkm.id_category')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan', '=', 'tbl_umkm.id_kecamatan')
            ->join('tbl_pemilik', 'tbl_pemilik.id', '=', 'tbl_umkm.id_pemilik')
            ->where('id_umkm', $id_umkm)->first();
    }

    public function UpdateData($id_umkm, $data)
    {
        DB::table('tbl_umkm')
            ->where('id_umkm', $id_umkm)
            ->update($data);
    }

    public function DeleteData($id_umkm)
    {
        DB::table('tbl_umkm')
            ->where('id_umkm', $id_umkm)
            ->delete();
    }



}
