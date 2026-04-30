<?php
session_start() ;
require_once 'db.php' ;
require_once 'users.php';
$message = '' ;
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (!empty($email) && !empty($password)) {
        if ($email === "admin@x-brand.com" && $password === "12345") {
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $password;
        header("Location: create.php") ;
        exit ;
        }
            $db = new database();
            $db = $db->getConnection();
            $user = new Users($db);
            $logeduser = $user->login($email,$password) ;
            if($logeduser){
                $_SESSION["id"] = $logeduser["id"];
                $_SESSION["email"] = $logeduser["email"];
                $_SESSION["password"] = $logeduser["password"];
                $_SESSION["username"] = $logeduser["username"];
                header("Location: index.php") ;
                exit ;

              } else {
                $message = "Access Denied: Invalid credentials.";
            }
        } else {
            $message = "System Error: Database connection failed.";
        }
    } else {
        $message = "Validation Error: All fields are required.";
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
                <div class="form-group"><?= $message ?>
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="exemple@email.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="• • • • • • " required>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fa-solid fa-right-to-bracket"></i> Connexion
                </button>
            </form>

            <div class="links">
                <p>Pas un copmte ?       <a href="registre.php">Créer le compte</a></p>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 X-BRAND, Tous droits réservés.</p>
    </footer>
</body>
</html>