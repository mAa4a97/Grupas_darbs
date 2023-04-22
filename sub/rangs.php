<?php
/*
SQL Teikumi:

// Lai nolasītu, kurās studiju programmās lietotājs ir jau reģistrējies


// Iespējams vēl kāds SQL teikums (nenāk ideju 4:28 pa nakti)

// Tabulai priekš sortinga // Ranga parādīšanas (WHERE Stud_prog LIKE [Lietotāja izvēlētā programma, atkarībā no tā, kur viņš ir reģistrējies])
SELECT Pers_kods AS Kods, date AS "Reģistrācijas datums", Stud_prog AS "Studiju programma", Rangs, Vid as "Vidējā atzīme" FROM lietotaji
WHERE Stud_prog LIKE "IT"
ORDER BY `lietotaji`.`Rangs` DESC, `lietotaji`.`Vid` DESC;

*/
?>