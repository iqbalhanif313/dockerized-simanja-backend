<?php

namespace App\Models\Trans;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kepengurusan extends Model
{
    use SoftDeletes;
    public $table = 'trans_kepengurusan';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}
