<?php
require_once 'autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aan Tafel - Homepagina</title>
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

    <header>
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" loop="loop" id="headerVideo">
            <source src="images/video.mp4" type="video/mp4">
        </video>
        <div class="container h-100">
            <div class="d-flex h-100 text-center align-items-center">
                <div class="w-100 text-white">
                <img src="./images/logo2.png" width="" height=230 alt="logo" onclick="pauseVideo()" id="pause">
                </div>
            </div>
        </div>
    </header>

    <div class="col-4">
        <div class="card addressCard" style="color: #FFFFFF; margin-top: -160px; background-color: transparent; border: transparent;">
            <div class="card-body">
                <p><strong>Adres</strong>: Oudegracht aan de Werf 136, Utrecht</p>
                <p><strong>Email</strong>: info@aantafel.nl</p>
                <p><strong>Telefoon</strong>:  030 231 1861</p>
            </div>
        </div>
    </div>

    <section id="openingstijden" class="my-5">
        <div class="container">
            <div class="text-center">
                <h1 class="display-4">Openingstijden</h1>
                <p class="lead mb-4">Een overzicht van onze openingstijden</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <img  src="images/1.jpg" class="img-thumbnail">
                </div>
                    <div class="col-md-6">
                    <div class="lead" >
                        <p>Maandag vanaf 09:00-24:00</p>
                        <p>Dinsdag vanaf 09:00-24:00</p>
                        <p>Woensdag vanaf 09:00-24:00</p>
                        <p>Donderdag vanaf 09:00-24:00</p>
                        <p>Vrijdag vanaf 09:00-24:00</p>
                        <p>Zaterdag en zondag vanaf 10:00-24:00</p>
                        <p>Ontbijt wordt geserveerd vanaf 09:00 tot 12:00</p>
                        <p>Lunch wordt geserveerd vanaf 12:00 tot 14:00</p>
                        <p>Diner wordt geserveerd vanaf 17:30 tot 24:00</p>
                    </div>
                    <button type="button" class="btn btn-primary">Menukaart</button><button type="button" class="btn btn-success">Reserveren</button>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact'])) {
        Contact::createContact($_POST);
    }
    ?>
    <section id="contact">
        <div class="container">
            <div class="text-center">
                <h1 class="display-4">Contact</h1>
                <p class="lead mb-4">Heeft u nog vragen? Neem dan contact met ons op!</p>
            </div>
            <div class="row">
                <div class="col-8">
                    <form method="POST">
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Voornaam:</label>
                                <input type="text" name="voornaam" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>E-mailadres:</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label>Onderwerp:</label>
                                <input type="text" name="onderwerp" class="form-control">
                            </div>
                            <div class="form-group col-6">
                                <label>Afdeling:</label>
                                <select name="afdeling" class="form-control">
                                    <?php
                                    foreach (Contact::getAllDepartments() as $department) {
                                        echo '<option value="'. $department['id'] .'">'. $department['naam'] .'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <label>Bericht:</label>
                                <textarea name="bericht" class="form-control"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="contact" class="btn btn-primary">Contact opnemen</button>
                    </form>
                </div>
                <div class="col-4">
                    <p><strong>Adres</strong>: Oudegracht aan de Werf 136, Utrecht</p>
                    <p><strong>Email</strong>: info@aantafel.nl</p>
                    <p><strong>Telefoon</strong>:  030 231 1861</p>
                    <div style="width: 400px;position: relative;"><iframe width="400" height="220" src="https://maps.google.com/maps?width=400&amp;height=220&amp;hl=en&amp;q=Hadrianussingel%2042+(Aan%20Tafel)&amp;ie=UTF8&amp;t=&amp;z=10&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><div style="position: absolute;width: 80%;bottom: 10px;left: 0;right: 0;margin-left: auto;margin-right: auto;color: #000;text-align: center;"><small style="line-height: 1.8;font-size: 2px;background: #fff;">Powered by <a href="http://www.googlemapsgenerator.com/ja/">Googlemapsgenerator.com/ja/</a> & <a href="https://dnatestafkomstvergelijken.nl/">dna test afkomst gratis</a></small></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><br />
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