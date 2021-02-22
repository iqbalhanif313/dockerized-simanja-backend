<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelompok extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'md_kelompok';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public function jamaah() {
        return $this->hasMany('App\Models\Jamaah', 'md_kelompok_id');
    }
}
