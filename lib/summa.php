<?php

echo'
<form method="post" action="">
	<p>
		Skaitlis1 <input type="number" name="skaitlis1" value="0" />
		<br />
		Skaitlis2 <input type="number" name="skaitlis2" value="0" />
		<br />
		<button name="aprekinat">Aprēķināt</button> 	
	</p>
</form>
';

if(isset($_POST['skaitlis1'],$_POST['skaitlis2'],$_POST['aprekinat'])){
	echo '<p>Skaitļu '.$_POST['skaitlis1'].' un '.$_POST['skaitlis2'].' summa = '.(int)$_POST['skaitlis1']+(int)$_POST['skaitlis2'].'</p>';
}

?>