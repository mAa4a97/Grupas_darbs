<?php
//pārbaude vai dzēš Lietotāju
if(isset($_GET['dzest']) && (int)$_GET['dzest']>0 && $_GET['dzest']!=$_SESSION['id']){
	$param=array(
		array('i',$_GET['dzest'])	
	);	
	db::query("DELETE FROM lietotaji WHERE id=? LIMIT 1",$param);
}

//pārbaude vai pievieno Lietotāju
if(isset($_POST['lietotajvards'],$_POST['parole'],$_POST['pievienot']) && !empty($_POST['lietotajvards']) && !empty($_POST['parole'])){
	$param=array(
		array('s',$_POST['lietotajvards']),
		array('s',md5('f^89#hJ!'.md5($_POST['parole'])))
	);
	
	db::query("INSERT INTO lietotaji (lietotajvards, parole) VALUES(?,?)",$param);
}

//pārbaude vai labo Lietotāju
if(isset($_POST['lietotajvards'],$_POST['parole'],$_POST['labot'],$_POST['id']) && !empty($_POST['lietotajvards']) && (int)$_POST['id']>0){
	//vai maina paroli?
	if($_POST['parole']!=''){
		$param=array(
			array('s',$_POST['lietotajvards']),
			array('s',md5('f^89#hJ!'.md5($_POST['parole']))),
			array('i',$_POST['id'])
		);
		
		db::query("UPDATE lietotaji SET lietotajvards=?, parole=? WHERE id=? LIMIT 1",$param);
	}
	else{
		$param=array(
			array('s',$_POST['lietotajvards']),
			array('i',$_POST['id'])
		);
		
		db::query("UPDATE lietotaji SET lietotajvards=? WHERE id=? LIMIT 1",$param);
	}	
}

//izvadam pievienošanas formu


//labošanas skata izvade
if(isset($_GET['labot'])){
	$param=array(
		array('i',$_GET['labot'])
	);
	$lietotajs=db::query_row("SELECT * FROM lietotaji WHERE id=?",$param);
	if($lietotajs!=NULL){
		echo'
		<form method="post" action="">
			<p>
				Lietotājvārds: <input value="'.$lietotajs['lietotajvards'].'" type="text" name="lietotajvards" />
				<br />
				Parole: <input type="password" name="parole" />
				<br />
				<button name="labot">Labott</button>
				<input type="hidden" name="id" value="'.$lietotajs['id'].'" />
			</p>
		</form>';
	}
	else{
		echo'<p>Lietotājs neeksistē!</p>';
	}
}
else{
	echo'
	<form method="post" action="">
		<p>
			Lietotājvārds: <input type="text" name="lietotajvards" />
			<br />
			Parole: <input type="password" name="parole" />
			<br />
			<button name="pievienot">Pievienot</button>
		</p>
	</form>';	
	
	//Saraksta skata izvade
	$lietotaji=db::query("SELECT * FROM lietotaji");
	if($lietotaji!=NULL){
		echo'
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Lietotajvārds</th>
					<th>Darbības</th>
				</tr>
			</thead>
			<tbody>';
			
				foreach($lietotaji as $lietotajs){
					echo'
					<tr>
						<td>'.$lietotajs['id'].'</td>
						<td>'.$lietotajs['lietotajvards'].'</td>';
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
}

?>