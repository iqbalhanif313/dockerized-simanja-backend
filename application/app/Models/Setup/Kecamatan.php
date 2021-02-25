<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kecamatan extends Model
{
    use SoftDeletes;
    protected $table = 'st_kec';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;

    public function kabupaten(){
        return $this->belongsTo(Kabupaten::class, 'st_kab_id');
    }
}
