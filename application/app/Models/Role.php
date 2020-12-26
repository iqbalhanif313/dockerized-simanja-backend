<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model
{
    protected $table = 'role';

    public function user(){
        return $this->belongsToMany(User::class,'user_role');
    }
}
