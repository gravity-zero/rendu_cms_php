<?php

namespace CMS_PHP\Models;

use \PDO;

class ArticlesRepo
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function allArticles()
    {
        $stmt = $this->db->connection->prepare("SELECT * FROM CMS_MVC.articles ORDER BY id DESC LIMIT 50");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_article($article)
    {
        $stmt = $this->db->connection->prepare("INSERT INTO CMS_MVC.articles (user_id, title, img_url, content, author, creation_date) VALUES (:user_id, :title, :img_url, :content, :author, NOW())");
        $stmt->execute([
            "user_id" => $_SESSION["id"],
            "title" => htmlspecialchars($article["title"]),
            "img_url" => htmlspecialchars($article["img_url"]),
            "content" => htmlspecialchars($article["content"]),
            "author" => htmlspecialchars($article["author"]),
        ]);
    }

    public function article_id($id)
    {
        $stmt = $this->db->connection->prepare("SELECT * FROM CMS_MVC.articles WHERE id = $id");
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $stmt = $this->db->connection->prepare("DELETE FROM CMS_MVC.articles WHERE id = $id");
        $stmt->execute();
    }
}