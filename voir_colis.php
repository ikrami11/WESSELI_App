<?php
$arrets='';
$data="";
		if (isset($_POST["id_coli"]) && isset($_POST["code_notif"]) && isset($_POST["id_trajet"]) && isset($_POST['id_notif'])) {
			$conn=mysqli_connect("localhost","root","","projet2cp");
				
			switch ($_POST["code_notif"]) {
				case 0://moi colis lui trajet
				$data="sss";
					$sql='SELECT * FROM  trajet where id_trajet='.$_POST["id_trajet"];
					$resultat=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($resultat);//recuperer les infos du trajet
					$id_arret=$row['id_arret'];
					$date_annonce_trajet=$row["date_annonce"];
					$lieu_depart=$row['lieux_depart'];
					$lieu_arrive=$row['lieux_arrive'];
					$taille_max=$row['taille_max'];
					$poids_max=$row['poids_max'];
					$id=$row['id_compte'];
					
					$sql1='SELECT *FROM compte where id_compte='.$id;
					$resultat1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($resultat1);//recuperer les info d'utilisateur deposant un trajet
					$nom=$row1['nom'];
					$prenom=$row1['prenom'];
					
					$note=$row1['fiab_tran'];

					$sql2="SELECT * FROM colis WHERE id_colis=".$_POST["id_coli"];//recuperer les infos de mon colis
					$resultat2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($resultat2);
					$date_annonce_coli=$row2["date_annonce"];
					$date_envoi=$row2['date_envoi'];
					$date_depot=$row2['date_depot'];
					$taille=$row2['taille'];
					$poids=$row2['poids'];
					$demande_spec=$row2['demande_spec'];
					$tarif=$row2["tarif"];
					$nom_coli=$row2['nom'];
											$arrets="<tr > <td style='text-align: center;'>pas d'arrets</td></tr>";
					if ($id_arret!=null) {
						$arrets='';
				$sql3='SELECT *FROM arrets where id_arret='.$id_arret;
					$resultat3=mysqli_query($conn,$sql3);
					$i=1;
					while($row2=mysqli_fetch_assoc($resultat3))//recuperer les arrets					
						{
							$arrets.="<tr > <td style='text-align: center;'>".$row2['arret']."</td></tr>";
							$i++;
						}
					}
						
				$data = array('date_annonce_coli'=> $date_annonce_coli,'lieu_depart'=>$lieu_depart,'lieu_arrive'=>$lieu_arrive,'taille_max'=>$taille_max,'poids_max'=>$poids_max,'date_annonce_trajet'=>$date_annonce_trajet,'date_envoi'=>$date_envoi,'date_depot'=>$date_depot,'taille'=>$taille,'poids'=>$poids,'demande_spec'=>$demande_spec,'tarif'=>$tarif,'nom_coli'=>$nom_coli,'nom'=>$nom,'prenom'=>$prenom,'arret'=>$arrets,'id_colis'=>$_POST["id_coli"],'id_trajet'=>$_POST["id_trajet"],'note'=>$note);
					break;

					case 1:// moi trajet lui colis accepte
					$sql='SELECT * FROM  colis where id_colis='.$_POST["id_coli"];
					$resultat=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($resultat);//recuperer les infos du coli
					$nom_coli=$row['nom'];
					$date_annonce_coli=$row["date_annonce"];
					$date_envoi=$row['date_envoi'];
					$date_depot=$row['date_depot'];
					$taille=$row['taille'];
					$poids=$row['poids'];
					$demande_spec=$row['demande_spec'];
					$tarif=$row["tarif"];
					$id=$row['id_compte_e'];
		
					$sql1='SELECT *FROM compte where id_compte='.$id;
					$resultat1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($resultat1);//recuperer les info d'utilisateur deposant une annonce coli
					$nom=$row1['nom'];
					$prenom=$row1['prenom'];
					$note=$row1['fiab_env'];

					$sql2='SELECT * FROM  trajet where id_trajet='.$_POST["id_trajet"];
					$resultat2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($resultat2);//recuperer les infos de mon trajet
					$id_arret=$row2['id_arret'];
					$date_annonce_trajet=$row2["date_annonce"];
					$lieu_depart=$row2['lieux_depart'];
					$lieu_arrive=$row2['lieux_arrive'];
					$taille_max=$row2['taille_max'];
					$poids_max=$row2['poids_max'];
					$arrets="<tr > <td style='text-align: center;'>pas d'arrets</td></tr>";
					if ($id_arret!=null) {
						$arrets='';
					$sql3='SELECT *FROM arrets where id_arret='.$id_arret;
					$resultat3=mysqli_query($conn,$sql3);
					$i=1;
					while($row2=mysqli_fetch_assoc($resultat3))//recuperer mes arrets					
						{
							$arrets.="<tr > <td style='text-align: center;'>".$row2['arret']."</td></tr>";
							$i++;
						}
					}
						
								$data = array('date_annonce_coli'=> $date_annonce_coli,'lieu_depart'=>$lieu_depart,'lieu_arrive'=>$lieu_arrive,'taille_max'=>$taille_max,'poids_max'=>$poids_max,'date_annonce_trajet'=>$date_annonce_trajet,'date_envoi'=>$date_envoi,'date_depot'=>$date_depot,'taille'=>$taille,'poids'=>$poids,'demande_spec'=>$demande_spec,'tarif'=>$tarif,'nom_coli'=>$nom_coli,'nom'=>$nom,'prenom'=>$prenom,'arret'=>$arrets,'id_colis'=>$_POST["id_coli"],'id_trajet'=>$_POST["id_trajet"],'note'=>$note
					);
							
						
						break;
					case 2:// moi trajet lui colis refuse
					$sql='SELECT * FROM  colis where id_colis='.$_POST["id_coli"];
					$resultat=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($resultat);//recuperer les infos du coli
					$nom_coli=$row['nom'];
					$date_annonce_coli=$row["date_annonce"];
					$date_envoi=$row['date_envoi'];
					$date_depot=$row['date_depot'];
					$taille=$row['taille'];
					$poids=$row['poids'];
					$demande_spec=$row['demande_spec'];
					$tarif=$row["tarif"];
					$id=$row['id_compte_e'];
		
					$sql1='SELECT *FROM compte where id_compte='.$id;
					$resultat1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($resultat1);//recuperer les info d'utilisateur deposant une annonce coli
					$nom=$row1['nom'];
					$prenom=$row1['prenom'];
					$note=$row1['fiab_env'];

					$sql2='SELECT * FROM  trajet where id_trajet='.$_POST["id_trajet"];
					$resultat2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($resultat2);//recuperer les infos de mon trajet
					$id_arret=$row2['id_arret'];
					$date_annonce_trajet=$row2["date_annonce"];
					$lieu_depart=$row2['lieux_depart'];
					$lieu_arrive=$row2['lieux_arrive'];
					$taille_max=$row2['taille_max'];
					$poids_max=$row2['poids_max'];
					$arrets="<tr > <td style='text-align: center;'>pas d'arrets</td></tr>";
					if ($id_arret!=null) {
						$arrets='';
					$sql3='SELECT *FROM arrets where id_arret='.$id_arret;
					$resultat3=mysqli_query($conn,$sql3);
					$i=1;
					while($row2=mysqli_fetch_assoc($resultat3))//recuperer mes arrets					
						{
							$arrets.="<tr > <td style='text-align: center;'>".$row2['arret']."</td></tr>";
							$i++;
						}
					}
						
								$data = array('date_annonce_coli'=> $date_annonce_coli,'lieu_depart'=>$lieu_depart,'lieu_arrive'=>$lieu_arrive,'taille_max'=>$taille_max,'poids_max'=>$poids_max,'date_annonce_trajet'=>$date_annonce_trajet,'date_envoi'=>$date_envoi,'date_depot'=>$date_depot,'taille'=>$taille,'poids'=>$poids,'demande_spec'=>$demande_spec,'tarif'=>$tarif,'nom_coli'=>$nom_coli,'nom'=>$nom,'prenom'=>$prenom,'arret'=>$arrets,'id_colis'=>$_POST["id_coli"],'id_trajet'=>$_POST["id_trajet"],'note'=>$note
					);
							
						
						break;
					case 4://moi colis lui trajet accepte de transporter mon coli
					$sql='SELECT * FROM  colis where id_colis='.$_POST["id_coli"];
					$resultat=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($resultat);//recuperer les infos du coli
					$nom_coli=$row['nom'];
					$date_annonce_coli=$row["date_annonce"];
					$date_envoi=$row['date_envoi'];
					$date_depot=$row['date_depot'];
					$taille=$row['taille'];
					$poids=$row['poids'];
					$demande_spec=$row['demande_spec'];
					$tarif=$row["tarif"];
					
		


					$sql2='SELECT * FROM  trajet where id_trajet='.$_POST["id_trajet"];
					$resultat2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($resultat2);//recuperer les infos de mon coli
					$id=$row2['id_compte'];
					$id_arret=$row2['id_arret'];
					$date_annonce_trajet=$row2["date_annonce"];
					$lieu_depart=$row2['lieux_depart'];
					$lieu_arrive=$row2['lieux_arrive'];
					$taille_max=$row2['taille_max'];
					$poids_max=$row2['poids_max'];
					$arrets="<tr > <td style='text-align: center;'>pas d'arrets</td></tr>";

					$sql1='SELECT *FROM compte where id_compte='.$id;
					$resultat1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($resultat1);//recuperer les info d'utilisateur deposant une annonce trajet
					$nom=$row1['nom'];
					$prenom=$row1['prenom'];
					$note=$row1['fiab_tran'];

					if ($id_arret!=null) {
						$arrets='';
					$sql3='SELECT *FROM arrets where id_arret='.$id_arret;
					$resultat3=mysqli_query($conn,$sql3);
					$i=1;
					while($row2=mysqli_fetch_assoc($resultat3))//recuperer mes arrets					
						{
							$arrets.="<tr > <td style='text-align: center;'>".$row2['arret']."</td></tr>";
							$i++;
						}}
						
								$data = array('date_annonce_coli'=> $date_annonce_coli,'lieu_depart'=>$lieu_depart,'lieu_arrive'=>$lieu_arrive,'taille_max'=>$taille_max,'poids_max'=>$poids_max,'date_annonce_trajet'=>$date_annonce_trajet,'date_envoi'=>$date_envoi,'date_depot'=>$date_depot,'taille'=>$taille,'poids'=>$poids,'demande_spec'=>$demande_spec,'tarif'=>$tarif,'nom_coli'=>$nom_coli,'nom'=>$nom,'prenom'=>$prenom,'arret'=>$arrets,'id_colis'=>$_POST["id_coli"],'id_trajet'=>$_POST["id_trajet"],'note'=>$note
					);
						break;
				case 3://moi trajet lui coli demande 
				$data="sss";
					$sql='SELECT * FROM  colis where id_colis='.$_POST["id_coli"];
					$resultat=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($resultat);//recuperer les infos du coli
					$nom_coli=$row['nom'];
					$date_annonce_coli=$row["date_annonce"];
					$date_envoi=$row['date_envoi'];
					$date_depot=$row['date_depot'];
					$taille=$row['taille'];
					$poids=$row['poids'];
					$demande_spec=$row['demande_spec'];
					$tarif=$row["tarif"];
					$id=$row['id_compte_e'];
		
					$sql1='SELECT *FROM compte where id_compte='.$id;
					$resultat1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($resultat1);//recuperer les info d'utilisateur deposant une annonce coli
					$nom=$row1['nom'];
					$prenom=$row1['prenom'];
					$note=$row1['fiab_env'];

					$sql2='SELECT * FROM  trajet where id_trajet='.$_POST["id_trajet"];
					$resultat2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($resultat2);//recuperer les infos de mon trajet
					$id_arret=$row2['id_arret'];
					$date_annonce_trajet=$row2["date_annonce"];
					$lieu_depart=$row2['lieux_depart'];
					$lieu_arrive=$row2['lieux_arrive'];
					$taille_max=$row2['taille_max'];
					$poids_max=$row2['poids_max'];
					$arrets="<tr > <td style='text-align: center;'>pas d'arrets</td></tr>";
					if ($id_arret!=null) {
						# code...
					$arrets='';
					$sql3='SELECT *FROM arrets where id_arret='.$id_arret;
					$resultat3=mysqli_query($conn,$sql3);
					$i=1;
					while($row2=mysqli_fetch_assoc($resultat3))//recuperer mes arrets					
						{
							$arrets.="<tr > <td style='text-align: center;'>".$row2['arret']."</td></tr>";
							$i++;
						}}

						
				$data = array('date_annonce_coli'=> $date_annonce_coli,'lieu_depart'=>$lieu_depart,'lieu_arrive'=>$lieu_arrive,'taille_max'=>$taille_max,'poids_max'=>$poids_max,'date_annonce_trajet'=>$date_annonce_trajet,'date_envoi'=>$date_envoi,'date_depot'=>$date_depot,'taille'=>$taille,'poids'=>$poids,'demande_spec'=>$demande_spec,'tarif'=>$tarif,'nom_coli'=>$nom_coli,'nom'=>$nom,'prenom'=>$prenom,'arret'=>$arrets,'id_colis'=>$_POST["id_coli"],'id_trajet'=>$_POST["id_trajet"],'note'=>$note
					);
					break;
					case 5://moi colis lui trajet refuse
											$sql='SELECT * FROM  colis where id_colis='.$_POST["id_coli"];
					$resultat=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($resultat);//recuperer les infos du coli
					$nom_coli=$row['nom'];
					$date_annonce_coli=$row["date_annonce"];
					$date_envoi=$row['date_envoi'];
					$date_depot=$row['date_depot'];
					$taille=$row['taille'];
					$poids=$row['poids'];
					$demande_spec=$row['demande_spec'];
					$tarif=$row["tarif"];
					$id=$row['id_compte_e'];
		
					$sql1='SELECT *FROM compte where id_compte='.$id;
					$resultat1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($resultat1);//recuperer les info d'utilisateur deposant une annonce coli
					$nom=$row1['nom'];
					$prenom=$row1['prenom'];
					$note=$row1['fiab_tran'];

					$sql2='SELECT * FROM  trajet WHERE id_trajet='.$_POST["id_trajet"];
					$resultat2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($resultat2);//recuperer les infos de mon trajet
					$id_arret=$row2['id_arret'];
					$date_annonce_trajet=$row2["date_annonce"];
					$lieu_depart=$row2['lieux_depart'];
					$lieu_arrive=$row2['lieux_arrive'];
					$taille_max=$row2['taille_max'];
					$poids_max=$row2['poids_max'];
					$arrets="<tr > <td style='text-align: center;'>pas d'arrets</td></tr>";
					if ($id_arret!=null) {
						$arrets='';
					$sql3='SELECT *FROM arrets where id_arret='.$id_arret;
					$resultat3=mysqli_query($conn,$sql3);
					$i=1;
					while($row2=mysqli_fetch_assoc($resultat3))//recuperer mes arrets					
						{
							$arrets.="<tr > <td style='text-align: center;'>".$row2['arret']."</td></tr>";
							$i++;
						}}
						
								$data = array('date_annonce_coli'=> $date_annonce_coli,'lieu_depart'=>$lieu_depart,'lieu_arrive'=>$lieu_arrive,'taille_max'=>$taille_max,'poids_max'=>$poids_max,'date_annonce_trajet'=>$date_annonce_trajet,'date_envoi'=>$date_envoi,'date_depot'=>$date_depot,'taille'=>$taille,'poids'=>$poids,'demande_spec'=>$demande_spec,'tarif'=>$tarif,'nom_coli'=>$nom_coli,'nom'=>$nom,'prenom'=>$prenom,'arret'=>$arrets,'id_colis'=>$_POST["id_coli"],'id_trajet'=>$_POST["id_trajet"],'note'=>$note
					);	break;
				case 7://refuse premium 
				$sql2='SELECT * FROM  cause_ref WHERE id_notif='.$_POST["id_notif"];
									$resultat2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($resultat2);
					$text=$row2['cause'];

					$data=array('no_prem'=>$text);
				break;	
				case 8 or 9:
				$data="sss";
					$sql='SELECT * FROM  trajet where id_trajet='.$_POST["id_trajet"];
					$resultat=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($resultat);//recuperer les infos du trajet
					$id_arret=$row['id_arret'];
					$date_annonce_trajet=$row["date_annonce"];
					$lieu_depart=$row['lieux_depart'];
					$lieu_arrive=$row['lieux_arrive'];
					$taille_max=$row['taille_max'];
					$poids_max=$row['poids_max'];
					$id=$row['id_compte'];
					
					$sql1='SELECT *FROM compte where id_compte='.$id;
					$resultat1=mysqli_query($conn,$sql1);
					$row1=mysqli_fetch_assoc($resultat1);//recuperer les info d'utilisateur deposant un trajet
					$nom=$row1['nom'];
					$prenom=$row1['prenom'];
					
					$note=$row1['fiab_tran'];

					$sql2="SELECT * FROM colis WHERE id_colis=".$_POST["id_coli"];//recuperer les infos de mon colis
					$resultat2=mysqli_query($conn,$sql2);
					$row2=mysqli_fetch_assoc($resultat2);
					$date_annonce_coli=$row2["date_annonce"];
					$date_envoi=$row2['date_envoi'];
					$date_depot=$row2['date_depot'];
					$taille=$row2['taille'];
					$poids=$row2['poids'];
					$demande_spec=$row2['demande_spec'];
					$tarif=$row2["tarif"];
					$nom_coli=$row2['nom'];
											$arrets="<tr > <td style='text-align: center;'>pas d'arrets</td></tr>";
					if ($id_arret!=null) {
						$arrets='';
				$sql3='SELECT *FROM arrets where id_arret='.$id_arret;
					$resultat3=mysqli_query($conn,$sql3);
					$i=1;
					while($row2=mysqli_fetch_assoc($resultat3))//recuperer les arrets					
						{
							$arrets.="<tr > <td style='text-align: center;'>".$row2['arret']."</td></tr>";
							$i++;
						}
					}
						
				$data = array('date_annonce_coli'=> $date_annonce_coli,'lieu_depart'=>$lieu_depart,'lieu_arrive'=>$lieu_arrive,'taille_max'=>$taille_max,'poids_max'=>$poids_max,'date_annonce_trajet'=>$date_annonce_trajet,'date_envoi'=>$date_envoi,'date_depot'=>$date_depot,'taille'=>$taille,'poids'=>$poids,'demande_spec'=>$demande_spec,'tarif'=>$tarif,'nom_coli'=>$nom_coli,'nom'=>$nom,'prenom'=>$prenom,'arret'=>$arrets,'id_colis'=>$_POST["id_coli"],'id_trajet'=>$_POST["id_trajet"],'note'=>$note);
							# code...
							break;		
				default:
					# code...
					break;
			}
			

			echo json_encode($data);
		}
		else
		{
			$data=' ';
		echo json_encode($data);	
		}
		

?>