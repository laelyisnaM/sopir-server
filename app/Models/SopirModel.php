<?php

namespace App\Models;

use CodeIgniter\Model;

class SopirModel extends Model
{
    protected $table      = 'sopir'; // Nama tabel sopir
    protected $primaryKey = 'id_sopir'; // Primary key dari tabel
    protected $allowedFields = [
        'id_sopir',
        'nik_sopir', 
        'nama_sopir', 
        'nomor_telepon', 
        'email', 
        'alamat', 
        'status_sopir', 
        'tarif_per_hari'
    ]; 
    
    // Method untuk mengambil semua data sopir
    public function getSopir()
    {
        // Mengambil semua data dari tabel sopir
        return $this->findAll();
    }

    // Method untuk mengambil data sopir berdasarkan id
    public function getSopirById($id_sopir)
    {
        // Mengambil data sopir berdasarkan id
        return $this->find($id_sopir);
    }

    // Method untuk menyimpan data baru atau memperbarui data yang sudah ada
    public function saveSopir($data)
    {
        // Menyimpan data baru atau memperbarui data yang ada jika primary key sudah ada
        return $this->save($data);
    }

    // Method untuk memperbarui data sopir berdasarkan id
    public function updateSopir($id_sopir, $data)
    {
        // Menggunakan method update() dari CodeIgniter Model untuk memperbarui data
        return $this->update($id_sopir, $data);
    }

    // Method untuk menghapus data sopir berdasarkan id
    public function deleteSopir($id_sopir)
    {
        // Menggunakan method delete() untuk menghapus data sopir berdasarkan id
        return $this->delete($id_sopir);
    }
}