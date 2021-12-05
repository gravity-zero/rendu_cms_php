<?php

namespace CMS_PHP\Controllers;
use ASSETS\Datas_checker;
use CMS_PHP\Controllers\Config\Jwt_generator;

class Articles
{
    private $article_repo;
    private $comment_repo;
    private $renderer;
    public $errors;

    function __construct($repo, $comment_repo, $renderer)
    {
        $this->article_repo = $repo;
        $this->comment_repo = $comment_repo;
        $this->renderer = $renderer;
    }

    public function getArticles()
    {
        $articles = $this->article_repo->allArticles();
        return $this->renderer->homepage($articles);
    }

    public function ApiPayload($jwt)
    {
        $jwt_parts = explode(".", $jwt);
        $payload_array = base64_decode($jwt_parts[1]);

        return json_decode($payload_array, true);
    }

    public function ApiSubmit($jwt_key)
    {
        if($_POST){
            $jwt_gen = new Jwt_generator();

            if($jwt_gen->JwtControl($jwt_key)){
                $payload = $this->ApiPayload($jwt_key);
                $_POST["user_id"] = $payload["user_id"];

                $article_id = $this->article_repo->insert_article($_POST);
                echo json_encode(["success" => ["l'id de votre article" => $article_id]]);
            }
        }
    }

    public function submitArticle()
    {
        if($_POST)
        {
            $array_control = [
                "title" => ["required", "is_string", "lenght_greater" => 5, "error_message" => "Le champs titre n'est pas correctement renseigné ou est inférieur à 5 caractères"],
                "img_url" => ["required", "is_string", "error_message" => "Le champs lien image n'est pas correctement renseigné"],
                "content" => ["required", "is_string", "lenght_greater" => 20,"error_message" => "Le champs Corps de l'article n'est correctement renseigné ou est inférieur à 5 caractères"],
                "author" => ["required", "is_string", "error_message" => "Le champs Auteur n'est pas correctement renseigné"]
            ];

            $datas_control = new datas_checker();
            $isCorrectDatas = $datas_control->check([$_POST], $array_control);

            if(!is_array($isCorrectDatas))
            {
                $_POST["user_id"] = $_SESSION["id"];
                $this->article_repo->insert_article($_POST);
                return $this->getArticles();
            } else {
                foreach($isCorrectDatas as $errors)
                {
                    foreach($errors as $key=>$error){
                        //On pourrait composer un message d'erreur plus fin
                        if($key == "error_message") $this->set_error($error);
                    }
                }
                return $this->renderer->error($this->errors);
            }
        }
        $this->set_error("Vous avez voulu créer un article vide");
        return $this->renderer->error($this->errors);
    }

    public function submitComment()
    {
        if($_POST){
            $this->comment_repo->insertArticleComment($_POST);
            return $this->getArticle($_POST["article_id"]);
        }
    }

    public function deleteComment($id)
    {
        $this->comment_repo->removeComment($id);
        return $this->renderer->homepage();
    }

    public function getArticle($id)
    {
        $article = $this->article_repo->article_id($id);
        $comments = $this->comment_repo->getCommentsArticle($id);
        return $this->renderer->article($article, $comments);
    }

    public function removeArticle($id)
    {
        $this->article_repo->delete($id);
        return $this->renderer->homepage();
    }

    private function set_error($message)
    {
        $this->errors []= $message;
        $this->errors = array_unique($this->errors, SORT_STRING );
    }
}