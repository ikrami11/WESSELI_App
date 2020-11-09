<?php session_start(); require '../php/dbh.inc.php'; 
if(!isset($_SESSION['nom_admin'])) { $_SESSION['nom_admin']=""; };
if(!isset($_SESSION['der_page'])) { $_SESSION['der_page']=1; }?>
<!DOCTYPE html>
<html>
<head>
	<!--CSS-->
	<!--CSS Principal--><link rel="stylesheet" href="../css/style.css?version=7" type="text/css">
	<!--CSS Admin--><link rel="stylesheet" type="text/css" href="../css/style_admin.css?version=11">
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <!--JS--><script src="../js/jquery.js" type="text/javascript"></script>
    <!--Bib JQuery--><script src="../js/jquery.min.js" type="text/javascript"></script>
	<script src="../js/monJqueryA.js?version=2" type="text/javascript"></script>
	
    
	<title>Administration - colis.dz</title>
</head>
<body>
	<div id="page_nonadmin" style="display: none;">
	    <h2 class="s1" style="margin-top: 50px;">Erreur: Vous devez être connecté en tant qu'administrateur <br> pour accèder à cette page!</h2>
	    <h2 class="s1" style="font-size: 18px; color: #323232; margin-top: 50px;">Vous allez être redirigé vers la page d'accueil de colis.dz <br>dans 10 secondes</h2>
	</div>
	


	<div id="page_admin" style="display: none;">
    <div class="header"><!--Baniere-->
    <div class="container">
        <a href="../index.php" class="logo"><img src="../images/logo.png" style="width: 90px;" alt="colis.dz" /></a>
        <div class="nav">
            <ul>
                <li><a href="../index.php">accueil</a></li>
                <li><a href="#annonces">voir annonces</a></li>
                <li class="cx" id="dcx" ><a href="../php/logout_admin.php" id="decon">Se déconnecter</a></li>
                <li class="cx"><a onclick="der_page(1)" href="" id="admin">administration</a></li>
            </ul>
        </div>
    </div>
    </div>
    <h2 class="s1" style="margin-top: 20px; margin-bottom: 30px;">Administration</h2>

    <div class="container"  >
	<div class="tabs">
        <ul>
        	<li><a href="#" onclick="der_page(1)" id="tab_infos">Vos Infos</a></li>
        	<li><a href="#" onclick="der_page(2)" id="tab_notifs" style="display: inline-block;">Notifications
        		<div id="n" style="display: inline-block;">
                                <?php
                                 $e = 0 ;
                                 $sql = "SELECT * FROM notifications_admin WHERE vu = '$e'";
                                 $result = mysqli_query($conn,$sql);
                                $count= mysqli_num_rows($result);
                                if($count!=0) echo "<div class='label label-danger'>$count</div>";?>
                        </div>
                        <form id="v" method="get" action="../php/notif_admin.php" style="display: inline-block;"> 
                        </form>
        	</a></li>
        	<li><a href="#" onclick="der_page(3)" id="tab_ajout">Ajouter Un Administrateur</a></li>
        	<li><a href="#" onclick="der_page(4)" id="tab_tarifs">Gestion Des Tarifs</a></li>
        	
        </ul>
   
    </div>

    <div class="page" id="infos">
    	
    	<div class="right">
    		
    		<div>

    			<form id="form_infos" method="post" action="../php/modif_admin.php">
    				<div><label>Nom:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="nom" value="<?php echo $_SESSION['nom_admin']?>" disabled="true" id="chnom" required/></div>
    				<div><label>Prénom:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="prenom" value="<?php echo $_SESSION['prenom_admin']?>" disabled="true" id="chpre" required/></div>
    				<div><label>E-mail:</label>&nbsp;&nbsp;&nbsp;<input type="email" name="email" value="<?php echo $_SESSION['mail_admin']?>" disabled="true" id="chmail" required/></div>
    				<div><label>Mot de passe:</label>&nbsp;&nbsp;&nbsp;<input type="password" name="password" disabled="true" id="chpas" required/></div>
    				<div id="pass_rep" style="display: none;"><label>Répéter mot de passe:</label>&nbsp;&nbsp;&nbsp;<input type="password" name="conf_password" id="chpass" required/></div>
    				<script type="text/javascript">
               			var password = document.getElementById("chpas")
  						, confirm_password = document.getElementById("chpass");
						function validatePassword(){
  						if(password.value != confirm_password.value) {
   							confirm_password.setCustomValidity("Mot de passe incorrect!");
  						} else {
    						confirm_password.setCustomValidity('');
							}
						}
						password.onchange = validatePassword;
						confirm_password.onkeyup = validatePassword;
          		  </script>
    				<div id="conf" style="display: none;"><input type="submit" id="valid" value="Valider" class="boutton" style="width:145px;height:41px;"/></div>
				</form>
				<a href="#" id="modif" style="float: right;" class="boutton">Modifier</a><br><br><br>
				<a href="#" id="supp" style="float: right;" class="boutton suppr">Supprimer</a>

				<?php
    			$contact = include "../contact.txt";
    			$tel_admin=$contact[0];
    			$email_admin=$contact[1];
    			$fb_admin=$contact[2];
    			$twt_admin=$contact[3];
    			$snp_admin=$contact[4];
    			$ig_admin=$contact[5];
    			?>

    			<h2 class="s1" style="margin-top: 70px;">Infos Contact</h2>
				<form id="form_contact" method="post" action="../php/modif_contact.php" style="margin-top:50px;">
    				<div><label>Tél:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="a_tel" value="<?php echo $tel_admin ?>" disabled="true" id="chtel"/></div>
    				<div><label>E-mail:</label>&nbsp;&nbsp;&nbsp;<input type="email" name="a_mail" value="<?php echo $email_admin ?>" disabled="true" id="chema"/></div>
    				<div><label>Facebook:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="a_fb" value="<?php echo $fb_admin ?>" disabled="true" id="chfb"/></div>
    				<div><label>Twitter:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="a_twt" value="<?php echo $twt_admin ?>" disabled="true" id="chtwt"/></div>
    				<div><label>Instagram:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="a_ig" value="<?php echo $ig_admin ?>" disabled="true" id="chig"/></div>
    				<div><label>Snapchat:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="a_snp" value="<?php echo $snp_admin ?>" disabled="true" id="chsnp"/></div>
    				<div id="conf3" style="display: none;"><input type="submit" id="valid3" value="Valider" class="boutton" style="width:145px;height:41px;margin-bottom: 50px;"/></div>
				</form>
				<a href="#" id="modif3" style="float: right; margin-bottom: 50px;" class="boutton">Modifier</a>
    	
    	</div>
    	</div>
    </div>

    <div class="page" id="notifs" style="display: none; ">
    	<div class="list_notif" style="margin-bottom: 50px;">	
<?php 
	$result = mysqli_query($conn, "SELECT * FROM notifications_admin ORDER BY id_notif_admin DESC LIMIT 1");
	if (!$result) {die('Could not query');}
	if (mysqli_num_rows($result)==0) {echo '<p style="text-align:center;"><i>vous n\'avez aucune notification</i></p>';}
	else { $ligne = mysqli_fetch_array($result);
	$i=$ligne['id_notif_admin'];
	while ($i>0) {
		$sql="select * from notifications_admin where id_notif_admin=".$i." limit 1";
		$result=mysqli_query($conn,$sql);
		$ligne = $result->fetch_assoc();
    	if (($result!=NULL)&&(mysqli_num_rows($result)>0)) {
    		$sql="select * from compte where id_compte=".$ligne['id_compte_e']." limit 1";
    		$result=mysqli_query($conn,$sql);
    		if (mysqli_num_rows($result)>0) {$ligne2=$result->fetch_assoc();}
    		$sql="select * from compte where id_compte=".$ligne['id_compte_s'];
   			$result=mysqli_query($conn,$sql);
   			if (($result!=NULL)&&(mysqli_num_rows($result)>0)) {$ligne3=$result->fetch_assoc();}
    		if ($ligne['vu']==0) {
	    		if ($ligne['code']=='premium') {
	    			echo '	<div class="notif" id="notif'.$i.'">
	    						<button class="vu" id="vu'.$i.'" onclick="vuu('.$i.')"><img src="../images/vu.png" width="20px"></button>
	    						<div class="titrep">Demande Premium</div>
	    						<label class="lab">Demandeur:</label><a href="../profile.php?id='.$ligne['id_compte_e'].'&from=admin" target="_blank" class="prof">'.$ligne2['prenom'].' '.$ligne2['nom'].'</a>
	    						<p class="datep">'.$ligne['date_temps'].'</p>
	    					</div>';
				} 
				if ($ligne['code']=='signal') {
					$sql="select * from compte where id_compte=".$ligne['id_compte_s'];
   					$result=mysqli_query($conn,$sql);
   					if (mysqli_num_rows($result)>0) {$ligne3=$result->fetch_assoc();}
					echo '	<div class="notif" id="notif'.$i.'">
	    						<button class="vu" id="vu'.$i.'" onclick="vuu('.$i.')"><img src="../images/vu.png" width="20px"></button>
	    						<div class="titres">Signal d\'un utilisateur</div>
	    						<label class="lab">Signalé:</label><a href="../profile.php?id='.$ligne['id_compte_s'].'&from=admin" target="_blank" class="prof">'.$ligne3['prenom'].' '.$ligne3['nom'].'</a>
	    						<label class="lab">Par:</label><a href="../profile.php?id='.$ligne['id_compte_e'].'&from=admin" target="_blank" class="prof">'.$ligne2['prenom'].' '.$ligne2['nom'].'</a>
	    						<p class="datep">'.$ligne['date_temps'].'</p>
	    					</div>';
				}
			} else {
				if ($ligne['code']=='premium') {
	    			echo '	<div class="notifv" id="notif'.$i.'">
	    						<button class="vu" id="vu'.$i.'" onclick="vuu('.$i.')" style="right:-118px;"><img src="../images/nonvu.png" width="20px"></button>
	    						<div class="titreg">Demande Premium</div>
	    						<label class="lab">Demandeur:</label><a href="../profile.php?id='.$ligne['id_compte_e'].'&from=admin" target="_blank" class="prof">'.$ligne2['prenom'].' '.$ligne2['nom'].'</a>
	    						<p class="datep">'.$ligne['date_temps'].'</p>
	    					</div>';
				} 
				if ($ligne['code']=='signal') {
					echo '	<div class="notifv" id="notif'.$i.'">
								<button class="vu" id="vu'.$i.'" onclick="vuu('.$i.')"><img src="../images/nonvu.png" width="20px"></button>
	    						<div class="titreg">Signal d\'un utilisateur</div>
	    						<label class="lab">Signalé:</label><a href="../profile.php?id='.$ligne['id_compte_s'].'&from=admin" target="_blank" class="prof">'.$ligne3['prenom'].' '.$ligne3['nom'].'</a>
	    						<label class="lab">Par:</label><a href="../profile.php?id='.$ligne['id_compte_e'].'&from=admin" target="_blank" class="prof">'.$ligne2['prenom'].' '.$ligne2['nom'].'</a>
	    						<p class="datep">'.$ligne['date_temps'].'</p>
	    					</div>';
				}
			}
		}	
    	
    	$i--;
	}
}
?>
    	</div>
    </div>



    <div class="page" id="tarifs" style="display: none;">
    	<div class="right" style="position: relative; right: 180px;">
    		
    		<?php
    			$tarif = include "../tarifs.txt";
    			$_SESSION['km']=$tarif[0];
    			$_SESSION['kg']=$tarif[1];
    			$_SESSION['m3']=$tarif[2];
    			$_SESSION['diff']=$tarif[3];
    			$_SESSION['spec']=$tarif[4];
    		?>
    		<div style="float: left;">
    			<form id="form_tarifs" method="post" action="../php/modif_tarifs.php">
    				<div><label>Par KM:</label>&nbsp;&nbsp;&nbsp;<input type="number" step="0.01" min="0" name="km" value="<?php echo $_SESSION['km']?>" disabled="true" id="chkm" required/>&nbsp;&nbsp;DA</div>
    				<div><label>Par KG:</label>&nbsp;&nbsp;&nbsp;<input type="number" step="0.01" min="0" name="kg" value="<?php echo $_SESSION['kg']?>" disabled="true" id="chkg" required/>&nbsp;&nbsp;DA</div>
    				<div><label>Par M3:</label>&nbsp;&nbsp;&nbsp;<input type="number" step="0.01" min="0" name="m3" value="<?php echo $_SESSION['m3']?>" disabled="true" id="chm3" required/>&nbsp;&nbsp;DA</div>
    				<div><label>Par Difficulté:</label>&nbsp;&nbsp;&nbsp;<input type="number" step="0.01" min="0" name="diff" value="<?php echo $_SESSION['diff']?>" disabled="true" id="chdiff" required/>&nbsp;&nbsp;DA</div>
    				<div><label>Demandes Spéciales:</label>&nbsp;&nbsp;&nbsp;<input type="number" step="0.01" min="0" name="spec" value="<?php echo $_SESSION['spec']?>" disabled="true" id="chspec" required/>&nbsp;&nbsp;DA</div>
    				<div id="conf2" style="display: none;"><input type="submit" id="valid2" value="Valider" class="boutton" style="width:145px;height:41px;margin-bottom: 50px;" /></div>
				</form>
				<a href="#" id="modif2" style="float: right; margin-bottom: 50px;" class="boutton">Modifier</a>
    		
    	</div>
    	</div>
    </div>

    <div class="page" id="ajout" style="display: none;"> 	
    <div class="right" style="position: relative; right: 180px;">
    <div style="float: left;">
    			<form id="form_ajout" method="post" action="../php/ajout_admin.php">
    				<div><label>Nom:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="nom_aj" required/></div>
    				<div><label>Prénom:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="prenom_aj" required/></div>
    				<div><label>E-mail:</label>&nbsp;&nbsp;&nbsp;<input type="email" name="email_aj" required/></div>
    				<div><label>Mot de passe:</label>&nbsp;&nbsp;&nbsp;<input type="password" name="password_aj" required/></div>
    				<div><label>Répéter mot de passe:</label>&nbsp;&nbsp;&nbsp;<input type="password" name="password_per_aj" required/></div>
    				<input type="submit" value="Valider" class="boutton" style="width:145px;height:41px;margin-bottom: 50px;" />
				</form>
    		
    	</div>
    </div>

    

    </div>
</div>

<div id="conf_supp" style="display: none; margin-top:-218px; ">
        <div style="position: fixed; height:100%; width: 100%; background: #000; opacity: 0.7;" ></div>
        <div style="width: 400px; height: 190px; background-color: #fff; border-radius: 20px; position: fixed; top:50%;left:50%; transform: translate(-50%,-50%);">
            <br><h2 class="s1" style="font-size: 18px;">Voulez-vous vraiment supprimer <br>votre compte?</h2><br>
            <a href="../php/supp_admin.php" class="boutton" style="float: left; margin-left: 40px; color: #fff;">Oui</a>
            <a href="#" class="boutton" id="annul_supp" style="margin-right: 40px; color: #fff;">Non</a>
    </div>

</div>

</div>


	

<script type="text/javascript">
	$(document).ready(function(){	
		var adm="<?php echo $_SESSION['nom_admin'] ?>";
		var clone=$("#page_admin").clone();
		$("#page_admin").remove();
		$("#page_nonadmin").fadeIn(0);
		var redir=setTimeout(function(){ window.location.href="../index.php"; }, 10000);
		if (adm!="") {
			clearTimeout(redir);
			$("#page_nonadmin").remove();
			$("body").append(clone);
			$("#page_admin").fadeIn(0);
		

		var der="<?php echo $_SESSION['der_page'] ?>";
		var css=".sidebar ul li a{background:#187cc2;} .sidebar ul li a:hover{background:#323232;}";

			if (der==1) {
				document.getElementById("notifs").style.display="none";
				document.getElementById("tarifs").style.display="none";
				document.getElementById("ajout").style.display="none";
				$("#infos").fadeIn();
				document.getElementById("tab_infos").style.background="#323232";
				document.getElementById("tab_notifs").style=css;
				document.getElementById("tab_tarifs").style=css;
				document.getElementById("tab_ajout").style=css;
			}
			if (der==2) {
				document.getElementById("infos").style.display="none";
				document.getElementById("tarifs").style.display="none";
				document.getElementById("ajout").style.display="none";
				$("#notifs").fadeIn();
				document.getElementById("tab_notifs").style.background="#323232";
				document.getElementById("tab_infos").style=css;
				document.getElementById("tab_tarifs").style=css;
				document.getElementById("tab_ajout").style=css;
			}
			if (der==3) {
				document.getElementById("infos").style.display="none";
				document.getElementById("tarifs").style.display="none";
				document.getElementById("notifs").style.display="none";
				$("#ajout").fadeIn();
				document.getElementById("tab_ajout").style.background="#323232";
				document.getElementById("tab_notifs").style=css;
				document.getElementById("tab_tarifs").style=css;
				document.getElementById("tab_infos").style=css;
			}
			if (der==4) {
				document.getElementById("infos").style.display="none";
				document.getElementById("notifs").style.display="none";
				document.getElementById("ajout").style.display="none";
				$("#tarifs").fadeIn();
				document.getElementById("tab_tarifs").style.background="#323232";
				document.getElementById("tab_notifs").style=css;
				document.getElementById("tab_infos").style=css;
				document.getElementById("tab_ajout").style=css;
			}
		}
	});

	$(document).ready(function(){
			var css=".sidebar ul li a{background:#187cc2;} .sidebar ul li a:hover{background:#323232;}"

			$("#tab_infos").click(function(event){
				event.preventDefault();
				
					document.getElementById("notifs").style.display="none";
					document.getElementById("tarifs").style.display="none";
					document.getElementById("ajout").style.display="none";
					$("#infos").fadeIn();
					document.getElementById("tab_infos").style.background="#323232";
					document.getElementById("tab_notifs").style=css;
					document.getElementById("tab_tarifs").style=css;
					document.getElementById("tab_ajout").style=css;
					
				
			})
			$("#tab_notifs").click(function(event){
				event.preventDefault();
				
					document.getElementById("infos").style.display="none";
					document.getElementById("tarifs").style.display="none";
					document.getElementById("ajout").style.display="none";
					$("#notifs").fadeIn();
					document.getElementById("tab_notifs").style.background="#323232";
					document.getElementById("tab_infos").style=css;
					document.getElementById("tab_tarifs").style=css;
					document.getElementById("tab_ajout").style=css;
					
			
			})
			$("#tab_tarifs").click(function(event){
				event.preventDefault();
				
					document.getElementById("infos").style.display="none";
					document.getElementById("notifs").style.display="none";
					document.getElementById("ajout").style.display="none";
					$("#tarifs").fadeIn();
					document.getElementById("tab_tarifs").style.background="#323232";
					document.getElementById("tab_notifs").style=css;
					document.getElementById("tab_infos").style=css;
					document.getElementById("tab_ajout").style=css;
				
				
			})
			$("#tab_ajout").click(function(event){
				event.preventDefault();
				
					document.getElementById("notifs").style.display="none";
					document.getElementById("tarifs").style.display="none";
					document.getElementById("infos").style.display="none";
					$("#ajout").fadeIn();
					document.getElementById("tab_ajout").style.background="#323232";
					document.getElementById("tab_notifs").style=css;
					document.getElementById("tab_tarifs").style=css;
					document.getElementById("tab_infos").style=css;
					
				
			})
		});
	


$(document).ready(function(){	
		
			$("#modif").click(function(event){
				event.preventDefault();
				document.getElementById("chnom").disabled=false;
				document.getElementById("chpre").disabled=false;
				document.getElementById("chmail").disabled=false;
				document.getElementById("chpas").disabled=false;
				$("#pass_rep").fadeIn();
				$("#modif").remove();
				$("#conf").fadeIn();
			})
			$("#supp").click(function(event){
				$("#conf_supp").fadeIn();
			})
			$("#annul_supp").click(function(event){
				$("#conf_supp").fadeOut();
			})
			$("#modif2").click(function(event){
				event.preventDefault();
				document.getElementById("chkg").disabled=false;
				document.getElementById("chkm").disabled=false;
				document.getElementById("chm3").disabled=false;
				document.getElementById("chdiff").disabled=false;
				document.getElementById("chspec").disabled=false;
				$("#modif2").remove();
				$("#conf2").fadeIn();
			})
			$("#modif3").click(function(event){
				event.preventDefault();
				document.getElementById("chtel").disabled=false;
				document.getElementById("chema").disabled=false;
				document.getElementById("chfb").disabled=false;
				document.getElementById("chtwt").disabled=false;
				document.getElementById("chig").disabled=false;
				document.getElementById("chsnp").disabled=false;
				$("#modif3").remove();
				$("#conf3").fadeIn();
			})
		});


	function vuu(i){
			$.post("../php/vu.php", { id:i });
			location.reload();
		}

		function der_page(i) {
			$.post("../php/der_page.php", { der : i });
		}

		function profil(i) {
			$.post("../php/vers_profil.php", {id : i});
		}
</script>

</body>
</html>