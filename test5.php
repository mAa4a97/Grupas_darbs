<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','test');
define('DEBUG',true);

require 'lib/class.db.php';


/*
db::query_value(SQL VAICĀJUMS); - atgriež no datubāzes vienu konkrētu vērtību
db::query_row(SQL VAICĀJUMS); - atgriež vienu rindu no datubāzes
db::query(SQL VAICĀJUMS); - jebkuram citam SQL vaicājumam

SQL Vaicājumi
Datu nosalīšana no datubāzes:
SELECT šūna1,šūna2,šūna33 FROM tabulas_nosaukums 
SELECT * FROM tabulas_nosaukums - * nolasa visas šūnas
SELECT * FROM tabulas_nosaukums WHERE id=2
SELECT * FROM tabulas_nosaukums WHERE id>2 AND lietotajvards!='lietotajs1'
SELECT * FROM tabulas_nosaukums ORDER BY lietotajvards DESC
SELECT * FROM tabulas_nosaukums ORDER BY id DESC LIMIT 5
SELECT * FROM tabulas_nosaukums WHERE id>4 ORDER BY id DESC LIMIT 5

Datu labošana
UPDATE tabulas_nosaukums SET šūna1='vērtība1', šūna2=6,šūna3=6
UPDATE lietotaji SET lietotajvards='lietotajs1' WHERE id=8 LIMIT 1

Datu ievietošana
INSERT INTO tabulas_nosaukums (šūna1,šūna2,šūna33) VALUES('vērtība1',5,6)
INSERT INTO lietotaji (lietotajvards,parole) VALUES('lietotajs3','parole3')

Datu dzēšana
DELETE FROM tabulas_nosaukums WHERE id=3 LIMIT 1 
DELETE FROM lietotaji WHERE lietotajvards='lietotajs3' LIMIT 1
*/




/*
require 'fails';
require_once 'fails';
include 'fails';
include_once 'fails';

require - ja nav atrasts iesaucamais fails - sistēma izvada fatal error un darbību beidz
include - ja nav atrasts iesaucamais fails - sistēma izvada warning un darbību turpina

require_once, include_once - sistēma pieļauj vienu un to pašu failu iesaukt tikai vienu reizi

require, include - sistēma pieļauj vienu un to pašu failu iesaukt vairākas reizes
*/
//require_once 'fails.php';
//require_once 'fails.php';
//require_once 'fails.php';

//define('LIETOTAJVARDS','lietotajs1');
//define('PAROLE','parole1');
session_start();
/* konfigurācija */
//derīgo lietotāju masīvs
/*$lietotaji=array(
	array('lietotajvards'=>'lietotajs1','parole'=>'parole1'),
	array('lietotajvards'=>'lietotajs2','parole'=>'parole2'),
	array('lietotajvards'=>'lietotajs3','parole'=>'parole3')
);
*/

$lietotaji=db::query("SELECT * FROM lietotaji");


$pazinojums='';

/* Parbaude vai megina autorizeties */
if(isset($_POST['lietotajvards'],$_POST['parole'],$_POST['autorizeties'])){
	foreach($lietotaji as $lietotajs){
		//vai pareizi pieejas dati	
		if($_POST['lietotajvards']==$lietotajs['lietotajvards'] && md5('f^89#hJ!'.md5($_POST['parole']))==$lietotajs['parole']){
			$_SESSION['autorizejies']=1;
			$_SESSION['lietotajvards']=$lietotajs['lietotajvards'];			
			$_SESSION['id']=$lietotajs['id'];			
			//setcookie('autorizejies',1,time()+60*60);
			header("Location: test5.php");
		}
	}	
	$pazinojums='Lietotājvārds un/vai parole nav pareiza.';
}


//parbaude vai ir autorizejies
if(isset($_SESSION['autorizejies']) && $_SESSION['autorizejies']==1){
//if(isset($_COOKIE['autorizejies']) && $_COOKIE['autorizejies']==1){
	define('AUTORIZEJIES',1);
	define('LIETOTAJVARDS',$_SESSION['lietotajvards']);
}
else{
	define('AUTORIZEJIES',0);
	define('LIETOTAJVARDS','');
}
/*
$sadalas=array(
	array('adrese'=>'sakums','nosaukums'=>'Sākums','redzams'=>'visiem','informacija'=>''),
	array('adrese'=>'summa','nosaukums'=>'Summa','redzams'=>'visiem','informacija'=>''),
	array('adrese'=>'kontakti','nosaukums'=>'Kontakti','redzams'=>'visiem','informacija'=>''),
	array('adrese'=>'parmums','nosaukums'=>'Par mums','redzams'=>'visiem','informacija'=>''),
	array('adrese'=>'lietotaji','nosaukums'=>'Lietotāji','redzams'=>'autorizetiem','informacija'=>''),
	array('adrese'=>'vestules','nosaukums'=>'Vēstules','redzams'=>'autorizetiem','informacija'=>' (6)'),
	array('adrese'=>'autorizeties','nosaukums'=>'Autorizēties','redzams'=>'neautorizetiem','informacija'=>''),
	array('adrese'=>'iziet','nosaukums'=>'Iziet','redzams'=>'autorizetiem','informacija'=>' ('.LIETOTAJVARDS.')')
);
*/
$sadalas=db::query("SELECT * FROM sadalas");


echo'
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title>Test5</title>
	</head>
	<body>';



echo'<p>';
foreach($sadalas as $sadala){
	//divi nederīgi gadījumi, kad mēs sadaļu neizvadām.
	if(($sadala['redzams']=='autorizetiem' && AUTORIZEJIES==0) || ($sadala['redzams']=='neautorizetiem' && AUTORIZEJIES==1)){
		continue;
	}
	else{
		echo'<a href="?sadala='.$sadala['adrese'].'">'.$sadala['nosaukums'].''.$sadala['informacija'].'</a> ';
	}
}
echo'</p>';

if(isset($_GET['sadala'])){
	$atrasta_sadala=0;
	foreach($sadalas as $sadala){
		if($_GET['sadala']==$sadala['adrese']){
			if(($sadala['redzams']=='autorizetiem' && AUTORIZEJIES==0) || ($sadala['redzams']=='neautorizetiem' && AUTORIZEJIES==1)){
				header("Location: test5.php");
			}
			else{
				if($sadala['tips']=='fails'){
					include 'lib/'.$_GET['sadala'].'.php';
				}
				else{
					echo nl2br($sadala['saturs']);
				}
				$atrasta_sadala=1;
				break;
			}
		}
	}
	if($atrasta_sadala==0){
		include 'lib/sakums.php';
	}
}
else{
	include 'lib/sakums.php';
}

	echo'
	</body>
</html>
';



/* paziņojuma funkcija */
function pazinojums($pazinojums){
	if($pazinojums!=''){
		echo'<p>'.$pazinojums.'</p>';
	}
}



?>