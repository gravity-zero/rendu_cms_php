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
        $stmt->execute();
        $stmt->fetch();
    }

    public function register($infos)
    {
        $stmt = $this->db->connection->prepare("INSERT INTO CMS_MVC.users (firstname, lastname, email, password) VALUES (:firstname, :lastname, :email, password)");

        $stmt->execute([
            "firstname" => htmlspecialchars($infos["firstname"]),
            "lastname" => $infos["lastname"],
            "email" => $infos["email"],
            "password" => $infos["password"]
        ]);

        $stmt->fetch();

        return $stmt->PDO::lastInsertId();
    }

    public function delete($id)
    {
        $stmt = $this->db->connection->prepare("DELETE FROM CMS_MVC.users WHERE id=$id");
        $stmt->execute();
        $stmt->fetch();
    }

    public function update($id)
    {

    }

}