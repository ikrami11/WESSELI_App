<?php
    session_start();
    require 'dbh.inc.php';

 	$email = $_POST['email'];
 	$password = $_POST['password'];

    $_SESSION['nom']="";
    $_SESSION['message']="";
    $_SESSION['prem']="false";
    $sql = "select * from compte where mail = '".$email."' limit 1";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1) {
    	$ligne = $result->fetch_assoc();
    	$hash = $ligne['mot_passe'];
    	if (password_verify($password,$hash))
    	{
    	$exist = 1;	
    	$_SESSION['nom']=$ligne['nom'];
 		$_SESSION['prenom']=$ligne['prenom'];
        $_SESSION['email']=$email;
        $_SESSION['id_compte']=$ligne['id_compte'];
        $id=$ligne['id_compte'];
        $sql = "select * from premium where id_compte = '".$id."' limit 1";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['prem']="true";
        }
 		header("location: ../index.php");
 		exit();
    	}
    	else
    	{
            $_SESSION['message']="mdp";
    		header("location: ../index.php");
    		exit;
    	}
    }
    else
    	{
            $_SESSION['message']="eml";
    		header("location: ../index.php");
    		exit;
    	}
?> 		