<?php
require_once '../autoload.php';
if (Login::checkSession()) {
    Login::closeSession();
}
header('Location: index.php');