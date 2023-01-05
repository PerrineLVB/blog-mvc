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

    public static function getUsernameByCommentId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT pseudo FROM t_user JOIN t_comment ON t_comment.id_user = t_user.id_user WHERE t_comment.id_comment = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $author = $stmt->fetch();
        return $author;
    }

    public static function addComment($comment, $id_user, $id_post)
    {
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $query = "INSERT INTO t_comment (id_post, id_user, date, content) VALUES (:id_post, :id_user, '$date', :content)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id_post', $id_post);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':content', $comment);
        $stmt->execute();
    }
}