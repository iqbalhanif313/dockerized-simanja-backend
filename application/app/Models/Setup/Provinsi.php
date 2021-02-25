<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinsi extends Model
{
    use SoftDeletes;
    protected $table = 'st_provinsi';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}
