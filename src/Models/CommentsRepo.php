<?php


namespace CMS_PHP\Models;
use \PDO;

class CommentsRepo
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getCommentsArticle($article_id)
    {
        $stmt = $this->db->connection->prepare("SELECT * FROM CMS_MVC.comments WHERE article_id = $article_id ORDER BY id DESC LIMIT 50");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommentsUser($user_id)
    {
        $stmt = $this->db->connection->prepare("SELECT * FROM CMS_MVC.comments WHERE user_id = $user_id ORDER BY id DESC LIMIT 50");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertArticleComment($infos)
    {
        $stmt = $this->db->connection->prepare("INSERT INTO CMS_MVC.comments (user_id, article_id, comment, comment_date) VALUES (:user_id, :article_id, :comment, NOW())");
        $stmt->execute([
            "user_id" => $infos["user_id"],
            "article_id" => htmlspecialchars($infos["article_id"]),
            "comment" => htmlspecialchars($infos["comment"]),
        ]);
    }

    public function removeComment($comment_id)
    {
        $stmt = $this->db->connection->prepare("DELETE FROM CMS_MVC.comments WHERE id=$comment_id");
        $stmt->execute();
    }
}