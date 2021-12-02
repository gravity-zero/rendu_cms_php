<?php

namespace CMS_PHP\Controllers;

class ViewLoader
{
    private $views = "./Views/";

    public function user_office()
    {
        require_once $this->views."UserOffice.php";
    }

    private function login()
    {
        require_once $this->views."Login.php";
    }

    public function register()
    {
        require_once $this->views."Register.php";
    }
    
    public function error($errors)
    {
        require_once $this->views."Error.php";

    }

    public function homepage()
    {
        require_once $this->views."Homepage.php";
    }
}