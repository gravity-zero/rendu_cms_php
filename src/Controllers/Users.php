<?php

namespace CMS_PHP\Controllers;
use ASSETS\Datas_checker;
use CMS_PHP\Controllers\Config\Jwt_generator;

class Users
{
    private $users_repo;
    private $renderer;
    private $errors = [];
    public $user = [];

    public function __construct($repo, $renderer)
    {
        $this->users_repo = $repo;
        $this->renderer = $renderer;
    }

    private function set_user_session($id)
    {
        if($id)
        {
            $_SESSION["id"] = $id;
            $_SESSION["admin"] = false;
        }
    }

    private function set_admin_session($id)
    {
        if($id == $_SESSION["id"]) $_SESSION["admin"] = true;
    }

    public function check()
    {
        if($_SESSION["id"] && $this->users_repo->check_id($_SESSION["id"])) return $this->renderer->Homepage();
        return $this->renderer->login();
    }

    private function generate_jwt()
    {
        $jwt = new Jwt_generator();
        return $jwt->getJwt($_SESSION["id"]);
    }

    public function user_profile()
    {
        if($_SESSION["id"])
        {
            $this->user = $this->users_repo->select_user($_SESSION["id"]);
            $this->user["token"] = $this->generate_jwt();
            return $this->renderer->user_office($this->user);
        }
        $this->set_error("Merci de vous connecter");
        return $this->renderer->error($this->errors);
    }

    public function login_verify()
    {
        if($_POST)
        {
            if($_POST["email"] && $_POST["password"])
            {
                $user = $this->users_repo->user_log($_POST["email"]);
                if(is_array($user))
                {
                    if(password_verify($_POST["password"], $user["password"]))
                    {
                        $this->set_user_session($user["id"]);
                        if($user["admin"] == 1) $this->set_admin_session($user["id"]);
                        return $this->renderer->Homepage();
                    }
                    $this->set_error("Un petit problème de mot de passe ?!");
                }else{
                    $this->set_error("Utilisateur inconnu");
                }
            }
            return $this->renderer->error($this->errors);
        }
        $this->set_error("Le formulaire est vide");
        return $this->renderer->error($this->errors);
    }

    public function register_form()
    {
        if($_POST)
        {
            $array_control = [
                "firstname" => ["required", "is_string", "not_alphanumeric", "lenght_greater" => 2, "error_message" => "Le champs prénom n'est pas correctement renseigné"],
                "lastname" => ["required", "is_string", "not_alphanumeric", "lenght_greater" => 2, "error_message" => "Le champs nom n'est pas correctement renseigné"],
                "email" => ["required", "is_string", "is_email", "error_message" => "Le champs email n'est pas pas une adresse e-mail valide"],
                "password" => ["required", "lenght_greater" => 6, "error_message" => "le mot de passe est inférieur à 6 caractères"]
            ];

            $datas_control = new datas_checker();
            $isCorrectDatas = $datas_control->check([$_POST], $array_control);

            if(!is_array($isCorrectDatas))
            {
                if(!$this->users_repo->user_exists(htmlspecialchars($_POST["email"])))
                {
                    $user_id = $this->users_repo->register($_POST);

                    if(is_int($user_id)) $this->set_user_session($user_id);
                    return $this->renderer->login();
                }
                $this->set_error("Un compte existe déjà pour cette adresse e-mail !");
            } else {
                foreach($isCorrectDatas as $errors)
                {
                    foreach($errors as $key=>$error){
                        //On pourrait composer un message d'erreur plus fin
                        if($key == "error_message") $this->set_error($error);
                    }
                }
            }
        }

        if(count($this->errors) > 0) return $this->renderer->error($this->errors);

        return $this->renderer->Homepage();
    }

    public function delete_user($id)
    {
        if($id && $id !== $_SESSION["id"])
        {
            $this->users_repo->delete($id);
        }
        return $this->renderer->homepage();
    }

    private function set_error($message)
    {
        $this->errors []= $message;
        // On évite les doublons (datas_checkeur peut retourner plusieurs erreurs pour plusieurs tests échoué sur la même donnée)
        $this->errors = array_unique($this->errors, SORT_STRING );
    }

    public function get_user($id)
    {
        $user = $this->users_repo->select_user($id);
        return $this->renderer->users_list($user); // A mettre dans une autre vue
    }

    public function get_users()
    {
        $users = $this->users_repo->select_users();
        return $this->renderer->users_list($users);
    }

    public function logout()
    {
        if($_SESSION["id"]) session_destroy();
        return $this->renderer->homepage();
    }
}
