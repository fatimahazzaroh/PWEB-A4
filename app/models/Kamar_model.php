<?php

class Kamar_model {
    private $table = 'kamar';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllKamar() {
        $this->db->query('SELECT * FROM jenis_kamar');
        $jenisKamarList = $this->db->resultSet();

        foreach ($jenisKamarList as $jenisKamar) {
            $jenisKamar['active_count'] = $this->countKamar($jenisKamar['id']);
        }
        return $jenisKamarList;
    }
    
    public function countKamar($jenis_kamar_id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE jenis_kamar_id=:jenis_kamar_id AND status = "enable"');
        $this->db->bind('jenis_kamar_id', $jenis_kamar_id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getKamarById($id){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahKamar($data) {
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
}