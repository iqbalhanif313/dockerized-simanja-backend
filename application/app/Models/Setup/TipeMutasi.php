<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipeMutasi extends Model
{
    use SoftDeletes;
    protected $table = 'st_tipe_mutasi';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}
