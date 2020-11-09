<!DOCTYPE html>
<html>
<head>
	<title>Modifier Votre Trajet</title>
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

</head>

<body>

    <?php
        session_start();
        require "php/dbh.inc.php";
        
        $ligne=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM trajet WHERE id_trajet=".$_GET['id']." limit 1"));
        if ($ligne['id_compte']!==$_SESSION['id_compte']) {
          //erreur
        }
        
    ?>

		<div class="col-md-4 container bg-default">
			
			<h3 class="my-4">
					Modifier Votre Trajet
			</h3>

			<form method="POST" action='php/modif_tr.php'>

			<div class="row">
					<h5 class="my-3">
						<label for="country">Départ</label>
					</h5>
			</div>
				<div class="form-group">
					<div class="form-group">
						<label for="country">Wilaya *</label>
						<?php
                        echo '<select type="text" class="form-control" name="depart" >
							<option>'.$ligne['lieux_depart'].'</option>
                            <option disabled="true"></option>          
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
						</select>';
                        ?>
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
						
                        <?php
                        echo '<select type="text" class="form-control" name="arrive" >
							<option>'.$ligne['lieux_arrive'].'</option>
                            <option disabled="true"></option> 
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
						</select>';?>
						<div class="invalid-feedback">
							Veuillez Choisir une wilaya.
						</div>
					</div>

                    


                    <div class="row">
                    <h5 class="my-3">
                        <label for="country">Arrêts</label>
                    </div>



                <div class="form-group">
						<label for="text" name="arrets">"Augumenter vos chances de trouver un colis en ajoutant des villes de passage !"</label>
						<div id="inputs">
                       <?php
                            $arrets=mysqli_query($conn,"SELECT * FROM arrets WHERE id_trajet=".$ligne['id_trajet']);
                            while ($arret=mysqli_fetch_array($arrets)) {
                                echo '<div>
                                            <input type="text" class="form-control" name="arret" value="'.$arret['arret'].'"> 
                                        </div>';
                        }
                    ?> 

                   
                </div>

                <div class="my-3">
                  <input class="form-control" type="button" value="Ajouter un arrêt" onclick="addField();">
			        	</div>

				<div class="row">
					<h5 class="my-3">
						<label for="country">Détour max*</label>
				</div>

				<div class="form-group">
                    <div class="form-group">
                        <?php 
                        echo '<select type="text" class="form-control" name="detour_max">
                        <option>'.$ligne['detour_max'].'</option>
                            <option disabled="true"></option> 
                            <option>00 -50  km</option>
                            <option>50 -80  km</option>
                            <option>80 -100  km</option>
                            <option>100 -150  km</option>
                            <option>Plus 150  km</option>                           
                        </select>';?>
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
                             <input type="radio" class="form-check-input"  name="moy_transport" value="Bâteau" id="Bateau" required>
                             <i class="fa fa-bus fa-1"> &#128674;  </i>
                             <label for="Bâteau" class="form-check-label">Bâteau</label>
                          </div>

				</div>

                <script type="text/javascript">
                    var moyen="<?php echo $ligne['moyen'] ?>";
                    if (moyen=="Avion") document.getElementById("Avion").checked=true;
                    if (moyen=="Voiture") document.getElementById("Voiture").checked=true;
                    if (moyen=="Camionette/camion") document.getElementById("Camionette/camion").checked=true;
                    if (moyen=="Train") document.getElementById("Train").checked=true;
                    if (moyen=="Bus") document.getElementById("Bus").checked=true;
                    if (moyen=="Bateau") document.getElementById("Bateau").checked=true;
                </script>

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
					        <input type="checkbox" class="form-check-input" name="taille_max" value="Tres Grand" id="Tres_Grand"> 
						           Plusieurs cartons, matelas, canapé...
					        <label for="shipping-adress" class="form-check-label"></label>
			     	</div>
			     	</div>

			</div>

            <script type="text/javascript">
                    var taille="<?php echo $ligne['taille_max'] ?>";
                    if ((taille=="Petit")||(taille=="Moyen")||(taille=="Grand")||(taille=="Tres_Grand")) document.getElementById("Petit").checked=true;
                    if ((taille=="Moyen")||(taille=="Grand")||(taille=="Tres_Grand")) document.getElementById("Moyen").checked=true;
                    if ((taille=="Grand")||(taille=="Tres_Grand")) document.getElementById("Grand").checked=true;
                    if (taille=="Tres_Grand") document.getElementById("Tres_Grand").checked=true;
                </script>

			<div class="row">
					<h5 class="my-3">
						<label for="country">Poids Max</label>
			</div>	

            <div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">(kg)</span>
							</div>	
							<input type="text" class="form-control" name="poids" value="<?php echo $ligne['poids_max'] ?>" required>
							<div class="invalid-feedback">
								Veuillez entrez le poids.
							</div>
						</div>

			<div class="row">
					<h5 class="my-3">
					<label for="country"><br>Régularité du trajet</label>
			</div>

            

            <?php
                $result=mysqli_query($conn,"SELECT * FROM trajets_reguliers WHERE id_trajet=".$ligne['id_trajet']);
                if (mysqli_num_rows($result)!=0) {
                    $reg=mysqli_fetch_array($result);
                } else {
                    $nonreg=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM trajets_non_reguliers WHERE id_trajet=".$ligne['id_trajet']));
                }
             ?>

            <label for="text">Voyagez vous régulièrement ?*</label>

            <hr>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="freq" value="non" id="non_reg">
                             <label for="non" class="form-check-label" required>Non je fais pas des voyages réguliers</label>
                          </div>

            <hr>

            <div class="col-md-6 form-group">
                        <label for="dateofbirth">Départ*</label>
                        <input type="date" id="date_d" name="date_depart" class="form-control" maxlength="10" value="<?php echo $nonreg['date_depart'] ?>">
                        <span class="input-group-addon"><span class="fa fa-calendar" style="cursor:pointer"  required ></span>
                        </span>
                        <span class="fa fa-calendar" style="cursor:pointer" required></span>
            
                        <div class="invalid-feedback">
                            Veuillez Choisir une date.
                        </div>
            </div>


            <div class="col-md-6 form-group">
                        <label for="dateofbirth">Retour (optionnel)</label>
                        <input type="date" id="date_r" name="date_retour" class="form-control" maxlength="10" value="<?php echo $nonreg['date_retour'] ?>">
                        <span class="input-group-addon"   required>
                        <span class="fa fa-calendar" style="cursor:pointer"  required></span></span>
                        <span class="fa fa-calendar" style="cursor:pointer" required></span>
            
                        <div class="invalid-feedback">
                            Veuillez Choisir une date.
                        </div>
            </div>
             

           <hr>

                          <div class="form-check">
                             <input type="radio" class="form-check-input"  name="freq" value="oui" id="regul">
                             <label for="oui" class="form-check-label">Oui je voyage régulièrement</label>
                          </div>

             <hr><p>Départ*</p>

             <div class="my-3">

             <div class="col-md-6 form-group">
                        <input type="date" id="jour_r" name="jour" class="form-control" maxlength="10" value="<?php echo $reg['jour'] ?>">
                        <span class="input-group-addon" name="jour"><span class="fa fa-calendar" style="cursor:pointer"  name="jour"></span></span>
                        <span class="fa fa-calendar" style="cursor:pointer"  name="jour" required></span>
            
                        <div class="invalid-feedback">
                            Veuillez Choisir une date.
                        </div>
            </div>

            </div>
             

             <div class="my-3">

             <label for="dateofbirth">Fréquence de voyage*</label>

                        <?php 
                        echo '<select type="text" class="form-control" name="frequence">
                        <option id="freqq">'.$reg['frequence'].'</option>
                            <option disabled="true"></option> 
                            <option>Une à deux fois </option>
                            <option>Trois à quatres fois</option>
                            <option>Plus de cinq fois</option>                           
                        </select>';
                        ?>
                        <div class="invalid-feedback">
                            Veuillez Choisir une frequence.
                        </div>

             </div>

             
             <?php
                if (mysqli_num_rows($result)!=0) {
                    echo '<script type="text/javascript">
                        document.getElementById("regul").checked=true;
                    </script>';
                } else {
                    echo '<script type="text/javascript">
                        document.getElementById("non_reg").checked=true;
                    </script>';
                }
             ?>

             

           </div>

           



      		<div class="form-group">			
			     <button class="btn btn-primary bt-lg btn-block" type="submit" name="envoyer">Continue</button>

          </div>

		    </form>
		</div>

</body>
</html>