<?php
function emptyInputSignup($name, $email, $pwd, $pwdRepeat) {
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat) {
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}
function uidExists($conn, $naam, $email) {
    $sql = "SELECT * FROM gebruikers WHERE email = ? OR naam = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../user/registreren.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $naam, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
}

function createUser($conn, $name, $email, $pwd) {
    $sql = "INSERT INTO gebruikers (naam, email, wachtwoord) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../user/registreren.php?error=stmtfailed');
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header('location: ../user/registreren.php?error=none');
    exit();
}
function emptyInputLogin($name, $pwd) {
    if (empty($name) || empty($pwd)) {
        $result = true;
    }
    else
    {
        $result = false;
    }
    return $result;
}
function loginUser($conn, $name, $pwd) {
    $uidExists = uidExists($conn, $name, $name);
    if ($uidExists === false) {
        header('location: ../user/inlog.php?error=userexist');
        exit();
    }

    $pwdHashed = $uidExists["wachtwoord"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header('location: ../user/inlog.php?error=passwordincorrect');
        exit();
    }
    elseif ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["id"];
        $_SESSION['email'] = $uidExists['email'];
        $_SESSION['naam'] = $uidExists['naam'];
        $_SESSION["ww"] = $uidExists["wachtwoord"];
        $_SESSION['lijst'] = array();
        header('location: ../userpages/homepage.php');
        exit();
    }
}

function getData($dat, $sqlComnd){
    include_once("../inc/db.inc.php");
    $data = mysqli_query($dat, $sqlComnd);

    if(mysqli_num_rows($data) >0){
        return $data;
    }
}
function showProduct($conn, $type){
    if ($type == 1){
    $maxCards = 0;
    $result = getdata($conn, "SELECT * FROM producten ORDER BY RAND()");
    while ($row = mysqli_fetch_assoc($result)){
        if ($maxCards < 4){
            ?>
            <form action="" method="post">
            <div class="card2"> <img src="<?php echo $row['afbeelding'];?>">
            <h1><?php echo $row['naam'];?></h1><p><?php echo "$ ". $row['prijs'];?></p>
            <button class="prodBtn" name="addtocart"><i class="fa-solid fa-cart-shopping"></i> Toevoegen</button>
            </div>
            <input type="hidden" name="productId" value="<?php echo $row['id'];?>">
            <input type="hidden" name="productNaam" value="<?php echo $row['naam'];?>">
            <input type="hidden" name="productPrijs" value="<?php echo $row['prijs'];?>">
            <input type="hidden" name="productCat" value="<?php echo $row['catogorie'];?>">
            <input type="hidden" name="productAfb" value="<?php echo $row['afbeelding'];?>">
            <input type="hidden" name="productMerk" value="<?php echo $row['merken'];?>">
            </form>
            <?php
            $maxCards++;
        }
    }
    }

    if ($type == 2){
        foreach ($_SESSION['lijst'] as $lijstid){
            $result = getdata($conn, "SELECT * FROM producten WHERE id = $lijstid");
            if ($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $afb = $row['afbeelding'];
                $name = $row['naam'];
                $des = $row['catogorie'];
                $prijs = $row['prijs'];
            ?>
            <div class="productL">
            <img src="<?php echo $afb ?>">
            <div>
            <h1 id="l1"><?php echo $name ?></h1>
            <p><?php echo $des ?></p>
            </div>
            <h1 id="l2"><?php echo $prijs ?></h1>
            <form action="" method="post">
            <button class="verwijderlijst" type="submit" name="deletelist"><i class="fa fa-ban"></i></button>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            </form>
            </div>
            <?php
            }
        }
    }
}

function GameCart($naam, $prijs, $image, $id, $campany){
    if ($prijs == 0){
        $productPrice = "free";
    }
    else
    {
        $productPrice = "&#128178;".$prijs;
    }

    $element = '
    <form action="cart.php?action=remove&Id='.$id.'" method="post">
    <div class="cartgames">
    <img id="cartGameImg" src="'.$image.'">
    <div class="cartGameText">
        <h1 id="Charcarpro">'.$naam.'</h1>
        <p id="Charcompany">Seller: '.$campany.'</p>
        <p id="GameType">GameType: base game</p>
        <h1 id="CharPrice">'.$productPrice.'</h1>
        <div id="cartButtons">
            <button type="submit" name="Wishlist" id="AddWish">Add to Wishlist</button>
            <button type="submit" name="remove" id="RemoveCart">Remove</button>
        </div>
    </div>
    </div>
    <input type="hidden" name="removeId" value="'.$id.'">
    </form>
    ';

    echo $element;
}

function printData($result){?>
    <table border="1" width="200"><br>
    <a href="?change">toevoegen nieuwe Product</a>
    <?php
    while ($row = mysqli_fetch_assoc($result)){
        makeTable($row['id'], $row['naam'], $row['prijs'], $row['catogorie'], $row['merken']);
    }
    ?>
    </table>
    <?php
}

function makeTable($id, $naam, $prijs, $catogorie, $merken){?>
<form action="" method="post">
    <tr>
        <td><?php echo $naam?></td>
        <td><?php echo $prijs?></td>
        <td><?php echo $catogorie?></td>
        <td><?php echo $merken?></td>
        <td><button type="submit" name="wijzig">wijzigen</button></td>
        <td><button type="submit" name="verwijder">verwijderen</button></td>
    </tr>
    <input type="hidden" name="rowId" value="<?php echo $id?>">
</form>
<?php
}

function wijzig($name1, $name2, $name3, $name4, $name5){?>
    <form method="post">
        <input type="text" name="<?php echo $name1?>" value="" placeholder="vul in naam">
        <input type="text" name="<?php echo $name2?>" value="" placeholder="vul in prijs">
        <input type="text" name="<?php echo $name3?>" value="" placeholder="vul in catogorie">
        <input type="text" name="<?php echo $name4?>" value="" placeholder="vul in afbeelding">
        <input type="text" name="<?php echo $name5?>" value="" placeholder="vul in merken">
        <button type="submit" name="makeG">maak nieuwe product</button>
        
    </form>
    
    <?php
}
function admins($conn, $id,) {
    $sql = "SELECT * FROM admins WHERE gebruikerid = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header('location: ../user/registreren.php?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    // $query = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($query) > 0){
    //     return true
    // }

    if($row = mysqli_fetch_assoc($resultData)) {
        return true;
    }
    else{
        $result = false;
        return $result;
    }
}

function makefilter($name, $location){
    ?>
        <form action="<?php echo $location ?>" method="post">
            <button id="addToCart" type="submit" name="limetRow">
                <a><?php echo $name ?></a>
            </button>
        </form>
    <?php
}
function productt($name, $location, $afb){
    ?>
    <form action="<?php echo $location ?>" method="post">
        <button id="productenn" type="submit" name="productt">
            <div class="prodChild">
                <img id="productt" src="<?php echo $afb ?>">
                <h1><?php echo $name ?></h1>
            </div>
        </button>
    </form>
    <button class="prodvoor" name="addtocart"><i class="fa-solid fa-cart-shopping"></i> Toevoegen</button>
    <?php
}
function producttt($name, $location){
    ?>
    <form action="<?php echo $location ?>" method="post"><button id="noshow"><div class="headerprod-child"><h1><?php echo $name ?></h1></div></button></form>
    <?php
}