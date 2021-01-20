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
    <?php
    // fonction pour afficher le calendrier du mois choisi
    function GetCalendar($m, $y) // parametre Mois et Année a recup aprés.
    {
        $sem = array(6, 0, 1, 2, 3, 4, 5); //lundi = 0, dimanche = 6
        $mois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        $week = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');

        $t = mktime(12, 0, 0, $m, 1, $y); // Timestamp du premier jour du mois

        echo '<table><tbody>';

        // Le mois

        echo '<tr><td colspan="7" class="month">' . $mois[$m] . ' ' . $y . '</td></tr>';

        // Les jours de la semaine
        echo '<tr class="days">';
        for ($i = 0; $i < 7; $i++) {
            echo '<td>' . $week[$i] . '</td>';
        }
        echo '</tr>';

        // Le calendrier
        for ($l = 0; $l < 6; $l++) // calendrier sur 6 lignes
        {
            echo '<tr>';
            for ($i = 0; $i < 7; $i++) // 7 jours de la semaine
            {
                $w = $sem[(int)date('w', $t)]; // Jour de la semaine à traiter
                $m2 = (int)date('n', $t); // Tant que le mois reste celui du départ
                if (($w == $i) && ($m2 == $m)) // Si le jours de semaine et le mois correspondent
                {
                    echo '<td class="date">' . date('j', $t) . '</td>'; // Affiche le jour du mois
                    $t += 86400; // Passe au jour suivant
                } else {
                    echo '<td class="empty">&nbsp;</td>'; // Case vide
                }
            }
            echo '</tr>';
        }
        echo '</tbody></table>';
    }


    ?>

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
            for ($i = 2021; $i >= 1970; $i--) {
                // liste 2021->1970 generé par la boucle
                echo '<option value="' . $i . '">' . $i . '</option>';
            } ?>
        </select>
        <input type="submit" value="GO" id="buttonSubmit" name="buttonSubmit">
    </form>

    <?php

    if (isset($_POST['buttonSubmit'])) {
        // conversion en int pour les rentrer en parametres. 
        $monthToInt = intval($_POST['month'], 10);
        $yearToInt =  intval($_POST['year'], 10);

        GetCalendar($monthToInt, $yearToInt);
    }

    ?>
</body>

</html>