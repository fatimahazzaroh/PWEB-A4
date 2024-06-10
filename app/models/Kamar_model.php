<?php

class Kamar_model {
    private $table = 'kamar';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllKamar() {
        $this->db->query('SELECT jk.*, COUNT(k.status) as total
        FROM jenis_kamar jk LEFT JOIN kamar k ON jk.id = k.jenis_kamar_id
        AND k.status = "enable"
        GROUP BY jk.id');
        return $this->db->resultSet();
    }

    public function getKamarById($id) {
        $this->db->query('SELECT * FROM jenis_kamar WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    
    public function updateKamar($data) {
        $query = "UPDATE jenis_kamar SET jenis_kamar = :jenis_kamar, harga = :harga, deskripsi = :deskripsi WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('jenis_kamar', $data['jenis_kamar']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->execute();
        return $this->db->rowCount();
    }    

    public function addKamar($data) {
        $query = "INSERT INTO jenis_kamar (jenis_kamar, harga, deskripsi)
                    VALUES
                    (:jenis_kamar, :harga, :deskripsi)";
        $this->db->query($query);
        $this->db->bind('jenis_kamar', $data['jenis_kamar']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editKamar($id, $data) {
        $query = "UPDATE jenis_kamar SET jenis_kamar = :jenis_kamar, harga = :harga, deskripsi = :deskripsi WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('jenis_kamar', $data['jenis_kamar']);
        $this->db->bind('harga', $data['harga']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function getJenisKamar() {
        $this->db->query('SELECT * FROM jenis_kamar');
        return $this->db->resultSet();
    }
    public function getNoKamar() {
        $this->db->query('SELECT no_kamar FROM ' . $this->table . ' WHERE status = "enable"');
        return $this->db->resultSet();
    }

    public function getNoKamar1($jenis_kamar_id) {
        $this->db->query('SELECT no_kamar FROM ' . $this->table . ' WHERE jenis_kamar_id = :jenis_kamar_id AND status = "enable"');
        $this->db->bind(':jenis_kamar_id', $jenis_kamar_id);
        return $this->db->resultSet();
    }

    
}