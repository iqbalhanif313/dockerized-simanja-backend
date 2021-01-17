<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;
    
    const TABLE_NAME = "st_level";
    public $table = "st_level";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
