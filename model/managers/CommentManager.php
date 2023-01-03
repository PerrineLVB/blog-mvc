<?php
require_once 'model/DBconnect.php';
require_once 'model/classes/Comment.php';

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
}