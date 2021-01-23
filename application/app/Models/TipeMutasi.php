<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipeMutasi extends Model
{
    use SoftDeletes;
    
    const TABLE_NAME = "st_tipe_mutasi";
    public $table = "st_tipe_mutasi";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
