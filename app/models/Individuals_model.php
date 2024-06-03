<?php

<<<<<<< HEAD
class Individuals_model {
    private $table = 'individuals';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }
    // make login process with checking email and password, and the password in db is encrypted (hashed)
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
=======
class Individuals_model
{
    private $table = 'individuals';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
>>>>>>> dbabee18a9b5e9f09dd3ffe09b497ccdf2b1a95c

    public function checkEmail($email)
    {
        $query = "SELECT * FROM individuals WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $email);
        $this->db->execute();
        return $this->db->rowCount();
    }

<<<<<<< HEAD
    public function register($data) {
=======
    public function addIndividuals($data)
    {
>>>>>>> dbabee18a9b5e9f09dd3ffe09b497ccdf2b1a95c
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
<<<<<<< HEAD
}
=======

    public function checkPassword($email, $password)
    {
        $query = "SELECT * FROM individuals WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $email);
        $this->db->execute();
        $result = $this->db->single(); // Assuming this fetches a single record as an array

        // Check if the result is valid and password matches
        if ($result && password_verify($password, $result['password'])) {
            return true;
        }
        return false;
    }

    public function getUserId($id)
    {
        $query = "SELECT * FROM individuals WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->single();
    }

    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM individuals WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $email);
        $this->db->execute();
        return $this->db->single();
    }

    public function login($data) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email');
        $this->db->bind('email', $data['email']);
        $user = $this->db->single();
        if(password_verify($data['password'], $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }


}
>>>>>>> dbabee18a9b5e9f09dd3ffe09b497ccdf2b1a95c
