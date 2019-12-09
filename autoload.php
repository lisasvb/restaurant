<?php
function mijn_autoload($class) {
    if (preg_match('/\A\w+\Z/', $class)) {
        include 'classes/' . $class . '.php';
    }
}

spl_autoload_register('mijn_autoload');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (Login::checkSession()) {
    $user = new User($_SESSION['id']);
}
?>