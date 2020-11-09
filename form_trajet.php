<!DOCTYPE html>
<html>
<head>
	<title>Proposer un trajet</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/form_trajet_css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">


    <script type="text/javascript">

                         function addField()
                         {
                           var holder = document.getElementById('inputs'),
                           div = document.createElement('div'),
                           label = document.createElement('label'),
                           input = document.createElement('input');
  
      label.innerText = ""; // texte du label
      input.type = "text"; // type text
      input.className = "form-control"; // class
      input.name = "arret"; // nom du champ
      input.placeholder = "ville";
  
      div.appendChild(label);
      div.appendChild(input);
      holder.appendChild(div);
      
      return false;
}

    </script>


    <?php

         $bdd = new PDO ('mysql:host=localhost; dbname=projet2cp', 'root','');

         $depart = $_POST['depart'];
         $arrive = $_POST['arrive'];
         $arret = $_POST['arret'];
         $detour_max = $_POST['detour_max'];
         $moy_transport = $_POST['moy_transport'];
         $taille_max = $_POST['taille_max'];
         $poids = $_POST['poids'];
         $date_depart = $_POST['date_depart'];
         $date_retour = $_POST['date_retour'];
         $jour = $_POST['jour'];
         $frequence = $_POST['frequence'];
         $freq = $_POST['freq'];



        // $sql = " INSERT INTO trajet SET lieux_depart=$depart, lieux_arrive=$arrive, id_arret=$arrets, moyen=$moy_transport, taille_max=$format, poids_max=$poids ";

         $pdo = null;

         if(isset($_POST['envoyer'])){  //si le bouton envoyer a ete enclencher
         

                    //enregistrement dans la base de donnee

         	        $datetime = date("Y-m-d H:i:s");


                    $insertion = "INSERT INTO trajet (date_annonce,lieux_depart,lieux_arrive,detour_max,moyen,taille_max,poids_max) VALUES ('$datetime','$depart','$arrive','$detour_max','$moy_transport','$taille_max',
                    '$poids')";

                    $insertion2 = "INSERT INTO arrets (id_trajet,arret) VALUES (LAST_INSERT_ID(),'$arret')";  
                    
                    $insertion4 = "INSERT INTO trajets_non_reguliers (id_trajet,date_depart,date_retour) VALUES ('','$date_depart','$date_retour')";

                    $insertion5 = "INSERT INTO trajets_reguliers (id_trajet,frequence,jour) VALUES ('','$frequence','$jour')";

                    $execute = $bdd->query($insertion);

                    $execute2 = $bdd->query($insertion2);

                    if (!$freq ) {
                                        $execute4 = $bdd->query($insertion4); }

                    if ($freq) {
                                        $execute5 = $bdd->query($insertion5); }

                    if ($execute == true){

                        $msgSucces = " Votre demande à été enregistré avec succés";

                    }else{
                        $msgErreur = " Votre demande à n'a pas pu etre effectué";
                    }
                }
           
    ?>
</head>

<body>

    <?php

         if(isset($msgErreur)){ echo $msgErreur;} elseif ($msgSucces) {echo $msgSucces;
         }
    ?>

		<div class="col-md-4 container bg-default">
			
			<h3 class="my-4">
					Proposer un trajet
			</h3>

			<form method="POST" action='form_trajet.php'>

			<div class="row">
					<h5 class="my-3">
						<label for="country">Départ</label>
					</h5>
			</div>
				<div class="form-group">
					<div class="form-group">
						<label for="country">Wilaya *</label>
						<select type="text" class="form-control" name="depart">
							              <option value>Choisir...</option>
							              <option>01  Adrar</option>
                            <option>02  Chlef</option>
                            <option>03  Laghouat</option>
                            <option>04  Oum El Bouaghi</option>
                            <option>05  Batna</option>
                            <option>06  Béjaïa</option>
                            <option>07  Biskra</option>
                            <option>08  Béchar</option>
                            <option>09  Blida</option>
                            <option>10  Bouira</option>
                            <option>11  Tamanrasset</option>
                            <option>12  Tébessa</option>
                            <option>13  Tlemcen</option>
                            <option>14  Tiaret</option>
                            <option>15  Tizi Ouzou</option>
                            <option>16  Alger</option>
                            <option>17  Djelfa  </option>
                            <option>18  Jijel</option>
                            <option>19  Sétif</option>
                            <option>20  Saïda</option>
                            <option>21  Skikda</option>
                            <option>22  Sidi Bel Abbès</option>
                            <option>23  Annaba</option>
                            <option>24  Guelma</option>
                            <option>25  Constantine</option>
                            <option>26  Médéa</option>
                            <option>27  Mostaganem</option>
                            <option>28  M’Sila</option>
                            <option>29  Mascara</option>
                            <option>30  Ouargla</option>
                            <option>31  Oran</option>
                            <option>32  El Bayadh</option>
                            <option>33  Illizi</option>
                            <option>34  Bordj Bou Arreridj</option>
                            <option>35  Boumerdès</option>
                            <option>36  El Tarf</option>
                            <option>37  Tindouf</option>
                            <option>38  Tissemsilt</option>
                            <option>39  El Oued</option>
                            <option>40  Khenchela</option>
                            <option>41  Souk Ahras</option>
                            <option>42  Tipaza</option>
                            <option>43  Mila</option>
                            <option>44  Aïn Defla  </option>
                            <option>45  Naâma</option>
                            <option>46  Témouchent</option>
                            <option>47  Ghardaia</option>
                            <option>48  Relizane</option> 
						</select>
						<div class="invalid-feedback">
							Veuillez Choisir une wilaya.
						</div>
                    </div>


					<div class="row">
					<h5 class="my-3">
						<label for="country">Arrivé</label>
					</div>
		           	</div>


				<div class="form-group">
					<div class="form-group">
						<label for="country">Wilaya *</label>
						<select type="text" class="form-control" name="arrive">
							<option value>Choisir...</option>
							<option>01  Adrar</option>
                            <option>02  Chlef</option>
                            <option>03  Laghouat</option>
                            <option>04  Oum El Bouaghi</option>
                            <option>05  Batna</option>
                            <option>06  Béjaïa</option>
                            <option>07  Biskra</option>
                            <option>08  Béchar</option>
                            <option>09  Blida</option>
                            <option>10  Bouira</option>
                            <option>11  Tamanrasset</option>
                            <option>12  Tébessa</option>
                            <option>13  Tlemcen</option>
                            <option>14  Tiaret</option>
                            <option>15  Tizi Ouzou</option>
                            <option>16  Alger</option>
                            <option>17  Djelfa  </option>
                            <option>18  Jijel</option>
                            <option>19  Sétif</option>
                            <option>20  Saïda</option>
                            <option>21  Skikda</option>
                            <option>22  Sidi Bel Abbès</option>
                            <option>23  Annaba</option>
                            <option>24  Guelma</option>
                            <option>25  Constantine</option>
                            <option>26  Médéa</option>
                            <option>27  Mostaganem</option>
                            <option>28  M’Sila</option>
                            <option>29  Mascara</option>
                            <option>30  Ouargla</option>
                            <option>31  Oran</option>
                            <option>32  El Bayadh</option>
                            <option>33  Illizi</option>
                            <option>34  Bordj Bou Arreridj</option>
                            <option>35  Boumerdès</option>
                            <option>36  El Tarf</option>
                            <option>37  Tindouf</option>
                            <option>38  Tissemsilt</option>
                            <option>39  El Oued</option>
                            <option>40  Khenchela</option>
                            <option>41  Souk Ahras</option>
                            <option>42  Tipaza</option>
                            <option>43  Mila</option>
                            <option>44  Aïn Defla  </option>
                            <option>45  Naâma</option>
                            <option>46  Témouchent</option>
                            <option>47  Ghardaia</option>
                            <option>48  Relizane</option> 
						</select>
						<div class="invalid-feedback">
							Veuillez Choisir une wilaya.
						</div>
					</div>


                    <div class="row">
                    <h5 class="my-3">
                        <label for="country">Arrets</label>
                    </div>

                <div class="form-group">
						<label for="text" name="arrets">"Augumenter vos chances de trouver un colis en ajoutant des villes de passage !"</label>
						<div id="inputs">
                        
                </div>

                <div class="my-3">
                  <input class="form-control" type="button" value="Ajouter un champ" onclick="addField();">
			        	</div>

				<div class="row">
					<h5 class="my-3">
						<label for="country">Détour max*</label>
				</div>

				<div class="form-group">
                    <div class="form-group">
                        <select type="text" class="form-control" name="detour_max">
                            <option value>Choisir...</option>
                            <option>00 -50  km</option>
                            <option>50 -80  km</option>
                            <option>80 -100  km</option>
                            <option>100 -150  km</option>
                            <option>Plus 150  km</option>                           
                        </select>
                        <div class="invalid-feedback">
                            Veuillez Choisir un champ.
                        </div>
                    </div>

				<div class="row">
					<h5 class="my-3">
						<label for="country">Moyen de transport*</label>
				</div>

				<div class="form-group" >
						              <div class="form-check">
                             <input type="radio" class="form-check-input"  name="moy_transport" value="Avion" id="Avion" required>
                             <i class="fa fa-bus fa-1"> &#9992;&#65039;  </i>
                             <label for="Avion" class="form-check-label">Avion</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="moy_transport" value="Voiture" id="Voiture" required>
                             <i class="fa fa-bus fa-1"> &#128664;  </i>
                             <label for="Voiture" class="form-check-label">Voiture</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="moy_transport" value="Camionette/camion" id="Camionette/camion" required>
                             <i class="fa fa-bus fa-1"> &#128656;  </i>
                             <label for="Camionette/camion" class="form-check-label">Camionette/camion</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="moy_transport" value="Train" id="Train" required>
                             <i class="fa fa-bus fa-1"> &#128642;  </i>
                             <label for="Train" class="form-check-label">Train</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="moy_transport" value="Bus" id="Bus" required>
                             <i class="fa fa-bus fa-1"> &#128652;  </i>
                             <label for="Bus" class="form-check-label">Bus</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="moy_transport" value="Bâteau" id="Bâteau" required>
                             <i class="fa fa-bus fa-1"> &#128674;  </i>
                             <label for="Bâteau" class="form-check-label">Bâteau</label>
                          </div>

				</div>

			<div class="row">
					<h5 class="my-3">
						<label for="country">Taille de colis*</label>
			</div>

			<div class="row">
					<div class="col-md-4 form-group">

						<i class="fa fa-bus fa-1"> &#9993;&#65039;</i>

						<label for="country">Petit</label>

					  <div class="form-check">
					        <input type="checkbox" class="form-check-input" name="taille_max" value="Petit" id="Petit"> 
						           Téléphone, clés...
					        <label for="shipping-adress" class="form-check-label"></label>
			     	  </div>
			     	</div>
			 
			        <div class="col-md-4 form-group">
			        	<i class="fa fa-bus fa-1"> &#128187;</i>
                    <label for="country">Moyen</label>
					<div class="form-check">
					        <input type="checkbox" class="form-check-input" name="taille_max" value="Moyen" id="Moyen"> 
						           Ordinateur, livres, vêtements...
					        <label for="shipping-adress" class="form-check-label"></label>
			     	</div>
			     	</div>

			</div>	



      <div class="row" >
					<div class="col-md-4 form-group">

						<i class="fa fa-bus fa-1"> &#128452;&#65039;  </i>

						<label for="country">Grand</label>

					  <div class="form-check">
					        <input type="checkbox" class="form-check-input" name="taille_max" value="Grand" id="Grand"> 
						           Commode, chaise, lit bébé...
					        <label for="shipping-adress" class="form-check-label"></label>
			     	  </div>
			     	</div>
			 
			        <div class="col-md-4 form-group">
			        	<i class="fa fa-bus fa-1"> &#128230;  </i>
                    <label for="country">Trés Grand</label>
					<div class="form-check">
					        <input type="checkbox" class="form-check-input" name="taille_max" value="Tres Grand" id="Tres Grand"> 
						           Plusieurs cartons, matelas, canapé...
					        <label for="shipping-adress" class="form-check-label"></label>
			     	</div>
			     	</div>

			</div>

			<div class="row">
					<h5 class="my-3">
						<label for="country">Poids</label>
			</div>	

            <div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">(kg)</span>
							</div>	
							<input type="text" class="form-control" name="poids" placeholder="Poids max que vous pouvez transporté" required>
							<div class="invalid-feedback">
								Veuillez entrez le poids.
							</div>
						</div>

			<div class="row">
					<h5 class="my-3">
					<label for="country">Fréquences*</label>
			</div>

            <label for="text">Voyagez vous régulièrement ?*</label>

            <hr>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="freq" value="non">
                             <label for="non" class="form-check-label" required>Non je fais pas des voyages réguliers</label>
                          </div>

            <hr>

            <div class="col-md-6 form-group">
                        <label for="dateofbirth">Départ*</label>
                        <input type="date" id="date_depart" name="date_depart" class="form-control" maxlength="10" >
                        <span class="input-group-addon"><span class="fa fa-calendar" style="cursor:pointer" id="date_depart" name="date_depart" required ></span>
                        </span>
                        <span class="fa fa-calendar" style="cursor:pointer" id="date_depart" name="date_depart" required></span>
            
                        <div class="invalid-feedback">
                            Veuillez Choisir une date.
                        </div>
            </div>


            <div class="col-md-6 form-group">
                        <label for="dateofbirth">Retour (optionnel)</label>
                        <input type="date" id="date_retour" name="date_retour" class="form-control" maxlength="10" >
                        <span class="input-group-addon" id="date_retour" name="date_retour" required>
                        <span class="fa fa-calendar" style="cursor:pointer" id="date_retour" name="date_retour" required></span></span>
                        <span class="fa fa-calendar" style="cursor:pointer" id="date_retour" name="date_retour" required></span>
            
                        <div class="invalid-feedback">
                            Veuillez Choisir une date.
                        </div>
            </div>
             

           <hr>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="freq" value="oui">
                             <label for="oui" class="form-check-label">Oui je voyage régulièrement</label>
                          </div>

             <hr><p>Départ*</p>

             <div class="my-3">

             <div class="col-md-6 form-group">
                        <input type="date" id="jour" name="jour" class="form-control" maxlength="10" >
                        <span class="input-group-addon" id="jour" name="jour"><span class="fa fa-calendar" style="cursor:pointer" id="jour" name="jour"></span></span>
                        <span class="fa fa-calendar" style="cursor:pointer" id="jour" name="jour" required></span>
            
                        <div class="invalid-feedback">
                            Veuillez Choisir une date.
                        </div>
            </div>

            </div>
             

             <div class="my-3">

             <label for="dateofbirth">Fréquence de voyage*</label>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="frequence" value="1 fois par semaine" id="1 fois par semaine" required>
                             <label for="Voiture" class="form-check-label">1 fois par semaine</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="frequence" value="2 fois par semaine" id="2 fois par semaine" required>
                             <label for="Camionette/camion" class="form-check-label">2 fois par semaine</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="frequence" value="3 fois par semaine" id="3 fois par semaine" required>
                             <label for="Train" class="form-check-label">3 fois par semaine</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="frequence" value="4 fois par semaine" id="4 fois par semaine" required>
                             <label for="Bus" class="form-check-label">4 fois par semaine</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="frequence" value="5 fois par semaine" id="5 fois par semaine" required>
                             <label for="Bâteau" class="form-check-label">5 fois par semaine</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="frequence" value="6 fois par semaine" id="6 fois par semaine" required>
                             <label for="Voiture" class="form-check-label">6 fois par semaine</label>
                          </div>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="frequence" value="7 fois par semaine" id="7 fois par semaine" required>
                             <label for="Camionette/camion" class="form-check-label">7 fois par semaine</label>
                          </div>

                        <div class="invalid-feedback">
                            Veuillez Choisir un champ.
                        </div>

             </div>

           </div>

           


      		<div class="form-group">			
			     <button class="btn btn-primary bt-lg btn-block" type="submit" name="envoyer">Continue</button>
          </div>

		    </form>
		</div>

</body>
</html>