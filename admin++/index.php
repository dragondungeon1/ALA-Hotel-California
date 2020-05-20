<?php

require_once "functions.php";

$catQuery = "SELECT * FROM categorie";
$catResults = $conn ->query($catQuery);


foreach ($catResults as $catResult){
    echo '<a> <a href="viewcat.php?id="' . $catResult['id'] . $catResult['naam'] . "</a></b><br>";
//    "SELECT * FROM product where categorie_id = $carResult['id']";
    $stmt = $conn->prepare('SELECT * FROM product where categorie_id = :cat_id');
    $stmt->bindParam('cat_id', $catResult['id'], PDO::PARAM_INT);
    $stmt->execute();

    while ($prodRow = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo $prodRow['naam'] . "<br>";
    };



}
