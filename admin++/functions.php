<?php
require_once "DB.php";
/* Categorie functions */
function getCategorieDetails($catid, $conn){
    $stmt = $conn->prepare('SELECT * FROM categorie where id = :cat_id'); //producten ophalen op basis van categorie
    $stmt->bindParam(':cat_id', $catid, PDO::PARAM_INT); //$catid toevoegen aan Query
    $stmt->execute(); //Query uitvoeren

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getCategorie($catid, $conn){
    $stmt = $conn->prepare('SELECT * FROM product where categorie_id = :cat_id');
    $stmt->bindParam(':cat_id', $catid, PDO::PARAM_INT);
    $stmt->execute();
    $catDetails = getCategorieDetails($catid, $conn);
    $roomDetails = getRoomDetails($catid, $conn);
    while ($prodRow = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<b>Room</b> " .  $prodRow['room_number'] . "<br>"
            . $catDetails['img'] . '<br>'
            . $roomDetails['price'] . "<br>"
            . $catDetails['beschrijving'] ;

    };
}
//<img class='foto-card flex' src='/Hotel/
/* Room functions */
function getRoomDetails($roomid, $conn){
    $stmt = $conn->prepare('SELECT * FROM categorie where room_number = :room_id LIMIT 1'); //producten ophalen op basis van categorie
    $stmt->bindParam(':room_id', $roomid, PDO::PARAM_INT); //$catid toevoegen aan Query
    $stmt->execute(); //Query uitvoeren

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function checkSeasonDate($startdate, $enddate, $checkdate /*= new DateTime()*/ ){
    $checkdate = new DateTime($checkdate);
    $startdate = new DateTime($startdate);
    $enddate = new DateTime($enddate);

    if($startdate <= $checkdate && $checkdate <= $enddate) {
        return true;
    }else{
        return false;
    }
}