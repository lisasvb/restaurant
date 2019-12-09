<?php
require_once '../autoload.php';
if (!Login::checkSession()) {
    header('Location: index.php');
    exit();
}
if (is_numeric($_GET['id']) && isset($_GET['id'])) {
    $contact = new Contact($_GET['id']);
    if (!$contact->getField()) {
        header('Location: contact.php');
        exit();
    }

} else {
    header('Location: vacatures.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aan Tafel - Contact</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/button.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
<?php
require('includes/menu.php');
?>
<div style="margin-top: 15px;" class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Voornaam</label>
                        <input type="text" class="form-control" placeholder="<?= $contact->getField()['voornaam'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="<?= $contact->getField()['email'] ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Onderwerp</label>
                        <input type="text" class="form-control" placeholder="<?= $contact->getField()['onderwerp'] ?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Afdeling</label>
                        <input type="text" class="form-control" placeholder="<?= $contact->getDepartment($contact->getField()['afdeling_id']); ?>" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea rows="15" class="form-control" placeholder="<?= $contact->getField()['bericht'] ?>" readonly></textarea>
                    </div>
                </div>

                <a href="vacatures.php" class="btn btn-danger">Terug naar overzicht</a>
            </form>
        </div>
    </div>
</div>
<?php
require('../includes/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>