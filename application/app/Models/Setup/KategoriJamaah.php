<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriJamaah extends Model
{
    use SoftDeletes;
    protected $table = 'st_kategori_jamaah';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}
