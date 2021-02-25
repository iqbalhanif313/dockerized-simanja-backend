<?php


namespace App\Models\Master;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jamaah extends Model
{
    use SoftDeletes;
    protected $table = 'md_jamaah';
    protected $primaryKey = 'nik';
    protected $guarded = [];
    public $incrementing = false;

    public function user() {
        return $this->belongsTo('App\Models\User', 'users_id');
    }

    public function kelompok() {
        return $this->belongsTo('App\Models\Master\Kelompok', 'md_kelompok_id');
    }

    public function kategori() {
        return $this->belongsTo('App\Models\Setup\KategoriJamaah', 'st_kategori_jamaah_id');
    }

    public function status() {
        return $this->belongsTo('App\Models\Setup\StatusJamaah', 'st_status_jamaah_id');
    }

    public function provinsi() {
        return $this->belongsTo('App\Models\Setup\Provinsi', 'st_provinsi_id');
    }

    public function kabupaten() {
        return $this->belongsTo('App\Models\Setup\Kabupaten', 'st_kab_id');
    }

    public function kecamatan() {
        return $this->belongsTo('App\Models\Setup\Kecamatan', 'st_kec_id');
    }

    public function kelurahan() {
        return $this->belongsTo('App\Models\Setup\Kelurahan', 'st_kel_id');
    }
}
