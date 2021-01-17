<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinsi extends Model
{
    use SoftDeletes;
    const TABLE_NAME = "st_provinsi";
    public $table = "st_provinsi";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
