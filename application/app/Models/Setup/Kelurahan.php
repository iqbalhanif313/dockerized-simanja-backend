<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{
    use SoftDeletes;
    protected $table = 'st_kel';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'st_kec_id');
    }
}
