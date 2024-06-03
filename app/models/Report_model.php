<?php

class Report_model {
    private $table = 'laporan';
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    public function getLaporanByPenitipanId($penitipan_id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE penitipan_id = :penitipan_id');
        $this->db->bind('penitipan_id', $penitipan_id);
        return $this->db->resultSet();
    }
    
    public function addLaporan($data, $penitipan_id) {
        $date = date("Y-m-d H:i:s");
        $file = $_FILES['gambar']['name'];
        $tmp_file = $_FILES['gambar']['tmp_name'];
        $gambar_link = 'img/gambarLaporan/' . $file;

        // Pindahkan file ke direktori yang diinginkan
        move_uploaded_file($tmp_file, $gambar_link);
        $query = "INSERT INTO laporan (tanggal, deskripsi, gambar, penitipan_id)
                VALUES
                (:tanggal, :deskripsi, :gambar, :penitipan_id)";
        $this->db->query($query);
        $this->db->bind('tanggal', $date);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $gambar_link);
        $this->db->bind('penitipan_id', $penitipan_id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}