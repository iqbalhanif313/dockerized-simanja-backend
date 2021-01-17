<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransKepengurusan extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public $table = "trans_kepengurusan";
    public $incrementing = false;
    protected $dates = ['deleted_at'];
}
