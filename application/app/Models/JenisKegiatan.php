<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKegiatan extends Model
{
    use SoftDeletes;
    const TABLE_NAME = "st_jenis_kegiatan";
    public $table = "st_jenis_kegiatan";
    public $incrementing = false;
    protected $dates = ['deleted_at'];

}
