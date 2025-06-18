<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;
use CodeIgniter\HTTP\ResponseInterface;

class Buku extends BaseController
{
    protected $modelName = 'App\\Models\\BukuModel';
    protected $format = 'json';

    protected $model;

    public function __construct()
    {
        $this->model = new BukuModel();
    }

    public function index()
    {
    return $this->response->setJSON($this->model->findAll());
    }

    public function show($id = null)//Tampil data Buku
    {
        $data = $this->model->find($id);
        if (!$data){
            return $this->response->setStatusCode(404)->setJSON(['message' => "Buku dengan ID $id tidak ditemukan."]);

        }
        return $this->response->setJSON($data);
    }

     public function create()//Tambah data Buku
    {
        $data = $this->request->getJSON(true);

        if(!isset($data['judul'], $data['pengarang'], $data['penerbit'], $data['tahun_terbit'])){
            return $this->response->setStatusCode(400)->setJSON(['message' => 'judul, pengarang, dan tahun_terbit wajib diisi.']);
        }
        $this->model->insert($data);
        $data['id'] = $this->model->getInsertID();

        return $this->response->setStatusCode(201)->setJSON($data);
    }

      public function update($id = null)//Ubah data buku
    {
        $data = $this->request->getJSON(true);
        $data['id'] = $id;

        if (!isset($data['judul'], $data['pengarang'], $data['penerbit'], $data['tahun_terbit'])) {
            return $this->response->setStatusCode(400)
                ->setJSON(['message' => 'judul, pengarang, dan tahun_terbit wajib diisi.']);
        }

        if (!$this->model->find($id)) {
            return $this->response->setStatusCode(404)
                ->setJSON(['message' => "Buku dengan ID $id tidak ditemukan."]);
        }

        $this->model->update($id, $data);
        return $this->response->setJSON($data);
    }

     public function delete($id = null)//Hapus Data dosen
    {
        if (!$this->model->find($id)) {
            return $this->response->setStatusCode(404)
                ->setJSON(['message' => "Buku dengan ID $id tidak ditemukan."]);
        }

        $this->model->delete($id);
        return $this->response->setJSON(['message' => "Buku dengan ID $id berhasil dihapus."]);
    }

}
