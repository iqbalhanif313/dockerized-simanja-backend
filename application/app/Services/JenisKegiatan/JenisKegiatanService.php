<?php


namespace App\Services\JenisKegiatan;


use App\Models\JenisKegiatan;
use Illuminate\Support\Facades\DB;
use App\Repositories\JenisKegiatanRepository;

class JenisKegiatanService
{

    public function getAll(){
       return JenisKegiatan::all();
    }

    public function getRef()
    {
        $response = [];
        $datas = JenisKegiatan::all();
        foreach ($datas as $data){
            $response[] = [
                "id" => $data->id,
                "nama" => $data->nama,
                "id_nama" => $data->id.' - '.$data->nama
            ];
        }
        return $response;
    }

    public function getById($id)
    {
        return JenisKegiatan::find($id);
    }
    public function deleteById($id){
        DB::transaction(function()use($id){
            $jenisKegiatan = JenisKegiatan::find($id);
            $jenisKegiatan->delete();
        });
    }

    public function saveData($data){
        $jenisKegiatan = new JenisKegiatan();
        $jenisKegiatan->id = $data['id'];
        $jenisKegiatan->nama = $data['nama'];
        $jenisKegiatan->save();
    }

    public function updateData($data, $id){
        $jenisKegitan = JenisKegiatan::find($id);
        if(!$jenisKegitan){
            return false;
        }
        $jenisKegitan->nama = $data['nama'];
        $jenisKegitan->save();
        return true;
    }

}
