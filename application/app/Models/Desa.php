<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Desa extends Model
{
    use SoftDeletes;
    
    const TABLE_NAME = "st_desa";
    public $table = "st_desa";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
