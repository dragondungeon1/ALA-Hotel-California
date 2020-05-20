<?php
require_once "functions.php";

if (isset($_GET['id'])){
    getCategorie($_GET['id'], $conn);

}