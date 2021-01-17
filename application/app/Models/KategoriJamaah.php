<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriJamaah extends Model
{
    use SoftDeletes;
    const TABLE_NAME = "st_kategori_jamaah";
    public $table = "st_kategori_jamaah";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
