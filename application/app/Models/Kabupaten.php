<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kabupaten extends Model
{
    use SoftDeletes;
    const TABLE_NAME = "st_kab";
    public $table = "st_kab";
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'st_provinsi_id');
    }
}
