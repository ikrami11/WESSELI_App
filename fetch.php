


<?php
	

	/*require 'dbh.inc.php';*/

	$conn=mysqli_connect("localhost","root","","projet2cp");

	if (isset($_POST['email']) && isset($_POST['view'])){
		$output='';
		$email=$_POST['email'];
		$sql="SELECT * FROM compte WHERE mail='$email'";
		$result=mysqli_query($conn,$sql);
		
		if (mysqli_num_rows($result)>0){
			$row=mysqli_fetch_assoc($result);
			$id=$row["id_compte"];
			$sql="SELECT * FROM notification WHERE id_compte_r='$id' ORDER BY date_temps DESC";
			$result=mysqli_query($conn,$sql);
			if (mysqli_num_rows($result)>0) {			
				while($row=mysqli_fetch_assoc($result))
				{
					$vu=$row['vu'];
					$acc=$row['acc'];
					$close=$row['close'];
					if ($vu==1) {
							$color="#75a3a3";
							$icon="glyphicon-eye-open";
					}
					else 
					{
							$color="";
								$icon="glyphicon-eye-close";
					}
					if($close==1)
					{
						$fermer='display:none';
					}
					else
					{
						$fermer='';
					}
					$temps_notif=$row['date_temps'];
					$temps_now=date("Y/m/d");
					$x=explode(' ', $temps_notif);
					$y=explode('-', $x[0]);
					$temps_notif=$y[2].'-'.$y[1].'-'.$y[0].' '.$x[1];
					if((strtotime($x[0])) ==( strtotime($temps_now)))
					{
						$temps_notif=$x[1];
					}
					else 
					{
											$x=explode(' ', $temps_notif);
					$a=$x[0];
					$z=explode('-', $a);
					$temps_now=date("Y");
					if((strtotime($z[2])) ==( strtotime($temps_now)))
					{
						$temps_notif=$z[0].'-'.$z[1].' '.$x[1];
					}

					}
					$y=explode(':', $temps_notif);
					$temps_notif=$y[0].':'.$y[1];

					$id_notif=$row['id_notif'];
					$id_colis=$row['id_colis'];
					$id_trajet=$row['id_trajet'];
					$code_notif=$row['code_notif'];
					switch ($code_notif) {
						case 0://demande colis 
						$nom_coli='';
							$sql1="SELECT * FROM trajet WHERE id_trajet='$id_trajet'";//cherchons les infos du trajets
							$result1=mysqli_query($conn,$sql1);
							if (mysqli_num_rows($result1)>0)
							{
								$row1=mysqli_fetch_assoc($result1);
								$id_compte_e=$row1['id_compte'];
							}

							$sql2="SELECT * FROM colis WHERE id_colis='$id_colis'";//mon colis
							$result2=mysqli_query($conn,$sql2);
							if (mysqli_num_rows($result2)>0)
							{
								$row2=mysqli_fetch_assoc($result2);
								$nom_coli=$row2['nom'];
							}


							$sql3="SELECT * FROM compte WHERE id_compte='$id_compte_e'";//les infos de l'utilisateur emitteur
							$result3=mysqli_query($conn,$sql3);
							if (mysqli_num_rows($result3)!=1)
							{
								//erreur soit il ya plusieur utilisateur ayant le meme id ,soit cet utilisateur a ete suprime
							}								
							else
							{
								$row3=mysqli_fetch_assoc($result3);$prenom=$row3['prenom'];$nom=$row3['nom'];
								$z=$nom." a demande votre coli ".$nom_coli;
								if (strlen($z)>60) {
									$x=str_split($z,56);
									$x[0].='...';
									$z=$x[0];
								}


								
								
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br>".$z." <br/> <button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' >voir plus</button></li>";
							}	
									
							break;

							
						case 1://accepte une demande colis ,j ai un trajet je fait une demande coli ,le propreitaire m accepte
							$sql2="SELECT * FROM colis WHERE id_colis=".$id_colis;//cherchons les infos du colis
							$result2=mysqli_query($conn,$sql2);
							if (mysqli_num_rows($result2)>0)
							{
								$row2=mysqli_fetch_assoc($result2);
								$nom_coli=$row2['nom'];
								$id_compte_e=$row2['id_compte_e'];
							}
								
							$sql1="SELECT * FROM trajet WHERE id_trajet=".$id_trajet;//mon trajet 
							$result1=mysqli_query($conn,$sql1);
							if (mysqli_num_rows($result1)>0)
							{
								$row1=mysqli_fetch_assoc($result1);
							}

							$sql3="SELECT * FROM compte WHERE id_compte=".$id_compte_e;//les infos de l'utilisateur emitteur
							$result3=mysqli_query($conn,$sql3);
							if (mysqli_num_rows($result3)!=1)
							{
								//erreur soit il ya plusieur utilisateur ayant le meme id ,soit cet utilisateur a ete suprime
							}
							else
							{
								$row3=mysqli_fetch_assoc($result3);$prenom=$row3['prenom'];$nom=$row3['nom'];
								$z=$nom." a accpte que vous transporte le coli ".$nom_coli;
								if (strlen($z)>60) {
									$x=str_split($z,56);
									$x[0].='...';
									$z=$x[0];
								}
								
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br>".$z." <br/> <button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' id='".$id_notif."'>voir plus</button></li>";
							}	
							break;
							
						case 2:
							$sql2="SELECT * FROM colis WHERE id_colis=".$id_colis;//cherchons les infos du colis
							$result2=mysqli_query($conn,$sql2);
							if (mysqli_num_rows($result2)>0)
							{
								$row2=mysqli_fetch_assoc($result2);
								$nom_coli=$row2['nom'];
								$id_compte_e=$row2['id_compte_e'];
							}

							$sql1="SELECT * FROM trajet WHERE id_trajet=".$id_trajet;//mon trajet 
							$result1=mysqli_query($conn,$sql1);
							if (mysqli_num_rows($result1)>0)
							{
								$row1=mysqli_fetch_assoc($result1);
							}

							$sql3="SELECT * FROM compte WHERE id_compte=".$id_compte_e;//les infos de l'utilisateur emitteur
							$result3=mysqli_query($conn,$sql3);
							if (mysqli_num_rows($result3)!=1)
							{
								//erreur soit il ya plusieur utilisateur ayant le meme id ,soit cet utilisateur a ete suprime
							}
							else
							{
								$row3=mysqli_fetch_assoc($result3);$prenom=$row3['prenom'];$nom=$row3['nom'];
								$z=$nom." a refuser que vous transporte son coli ".$nom_coli;
								if (strlen($z)>60) {
									$x=str_split($z,56);
									$x[0].='...';
									$z=$x[0];
								}


								
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br>".$nom." ".$prenom." a refuser que vous transporte son coli <strong> ".$nom_coli."</strong> <br/><button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' id='".$id_notif."'>voir plus</button></li>";
							}		
							break;
							case 3://demande un trajet 
							$sql1="SELECT * FROM colis WHERE id_colis=".$id_colis;//cherchons les infos du colis
							$result1=mysqli_query($conn,$sql1);
							if (mysqli_num_rows($result1)>0)
							{
								$row1=mysqli_fetch_assoc($result1);
								$id_compte_e=$row1['id_compte_e'];
								$nom_coli=$row1['nom'];
							}

							$sql2="SELECT * FROM trajet WHERE id_trajet=".$id_trajet;//mon trajet
							$result2=mysqli_query($conn,$sql2);
							if (mysqli_num_rows($result2)>0)
							{
								$row2=mysqli_fetch_assoc($result2);
								
							}

							$sql3="SELECT * FROM compte WHERE id_compte=".$id_compte_e;//les infos de l'utilisateur emitteur
							$result3=mysqli_query($conn,$sql3);
							if (mysqli_num_rows($result3)!=1)
							{
								//erreur soit il ya plusieur utilisateur ayant le meme id ,soit cet utilisateur a ete suprime
							}
							else
							{
								$row3=mysqli_fetch_assoc($result3);$prenom=$row3['prenom'];$nom=$row3['nom'];
								$z=$nom." a demande de transporter son coli ".$nom_coli;
								if (strlen($z)>60) {
									$x=str_split($z,56);
									$x[0].='...';
									$z=$x[0];
								}
								
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br>".$z." <br/> <button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' id='".$id_notif."'>voir plus</button></li>";
							}		
							break;
							case 4://accepte une demande trajet ,j ai un colis je fait une demande trajet ,le propreitaire m accepte
							$sql1="SELECT * FROM trajet WHERE id_trajet=".$id_trajet;//cherchons les infos du trajets
							$result1=mysqli_query($conn,$sql1);
							if (mysqli_num_rows($result1)>0)
							{
								$row1=mysqli_fetch_assoc($result1);
								$id_compte_e=$row1['id_compte'];
							}

							$sql2="SELECT * FROM colis WHERE id_colis=".$id_colis;//mon colis
							$result2=mysqli_query($conn,$sql2);
							if (mysqli_num_rows($result2)>0)
							{
								$row2=mysqli_fetch_assoc($result2);
								$nom_coli=$row2['nom'];
							}

							$sql3="SELECT * FROM compte WHERE id_compte=".$id_compte_e;//les infos de l'utilisateur emitteur
							$result3=mysqli_query($conn,$sql3);
							if (mysqli_num_rows($result3)!=1)
							{
								//erreur soit il ya plusieur utilisateur ayant le meme id ,soit cet utilisateur a ete suprime
							}
							else
							{
								$row3=mysqli_fetch_assoc($result3);$prenom=$row3['prenom'];$nom=$row3['nom'];
								$z=$nom." a accepter de tronsporter vote colis ".$nom_coli;
								if (strlen($z)>60) {
									$x=str_split($z,56);
									$x[0].='...';
									$z=$x[0];
								}
								
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br>".$z."<br/> <button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' id='".$id_notif."'>voir plus</button></li>";
							}			
							break;
							case 5:
							$sql1="SELECT * FROM trajet WHERE id_trajet=".$id_trajet;//cherchons les infos du trajets
							$result1=mysqli_query($conn,$sql1);
							if (mysqli_num_rows($result1)>0)
							{
								$row1=mysqli_fetch_assoc($result1);
								$id_compte_e=$row1['id_compte'];
							}

							$sql2="SELECT * FROM colis WHERE id_colis=".$id_colis;//mon colis
							$result2=mysqli_query($conn,$sql2);
							if (mysqli_num_rows($result2)>0)
							{
								$row2=mysqli_fetch_assoc($result2);
								$nom_coli=$row2['nom'];
							}

							$sql3="SELECT * FROM compte WHERE id_compte=".$id_compte_e;//les infos de l'utilisateur emitteur
							$result3=mysqli_query($conn,$sql3);
							if (mysqli_num_rows($result3)!=1)
							{
								//erreur soit il ya plusieur utilisateur ayant le meme id ,soit cet utilisateur a ete suprime
							}
							else
							{
								$row3=mysqli_fetch_assoc($result3);$prenom=$row3['prenom'];$nom=$row3['nom'];
								$z=$nom." a refuser de tronsporter vote colis ".$nom_coli;
								if (strlen($z)>60) {
									$x=str_split($z,56);
									$x[0].='...';
									$z=$x[0];
								}
								
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br>".$z."<br/> <button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' id='".$id_notif."'>voir plus</button></li>";
							}
									break;	
							case 6:
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br> l'administrateur vous accepte comme un utilisateur premium<br/></li>";
								# code...
								break;
							case 7:
							$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br> vous étes refusé d'etre un utilisateur premium <br/> <button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' id='".$id_notif."'>voir plus</button></li>";
								# code...
								break;
							case 8://votre coli est en route 
							$sql1="SELECT * FROM trajet WHERE id_trajet=".$id_trajet;//cherchons les infos du trajets
							$result1=mysqli_query($conn,$sql1);
							if (mysqli_num_rows($result1)>0)
							{
								$row1=mysqli_fetch_assoc($result1);
								$id_compte_e=$row1['id_compte'];
							}

							$sql2="SELECT * FROM colis WHERE id_colis=".$id_colis;//mon colis
							$result2=mysqli_query($conn,$sql2);
							if (mysqli_num_rows($result2)>0)
							{
								$row2=mysqli_fetch_assoc($result2);
								$nom_coli=$row2['nom'];
							}

							$sql3="SELECT * FROM compte WHERE id_compte=".$id_compte_e;//les infos de l'utilisateur emitteur
							$result3=mysqli_query($conn,$sql3);
							if (mysqli_num_rows($result3)!=1)
							{
								//erreur soit il ya plusieur utilisateur ayant le meme id ,soit cet utilisateur a ete suprime
							}
							else
							{
								$row3=mysqli_fetch_assoc($result3);$prenom=$row3['prenom'];$nom=$row3['nom'];
								$z=$nom." vous indique que votre colis ".$nom_coli." est en route";
								if (strlen($z)>60) {
									$x=str_split($z,56);
									$x[0].='...';
									$z=$x[0];
								}
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br>".$z."<br/> <button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' id='".$id_notif."'>voir plus</button></li>";
							}	

							break;
							case 9://arrive du colis au destination
														$sql1="SELECT * FROM trajet WHERE id_trajet=".$id_trajet;//cherchons les infos du trajets
							$result1=mysqli_query($conn,$sql1);
							if (mysqli_num_rows($result1)>0)
							{
								$row1=mysqli_fetch_assoc($result1);
								$id_compte_e=$row1['id_compte'];
							}

							$sql2="SELECT * FROM colis WHERE id_colis=".$id_colis;//mon colis
							$result2=mysqli_query($conn,$sql2);
							if (mysqli_num_rows($result2)>0)
							{
								$row2=mysqli_fetch_assoc($result2);
								$nom_coli=$row2['nom'];
							}

							$sql3="SELECT * FROM compte WHERE id_compte=".$id_compte_e;//les infos de l'utilisateur emitteur
							$result3=mysqli_query($conn,$sql3);
							if (mysqli_num_rows($result3)!=1)
							{
								//erreur soit il ya plusieur utilisateur ayant le meme id ,soit cet utilisateur a ete suprime
							}
							else
							{
								$row3=mysqli_fetch_assoc($result3);$prenom=$row3['prenom'];$nom=$row3['nom'];
								$z=$nom." vous indique que votre colis ".$nom_coli." est arrivé au destination";
								if (strlen($z)>60) {
									$x=str_split($z,56);
									$x[0].='...';
									$z=$x[0];
								}

								
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br>".$z." <br/> <button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' id='".$id_notif."'>voir plus</button></li>";
							}	
								
							break;
							case 10://coli endomage
														$sql1="SELECT * FROM trajet WHERE id_trajet=".$id_trajet;//cherchons les infos du trajets
							$result1=mysqli_query($conn,$sql1);
							if (mysqli_num_rows($result1)>0)
							{
								$row1=mysqli_fetch_assoc($result1);
								$id_compte_e=$row1['id_compte'];
							}

							$sql2="SELECT * FROM colis WHERE id_colis=".$id_colis;//mon colis
							$result2=mysqli_query($conn,$sql2);
							if (mysqli_num_rows($result2)>0)
							{
								$row2=mysqli_fetch_assoc($result2);
								$nom_coli=$row2['nom'];
							}

							$sql3="SELECT * FROM compte WHERE id_compte=".$id_compte_e;//les infos de l'utilisateur emitteur
							$result3=mysqli_query($conn,$sql3);
							if (mysqli_num_rows($result3)!=1)
							{
								//erreur soit il ya plusieur utilisateur ayant le meme id ,soit cet utilisateur a ete suprime
							}
							else
							{
								$row3=mysqli_fetch_assoc($result3);$prenom=$row3['prenom'];$nom=$row3['nom'];
								$z=$nom." vous indique que votre colis ".$nom_coli." est endommagé";
								if (strlen($z)>60) {
									$x=str_split($z,56);
									$x[0].='...';
									$z=$x[0];
								}

								
								$output.="<li class='notification-li ".$id_notif."' style='background-color:".$color.";".$fermer.";'><span style='float:left;margin-left:10px;' onclick='vuuu(".$id_notif.")' id='glyphicon".$id_notif."'class='glyphicon ".$icon."  '></span><span class='date'>".$temps_notif."</span><span onclick='Close(".$id_notif.")' class='glyphicon glyphicon-remove' style='float:right;margin-right:10px;'></span></br>".$z." <br/> <button class='btn btn-default notif-button' onclick='VoirPlus(".$id_colis.",".$code_notif.",".$id_trajet.",".$vu.",".$id_notif.",".$acc.")' id='".$id_notif."'>voir plus</button></li>";
							}	
								
							break;
						
						default:
							# code...
							break;
						}
					}
					$data = array('notification' =>$output,'id_colis'=>$id_colis,'id_trajet'=>$id_trajet); 
					echo json_encode($data);
				}
				else
				{$data = array('notification' =>$output); 
					echo json_encode($data);
				}
		}
				
	
	}
	
	else{		$data = array('notification' => 'abc'); 
		echo json_encode($data);}



?>