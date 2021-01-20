<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $date1 = strtotime("2016-03-01 00:00:00"); // date la plus tard - date la plus tot / pour arriver en jour. 
    $date2 = strtotime("2016-02-01 00:00:00");
    $datediff = $date1 - $date2;

    echo round($datediff / (60 * 60 * 24));

    ?>
</body>

</html>