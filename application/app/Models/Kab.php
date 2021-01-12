<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kab extends Model
{
    public $table = "st_kab";

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'st_provinsi_id');
    }
}
