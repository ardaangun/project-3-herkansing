<?php
session_start();
include_once("../header-footer/header.php");
include_once("../inc/db.inc.php");
include_once("../inc/func.inc.php");
?>

<h1 id="inlogTitle">Registreer of maak een Account</h1>
<div class="inlogParent">
    <div class="inlogChild">
        <form action="../inc/signup.inc.php" method="post">
        <h1 id="loginText">U kunt hier registreren</h1>
        <p id="loginText">Als u nog geen account bij ons heeft, meld u dan aan.</p>
        <label class="ïnlog" for="gebruikersnaam">gebruikersnaam</label><br>
        <input class="ïnlog" type="text" name="gebruikersnaam" placeholder="vul uw gebruikersnaam in" required maxlength="20" minlength="5"><br>
        <label class="ïnlog" for="gebruikersnaam">Email</label><br>
        <input class="ïnlog" type="text" name="email" placeholder="vul uw gebruikersnaam in" required minlength="5"><br>
        <label class="ïnlog" for="wachtwoord">wachtwoord</label><br>
        <input class="ïnlog" type="password" name="wachtwoord" placeholder="vul uw wachtwoord in" required minlength="5"><br>
        <label class="ïnlog" for="wachtwoord">herhaal wachtwoord</label><br>
        <input class="ïnlog" type="password" name="wachtwoordR" placeholder="vul uw wachtwoord in" required minlength="5"><br>
        <p id="wwV">Wachtwoord Vergeten?</p>
        <button class="inlogBtn" type="submit" name="submit">Account Aanmaken</button>
        </form>
        <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        }
        elseif ($_GET["error"] == "invaliduid") {
            echo "<p>no characters like (!_<:$-), only characters like a-z A-Z 0-9</p>";
        }
        elseif ($_GET["error"] == "invalidemail") {
            echo "<p>choose a valid email</p>";
        }
        elseif ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>password doesn't match</p>";
        }
        elseif ($_GET["error"] == "stmtfailed") {
            echo "<p>something went wrong</p>";
        }
        elseif ($_GET["error"] == "usernametaken") {
            echo "<p>username already taken</p>";
        }
        elseif ($_GET["error"] == "none") {
            echo "<p>you have signd up</p>";
        }
    }
        ?>
    </div>
    <div class="split"></div>
    <div class="registerchildChild">
        <h1 id="loginText">Nieuwe klanten</h1>
        <form action="" method="post">
        <button class="inlogBtn" type="submit" name="gotoregistratiepage">Inloggen</button></form>
        <?php if(isset($_POST['gotoregistratiepage']))  {header('location: ../user/inlog.php');} ?>
    </div>
</div>


<?php
include_once("../header-footer/footer.php");
?>