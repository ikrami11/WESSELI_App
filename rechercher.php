<!DOCTYPE html>
<html>
<head>
    <title>Recherche</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/rechercher.css">
    <link rel="stylesheet" href="form_trajet_css.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">

<?php
if(isset($_POST['redirection'])){
  header('Location: form_trajet.php');
  }
?>

</head>

<body> 

    <form action="rechercher.php" method="POST">

      <div class="container">
       <div class="text-center">
           <h1 class="h1">Chercher un trajet!</h1>
           <label for="country">Wilaya de depart</label>
                <select type="text" id="depart" class="to-search" name="depart">
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


                        <label for="country">Wilaya d'arrive</label>
                        <select type="text" id="arrive" class="to-search" name="arrive">
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

                   <div class="margin">
                           <input type="submit" class="btn btn-default" name="rechercher" id="rechercher" value="rechercher">
                           <input type="submit" class="btn btn-default" name="redirection" id="redirection" value="redirection">                    
                       </div>
       </div>
             <div class="res" id="results">Votre resultat vont apparaitre ici.</div>

<?php
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=projet2cp;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

         $depart = $_POST['depart'];
         $arrive = $_POST['arrive'];

if(isset($_POST['rechercher'])){

$reponse = $bdd->query('SELECT * FROM trajet ORDER BY date_annonce DESC');

while ($donnees = $reponse->fetch())
{ if ($donnees['lieux_depart'] == $depart && $donnees['lieux_arrive'] == $arrive) {

?>
    <p><strong>Trajet trouve :</strong> :<br />
                 depart : <?php echo $donnees['lieux_depart']; ?><br />
                 arrive : <?php echo $donnees['lieux_arrive']; ?><br /> 
                 publie le : <?php echo $donnees['date_annonce']; ?><br />
                 Son detour max est : <?php echo $donnees['detour_max']; ?><br />
                 le moyen de transport est : <?php echo $donnees['moyen']; ?><br />
                 le taille max peut etre transporte est : <?php echo $donnees['taille_max']; ?><br />
                 le poids max peut etre transporte est : <?php echo $donnees['poids_max']; ?><br />

    </p>
<?php
}
} 
$reponse->closeCursor(); 
} 
?>
      </div>

  </form>

</body>
</html>  