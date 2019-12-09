<?php
require_once '../autoload.php';
if (!Login::checkSession()) {
    header('Location: index.php');
    exit();
}

$contact = new Contact;
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
<div style="margin-top: 15px;" class="container-fluid">
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['verwijderen'])) {
            if ($contact->deleteContact($_POST['verwijderen'])) {
                echo '<div class="alert alert-success">
                       Het contact bericht is succesvol verwijderd!
                    </div>';
            } else {
                echo '<div class="alert alert-danger">
                       Het contact bericht bestaat niet in het systeem en kan dus niet verwijderd worden!
                    </div>';
            }
        }
    }
    ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Voornaam</th>
            <th scope="col">Email</th>
            <th scope="col">Onderwerp</th>
            <th scope="col">Afdeling</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($contact->getAll() as $bericht) {
            echo '<tr>
                    <td>'. $bericht['voornaam'] .'</td>
                    <td>'. $bericht['email'] .'</td>
                    <td>'. $bericht['onderwerp'] .'</td>
                    <td>'. $contact->getDepartment($bericht['afdeling_id']) .'</td>
                    <td><form method="POST"><button type="submit" name="verwijderen" value="'. $bericht['id'] .'" class="btn btn-danger">Verwijderen</button><a href="bekijk_contact.php?id='. $bericht['id'] .'" class="btn btn-success">Bekijken</a></form></td>
                  </tr>';
        }
        ?>
        </tbody>
    </table>
</div>

<?php
require('../includes/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>