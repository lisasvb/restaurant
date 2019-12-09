<?php
include 'classes/Data.php';
include 'classes/Database.php';
include 'classes/Reserveren.php';
$reserveren = new Reserveren();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo $_GET['date'];
    $times = $reserveren->getAvailableTimesByDate($_POST['date']);
    //var_dump($times);
    echo json_encode($times);
}
?>