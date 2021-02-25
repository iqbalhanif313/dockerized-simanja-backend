<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusKehadiran extends Model
{
    use SoftDeletes;
    protected $table = 'st_status_kehadiran';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}
