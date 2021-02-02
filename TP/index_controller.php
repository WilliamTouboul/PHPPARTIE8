<?php

function GetCalendar($monthPicked, $yearPicked) // parametre Mois et Année a recup aprés.
{
    $days = array(6, 0, 1, 2, 3, 4, 5); // Tab jour, lundi = 0, dimanche =6;
    $mois = array('', 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'); // Mois
    $week = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'); // Jours

    $t = mktime(12, 0, 0, $monthPicked, 1, $yearPicked); // Renvoi le timestamp du premier jour du mois choisi et de l'année choisi

    echo '<table><tbody>'; // ouverture tableau
    echo '<tr><td colspan="7" class="month">' . $mois[$monthPicked] . ' ' . $yearPicked . '</td></tr>'; // Case avec le mois et l'année ecrit
    echo '<tr class="days">';
    for ($i = 0; $i < 7; $i++) {
        echo '<td>' . $week[$i] . '</td>';                   // Ligne de haut de tableau avec les jours lun->Dim
    }
    echo '</tr>';
    // Ligne avec les jours.
    // ------------------------------------------------------------
    // Le calendrier
    for ($j = 0; $j < 6; $j++)    //Lignes
    {
        echo '<tr>';
        for ($i = 0; $i < 7; $i++)        // Colonne (1/j)
        {
            $week2 = $days[(int)date('w', $t)]; // jours de la semaine 0->6     
            $m2 = (int)date('n', $t);  // Mois 1->12
            $calDay = (int)date('j', $t); // Chiffre du jour

            $easterInterval = easter_days($yearPicked); // renvoi le Delai 21mars->Paque pour l'année choisi
            $date1 =  '21-03-' . $yearPicked; // 21 Mars de l'année choisi
            $date2 = date('d-m-Y', strtotime($date1 . '+' . $easterInterval . 'days')); // 21 Mars + délai

            $easterDate =  strtotime($date2); // Conversion Date pour sortir le jour et le mois pour la condition
            $easterD = date('d', $easterDate);
            $easterM =  date('m', $easterDate);

            $lundiDePaque = $easterDate + 86400; // timestamp + 1j -> Jour et Mois pour la condition.
            $ldpD = date('d', $lundiDePaque);
            $ldpM =  date('m', $lundiDePaque);

            $ascencion = $easterDate + 3369600; // Paque +39j
            $ascenD = date('d', $ascencion);
            $ascenM = date('m', $ascencion);

            $pentecote = $easterDate + 4233600; // +49j
            $penteD = date('d', $pentecote);
            $penteM = date('m', $pentecote);

            if (($week2 == $i) && ($m2 == $monthPicked)) {
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
                } else if (($calDay == 7) && ($m2 == 3)) {
                    echo '<td class="speDate">' .  $calDay . '<br> Joyeux Anniversaire moi.' . '</td>';
                    $t += 86400;
                } else if (($calDay == $easterD) && ($m2 ==  $easterM)) {
                    echo '<td class="speDate">' .  $calDay . '<br> Paque' . '</td>';
                    $t += 86400;
                } else if (($calDay ==  $ldpD) && ($m2 ==  $ldpM)) {
                    echo '<td class="speDate">' .  $calDay . '<br> Lundi de paque' . '</td>';
                    $t += 86400;
                } else if (($calDay ==   $ascenD) && ($m2 ==  $ascenM)) {
                    echo '<td class="speDate">' .  $calDay . '<br> Ascenscion' . '</td>';
                    $t += 86400;
                } else if (($calDay ==   $penteD) && ($m2 ==  $penteM)) {
                    echo '<td class="speDate">' .  $calDay . '<br> Ascenscion' . '</td>';
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


if (isset($_POST['buttonSubmit'])) {
    // conversion en int pour les rentrer en parametres. 
    $monthToInt = intval($_POST['month'], 10);
    $yearToInt =  intval($_POST['year'], 10);

    GetCalendar($monthToInt, $yearToInt); // fonction
}
