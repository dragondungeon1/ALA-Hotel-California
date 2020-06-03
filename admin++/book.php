<?php

require_once "functions.php";

$roomDetails = getRoomDetails($_GET['room_number'], $conn);
?>

<h1>Book now room number <?=$roomDetails['room_number']?> </h1>
    <br>

<?php
$stmt = $conn->prepare('SELECT * FROM seasons');
$stmt->execute();

while($seasonRow = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $seasonRow['naam'] . '<br><br>';
    if(checkSeasonDate($seasonRow['startDate'], $seasonRow['endDate'], '03-06-2020')){
        echo 'Het is nu ' .$seasonRow['startDate'] . ' dan rekenen wij met een percentage van ' . $seasonRow['pricePercentage'] . '%';
        echo '<br>De prijs p.p.p.n is in de ' . $seasonRow['naam'] . '$' .($roomDetails['price'] / 100 ) * $seasonRow['pricePercentage'];
        break;
    }
}
