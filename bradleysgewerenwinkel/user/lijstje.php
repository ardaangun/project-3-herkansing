<?php
session_start();
include_once("../header-footer/header.php");
include_once("../inc/func.inc.php");
include_once("../inc/db.inc.php");

// om de lijsten via een post te latgen zien
if (isset($_SESSION['userid'])){
$checkadmin = admins($conn, $_SESSION["userid"]);
if ($checkadmin === true) {
    header('location: ../user/admin.php');
    exit();
}
}
if(isset($_POST['deletelist'])){
    $id = $_POST['id'];
        foreach ($_SESSION['lijst'] as $key => $value){
            if ($value == $id){
                unset($_SESSION['lijst'][$key]);
            }
        }
}
?>

<div class="titellijstje">
    <a href="../userpages/homepage.php">terug
    <i class="fa-sharp fa-solid fa-arrow-left"></i>
    </a>
    <h1> mijn lijstje </h1>
</div>

<div class="showproduct">
    <?php
showProduct($conn, 2);
?>
</div>






<?php
include_once("../header-footer/footer.php");
?>