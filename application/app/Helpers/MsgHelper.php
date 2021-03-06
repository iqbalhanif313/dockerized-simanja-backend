<?php


namespace App\Helpers;


class MsgHelper
{
    const LOAD_SUCCESS = 'Data berhasil dimuat!';
    const LOAD_FAIL = 'Data gagal dimuat!';
    const CREATE_SUCCESS = 'Data berhasil disimpan!';
    const CREATE_FAIL = 'Data gagal disimpan!';
    const UPDATE_SUCCESS = 'Data berhasil diperbarui!';
    const UPDATE_FAIL = 'Data gagal diperbarui!';
    const DELETE_SUCCESS = 'Data berhasil dihapus!';
    const DELETE_FAIL = 'Data gagal dihapus!';
    const ID_EXIST = 'Data gagal disimpan: ID sudah ada!';
    const USER_ID_EXIST = 'Data gagal disimpan: ID user sudah ada!';
    const JAM_CRASH = 'Jam selesai kurang dari jam mulai!';
}
