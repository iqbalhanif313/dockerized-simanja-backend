<?php


namespace App\Services\Auth;


use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterService
{
    public function handleUserRegistration($request){
        $credential = $request->only('email', 'password');
        try{
            DB::transaction(function()use($credential){
                $user = new User();
                $user->email = $credential['email'];
                $user->password = Hash::make($credential['password']);
                $user->save();
                $user->roles()->attach(Role::where('name','user')->first()->id);
            });
        }catch (\Exception $e){
            throw($e);
            return false;
        }
        return true;
    }

}
