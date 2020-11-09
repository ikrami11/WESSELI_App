<!DOCTYPE html>
<html>
<head>
        <title>Inscription - colis.dz</title>
          <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min4.css">
      <script type="text/javascript "src="js/jquery.js"> </script>
   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
     
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <link href="css/style_insc.css" rel="stylesheet" type="text/css" />
        <link href="css/style_insc2.css" rel="stylesheet" type="text/css" />

        
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        

                            
</head>
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

<body  >
        
        
    
        <div class="header">
        <div class="container">
        
        			<a href="index.php" class="logo"><img src="images/logo.png" style="width: 90px;" alt="colis.dz" /></a>
					<div class="nav">
                    <ul>
        			<li class="cx"><a href="index.php">accueil</a></li>
        			</ul>
                </div>
        
        </div>
        </div>
        
        <div class="container affix-bottom "style="overflow-y: scroll;padding: 60px;"  >
            <h1 id="title" class="text-center ">Inscription</h1>
  
        <form action="php/compte.php"  method="POST" class="col-md-6 col-md-offset-3 col-sm-6" enctype="multipart/form-data" id="form">

            <!-- Field for name -->
            <div class="row ">
                <div class="col-md-5 col-md-offset-1 y" style="right: 13px;">
                         <label for="nom" class="label_champs">*Nom:</label>
                         <div class="input-group" >
                       
                        <span class="input-group-addon p"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" id="name" name="nom" placeholder="votre nom"  class="form-control lastElement x" required >
                        </div>

                </div>
                <div class="col-md-5 y"style="left: 13px;">
                     <label for="prenom"class="label_champs ">*Prenom:</label>
                    <div class="input-group" style="">
                        <span class="input-group-addon p"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" id="prenom" name="prenom" placeholder="votre prenom"  class="form-control lastElement x"required>
                    </div>
            </div>

            <div class="row y">
                <div class="col-md-10 col-md-offset-1">
                    <label for="email" id="email-label"class="label_champs">*Email:</label>
                    <div class="input-group">
                        <span class="input-group-addon p" ><i class="glyphicon glyphicon-envelope"></i></span>
                        <input type="email" id="email" name="email" placeholder="votre email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"  class="form-control lastElement x"required>
                    </div>
                </div>
            </div>


            <div class="row y">
                <div class="col-md-10 col-md-offset-1">
                    <label for="phone" id="phone-label"class="label_champs">*Téléphone:</label>
                        <div class="input-group">
                            <span class="input-group-addon p"><i class="glyphicon glyphicon-earphone"></i></span>
                            <input type="text" id="phone" name="phone" placeholder="0550...." pattern ="[0-9]{9,10}"  class="form-control lastElement x"required>
                        </div>
                </div>
            </div>
            <div class="row y">
                <div class="col-md-10 col-md-offset-1">
                    <label for="adr" id="adr-label"class="label_champs">Adresse:</label>
                    <div class="input-group">
                        <span class="input-group-addon p"><i class="glyphicon glyphicon-home"></i></span>
                        <input type="text" id="adr" name="adr" placeholder="votre adresse"  class="form-control lastElement x">
                    </div>
                </div>
            </div>
            <div style="background-color: red;" >
               <script type="text/javascript"> 
                $(document).ready(function() {
    //jquery
    $(location).attr('href');

    //pure javascript
    var pathname =  $(location).attr("href");
    
   if(pathname=="http://localhost/index.php?no")
    
    {
      $('#aze').text("ce compte existe dejas");
  }
});
           </script>
           <p style="background-color: red;"id="aze"></p>
            </div>
            
           <p id="aze"></p>

            <div class="row y">
                <div class="col-md-5 col-md-offset-1">
                    <label for="password" id="name-label"class="label_champs">*Mot de passe:</label>
                    <div class="input-group">
                        <span class="input-group-addon p"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" id="password" name="password" placeholder="mot de pass"  class="form-control x "pattern="[a-z0-9._%+-]{8,}"required >
                    </div>
                </div>
                <div class="col-md-5">
                    <label for="passwordrep" id="name-label"class="label_champs">*Confirmer:</label>
                    <input type="password" id="passwordrep" name="passwordrep" class="form-control lastElement x " pattern="[a-z0-9._%+-]{8,}"required>
                </div>
            </div>
            <script type="text/javascript">
                var password = document.getElementById("password")
                , confirm_password = document.getElementById("passwordrep");

                function validatePassword(){ pattern="[a-z0-9._%+-]{8,}"
                    if(password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("mot de passe incorrect");
                    } else {
                        confirm_password.setCustomValidity('');
                    }  
                }

                    password.onchange = validatePassword;
                    passwordrep.onkeyup = validatePassword;
            </script>



                    <span class="col-md-offset-1 label_champs" style="font-size: 120%;position: relative;left: 60px;top: 33px; "  >Voulez vous inscrire comme un premium ?</span>
                   
                        <div class="col-md-offset-1" >

                <label class="switch"style="margin-top: 10px;">
                <input type="checkbox" name="check" id="prem" value="accepte" unchecked>
                <span class="slider round"></span>
                
                </label>
                
            </div>
             <br>
            <span class="col-md-offset-1 label_champs" style="font-size: 120%; position: relative;left: 60px;top: 43px;"  >J'accèpte les <a href="">conditions </a></span>
            <div class="col-md-offset-1 checkbox" >
                
                <label class="switch" style="margin-top: 10px;">

                    <input type="checkbox" name="check"  id="condition" required >
                <span class="slider round"></span>
            
                </label>
                <p id="condition_verify" style="color :red;"></p>
            </div>

                

<div class="col-md-10 col-md-offset-1 premium y ">
    <div class="form-group">
        <label class="label_champs">*Veuillez choisir une photo de profile</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" name="img_profile" accept=".gif,.jpg,.jpeg,.png"id="img_profile"  >
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload1' class="center" />
    </div>
    <p id="profile_img" class=" error_premium "></p>
</div>

<div class="row"></div>

<div class="col-md-10 col-md-offset-1 premium y">
    <div class="form-group">
        <label class="label_champs">*Veuillez metttre une photo de votre carte identité</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file" >
                    Browse… <input type="file"name="img_carte" accept=".gif,.jpg,.jpeg,.png"id="img_carte" class="premium" >
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload2' class="center" />
    </div>

</div>
<div class="input-group col-md-offset-3 down premium " >
                        <input type="button"  onclick="download()"name="s"id="down" value="telecharger">
                        <label id="label_down">le contrat</label>
                    </div>

<div class="col-md-10 col-md-offset-1 premium y">
    <div class="form-group">
        <label class="label_champs">*Veuillez metttre le contrat sous form d'un <strong>PDF</strong></label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file" >
                    Browse… <input type="file"name="contrat" accept=".pdf" class="premium"  id ="contrat" >
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload3'/>
    </div>
    <p id="contrat_pdf" class=" error_premium"></p>
</div>
<script  >
    function download(){
                   var button = $("input[type=button]").val();
                $.post("php/download.php", { download : button },
                function(data) {             
                $('#form')[0].reset();
            });}</script>
            <script  >

                   
            </script>

            

            <!-- Submit button -->
        <div class="row y">
          <button type="submit" name="signup" id="signup"  style="background-color: #00ace6;"  class="center-block btn btn-primary btn-lg">Inscrire</button>
           
        </div>
        </form>
        </div>
        
        
        



		<script>
           $('#prem').change(function(){
                if (this.checked) {
                    $('.premium').show();
 

                    
                }
                else{$('.premium').hide();
                                    $("#profile_img").attr("required",'false');
                    $("#carte_img").attr("required",'false');
                    $("#contrat_pdf").attr("required",'false');
            }
            });


        
           $('#signup').click(function(){


                var nom =document.getElementById("name");
                var prenom =document.getElementById("prenom");
                var email =document.getElementById("email");
                var adr =document.getElementById("adr");
                var phone =document.getElementById("phone");
                var password =document.getElementById("password");
                var passwordrep =document.getElementById("passwordrep");
                var condition =document.getElementById("condition");
                var condition_lab=document.getElementById("condition_verify");
                var img_profile = document.getElementById("img_profile");
                var img_cart=document.getElementById("img_carte");
                var contra =document.getElementById("contrat");
                nom.setCustomValidity('');
                prenom.setCustomValidity('');
                email.setCustomValidity('');
                adr.setCustomValidity('');
                phone.setCustomValidity('');
                password.setCustomValidity('');
                passwordrep.setCustomValidity('');
                if (nom.value =='') {nom.setCustomValidity('Veuillez remplir ce champs');  }
                else
                { nom.setCustomValidity('');
                    if(prenom.value==''){prenom.setCustomValidity('Veuillez remplir ce champs');}
                    else {
                        prenom.setCustomValidity('');
                        if(email.value==''){email.setCustomValidity('Veuillez remplir ce champs');}
                        else
                        {email.setCustomValidity('');
                             var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                            if (!re.test(email.value)) {email.setCustomValidity("Veuillez respeter le format de l'email");}
                            else
                            {
                                email.setCustomValidity('');
                                if (phone.value==''){phone.setCustomValidity("Veuillez remplir ce champs");}
                                else{
                                    phone.setCustomValidity('');
                                    var re =/[0-9]{9,11}/;
                                        if (!re.test(phone.value)) {phone.setCustomValidity("format invalid");}
                                        else{
                                        phone.setCustomValidity('');
                                            if (password.value==''){password.setCustomValidity("Veuillez remplir ce champs");}
                                            else {
                                                password.setCustomValidity('');
                                                var re=/[0-9A-Za-z]/;
                                                if (!re.test(password.value)) {password.setCustomValidity("le mot de pass doit contenir au moins 9 caractere");}
                                                else 
                                                {
                                                    passwordrep.setCustomValidity('');
                                                    if (passwordrep.value==''){passwordrep.setCustomValidity("Veuillez remplir ce champs");}
                                                    else {
                                                    if(password.value != passwordrep.value) {

                                                        passwordrep.setCustomValidity("mot de pass incorrect");
                                                    } else {
                                                        passwordrep.setCustomValidity('');
                                                        if (!condition.checked) {$("#condition_verify").text("Veuillez accepter les condition d'utilisation");}
                                                        else {
                                                            var premium_check=document.getElementById("prem");
                                                            if (premium_check.checked) 
                                                            {
                                                                                   
                                                                if (img_profile.value=='') {$('#form').submit(false);$("#profile_img").text("Veuillez choisir une photo de profile");}
                                                                else 
                                                                {
                                                                    if (img_cart.value=='') {$('#form').submit(false);$("#carte_img").text("Veuillez inserer une photo de votre carte d'identité");}
                                                                    else 
                                                                    {
                                                                        if(contra.value==''){$('#form').submit(false);$("#contrat_pdf").text("Veuillez inserer le contrat rempli");}
                                                                        else{
                                                                            var button = $("#prem").val();
                                                                            $('#form').submit();

                                                                            $.post("php/compte.php", { premium : button });
                                                                        }
                                                                    }


                                                                }

                                                            }
                                                            
                                                               else{ $('#form').submit();}
                                                        }

                                                    }  
                                                    }
                                                }   
                                        }
                                }
                            }    }
                     } }  }
           });




</script>
             

		
</body>
</html>
