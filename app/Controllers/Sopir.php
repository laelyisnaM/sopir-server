<?php

namespace App\Controllers;

use App\Models\SopirModel;
use CodeIgniter\RESTful\ResourceController;

class sopir extends ResourceController
{
    protected $sopirModel;

    public function __construct()
    {
        $this->sopirModel = new SopirModel();
    }

    public function index()
    {
        $data_sopir = $this->sopirModel->findAll();
        return $this->respond($data_sopir, 200, ['Content-Type' => 'application/json']);
    }
    
    public function create()
    {
        $input_data = $this->request->getJSON(true);
        if ($input_data) {
            $data = [
                'nik_sopir'        => $input_data['nik_sopir'] ?? '',
                'nama_sopir'       => $input_data['nama_sopir'] ?? '',
                'pnomor_telepon'   => $input_data['pnomor_telepon'] ?? '',
                'email'            => $input_data['email'] ?? '',
                'alamat'           => $input_data['alamat'] ?? '',
                'status_sopir'     => $input_data['status_sopir'] ?? '',
                'tarif_per_hari'   => $input_data['tarif_per_hari'] ?? '',
                'created_at'       => $input_data['created_at'] ?? date('Y-m-d H:i:s')
            ];

            if ($this->sopirModel->save($data)) {
                return $this->respondCreated(
                    ['status' => 'success', 'message' => 'Sopir berhasil ditambahkan']
                )->setContentType('application/json');
            } else {
                return $this->fail(
                    'Gagal menambah sopir', 
                    400
                )->setContentType('application/json');
            }
        } else {
            return $this->fail(
                'Invalid JSON input', 
                400
            )->setContentType('application/json');
        }
    }

    public function show($id_sopir = null)
    {
        $sopir = $this->sopirModel->getSopirById($id_sopir);

        if ($sopir) {
            return $this->respond($sopir, 200, ['Content-Type' => 'application/json']);
        } else {
            return $this->failNotFound('Sopir tidak ditemukan')->setContentType('application/json');
        }
    }

    public function update($id_sopir = null)
    {
        $input_data = $this->request->getJSON(true);

        if ($input_data) {
            $data = [
                'nik_sopir'        => $input_data['nik_sopir'] ?? '',
                'nama_sopir'       => $input_data['nama_sopir'] ?? '',
                'pnomor_telepon'   => $input_data['pnomor_telepon'] ?? '',
                'email'            => $input_data['email'] ?? '',
                'alamat'           => $input_data['alamat'] ?? '',
                'status_sopir'     => $input_data['status_sopir'] ?? '',
                'tarif_per_hari'   => $input_data['tarif_per_hari'] ?? '',
                'created_at'       => $input_data['created_at'] ?? date('Y-m-d H:i:s')
            ];

            if ($this->sopirModel->update($id_sopir, $data)) {
                return $this->respond(['status' => 'success', 'message' => 'Sopir berhasil diperbarui'], 200, ['Content-Type' => 'application/json']);
            } else {
                return $this->fail('Gagal memperbarui sopir', 400, ['Content-Type' => 'application/json']);
            }
        } else {
            return $this->fail('Invalid JSON input', 400, ['Content-Type' => 'application/json']);
        }
    }

    public function delete($id_sopir = null)
    {
        if ($this->sopirModel->delete($id_sopir)) {
            return $this->respondDeleted(['status' => 'success', 'message' => 'Sopir berhasil dihapus'], 200, ['Content-Type' => 'application/json']);
        } else {
            return $this->fail('Gagal menghapus sopir', 400, ['Content-Type' => 'application/json']);
        }
    }
}