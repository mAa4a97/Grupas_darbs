<?php

$_SESSION['autorizejies']=0;
session_destroy();
//setcookie('autorizejies',0,time()-60*60);
header("Location: sign_up_page.php");

?>