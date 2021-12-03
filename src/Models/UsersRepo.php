<?php

namespace CMS_PHP\Models;

use \PDO;

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
        $stmt->execute();

        if($stmt->rowCount() > 0) return true;
        return false;
    }

    public function user_exists($email)
    {
        $stmt = $this->db->connection->prepare("SELECT * FROM CMS_MVC.users WHERE email = '".$email."'");
        $stmt->execute();

        if($stmt->rowCount() > 0) return true;
        return false;
    }

    public function register($infos)
    {
            $stmt = $this->db->connection->prepare("INSERT INTO CMS_MVC.users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, :password)");
            $stmt->execute([
                "firstname" => htmlspecialchars($infos["firstname"]),
                "lastname" => htmlspecialchars($infos["lastname"]),
                "email" => htmlspecialchars($infos["email"]),
                "password" => htmlspecialchars(password_hash($infos["password"], PASSWORD_DEFAULT))
            ]);

            return $this->db->connection->lastInsertId();
    }

    public function delete($id)
    {
        $stmt = $this->db->connection->prepare("DELETE FROM CMS_MVC.users WHERE id=$id");
        $stmt->execute();
    }

    public function update($id)
    {

    }

    public function select_users()
    {
        $stmt = $this->db->connection->prepare("SELECT id, firstname, lastname, email, admin FROM CMS_MVC.users ORDER BY id DESC LIMIT 50");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select_user($id)
    {
        $stmt = $this->db->connection->prepare("SELECT * FROM CMS_MVC.users WHERE id= $id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}