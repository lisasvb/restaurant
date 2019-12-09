<?php
require_once '../autoload.php';

if (Login::checkSession()) {
    header('Location: overzicht.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/button.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <title>Aan Tafel - Administrator</title>
</head>
<body>
    <section class="aanmelden">
        <div class="afbeelding">
            <img src="../images/logo2.png">
        </div>
        <div class="formulier">
            <h1 class="display-4 mb-3">Aanmelden</h1>
            <p class="lead mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate eveniet magnam nam officia, quas sint sunt voluptas. Dignissimos, hic veritatis. Fugit illum minima officiis ut! Accusamus itaque laborum quis sequi.</p>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inloggen'])) {
                if (!empty($_POST['email']) && !empty($_POST['password'])) {
                    $login = new Login($_POST['email'], $_POST['password']);
                    if ($user = $login->validateUser()) {
                        $login->startSession();
                    }
                }
            }
            ?>
            <form method="POST">
                <div class="form-group">
                    <label>E-mailadres</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Wachtwoord</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" name="inloggen" class="btn btn-primary">Inloggen</button>
                    <button type="button" class="btn btn-danger">Wachtwoord vergeten?</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>