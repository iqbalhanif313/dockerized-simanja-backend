<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jamaah extends Model
{
    use SoftDeletes;
    protected $table = 'md_jamaah';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\Models\User', 'users_id');
    }

    public function kelompok() {
        return $this->belongsTo('App\Models\Kelompok', 'md_kelompok_id');
    }

    public function kategori() {
        return $this->belongsTo('App\Models\KategoriJamaah', 'st_kategori_jamaah_id');
    }

    public function status() {
        return $this->belongsTo('App\Models\StatusJamaah', 'st_status_jamaah_id');
    }

    public function provinsi() {
        return $this->belongsTo('App\Models\Provinsi', 'st_provinsi_id');
    }

    public function kabupaten() {
        return $this->belongsTo('App\Models\Kabupaten', 'st_kab_id');
    }

    public function kecamatan() {
        return $this->belongsTo('App\Models\Kecamatan', 'st_kec_id');
    }

    public function kelurahan() {
        return $this->belongsTo('App\Models\Kelurahan', 'st_kel_id');
    }
}
