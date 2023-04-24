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
// Definējam jau iepriekš vietas indeksāciju
$vieta = 1;

// Te būs dropdown menu, kurā lietotājam jāizvēlas studiju programma, kādā viņš ir reģistrējies
$select_menu=db::query("SELECT DISTINCT Stud_prog FROM lietotaji
WHERE Pers_kods LIKE '".$_SESSION['id']."'");

echo '
    <form action="" method="post">
        <select name="studiju_programma_selection">';
        foreach($select_menu as $selection){
            echo'
            <option value="'.$selection['Stud_prog'].'">'.$selection['Stud_prog'].'</option>';
        };
        echo '
        </select>
        <button type="submit">Submit</button>;
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

    // Tiks izmainīts query, kurā tiks iekļauts check - kura studiju programma dropdown izvēlnē tika izvēlēta, lai netiktu uzrādīta lieka informācija par studiju programmām, kurās lietotājs NAV reģistrējies.


    // Te izvada tabulas 1. rindu jeb to kolonnu virsrakstus
    if($lietotaji!=NULL){
        echo'
        <h1>'.$studiju_programma_selected.'</h1>
        <table>
            <thead>
                <tr>
                    <th>Vieta</th>
                    <!--<th>Vārds</th>-->
                    <!--<th>Uzvārds</th>-->
                    <th>Personas kods</th>
                    <th>Reģistrācijas datums</th>
                    <th>Studiju programma</th>
                    <th>Rangs</th>
                    <th>Vidējā atzīme</th>
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
                        <td>'.$lietotajs['Vid'].'</td>'; //Rangs = Videja atzime
                        // Es minu, ka nakoso 9 rindinu vieta vajag sakartot pec ranga izmantojot SQL sintaksi
                    echo'
                    </tr>';
                    $vieta++;
                }
            echo'
            </tbody>
        </table>';	
    }
    else{
        echo'<p>Lietotāju nav!</p>';
    }
}
?>