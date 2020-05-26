<?php
require_once "DB.php";

function getCategorie($catid, $conn){
    $stmt = $conn->prepare('SELECT * FROM product where categorie_id = :cat_id');
    $stmt->bindParam(':cat_id', $catid, PDO::PARAM_INT);
    $stmt->execute();

    while ($prodRow = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo $prodRow['naam'] . $prodRow['img'] . "<br>";
    };
}