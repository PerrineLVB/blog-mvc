<?php 

require_once './model/DBconnect.php';
require_once './model/classes/Category.php';
require_once './model/classes/Post.php';

class CategoryManager {

    public static function getAllCategories(){
        $dbh = dbconnect();
        $query = "SELECT * FROM t_category";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories;
    }

    public static function getCategoriesByPostId($id){
        $dbh = dbconnect();
        $query = "SELECT t_category.id_category, category_name FROM t_category  JOIN t_post_category ON t_category.id_category = t_post_category.id_category JOIN t_post ON t_post_category.id_post = t_post.id_post WHERE t_post.id_post = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories; 
    }

    public static function getCategoryInfos($id){
        $dbh = dbconnect();
        $query = 'SELECT * FROM t_category WHERE id_category = :id';
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        $category = $stmt->fetch();
        return $category;
    }

    public static function addCategory($cat_name)
    {
        $dbh = dbconnect();
        $query = "INSERT INTO t_category (category_name) VALUES (:cat_name)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':cat_name', $cat_name);
        $stmt->execute();
        $lastCategory = $dbh->lastInsertId();
        return $lastCategory;
    }

    public static function deleteCategories($id){
        $dbh = dbconnect();
        $query = "DELETE FROM t_post_category WHERE id_post = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}