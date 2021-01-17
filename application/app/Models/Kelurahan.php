<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelurahan extends Model
{
    use SoftDeletes;
    const TABLE_NAME = "st_kel";
    public $table = "st_kel";
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public function kecamatan(){
        return $this->belongsTo(Kecamatan::class, 'st_kec_id');
    }
}
