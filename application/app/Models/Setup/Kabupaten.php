<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kabupaten extends Model
{
    use SoftDeletes;
    protected $table = 'st_kab';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'st_provinsi_id');
    }
}
