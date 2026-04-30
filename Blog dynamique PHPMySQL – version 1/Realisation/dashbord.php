<?php
require_once 'article.php' ;
session_start() ;
if (!isset($_SESSION['email']) && !empty($_SESSION['password']))  {
    header("Location: index.php") ; 
    exit ;
}
$db = new database() ;
$db->getConnection() ;
$posts = new Article() ;
$posts->all() ;
$allposts = $posts->all() ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des produits </title>
    <link rel="stylesheet" href="styleDSB.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <header>
        <a href="create.php">Retour</a>
    </header>
    <main>
        <table >
            <tr>
                <th>ID</th>
                <th>Nom de produit</th>
                <th>Price</th>
                <th>La date de création</th>
                <th><i class="fa-solid fa-trash"></i></th>

            </tr>
            <?php foreach ($allposts as $post):?>
            <tr>
                <td><?= $post['id']?></td>
                <td><?= $post['name']?></td>
                <td><?= $post['price']?></td>
                <td><?= date("Y/m/d" , strtotime($post['created_at']))?></td>
                <td class="action">
                    <a href="delete.php?id=<?=$post['id']?>">Suprimer</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
    </main>
</body>
</html>