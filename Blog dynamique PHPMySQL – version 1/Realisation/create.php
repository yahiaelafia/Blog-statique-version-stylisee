<?php
require_once 'article.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $imageName = $_FILES['image']['name'];
    $targetPath = "uploads2/" . $imageName;
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
        Article::create($title, $price, $targetPath);
        header("Location: create.php");
                exit();
    }
    else {
        echo "Le produit pas ajoute" ;
    }
}
?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="stylecreate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Ajouter un Produit</title>
</head>
<body>
    <header>    
        <h1>Ajouter un produit </h1>
        <a href="dashbord.php">Modification</a>
                    <a href=""><i class="fa-solid fa-right-from-bracket"></i></a>

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