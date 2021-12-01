<?php

namespace CMS_PHP\Controllers;

class Homepage
{
    private $views = "./Views/";
    private $users_repo;d

    public function __construct($repo)
    {
        $this->users_repo = $repo;
    }

    public function check()
    {
        if($_SESSION && $this->login_repo->check_id($_SESSION["id"]))
        {
            require_once $this->views."Backoffice.php";
            return;
        }
        return $this->login_page();
    }

    private function login_page()
    {
        require_once $this->views."Login.php";
    }

    public function register_page()
    {
        require_once $this->views."Register.php";
    }
}