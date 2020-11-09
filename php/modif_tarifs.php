<?php
	ob_start();
	session_start();

	$km = $_POST['km'];
	$kg = $_POST['kg'];
	$m3 = $_POST['m3'];
	$diff = $_POST['diff'];
	$spec = $_POST['spec'];

	$tarifs = array($km, $kg, $m3, $diff, $spec);

	file_put_contents("../tarifs.txt",  "<?php return " . var_export($tarifs, true) . ";");

	$_SESSION['der_page']=4;

	header("location: ../admin/administration.php");
	exit();

?>