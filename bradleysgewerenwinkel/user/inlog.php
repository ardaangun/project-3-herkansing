<?php
session_start();
include_once("../inc/db.inc.php");
include_once("../header-footer/header.php");
include_once("../inc/func.inc.php");
?>
<!-- voor het inloggen -->
<h1 id="inlogTitle">Log In of maak een Account</h1>
<div class="inlogParent">
    <div class="inlogChild">
        <form action="../inc/login.inc.php" method="post">
        <h1 id="loginText">Geregistreerde klanten</h1>
        <p id="loginText">Als u een account bij ons heeft, meld u dan aan.</p>
        <label class="ïnlog" for="gebruikersnaam">gebruikersnaam</label><br>
        <input class="ïnlog" type="text" name="gebruikersnaam" placeholder="vul uw gebruikersnaam in" required minlength="5"><br>
        <label class="ïnlog" for="wachtwoord">wachtwoord</label><br>
        <input class="ïnlog" type="password" name="wachtwoord" placeholder="vul uw wachtwoord in" required maxlength="20" minlength="5">
        <p id="wwV">Wachtwoord Vergeten?</p>
        <p id="wwV"><?php 
        if (isset($_GET["moetlogin"])){
            echo "Uw moet eerst inloggen om verder te gaan.";
        }
        if (isset($_GET["notadmin"])){
            echo "Toegang alleen toegestaan voor de admin.";
        }




        

        ?> </p>
        <button class="inlogBtn" type="submit" name="submit">Inloggen</button>
        </form>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields</p>";
            }
            elseif ($_GET["error"] == "userexist") {
                echo "<p>User don't exist!</p>";
            }
            elseif ($_GET["error"] == "passwordincorrect") {
                echo "<p>Incorrect password!</p>";
            }
            elseif ($_GET["error"] == "loginfirst") {
                echo "<p>you need to login first!</p>";
            }
        }
        ?>
    </div>
    <div class="split"></div>
    <div class="registerchildChild">
        <h1 id="loginText">Nieuwe klanten</h1>
        <form action="" method="post">
        <button class="inlogBtn" type="submit" name="gotoregistratiepage">Account aanmaken</button></form>
        <?php if(isset($_POST['gotoregistratiepage']))  {header('location: ../user/registreren.php');} ?>
    </div>
</div>


<?php
include_once("../header-footer/footer.php");
?>