<?php session_start(); 
if(!isset($_SESSION['nom'])) { $_SESSION['nom']=""; }; ?>


<!DOCTYPE html>
<html>
<head>
    
    <title>Formulaire Colis</title>
   
    <!-- CSS -->
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.4.3.1.css" type="text/css">


    <!-- font awesome css -->

    <link rel="stylesheet" href="css/all.css" type="text/css">

    <link rel="stylesheet" href="css/style.css?version=5" type="text/css">
    <!--Js file -->
    <!-- bootstrap js -->
    <script src="js/bootstrap.min.4.3.1.js" type="text/javascript"></script>
  

    <!-- jquery -->
    <script src="js/jquery.min.3.1.0.js" type="text/javascript"></script>


    <!-- tether.js -->
    <script src="js/tether.js" type="text/javascript"></script>

    <!-- datepicker -->
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/jquery-ui.css" type="text/css">
    

    <title></title>
</head>
<body>

    <div class="header"><!--Baniere-->
    <div class="container">
        <a href="index.php" class="logo"><img src="images/logo.png" style="width: 90px;" alt="colis.dz" /></a>
        <div class="nav">
            <ul>
                <li class="cx"><a href="index.php">accueil</a></li>
                
               </ul>
        </div>
    </div>
    </div>

<div id="non_conn" style="display: none; text-align: center;">
    <h2 style="margin-top: 50px;">Erreur: Vous devez être connecté <br> pour pouvoir déposer une annonce!</h2>
    <h2 style="font-size: 18px; color: #323232; margin-top: 50px;">Vous allez être redirigé vers la page d'accueil de colis.dz <br>dans 10 secondes</h2>
</div>

<div id="formulaire" style="display: none;">
    <div class="col-md-4 container  ">
            
            <h4 class="my-4 text-center align-text-bottom " >
                Annonce Colis <i class="fas fa-box"></i>
            </h4>
            <form method="post" action="colis.php" enctype="multipart/form-data" >
                <hr>
                <h4 class="mb-4">Caractéristiques de colis </h4>
            
                <div class="form-row">
                    <div class="col-md-12 form-group">
                        <label for="N_colis">Nom Colis</label>
                        <input type="text" class="form-control" id="N_colis" name="N_colis" placeholder="veuillez écrire le nom de colis" required>
                        <div class="invalid-feedback">
                            Nom de colis requis
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col form-group ">
                        <label for="poid">Poid</label>
                        <select type="text" class="form-control text-center" name="poid_colis" id="poid" required>
                            <option value="0">Choisir </option>
                            <option value="1"> 0 à 5 KG </option>
                            <option value="2"> 6 à 15 KG </option>
                            <option value="3"> 16 à 30 KG </option>
                            <option value="4"> 31+ KG </option>
                        </select>
                        <div class="invalid-feedback">
                            veuillez sélectionner le poid
                        </div>
                    </div>

                    <div class="col form-group">
                        <label for="Taille">Taille</label>
                        <select type="text" class="form-control" name="taille_colis" id="Taille" required>
                            <option value="0">Choisir </option>
                            <option value="1"> Petit </option>
                            <option value="2"> Moyen </option>
                            <option value="3"> Grand </option>
                            <option value="4"> Très Grand</option>
                        </select>
                        <div class="invalid-feedback">
                            veuillez sélectionner la taille 
                        </div>
                    </div>
                </div>


                <hr class="mb-4">
                <div class="row">

                    <div class="custom-control  custom-switch ml-3 mb-2">
                        <input type="checkbox" class="custom-control-input " id="d_s" name="demande_special" >
                        <label for="d_s" class="custom-control-label" >Demande Speical</label>
                    </div>
                </div>

                <div class=" mb-2">
                    <textarea class="form-control" name="text_demande" rows="5" id="comment" placeholder="Ecrire votre demande"></textarea>
                </div>

                <hr class="mb-4">

                <h4 class="mb-4">Date de départ et d'arrivé  </h4>
                <div class="row">
                    <div class="col">
                        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="date de depart" />
                    </div>
                    <div class="col">
                        <input type="text" name="to_date" id="to_date" class="form-control" placeholder="date d'arrivé" />
                    </div>
                </div>

                <br>




                <hr class="mb-4">

                <h4 class="mb-4">L'adresse de départ et d'arrivé  </h4>
                <div class="row">
                    <div class="col form-group ">
                        <label for="willaya_d">Willaya de départ</label>
                        <select type="text" class="form-control text-center" name="willaya_d" id="willaya_d">
                            <option value="0">Choisir</option>
                            <option value="Alger" >Alger</option>
                            <option value="Tlemcen" >Tlemcen</option>
                        </select>
                        <div class="invalid-feedback">
                            veuillez sélectionner la willaya
                        </div>
                    </div>

                    <div class="col form-group ">
                        <label for="willaya_a">Willaya d'arrivé</label>
                        <select type="text" class="form-control text-center" name="willaya_a" id="willaya_a">
                            <option value="0">Choisir</option>
                            <option value="Alger">Alger</option>
                            <option value="Tlemcen">Tlemcen</option>
                        </select>
                        <div class="invalid-feedback">
                            veuillez sélectionner la willaya
                        </div>
                    </div>
                </div>

                    <div>
                        <label for="adress"> Adresse exacte de départ </label>
                        <input type="text" class="form-control" name="@_d" id="adress" placeholder="" required>
                    </div>

                    <br>

                    <div >
                        <label for="adress"> Adresse exacte d'arrivé </label>
                        <input type="text" name="@_a" class="form-control" id="adress" placeholder="" required>
                    </div>
                     <hr class="mb-4">

                    <div class="row">
                        <div class="col">
                            <h4>Photo de colis </h4>
                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-success">
                                        Importez une photo&hellip; <input type="file" name="photo_colis" style="display: none;" multiple>
                                    </span>
                                </label>
                                <input type="text" name="titre_photo"  class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                    <hr class="mb-4">
                    <div class=" d-flex justify-content-center ">
                        <div class="col-8  ">
                            <button class="btn btn-primary btn-block mb-4" name="submit_colis" type="submit" >Continuer</button>
                        </div>
                    </div>
<!--                <hr class="mb-4">-->
<!---->
<!--                <button class="btn btn-primary bt-md btn-block" type="submit" name="submit_colis">Continue</button>-->
<!--                <hr>-->
<!--                <hr>-->

            </form>
        </div>

        </div>
    <script type="text/javascript">
        $(function() {

            // We can attach the `fileselect` event to all file inputs on the page
            $(document).on('change', ':file', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

            // We can watch for our custom `fileselect` event like this
            $(document).ready( function() {
                $(':file').on('fileselect', function(event, numFiles, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }

                });
            });

        });
        $(document).ready(function(){
            $.datepicker.setDefaults({
                dateFormat: 'yy-mm-dd'
            });
            $(function(){
                $("#from_date").datepicker();
                $("#to_date").datepicker();
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){   
        var nom="<?php echo $_SESSION['nom'] ?>";
        var clone=$("#formulaire").clone();
        $("#formulaire").remove();
        $("#non_conn").fadeIn(0);
        var redir=setTimeout(function(){ window.location.href="index.php"; }, 10000);
        if (nom!="") {
            clearTimeout(redir);
            $("#non_conn").remove();
            $("body").append(clone);
            $("#formulaire").fadeIn(0);
        }
        });
    </script>


</body>
</html>
