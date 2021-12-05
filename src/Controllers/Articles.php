<?php

namespace CMS_PHP\Controllers;
use ASSETS\Datas_checker;

class Articles
{
    private $article_repo;
    private $renderer;
    public $errors;

    function __construct($repo, $renderer)
    {
        $this->article_repo = $repo;
        $this->renderer = $renderer;
    }

    public function getArticles()
    {
        $articles = $this->article_repo->allArticles();
        return $this->renderer->homepage($articles);
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

    public function getArticle($id)
    {
        $article = $this->article_repo->article_id($id);
        return $this->renderer->article($article);
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