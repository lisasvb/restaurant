<?php
require_once '../autoload.php';
if (!Login::checkSession()) {
    header('Location: index.php');
    exit();
}
$reserveren = new Reserveren();
$factuur = new Factuur();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aan Tafel - Reservaties</title>
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
        if (isset($_POST['annuleren'])) {
            if ($reserveren->cancelReservation($_POST['annuleren'])) {
                echo '<div class="alert alert-success" role="alert" data-toggle="modal" data-target=".reserveringBeheer">
                        De reservering is zojuist succesvol geannuleerd uit het systeem!
                    </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert" data-toggle="modal" data-target=".reserveringBeheer">
                        De reservering kan niet worden geannuleerd!
                    </div>';
            }
        }
    }
    ?>

    <div class="modal fade reserveringBeheer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reserveringen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST">

                </form>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Datum</th>
            <th scope="col">Tijd</th>
            <th scope="col">Aantal personen</th>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Email</th>
            <th scope="col">Actie</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($reserveren->getAll() as $reservering) {
            echo '<tr>
                    <td>' . $reservering['date'] . '</td>
                    <td>' . $reservering['Tijden'] . '</td>
                    <td>' . $reservering['persons'] . '</td>
                    <td>' . $reservering['firstname'] . '</td>
                    <td>' . $reservering['lastname'] . '</td>
                    <td>' . $reservering['email'] . '</td>';
                echo '<td>
                        <form method="POST">
                            <button type="submit" name="annuleren" value="' . $reservering['id'] . '" class="btn btn-danger">Annuleren</button>
                            <a href="factuur.php?id='. $reservering['id'] .'" class="btn btn-primary">Factuur aanpassen</a> 
                        </form>';

                        if (count($factuur->getFactuur($reservering['id'])) != 0) {
                            echo '<a href="factuurbekijken.php?id=' . $reservering['id'] . '" class="btn btn-success">Factuur bekijken</a>';
                        }
                        echo '
                    </td>';
            echo '</tr>';
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
