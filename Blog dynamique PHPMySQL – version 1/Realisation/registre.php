<?php
require_once 'db.php' ;
require_once 'users.php' ;
$message = '' ;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    if (!empty($username) && !empty($email) && !empty($password)) {
        $database = new database();
        $db = $database->getConnection();
        $user = new Users($db) ;
            if ($db) {
            $user = new Users($db);
            if ($user->register($username, $email, $password)) {
                $message = "Protocol Success: Le compte créer.";
                header("location: login.php");
                exit ;
            } else {
                $message = "System Error: Email deja existe.";
            }
        } else {
            $message = "Critical Error: Database connection incorerct.";
        }
    } else {
        $message = "Validation Error: Tout les champs obligatoire.";
    }
}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleregistre.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <title>Registre</title>
</head>
<body>
    <div class="login-container"> <?= $message ?>
    <form action="registre.php" method="POST">
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" id="name" name="username" placeholder="Votre name" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="exemple@email.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" placeholder="• • • • • • " required>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fa-solid fa-right-to-bracket"></i> Enregistrer
                </button>
            </form>
            </div>
</body>
</html>