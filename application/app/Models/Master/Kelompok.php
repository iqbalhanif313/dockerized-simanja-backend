<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelompok extends Model
{
    use SoftDeletes;
    protected $table = 'md_kelompok';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;

    public function jamaah() {
        return $this->hasMany('App\Models\Master\Jamaah', 'md_kelompok_id');
    }
}
