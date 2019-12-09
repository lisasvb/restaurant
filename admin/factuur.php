<?php
require_once '../autoload.php';
if (!Login::checkSession()) {
    header('Location: index.php');
    exit();
}

//var_dump($_POST);
$factuur = new Factuur();
$reservatie_id = $_GET['id'];
$reservation = new Reserveren();
$r = $reservation->getReservationById($reservatie_id);
//var_dump($r);

$opgeslagen = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['opslaan'])) {
        $reservatie_id = $_POST['opslaan'];
        unset($_POST['opslaan']);
        $factuur->storeFactuur($reservatie_id, $_POST);
        $opgeslagen = true;
        //var_dump($_POST);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aan Tafel - Factuur</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/button.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<?php
require('includes/menu.php');
?>
<script>
    $(document).on('click', '.number-spinner button', function () {
        var btn = $(this),
            oldValue = btn.closest('.number-spinner').find('input').val().trim(),
            newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        btn.closest('.number-spinner').find('input').val(newVal);
    });

</script>
<br>
<div class="card" style="width: 18rem;">
<div class="card-body">
    <p class="card-text">Factuur voor klant: <?php echo($r['firstname'] . " " . $r['lastname'] . " <br> email: " . $r['email']); ?></p>
</div>
</div>

<section class="menukaart">
    <div class="container">
        <?php
        if ($opgeslagen == true){
            echo '<div class="alert alert-success" role="alert" data-toggle="modal" data-target=".reserveringBeheer">
                        De producten zijn toegevoegd op de factuur!
                    </div>';
        }
        ?>
        <div class="row">
            <ul class="nav nav-tabs menu_tab" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" id="breakfast-tab" data-toggle="tab" href="#breakfast" role="tab" aria-selected="false">Ontbijt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="lunch-tab" data-toggle="tab" href="#lunch" role="tab" aria-selected="false">Lunch</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="dinner-tab" data-toggle="tab" href="#dinner" role="tab" aria-selected="false">Diner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="nagerechten-tab" data-toggle="tab" href="#nagerechten" role="tab" aria-selected="false">Nagerechten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="dranken-tab" data-toggle="tab" href="#dranken" role="tab" aria-selected="false">Dranken</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="wijn-tab" data-toggle="tab" href="#wijn" role="tab" aria-selected="false">Wijnen</a>
                </li>
            </ul>
        </div>
        <form method="post">
        <div class="row">
            <div class="tab-content col-xl-12" id="myTabContent">
                <div class="tab-pane fade active show" id="breakfast" role="tabpanel" aria-labelledby="breakfast-tab">
                    <div class="row">
                        <?php
                        $items = $factuur->getItemsByCategory(1);
                        foreach ($items as $data) {

                            echo '<div class="col-md-3">
                                <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><i class="fas fa-minus"></i></button>
                                        </span>
                                        <input type="text" class="form-control text-center" value="' . $factuur->loadFactuurQuanity($reservatie_id, $data['id']) . '" id="' . $data["id"] . '" name="' . $data["id"] . '">
                                      
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="up"><i class="fas fa-plus"></i></button>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                      <div class="single_menu_list" id="factuuritem">
                                         <div class="menu_content">
                                         <h4>' . $data['naam'] . '</h4>
                                         </div>
                                       </div>
                                   </div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="lunch" role="tabpanel" aria-labelledby="lunch-tab">
                    <div class="row">
                        <div class="row">
                            <?php
                            $items = $factuur->getItemsByCategory(2);
                            foreach ($items as $data) {

                                echo '<div class="col-md-3">
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><i class="fas fa-minus"></i></button>
                                        </span>
                                        <input type="text" class="form-control text-center" value="' . $factuur->loadFactuurQuanity($reservatie_id, $data['id']) . '" id="' . $data["id"] . '" name="' . $data["id"] . '">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="up"><i class="fas fa-plus"></i></button>
                                        </span>
                                    </div>
                                   </div>
                                   <div class="col-md-9">
                                      <div class="single_menu_list" id="factuuritem">
                                         <div class="menu_content">
                                         <h4>' . $data['naam'] . '</h4>
                                         </div>
                                       </div>
                                   </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="dinner" role="tabpanel" aria-labelledby="dinner-tab">
                    <div class="row">
                        <div class="row">
                            <?php
                            $items = $factuur->getItemsByCategory(3);
                            foreach ($items as $data) {

                                echo '<div class="col-md-3">
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><i class="fas fa-minus"></i></button>
                                        </span>
                                        <input type="text" class="form-control text-center" value="' . $factuur->loadFactuurQuanity($reservatie_id, $data['id']) . '" id="' . $data["id"] . '" name="' . $data["id"] . '">
                                       
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="up"><i class="fas fa-plus"></i></button>
                                        </span>
                                    </div>
                                   </div>
                                   <div class="col-md-9">
                                      <div class="single_menu_list" id="factuuritem">
                                         <div class="menu_content">
                                         <h4>' . $data['naam'] . '</h4>
                                         </div>
                                       </div>
                                   </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nagerechten" role="tabpanel" aria-labelledby="nagerechten-tab">
                    <div class="row">
                        <div class="row">
                            <?php
                            $items = $factuur->getItemsByCategory(4);
                            foreach ($items as $data) {
                                echo '<div class="col-md-3">
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><i class="fas fa-minus"></i></button>
                                        </span>
                                        <input type="text" class="form-control text-center" value="' . $factuur->loadFactuurQuanity($reservatie_id, $data['id']) . '" id="' . $data["id"] . '" name="' . $data["id"] . '">
                                       
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="up"><i class="fas fa-plus"></i></button>
                                        </span>
                                    </div>
                                   </div>
                                   <div class="col-md-9">
                                      <div class="single_menu_list" id="factuuritem">
                                         <div class="menu_content">
                                         <h4>' . $data['naam'] . '</h4>
                                         </div>
                                       </div>
                                   </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade " id="dranken" role="tabpanel" aria-labelledby="dranken-tab">
                    <div class="row">
                        <div class="row">
                            <?php
                            $items = $factuur->getItemsByCategory(5);
                            foreach ($items as $data) {
                                echo '<div class="col-md-3">
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><i class="fas fa-minus"></i></button>
                                        </span>
                                        <input type="text" class="form-control text-center" value="' . $factuur->loadFactuurQuanity($reservatie_id, $data['id']) . '" id="' . $data["id"] . '" name="' . $data["id"] . '">
                                        
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="up"><i class="fas fa-plus"></i></button>
                                        </span>
                                    </div>
                                   </div>
                                   <div class="col-md-9">
                                      <div class="single_menu_list" id="factuuritem">
                                         <div class="menu_content">
                                         <h4>' . $data['naam'] . '</h4>
                                         </div>
                                       </div>
                                   </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="wijn" role="tabpanel" aria-labelledby="wijn-tab">
                    <div class="row">
                        <div class="row">
                            <?php
                            $items = $factuur->getItemsByCategory(6);
                            foreach ($items as $data) {

                                echo '<div class="col-md-3">
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><i class="fas fa-minus"></i></button>
                                        </span>
                                        <input type="text" class="form-control text-center" value="' . $factuur->loadFactuurQuanity($reservatie_id, $data['id']) . '" id="' . $data["id"] . '" name="' . $data["id"] . '">
                                        
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="up"><i class="fas fa-plus"></i></button>
                                        </span>
                                    </div>
                                   </div>
                                   <div class="col-md-9">
                                      <div class="single_menu_list" id="factuuritem">
                                         <div class="menu_content">
                                         <h4>' . $data['naam'] . '</h4>
                                         </div>
                                       </div>
                                   </div>';
                            }
                            $items = $factuur->getItemsByCategory(7);
                            foreach ($items as $data) {

                                echo '<div class="col-md-3">
                                    <div class="input-group number-spinner">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="dwn"><i class="fas fa-minus"></i></button>
                                        </span>
                                        <input type="text" class="form-control text-center" value="' . $factuur->loadFactuurQuanity($reservatie_id, $data['id']) . '" id="' . $data["id"] . '" name="' . $data["id"] . '">
                                       
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" data-dir="up"><i class="fas fa-plus"></i></button>
                                        </span>
                                    </div>
                                   </div>
                                   <div class="col-md-9">
                                      <div class="single_menu_list" id="factuuritem">
                                         <div class="menu_content">
                                         <h4>' . $data['naam'] . '</h4>
                                         </div>
                                       </div>
                                   </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <button type="submit" name="opslaan" value="<?php echo $reservatie_id; ?>" class="btn btn-primary">Opslaan</button>
            <a href="reservatie.php" class="btn btn-success">Terug naar overzicht</a>
        </form>
    </div>
    </div>
</section>

<?php
require('../includes/footer.php');
?>


<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>
