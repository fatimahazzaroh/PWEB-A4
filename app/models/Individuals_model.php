<?php

class Individuals_model {
    private $table = 'individuals';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    public function login($data) {
        // var_dump($data);die;
        $result = $this->db->queryReturn('SELECT * FROM ' . $this->table . ' WHERE email=:email');
        $result->execute([
            'email' => $data['email']
        ]);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        // var_dump($user['password']);die;
        if($user && password_verify($data['password'], $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
    public function checkEmail($email)
    {
        $query = "SELECT * FROM individuals WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $email);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function register($data) {
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $alamatId = $this->db->lastInsertId();
        $query = "INSERT INTO individuals (nama, no_telp, alamat_id, email, password) 
        VALUES (:nama, :no_telp, :alamat_id, :email, :password)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('alamat_id', $alamatId);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $password);
        $this->db->execute();
        return $this->db->rowCount();
    }
}