<?php

class Kecamatan_model {
<<<<<<< HEAD
    private $table = 'kecamatan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllKecamatan() {
=======

    private $table = 'kecamatan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKecamatan()
    {
>>>>>>> dbabee18a9b5e9f09dd3ffe09b497ccdf2b1a95c
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}