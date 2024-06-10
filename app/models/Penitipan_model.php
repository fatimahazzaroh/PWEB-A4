<?php
class Penitipan_model {
    private $table = 'penitipan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllPenitipanBooking($roles_id, $individuals_id) {
        $query ='
            SELECT p.*, i.nama, jk.jenis_kamar, k.no_kamar
            FROM penitipan p
            JOIN individuals i ON p.individuals_id = i.id
            JOIN kamar k ON p.kamar_id = k.id
            JOIN jenis_kamar jk ON k.jenis_kamar_id = jk.id
            JOIN status s ON p.status_id = s.id
            WHERE p.status_id = 1';

        if ($roles_id == 3) {
            $query .= ' AND p.individuals_id = :individuals_id';
        } 
        $this->db->query($query);
        if ($roles_id == 3) {
        $this->db->bind('individuals_id', $individuals_id);
        }
    return $this->db->resultSet();
    }

    public function getAllPenitipanProgress($roles_id, $individuals_id) {
        $query ='
            SELECT p.*, i.nama, jk.jenis_kamar, k.no_kamar
            FROM ' . $this->table . ' p
            JOIN individuals i ON p.individuals_id = i.id
            JOIN kamar k ON p.kamar_id = k.id
            JOIN jenis_kamar jk ON k.jenis_kamar_id = jk.id
            JOIN status s ON p.status_id = s.id
            WHERE p.status_id = 2';
        if ($roles_id == 3) {
            $query .= ' AND p.individuals_id = :individuals_id';
        } 
        $this->db->query($query);
        if ($roles_id == 3) {
        $this->db->bind('individuals_id', $individuals_id);
        }
    return $this->db->resultSet();
    }

    public function getAllPenitipanDone($roles_id, $individuals_id) {
        $query ='
            SELECT p.*, i.nama, jk.jenis_kamar, k.no_kamar
            FROM ' . $this->table . ' p
            JOIN individuals i ON p.individuals_id = i.id
            JOIN kamar k ON p.kamar_id = k.id
            JOIN jenis_kamar jk ON k.jenis_kamar_id = jk.id
            JOIN status s ON p.status_id = s.id
            WHERE p.status_id = 3';
        if ($roles_id == 3) {
            $query .= ' AND p.individuals_id = :individuals_id';
        } 
        $this->db->query($query);
        if ($roles_id == 3) {
        $this->db->bind('individuals_id', $individuals_id);
        }
    return $this->db->resultSet();
    }

    public function addPenitipan($data) {
        $query = "INSERT INTO $this->table 
                    (individuals_id, tanggal_masuk, tanggal_keluar, kamar_id, nama_kucing, status_id) 
                VALUES 
                    (:individuals_id, :tanggal_masuk, :tanggal_keluar, :kamar_id, :nama_kucing, :status_id)";
        $this->db->query($query);
        $this->db->bind('individuals_id', $_SESSION['user']['id']); // Menggunakan id pengguna dari sesi
        $this->db->bind('tanggal_masuk', $data['tanggal_masuk']);
        $this->db->bind('tanggal_keluar', $data['tanggal_keluar']);
        $this->db->bind('kamar_id', $data['kamar_id']);
        $this->db->bind('nama_kucing', $data['nama_kucing']);
        $this->db->bind('status_id', $data['status_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateStatus($id, $status_id) {
        // $status_id = 2;
        $query = "UPDATE $this->table SET status_id = :status_id WHERE id = :id";
        // var_dump($query);
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':status_id', $status_id); 
        $this->db->execute();
        return $this->db->rowCount();
    }
    
}