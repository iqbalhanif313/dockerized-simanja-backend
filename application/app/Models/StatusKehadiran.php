<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusKehadiran extends Model
{
    use SoftDeletes;
    
    const TABLE_NAME = "st_status_kehadiran";
    public $table = "st_status_kehadiran";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
