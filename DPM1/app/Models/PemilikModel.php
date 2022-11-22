<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PemilikModel extends Model
{
    protected $fillable = ['nama','nik','nib','sku','kbli','no_hp','alamat_pribadi','email'];
    protected $keyType ='string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $item->id = (string) Str::orderedUuid();
        });
    }

    public $table = "tbl_pemilik";

    public function AllData()
    {
       return DB::table('tbl_pemilik')->get();
    }

}
