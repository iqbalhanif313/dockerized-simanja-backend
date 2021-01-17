<?php


namespace App\Services\JenisKegiatan;


use App\Models\JenisKegiatan;
use Illuminate\Support\Facades\DB;

class JenisKegiatanService
{
    public function getAll(){
       return JenisKegiatan::all();
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
