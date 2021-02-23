<?php


namespace App\Services\MdJamaah;

use App\Repositories\JamaahRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class JamaahService
{
    protected $repository;

    public function __construct(JamaahRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getRef() {
        return $this->repository->getRef();
    }

    public function getById($id)
    {
        return $this->repository->getById($id)->original;
    }

    public function create($data)
    {
        DB::beginTransaction();

        try {
            $user_is_exist = $this->repository->checkIfUserExist($data['nik'], ($data['users_id'] ?? -1));
            if ($user_is_exist) throw new InvalidArgumentException('ID User sudah ada!');
            $result = $this->repository->create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to create jamaah data');
        }

        DB::commit();

        return $result;
    }

    public function update($data, $nik) {
        DB::beginTransaction();

        try {
            $user_is_exist = $this->repository->checkIfUserExist($data['nik'], ($data['user_id'] ?? -1));
            if ($user_is_exist) throw new InvalidArgumentException('ID User sudah ada!');
            $result = $this->repository->update($data, $nik);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Unable to update jamaah data');
        }

        DB::commit();

        return $result;
    }

    public function delete($nik) {
        DB::beginTransaction();

        try {
            $this->repository->delete($nik);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());
            return false;
        }

        DB::commit();

        return true;
    }
}
