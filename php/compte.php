<?php 
      //  if (isset($_POST['signup'])) {
            # code..

session_start();
                        $nom = $_POST['nom'];
                     require 'dbh.inc.php';

            $fil=$_FILES['img_profile'];
      $file_name=$fil['name'];
      $file_tmp=$fil['tmp_name'];
      $file_size=$fil['size'];
      $file_error=$fil['error'];
      $file_type=$fil['type'];
$message="";
            $prenom=$_POST['prenom'];
            $phone=$_POST['phone'];
            $adresse=$_POST['adr'];
            $email = $_POST['email'];
            $passeword = $_POST['password'];
            $repeated_password= $_POST['passwordrep'];
            if (empty($nom) || empty($email) || empty($passeword)|| empty($repeated_password) )
            {
                header("Location: ../signup.php?error=emptyfeilds&uid".$nom."$mail=".$email);
                
                exit();
            }

            else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                header("Location: ../signup.php?error=invalidemail&uid".$nom);
                exit();
            }
            elseif (!preg_match("/^[a-zA-Z0-9]*$/",$nom)) {//username contient ces caracteres
                # code...
                header("Location: ../signup.php?error=invalidemail&email".$email);
                exit();
            }
            elseif ($passeword !== $repeated_password) {
                # code...
                header("Location: ../signup.php?error=emptyfeilds&uid".$nom."$mail=".$email);
                
                //exit();
            }
            else
            {   
                $sql="SELECT mail FROM compte WHERE mail=?";
                $stmt =mysqli_stmt_init($conn);//not yet
                if (!mysqli_stmt_prepare($stmt,$sql)) {//preparer une instruc SQL pour l'exe
                    # code...
                header("Location: ../signup.php?error=sqlerror");
                exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt,"s",$email);//not yet
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);//stocker , elle est utilisee pour les requetes qui produisent un jeu de resultats (select,show,describe,explain)
                    $result=mysqli_stmt_num_rows($stmt);
                    if ($result>0)
                        {
                            
                            header("Location: ../inscription.php?iii");
                            echo "<script type='text/javascript'>
                                      
                                            document.getElementById('aze').innerHTML='Veuillez verifier votre e-mail ou mot de passe';
 
                            </script>";
                            echo json_encode("zzzzzzz");

                            exit();
                        } 
                        else
                        {
                            $temps=date("Y/m/d h:i:sa");
                            $sql="INSERT INTO compte(nom,prenom,mot_passe,mail,adresse,tel) VALUES(?,?,?,?,?,?)";
                            $stmt =mysqli_stmt_init($conn);//not yet
                            if (!mysqli_stmt_prepare($stmt,$sql)) {//preparer une instruc SQL pour l'exe
                    # code...
                               // header("Location: ?error=sqlerror");
                                exit();
                        }
                        else {
                            $hash=password_hash($passeword,PASSWORD_DEFAULT);
                                mysqli_stmt_bind_param($stmt,"sssssd",$nom,$prenom,$hash,$email,$adresse,$phone);//not yet
                                mysqli_stmt_execute($stmt);
                                //mysqli_stmt_store_result($stmt);
                                if($file_size>0){
                                    $sql="SELECT id_compte FROM compte WHERE mail=?";
                                    $stmt =mysqli_stmt_init($conn);//not yet
                                    if(mysqli_stmt_prepare($stmt,$sql))
                                        mysqli_stmt_bind_param($stmt,"s",$email);//not yet
                                        mysqli_stmt_execute($stmt);
                                        $result=mysqli_stmt_get_result($stmt);
                                        $row =mysqli_fetch_assoc($result);
                                        $id=$row['id_compte'];
                                        premium_premium($_FILES['img_profile'],"../img_profiles",$email,1);
                                        premium_premium($_FILES['img_carte'],"../includes",$id,2);
                                        premium_premium($_FILES['img_carte'],"../cartes_id",$id,3);
                                        premium_premium($_FILES['contrat'],"../contrats",$id,4);
                                        notification($id);
                                        
                                    {

                                    }

                                /*photo($_FILES['img_profile'],"officiel",$email,1);
                                photo($_FILES['img_carte'],"include",$email,2);*/

                            }
                            
                                                    $_SESSION['nom']=$_POST['nom'];
                                                    $_SESSION['prenom']=$_POST['prenom'];

                                                    header("location: ../index.php");
                            # code...
                        
                        # code...
                    }
                }
            }
            
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
        /*
        $stmt = mysqli_prepare($link, "SELECT Code, Name FROM Country ORDER BY Name LIMIT 5"))
            while (mysqli_stmt_fetch($stmt)) {
        printf("%s %s\n", $col1, $col2);
    }*/
    function premium_premium ($fil,$dossier,$info,$sql_num){
    
        require 'dbh.inc.php';
      $file_name=$fil['name'];
      $file_tmp=$fil['tmp_name'];
      $file_size=$fil['size'];
      $file_error=$fil['error'];
      $file_type=$fil['type'];
     if($file_size>0){
    $file_ext =explode('.', $file_name);
    $ext=end($file_ext);
    if ($file_error==0) {
    $filenewname=uniqid('',true).".".$ext;
    $file_destination=$dossier."/".$filenewname;
    move_uploaded_file($file_tmp, $file_destination);  
    switch ($sql_num) {
        case 1:
                   $sql2="UPDATE compte SET photo = ? WHERE mail=?";                      
            break;
            case 2:
                $sql2= "INSERT premium(id_compte) VALUES (?) ";
                break;
            case 3:
            $sql2="UPDATE premium SET identite = ? WHERE id_compte=?";
                # code...
                break;
                case 4  :
                $sql2="UPDATE premium SET contrat = ? WHERE id_compte=?";
                    break;
                                          
                                          default:
                                              # code...
                                              break;
                                      }                                  
    $stmt2 =mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt2,$sql2) ){
        if ($sql_num==2)
        {
            mysqli_stmt_bind_param($stmt2,"d",$info);//not yet
                mysqli_stmt_execute($stmt2);
        }
        else {
            if ($sql_num==1) {
                # code..
                mysqli_stmt_bind_param($stmt2,"ss",$filenewname,$info);//not yet
                mysqli_stmt_execute($stmt2);
            }
            else 
            {
                        mysqli_stmt_bind_param($stmt2,"sd",$filenewname,$info);//not yet
             mysqli_stmt_execute($stmt2);
            }
        }
 
        }
     }                                           
}}
 function notification ($id)
 {
    require 'dbh.inc.php';
    $sql2= "INSERT notifications_admin(id_compte_e) VALUES (?)";
    $stmt2 =mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt2,$sql2) )
    {
        $temps=date("Y/m/d h:i:sa");
        mysqli_stmt_bind_param($stmt2,"d",$id);
        mysqli_stmt_execute($stmt2);

    }
      

 }
    

?>
