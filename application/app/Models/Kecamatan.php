<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use SoftDeletes;
    const TABLE_NAME = "st_kec";
    public $table = "st_kec";
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'st_kab_id');
    }
}
