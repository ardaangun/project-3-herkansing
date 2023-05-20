<?php
include_once('../header-footer/header.php');
include_once('../inc/func.inc.php');
include_once('../inc/db.inc.php');
session_start();
if (isset($_SESSION['userid'])){
$checkadmin = admins($conn, $_SESSION["userid"]);
if ($checkadmin === false) {
    header('location: ../user/inlog.php?notadmin');
    exit();
}
}
// dis is alles van de crud

if(isset($_POST['wijzig'])){
    $id = $_POST['rowId'];
    $_SESSION['id'] = $id;
    header("location: ?update");
}
if(isset($_POST['verwijder'])){
    $id = $_POST['rowId'];
    $sql = "DELETE FROM producten WHERE id = $id";
    mysqli_query($conn, $sql);
}
if(isset($_POST['naam'])){
    $naam = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $catogorie = $_POST['catogorie'];
    $afbeelding = $_POST['afbeelding'];
    $merken = $_POST['merken'];
    $sql = "INSERT INTO producten (naam, prijs, catogorie, afbeelding, merken) VALUES ('$naam', $prijs, '$catogorie', '$afbeelding', '$merken');";
    mysqli_query($conn, $sql);
    header("location: ?");
}
if(isset($_POST['naam1'])){
    $naam = $_POST['naam1'];
    $soort = $_POST['soort1'];
    $stijl = $_POST['stijl1'];
    $alcohol = $_POST['alcohol1'];
    $brouwcode = $_POST['brouwcode1'];
    $uid = $_SESSION['id'];
    $sql = "UPDATE producten SET naam = '$naam', prijs = '$soort', catogorie = '$stijl', afbeelding ='$alcohol', merken = '$brouwcode' WHERE id = $uid;";
    mysqli_query($conn, $sql);
    header("location: ?");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $result = getData($conn, "SELECT * FROM producten");
    if(isset($_GET['update'])){
         wijzig("naam1", "soort1", "stijl1", "alcohol1", "brouwcode1",);
    }
    if(isset($_GET['change'])){
        wijzig("naam", "prijs", "catogorie", "afbeelding", "merken",);
    }
    printData($result);
    ?>
</body>
</html>

<?php
include_once('../header-footer/footer.php');
?>