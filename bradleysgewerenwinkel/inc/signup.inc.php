<?php

if(isset($_POST['submit'])) {
    
    $name = $_POST['gebruikersnaam'];
    $email = $_POST['email'];
    $pwd = $_POST['wachtwoord'];
    $pwdRepeat = $_POST['wachtwoordR'];

    require_once('db.inc.php');
    require_once('func.inc.php');

    if (emptyInputSignup($name, $email, $pwd, $pwdRepeat) !== false ) {
        header('location: ../user/signup.php?error=emptyinput');
        exit();
    }
    if (invalidEmail($email) !== false ) {
        header('location: ../user/signup.php?error=invalidemail');
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false ) {
        header('location: ../user/signup.php?error=passwordsdontmatch');
        exit();
    }
    if (uidExists($conn, $name, $email) !== false ) {
        header('location: ../user/signup.php?error=usernametaken');
        exit();
    }

    createUser($conn, $name, $email, $pwd);

}
else
{
    header('location: ../user/signup.php');
    exit();
}