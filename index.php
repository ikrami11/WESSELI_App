<!DOCTYPE html>
<html>
<head>	
    <!--CSS Principal--><link rel="stylesheet" href="css/style.css?version=5" type="text/css">
    <!--CSS Slider--><link rel="stylesheet" href="css/layerslider.css" type="text/css">
    <!--JS-->
    <!--Bib JQuery-->
    <!--Bib GreenSock--><script src="js/greensock.js" type="text/javascript"></script>
    <!--Transitions Slider--><script src="js/layerslider.transitions.js" type="text/javascript"></script>
                             <script src="js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>  
                               <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.js"type="text/javascript"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
  <script src="js/monJquery5.js?version=3" type="text/javascript"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

    <!--JS-->
    <!--Bib JQuery--><script src="js/jquery.min.js" type="text/javascript"></script>
    <!--Bib GreenSock--><script src="js/greensock.js" type="text/javascript"></script>
    <!--Transitions Slider--><script src="js/layerslider.transitions.js" type="text/javascript"></script>
                             <script src="js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script>                           
    <title>Colis.dz - Accueil</title>
    <?php session_start(); ?>

<style type="text/css">


        .notification-ul
        {
            background-color:white;
            width:520px;
            color:black;
            text-align: center;
            border: 1px solid #b3cccc;
            border-radius: 5px ;
            position: absolute;
            left: -150px;
            top:60px;
            max-height: 480px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
        .notification-li:hover
        {
            background-color:#00ace6;
            color:white;
            text-align: center;
            width:100%;
            padding-bottom: 5px;
            padding-top: 5px;
            border-bottom: 1px solid #b3cccc;
            transition: 1s;
        }
        .notification-li 
        {
            background-color:white;
            color:black;
            text-align: center;
            width:100%;
            padding-bottom: 4px;
            padding-top: 4px;
            border-bottom: 1px solid #b3cccc;
            transition: 1s;
        }
        .notif-button:hover
        {
            background-color:white;
            
        }
        .notif-button
        {
              cursor: pointer;
           display: inline-block;
             background-color:transparent;
            color: inherit;
            margin: 5px;


        }
        ::-webkit-scrollbar {
            width: 8px; 
            }

            ::-webkit-scrollbar-track {
                background-color: #e0ebeb;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb {
                border-radius: 10px;
                background-color: #a3c2c2;
            }

        #nonotif
        {
            cursor: alias;
        }
        #xx ,#xa
        {
            position: fixed;
            top:150px;
            height: 80%;
            background-image: linear-gradient(to bottom, #e4efff, #edf2ff, #f4f6ff, #fafaff, #ffffff);
            border: 1px solid #80ccff;
            border-radius: 10px;
            font-family: "Times New Roman", Times, serif;
            font-size: 20px; 
          display: none;
           z-index: 5;
        }


        #xz{
            position: fixed;
            top:150px;
            height: 40%;
            background-image: linear-gradient(to bottom, #e4efff, #edf2ff, #f4f6ff, #fafaff, #ffffff);
            border: 1px solid #80ccff;
            border-radius: 10px;
            font-family: "Times New Roman", Times, serif;
            font-size: 20px; 
          display: none;
        }
        #xy
        {
            position: fixed;
            top:150px;
            height: 80%;
            background-image: linear-gradient(to bottom, #e4efff, #edf2ff, #f4f6ff, #fafaff, #ffffff);
            border: 1px solid #80ccff;
            border-radius: 10px;
            font-family: "Times New Roman", Times, serif;
            font-size: 20px; 
          display: none;
        }
        .checked
        {
            color: orange;
        }
        .ho
        {
            color: yellow;
        }

        .notif_champs
        {
            margin-left: 10px;
            display: inline-block;
        }
        .notif_div
        {
            margin-bottom: 10px;
            margin-top: 10px;
        }
        #h_trajet
        {
            text-align: center;
            margin: 20px;
        }
        #h_colis
        {
            text-align: center;
            margin: 20px;
        }

        .btn_notif_refuser
        {
             background-color: white;
            border:1px solid #b3cccc;
            border-radius: 5px;
            padding: 12px;
            padding-right: 25px;
            padding-left: 25px;
            transition: 1s;

             margin-top: 20px;
            font-size: 18px;
            font-family: "Times New Roman", Times, serif;
        }
        .btn_notif_refuser:hover{background-color: #ffb3b3;}

        .btn_notif_accepter
        {
            background-color: #00ace6;
                        border:1px solid #b3cccc;
                        margin-top: 20px;
            border-radius: 5px;
                        padding: 12px;
            padding-right: 25px;
            padding-left: 25px;
            transition: 1s;
            font-size: 18px;
            font-family: "Times New Roman", Times, serif;
        }
        .btn_notif_accepter:hover{background-color: #99e6ff;}

        #notif_1,#notif_2
        {
            color: white;
        }
        #notif_1 ,#notif_2
        {
            cursor: pointer;
            font-size: 30px;
            width: 150px;
            font-family: font-family: "Times New Roman", Times, serif;
            border-bottom: 1px solid black;
            padding: 5px;
        }

        #down
{
    font-size: 15px;
      background-color:#00ace6;
  border: none;
  color: white;
  padding: 10px 11px;
  cursor: pointer;
  border-radius: 8px;
    -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  position: relative;
  left: 30px;

 
}
.error_premium
{
    color: red;
    font-size: 15px;
    font-family: "Raleway";
    position: relative;
   
    bottom: 13px;
}
        #premium_inc:hover ,#remove:hover
        {
            background-color: #ff1a1a;
            color: white; 
        }
        .y/*les champs nom ....*/
{ 
    margin-bottom: 15px;
     margin-top: 15px;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
#down:hover{background-color: #4dd2ff;}
.down{margin-top:  15px;margin-bottom: 15px;}

#img-upload1 #img-upload2 #img-upload3{
    width: 100%;
}
#label_down {
     
     font-size: 18px;
     padding-left: 10px;
     padding-right: 10px;
     margin-left: 30px;
     font-style: italic;
} 
.hover 
{
    color: yellow;
} 
.click
{
    color: red;
}
.label_note
{
    color: #4dd2ff;
    cursor: pointer;
}
.label_note:hover
{
    cursor: pointer;
    color: #99e6ff;
}

</style>
<script type="text/javascript">
    $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload1').attr('src', e.target.result);
                    $('#img-upload1').attr('style'," max-height:585px; max-width :374px;", e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#img_profile").change(function(){
            readURL(this);
        });     
    });
        $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {
            
            var input = $(this).parents('.input-group').find(':text'),
                log = label;
            
            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#img-upload2').attr('src', e.target.result);
                    $('#img-upload2').attr('style'," max-height:585px; max-width :374px;", e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#img_carte").change(function(){
            readURL(this);
        });     
    });


</script>
</head>

<body>
    
    <div id="xs">
    <div class="header"><!--Baniere-->
    <div class="container">
        <a href="index.php" class="logo"><img src="images/logo.png" style="width: 90px;" alt="colis.dz" /></a>
        <div class="nav">
            <ul>
                <li><a href="index.php">accueil</a></li>
                <li><a href="#annonces">voir annonces</a></li>
                <li><a href="#aid">aide</a></li>
                <li><a href="#propo">à propos</a></li>
                <li><a href="#contct">contact</a></li>
                <li class="cx"><a href="inscription.php" id="inc">inscription</a></li>
                <li class="cx"><a href="#top" id="conx">connexion</a></li>
                <li id="dcx" class="apr_cx" style="display:none; margin-top: 10px;"><a href="php/logout.php" id="decon">Se déconnecter</a></li>
            </ul>
        </div>
    </div>
    </div>

    <div class="cnx" style="z-index: 11;"><!--Connexion-->
        <h2 class="l3" style="color: black; padding-top: 40px;">Connexion</h2> 
        <form method="post" class="connex" action="php/login.php">
            <p id="eml" style="color: red; font-size: 12px; margin-left: 25px; display: none;">Veuillez vérifier votre e-mail!</p>
            <input type="email" name="email" placeholder="E-mail" id="mail" required />
            <p id="mdp" style="color: red; font-size: 12px; margin-left: 25px; display: none;">Veuillez vérifier votre mot de passe!</p>
            <input type="password" name="password" placeholder="Mot de passe" required />
            <input type="submit" id="sct" value="Se connecter" />
        </form>
        <br>
        <p id="msg_psd"></p>
        <div><p class="insc">Vous n'avez pas de compte? <a href="inscription.php"><strong>Inscrivez-vous</strong></a></p></div>
    </div>
    <div class="arrow"></div>

    <div class="slider_main"><!--Slider-->
    <div id="full-slider-wrapper">
    <div id="layerslider" style="width:100%;height:473px;">
        <!--Slide 1-->
        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
            <img src="images/slider/slide-bg.jpg" class="ls-bg" alt="Slide background"/>
            
            <div class="ls-l videopreview" style="top:87px;left:0px;white-space: nowrap;" data-ls="offsetxin:-200;durationin:2000;offsetxout:-200;">
            <img src="images/player.png" alt="" />
            </div>
                                
            <div class="ls-l" style="top:120px;left:638px;white-space: nowrap;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <h2 class="l1" id="t1">Transportation des colis <br> entre particuliers</h2>
            </div>
                                
            <div class="ls-l" id="dpart" style="top:240px;left:770px;white-space: nowrap;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <h2 class="l2" id="part">PARTOUT EN ALGERIE!</h2>
            </div>
                                
            <div class="ls-l"  style="top:305px;left:620px;white-space: nowrap;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <h2 class="l3" id="quest">Vous voulez déposer une annonce?</h2>
            </div>                      
                                
            <div class="ls-l" id="dconx2" style="top:320px;left:1020px;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <a href="#" class="boutton1" id="conx2">Connectez-vous</a>
            </div>

            <div class="ls-l" id="dtra" style="top:360px;left:800px;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <a href="form_trajet.php" class="boutton1" id="depotra" style="display: none;">J'ai un trajet</a>
            </div>

        </div>
        <!--Slide 2-->
        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
            <img src="images/slider/slide-bg.jpg" class="ls-bg" alt="Slide background"/>

            <div class="ls-l" style="top:30px;left:300px;white-space: nowrap;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <h2 class="l1">Découvrez nos services</h2>
            </div>
            
            <img src="images/services.png" alt="" class="ls-l videopreview" style="height: 300px;top:100px;left:230px;white-space: nowrap;" data-ls="offsetxin:-200;durationin:2000;offsetxout:-200;"/>
        </div>
        <!--Slide 3-->
        <div class="ls-slide" data-ls="transition2d:1;timeshift:-1000;">
            <img src="images/slider/slide-bg.jpg" class="ls-bg" alt="Slide background"/>

            <div class="ls-l" style="top:50px;left:200px;white-space: nowrap;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <h2 class="l2">Obtenez plus de services exclusivement dans notre offre</h2>
            </div>
                                
            <div class="ls-l" style="top:100px;left:320px;white-space: nowrap;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <h2 class="l1" style="font-size:100px;">PREMIUM</h2>
            </div>
            
            <div class="ls-l" style="top:260px;left:450px;white-space: nowrap;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <h2 class="l3">Priorité, ...etc</h2>
            </div>

            <div class="ls-l" style="top:320px;left:480px;" data-ls="offsetxin:0;delayin:1000;easingin:easeInOutQuart;scalexin:0.7;scaleyin:0.7;offsetxout:-800;durationout:1000;">
            <a href="#prem" class="boutton1">En savoir plus</a>
            </div>
        </div>
    </div>
    </div> 
    </div>

    <div class="aide"><!--Comment ca marche?-->
    <div id="aid"></div>
    <br><br>
    <div class="container">
        <div class="gauche">
        <img src="images/t1.png" alt=""/>
        </div>
        <div class="droite">
            <h2><strong>Comment ça marche?</strong></h2>
            <h3>En tant qu'envoyeur de colis</h3>
            <p> Après avoir connecter à votre compte, vous aurez la possibilité de déposer votre annonce colis.</p>
            <p> Vous devez remplir un formulaire contenant toutes les informations nécessaire sur votre colis (lieu du depart, lieu d'arrivée, date d'envoie, poids, dimensions... etc.) </p>
            <p> Nous allons vous proposer quelques annonces trajets qui vous conviendront.</p>
            <p> Si vous choisissez un trajet parmis ceux proposés, une notification arrivera à votre eventuel transporteur pour qu'il puisse accepter votre demande.</p>
            <p> Sinon, vous pouvez attendre qu'un transporteur voit votre annonce sur notre site et vous demande de transporter votre colis, que vous pouvez accepter dans la notification que vous arrivera.</p><br>
            <h3>En tant que transporteur</h3>
            <p> Après avoir connecter à votre compte, vous aurez la possibilité de déposer votre annonce trajet.</p>
            <p> Vous devez remplir un formulaire contenant toutes les informations nécessaire sur votre trajet (lieu du départ, lieu d'arrivée, date du départ, arrêts... etc.)</p>
            <p> Dès que votre annonce est déposée, vous pouvez choisir parmis les annonces colis déposées dans le site, et une notification arrivera à votre client pour qu'il puisse accepter votre demande.</p>
            <p> De même, les autres peuvent voir votre annonce et vous demander de leur envoyer des colis, que vous pouvez accepter dans la notification que vous arrivera.</p>
        </div>  
    </div>
    </div>

    <div class="aide propos"><!--A propos-->
    <div id="propo"></div>
    <div class="container">
        <div class="gauche">
            <h2><strong>A propos</strong></h2>
            
            </div>
        </div>
        <div class="droite">
        <img src="images/t2.png" alt=""/>
        </div>          
    </div>
    

    <div class="table" id="comp"><!--Table comparaison simple/premium-->
    <div id="prem"></div>
    <div class="container">
            <h2><strong>Découvrez notre offre Premium</strong></h2><br><br><br>
            <div class="inter">
            <div class="block">
                <div class="entete">
                    <h2>Simple</h2>
                </div>
                <ul>
                    
                    <li id="inc1"><a href="#" class="boutton2">INSCRIRE</a></li>
                </ul>
                </div>
                    
                <div class="block">
                <div class="entete">
                    <h2>Premium</h2>
                </div>
                <ul>
                    
                    <li ><a id="inc2"  class="boutton2 boutton3">INSCRIRE</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $contact = include "contact.txt";
        $tel=$contact[0];
        $_mail=$contact[1];
        $fb=$contact[2];
        $twt=$contact[3];
        $ig=$contact[4];
        $snap=$contact[5];
    ?>
    

    <div class="contact"><!--Contact-->
    <div id="contct"></div>
    <div class="container">
        <h2><strong>Contactez-nous</strong></h2><br><br><br>
       
            <img src="images/icons/telephone.png" alt="Numero Tel.:"><span><?php echo $tel ?></span><br><br>
            <img src="images/icons/email.png" alt="E-mail:"><span><?php echo $_mail ?></span><br><br>
            <img src="images/icons/facebook.png" alt="Facebook:"><span><?php echo $fb ?></span><br><br>
            <img src="images/icons/twitter.png" alt="Twitter:"><span><?php echo $twt ?></span><br><br>
            <img src="images/icons/instagram.png" alt="Instagram:"><span><?php echo $ig ?></span><br><br>
            <img src="images/icons/snapchat.png" alt="Snapchat:"><span><?php echo $snap ?></span>
    </div>
    </div>
</div>

    <div id="xx" class="col-md-4 col-md-offset-4" style="overflow-y: scroll;" >
        <div class="entete_notif_plus col-md-offset-3" style="margin-bottom: 40px;" >
                <button id="notif_1"class="btn btn-default"style="border-right: 1px solid black;" >le trajet</button><button id="notif_2" class="btn btn-default">mon coli</button>
        </div>
        <div id="trajet">
                <div id='a'></div>
            <div >
                <div class=" col-md-offset-1 notif_div" > <label >Date de l'annonce:</label><p  class ="notif_champs notif_date_trajet"></p></div>
                <div class=" col-md-offset-1 notif_div"><label>Lieux de départ:</label><p class ="notif_champs notif_lieu_depart"></p></div>
                <div class=" col-md-offset-1 notif_div"><label>Lieux d'arrivé:</label><p class ="notif_champs notif_lieu_arrive"></p></div>   
                <div class=" col-md-offset-1 notif_div"><label>La taille max du coli:</label><p class ="notif_champs notif_taille"></p></div>  
                <div class=" col-md-offset-1 notif_div"><label>Poids max du colis:</label><p class ="notif_champs notif_poids"></p></div>
                <div class="col-md-6 col-md-offset-3" style="max-height: 150px;overflow-y: scroll;"><table class="table" ><thead><tr><th style="text-align: center;">Les arrets</th></tr></thead><tbody class="table-arrets"></tbody></table></div>      
               <div id='acc_ref1'><div class="col-md-2 col-md-offset-3"><button class="btn_notif_accepter" >accepter</button></div> <div class="col-md-2 col-md-offset-1"><button class="btn_notif_refuser">refuser</button></div><div class="col-md-8 col-md-offset-3 AccRef" style="margin-top:10px;"></div><div class="col-md-8 col-md-offset-3"id='rate' style="margin-top:10px;"></div> </div>
            </div>
        </div>
        <div id="colis">
            <div id="b"></div>
            <div>
                <div class=" col-md-offset-1 notif_div" > <label >Date de l'annonce:</label><p  class ="notif_champs notif_date_coli"></p></div>
                <div class=" col-md-offset-1 notif_div"><label>Nom du coli:</label><p class ="notif_champs nom_coli"></p></div>
                <div class=" col-md-offset-1 notif_div"><label>Date d'envoi:</label><p class ="notif_champs date_envoi"></p></div>   
                <div class=" col-md-offset-1 notif_div"><label>Date depot:</label><p class ="notif_champs date_depot"></p></div>  
                <div class=" col-md-offset-1 notif_div"><label>Poids:</label><p class ="notif_champs poids"></p></div>
                <div class=" col-md-offset-1 notif_div"><label>Taille:</label><p class ="notif_champs taille"></p></div>
                <div class=" col-md-offset-1 notif_div"><label>demandes speciaux:</label><p class ="notif_champs demandes"></p></div>
                <div class=" col-md-offset-1 notif_div"><label>tarifs:</label><p class ="notif_champs tarifs"></p></div>
                <div id="acc_ref2"><div class="col-md-2 col-md-offset-3"><button class="btn_notif_accepter" >accepter</button></div> <div class="col-md-2 col-md-offset-1"><button class="btn_notif_refuser">refuser</button></div><div class="col-md-8 col-md-offset-3 AccRef" style="margin-top:10px;"></div></div>
            </div>  
        </div>
    </div>

     <div id="xz" style="position: absolute;width: 350px;max-height: 480px;overflow-y: scroll;left: 800px;" >
        <span onclick='Closee()' class='glyphicon glyphicon-remove' id='remove'style='float:right;margin-right:10px;'></span>
         <p style="margin:30px 0px 10px ;text-align: center; ">nous vous informe que votre demande premium a ete refusé</p>
     </br><p style="margin:0px 5px 5px;text-align: center; ">veuillez <a href="">reinscrire </a><span id="cause"></span></p>  
     </div>
     <script type="text/javascript">
         function Closee()
         {
            $('#xz').hide(2000);
            $('#xs').css('opacity','1');
         }
     </script>

<div id="xa" class="col-md-4 col-md-offset-4" >
    <span id='premium_inc' class='glyphicon glyphicon-remove' style='float:right;'></span>
    <form action="php/premium.php" method="POST" id='form' enctype="multipart/form-data" style="overflow-y: scroll;max-height:85%; overflow-x:hidden;">
        <div class="col-md-10 col-md-offset-1 premium y ">
    <div class="form-group">
        <label class="label_champs">*Veuillez choisir une photo de profile</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" name="img_profile" accept=".gif,.jpg,.jpeg,.png"id="img_profile"  >
                </span>
            </span>
            <input type="text" class="form-control prm_txt" readonly >
        </div>
        <img id='img-upload1' class="center" />
    </div>
    <p id="profile_img" class=" error_premium "></p>
</div>
<div class="col-md-10 col-md-offset-1">
    <div class="form-group">
        <label class="label_champs">*Veuillez metttre une photo de votre carte identité</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file" >
                    Browse… <input type="file"name="img_carte" accept=".gif,.jpg,.jpeg,.png"id="img_carte" class="premium" >
                </span>
            </span>
            <input type="text" class="form-control prm_txt" readonly>
        </div>
        <img id='img-upload2' class="center" />
         
    </div>
    <p id="carte_img" class="error_premium"></p>

</div>
<div class="input-group col-md-offset-3" >
                        <input type="button"  onclick="download()"name="s"id="down" value="telecharger" >
                        <label id="label_down"> le contrat</label>
                    </div>

<div class="col-md-10 col-md-offset-1" style="margin-top: 150px;">
    <div class="form-group">
        <label class="label_champs">*Veuillez metttre le contrat sous form d'un <strong>PDF</strong></label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file" >
                    Browse… <input type="file"name="contrat" accept=".pdf" class="premium"  id ="contrat" >
                </span>
            </span>
            <input type="text" class="form-control prm_txt" readonly>
        </div>
    </div>
    <p id="contrat_pdf" class="error_premium"></p>
</div>
        <div class="row y">
          <button type="submit" name="signup" id="signup"  style="background-color: #00ace6;"  class="center-block btn btn-primary btn-lg">Inscrire</button>
           
        </div>
         </form>
    </div>
        <script >
        $('#signup').click(function(){    
                        var img_profile = document.getElementById("img_profile");
                var img_cart=document.getElementById("img_carte");
                var contra =document.getElementById("contrat");                   
            if (img_profile.value=='') {$('#form').submit(false);$("#profile_img").text("Veuillez choisir une photo de profile");}
            else 
            {
                if (img_cart.value=='') {$('#form').submit(false);$("#carte_img").text("Veuillez inserer une photo de votre carte d'identité");}
                else 
                {
                    if(contra.value==''){$('#form').submit(false);$("#contrat_pdf").text("Veuillez inserer le contrat rempli");}
                    else{  
                           $(document).ready(function(){
                             $("#form").submit();
});
                                             
                        }
                }
            }  
             });
    </script>
        <script  >
    function download(){
                   var button = $("input[type=button]").val();
                $.post("php/download.php", { download : button },
                function(data) {             
                $('#form')[0].reset();
            });}</script>
    <script type="text/javascript">
$('#inc2').click(function(){
    var x ="<?php echo $_SESSION['email'] ?>";
    if (x!=''){
    $('#xa').show(500);}
    else 
    {
        
    }
});
$('#premium_inc').click(function(){
    $('#xa').hide(500);
    $('#img-upload1').attr('src','');
    $('#img_profile').val('');
    $('.prm_txt').val('');
     $('#img-upload2').attr('src','');
    $('#img_carte').val('');
    $('.prm_txt').val('');
    $('#contrat').val('');
    $('.prm_txt').val('');
});

    </script>

    <!--Scrtipts-->
    <script>
        $('#sct').click(function(){

                var email =document.getElementById("email");
                
                var password =document.getElementById("password");

                email.setCustomValidity('');
               
                 password.setCustomValidity('');
                
                if (email.value =='') {email.setCustomValidity('Veuillez remplir ce champs');  }
                else
                { email.setCustomValidity('');
                    if(password.value==''){password.setCustomValidity('Veuillez remplir ce champs');}
                    else {
                        password.setCustomValidity('');
                        

                                        }
                                }
                                
                
           });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#sct").click(function(event){
                var exist="<?php echo $exist ?>";
                event.preventDefault();
                if(exist==0){
                    document.getElementById("msg_psd").innerHTML="Veuillez verifier votre e-mail ou mot de passe";
                }
            })
    </script>

    <script type="text/javascript"> 
        var nom="<?php echo $_SESSION['nom'] ?>";
        var prenom="<?php echo $_SESSION['prenom'] ?>";
        var text = "welcome";
        if (nom!=""){
            $(".cx").addClass("apr_cx");
            $(".cx").removeClass("cx");
            document.getElementById("inc").innerHTML="<img src=\"images/profile.png\" width=\"50px\" style=\"border-radius:50%;margin-left:20px;margin-right:20px;\">";
            document.getElementById("inc").style.padding=0;
            document.getElementById("inc").style.background="#fff";
            $("#inc").attr({
                "id" : "prof",
                "href" : "profile.php"
            });
            document.getElementById("conx").innerHTML="<li class='dropdown'> <img src='images/notifs.png' class='dropdown-toggle' data-toggle ='dropdown' width='50px' style='border-radius:50%; margin-right:20px;'><ul class='dropdown-menu notification-ul' ><li id='nonotif' class='notification-li'></li></ul></li>";
            document.getElementById("conx").style.padding=0;
            document.getElementById("conx").style.background="#fff";
            $("#conx").attr({
                "id" : "notif",
                "href" : "#"
            });
            document.getElementById("t1").innerHTML=text.concat(" ",nom," ",prenom);
            document.getElementById("conx2").innerHTML="J'ai un colis";
            document.getElementById("part").innerHTML="Deposer votre annonce maintenant!";
            document.getElementById("dpart").style.left="650px";
            document.getElementById("dpart").style.top="200px";
            document.getElementById("quest").innerHTML="";
            document.getElementById("dconx2").style.left="800px";
            document.getElementById("dconx2").style.top="260px";
            document.getElementById("dtra").style.top="320px";

            $("#conx2").attr({
                "id" : "depoco",
                "href" : "formulaire_colis.php"
            });
            $("#depotra").fadeIn();

            $("#inc1").fadeOut();
            document.getElementById("inc2").innerHTML="s'inscrire";
            $("#dcx").fadeIn();

        }
    </script>

    <script type="text/javascript">
        $('.dropdown-menu').click(function(e){
                e.stopPropagation();
   

        });
        $(function() {
            $('a[href*=#]:not([href=#])').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top - 132
                        }, 2000);
                    return false;
                    }
                }
            });
        });
    </script>
        
    <script type="text/javascript">
        $(document).ready(function() {
            if($(window).width() <= 1200){
                $(function() {
                    $('a[href*=#]:not([href=#])').click(function() {
                        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                            var target = $(this.hash);
                            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                            if (target.length) {
                                $('html,body').animate({
                                    scrollTop: target.offset().top - 132
                                }, 2000);
                            return false;
                            }
                        }
                    });
                });
            }
        });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        var emai="<?php  echo $_SESSION['email'] ?>";
 if(emai!=''){
    function load(view,email){
            $.ajax({
            url :"fetch.php",
            data :{'view':view,'email':email},
            type:'POST',
            dataType :"json",
            success:function(data)
            {

                if (data.notification=="")
                {
                    $("#nonotif").html("pas de notification");   
                }
               else{
                $("#nonotif").attr("style","display:none");
             $(".dropdown-menu").html(data.notification);

                }
            }
        });
        }
        load('',emai);
        var intervalID = setInterval(function(){


            view='';
            email=emai;
        $.ajax({
            url :"fetch.php",
            data :{'view':view,'email':email},
            type:'POST',
            dataType :"json",
            success:function(data)
            {

                if (data.notification=="")
                {
                    $("#nonotif").html("pas de notification");   
                }
               else{
                $("#nonotif").attr("style","display:none");
             $(".dropdown-menu").html(data.notification);

                }
            },
    error: function (request, status, error) {
        alert(error);alert('0');
    }
        }); 
      
  },5000);
    }
    });
    function vuuu(id_notif)
    {
        var x="."+id_notif;
        if($('#glyphicon'+id_notif).hasClass('glyphicon-eye-open'))
        {
            $('#glyphicon'+id_notif).removeClass('glyphicon-eye-open').addClass('glyphicon-eye-close');
            $("."+id_notif).css('background-color','');
           // vuuus(id_notif,1);
               $.ajax({
        url:'vu.php',
        type:'POST',
        data:{'id_notif':id_notif,'n':0},

    error: function (request, status, error) {
        alert(status);alert('4');
    }
    });

        }
        else 
        {
        $('#glyphicon'+id_notif).removeClass('glyphicon-eye-close').addClass('glyphicon-eye-open');
            $("."+id_notif).css('background-color','#75a3a3');
                           $.ajax({
        url:'vu.php',
        type:'POST',
        data:{'id_notif':id_notif,'n':1},

    error: function (request, status, error) {
        alert(status);alert('4');
    }
    });

        }
    }


    </script>
    <script type="text/javascript">    function Close(id_notif)
    {
        
       $('.'+id_notif).attr('style','display:none;');
        $.ajax({
        url:'vu.php',
        type:'POST',
        data:{'id_notif':id_notif,'close':1},

    error: function (request, status, error) {
        alert(status);alert('5');
    }
    });}
    
    </script>
    <div>
       <!-- <span >veuillez note le tansporteur</span>
      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo"></button>
  <div id="demo" class="collapse">
    <span class="fa fa-star"id="ss1"></span><span class="fa fa-star"id="ss2"></span><span class="fa fa-star"id="ss3"></span><span class="fa fa-star"id="ss4"></span><span class="fa fa-star"id="ss5"></span>
     </div>
     </div>-->
    <script type="text/javascript">
        function seen(accepte,id_trajet,id_notif)//il ya acceptation coli-trajet
        {
            var rating='</br><span >veuillez note le tansporteur </span><label class="label_note" data-toggle="collapse" data-target="#demo">ici</label><div id="demo" class="collapse col-md-offset-2"><span class="fa fa-star" id="ss1"></span><span class="fa fa-star"id="ss2"></span><span class="fa fa-star"id="ss3"></span><span class="fa fa-star"id="ss4"></span><span class="fa fa-star"id="ss5"></span></br><label id="valid_rating">Valider</label></div>';
            $('#rate').html('');
                            $('.btn_notif_accepter').show();
                $('.btn_notif_refuser').show();
            if (accepte==1 || accepte==2 || accepte==3 || accepte==4) 
            {
                $('.btn_notif_accepter').hide();
                $('.btn_notif_refuser').hide();
                $('.AccRef').html("");
                $("#btnf").html('');
                 var btnf='<span >Vous pouvez voir le profile complet <a href="">ici </a></span>';
                if(accepte==1)
                {
                    $('.AccRef').html("Vous avez accepter cette demande");
                    $("#btnf").html(btnf);
                }
                else if(accepte==2)
                {
                    $('.AccRef').html("Vous avez refuser cette demande");
                }
                else if(accepte==3)
                {
                    $('.AccRef').html("Votre coli est en route");
                }
                else if(accepte==4)
                {
                    $('#rate').html(rating);
                    stars_rating(id_trajet,id_notif);
                }
            }
        }

        function stars_rating(id_trajet,id_notif)
        {

            $('#ss1').hover(function(){$(this).addClass('hover');},function(){$(this).removeClass('hover');});
            $('#ss2').hover(function(){$('#ss1 ,#ss2').addClass('hover');},function(){$('#ss1 ,#ss2').removeClass('hover');});
            $('#ss3').hover(function(){$('#ss1 ,#ss2 ,#ss3').addClass('hover');},function(){$('#ss1 ,#ss2 ,#ss3').removeClass('hover');});
            $('#ss4').hover(function(){$('#ss1 ,#ss2 ,#ss3,#ss4').addClass('hover');},function(){$('#ss1 ,#ss2 ,#ss3,#ss4').removeClass('hover');});
            $('#ss5').hover(function(){$('#ss1 ,#ss2 ,#ss3,#ss4,#ss5').addClass('hover');},function(){$('#ss1 ,#ss2 ,#ss3,#ss4,#ss5').removeClass('hover');});


            var x=0;
            $('#ss1').click(function(){$(this).removeClass('hover');$('#ss1').addClass('click');$('#ss2,#ss3 ,#ss4 ,#ss5').removeClass('click');x=1;});
           $('#ss2').click(function(){$('#ss1 , #ss2').removeClass('hover');$('#ss1 , #ss2').addClass('click');$('#ss3 ,#ss4 ,#ss5').removeClass('click');x=2;});
            $('#ss3').click(function(){$('#ss1 , #ss2,#ss3').removeClass('hover');$('#ss1 , #ss2 , #ss3').addClass('click');$('#ss4 ,#ss5').removeClass('click');x=3;});
            $('#ss4').click(function(){$('#ss1 , #ss2,#ss3 ,#ss4').removeClass('hover');$('#ss1 , #ss2 , #ss3 ,#ss4').addClass('click');$('#ss5').removeClass('click');x=4;});
           $('#ss5').click(function(){$('#ss1 , #ss2,#ss3 ,#ss4 ,#ss5').removeClass('hover');$('#ss1 , #ss2 , #ss3 ,#ss4 ,#ss5').addClass('click');x=5;});
           $('#valid_rating').click(function(){
                rating_(x,id_trajet);
                $('#rate').html('merci de votre contribution');
                Close(id_notif);

           });

        }
        function rating_(note,id_trajet)
        {
            $.ajax({
                url:'rating.php',
                type:'POST',
                data:{'note':note,'id_trajet':id_trajet},
                error:function(a,b,c)
                {
                    alert(a);
                }
            });

        }
        function stars(note)
        {
             var x= Math.floor(note);//partie entier
             var d =note -x;
             if(Math.abs(d)>=0.6){x=x+1;}
             var star='<span class="fa fa-star"id="s1"></span><span class="fa fa-star"id="s2"></span><span class="fa fa-star"id="s3"></span><span class="fa fa-star"id="s4"></span><span class="fa fa-star"id="s5"></span>';
             $('#note').html(star);
            switch(x)
            {
                case 1:$('#s1').addClass('checked');break;
                case 2:$('#s1').addClass('checked');$('#s2').addClass('checked');break;
                case 3:$('#s1').addClass('checked');$('#s2').addClass('checked');$('#s3').addClass('checked');break;
                case 4:$('#s1').addClass('checked');$('#s2').addClass('checked');$('#s3').addClass('checked');$('#s4').addClass('checked');break;
                case 5:$('#s1').addClass('checked');$('#s2').addClass('checked');$('#s3').addClass('checked');$('#s4').addClass('checked');$('#s5').addClass('checked');break;
            }

        }
        function VoirPlus(id_coli,code,id_trajet,vu,id_notif,acc)
        {   
                $.ajax({
                url :"voir_colis.php",
                data :{'id_coli':id_coli,'code_notif':code,'id_trajet':id_trajet,'id_notif':id_notif},
                type:'POST',
                dataType :"json",
                success:function(data)
                {

                    $('#xs').css('opacity','0.1');
                    var infos='<div style="border-bottom: 1px solid;" ><div class=" col-md-offset-1 notif_div" > <label >Nom:</label><p  class ="notif_champs notif_nom"></p></div><div class=" col-md-offset-1 notif_div"><label>Prenom:</label><p class ="notif_champs notif_prenom"></p></div><div class=" col-md-offset-1 notif_div"> <label >Note de fiabilité:</label><span id="note"> </span></div><div class="col-md-offset-1"id="btnf"></div></div>';
                    var btnf='<span >Vous pouvez voir le profile complet <a href="" >ici </a></span>';
                    $('#notif_1').css('background-color','#001a33');
                    if (code==0){                      
                       $('#notif_2').css('background-color','#0080ff');
                        $('#notif_1').css('background-color','#001a33');
                        $('#xx').show(500);
                        $('#acc_ref2').hide();
                        $('#acc_ref1').show();
                        $('#trajet').show();
                        $('#colis').hide();
                        $("#btnf").html('');
                        $('#a').html(infos);
                        $('#b').html("");
                        $('#notif_1').text('le trajet');
                        $('#notif_2').text('mon coli');
                       info(data);
                        seen(acc);
                            $('.btn_notif_accepter').click(function(){
                                notification(1,data.id_colis,data.id_trajet,id_notif);
                                $('.AccRef').html("Vous avez accepter cette demande");
                                $("#btnf").html(btnf);
                                $('.btn_notif_accepter').hide();
                                $('.btn_notif_refuser').hide();
                            });
                            $('.btn_notif_refuser').click(function(){
                                notification(2,data.id_colis,data.id_trajet,id_notif);
                                $('.AccRef').html("Vous avez refuser cette demande");
                                $('.btn_notif_accepter').hide();
                                $('.btn_notif_refuser').hide();
                            });
                    }
                    else if(code==3 )
                    {
                        $('#xx').show(500);
                        $('#trajet').hide();
                        $('#acc_ref1').hide();
                        $('#acc_ref2').show();
                        $('#colis').show();
                        $('#b').html(infos);
                        $('#a').html("");
                        $('#notif_1').text('mon trajet');
                        $('#notif_2').text('le coli');
                        $('#notif_1').css('background-color','#0080ff');
                        $('#notif_2').css('background-color','#001a33');
                        $(".btnf").hide();

                       info(data);
                       seen(acc);
                        $('.btn_notif_accepter').click(function(){
                           notification(4,data.id_colis,data.id_trajet,id_notif);
                           $('.AccRef').html("Vous avez accepter cette demande");
                            $('.btn_notif_accepter').hide();
                            $('.btn_notif_refuser').hide();
                        });
                        $('.btn_notif_refuser').click(function(){
                            notification(5,data.id_colis,data.id_trajet,id_notif);  
                            $('.AccRef').html("Vous avez refuser cette demande");                              
                            $('.btn_notif_accepter').hide();
                            $('.btn_notif_refuser').hide();
                        });
                    }
                    else if(code==1 || code ==2)
                    {
                                $('#xx').show(500);
                        $('#a').html(infos);
                        $('#b').html("");
                        $('#notif_1').text('mon trajet');
                        $('#notif_2').text('le coli');
                        $('#notif_1').css('background-color','#0080ff');
                        $('#notif_2').css('background-color','#001a33');
                        $('.btn_notif_accepter').hide();
                        $('.btn_notif_refuser').hide();
                        $('#xy').show(500); 
                        $('#trajet').show();
                        $('#colis').hide();  
                        $(".btnf").hide(); 
                        info(data);
                    }
                    else if(code ==4 || code == 5)
                    
                    {
                        $('#notif_2').css('background-color','#0080ff');
                        $('#notif_1').css('background-color','#001a33');
                        $('#xx').show(500);
                        $('#trajet').show();
                        $('#colis').hide();
                        $('#a').html(infos);
                        $('#b').html("");
                        $('#notif_1').text('le trajet');
                        $('#notif_2').text('mon coli');
                        $('.btn_notif_accepter').hide();
                        $('.btn_notif_refuser').hide();
                            $('#xy').show(500); 
                            $('#trajet').show();
                        $('#colis').hide();
                        $(".btnf").hide();
                        info(data);
                    }
                    else if(code==7)
                    {
                        $('#xz').show(500);
                        alert(data.no_prem);
                        $(".btnf").hide();
                        if (data.no_prem!='') {
                        $('#cause').html('et '+data.no_prem);}
                    }
                    else if(code==8)
                    {
                        $('#notif_2').css('background-color','#0080ff');
                        $('#notif_1').css('background-color','#001a33');
                        $('#xx').show(500);
                        $('#trajet').show();
                        $('#colis').hide();
                        $('#a').html(infos);
                        $('#b').html("");
                        $('#notif_1').text('le trajet');
                        $('#notif_2').text('mon coli');
                        $(".btnf").hide();
                       info(data);
                        seen(3);
                    }
                    else if (code==9)
                    {
                        $('#notif_2').css('background-color','#0080ff');
                        $('#notif_1').css('background-color','#001a33');
                        $('#xx').show(500);
                        $('#acc_ref2').hide();
                        $('#acc_ref1').show();
                        $('#trajet').show();
                        $('#colis').hide();
                        $("#btnf").html('');
                        $('#a').html(infos);
                        $('#b').html("");
                        $('#notif_1').text('le trajet');
                        $('#notif_2').text('mon coli');
                        info(data);
                        $(".btnf").hide();
                        seen(4,id_trajet,id_notif);
                    }
                },
    error: function (request, status, error) {
        alert(status);alert(error);
    }

            });
            }
            $('#notif_1').click(function(){
      $('#trajet').show();
                    $('#colis').hide();
                    $('#notif_1').css('background-color','#001a33');
                    $('#notif_2').css('background-color','#0080ff');
});
$('#notif_2').click(function(){              
                        $('#trajet').hide();
                    $('#colis').show();
                    $('#notif_2').css('background-color','#001a33');
                    $('#notif_1').css('background-color','#0080ff');
});

            function info(data)
            {
                                        $('.notif_nom').html(data.nom);
                        $('.notif_prenom').html(data.prenom);
                            stars(data.note);
                        $('.notif_date_trajet').html(data.date_annonce_trajet);
                        $('.notif_lieu_arrive').html(data.lieu_arrive);
                        $('.notif_lieu_depart').html(data.lieu_depart);
                        $('.notif_poids').html(data.poids_max);
                        $('.notif_taille').html(data.taille_max);
                        $('.table-arrets').html(data.arret);

                        $('.notif_date_coli').html(data.date_annonce_coli);
                        $('.nom_coli').html(data.nom_coli);
                        $('.date_envoi').html(data.date_envoi);
                        $('.date_depot').html(data.date_depot);
                        $('.poids').html(data.poids);
                        $('.taille').html(data.taille);
                        $('.demandes').html(data.demande_spec);
                        $('.tarifs').html(data.tarif);
            }
$('#xs').click(function(){
    $('#xs').attr('style','opacity:1;');
    $('#xx').hide(500);
    $('#xy').hide(500);
    $('#xz').hide(500);
});
function notification(code,id_coli,id_trajet,id_notif)//insere une notification
{
        $.ajax({
            url :"notification.php",
            data :{'code_notif':code,'id_colis':id_coli,'id_trajet':id_trajet,'id_notif':id_notif},
            type:'POST',
            success:function(data)
            {

            },
    error: function (request, status, error) {
        alert(error);alert('notification');
    }
        });
} 
        
    </script> 
    <script type="text/javascript">
        
        //clearInterval(intervalID);
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            var arrow = $(".arrow");
            var form = $(".cnx");
            var stat = false;
            $("#conx").click(function(event){
                event.preventDefault();
                if(stat==false){
                    arrow.fadeIn();
                    form.fadeIn();
                    stat=true;
                }else{
                    arrow.fadeOut();
                    form.fadeOut();
                    stat=false;
                }
            })
            $("#conx2").click(function(event){
                event.preventDefault();
                if(stat==false){
                    arrow.fadeIn();
                    form.fadeIn();
                    stat=true;
                }else{
                    arrow.fadeOut();
                    form.fadeOut();
                    stat=false;
                }
            })
        })
    </script>
            
    <script type="text/javascript">
        $(function() {
            $(window).scroll(function() {
                if($(this).scrollTop() >= 200) {
                    $('.header').addClass("header_fix");    
                } else {
                   $('.header').removeClass("header_fix");
                }
            }); 
        });
    </script>  
        
    <script>
        jQuery("#layerslider").layerSlider({
            responsive: false,
            responsiveUnder: 1100,
            layersContainer: 1100,
            skin: 'fullwidth',
            hoverPrevNext: false,
            skinsPath: 'layerslider/skins/'
        });
    </script>   

    <script type="text/javascript">
        var message="<?php echo $_SESSION['message'] ?>"; 
        var arrow = $(".arrow");
        var form = $(".cnx");
        if (message!=""){
            arrow.fadeIn();
            form.fadeIn();
            if (message=="eml"){
                $("#eml").fadeIn();
            }
            if (message=="mdp"){
                $("#mdp").fadeIn();
            }
        }
    </script>

    <script type="text/javascript">
        var prem="<?php echo $_SESSION['prem'] ?>";
        if(prem=="true"){
            $("#slideprem").remove();
            $("#comp").remove();
            
        }
    </script>
</body>
</html>
