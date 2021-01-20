<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $now = time(); // or your date as well
    $your_date = strtotime("2016-08-02 15:00:00");
    $datediff = $now - $your_date;

    echo round($datediff / (60 * 60 * 24));

    ?>
</body>

</html>