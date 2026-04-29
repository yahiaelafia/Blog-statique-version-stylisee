<?php
require_once 'db.php' ;
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (!empty($email) && !empty($password)) {
        if ($email === "admin@x-brand.com" && $password === "12345") {
        header("Location: create.php") ;
        exit ;
        } else {
            echo "Le Mot de pass est incorecrt" ;
        }
        
    }
    
}



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - X-BRAND</title>
    <link rel="icon" href="assets/Gemini_Generated_Image_p0lvyep0lvyep0lv.png">
    <link rel="stylesheet" href="stylelogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <header>
        <h1>X-BRAND</h1>
    </header>

    <main>
        <div class="login-container">
            <h2>Se connecter</h2>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="exemple@email.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fa-solid fa-right-to-bracket"></i> Connexion
                </button>
            </form>

            <div class="links">
                <p><a href="index.php">Retour à l'accueil</a></p>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 X-BRAND, Tous droits réservés.</p>
    </footer>
</body>
</html>