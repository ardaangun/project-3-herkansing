<?php
session_start();
include_once("../header-footer/header.php");
include_once("../inc/func.inc.php");
include_once("../inc/db.inc.php");

// voor de cart
if (isset($_SESSION['userid'])){
$checkadmin = admins($conn, $_SESSION["userid"]);
if ($checkadmin === true) {
    header('location: ../user/admin.php');
    exit();
}
}

if (isset($_POST['addtocart'])){
    if (!isset($_SESSION['userid'])){
        header("location: ../user/inlog.php");
    }
    else{
        $item_ary = array('productId' => $_POST['productId']);
        $_SESSION['cart'][0] = $item_ary;
        $count = count($_SESSION['cart']);
        header("location: ../user/cart.php");
    }
}
?>

<!-- // de dropdown -->
<div class="cato">
    <button onclick="See6()" class="dropdownBtnn">Catogorie</button>
    <a href="../userpages/productenpage.php">producten pagina</a>
</div>
<div id="homedropdown" class="homedropdown">
<a href="../userpages/productenpage.php">Munitie</a><br>
<a href="../userpages/productenpage.php">Vuurwapen</a><br>
<a href="../userpages/productenpage.php">LuchtDruk</a><br>
<a href="../userpages/productenpage.php">Junior</a><br>
</div>

<!-- // de slide show -->
<div class="silderHead">
    <div class="s1">
        <div class="imgban" id="imgban1"><img src="../docs/gun.webp"></div>
        <div class="imgban" id="imgban2"><img src="../docs/range.jpg"></div>
        <div class="imgban" id="imgban3"><img src="../docs/guy.jpg"></div>
    </div>
    <div class="s2">
        <div class="producten">
            <h1 id="s2Title">Welkom <?php echo $naam ?></h1>
            <h1 id="s2Title">
                Jouw wapenwinkel<br>
                voor jong en oud </h1>
            <p id="s2Besch">
            Bij Bradleys.com vind je alle benodigdheden voor de schietsport en luchtbuksen.<br>
            Bekijk en bestel ons ruime assortiment in de webshop of bezoek onze winkel in Rotterdam-Zuid.
            </p>
            <a href="../user/over.php">
            <button id="s2Btn">Meer over ons</button>
            </a>
        </div>
    </div>
</div>

<!-- // alle producten op de site -->
<div class="body2">
<h1 id="textt">Uitgelichte producten</h1>
    <div class="randomP">
        <?php 
        showProduct($conn, 1);
        ?>
    </div>
    <div class="textt2">
        <h1 id="textt">Catogorie</h1>
    </div>
    <div class="randomCat">
        <div class="card"> <img src="../docs/catA1.jpg">
            <h1>Vuurwapens</h1></div>
        <div class="card"> <img src="../docs/nerfA1.png">
            <h1>Junior</h1></div>
        <div class="card"> <img src="../docs/catA3.jpg">
            <h1>LuchtDruk</h1></div>
        <div class="card"> <img src="../docs/catA4.jpg">
            <h1>Munitie</h1></div>
    </div>
    <h1 id="textt">overige</h1>
    <div class="randomMerk">
        <div class="card"> <img src="../docs/nerf12.jpg"></div>
        <div class="card"> <img src="../docs/apa123.jpg"></div>
        <div class="card"> <img src="../docs/kok123.jpg"></div>
        <div class="card"> <img src="../docs/lowl123.jpg"></div>
    </div>
    
    <div class="information">
    </div>
</div>

<?php
include_once("../header-footer/footer.php");
?>

<!-- // voor de slide show -->
<script>
  var see6 = 1;
  function See6() {
    if (see6 === 1) {
      document.getElementById("homedropdown").style.display = "block";
      see6 = 2;
    } else if (see6 === 2) {
      document.getElementById("homedropdown").style.display = "none";
      see6 = 1;
    }
  }

  var bannerstatus = 1;

  function bn(nmr) {
    bannerstatus = nmr;
  }

  function loop() {
    var imgban1 = document.getElementById("imgban1");
    var imgban2 = document.getElementById("imgban2");
    var imgban3 = document.getElementById("imgban3");

    if (bannerstatus === 1) {
      imgban2.style.opacity = "0";
      setTimeout(function () {
        imgban1.classList.add("active");
        imgban2.classList.remove("active");
        imgban3.classList.remove("active");
      }, 4000);
      setTimeout(function () {
        imgban2.style.opacity = "1";
      }, 4000);
      bannerstatus = 2;
    } else if (bannerstatus === 2) {
      imgban3.style.opacity = "0";
      setTimeout(function () {
        imgban1.classList.remove("active");
        imgban2.classList.add("active");
        imgban3.classList.remove("active");
      }, 4000);
      setTimeout(function () {
        imgban3.style.opacity = "1";
      }, 4000);
      bannerstatus = 3;
    } else if (bannerstatus === 3) {
      imgban1.style.opacity = "0";
      setTimeout(function () {
        imgban1.classList.remove("active");
        imgban2.classList.remove("active");
        imgban3.classList.add("active");
      }, 4000);
      setTimeout(function () {
        imgban1.style.opacity = "1";
      }, 4000);
      bannerstatus = 1;
    }
  }

  // Set imgban1 to the active state initially
  var imgban1 = document.getElementById("imgban1");
  imgban1.classList.add("active");

  loop();

  var startloop = setInterval(loop, 4000);
</script>