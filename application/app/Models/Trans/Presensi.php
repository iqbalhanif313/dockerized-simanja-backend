<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Presensi extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "trans_presensi";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
