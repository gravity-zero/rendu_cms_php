<?php

namespace CMS_PHP\Controllers;

class ViewLoader
{
    private $views = "./Views/";
    private $basePath="http://localhost:5000";

    public function __construct($path=null)
    {
       if(isset($path)) $this->basePath = $path;
    }

    public function user_office($user)
    {
        require_once $this->views."UserOffice.php";
    }

    public function login()
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

    public function homepage($articles=null)
    {
        if($articles) require_once $this->views."Homepage.php";
        else header('Location: '.$this->basePath);
    }

    public function users_list($users)
    {
        require_once $this->views."UsersList.php";
    }

    public function article_form()
    {
        require_once $this->views."ArticleForm.php";
    }

    public function article($article)
    {
        require_once $this->views."Article.php";
    }
}
