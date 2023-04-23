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

echo `
    <form action="" method="post">
        <select>`;
        echo `
        </sekect>
    </form>
`;


//Saraksta skata izvade (no lietotaji.php)
//Redzeju grupu_darbs.sql "CREATE TABLE `lietotaji` ..." tapec nopratu, ka ari te tad jaatstaj tas $lietotaji mainigais
$lietotaji=db::query("SELECT * FROM lietotaji");
// Te lkm izvada tabulas 1. rindu jeb to kolonnu virsrakstus
if($lietotaji!=NULL){
    echo'
    <table>
        <thead>
            <tr>
                <th>Vieta</th>
                <th>Vārds</th>
                <th>Uzvārds</th>
                <th>Personas kods</th>
                <th>Studiju programma</th>
                <th>Rangs</th>
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
                    <td>'.$lietotajs['Vieta'].'</td>,
                    <td>'.$lietotajs['Vards'].'</td>,
                    <td>'.$lietotajs['Uzvards'].'</td>,
                    <td>'.$lietotajs['Pers_kods'].'</td>,
                    <td>'.$lietotajs['Stud_prog'].'</td>,
                    <td>'.$lietotajs['Vid'].'</td>'; //Rangs = Videja atzime
                    // Es minu, ka nakoso 9 rindinu vieta vajag sakartot pec ranga izmantojot SQL sintaksi
                    if($lietotajs['id']==$_SESSION['id']){
                        echo'<td><a href="?sadala=lietotaji&labot='.$lietotajs['id'].'">Labot</a></td>';
                    }
                    else{
                        echo'<td>
                            <a href="?sadala=lietotaji&labot='.$lietotajs['id'].'">Labot</a> | 
                            <a href="?sadala=lietotaji&dzest='.$lietotajs['id'].'">Dzēst</a>
                        </td>';
                    }
                echo'
                </tr>';
            }
        
        echo'
        </tbody>
    </table>';	
}
else{
    echo'<p>Lietotāju nav!</p>';
}

?>