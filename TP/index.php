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
    function GetCalendar($monthPicked, $yearPicked) // parametre Mois et Année a recup aprés.
    {
        $days = array(6, 0, 1, 2, 3, 4, 5);
        //lundi = 0, dimanche = 6
        $mois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        $week = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');

        $t = mktime(12, 0, 0, $monthPicked, 1, $yearPicked);
        // Timestamp du premier jour du mois choisi et de l'année choisi

        echo '<table><tbody>';
        // ouverture tableau
        echo '<tr><td colspan="7" class="month">' . $mois[$monthPicked] . ' ' . $yearPicked . '</td></tr>';
        // Case avec le mois et l'année ecrit
        echo '<tr class="days">';
        for ($i = 0; $i < 7; $i++) {
            echo '<td>' . $week[$i] . '</td>';
        }
        echo '</tr>';
        // Ligne avec les jours.
        // ------------------------------------------------------------
        // Le calendrier
        for ($l = 0; $l < 6; $l++)
        //Lignes
        {
            echo '<tr>';
            for ($i = 0; $i < 7; $i++)
            // Colonne (1/j)
            {
                $w = $days[(int)date('w', $t)]; // jours de la semaine 0->6     
                $m2 = (int)date('n', $t);  // Mois 1->12
                $calDay = (int)date('j', $t);

                $easter = easter_days($yearPicked);
                var_dump($easter);

                if (($w == $i) && ($m2 == $monthPicked)) {
                    if (($calDay == 1) && ($m2 == 1)) { // Jours de l'an
                        echo '<td class="speDate">' .  $calDay . '<br> Bonne année' . '</td>';
                        $t += 86400;
                    } else if (($calDay == 1) && ($m2 == 5)) {
                        echo '<td class="speDate">' .  $calDay . '<br> Fête du travail' . '</td>';
                        $t += 86400;
                    } else if (($calDay == 8) && ($m2 == 5)) {
                        echo '<td class="speDate">' .  $calDay . '<br> 8 Mai' . '</td>';
                        $t += 86400;
                    } else if (($calDay == 14) && ($m2 == 7)) {
                        echo '<td class="speDate">' .  $calDay . '<br> Fête Nationale' . '</td>';
                        $t += 86400;
                    } else if (($calDay == 15) && ($m2 == 8)) {
                        echo '<td class="speDate">' .  $calDay . '<br> 15 aout' . '</td>';
                        $t += 86400;
                    } else if (($calDay == 1) && ($m2 == 11)) {
                        echo '<td class="speDate">' .  $calDay . '<br> Toussaint' . '</td>';
                        $t += 86400;
                    } else if (($calDay == 11) && ($m2 == 11)) {
                        echo '<td class="speDate">' .  $calDay . '<br> Armistice' . '</td>';
                        $t += 86400;
                    } else if (($calDay == 25) && ($m2 == 12)) {
                        echo '<td class="speDate">' .  $calDay . '<br> Joyeux Nöel' . '</td>';
                        $t += 86400;
                    } else {
                        echo '<td class="date">' .  $calDay . '</td>'; // Affiche le jour du mois
                        $t += 86400; // Passe au jour suivant
                    }
                } else {
                    echo '<td class="empty">&nbsp; </td>'; // Case vide
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
            for ($i = 2021; $i >= 1930; $i--) {
                // liste 2021->1930 generé par la boucle
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