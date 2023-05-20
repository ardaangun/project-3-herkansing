<?php
include_once("../inc/func.inc.php");
include_once("../inc/db.inc.php");
session_start();

if(isset($_POST['searchguns'])){
    $Sgames = $_POST['searchguns'];

    $dataGames = "SELECT * FROM producten WHERE naam LIKE '%{$Sgames}%' OR catogorie LIKE '%{$Sgames}%' OR merken LIKE '%{$Sgames}%';";
    $result = mysqli_query($conn, $dataGames);

    while($row = mysqli_fetch_assoc($result)){
        if (mysqli_num_rows($result)>0){
            $naam = $row['naam'];
            $location = $row['location'];
            $afb = $row['afbeelding'];
            productt($naam, $location, $afb);
    }else{
        echo "No games found";
    }
}}
if(isset($_POST['search'])){
    $Sgames = $_POST['search'];

    $dataGames = "SELECT * FROM producten WHERE naam LIKE '%{$Sgames}%' OR catogorie LIKE '%{$Sgames}%' OR merken LIKE '%{$Sgames}%';";
    $result = mysqli_query($conn, $dataGames);

    while($row = mysqli_fetch_assoc($result)){
        if (mysqli_num_rows($result)>0){
            $naam = $row['naam'];
            $location = $row['location'];
            $afb = $row['afbeelding'];
            producttt($naam, $location);
    }else{
        echo "No games found";
    }
}}