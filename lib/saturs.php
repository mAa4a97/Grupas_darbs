<?php

//pārbaude vai pievieno sadaļu
if(isset($_POST['adrese'],$_POST['nosaukums'],$_POST['saturs'],$_POST['pievienot']) && !empty($_POST['adrese']) && !empty($_POST['nosaukums'])){
	$param=array(
		array('s',$_POST['adrese']),
		array('s',$_POST['nosaukums']),
		array('s',$_POST['saturs'])
	);
	
	db::query("INSERT INTO sadalas (adrese, nosaukums,saturs,redzams,tips) VALUES(?,?,?,'visiem','datubaze')",$param);
}

//pārbaude vai labo sadaļu
if(isset($_POST['adrese'],$_POST['nosaukums'],$_POST['saturs'],$_POST['labot'],$_POST['id']) && !empty($_POST['adrese']) && !empty($_POST['nosaukums'])){
		$param=array(
			array('s',$_POST['adrese']),
			array('s',$_POST['nosaukums']),
			array('s',$_POST['saturs']),
			array('i',$_POST['id'])
		);
		
		db::query("UPDATE sadalas SET adrese=?, nosaukums=?,saturs=? WHERE id=? LIMIT 1",$param);		
}

//izvadam pievienošanas formu


//labošanas skata izvade
if(isset($_GET['labot'])){
	$param=array(
		array('i',$_GET['labot'])
	);
	$sadala=db::query_row("SELECT * FROM sadalas WHERE id=?",$param);
	if($sadala!=NULL){
		echo'
		<form method="post" action="">
			<p>
				Adrese: <input value="'.$sadala['adrese'].'" type="text" name="adrese" />
				<br />
				Nosaukums: <input value="'.$sadala['nosaukums'].'" type="text" name="nosaukums"  />
				<br />
				Saturs:<textarea name="saturs">'.$sadala['saturs'].'</textarea>
				<button name="labot">Labot</button>
				<input type="hidden" name="id" value="'.$sadala['id'].'" />
			</p>
		</form>';
	}
	else{
		echo'<p>Sadaļa neeksistē!</p>';
	}
}
else{
	echo'
	<form method="post" action="">
		<p>
			Adrese: <input type="text" name="adrese" />
			<br />
			Nosaukums: <input type="text" name="nosaukums" />
			<br />
			Saturs:<textarea name="saturs"></textarea>
			<button name="pievienot">Pievienot</button>
		</p>
	</form>';
	
	//Saraksta skata izvade
	$sadalas=db::query("SELECT * FROM sadalas");
	if($sadalas!=NULL){
		echo'
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Adrese</th>
					<th>Nosaukums</th>
					<th>Darbības</th>
				</tr>
			</thead>
			<tbody>';
			
				foreach($sadalas as $sadala){
					echo'
					<tr>
						<td>'.$sadala['id'].'</td>
						<td>'.$sadala['adrese'].'</td>
						<td>'.$sadala['nosaukums'].'</td>					
						<td><a href="?sadala=saturs&labot='.$sadala['id'].'">Labot</a></td>
					</tr>';
				}
			
			echo'
			</tbody>
		</table>';	
	}
	else{
		echo'<p>Sadaļu nav!</p>';
	}
}

?>