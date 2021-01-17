<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jamaah extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "md_jamaah";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
    
    public function kel()
    {
        return $this->belongsTo(Kel::class, 'st_kel_id');
    }
    public function kec()
    {
        return $this->belongsTo(Kel::class, 'st_kec_id');
    }

    public function kab()
    {
        return $this->belongsTo(Kab::class,'st_kab_id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class,'st_provinsi_id');
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class,'md_kelompok_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class,'st_status_jamaah_id');
    }
}
