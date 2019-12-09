<?php
require_once 'autoload.php';

$vacature = new Vacature();
?>
<nav class="nav boven">
    <div class="container">
        <div class="top-bar-left">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fas fa-envelope"></i></a>
        </div>
        <div class="top-bar-right">
            <a style="cursor: pointer;" data-toggle="modal" data-target="#solliciteren"><i class="fas fa-blender-phone"></i></i> Solliciteren</a>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-sm">
    <div class="container">
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Homepagina</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="menukaart.php">Menukaart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reserveren.php">Reserveren</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bestellen.php">Online bestellen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#openingstijden">Openingstijden</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#contact">Contact</a>
                </li>
             </ul>
        </div>
    </div>
</nav>

<!--Solliciteren modal-->
<div class="modal fade" id="solliciteren" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vacatures</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inzenden'])) {
                $vacature->createApplication($_POST);
            }
            ?>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Volledige naam</label>
                        <input type="text" name="volledige_naam" class="form-control" placeholder="Voer hier je voornaam en achternaam in" required>
                    </div><div class="form-group">
                        <label>Telefoonnummer</label>
                        <input type="number" name="mobiel" class="form-control" placeholder="Voer hier je telefoonnummer in" required>
                    </div>
                    <div class="form-group">
                        <label>E-mailadres:</label>
                        <input type="email" name="email" class="form-control" placeholder="Voer hier je e-mailadres in" required>
                    </div>
                    <div class="form-group">
                        <label>Openstaande functies</label>
                        <select class="form-control" name="functie_id">
                            <?php
                            foreach ($vacature->getRoles(TRUE) as $role) {
                                if ($role['status_id'] == 1) {
                                    echo '<option value="'. $role['id'] .'">'. $role['naam'] .'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>CV</label>
                        <input type="file" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label>Motivatie</label>
                        <textarea class="form-control" name="motivatie"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Sluiten</button>
                    <button type="submit" name="inzenden" value="checked" class="btn btn-primary">Inzenden</button>
                </div>
            </form>
        </div>
    </div>
</div>