<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $guarded = [];
    public $table = "trans_presensi";
    public $incrementing = false;
}
