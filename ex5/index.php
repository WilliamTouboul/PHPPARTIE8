<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // $now = time(); 
    // $your_date = strtotime("2016-02-08 15:00:00");
    // $datediff = $now - $your_date;

    // echo round($datediff / (60 * 60 * 24));
    // // Version OBJET

    $date1 = new DateTime(); //Date du jour
    $date2 = new DateTime(date('16-05-2016')); // Date choisi
    $interval = $date1->diff($date2); // methode pour comparer des objets date.
    $nbdays = $interval->format('%R %a');
    echo $nbdays;
    ?>
</body>

</html>