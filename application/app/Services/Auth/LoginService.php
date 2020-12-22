<?php


namespace App\Services\Auth;


class LoginService
{

    public function buildResponse(){
        $user = app('auth')->user();
        // $roles = $user->roles()->get();
        $detail = $user->detailJamaah;

        $response['email']= $user->email;
        $response['info']['nama'] = $detail->nama;
        $response['info']['jenis_kelamin'] = $detail->jenis_kelamin;
        $response['info']['nik'] = $detail->nik;
        $response['info']['tempat_lahir'] = $detail->tempat_lahir;
        $response['info']['hp'] = $detail->hp;
        $response['info']['alamat'] = $detail->alamat;
        $response['info']['kelompok'] = $detail->kelompok;
        $response['info']['kel'] = $detail->st_kel_id;
        $response['info']['kab'] = $detail->st_kab_id;
        $response['info']['provinsi'] = $detail->st_provinsi_id;
        $response['info']['status'] = $detail->status;

        // foreach ($roles as $role) {
        //     $response['roles'][] = $role->name;
        // }
        return $response;
    }

}
