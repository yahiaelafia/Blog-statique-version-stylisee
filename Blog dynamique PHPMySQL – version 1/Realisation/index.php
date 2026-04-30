<?php
session_start() ;
require_once 'db.php' ;
require_once 'article.php' ;
$products = Article::all();
if (isset ($_SESSION["id"])) {
    $islogedin = true ;
    $username = htmlspecialchars($_SESSION["username"]) ;
}else {
    $islogedin = false ;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleindex.css">
        <link rel="icon"  href="assets/Gemini_Generated_Image_p0lvyep0lvyep0lv.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>X-BRAND</title>
</head>
<body>
    <header>
        <h1>X-BRAND</h1>
        <span>
            <input type="search" placeholder="Rechercher...">
            <a href="apropos.php">À propos</a>
            <a href="contact.php">Contact</a>
        </span>
    </header>
        <main>
            <?php if ($islogedin): ?>
        <div class="user-welcome">
            <p>Bienvenue, <?php echo htmlspecialchars($username); ?>!</p>
        </div>
    <?php endif; ?>
    <div class="toutarticle">
        <?php foreach($products as $prod):?>
        <article>
            <img src="<?php echo htmlspecialchars($prod["image_url"]); ?>" alt="Product Image">
            <h2><?php echo $prod["name"]?></h2>
                <p><?php echo $prod["price"]?>$</p>
        </article>
        <?php endforeach ; ?>
        </main>

    <footer>
        <p>&copy; 2026 X-BRAND. Tous droits réservés.</p>
        <div>
            <span class="socialmedia">
                <p>Suivez-nous :</p>
            </span>
            <i class="fab fa-facebook"></i>
            <i class="fa-brands fa-x-twitter"></i>
            <i class="fab fa-instagram"></i>
        </div>
        <div>
            <span class="contactinfo">
            <p>Adresse : 13 Rue de Lux, 90090 Tanger, Maroc</p>
            <p>Email : contact@x-brand.com</p>
            <p>Téléphone : +212 5 9999 999</p>
            </span>
        </div>
    </footer>
</body>
</html>