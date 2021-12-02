<?php

namespace CMS_PHP\Controllers;

class Homepage
{
    private $views = "./Views/";

    public function check()
    {
        require_once $this->views."Backoffice.php";
    }

    private function login_page()
    {
        require_once $this->views."Login.php";
    }

    public function register_page()
    {
        require_once $this->views."Register.php";
    }
    
    public function error($errors)
    {
        require_once $this->views."Error.php";

    }
}