<?php
class User {
    private $db;
    public function __construct(){
        $this->db = new Database;
    }
    public function findUserByEmail($email){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->checkIfExist();
    }
    public function register($data){
        $this->db->query('INSERT INTO users (nom, email, password) VALUES (:nom, :email, :password)');
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function findUser($email){
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->findOne();
    }

}