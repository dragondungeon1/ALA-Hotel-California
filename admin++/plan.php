<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<span style="font-size:30px;cursor:pointer; text-align: center" onclick="openNav()">&#9776; Navigation</span>
<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
        <img style="width: 100px; height: 100px" src="../img/logo2.jpg" alt="">
        <a href="../index.php">Home</a>
        <a href= "index.php">Rooms</a>
<!--        <a href="accommodations.php">Accomodations</a>-->
<!--        <a href="#">Contact</a>-->
    </div>




    <script>
        function openNav() {
            document.getElementById("myNav").style.height = "100%";
        }

        function closeNav() {
            document.getElementById("myNav").style.height = "0%";
        }

        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>


</div>
<!--<div class="center">-->
<!--    <div id="printableArea">-->
<!--        <h1>Print the list of rooms</h1>-->
<!--    </div>-->
<!---->
<!---->
<!--</div>-->
<!--<div class="flex" style="margin-right: 170px">-->
<!--    <div class="foto-card">-->
<!--        <img class="photo" src="../img/plattegrond1.png" alt="test">-->
<!--        <input type="button" class="button-warning" style="width: 100px" onclick="printDiv('printableArea')" value="Print" />-->
<!--    </div>-->
<!--    <div class="foto-card">-->
<!--        <img class="photo" src="../img/plattegrond1.png" alt="test">-->
<!--        <input type="button" class="button-warning" style="width: 100px" onclick="printDiv('printableArea')" value="Print" />-->
<!--    </div>-->
<!---->
<!---->
<!--</div>-->
<!--<br> <br> <br> <br> <br> <br> <br> <br> <br><br><br><br><br> <br><br><br><br>-->

<?php
require_once "functions.php";
require_once "DB.php";

$stmt = $conn->prepare("SELECT * FROM guests");
$stmt->execute([]);
$guests = $stmt->fetchAll();

?>
<div>


<table>
    <tr>
        <th>id</th>
        <th>first name</th>
        <th>last name</th>
        <th>E-mail</th>
        <th>Roomnumber</th>
        <th>Room categorie</th>
        <th>Phone number</th>
        <th>Home adress</th>
        <th>City</th>
        <th>Country</th>
        <th>Start date</th>
        <th>End date</th>
    </tr>



        <?php foreach ($guests as $guest) :  ?>
    <tr>
            <td><?php echo $guest['id']  ?> </td>
            <td><?php echo $guest['firstname'] ?></td>
            <td><?php echo $guest['lastname'] ?></td>
            <td><?php echo $guest['email'] ?></td>
            <td><?php echo $guest['roomnumber'] ?></td>
            <td><?php echo $guest['roomcategorie'] ?></td>
            <td><?php echo $guest['phone'] ?></td>
            <td><?php echo $guest['homeadress'] ?></td>
            <td><?php echo $guest['city'] ?></td>
            <td><?php echo $guest['country'] ?></td>
            <td><?php echo $guest['startdate'] ?></td>
            <td><?php echo $guest['enddate'] ?></td>

    </tr>
        <?php endforeach; ?>
</div>

<input type="button" class="button-warning" style="width: 100px;" onclick="window.print()" value="Print" />
</table>
</body>
</html>
<!--probeer hier de data vanuit de database weer op te halen-->


