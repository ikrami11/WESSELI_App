<?php
	session_start();
	require "dbh.inc.php";
	$id=$_GET['id'];
	$comptes=mysqli_query($conn,"SELECT * FROM colis WHERE id_trajet=".$id);
	$date=date("Y-m-d H:i:s");
	if ($_GET['vers'] === '1') {
		$etat="en route";
		$code=0;
	} 
	else if ($_GET['vers'] === '2') {
		$etat="arrive";
		$code=0;
	}
	else if ($_GET['vers'] === '3') {
		$etat="echec";
		$code=0;
	}
	else
	{
		//erreur
	}
	
	if ($ligne=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM trajet WHERE id_trajet=".$id))) {
		if ($_SESSION['id_compte']==$ligne['id_compte']) {
			mysqli_query($conn,"UPDATE trajet SET etat='".$etat."' WHERE id_trajet=".$id);
			mysqli_query($conn,"UPDATE colis SET etat='".$etat."' WHERE id_trajet=".$id);
			while ($compte=mysqli_fetch_array($comptes)) {
					mysqli_query($conn,"INSERT INTO notification (date_temps,id_compte_r,code_notif,id_colis,id_trajet,vu,acc,close) VALUES ('".$date."',".$compte['id_compte_e'].",".$code.",".$compte['id_colis'].",".$id.",0,0,0)");
			}
			if ($_GET['vers']!='1') header("location: ../profile.php?noter=1&id_noter=".$id);
			else header("location: ../profile.php");
			exit();
		} else {
			//erreur
		}
	} else {
		//erreur
	}

	
?>