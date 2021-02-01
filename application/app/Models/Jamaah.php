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
    
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'st_kel_id');
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'st_kec_id');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class,'st_kab_id');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class,'st_provinsi_id');
    }

    public function kelompok()
    {
        return $this->belongsTo(Kelompok::class,'md_kelompok_id');
    }

    public function kategori_jamaah()
    {
        return $this->belongsTo(KategoriJamaah::class,'st_kategori_jamaah_id');
    }

    public function status_jamaah()
    {
        return $this->belongsTo(StatusJamaah::class,'st_status_jamaah_id');
    }
}
