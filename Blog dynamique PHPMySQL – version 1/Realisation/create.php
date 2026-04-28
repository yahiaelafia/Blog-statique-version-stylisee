<?php
require_once 'article.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        
        $imageFile = $_FILES['image'];
        $imageName = time() . '_' . $imageFile['name']; 
        $targetDir = "uploads/";
        $targetPath = $targetDir . $imageName;
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        if (move_uploaded_file($imageFile['tmp_name'], $targetPath)) {
            if (Article::create($title, $price, $targetPath)) {
                header("Location: index.php");
                exit();
            }
        } else {
            echo "Ereurr Folder";
        }
    } else {
        echo "Image pas corect";
    }
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylecreate.css">
    <title>Ajouter un Produit</title>
</head>
<body>
    <header>    <h1>Ajouter un produit </h1>
</header>
    <form   action="" method="POST" enctype="multipart/form-data" >
        
        <label>Image du produit:</label>
        <input type="file" name="image" accept="image/*" required>
        
        <label>Nom du produit:</label>
        <input type="text" name="title" placeholder="Nom de produit" required>
        
        <label>Prix:</label>
        <input type="number"  name="price" placeholder="Prix" required>
        <span>
            <button type="submit">Enregistrer</button>
        <a href="index.php">Annuler</a>
        </span>
        
    </form>
</body>
</html>