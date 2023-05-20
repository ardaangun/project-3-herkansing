<?php
session_start();
include_once("../header-footer/header.php");
include_once("../inc/func.inc.php");
include_once("../inc/db.inc.php");


if (isset($_SESSION['userid'])){
$checkadmin = admins($conn, $_SESSION["userid"]);
if ($checkadmin === true) {
    header('location: ../user/admin.php');
    exit();
}
}
// dit gaat over de producten laten zien via 2 divs op de pagina
?>
<div class="product">
    <div class="pronav">
        <input type="text" name="searchproduct" id="filterS" placeholder="search product...">
    </div>
    <div id="probody" class="probody">
        <?php
        $result = getdata($conn, "SELECT * FROM producten ORDER BY RAND()");
        while ($row = mysqli_fetch_assoc($result)){
            $naam = $row['naam'];
            $location = $row['location'];
            $afb = $row['afbeelding'];
            productt($naam, $location, $afb);
        }
        ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
function See1() {
        document.getElementById("example").classList.toggle("show");
}
function See2() {
        document.getElementById("example2").classList.toggle("show");
}
function See3() {
        document.getElementById("example3").classList.toggle("show");
}
function See4() {
        document.getElementById("example4").classList.toggle("show");
}
function See5() {
        document.getElementById("example5").classList.toggle("show");
}

$(document).ready(function(){
        $("#filterS").keyup(function(){
                var input = $(this).val();
                if(input != ""){
                $.ajax({
                        url:"../inc/sea.inc.php",
                        method:"post",
                        data:{searchguns:input},

                        success:function(data){
                        $("#probody").html(data);
                        $("#probody").css("display", "flex");
                        }
        });}});});
</script>
<?php
include_once("../header-footer/footer.php");
?>