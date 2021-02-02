<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>TP</h1>
 
    <form action="index.php" method="POST">
        <!-- Input choix mois -->
        <label for="month">Mois : </label>
        <select name="month" id="month">
            <option value="">--Choisissez un mois--</option>
            <option value="01">Janvier</option>
            <option value="02">Fevrier</option>
            <option value="03">Mars</option>
            <option value="04">Avril</option>
            <option value="05">Mai</option>
            <option value="06">Juin</option>
            <option value="07">Juillet</option>
            <option value="08">Aout</option>
            <option value="09">septembre</option>
            <option value="10">Octobre</option>
            <option value="11">Novembre</option>
            <option value="12">Décembre</option>
        </select>
        <!-- Input choix année -->
        <label for="year">Année : </label>
        <select name="year" id="year">
            <option value="">--Choisissez une année--</option>
            <?php
            for ($i = 2021; $i >= 1930; $i--) {
                // liste 2021->1930 generé par la boucle
                echo '<option value="' . $i . '">' . $i . '</option>';
            } ?>
        </select>
        <input type="submit" value="GO" id="buttonSubmit" name="buttonSubmit">
    </form>
    <?php include('index_controller.php'); ?>
</body>

</html>