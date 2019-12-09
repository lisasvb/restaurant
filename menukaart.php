<?php
require_once './autoload.php';

$factuur = new Factuur();
?>
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
</head>
<body>
<?php
require('includes/menu.php');
?>

<div class="jumbotron background-menukaart text-center">
    <h1>Menukaart</h1>
</div>

<section class="menukaart">
    <div class="container">
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
        <div class="row">
            <div class="tab-content col-xl-12" id="myTabContent">
                <div class="tab-pane fade active show" id="breakfast" role="tabpanel" aria-labelledby="breakfast-tab">
                    <div class="row">
                        <?php
                        foreach ($factuur->getItemsByCategory(1) as $item) {
                            if (array_slice($item, 0, 5)) {
                                echo '<div class="col-md-6">';
                                echo '<div class="single_menu_list">
                                        <div class="menu_content">
                                            <h4>' . $item['naam'] .'<span>&euro;' . $item['ex_btw'] .'</span></h4>
                                            <p>' . $item['beschrijving'] . '</p>
                                        </div>
                                    </div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="lunch" role="tabpanel" aria-labelledby="lunch-tab">
                    <div class="row">
                        <?php
                        foreach ($factuur->getItemsByCategory(2) as $item) {
                            if (array_slice($item, 0, 5)) {
                                echo '<div class="col-md-6">';
                                echo '<div class="single_menu_list">
                                        <div class="menu_content">
                                            <h4>' . $item['naam'] .'<span>&euro;' . $item['ex_btw'] .'</span></h4>
                                            <p>' . $item['beschrijving'] . '</p>
                                        </div>
                                    </div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade " id="dinner" role="tabpanel" aria-labelledby="dinner-tab">
                    <div class="row">
                        <?php
                        foreach ($factuur->getItemsByCategory(3) as $item) {
                            if (array_slice($item, 0, 5)) {
                                echo '<div class="col-md-6">';
                                echo '<div class="single_menu_list">
                                        <div class="menu_content">
                                            <h4>' . $item['naam'] .'<span>&euro;' . $item['ex_btw'] .'</span></h4>
                                            <p>' . $item['beschrijving'] . '</p>
                                        </div>
                                    </div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="nagerechten" role="tabpanel" aria-labelledby="nagerechten-tab">
                    <div class="row">
                        <?php
                        foreach ($factuur->getItemsByCategory(4) as $item) {
                            if (array_slice($item, 0, 5)) {
                                echo '<div class="col-md-6">';
                                echo '<div class="single_menu_list">
                                        <div class="menu_content">
                                            <h4>' . $item['naam'] .'<span>&euro;' . $item['ex_btw'] .'</span></h4>
                                            <p>' . $item['beschrijving'] . '</p>
                                        </div>
                                    </div>';
                               echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade " id="dranken" role="tabpanel" aria-labelledby="dranken-tab">
                    <div class="row">
                        <?php
                        foreach ($factuur->getItemsByCategory(5) as $item) {
                            if (array_slice($item, 0, 5)) {
                               echo '<div class="col-md-6">';
                                echo '<div class="single_menu_list">
                                        <div class="menu_content">
                                            <h4>' . $item['naam'] .'<span>&euro;' . $item['ex_btw'] .'</span></h4>
                                            <p>' . $item['beschrijving'] . '</p>
                                        </div>
                                    </div>';
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="wijn" role="tabpanel" aria-labelledby="wijn-tab">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single_menu_list">
                                <div class="menu_content">
                                    <h4><b>WITTE HUISWIJNEN </b> <span></span></h4>
                                </div>
                            </div>
                            <?php
                            foreach ($factuur->getItemsByCategory(7, 1) as $item) {
                                if (array_slice($item, 0, 5)) {
                                    echo '<div class="single_menu_list">
                                        <div class="menu_content">
                                            <h4>' . $item['naam'] .'<span>&euro;' . $item['ex_btw'] .'</span></h4>
                                            <p>' . $item['beschrijving'] . '</p>
                                        </div>
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <div class="single_menu_list">
                                <div class="menu_content">
                                    <h4><b>ROSÉ HUISWIJNEN </b> <span></span></h4>
                                </div>
                            </div>
                            <?php
                            foreach ($factuur->getItemsByCategory(7, 2) as $item) {
                                if (array_slice($item, 0, 5)) {
                                    echo '<div class="single_menu_list">
                                        <div class="menu_content">
                                            <h4>' . $item['naam'] .'<span>&euro;' . $item['ex_btw'] .'</span></h4>
                                            <p>' . $item['beschrijving'] . '</p>
                                        </div>
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <div class="single_menu_list">
                                <div class="menu_content">
                                    <h4><b>RODE HUISWIJNEN </b> <span></span></h4>
                                </div>
                            </div>
                            <?php
                            foreach ($factuur->getItemsByCategory(7, 3) as $item) {
                                if (array_slice($item, 0, 5)) {
                                    echo '<div class="single_menu_list">
                                        <div class="menu_content">
                                            <h4>' . $item['naam'] .'<span>&euro;' . $item['ex_btw'] .'</span></h4>
                                            <p>' . $item['beschrijving'] . '</p>
                                        </div>
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-6">
                            <div class="single_menu_list">
                                <div class="menu_content">
                                    <h4><b>SPECIAALWIJN PER GLAS </b> <span></span></h4>
                                </div>
                            </div>
                            <?php
                            foreach ($factuur->getItemsByCategory(7, 4) as $item) {
                                if (array_slice($item, 0, 5)) {
                                    echo '<div class="single_menu_list">
                                        <div class="menu_content">
                                            <h4>' . $item['naam'] .'<span>&euro;' . $item['ex_btw'] .'</span></h4>
                                            <p>' . $item['beschrijving'] . '</p>
                                        </div>
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
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