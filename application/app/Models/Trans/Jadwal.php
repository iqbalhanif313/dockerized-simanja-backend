<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "trans_jadwal";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
