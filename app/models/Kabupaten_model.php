<?php

class Kabupaten_model {

    private $table = 'kabupaten';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllKabupaten() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}