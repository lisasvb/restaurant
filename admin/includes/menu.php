<nav class="nav boven">
    <div class="container">
        <div class="top-bar-left">
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fas fa-envelope"></i></a>
        </div>
        <div class="top-bar-right">
            <a href="#">Welkom terug <b><?= $user->getPersoneelGegevensId('volledige_naam'); ?></b></a>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-sm">
    <div class="container">
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="overzicht.php">Bestellingen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reservatie.php">Reservaties</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="personeel.php">Personeel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vacatures.php">Vacatures</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="afmelden.php">Afmelden</a>
                </li>
            </ul>
        </div>
    </div>
</nav>