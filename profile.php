
<!DOCTYPE html>
<html>
<head>

<?php session_start(); require 'php/dbh.inc.php';

    if (!isset($_SESSION['der_page_'])) $_SESSION['der_page_']=1;
    if (!isset($_SESSION['id_compte'])) $_SESSION['id_compte']=NULL;

    $dev=0;
    $from="user";

    if ((!isset($_GET['id']))&&(!isset($_GET['from']))) {
        if (isset($_SESSION['id_compte'])) {
            $id_profil=$_SESSION['id_compte'];
            $nom_profil=$_SESSION['nom'];
            $prenom_profil=$_SESSION['prenom'];
        } else {
            //page introuvable
        }
    } else if ((isset($_GET['id']))&&(isset($_GET['from']))) {
        $id_profil=$_GET['id'];
        $from=$_GET['from'];
        if ($ligne=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM compte WHERE id_compte=".$id_profil))) {
            $nom_profil=$ligne['nom'];
            $prenom_profil=$ligne['prenom'];
            if (($from=="user")&&(isset($_SESSION['id_compte']))&&(mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM deverouille WHERE (id_compte1=".$id_profil." AND id_compte2=".$_SESSION['id_compte'].") OR (id_compte2=".$id_profil." AND id_compte1=".$_SESSION['id_compte'].") limit 1")))) $dev=1;
            if (($from=="admin")&&((!isset($_SESSION['nom_admin']))||($_SESSION['nom_admin']==""))) $from="user";
        } else {
            //page introuvable
        }
    } else {
        //erreur
    }

?>

	<!--CSS-->
	<!--CSS Principal--><link rel="stylesheet" href="css/style.css?version=7" type="text/css">
	<!--CSS Profil--><link rel="stylesheet" type="text/css" href="css/style_profil.css?version=16">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/profil.css?version=4" />
    <!--JS--><script src="js/jquery.js" type="text/javascript"></script>
    <!--Bib JQuery--><script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/monJqueryA.js?version=2" type="text/javascript"></script>
	
    
	<title><?php echo $nom_profil.' '.$prenom_profil ?> - colis.dz</title>
</head>
<body>

    
<div id="banieres" style="position: absolute; top:0; left:50%; transform: translate(-50%,0);">
	<div class="header" id="ban_norm"><!--Baniere normal-->
    <div class="container">
        <a href="index.php" class="logo"><img src="images/logo.png" style="width: 90px;" alt="colis.dz" /></a>
        <div class="nav">
            <ul>
            	<li><a href="index.php">accueil</a></li>
                <li><a href="#annonces">voir annonces</a></li>
                <li class="cx"><a href="inscription.php" id="inc">inscription</a></li>
                <li class="cx"><a href="#top" id="conx">connexion</a></li>
                <li id="nottiff" class="not_st" style=" display:none; margin-top: 36px;" ><a href="#" >
                <div id="n"> <?php
                            require 'php/dbh.inc.php';
                            $e = 0 ;
                            $ii =$_SESSION['id_compte'];
                            $sql = "SELECT * FROM notification WHERE vu = '$e' and id_compte_r='$ii'";
                            $result = mysqli_query($conn,$sql);
                            $count= mysqli_num_rows($result);
                            if($count!=0) echo "<div class='label label-danger'>$count</div>";?>
                        </div>
                        <form id="v" method="get" action="php/notif_utilisateur.php">
                        </form></a></li>
                <li id="dcx" class="apr_cx" style="display:none; margin-top: 10px;"><a href="php/logout.php" id="decon">Se déconnecter</a></li>
            </ul>
        </div>
    </div>
    </div>

    <div class="header" style="display: none;" id="ban_admin"><!--Baniere admin-->
    <div class="container">
        <a href="index.php" class="logo"><img src="images/logo.png" style="width: 90px;" alt="colis.dz" /></a>
        <div class="nav">
            <ul>
                <li><a href="index.php">accueil</a></li>
                <li><a href="#annonces">voir annonces</a></li>
                <li class="cx" id="dcx" ><a href="php/logout_admin.php" id="decon">Se déconnecter</a></li>
                <li class="cx"><a href="admin/administration.php" id="admin">administration</a></li>
            </ul>
        </div>
    </div>
    </div>
</div>
	
	
<div id="page_profil" style="position: absolute; top:150px; left:50%; transform: translate(-50%,0);">

<div id="profil_reduit" style="display: none;">
   
   <?php 
   $sql = "SELECT * from compte where id_compte = '".$id_profil."' limit 1";
   $result = mysqli_query($conn,$sql);
   $ligne = $result->fetch_assoc();
   $prof_prem=$ligne['prem_accepte'];
   if($ligne['prem_accepte']==0){$msg='non premium';}
   if($ligne['prem_accepte']==1){$msg='premium';}
   ?>
   <div class="prof">
        <div class="prof-header">
            <img src="./img_profiles/<?php echo $ligne['photo']; ?>" alt="Profile Image" class="profile-img">
        </div>
        <div class="prof-body">
            <p class="full-name"><?php echo $ligne['nom'].' '.$ligne['prenom'] ; ?></p>
            <p class="username"><?php echo $msg;?></p>
        </div>
        <div class="prof-footer">
            <div class="col vr">
                <p><span class="count"><?php echo(makeRating($ligne['fiab_tran']));?></span> Fiabilité en tant que transporteur</p>
            </div>
            <div class="col">
                <p><span class="count"><?php echo(makeRating($ligne['fiab_env']));?></span> Fiabilité en tant qu’envoyeur</p>
            </div>
        </div>
    </div>

</div>

<div id="signaler" style="display: none;">
        <div class="prof">
    <div class="prof-footer">
            <div class="col vr">
                <form method="POST" action="profile.php">
                <input type="text" name="cause" required="required" placeholder="cause du signale" autofocus required></input>
                <input type="submit" name="sign" value="signaler" class="boutton-demonde"></input>
                </form>
                <?php
                if(isset($_POST['sign']))
                {
                    $v =0;
                    $c ='signal';
                    $r=$_SESSION['id_compte'];
                    $causeS=$_POST['cause'];
                    $dt = new DateTime();
                    $dt = $dt->format('Y-m-d H:i:s');
                    $sqll =" INSERT INTO notifications_admin (date_temps,code,id_compte_e,id_compte_s,cause_signale,vu) VALUES('$dt','$c','$r','$id_profil','$causeS',$v)";
                    $query = mysqli_query($conn,$sqll);
                }?>
            </div>
        </div>
    </div>
       
</div>

<div id="profil_complet" style="display: none;"> 

   <?php 

   $sql = "SELECT * from compte where id_compte = '".$id_profil."' limit 1";
   $result = mysqli_query($conn,$sql);
   $ligne = $result->fetch_assoc();
   $prof_prem=$ligne['prem_accepte'];
   if($ligne['prem_accepte']==0){$msg='non premium';}
   if($ligne['prem_accepte']==1){$msg='premium';}
   ?>
   <div class="prof">
        <div class="prof-header">
            <img src="./img_profiles/<?php echo $ligne['photo']; ?>" alt="Profile Image" class="profile-img">
        </div>
        <div class="prof-body">
            <p class="full-name"><?php echo $ligne['nom'].' '.$ligne['prenom'] ; ?></p>
            <p class="username"><?php echo $msg;?></p>
            <p><br/><a class="social-icon mail"><i class="fas fa-envelope-square"></i></a><?php echo $ligne['mail']; ?></p>
            <p><a class="social-icon tel"><i class="fas fa-phone-volume"></i></a><?php echo $ligne['tel']; ?></p>
            <p><a class="social-icon adresse"><i class="fas fa-home"></i></a><?php echo $ligne['adresse']; ?></p>
        </div>
        <div class="prof-footer">
            <div class="col vr">
                <p><span class="count"><?php echo(makeRating($ligne['fiab_tran']));?></span> Fiabilité en tant que transporteur</p>
            </div>
            <div class="col">
                <p><span class="count"><?php echo(makeRating($ligne['fiab_env']));?></span> Fiabilité en tant qu’envoyeur</p>
            </div>
        </div>
    </div>
    
</div>

<div id=premium style="display: none;"> 
<div id="don_prem">    
    <?php 
  
   $sql = "SELECT * from premium where id_compte = '".$id_profil."' limit 1";
   $result = mysqli_query($conn,$sql);
   $ligne = $result->fetch_assoc();
   ?>
   <div class="prof">
   
        <div class="prof-footer">
            <div class="col vr">    
                 <p>La carte d'identite</p>
                 <a href="./cartes_id/<?php echo $ligne['identite']; ?>"target=_blank>
                 <img src="./cartes_id/<?php echo $ligne['identite']; ?>" alt="Profile Image" style=" width: 50px; height: 50px;">   
                  </a>     
            </div>
            <div class="col">
                <p>Le contrat</p>
                <a href="./contrats/<?php echo $ligne['contrat']; ?>" target="_blank">PDF</a>
        
            </div>
        </div>
    </div>
</div>

    <div class="prof">
        <div class="prof-body">
            <p>Demande Premium</p>
        </div>
        <div class="prof-footer">
            <div class="col vr">
               <form method="POST" action="profile.php">
               	<input type="text" name="caus" Style='padding:5px;'></input>
                <input type="submit" name="acc" value="accepter" class="boutton-demonde"></input>
                </form>
                <?php
                if(isset($_POST['acc']))
                {
                    $sql = "UPDATE compte SET prem_accepte=1 WHERE id_compte=$id_profil";
                    $result = mysqli_query($conn,$sql);
                    $v =0;
                    $c =6;
                    $dt = new DateTime();
                    $dt = $dt->format('Y-m-d H:i:s');
                    $sqll ="INSERT INTO notification (date_temps,id_compte_r,code_notif,vu) VALUES('$dt','$id_profil','$c','$v')";
                    $query = mysqli_query($conn,$sqll);
                }?>

            </div>
            <div class="col">
                <form method="POST" action="profile.php">
                <input type="text" name="caus" required="required" placeholder="Veuillez entrer la cause" autofocus required Style='padding:5px;'></input>
                <input type="submit" name="ref" value="refuser" class="boutton-demonde"></input>
                </form>
                <?php
                if(isset($_POST['ref']))
                {
                	$cau=$_POST['caus'];
                    $v =0;
                    $c =7;
                    $dt = new DateTime();
                    $dt = $dt->format('Y-m-d H:i:s');
                    $sql ="INSERT INTO notification (date_temps,id_compte_r,code_notif,vu) VALUES('$dt','$id_profil','$c','$v')";
                    $query = mysqli_query($conn,$sql);
                    $sql = "SELECT * from notification where date_temps = '".$dt."' limit 1";
                    $result = mysqli_query($conn,$sql);
                    $ligne = $result->fetch_assoc();
    	            $id = $ligne['id_notif'];
    	            $sql = "INSERT INTO cause_ref (id_notif,cause) VALUES ('$id','$cau')";
                    $query = mysqli_query($conn,$sql);
                }
                ?>
            </div>
        </div>
    </div>
        
</div>

<div id="supprimer" style="display: none;">
    <div class="prof">
    <div class="prof-footer">
            <div class="col vr">

                <form method="POST" action="#">
                <input type="submit" name="sup" value="supprimer" class="boutton-supprimer"></input>
                </form>
                <?php
                if(isset($_POST['sup'])) 
                {
                    $sql = "UPDATE compte SET supp=1 WHERE id_compte=$id_profil";
                    $result = mysqli_query($conn,$sql); 
                }?>
                 
            </div>
        </div>
    </div>       
</div>

<div id="moi" style="display: none;"> 

    <div class="tabs">
        <ul>
            <li><a href="#" onclick="der_page(1)" id="tab_infos">Mon Profil</a></li>
            <li><a href="#" onclick="der_page(2)" id="tab_annonces">Mes Annonces</a></li>
            <li><a href="#" onclick="der_page(3)" id="tab_demandes">Mes Opérations</a></li>
            <li><a href="#" onclick="der_page(4)" id="tab_historique">Historique</a></li>
            
        </ul>
   
    </div>

    <div id="infos" class="page" style="display: none;">
        <div class="right2">
            <div>
                <?php 
                $id= $_SESSION['id_compte'] ;
                $sql = "SELECT * from compte where id_compte = '".$id."' limit 1";
                $result = mysqli_query($conn,$sql);
                $ligne = $result->fetch_assoc();
                $prof_prem=$ligne['prem_accepte'];
                if($ligne['prem_accepte']==0){$msg='non premium';}
                if($ligne['prem_accepte']==1){$msg='premium';}
                ?>
                <div class="prof">
                  <div class="prof-header">
                     <img src="./img_profiles/<?php echo $ligne['photo']; ?>" alt="Profile Image" class="profile-img">
                  </div>
                <div class="prof-body">
                    <p class="username"><?php echo $msg;?></p>
                 </div>
                  
    			<form id="form_infos" method="post" action="php/modif_utilisateur.php">
    				<div><label>Nom:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="nom" value="<?php echo $_SESSION['nom']?>" disabled="true" id="chnom" required/></div>
    				<div><label>Prénom:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="prenom" value="<?php echo $_SESSION['prenom']?>" disabled="true" id="chpre" required/></div>
    				<div><label>E-mail:</label>&nbsp;&nbsp;&nbsp;<input type="email" name="email" value="<?php echo $_SESSION['email']?>" disabled="true" id="chmail" required/></div>
                    <div><label>Adresse:</label>&nbsp;&nbsp;&nbsp;<input type="adresse" name="adresse" value="<?php echo $ligne['adresse']?>" disabled="true" id="chadresse" required/></div>
                    <div><label>Telephone:</label>&nbsp;&nbsp;&nbsp;<input type="tel" name="tel" value="<?php echo $ligne['tel']?>" disabled="true" id="chtel" required/></div>
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
            </div>
				<a href="#" id="modif" style="float: right; " class="boutton">Modifier</a>
                
                <div id="donn_prem">
                
            </div>

            <div class="prof">
            <div class="prof-footer">
            <div class="col vr">
                <p><span class="count"><?php echo(makeRating($ligne['fiab_tran']));?></span> Fiabilité en tant que transporteur</p>
            </div>
            <div class="col">
                <p><span class="count"><?php echo(makeRating($ligne['fiab_env']));?></span> Fiabilité en tant qu’envoyeur</p>
            </div>
            </div>
            </div>

            
            </div>
        </div>

        
    </div>


<div id="annonces" class="page" style="display: none;">    
<div class="list" style="margin-bottom: 50px;">   
<?php 
    $result_c = mysqli_query($conn, "SELECT * FROM colis WHERE id_compte_e=".$id_profil." AND etat='annonce' AND supp=0 ORDER BY date_annonce DESC");
    $result_t = mysqli_query($conn, "SELECT * FROM trajet WHERE id_compte=".$id_profil." AND etat='annonce' AND supp=0 ORDER BY date_annonce DESC");
    if (mysqli_num_rows($result_c)==0) {
        echo '<p style="text-align:center;"><i>vous n\'avez aucune annonce de colis</i></p>';
        $ligne_c=NULL;
    } else $ligne_c=mysqli_fetch_array($result_c);
    if (mysqli_num_rows($result_t)==0) {
        echo '<p style="text-align:center;"><i>vous n\'avez aucune annonce de trajet</i></p>';
        $ligne_t=NULL;
    } else $ligne_t=mysqli_fetch_array($result_t);
    while (($ligne_c)||($ligne_t)) {
        if ($ligne_c['date_annonce']>$ligne_t['date_annonce']) {      
            $result = mysqli_query($conn, "SELECT * FROM trajet WHERE id_trajet=".$ligne_c['id_trajet']." limit 1");
            if (!$result) die('Could not query');
            else {
                $ligne=mysqli_fetch_array($result);
                echo '<div class="annonce">
                        <div class="titrec">Annonce Colis</div>
                            <p class="ann_nom"><b>'.$ligne_c['nom'].'</b></p>
                            <p class="datep">Déposée le: '.$ligne_c['date_annonce'].'</p>
                            <a class="but" href="#" onclick="supp(1,'.$ligne_c['id_colis'].')" style="float:right;margin:10px; " title="Supprimer"><img src="images/del.png" width="20px;"></a>
                            <a class="but" href="modif_colis.php?id='.$ligne_c['id_colis'].'" style="float:right;margin-top:10px;" title="Modifier"><img src="images/edit.png" width="20px;"></a><br>
                            <img src="images/colis.png" class="img_colis">
                            <label class="lab">Date d\'envoi:</label><p class="contenu">'.$ligne_c['date_envoi'].'</p><br>
                            <label class="lab">Date de dépôt:</label><p class="contenu">'.$ligne_c['date_depot'].'</p><br>
                            <label class="lab">Wilaya de départ:</label><p class="contenu">'.$ligne['lieux_depart'].'</p>
                            <label class="lab">Adresse de départ:</label><p class="contenu">'.$ligne_c['adr_depart'].'</p><br>
                            <label class="lab">Wilaya d\'arrivée:</label><p class="contenu">'.$ligne['lieux_arrive'].'</p>
                            <label class="lab">Adresse d\'arrivée:</label><p class="contenu">'.$ligne_c['adr_arrive'].'</p><br>
                            <label class="lab">Taille:</label><p class="contenu">'.$ligne_c['taille'].'</p><br>
                            <label class="lab">Poids:</label><p class="contenu">'.$ligne_c['poids'].'</p><br>';        
                if ($ligne_c['demande_spec']) echo '<label class="lab">Demande speciale:</label><p class="contenu">'.$ligne_c['demande_spec'].'</p><br>';
                echo '<label class="lab2">Prix: '.$ligne_c['tarif'].' DA</label><br><br></div>';
            }
            $ligne_c=mysqli_fetch_array($result_c);       
        } else {
            
            echo '<div class="annonce">
                    <div class="titret">Annonce Trajet</div>
                        <p class="ann_nom">De <b>'.$ligne_t['lieux_depart'].'</b> vers <b>'.$ligne_t['lieux_arrive'].'</b></p>
                        <p class="datep">Déposée le: '.$ligne_t['date_annonce'].'</p>
                        <a class="but" href="#" onclick="supp(2,'.$ligne_t['id_trajet'].')" style="float:right;margin:10px; " title="Supprimer"><img src="images/del.png" width="20px;"></a>
                        <a class="but" href="modif_trajet.php?id='.$ligne_t['id_trajet'].'" style="float:right;margin-top:10px;" title="Modifier"><img src="images/edit.png" width="20px;"></a><br>';
            $result = mysqli_query($conn, "SELECT * FROM trajets_non_reguliers WHERE id_trajet=".$ligne_t['id_trajet']." limit 1");
            if (mysqli_num_rows($result)!=0) {
                $ligne=mysqli_fetch_array($result);
                echo '<p class="ann_nom"><b>Trajet non régulier</b></p><br>
                        <label class="tlab">Date de départ:</label><p class="contenu">'.$ligne['date_depart'].'</p>';
                if ($ligne['date_retour']!="0000-00-00") echo '<label class="tlab">Date de retour:</label><p class="contenu">'.$ligne['date_retour'].'</p>';
            } else {
                $result = mysqli_query($conn, "SELECT * FROM trajets_reguliers WHERE id_trajet=".$ligne_t['id_trajet']." limit 1");
                $ligne=mysqli_fetch_array($result);
                echo '<p class="ann_nom"><b>Trajet régulier</b></p><br>
                        <label class="tlab">Frequence:</label><p class="contenu">'.$ligne['frequence'].'</p>
                        <label class="tlab">Jour:</label><p class="contenu">'.$ligne['jour'].'</p>';
            }
            echo '<label class="tlab">Moyen de transport:</label><p class="contenu">'.$ligne_t['moyen'].'</p>
            <label class="tlab">Détour max:</label><p class="contenu">'.$ligne_t['detour_max'].'</p>';
            
            $arrets= mysqli_query($conn, "SELECT * FROM arrets WHERE id_trajet=".$ligne_t['id_trajet']);     
            if (mysqli_num_rows($arrets)) {
                echo '<label class="tlab">Arrêts:</label>';
                while ($arret=mysqli_fetch_array($arrets))
                    echo '<p class="contenu">'.$arret['arret'].';</p>';
            }
            echo '<label class="tlab">Taille Max:</label><p class="contenu">'.$ligne_t['taille_max'].'</p>
                    <label class="tlab">Poids Max:</label><p class="contenu">'.$ligne_t['poids_max'].'</p><br><br></div>';
            $ligne_t=mysqli_fetch_array($result_t);
        }
    }
?>
</div>   
</div>


<div id="demandes" class="page" style="display: none;">
<div class="list" style="margin-bottom: 50px;">
<?php 
    $result_c = mysqli_query($conn, "SELECT * FROM colis WHERE id_compte_e=".$id_profil." AND (etat='en route' OR etat='accepte') AND supp=0 ORDER BY date_annonce DESC");
    $result_t = mysqli_query($conn, "SELECT * FROM trajet WHERE id_compte=".$id_profil." AND (etat='en route' OR etat='accepte') AND supp=0 ORDER BY date_annonce DESC");
    if (mysqli_num_rows($result_c)==0) {
        echo '<p style="text-align:center;"><i>vous n\'avez aucune opération de colis</i></p>';
        $ligne_c=NULL;
    } else $ligne_c=mysqli_fetch_array($result_c);
    if (mysqli_num_rows($result_t)==0) {
        echo '<p style="text-align:center;"><i>vous n\'avez aucune opération de trajet</i></p>';
        $ligne_t=NULL;
    } else $ligne_t=mysqli_fetch_array($result_t);
    while (($ligne_c)||($ligne_t)) {
        if ($ligne_c['date_annonce']>$ligne_t['date_annonce']) {      
            $result = mysqli_query($conn, "SELECT * FROM trajet WHERE id_trajet=".$ligne_c['id_trajet']." limit 1");
            
                $ligne=mysqli_fetch_array($result);
                echo '<div class="annonce">
                        <div class="titrec">Suivre Mon Colis</div>
                            <p class="ann_nom"><b>'.$ligne_c['nom'].'</b></p>
                            <p class="datep">Déposée le: '.$ligne_c['date_annonce'].'</p>
                            <label class="lab2" style="margin-top:10px;margin-right:10px;">Etat: '.$ligne_c['etat'].'</label><br>
                            <img src="images/colis.png" class="img_colis">
                            <label class="lab">Date d\'envoi:</label><p class="contenu">'.$ligne_c['date_envoi'].'</p><br>
                            <label class="lab">Date de dépôt:</label><p class="contenu">'.$ligne_c['date_depot'].'</p><br>
                            <label class="lab">Adresse de départ:</label><p class="contenu">'.$ligne_c['adr_depart'].'</p><br>
                            <label class="lab">Adresse d\'arrivée:</label><p class="contenu">'.$ligne_c['adr_arrive'].'</p><br>
                            <label class="lab">Taille:</label><p class="contenu">'.$ligne_c['taille'].'</p><br>
                            <label class="lab">Poids:</label><p class="contenu">'.$ligne_c['poids'].'</p><br>';        
                if ($ligne_c['demande_spec']) echo '<label class="lab">Demande speciale:</label><p class="contenu">'.$ligne_c['demande_spec'].'</p><br>';
                echo '<label class="lab2">Prix: '.$ligne_c['tarif'].' DA</label><br><br>
                    <div class="titret">Son Trajet</div>
                        <p class="ann_nom">De <b>'.$ligne['lieux_depart'].'</b> vers <b>'.$ligne['lieux_arrive'].'</b></p>';
                if ($ligne_c['etat']==="accepte") echo '<a href="#" onclick="ann(2,'.$ligne_c['id_colis'].','.$ligne_c['id_trajet'].')" class="annul">Annuler ce trajet</a>'; 
                echo '<br>';
                $result3 = mysqli_query($conn, "SELECT * FROM compte WHERE id_compte=".$ligne['id_compte']." limit 1");
                $ligne3=mysqli_fetch_array($result3);
                $result2 = mysqli_query($conn, "SELECT * FROM trajets_non_reguliers WHERE id_trajet=".$ligne['id_trajet']." limit 1");
                if (mysqli_num_rows($result2)!=0) {
                    $ligne2=mysqli_fetch_array($result2);
                    echo '<p class="ann_nom"><b>Trajet non régulier</b></p>
                        <label class="lab">Par:</label><a class="profi" href="profile.php?id='.$ligne3['id_compte'].'&from=user">&nbsp;'.$ligne3['prenom'].' '.$ligne3['nom'].'</a><br>
                        <label class="tlab">Date de départ:</label><p class="contenu">'.$ligne2['date_depart'].'</p>';
                if ($ligne2['date_retour']!="0000-00-00") echo '<label class="tlab">Date de retour:</label><p class="contenu">'.$ligne2['date_retour'].'</p>';
                } else {
                $result2 = mysqli_query($conn, "SELECT * FROM trajets_reguliers WHERE id_trajet=".$ligne['id_trajet']." limit 1");
                $ligne2=mysqli_fetch_array($result2);
                echo '<p class="ann_nom"><b>Trajet régulier</b></p>
                        <label class="lab">Par:</label><a class="profi" href="profile.php?id='.$ligne3['id_compte'].'&from=user">&nbsp;'.$ligne3['prenom'].' '.$ligne3['nom'].'</a><br>
                        <label class="tlab">Frequence:</label><p class="contenu">'.$ligne2['frequence'].'</p>
                        <label class="tlab">Jour:</label><p class="contenu">'.$ligne2['jour'].'</p>';
                }
            
            echo '<label class="tlab">Moyen de transport:</label><p class="contenu">'.$ligne['moyen'].'</p>
            <label class="tlab">Détour max:</label><p class="contenu">'.$ligne['detour_max'].'</p>';

                $arrets= mysqli_query($conn, "SELECT * FROM arrets WHERE id_trajet=".$ligne['id_trajet']);
                if (mysqli_num_rows($arrets)) {
                    echo '<label class="tlab">Arrêts:</label>';
                    while ($arret=mysqli_fetch_array($arrets))
                        echo '<p class="contenu">'.$arret['arret'].';</p>';
                }
                        echo '<label class="tlab">Taille Max:</label><p class="contenu">'.$ligne['taille_max'].'</p>
                        <label class="tlab">Poids Max:</label><p class="contenu">'.$ligne['poids_max'].'</p><br><br></div>';
            
            
            $ligne_c=mysqli_fetch_array($result_c);       
        } else {
            
            echo '<div class="annonce">
                    <div class="titret">Suivre Mon Trajet</div>
                        <p class="ann_nom">De <b>'.$ligne_t['lieux_depart'].'</b> vers <b>'.$ligne_t['lieux_arrive'].'</b></p>
                        <p class="datep">Déposée le: '.$ligne_t['date_annonce'].'</p>
                        <label class="lab2" style="margin-top:10px;margin-right:10px;">Etat: '.$ligne_t['etat'].'</label><br>';
            $result = mysqli_query($conn, "SELECT * FROM trajets_non_reguliers WHERE id_trajet=".$ligne_t['id_trajet']." limit 1");
            if (mysqli_num_rows($result)!=0) {
                $ligne=mysqli_fetch_array($result);
                echo '<p class="ann_nom"><b>Trajet non régulier</b></p><br>
                        <label class="tlab">Date de départ:</label><p class="contenu">'.$ligne['date_depart'].'</p>';
                if ($ligne['date_retour']!="0000-00-00") echo '<label class="tlab">Date de retour:</label><p class="contenu">'.$ligne['date_retour'].'</p>';
            } else {
                $result = mysqli_query($conn, "SELECT * FROM trajets_reguliers WHERE id_trajet=".$ligne_t['id_trajet']." limit 1");
                $ligne=mysqli_fetch_array($result);
                echo '<p class="ann_nom"><b>Trajet régulier</b></p><br>
                        <label class="tlab">Frequence:</label><p class="contenu">'.$ligne['frequence'].'</p>
                        <label class="tlab">Jour:</label><p class="contenu">'.$ligne['jour'].'</p>';
            }
            echo '<label class="tlab">Moyen de transport:</label><p class="contenu">'.$ligne_t['moyen'].'</p>
            <label class="tlab">Détour max:</label><p class="contenu">'.$ligne_t['detour_max'].'</p>';

            $arrets= mysqli_query($conn, "SELECT * FROM arrets WHERE id_trajet=".$ligne['id_trajet']);
            if (mysqli_num_rows($arrets)) {
                echo '<label class="tlab">Arrêts:</label>';
                while ($arret=mysqli_fetch_array($arrets))
                    echo '<p class="contenu">'.$arret['arret'].';</p>';
            }
            echo '<label class="tlab">Taille Max:</label><p class="contenu">'.$ligne_t['taille_max'].'</p>
                    <label class="tlab">Poids Max:</label><p class="contenu">'.$ligne_t['poids_max'].'</p><br>';
            
            echo '<label class="tlab" style="float:right;">Modifier l\'état de votre trajet vers:';
            if ($ligne_t['etat']==="accepte") echo '<a href="php/modif_etat.php?id='.$ligne_t['id_trajet'].'&vers=1" class="ett">En route</a>'; 
            if ($ligne_t['etat']==="en route") echo '<a href="php/modif_etat.php?id='.$ligne_t['id_trajet'].'&vers=2" class="ett">Arrivé</a>
            <a href="php/modif_etat.php?id='.$ligne_t['id_trajet'].'&vers=3" class="ett ech">Echec</a>';
            echo '</label><br><br>';
            $result=mysqli_query($conn, "SELECT * FROM colis WHERE id_trajet=".$ligne_t['id_trajet']);
            while ($ligne=mysqli_fetch_array($result)) {
                $result3 = mysqli_query($conn, "SELECT * FROM compte WHERE id_compte=".$ligne['id_compte_e']." limit 1");
                $ligne3=mysqli_fetch_array($result3);
                echo '<div class="titrec">Colis A Transporter</div>
                            <p class="ann_nom"><b>'.$ligne['nom'].'</b></p>
                            <label class="lab">Par:</label><a class="profi" href="profile.php?id='.$ligne3['id_compte'].'&from=user">&nbsp;'.$ligne3['prenom'].' '.$ligne3['nom'].'</a>';
                if ($ligne['etat']==="accepte") echo '<a href="#" onclick="ann(1,'.$ligne['id_colis'].','.$ligne['id_trajet'].')" class="annul">Annuler ce colis</a>'; 
                echo '<br>';
                echo '<img src="images/colis.png" class="img_colis">
                            <label class="lab">Date d\'envoi:</label><p class="contenu">'.$ligne['date_envoi'].'</p><br>
                            <label class="lab">Date de dépôt:</label><p class="contenu">'.$ligne['date_depot'].'</p><br>
                            <label class="lab">Adresse de départ:</label><p class="contenu">'.$ligne['adr_depart'].'</p><br>
                            <label class="lab">Adresse d\'arrivée:</label><p class="contenu">'.$ligne['adr_arrive'].'</p><br>
                            <label class="lab">Taille:</label><p class="contenu">'.$ligne['taille'].'</p><br>
                            <label class="lab">Poids:</label><p class="contenu">'.$ligne['poids'].'</p><br>';        
                if ($ligne['demande_spec']) echo '<label class="lab">Demande speciale:</label><p class="contenu">'.$ligne['demande_spec'].'</p><br>';
                echo '<label class="lab2">Prix: '.$ligne['tarif'].' DA</label><br><br>';
            }
            echo '</div>';
            $ligne_t=mysqli_fetch_array($result_t);
        }
    }
?>
</div>
</div>

    <div id="historique" class="page" style="display: none;">
        <div class="list" style="margin-bottom: 50px;">
<?php 
    $result_c = mysqli_query($conn, "SELECT * FROM colis WHERE id_compte_e=".$id_profil." AND (etat='arrive' OR etat='echec') AND supp=0 ORDER BY date_annonce DESC");
    $result_t = mysqli_query($conn, "SELECT * FROM trajet WHERE id_compte=".$id_profil." AND (etat='arrive' OR etat='echec') AND supp=0 ORDER BY date_annonce DESC");
    if (mysqli_num_rows($result_c)==0) {
        echo '<p style="text-align:center;"><i>vous n\'avez aucune historique de colis</i></p>';
        $ligne_c=NULL;
    } else $ligne_c=mysqli_fetch_array($result_c);
    if (mysqli_num_rows($result_t)==0) {
        echo '<p style="text-align:center;"><i>vous n\'avez aucune historique de trajets</i></p>';
        $ligne_t=NULL;
    } else $ligne_t=mysqli_fetch_array($result_t);
    while (($ligne_c)||($ligne_t)) {
        if ($ligne_c['date_annonce']>$ligne_t['date_annonce']) {      
            $result = mysqli_query($conn, "SELECT * FROM trajet WHERE id_trajet=".$ligne_c['id_trajet']." limit 1");
            
                $ligne=mysqli_fetch_array($result);
                echo '<div class="annonce">
                        <div class="titreg">Suivre Mon Colis</div>
                            <p class="ann_nom"><b>'.$ligne_c['nom'].'</b></p>
                            <p class="datep">Déposée le: '.$ligne_c['date_annonce'].'</p>
                            <label class="lab2" style="margin-top:10px;">Etat: '.$ligne_c['etat'].'</label><br>
                            <img src="images/colis.png" class="img_colis">
                            <label class="lab">Date d\'envoi:</label><p class="contenu">'.$ligne_c['date_envoi'].'</p><br>
                            <label class="lab">Date de dépôt:</label><p class="contenu">'.$ligne_c['date_depot'].'</p><br>
                            <label class="lab">Adresse de départ:</label><p class="contenu">'.$ligne_c['adr_depart'].'</p><br>
                            <label class="lab">Adresse d\'arrivée:</label><p class="contenu">'.$ligne_c['adr_arrive'].'</p><br>
                            <label class="lab">Taille:</label><p class="contenu">'.$ligne_c['taille'].'</p><br>
                            <label class="lab">Poids:</label><p class="contenu">'.$ligne_c['poids'].'</p><br>';        
                if ($ligne_c['demande_spec']) echo '<label class="lab">Demande speciale:</label><p class="contenu">'.$ligne_c['demande_spec'].'</p><br>';
                echo '<label class="lab2">Prix: '.$ligne_c['tarif'].' DA</label><br><br>
                    <div class="titreg">Son Trajet</div>
                        <p class="ann_nom">De <b>'.$ligne['lieux_depart'].'</b> vers <b>'.$ligne['lieux_arrive'].'</b></p><br>';
                $result3 = mysqli_query($conn, "SELECT * FROM compte WHERE id_compte=".$ligne['id_compte']." limit 1");
                $ligne3=mysqli_fetch_array($result3);
            $result2 = mysqli_query($conn, "SELECT * FROM trajets_non_reguliers WHERE id_trajet=".$ligne['id_trajet']." limit 1");
            if (mysqli_num_rows($result2)!=0) {
                $ligne2=mysqli_fetch_array($result2);
                echo '<p class="ann_nom"><b>Trajet non régulier</b></p>
                        <label class="lab">Par:</label><a class="profi" href="profile.php?id='.$ligne3['id_compte'].'&from=user">&nbsp;'.$ligne3['prenom'].' '.$ligne3['nom'].'</a><br>
                        <label class="tlab">Date de départ:</label><p class="contenu">'.$ligne2['date_depart'].'</p>';
                if ($ligne2['date_retour']!="0000-00-00") echo '<label class="tlab">Date de retour:</label><p class="contenu">'.$ligne2['date_retour'].'</p>';
            } else {
                $result2 = mysqli_query($conn, "SELECT * FROM trajets_reguliers WHERE id_trajet=".$ligne['id_trajet']." limit 1");
                $ligne2=mysqli_fetch_array($result2);
                echo '<p class="ann_nom"><b>Trajet régulier</b></p>
                        <label class="lab">Par:</label><a class="profi" href="profile.php?id='.$ligne3['id_compte'].'&from=user">&nbsp;'.$ligne3['prenom'].' '.$ligne3['nom'].'</a><br>
                        <label class="tlab">Frequence:</label><p class="contenu">'.$ligne2['frequence'].'</p>
                        <label class="tlab">Jour:</label><p class="contenu">'.$ligne2['jour'].'</p>';
            }
            echo '<label class="tlab">Moyen de transport:</label><p class="contenu">'.$ligne['moyen'].'</p>
            <label class="tlab">Détour max:</label><p class="contenu">'.$ligne['detour_max'].'</p>';

                $arrets= mysqli_query($conn, "SELECT * FROM arrets WHERE id_trajet=".$ligne['id_trajet']);
                if (mysqli_num_rows($arrets)) {
                    echo '<label class="tlab">Arrêts:</label>';
                    while ($arret=mysqli_fetch_array($arrets))
                        echo '<p class="contenu">'.$arret['arret'].';</p>';
                }
                        echo '<label class="tlab">Taille Max:</label><p class="contenu">'.$ligne['taille_max'].'</p>
                        <label class="tlab">Poids Max:</label><p class="contenu">'.$ligne['poids_max'].'</p><br><br></div>';

            $ligne_c=mysqli_fetch_array($result_c);       
        } else {
            echo '<div class="annonce">
                    <div class="titreg">Suivre Mon Trajet</div>
                        <p class="ann_nom">De <b>'.$ligne_t['lieux_depart'].'</b> vers <b>'.$ligne_t['lieux_arrive'].'</b></p>
                        <p class="datep">Déposée le: '.$ligne_t['date_annonce'].'</p>
                        <label class="lab2" style="margin-top:10px;">Etat: '.$ligne_t['etat'].'</label><br>';
            $result = mysqli_query($conn, "SELECT * FROM trajets_non_reguliers WHERE id_trajet=".$ligne_t['id_trajet']." limit 1");
            if (mysqli_num_rows($result)!=0) {
                $ligne=mysqli_fetch_array($result);
                echo '<p class="ann_nom"><b>Trajet non régulier</b></p><br>
                        <label class="tlab">Date de départ:</label><p class="contenu">'.$ligne['date_depart'].'</p>';
                if ($ligne['date_retour']!="0000-00-00") echo '<label class="tlab">Date de retour:</label><p class="contenu">'.$ligne['date_retour'].'</p>';
            } else {
                $result = mysqli_query($conn, "SELECT * FROM trajets_reguliers WHERE id_trajet=".$ligne_t['id_trajet']." limit 1");
                $ligne=mysqli_fetch_array($result);
                echo '<p class="ann_nom"><b>Trajet régulier</b></p><br>
                        <label class="tlab">Frequence:</label><p class="contenu">'.$ligne['frequence'].'</p>
                        <label class="tlab">Jour:</label><p class="contenu">'.$ligne['jour'].'</p>';
            }
            echo '<label class="tlab">Moyen de transport:</label><p class="contenu">'.$ligne_t['moyen'].'</p>
            <label class="tlab">Détour max:</label><p class="contenu">'.$ligne_t['detour_max'].'</p>';

            $arrets= mysqli_query($conn, "SELECT * FROM arrets WHERE id_trajet=".$ligne['id_trajet']);   
            if (mysqli_num_rows($arrets)) {
                echo '<label class="tlab">Arrêts:</label>';
                while ($arret=mysqli_fetch_array($arrets))
                    echo '<p class="contenu">'.$arret['arret'].';</p>';
            }
            echo '<label class="tlab">Taille Max:</label><p class="contenu">'.$ligne_t['taille_max'].'</p>
                    <label class="tlab">Poids Max:</label><p class="contenu">'.$ligne_t['poids_max'].'</p><br>';
            $result=mysqli_query($conn, "SELECT * FROM colis WHERE id_trajet=".$ligne_t['id_trajet']);
            while ($ligne=mysqli_fetch_array($result)) {
                $result3 = mysqli_query($conn, "SELECT * FROM compte WHERE id_compte=".$ligne['id_compte_e']." limit 1");
                $ligne3=mysqli_fetch_array($result3);
                echo '<div class="titreg">Colis A Transporter</div>
                            <p class="ann_nom"><b>'.$ligne['nom'].'</b></p>
                            <label class="lab">Par:</label><a class="profi" href="profile.php?id='.$ligne3['id_compte'].'&from=user">&nbsp;'.$ligne3['prenom'].' '.$ligne3['nom'].'</a><br>
                            <img src="images/colis.png" class="img_colis">
                            <label class="lab">Date d\'envoi:</label><p class="contenu">'.$ligne['date_envoi'].'</p><br>
                            <label class="lab">Date de dépôt:</label><p class="contenu">'.$ligne['date_depot'].'</p><br>
                            <label class="lab">Adresse de départ:</label><p class="contenu">'.$ligne['adr_depart'].'</p><br>
                            <label class="lab">Adresse d\'arrivée:</label><p class="contenu">'.$ligne['adr_arrive'].'</p><br>
                            <label class="lab">Taille:</label><p class="contenu">'.$ligne['taille'].'</p><br>
                            <label class="lab">Poids:</label><p class="contenu">'.$ligne['poids'].'</p><br>';        
                if ($ligne['demande_spec']) echo '<label class="lab">Demande speciale:</label><p class="contenu">'.$ligne['demande_spec'].'</p><br>';
                echo '<label class="lab2">Prix: '.$ligne['tarif'].' DA</label><br><br>';
            }
            echo '</div>';
            $ligne_t=mysqli_fetch_array($result_t);
        }
    }
?>
    </div>

    
</div>
</div>

</div>


<div id="supp_ann" style="display: none; z-index: 3;">
        <div style="position: fixed; height:100%; width: 100%; background: #000; opacity: 0.7;" ></div>
        <div style="width: 400px; height: 190px; background-color: #fff; border-radius: 20px; position: fixed; top:50%;left:50%; transform: translate(-50%,-50%);">
            <br><h2 class="s1" style="font-size: 18px;">Voulez-vous vraiment supprimer cette annonce?</h2><br>
            <a href="#" class="boutton" id="conf_supp" style="float: left; margin-left: 40px; color: #fff;">Oui</a>
            <a href="#" class="boutton" id="annul_supp" style="margin-right: 40px; color: #fff;">Non</a>
    </div>

</div>

<div id="annul_ann" style="display: none; z-index: 3;">
        <div style="position: fixed; height: 100%; width: 100%; background: #000; opacity: 0.7;"></div>
        <div style="width: 400px; height: 190px; background-color: #fff; border-radius: 20px; position: fixed; top:50%;left:50%; transform: translate(-50%,-50%);">
            <br><h2 class="s1" style="font-size: 18px; ">Voulez-vous vraiment annuler <br>votre association avec ce <span style="font-size: 18px;" id="ct"></span>?</h2><br>
            <a href="#" class="boutton" id="conf_ann" style="float: left; margin-left: 40px;">Oui</a>
            <a href="#" class="boutton" id="annul_n" style="margin-right: 40px;">Non</a>
    </div>

</div>


<?php 
    if (isset($_GET['noter'])) {
        if ($_GET['noter']==='1') {
            if (isset($_GET['id_noter'])) {
                $idn=$_GET['id_noter'];
                if ($lignen=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM trajet WHERE id_trajet=".$idn))) {
                    if ($lignen['id_compte']==$_SESSION['id_compte']) {
                        $res=mysqli_query($conn,"SELECT * FROM colis WHERE id_trajet=".$idn);
                        echo '<div id="black" style="position: fixed; height:100%; width: 100%; background: #000; opacity: 0.7; z-index:1;"></div>';
                        while ($lignec=mysqli_fetch_array($res)) {
                            $ligneu=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM compte WHERE id_compte=".$lignec['id_compte_e']));
                            $final=$ligneu['id_compte'];
                            echo '<div id="n'.$ligneu['id_compte'].'" style="width: 400px; height: 250px; background-color: #fff; border-radius: 20px; position: fixed; top:50%;left:50%; transform: translate(-50%,-50%); z-index:3;">
                                    <br><h2 class="s1" style="font-size: 18px;">Prenez un moment pour noter<br><div style="padding-bottom:10px;"></div>'.$ligneu['prenom'].' '.$ligneu['nom'].'</h2>
                                        <div style="float:left; margin-left:75px; margin-top:10px;">
                                            <a href="#" class="star" onmouseover="star(5,'.$ligneu['id_compte'].')" onmouseout="nostar(5,'.$ligneu['id_compte'].')" onclick="fix(5,'.$ligneu['id_compte'].')" id="star'.$ligneu['id_compte'].'5"><img src="images/star.png"></a>
                                            <a href="#" class="star" onmouseover="star(4,'.$ligneu['id_compte'].')" onmouseout="nostar(4,'.$ligneu['id_compte'].')" onclick="fix(4,'.$ligneu['id_compte'].')" id="star'.$ligneu['id_compte'].'4"><img src="images/star.png"></a>
                                            <a href="#" class="star" onmouseover="star(3,'.$ligneu['id_compte'].')" onmouseout="nostar(3,'.$ligneu['id_compte'].')" onclick="fix(3,'.$ligneu['id_compte'].')" id="star'.$ligneu['id_compte'].'3"><img src="images/star.png"></a>
                                            <a href="#" class="star" onmouseover="star(2,'.$ligneu['id_compte'].')" onmouseout="nostar(2,'.$ligneu['id_compte'].')" onclick="fix(2,'.$ligneu['id_compte'].')" id="star'.$ligneu['id_compte'].'2"><img src="images/star.png"></a>
                                            <a href="#" class="star" onmouseover="star(1,'.$ligneu['id_compte'].')" onmouseout="nostar(1,'.$ligneu['id_compte'].')" onclick="fix(1,'.$ligneu['id_compte'].')" id="star'.$ligneu['id_compte'].'1"><img src="images/star.png"></a>
                                        </div><br><br><br><br>
                                        <a href="#" onclick="nn('.$ligneu['id_compte'].')" style="color:#187cc2; margin-left:70px;">Non, je ne veux pas noter cette personne.</a>
                                </div>';
                        }
                    }
                }
            }
        }
    }
?>




<script type="text/javascript">
    function fix(i,k) {
            for (var j=1;j<=i;j++) {
                document.getElementById("star".concat(String(k),String(j))).style.filter="grayscale(0%)";
            }
            for (j=1;j<=5;j++) {
                document.getElementById("star".concat(String(k),String(j))).setAttribute("onmouseover","");
                document.getElementById("star".concat(String(k),String(j))).setAttribute("onmouseout","");
                document.getElementById("star".concat(String(k),String(j))).setAttribute("onclick","");
            }
            $.post("php/noter.php", {note:i, id:k});
            setTimeout(function(){
                $("#n".concat(String(k))).fadeOut();
            },1000);

            setTimeout(function(){
                if (!$("#n".concat("<?php echo $final ?>")).is(":visible")) window.location="profile.php";
            },1000);
            
        }
    

        function star(i,k) {
            for (var j=1;j<=i;j++) {
                document.getElementById("star".concat(String(k),String(j))).style.filter="grayscale(0%)";
            }
        }

        function nostar(i,k) {
            for (var j=i;j>=1;j--) {
                document.getElementById("star".concat(String(k),String(j))).style.filter="grayscale(100%)";
            }
        }

       
        function nn(i) {
            $("#n".concat(String(i))).fadeOut();
            if (!$("#n".concat("<?php echo $final ?>")).is(":visible")) window.location="profile.php";
        }
                    

    </script>

<script type="text/javascript">
    function supp(type, i) {
        document.getElementById("conf_supp").href="php/supp_ann.php?id=".concat(String(i),"&type=",String(type));
        $("#supp_ann").fadeIn();
           
    }

    $("#annul_supp").click(function(){
        $("#supp_ann").fadeOut();
    });
        
    
    
    

    function ann(cas, ic, it) {
        if (cas===1) {document.getElementById("ct").innerHTML="colis";} else { document.getElementById("ct").innerHTML="trajet";}
        document.getElementById("conf_ann").href="php/annuler.php?cas=".concat(String(cas),"&id_colis=",String(ic),"&id_trajet=",String(it));
        $("#annul_ann").fadeIn();
           
    }

    $("#annul_n").click(function(event){
        $("#annul_ann").fadeOut();
    });

   

</script>


<script type="text/javascript">
	$(document).ready(function(){	
			$("#modif").click(function(event){
				event.preventDefault();
				document.getElementById("chnom").disabled=false;
				document.getElementById("chpre").disabled=false;
				document.getElementById("chmail").disabled=false;
                document.getElementById("chadresse").disabled=false;
                document.getElementById("chtel").disabled=false;
				document.getElementById("chpas").disabled=false;
				$("#pass_rep").fadeIn();
				$("#modif").remove();
				$("#conf").fadeIn();
			})
			});
</script>
    



<script type="text/javascript"> 
        var nom="<?php echo $_SESSION['nom'] ?>";
        if (nom!=""){
            $("#conn").remove();
            $(".cx").addClass("apr_cx");
            $(".cx").removeClass("cx");
            document.getElementById("inc").innerHTML="<img src=\"images/profile.png\" width=\"50px\" style=\"border-radius:50%;margin-left:20px;margin-right:20px;\">";
            document.getElementById("inc").style.padding=0;
            document.getElementById("inc").style.background="#fff";
            $("#inc").attr({
                "id" : "prof",
                "href" : "profile.php"
            });
            document.getElementById("conx").innerHTML="<li class='dropdown'> <img src='images/notifs.png' class='dropdown-toggle' data-toggle ='dropdown' width='50px' style='border-radius:50%;'><ul class='dropdown-menu notification-ul' ><li id='nonotif' class='notification-li'></li></ul></li>";
            document.getElementById("conx").style.padding=0;
            document.getElementById("conx").style.background="#fff";

            $("#conx").attr({
                "id" : "notif",
                "href" : "#"
            });
            $("#nottiff").fadeIn();
            $("#dcx").fadeIn();
        }
    </script>
<script type="text/javascript">
    $(document).ready(function page(){
        var der="<?php echo $_SESSION['der_page_'] ?>";
        var css=".tabs ul li a{background:#187cc2;} .tabs ul li a:hover{background:#323232;}";
            if (der==1) {
                document.getElementById("annonces").style.display="none";
                document.getElementById("demandes").style.display="none";
                document.getElementById("historique").style.display="none";
                $("#infos").fadeIn();
                document.getElementById("tab_infos").style.background="#323232";
                document.getElementById("tab_annonces").style=css;
                document.getElementById("tab_demandes").style=css;
                document.getElementById("tab_historique").style=css;
            }
            if (der==2) {
                document.getElementById("infos").style.display="none";
                document.getElementById("demandes").style.display="none";
                document.getElementById("historique").style.display="none";
                $("#annonces").fadeIn();
                document.getElementById("tab_annonces").style.background="#323232";
                document.getElementById("tab_infos").style=css;
                document.getElementById("tab_demandes").style=css;
                document.getElementById("tab_historique").style=css;
            }
            if (der==3) {
                document.getElementById("infos").style.display="none";
                document.getElementById("historique").style.display="none";
                document.getElementById("annonces").style.display="none";
                $("#demandes").fadeIn();
                document.getElementById("tab_demandes").style.background="#323232";
                document.getElementById("tab_annonces").style=css;
                document.getElementById("tab_historique").style=css;
                document.getElementById("tab_infos").style=css;
            }
            if (der==4) {
                document.getElementById("infos").style.display="none";
                document.getElementById("annonces").style.display="none";
                document.getElementById("demandes").style.display="none";
                $("#historique").fadeIn();
                document.getElementById("tab_historique").style.background="#323232";
                document.getElementById("tab_annonces").style=css;
                document.getElementById("tab_infos").style=css;
                document.getElementById("tab_demandes").style=css;
            }
        });
        </script>
       
<script type="text/javascript">
    $(document).ready(function(){
            

            $("#tab_infos").click(function(event){
                event.preventDefault();
                
                document.getElementById("annonces").style.display="none";
                document.getElementById("demandes").style.display="none";
                document.getElementById("historique").style.display="none";
                $("#infos").fadeIn();
                var css=".tabs ul li a{background:#187cc2;} .tabs ul li a:hover{background:#323232;}";
                document.getElementById("tab_infos").style.background="#323232";
                document.getElementById("tab_annonces").style=css;
                document.getElementById("tab_demandes").style=css;
                document.getElementById("tab_historique").style=css;
                    
                
            })
            $("#tab_annonces").click(function(event){
                event.preventDefault();
                
                document.getElementById("infos").style.display="none";
                document.getElementById("demandes").style.display="none";
                document.getElementById("historique").style.display="none";
                $("#annonces").fadeIn();
                var css=".tabs ul li a{background:#187cc2;} .tabs ul li a:hover{background:#323232;}";
                document.getElementById("tab_annonces").style.background="#323232";
                document.getElementById("tab_infos").style=css;
                document.getElementById("tab_demandes").style=css;
                document.getElementById("tab_historique").style=css;
                    
            
            })
            $("#tab_demandes").click(function(event){
                event.preventDefault();
                
                document.getElementById("infos").style.display="none";
                document.getElementById("historique").style.display="none";
                document.getElementById("annonces").style.display="none";
                $("#demandes").fadeIn();
                var css=".tabs ul li a{background:#187cc2;} .tabs ul li a:hover{background:#323232;}";
                document.getElementById("tab_demandes").style.background="#323232";
                document.getElementById("tab_annonces").style=css;
                document.getElementById("tab_historique").style=css;
                document.getElementById("tab_infos").style=css;
                
                
            })
            $("#tab_historique").click(function(event){
                event.preventDefault();
                
                document.getElementById("infos").style.display="none";
                document.getElementById("annonces").style.display="none";
                document.getElementById("demandes").style.display="none";
                $("#historique").fadeIn();
                var css=".tabs ul li a{background:#187cc2;} .tabs ul li a:hover{background:#323232;}";
                document.getElementById("tab_historique").style.background="#323232";
                document.getElementById("tab_annonces").style=css;
                document.getElementById("tab_infos").style=css;
                document.getElementById("tab_demandes").style=css;
                    
                
            })
        });
function der_page(i) {
            $.post("php/der_page_.php", { der : i });
        }

</script>

<?php
function makeRating($rate, $bestvalue = 5) {
    $intrate=intval($rate);            
    $decrate=(floatval($rate) - $intrate) * 100;
    $ratingBox  = '<!-- item AggregateRating -->' . PHP_EOL;
    $ratingBox .= '<p class="ratingBox" itemprop="aggregateRating" itemscope itemtype="http://schema.xyz/AggregateRating">' . PHP_EOL;
    $ratingBox .= '<span title="'. $rate .' / '. $bestvalue .'">' . PHP_EOL;
    for($i=0; $i<$bestvalue; ++$i) {
    $ratingBox .= '<svg height="16" width="16">' . PHP_EOL;
      if($i<$intrate) {
        $ratingBox .= '<polygon points="8,0 10.5,5 16,6 12,10 13,16 8,13 3,16 4,10 0,6 5.5,5" fill="Yellow" stroke="DarkKhaki" stroke-width=".5" />' . PHP_EOL;}
      elseif($i==$intrate && $decrate>0 ) {
        $ratingBox .= '<defs>' . PHP_EOL;
        $ratingBox .= '<linearGradient id="starGradient">' . PHP_EOL;
        $ratingBox .= '<stop offset="'. $decrate .'%" stop-color="Yellow"/>' . PHP_EOL;
        $ratingBox .= '<stop offset="'. $decrate .'%" stop-color="LightGrey"/>' . PHP_EOL;
        $ratingBox .= '</linearGradient>' . PHP_EOL;
        $ratingBox .= '</defs>' . PHP_EOL;
        $ratingBox .= '<polygon points="8,0 10.5,5 16,6 12,10 13,16 8,13 3,16 4,10 0,6 5.5,5" fill="url(#starGradient)" stroke="DarkKhaki" stroke-width=".5" />' . PHP_EOL;
      }
      else {
        $ratingBox .= '<polygon points="8,0 10.5,5 16,6 12,10 13,16 8,13 3,16 4,10 0,6 5.5,5"  fill="LightGrey" stroke="DimGray" stroke-width=".5" />' . PHP_EOL;}
    $ratingBox .= '</svg>' . PHP_EOL;}
    $ratingBox .= '</span>' . PHP_EOL;
    $ratingBox .= '<span style="display:none;"><span itemprop="ratingValue" class="rating" title="'. $rate .'">'. $rate .'</span>';
    $ratingBox .= '<span > / </span><span itemprop="bestRating">'. $bestvalue .'</span></span>' . PHP_EOL;
    $ratingBox .= '</p>' . PHP_EOL;
    $ratingBox .= '<!-- end of item -->' . PHP_EOL;
    return $ratingBox;
  } 
?>
	

<script type="text/javascript">

        var profil="<?php echo $id_profil ?>";
        var visiteur="<?php echo $_SESSION['id_compte'] ?>";
        var prem="<?php echo $prof_prem ?>";
        var dev="<?php echo $dev ?>";
        var from="<?php echo $from ?>";
        

        var ban_admin=$("#ban_admin").clone(); $("#ban_admin").remove();
        var profil_complet=$("#profil_complet").clone(); $("#profil_complet").remove();
        var signaler=$("#signaler").clone(); $("#signaler").remove();
        var supprimer=$("#supprimer").clone(); $("#supprimer").remove();
        var don_prem=$("#don_prem").clone();
        var premium=$("#premium").clone(); $("#premium").remove();
        var moi=$("#moi").clone(); $("#moi").remove();

       if (from==="admin") {
                $("#ban_norm").remove();
                $("#banieres").append(ban_admin);
                $("#ban_admin").fadeIn(0);
                $("#page_profil").append(profil_complet);
                $("#profil_complet").fadeIn();
                if (prem==1) {
                    $("#page_profil").append(premium);
                    $("#premium").fadeIn();
                }
                $("#page_profil").append(supprimer);
                $("#supprimer").fadeIn();
                
        } else if (from==="user") {
                if (profil===visiteur) {
                    $("#page_profil").append(moi);
                    $("#moi").fadeIn();
                    if (prem==1) {
                        $("#donn_prem").append(don_prem);
                        $("#don_prem").fadeIn();
                    }
                } else {
                    if (dev==1) {
                        $("#page_profil").append(profil_complet);
                        $("#profil_complet").fadeIn();
                    } else if (dev==0) {
                        $("#profil_reduit").fadeIn();
                    }
                    $("#page_profil").append(signaler);
                    $("#signaler").fadeIn();
                }
            }
    
 
    
</script>


</body>
</html>