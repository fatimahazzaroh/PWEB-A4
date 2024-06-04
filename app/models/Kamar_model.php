<?php

class Kamar_model {
    private $table = 'kamar';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllKamar() {
        $this->db->query('SELECT jk.*, COUNT(k.status) as total
        FROM jenis_kamar jk JOIN kamar k ON jk.id = k.jenis_kamar_id
        WHERE k.status = "enable"
        GROUP BY jk.id');
        return $this->db->resultSet();
    }

    public function getKamarById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->resultSet();
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
    public function updateKamar($id, $data) { }
    public function getJenisKamar() {
        $this->db->query('SELECT * FROM jenis_kamar');
        return $this->db->resultSet();
    }

    public function getNoKamar() {
        $this->db->query('SELECT no_kamar FROM ' . $this->table . ' WHERE status = "enable"');
        return $this->db->resultSet();
    }

    
}