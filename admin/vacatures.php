<?php
require_once '../autoload.php';
if (!Login::checkSession()) {
    header('Location: index.php');
    exit();
}
$vacature = new Vacature();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aan Tafel - Vacatures</title>
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
            if ($vacature->deleteApplication($_POST['verwijderen'])) {
                echo '<div class="alert alert-success" role="alert" data-toggle="modal" data-target=".functieToevoegen">
                        De vacature is zojuist succesvol verwijderd uit het systeem!
                    </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert" data-toggle="modal" data-target=".functieToevoegen">
                        De vacature kan niet gevonden worden in het systeem!
                    </div>';
            }
        } else if (isset($_POST['bewerken'])) {
            var_dump($_POST['status']);
        }
    } else {
        echo '<div class="alert alert-primary" role="alert" data-toggle="modal" data-target=".functieToevoegen">
                Klik hier om overzicht te krijgen tot alle functies
            </div>';
    }
    ?>
    <div class="modal fade functieToevoegen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Overzicht openstaande functies</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Functie</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($vacature->getRoles(TRUE) as $role) {
                                echo '<tr><td>'. $role['naam'] .'</td><td><select class="form-control" name="status[]">';
                                foreach ($vacature->getStatus() as $status) {
                                    if ($status['id'] == $role['status_id']) {
                                        echo '<option selected>' . $status['naam'] . '</option>';
                                    }
                                    if ($status['id'] != $role['status_id']) {
                                        echo '<option value="'. json_encode(array($role['id'] => $status['id'])) .'">' . $status['naam'] . '</option>';
                                    }
                                }
                                echo '</select></td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Annuleren</button>
                        <button type="submit" name="bewerken" class="btn btn-primary">Bewerken</button>
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
            <th scope="col">Functie</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($vacature->getAll() as $sollicitatie) {
            echo '<tr>
                    <th>' . $sollicitatie['email'] . '</th>
                    <td>' . $sollicitatie['volledige_naam'] . '</td>
                    <td>' . $vacature->getRoles(FALSE,$sollicitatie['functie_id'])['naam'] . '</td>
                    <td><form method="POST"><button type="submit" name="verwijderen" value="'. $sollicitatie['id'] .'" class="btn btn-danger">Verwijderen</button><a href="bekijk_vacature.php?id='. $sollicitatie['id'] .'" class="btn btn-success">Bekijken</a></form></td>
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
