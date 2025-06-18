<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use CodeIgniter\HTTP\ResponseInterface;

class Peminjaman extends BaseController
{
     protected $modelName = 'App\\Models\\PeminjamanModel';
    protected $format = 'json';

    protected $model;

    public function __construct()
    {
        $this->model = new PeminjamanModel();
    }

    public function index()
    {
        return $this->response->setJSON($this->model->findAll());
    }

    public function show($id = null)//Tampil data Peminjaman
    {
        $data = $this->model->find($id);
        if (!$data){
            return $this->response->setStatusCode(404)->setJSON(['message' => "Peminjaman dengan ID $id tidak ditemukan."]);

        }
        return $this->response->setJSON($data);
    }

    public function create()//Tambah data Peminjaman
    {
        $data = $this->request->getJSON(true);

        if(!isset($data['nama_peminjam'], $data['judul_buku'], $data['tanggal_pinjam'], $data['tanggal_kembali'])){
            return $this->response->setStatusCode(400)->setJSON(['message' => 'nama peminjam, judul buku, tanggal pinjam dan tanggal kembali wajib diisi.']);
        }
        $this->model->insert($data);
        $data['id'] = $this->model->getInsertID();

        return $this->response->setStatusCode(201)->setJSON($data);
    }

    public function update($id = null)//Ubah data Peminjaman
    {
        $data = $this->request->getJSON(true);
        $data['id'] = $id;

        if (!isset($data['nama_peminjam'], $data['judul_buku'], $data['tanggal_pinjam'], $data['tanggal_kembali'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['message' => 'nama peminjam, judul buku, tanggal pinjam dan tanggal kembali wajib diisi.']);
        }

        if (!$this->model->find($id)) {
            return $this->response->setStatusCode(404)
                ->setJSON(['message' => "Peminjaman dengan ID $id tidak ditemukan."]);
        }

        $this->model->update($id, $data);
        return $this->response->setJSON($data);
    }
    public function delete($id = null)//Hapus Data Peminjaman
    {
        if (!$this->model->find($id)) {
            return $this->response->setStatusCode(404)
                ->setJSON(['message' => "Peminjaman dengan ID $id tidak ditemukan."]);
        }

        $this->model->delete($id);
        return $this->response->setJSON(['message' => "Peminjaman dengan ID $id berhasil dihapus."]);
    }

}
