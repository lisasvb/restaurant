<?php
require_once '../autoload.php';
if (!Login::checkSession()) {
    header('Location: index.php');
    exit();
}


$factuur = new Factuur();
$reservatie_id = $_GET['id'];
$reservation = new Reserveren();
$r = $reservation->getReservationById($reservatie_id);
//var_dump($r);

if (count($factuur->getFactuur($_GET['id'])) == 0) {
    header('Location: reservatie.php');
    exit();
}

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

<br>
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <p class="card-text">Factuur voor klant: <?php echo($r['firstname'] . " " . $r['lastname'] . " <br> email: " . $r['email']); ?></p>
    </div>
</div>

<div class="container-fluid">

<div class="modal fade reserveringBeheer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Factuur bekijken</h5>

            </div>
            <form method="POST">

            </form>
        </div>
    </div>
</div>
<table class="table table-bordered" style="margin-top: 25px">
    <thead>
    <tr>
        <th scope="col">Aantal</th>
        <th scope="col">Gerecht</th>
        <th scope="col">Prijs</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($factuur->getFactuur($_GET['id']) as $reservatie_factuur) {
        echo '<tr>
                    <td>' . $reservatie_factuur['aantal'] . '</td>
                    <td>' . $reservatie_factuur['naam'] . '</td>
                    <td>&euro;' . number_format($reservatie_factuur['aantal'] * $reservatie_factuur['prijs'], 2) . '</td>
            </tr>';
    }
    echo '<tr><td></td><td>Totaal:</td><td>&euro;'. $factuur->getFactuurTotal($_GET['id'])[0]['totaal'] .'</td></tr>';
    ?>

    </tbody>
</table>
    <a href="reservatie.php" class="btn btn-success">Terug naar overzicht</a>
</div>
<?php
require('../includes/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
