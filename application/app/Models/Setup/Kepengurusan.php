<?php


namespace App\Models\Setup;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kepengurusan extends Model
{
    use SoftDeletes;
    protected $table = 'st_kepengurusan';
    protected $guarded = [];
    protected $dates = ['deleted_at'];
    public $incrementing = false;
}
