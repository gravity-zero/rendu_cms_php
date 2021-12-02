<?php

namespace CMS_PHP\Models;

class UsersRepo
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function check_id($id)
    {
        $stmt = $this->db->connection->prepare("SELECT * FROM CMS_MVC.users WHERE id = $id");
        $stmt->query();
        $count = $stmt->fetchColumn();

        if($count > 0) return true;
        return false;
    }

    public function register($infos)
    { // Ajouter un contrôle sur l'email
        if(!$_SESSION["id"] || !$this->check_id($_SESSION["id"])){
            $stmt = $this->db->connection->prepare("INSERT INTO CMS_MVC.users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
            $stmt->execute([
                "firstname" => htmlspecialchars($infos["firstname"]),
                "lastname" => htmlspecialchars($infos["lastname"]),
                "email" => htmlspecialchars($infos["email"]),
                "password" => htmlspecialchars($infos["password"])
            ]);

            return $this->db->connection->lastInsertId();
        }
        return false;
    }

    public function delete($id)
    {
        $stmt = $this->db->connection->prepare("DELETE FROM CMS_MVC.users WHERE id=$id");
        $stmt->execute();
    }

    public function update($id)
    {

    }

    public function select()
    {
        $stmt = $this->db->connection->prepare("SELECT * FROM CMS_MVC.users ORDER BY id DESC LIMIT 50");
        $stmt->execute();
        return $stmt->FETCH_ASSOC();
    }

}