<?php
if (isset($_SESSION["userid"])){
    $gebruikerid = $_SESSION["userid"];
    $email = $_SESSION["email"];
    $naam = $_SESSION["naam"];
}else{
    $gebruikerid = "";
    $email = "";
    $naam = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <!-- Mobile Specific Metas
  ================================================== -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body id="body">
    <nav class="mainnavbar">
    <div onclick="ashjcbasc()" class="logoHome"><p>BRADLEY.COM</p></div>
    <script> function ashjcbasc(){ window.location.href = "../userpages/homepage.php" }</script>
    <div class="container search-bar"><input id="searchonsite" type="text" placeholder="search"></div>
    <div id="headerprod" class="headerprod">

    </div>
    <div>
        <ul class="icon">
            
           
            <?php
                if (!isset($_SESSION["userid"])){
                    echo '<li><a href="../user/inlog.php?moetlogin" data-link><i class="fa-solid fa-heart"></i></a></li> ';
                    echo '<li><a href="../user/inlog.php?moetlogin" data-link><i class="fa-solid fa-cart-shopping"></i></a></li> ';
                    echo '<li><a href="../user/inlog.php?moetlogin" data-link><i class="fa-solid fa-user"></i></a></li> ';
                }else{
                    echo '<li><a href="../inc/logout.inc.php" data-link><i class="fa fa-sign-out" aria-hidden="true"></i></a></li> ';
                    echo '<li><a href="../user/cart.php" data-link><i class="fa-solid fa-cart-shopping"></i></a></li> ';
                    echo '<li><a href="../user/lijstje.php" data-link><i class="fa-solid fa-heart"></i></a></li> ';
                }
            ?>
        </ul>
    </div>
    </nav>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#searchonsite").keyup(function(){
                var input = $(this).val();
                if(input != ""){
                $.ajax({
                        url:"../inc/sea.inc.php",
                        method:"post",
                        data:{search:input},

                        success:function(data){
                        $("#headerprod").html(data);
                        $("#headerprod").css("display", "flex");
                        }
    });}else{
        $("#headerprod").css("display", "none");
    }
    });});
</script>