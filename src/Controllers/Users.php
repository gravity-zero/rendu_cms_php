<?php

namespace CMS_PHP\Controllers;
use ASSETS\Datas_checker;

class Users
{
    private $users_repo;
    private $renderer;
    private $errors = [];

    public function __construct($repo, $renderer)
    {
        $this->users_repo = $repo;
        $this->renderer = $renderer;
        
    }

    private function set_user_session($id)
    {
        if($id) $_SESSION["id"] = $id;
    }

    public function register_form()
    {
        if($_POST)
        {
            $array_control = [
                "firstname" => ["required", "is_string", "not_alphanumeric", "lenght_greater" => 2, "error_message" => "Le champs nom n'est pas correctement renseigné"],
                "lastname" => ["required", "is_string", "not_alphanumeric", "lenght_greater" => 2, "error_message" => "Le champs prénom n'est pas correctement renseigné"],
                "email" => ["required", "is_string", "is_email", "error_message" => "Le champs email n'est pas pas une adresse e-mail valide"],
                "password" => ["required", "lenght_greater" => 6, "le mot de passe est inférieur à 6 caractères"]
            ];

            $datas_control = new datas_checker();
            $isCorrectDatas = $datas_control->check([$_POST], $array_control);

            if(!is_array($isCorrectDatas)) $this->users_repo->register();
            else {
                foreach($isCorrectDatas as $key=>$error)
                {
                    //On pourrait composer un message d'erreur plus fin
                    if($key == "error_message") $this->set_error($error);
                }
            }
        }
        if(count($this->errors) > 0) $this->renderer->error($this->errors);
        return $this->renderer->login();
    }

    public function delete_user()
    {

    }

    private function set_error($message)
    {
        $this->errors []= $message;
    }

    public function get_user($id)
    {
        //if($id)
    }

    public function get_users()
    {

    }

    public function logout($id)
    {
        if($id) session_destroy();
    }
}