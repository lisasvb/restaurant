<?php
require_once '../autoload.php';
if (!Login::checkSession()) {
    header('Location: index.php');
    exit();
}
$personeel = new Personeel();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aan Tafel - Personeel</title>
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
        if (isset($_POST['toevoegen'])) {
            if ($personeel->createPersonal($_POST)) {
                echo '<div class="alert alert-success" role="alert" data-toggle="modal" data-target=".personeelToevoegen">
                        Het personeel is zojuist succesvol toegevoegd aan het systeem!
                    </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert" data-toggle="modal" data-target=".personeelToevoegen">
                        De ingevoerde gegevens zijn onjuist, probeer het nogmaals!
                    </div>';
            }
        } else if (isset($_POST['verwijderen'])) {
            if ($personeel->deletePersonal($_POST['verwijderen'])) {
                echo '<div class="alert alert-success" role="alert" data-toggle="modal" data-target=".personeelToevoegen">
                        Het personeel is zojuist succesvol verwijderd uit het systeem!
                    </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert" data-toggle="modal" data-target=".personeelToevoegen">
                        Het personeel kan niet gevonden worden in het systeem!
                    </div>';
            }
        }
    } else {
        echo '<div class="alert alert-primary" role="alert" data-toggle="modal" data-target=".personeelToevoegen">
                Een personeel aannemen? Klik dan hier om er één toe te voegen.
            </div>';
    }
    ?>

    <div class="modal fade personeelToevoegen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personeel toevoegen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-5">
                                <label>E-mailadres:</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group col-7">
                                <label>Volledige naam:</label>
                                <input type="text" name="volledige_naam" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-5">
                                <label>Woonplaats:</label>
                                <input type="text" name="woonplaats" class="form-control">
                            </div>
                            <div class="form-group col-7">
                                <label>Adres:</label>
                                <input type="text" name="adres" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label>Wachtwoord:</label>
                                <input type="password" name="wachtwoord" class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label>Bevestig wachtwoord:</label>
                                <input type="password" name="bevestiging" class="form-control">
                            </div>
                            <div class="form-group col-4">
                                <label>Functie:</label>
                                <select name="functie" class="form-control">
                                    <option>Selecteer een functie</option>
                                    <?php
                                    foreach ($personeel->getPersoneelFunctie() as $functie) {
                                        echo '<option value="'. $functie['id'] .'">'. $functie['naam'] .'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
                        <button type="submit" name="toevoegen" value="granted" class="btn btn-primary">Toevoegen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Emailadres</th>
            <th scope="col">Volledige naam</th>
            <th scope="col">Aangenomen</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($personeel->getPersoneelId() as $arbeider) {
            echo '<tr>
                    <th>' . $arbeider['email'] . '</th>
                    <td>' . $personeel->getPersoneelGegevensId($arbeider['gegevens_id'])['volledige_naam'] . '</td>
                    <td>' . $arbeider['datum'] . '</td>
                    <td><form method="POST"><button type="submit" name="verwijderen" value="'. $arbeider['id'] .'" class="btn btn-danger">Verwijderen</button><a href="bewerk_personeel.php?id='. $arbeider['id'] .'" class="btn btn-success">Bekijken</a></form></td>
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
