<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','grupu_darbs');
define('DEBUG',true);

require 'sub/class.db.php';

session_start();

//---------------------------------------------- Auth
$lietotaji=db::query("SELECT * FROM lietotaji");

$pazinojums='';

if(isset($_POST['unique_lietotajs'],$_POST['autorizeties'])){
	foreach($lietotaji as $lietotajs){
		//vai pareizi pieejas dati	
		//if(md5('f^89#hJ!'.md5($_POST['Pers_kods']))==$lietotajs['Pers_kods']){
		if($_POST['unique_lietotajs']==$lietotajs['unique_lietotajs']){
			$_SESSION['autorizejies']=1;		
			$_SESSION['id']=$lietotajs['unique_lietotajs'];			
			//setcookie('autorizejies',1,time()+60*60);
			header("Location: sign_up_page.php");
		}
	}	
	$pazinojums='Unikālais kods nav pareizs';
}

if(isset($_SESSION['autorizejies']) && $_SESSION['autorizejies']==1){
    //if(isset($_COOKIE['autorizejies']) && $_COOKIE['autorizejies']==1){
    define('AUTORIZEJIES',1);
    define('LIETOTAJVARDS',$_SESSION['id']);
}
else{
    define('AUTORIZEJIES',0);
    define('LIETOTAJVARDS','');
}

$sadalas=db::query("SELECT * FROM sadalas");

//---------------------------------------- Main Page
echo'
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<title>Reģistrācija</title>
	</head>
	<body>';



echo'<p>';
foreach($sadalas as $sadala){
	//divi nederīgi gadījumi, kad mēs sadaļu neizvadām.
	if(($sadala['redzams']=='autorizetiem' && AUTORIZEJIES==0) || ($sadala['redzams']=='neautorizetiem' && AUTORIZEJIES==1)){
		continue;
	}
	else{
		echo'<a href="?sadala='.$sadala['adrese'].'">'.$sadala['nosaukums'].'</a> ';
	}
}
echo'</p>';

$select_menu=db::query("SELECT DISTINCT Pers_kods FROM lietotaji
WHERE unique_lietotajs LIKE '".$_SESSION['id']."'");

if(isset($_GET['sadala'])){
	$atrasta_sadala=0;
	foreach($sadalas as $sadala){
		if($_GET['sadala']==$sadala['adrese']){
			if(($sadala['redzams']=='autorizetiem' && AUTORIZEJIES==0) || ($sadala['redzams']=='neautorizetiem' && AUTORIZEJIES==1)){
				header("Location: sign_up_page.php");
			} else {
				include 'sub/'.$_GET['sadala'].'.php';
			}
		}
	}
}
else{
	include 'sub/sakums.php';
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