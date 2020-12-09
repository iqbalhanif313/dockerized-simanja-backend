<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jamaah extends Model
{
    public $table = "md_jamaah";

    public function kel()
    {
        return $this->belongsTo(Kel::class, 'kel_id');
    }
    public function kec()
    {
        return $this->belongsTo(Kel::class, 'kec_id');
    }

    public function kab()
    {
        return $this->belongsTo(Kab::class,'kab_id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Kab::class,'provinsi_id');
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class,'st_kelompok_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class,'st_status_jamaah_id');
    }
}
