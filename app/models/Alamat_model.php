<?php

class Alamat_model {
    private $table = 'alamat';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function addAlamat($data) {
        $kabupatenId = 1;
        $query = "INSERT INTO $this->table (kabupaten_id, kecamatan_id, alamat)
                    VALUES (:kabupaten_id, :kecamatan_id, :alamat)";
        $this->db->query($query);
        $this->db->bind('kabupaten_id', $kabupatenId);
        $this->db->bind('kecamatan_id', $data['kecamatan_id']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->execute();
        // return $this->db->rowCount();
        return $this->db->lastInsertId();
    }
    public function getAlamats() {
        $this->db->query('SELECT * FROM ' . $this->table);
    }
}