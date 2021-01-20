<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    
    $date = date_create();
    echo date_timestamp_get($date).'<br>';
    $date2 = date_create("2016-08-02 15:00:00");
    echo date_timestamp_get($date2);

    ?>

</body>

</html>