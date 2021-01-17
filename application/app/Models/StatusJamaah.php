<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusJamaah extends Model
{
    use SoftDeletes;
    const TABLE_NAME = "st_status_jamaah";
    public $table = "st_status_jamaah";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
