<?php
	session_start();
	require "dbh.inc.php";

	$id=$_GET['id'];
	if ($_GET['type'] === '1') {
		$ligne=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM colis WHERE id_colis=".$id));
		if ($ligne['id_compte_e']===$_SESSION['id_compte']) mysqli_query($conn,"UPDATE colis SET supp=1 WHERE id_colis=".$id);
	} 
	if ($_GET['type'] === '2') {
		$ligne=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM trajet WHERE id_trajet=".$id));
		if ($ligne['id_compte']===$_SESSION['id_compte']) mysqli_query($conn,"UPDATE trajet SET supp=1 WHERE id_trajet=".$id);
	}
	header("location: ../profile.php");
	exit();
?>