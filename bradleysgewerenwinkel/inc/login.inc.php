<?php

if (isset($_POST['submit'])) {

    $username = $_POST['gebruikersnaam'];
    $pwd = $_POST['wachtwoord'];

    require_once('../inc/db.inc.php');
    require_once('../inc/func.inc.php');

    if (emptyInputLogin($username, $pwd) !== false ) {
        header('location: ../user/inlog.php?error=emptyinput');
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header('location: ../user/inlog.php');
    exit();
}