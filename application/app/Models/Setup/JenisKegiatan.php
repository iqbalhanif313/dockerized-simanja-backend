<?php


namespace App\Models\Setup;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKegiatan extends Model
{
    use SoftDeletes;
    protected $table = 'st_jenis_kegiatan';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;

}
