<?php
/*
SQL Teikumi:

// Lai nolasītu, kurās studiju programmās lietotājs ir jau reģistrējies
// Tiks izmantots priekš selection menu
SELECT DISTINCT Stud_prog FROM lietotaji
WHERE Pers_kods LIKE $_POST['Pers_kods']


// Iespējams vēl kāds SQL teikums (nenāk ideju 4:28 pa nakti)

// Tabulai priekš sortinga // Ranga parādīšanas (WHERE Stud_prog LIKE [Lietotāja izvēlētā programma, atkarībā no tā, kur viņš ir reģistrējies])
SELECT Pers_kods AS Kods, date AS "Reģistrācijas datums", Stud_prog AS "Studiju programma", Rangs, Vid as "Vidējā atzīme" FROM lietotaji
WHERE Stud_prog LIKE "IT"
ORDER BY `lietotaji`.`Rangs` DESC, `lietotaji`.`Vid` DESC;

!!!Skatities no .lib lietotaji.php ka piemeru!!!
*/

// Izdrukājam lietotāja User ID aka Pers kodu
echo '<body style="background-color:#D6EAF8;">';
$username_array = db::query("SELECT DISTINCT Pers_kods FROM lietotaji 
WHERE unique_lietotajs LIKE '".$_SESSION['id']."'");
foreach($username_array as $username){
    echo '<p style="text-align: center">Tavs lietotājvārds: <b>'.$username['Pers_kods'].'</b></p>';
};
//echo '<br>';

// Definējam jau iepriekš vietas indeksāciju
$vieta = 1;

// Te būs dropdown menu, kurā lietotājam jāizvēlas studiju programma, kādā viņš ir reģistrējies
$select_menu=db::query("SELECT DISTINCT Stud_prog FROM lietotaji
WHERE unique_lietotajs LIKE '".$_SESSION['id']."'");

echo '
    <form action="" method="post" style="text-align: center">
        Izvēlies studiju programmu: 
        <select name="studiju_programma_selection">';
        foreach($select_menu as $selection){
            echo'
            <option value="'.$selection['Stud_prog'].'">'.$selection['Stud_prog'].'</option>';
        };
        echo '
        </select>
        <button type="submit">Parādīt</button>
    </form>
';

if(isset($_POST['studiju_programma_selection']) && !empty($_POST['studiju_programma_selection'])){
//Saraksta skata izvade (no lietotaji.php)
//Redzeju grupu_darbs.sql "CREATE TABLE `lietotaji` ..." tapec nopratu, ka ari te tad jaatstaj tas $lietotaji mainigais
    $studiju_programma_selected = $_POST['studiju_programma_selection'];

    //echo $studiju_programma_selected;
    $lietotaji=db::query("SELECT * FROM lietotaji
    WHERE Stud_prog LIKE '".$studiju_programma_selected."'
    ORDER BY `lietotaji`.`Rangs` DESC, `lietotaji`.`Vid` DESC;");

    // Definējam budžetu vietu skaitu vadoties pēc liepu.lv pamastudiju programmu informācijas
    $budget_places = 0;

    /*
    Studiju programmas špikeris:
        IT  40
        vied_tech   15 1
        vides_tech  15 1

        baltu_val   10 2
        eu_val  20 3
        new_media   31

        logop   15 1
        soc_darb    15 1
        pirmsk_skol 20 3
        sakumsk_skol    20 3
        skolot  80

        buisness    16
        kult_vad    10 2
        tour_vad    10 2
    */
    if($studiju_programma_selected == "IT"){
        $budget_places = 40;
    } else if($studiju_programma_selected == "new_media"){
        $budget_places = 31;
    } else if($studiju_programma_selected == "buisness"){
        $budget_places = 16;
    } else if($studiju_programma_selected == "skolot"){
        $budget_places = 80;
    } else if($studiju_programma_selected == "vied_tech" || $studiju_programma_selected == "vides_tech" || $studiju_programma_selected == "logop" || $studiju_programma_selected == "soc_darb"){
        $budget_places = 15;
    } else if($studiju_programma_selected == "baltu_val" || $studiju_programma_selected == "kult_vad" || $studiju_programma_selected == "tour_vad"){
        $budget_places = 10;
    } else if($studiju_programma_selected == "eu_val" || $studiju_programma_selected == "pirmsk_skol" || $studiju_programma_selected == "sakumsk_skol"){
        $budget_places = 20;
    }


    // Te izvada tabulas 1. rindu jeb to kolonnu virsrakstus
    if($lietotaji!=NULL){
        echo'
        <h1> Studiju programma: '.$studiju_programma_selected.'<br />
        Budžeta vietas: '.$budget_places.'</h1>
        <table>
            <thead>
                <tr>
                    <th>Vieta</th>
                    <!--<th>Vārds</th>-->
                    <!--<th>Uzvārds</th>-->
                    <th>Lietotājvārds</th>
                    <th>Reģistrācijas datums</th>
                    <th>Studiju programma</th>
                    <th>Rangs</th>
                    <th>Vidējā atzīme</th>
                    <th>Budžeta/Maksas</th>
                </tr>
            </thead>
            <tbody>';
            // 'Vieta' -> no 1. lidz pedejam lietotajam, izmantojot for ciklu
            // "Reģistrējoties, tiks aprēķināts jau ranga numurs" - neatradu kodu, kas to dara :/
            // Saprotu, ka no 52 lidz 60 rindai sitie ieliek visu lietotaju vertibas tabulaa
            // Te ievada tabula sis vertibas, pec tam kka vinas ORDER BY 'Vid' jeb rangs
                foreach($lietotaji as $lietotajs){
                    echo'
                    <tr>
                        <td>'.$vieta.'</td>
                        <!--<td>'.$lietotajs['Vards'].'</td>-->
                        <!--<td>'.$lietotajs['Uzvards'].'</td>-->
                        <td>'.$lietotajs['Pers_kods'].'</td>
                        <td>'.$lietotajs['date'].'</td>
                        <td>'.$lietotajs['Stud_prog'].'</td>
                        <td>'.$lietotajs['Rangs'].'</td>
                        <td>'.$lietotajs['Vid'].'</td>';
                        if(($budget_places - $vieta + 1) > 0){
                            echo
                        '<td>Budžeta</td>';
                        } else {
                            echo
                        '<td>Maksas</td>';
                        }
                    echo'
                    </tr>';
                    $vieta++;
                }
            echo'
            </tbody>
        </table>
        <h3>Pieteikušies programmai: '.($vieta-1).'<br>
        Atlikušās budžeta vietas: ';
        if(($remaining = $budget_places - $vieta + 1) > 0){
            echo $remaining.' no '.$budget_places;
        }	else {
            echo '0';
        }
        echo '</h3>';
    }
    else{
        echo'<p>Lietotāju nav!</p>';
    }
}
echo '</body>';
?>