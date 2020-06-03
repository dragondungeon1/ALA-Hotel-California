<?php
require_once "functions.php";

echo "<a href='index.php'><< Go back</a> <br> <br>";

if (isset($_GET['id'])){
    getCategorie($_GET['id'], $conn);

}

