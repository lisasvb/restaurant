<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aan Tafel - Mijn winkelmand</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
<?php
require('includes/menu.php');
?>

<div class="jumbotron background-winkelwagen text-center">
    <h1>Winkelmand</h1>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
</div>

<section id="winkelwagen">
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Gerecht/Drank</th>
                    <th>Aantal</th>
                    <th>Prijs per stuk</th>
                    <th>Totale Prijs</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h4>Naam</h4>
                        <span>Voorraad: </span><span class="text-success"><strong>Ja</strong></span>/<span class="text-danger"><strong>Nee</strong></span>
                    </td>
                    <td>
                        <input type="number" class="form-control" placeholder="Aantal">
                    </td>
                    <td><strong>&euro;0,00</strong></td>
                    <td><strong>&euro;0,00</strong></td>
                    <td>
                        <button type="button" class="btn btn-danger">
                            <span class="fa fa-trash"></span> Verwijder
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><h3>Totaal</h3></td>
                    <td><h3><strong>&euro;0,00</strong></h3></td>
                    <td></td>
                    <td></td>
                    <td><button type="button" class="btn btn-primary">Afrekenen</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</section>

<?php
require('includes/footer.php');
?>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<script src="js/video.js"></script>
</body>
</html>