<?php
function build_calendar($month, $year){
//een array met de namen van de dagen van de week.
    $daysOfWeek = array("Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday");

    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
//  Nummers van de dagen in een maand

    $numberDays = date('t', $firstDayOfMonth);

//  informatie over de eerste dag van deze maand
    $dateComponents = getdate($firstDayOfMonth);

//  de naam ophalen van deze maand
    $monthName = $dateComponents['month'];

//  getting thenindex value 0-6 of the first day of this month
    $daysOfWeek = $dateComponents['wday'];

//  Huidige datum
    $dateToday = date('Y-m-d');

//  html talbe
    $calendar = "<table> ";
    $calendar = "<p><h2>$monthName $year</h2></p>";

    $calendar = "<tr>";
//    de kalender manekn
foreach ($daysOfWeek as $day){
    $calendar = "<th> $day </th> ";
}
$calendar = "<tr> </tr>";
if ($daysOfWeek > 0){
    for ($k =0;$k<$daysOfWeek;$k++){
        $calendar = "<td> </td>";
    }
}

//de dag teller
$currentDay = 1;

// maand nummer
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    while ($currentDay <= $numberDays){

//        als 7e column is bereikt (zaterdag) stat een nieuwe row

        if ($daysOfWeek == 7){
            $daysOfWeek = 0;
            $calendar = "</tr> <tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $calendar = "<><h4>$currentDay</h4>";

        $calendar = "</td>";

        $currentDay++;
        $daysOfWeek++;
    }

    if ($daysOfWeek != 7){
        $remainingDays = 7-$daysOfWeek;
        for ($i=o;$i<$remainingDays;$i++){
            $calendar = "<td> </td>";
        }
    }
    $calendar = "</tr>";
    $calendar = "</table>";

    echo $calendar;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $dateComponents = getdate();
    $month = $dateComponents['mon'];
    $year = $dateComponents['year'];
    echo build_calendar($month, $year)
    ?>
</body>
</html>
