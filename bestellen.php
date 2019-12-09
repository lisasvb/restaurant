<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aan Tafel - Bestellen</title>
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

<div class="jumbotron background-onlinebestellen text-center">
    <h1>Online Bestellen</h1>
    <p class="lead"></p>
</div>

<section id="producten">
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
<div class="tab-content col-xl-12" id="myTabContent">
    <div class="tab-pane fade active show" id="breakfast" role="tabpanel" aria-labelledby="breakfast-tab">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Croissantjes met beleg </h4>
                        <p>&euro;5,00</p>
                        <p class="card-text">Ambachtelijke jam | Jong belegen kaas | gerookte ham | etc.</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Broodje filet Americain </h4>
                        <p>&euro;10,50</p>
                        <p class="card-text">Augurk | rode ui | kaassnippers | pijnboompitten</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Brootje brie </h4>
                        <p>&euro;10,50</p>
                        <p class="card-text">Walnoten-chrunch | honing</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Broodje gerookte kipfilet </h4>
                        <p>&euro;10,50</p>
                        <p class="card-text">Gebakken spek | sla | tomaat | mayonaise</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Broodje gezond </h4>
                        <p>&euro;10,50</p>
                        <p class="card-text">Jong belegen kaas | gerookste achterham | tomaat | gekooktneitje | salade | Thousand Island dressing</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Broodje carpaccio </h4>
                        <p>&euro;10,50</p>
                        <p class="card-text">Dungesneden ossenhaas | kappertjes | pijnboompitjes | Parmazaanse kaas | olijventapenade</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="lunch" role="tabpanel" aria-labelledby="lunch-tab">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gegrilde kipsaté </h4>
                        <p>&euro;13,50</p>
                        <p class="card-text">Kippendijen | zoetzure komkommer | gebakken uitjes | seroendeng | kroepoek | licht pikante pindasaus | kousenband salade | friet</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">"Amsterdamse" burger </h4>
                        <p>&euro;14,50</p>
                        <p class="card-text">Truffelburger | meergranen bun | little gem | zoete uien compôte | bacon | “Utregse” Oude Gracht kaas | geroosterde paprikasaus</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gerookte zalm </h4>
                        <p>&euro;9,50</p>
                        <p class="card-text">Biologische sub sandwich | limoen crème fraiche | zoetzure komkommer | rode ui | dillemayonaise</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Geitenkaassaladen </h4>
                        <p>&euro;11,95</p>
                        <p class="card-text">Baby spinazie | pecannoten | avocado crème | gekarameliseerde appel | granola | cranberries | honing</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Omelet piccante </h4>
                        <p>&euro;9,50</p>
                        <p class="card-text">Groene asperges | spinazie | paprika | chorizo | getoast wit landbrood</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Uitsmijters </h4>
                        <p>&euro;9,75</p>
                        <p class="card-text">Gebakken beenham | honing-mosterdmayonaise<br>
                                    Carpaccio | gelakt met truffelglace | rucola | mini tomaatjes | walnoten | Parmezaanse kaas | rode ui | truffelmayonaise</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="dinner" role="tabpanel" aria-labelledby="dinner-tab">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Black angus tournedos </h4>
                        <p>&euro;26,50</p>
                        <p class="card-text">Gebakken paddenstoelen | bataatcrème | truffeljus | krokante cassave</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Schnitzel </h4>
                        <p>&euro;18,50</p>
                        <p class="card-text">Pata negra ham | tartaarsaus | limoen | gepofte tomaten</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Gegrilde kipsaté </h4>
                        <p>&euro;20,50</p>
                        <p class="card-text">Kippendijen | zoetzure komkommer | gebakken uitjes | seroendeng | kroepoek | licht pikante pindasaus | kousenband salade</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kabeljauw </h4>
                        <p>&euro;22,50</p>
                        <p class="card-text">Whiskey-soja saus | fregola | pompoen gemarineerd in sinaasappel | komkommerschuim</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Mixed grill </h4>
                        <p>&euro;22,50</p>
                        <p class="card-text">Kipsteak | lamspies | Iberico nek | sukade steak | gegrilde maiskolf | pepersaus | chimichurri</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">100% vegan burger </h4>
                        <p>&euro;18,50</p>
                        <p class="card-text">Plantaardig “vlees” | zuurdesem bun | cheddar kaas | little gem | tomaten salsa | avocado</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nagerechten" role="tabpanel" aria-labelledby="nagerechten-tab">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Sorbet </h4>
                        <p>&euro;7,50</p>
                        <p class="card-text">Lychee | passievrucht | aardbei | ijshoorn | slagroom | vruchtencoulis</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Crè­me brûlée </h4>
                        <p>&euro;8,50</p>
                        <p class="card-text">Arabica koffie | Haagse hopjes ijs | Café mokka tuille | Oreo crumble</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Wittenvrouwen </h4>
                        <p>&euro;8,50</p>
                        <p class="card-text">Chocolade-sinaasappel ganache | cacao spongecake | gezouten karamel | Oreo crumble | vanille-ijs</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Chocolade panne cotta </h4>
                        <p>&euro;8,50</p>
                        <p class="card-text">Blondie cake | witte chocolade crème | yoghurtschots | ijs van Ruby cacao | rood fruit gel</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">New York-style cheesecake </h4>
                        <p>&euro;8,50</p>
                        <p class="card-text">Mousse van framboos | cookie dough roomijs | mango gel | framboos kletskop</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Kaasplankje </h4>
                        <p>&euro;10,50</p>
                        <p class="card-text">5 verschillende kazen: Rondin | Castilinhos | Utrechtse cigno | Beemster XO | Gorgonzola piccante | balsamico-noten crunch | gemberbrood</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="dranken" role="tabpanel" aria-labelledby="dranken-tab">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Spa blauw 25cl </h4>
                        <p>&euro;2,75</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Warme chocolademelk </h4>
                        <p>&euro;3,25</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Spa rood 25cl </h4>
                        <p>&euro;2,75</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Koffie verkeerd </h4>
                        <p>&euro;2,70</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Verse jus d'orange </h4>
                        <p>&euro;3,95</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Espresso </h4>
                        <p>&euro;2,85</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Appelsap </h4>
                        <p>&euro;3,95</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cappuccino </h4>
                        <p>&euro;2,90</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Druivensap </h4>
                        <p>&euro;2,95</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Latte macchiato </h4>
                        <p>&euro;3,90</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Diverse frisdranken </h4>
                        <p>&euro;2,80</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Verse muntthee </h4>
                        <p>&euro;3,85</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Fristi/chocolademelk </h4>
                        <p>&euro;2,90</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thee </h4>
                        <p>&euro;2,75</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="tab-pane fade" id="wijn" role="tabpanel" aria-labelledby="wijn-tab">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">MAISON BLANC, VALLE CENTRAL </h4>
                        <p>&euro;19,50 per fles</p>
                        <p class="card-text">Sauvignon Blanc Elegant - Fris - Droog</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">MOELLEUX, LA MANCHA</h4>
                        <p>&euro;19,50 per fles</p>
                        <p class="card-text">Sauvignon Blanc, Sémillon, Muscadelle Mollig - Zoet - Fruitig</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">PROVENCE ROSÉ, VIN DE MAISON </h4>
                        <p>&euro;21,50 per fles</p>
                        <p class="card-text">Cinsault, Syrah Zwoel - Vlezig - Lichte kleur</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">IN PROVENCE | V.I.P. ROSÉ </h4>
                        <p>&euro;22,50 per fles</p>
                        <p class="card-text">Syrah, Grenache, Cinsault Fris - frambozen - zacht - droog</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">MAISON ROUGE </h4>
                        <p>&euro;19,50 per fles</p>
                        <p class="card-text">Merlot Rond, soepel, flink wat fruit</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">MAISON ROUGE </h4>
                        <p>&euro;21,00 per fles</p>
                        <p class="card-text">Cabernet Sauvignon - Fruitig en krachtig.</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">‘CON UN PAR’, VICNETE GANDIA - SPANJE - RIAS BAIXAS ALBARIÑO </h4>
                        <p>&euro;29,50 per fles</p>
                        <p class="card-text">Energiek - Verfrissend - Vele geuren en smaken</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">MALBEC RESERVA, BODEGA NORTON - ARGENTINIE - MENDOZA (MALBEC)  </h4>
                        <p>&euro;31,50 per fles</p>
                        <p class="card-text">Karakteristiek - Intens aroma - Tabak - Cassis - Vijgen - Volle smaak</p>
                        <button class="btn btn-primary">Toevoegen aan winkelmand</button>
                    </div>
                </div>
            </div>
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