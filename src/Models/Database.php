<?php

namespace CMS_PHP\Models;

use \PDO;

class Database{

    public $connection;

    function __construct($dsn, $user, $password){
        try {
            $this->connection = new PDO($dsn, $user, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (\PDOException $e) {
            die('Impossible de se connecter au serveur MySQL: ' . $e->getMessage());
        }
    }
}
