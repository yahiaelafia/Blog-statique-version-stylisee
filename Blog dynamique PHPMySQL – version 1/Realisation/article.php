<?php
require_once 'db.php';

class Article {
    public static function all() {
        $db = new database();
        $conn = $db->getConnection();
        $sql = "SELECT * from products " ;
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function create($title,$price,$image) {
        $db = new database();
        $conn = $db->getConnection();
        $sql = "INSERT INTO products (name,price,image_url) VALUES (:name,:price,:image_url) " ;
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            "name"=>$title ,
            "price"=>$price,
            "image_url"=>$image

        ]);
    }
}
?>