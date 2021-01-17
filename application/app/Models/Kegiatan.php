<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "md_kegiatan";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
