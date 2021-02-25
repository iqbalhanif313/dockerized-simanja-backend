<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use SoftDeletes;
    protected $table = 'md_kegiatan';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}
