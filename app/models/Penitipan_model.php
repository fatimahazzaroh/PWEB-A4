<?php
class Penitipan_model {
    private $table = 'penitipan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllPenitipanBooking($roles_id, $individuals_id) {
        $query ='
            SELECT p.*, i.*, k.*, jk.*
            FROM ' . $this->table . ' p
            JOIN individuals i ON p.individuals_id = i.id
            JOIN kamar k ON p.kamar_id = k.id
            JOIN jenis_kamar jk ON k.jenis_kamar_id = jk.id
            JOIN status s ON p.status_id = s.id
            WHERE p.status_id = 1';

        if ($roles_id == 3) {
            $query .= ' WHERE p.individuals_id = :individuals_id';
        } 
        $this->db->query($query);
        if ($roles_id == 3) {
        $this->db->bind('individuals_id', $individuals_id);
        }
    return $this->db->resultSet();
    }

    public function updateStatusBooking($id, $status) {
        $query = "UPDATE $this->table SET status = :status WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('status', $status);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllPenitipanProgress($roles_id, $individuals_id) {
        $query ='
            SELECT p.*, i.*, k.*, jk.*
            FROM ' . $this->table . ' p
            JOIN individuals i ON p.individuals_id = i.id
            JOIN kamar k ON p.kamar_id = k.id
            JOIN jenis_kamar jk ON k.jenis_kamar_id = jk.id
            JOIN status s ON p.status_id = s.id
            WHERE p.status_id = 2';
        if ($roles_id == 3) {
            $query .= ' WHERE p.individuals_id = :individuals_id';
        } 
        $this->db->query($query);
        if ($roles_id == 3) {
        $this->db->bind('individuals_id', $individuals_id);
        }
    return $this->db->resultSet();
    }

    public function getAllPenitipanDone($roles_id, $individuals_id) {
        $query ='
            SELECT p.*, i.*, k.*, jk.*
            FROM ' . $this->table . ' p
            JOIN individuals i ON p.individuals_id = i.id
            JOIN kamar k ON p.kamar_id = k.id
            JOIN jenis_kamar jk ON k.jenis_kamar_id = jk.id
            JOIN status s ON p.status_id = s.id
            WHERE p.status_id = 3';
        if ($roles_id == 3) {
            $query .= ' WHERE p.individuals_id = :individuals_id';
        } 
        $this->db->query($query);
        if ($roles_id == 3) {
        $this->db->bind('individuals_id', $individuals_id);
        }
    return $this->db->resultSet();
    }
}