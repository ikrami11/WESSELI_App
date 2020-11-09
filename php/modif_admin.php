<?php
    session_start();
    require 'dbh.inc.php';
 
    
    $hash=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql="UPDATE compte_administrateur SET nom = '".$_POST['nom']."', prenom = '".$_POST['prenom']."', mail = '".$_POST['email']."', mot_passe = '".$hash."' WHERE id_admin = ".$_SESSION['id_admin'];

    mysqli_query($conn, $sql);

    $_SESSION['nom_admin']=$_POST['nom'];
    $_SESSION['prenom_admin']=$_POST['prenom'];
    $_SESSION['mail_admin']=$_POST['email'];

    $_SESSION['der_page']=1;

    header("location: ../admin/administration.php");
    exit();
    	
    	
 		
?> 		