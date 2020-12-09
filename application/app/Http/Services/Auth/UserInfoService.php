<?php


namespace App\Http\Services\Auth;


class UserInfoService
{

    public function buildResponse(){
        $user = app('auth')->user();
        $roles = $user->roles()->get();
        $detail = $user->detailJamaah;

        $response['email']= $user->email;
        $response['info']['name'] = $detail->nama;
        $response['info']['jenis_kelamin'] = $detail->jenis_kelamin;
        $response['info']['nik'] = $detail->nik;
        $response['info']['tempat_lahir'] = $detail->tempat_lahir;
        $response['info']['hp'] = $detail->hp;
        $response['info']['alamat'] = $detail->alamat;
        $response['info']['kelompok'] = $detail->kelompok;
        $response['info']['kel'] = $detail->kel;
        $response['info']['kab'] = $detail->kab;
        $response['info']['provinsi'] = $detail->provinsi;
        $response['info']['status'] = $detail->status;

        foreach ($roles as $role) {
            $response['roles'][] = $role->name;
        }
        return response()->json($response);
    }

}
