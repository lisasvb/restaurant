<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aan Tafel - Reserveren</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <style>
        .footer {
            margin-top: 0;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<script>
    $(document).ready(function() {
        $("#date").change(function() {
            var selected_date = $(this).val();
            console.log("Request available times for date: " + selected_date);
            var request_times = $.ajax({
                method: "POST",
                url: "get_times.php",
                data: { date: selected_date }
            }).done(function(times) {
                var response = JSON.parse(times);
                if(response.length > 0) {
                    var $select = $('#time');
                    $select.find('option').remove();
                    $.each(response, function (key, value) {
                        console.log("Updating available times: " + value['T_ID'] + " -> " + value['Tijden']);
                        $select.append('<option value=' + value['T_ID'] + '>' + value['Tijden'] + '</option>');
                    });
                } else {
                    var $select = $('#time');
                    $select.find('option').remove();
                    $("#datum_vol").modal("show");
                    //console.log("Datum kan niet meer");
                    //alert("Helaas zijn al onze tafels a gereserveerd op deze datum, probeer een andere datum aub.");
                }
            }).fail(function() {
                var $select = $('#time');
                $select.find('option').remove();
                $("#communicatie_fout").modal("show");
            });
        });
    });
</script>

<?php
require('includes/menu.php');
require_once 'autoload.php';
$reserveren = new Reserveren();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //var_dump($_POST);
if (isset($_POST['persons']) &&
    isset($_POST['date']) &&
    isset($_POST['time']) &&
    isset($_POST['firstname']) &&
    isset($_POST['lastname']) &&
    isset($_POST['email'])) {

    if($reserveren->createReservation($_POST)) {
          $to = $_POST['email'];
          $tijd = $reserveren->getTimeById($_POST['time']);
          $subject = "Reserverings bevestiging Restaurant 'Aan tafel'";
          $message = "<!DOCTYPE html>
            <html>
                <body>
                    <p>Beste " . $_POST['firstname'] . ",</p>
                    <p>Bedankt voor je reservering, we hebben de volgende reservering opgeslagen:</p>
                    <li>Datum: " . $_POST['date'] . "</li> 
                    <li>Tijd: ". $tijd . "</li>
                    <li>Aantal personen: ". $_POST['persons'] . "</li>
                    <p>Met vriendelijke groet,<br> Restaurant 'Aan tafel'</p>
                </body>
            </html>";
          $headers = "MIME-Version: 1.0" . "\r\n";
          $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
          $headers .= 'From: <admin@aantafel.nl>' . "\r\n";
          mail($to,$subject,$message,$headers);

          echo '
            <script>
                $(document).ready(function() {
                    $("#reservering_succesvol").modal("show");
                });
            </script>';
    } else {
        echo '
            <script>
                $(document).ready(function() {
                    $("#communicatie_fout").modal("show");
                });
            </script>';
    }
  } else{
    echo '
            <script>
                $(document).ready(function() {
                    $("#communicatie_fout").modal("show");
                });
            </script>';
    }
  }
?>

<div id="reservering_succesvol" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reservering succesvol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bedankt voor je reservering, we hebben een bevestigings email verstuurd.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="datum_vol" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reservering op deze dag kan niet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Helaas is ons restaurant op deze datum voledig vol geboekt, selecteerd U alstublieft een andere datum.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="communicatie_fout" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reservering mislukt</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Helaas is er iets misgegaan, probeer het nogmaals</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="jumbotron background-reserveren text-center">
    <h1>Reserveren</h1>
</div>

<section id="reserveren">
    <div class="container">
        <div class="alert alert-info alert-labeled">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span><span class="sr-only">Close</span>
            </button>
            <div class="alert-labeled-row">
                    <span class="alert-label alert-label-left alert-labelled-cell">
                        <i class="fa fa-exclamation"></i>
                    </span>
                <p class="alert-body alert-body-right alert-labelled-cell">
                    U kunt eventueel later een reservering annuleren indien u verhinderd bent op dit tijdstip. Dit is mogelijk door telefonisch contact op te nemen met ons via: 024 675 05 08.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <h1>Reserveer een tafel</h1>
                <p>Ons sfeervolle restaurant biedt u een mooie ambiance om te genieten van de lekkerste gerechten. Onze keukenbrigade bereidt elke dag met plezier de heerlijkste gerechten met dagverse ingrediënten voor u.</p>
                <form action="./reserveren.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label>Aantal personen:</label>
                            <select name="persons" class="form-control" >
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label>Datum:</label>
                            <input type="date" id="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group col-4">
                            <label>Tijdstip:</label>
                            <select id="time" name="time" class="form-control" required>
                            </select>
                        </div>
                        <div class="form-group col-4">
                            <label>Voornaam:</label>
                            <input type="name" name="firstname" class="form-control" required pattern="^[A-Za-zÀ-ÿ ,.'-]+$" required>
                        </div>
                        <div class="form-group col-4">
                            <label>Achternaam:</label>
                            <input type="name" name="lastname" class="form-control" required pattern="^[A-Za-zÀ-ÿ ,.'-]+$"  required>
                        </div>
                        <div class="form-group col-4">
                            <label>E-mailadres:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Reserveren</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4 boeken"></div>
        </div>
        <div class="row d-none">
            <div class="col-8">
                <h1>Reserveer een tafel</h1>
                <p></p>
            </div>
        </div>
    </div>
</section>

<section id="eetgerechten">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h4>Ontbijt 09:30 - 12:00</h4>
                    <span>Elke dag</span>
                </div>
                <div class="col-4">
                    <h4>Lunch 12:00 - 14:00</h4>
                    <span>Elke dag</span>
                </div>
                <div class="col-4">
                    <h4>Diner 17:30 - 24:00</h4>
                    <span>Elke dag</span>
                </div>
            </div>
        </div>
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