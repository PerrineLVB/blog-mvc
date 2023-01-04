<?php
require_once './model/DBconnect.php';
require_once './model/classes/Comment.php';

class CommentManager
{
    public static function getCommentsByPostId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT * FROM t_comment WHERE id_post = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
        return $comments;
    }

    public static function getAuthorByCommentId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT pseudo FROM t_comment JOIN t_user ON t_comment.id_user = t_user.id_user WHERE t_comment.id_comment = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $author = $stmt->fetch();
        return $author;
    }

    public static function addComment($comment)
    {
        
    }
}