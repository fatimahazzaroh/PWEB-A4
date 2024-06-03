<?php

class Alamat_model {
    private $table = 'alamat';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addAlamat($data) {
        $query = "INSERT INTO alamat (kabupaten_id, kecamatan_id, alamat) 
                    VALUES (:kabupaten_id, :kecamatan_id, :alamat)";
        $this->db->query($query);
        $this->db->bind('kabupaten_id', $data['kabupaten_id']);
        $this->db->bind('kecamatan_id', $data['kecamatan_id']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->execute();
        // return $this->db->rowCount();

        // Mengembalikan ID alamat yang baru saja diinsert
        return $this->db->lastInsertId();
    }
}