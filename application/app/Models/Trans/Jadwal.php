<?php

namespace App\Models\Trans;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jadwal extends Model
{
    use SoftDeletes;
    protected $table = 'trans_jadwal';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}
