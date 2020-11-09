<?php

if (isset($_POST['note'])&& isset($_POST['id_trajet'])) {
    $conn=mysqli_connect("localhost","root","","projet2cp");
    # code...
$sql="SELECT * FROM trajet WHERE id_trajet=".$_POST['id_trajet'];
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['id_compte'];

$sql="SELECT * FROM compte WHERE id_compte=".$id;
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$ex_note=$row['fiab_tran'];
if ($ex_note!=0) {
	$note=($_POST['note']+$ex_note)/2;
}
else
{
	$note=$_POST['note'];
}

$note=($_POST['note']+$ex_note)/2;


$sql="UPDATE compte SET fiab_tran=".$note." WHERE id_compte=".$id;
$result=mysqli_query($conn,$sql);
}


?>