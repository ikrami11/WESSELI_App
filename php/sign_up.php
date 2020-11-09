<?php 
session_start();
      //  if (isset($_POST['signup'])) {
            # code..
                        $nom = $_POST['nom'];
                     require 'dbh.inc.php';

            $fil=$_FILES['file'];
      $file_name=$fil['name'];
      $file_tmp=$fil['tmp_name'];
      $file_size=$fil['size'];
      $file_error=$fil['error'];
      $file_type=$fil['type'];
      $message="";

      $_SESSION['nom']="";



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
                            
                            header("Location: ../index.php");

                            exit();
                        } 
                        else
                        {
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
                                $_SESSION['nom']= $nom;
                                $_SESSION['prenom']= $prenom;
                                //mysqli_stmt_store_result($stmt);
                                
                                            if($file_size>0){
                                            $file_ext =explode('.', $file_name);
                                            $ext=end($file_ext);
                                            if ($file_error==0) {

                                                $filenewname=uniqid('',true).".".$ext;
                                                $file_destination='officiel/'.$filenewname;
                                                move_uploaded_file($file_tmp, $file_destination);
                                                $sql2="UPDATE compte SET photo = ? WHERE mail=?";
                                                $stmt2 =mysqli_stmt_init($conn);

                                                if (mysqli_stmt_prepare($stmt2,$sql2)){

                                                        mysqli_stmt_bind_param($stmt2,"ss",$filenewname,$email);//not yet
                                                        mysqli_stmt_execute($stmt2);}
                                                    }
                                                }
                                                header("location: ../index.php");
                            # code...
                        }
                        # code...
                    }
                }
            }
            header("location: ../index.php");
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        //}
        /*
        $stmt = mysqli_prepare($link, "SELECT Code, Name FROM Country ORDER BY Name LIMIT 5"))
            while (mysqli_stmt_fetch($stmt)) {
        printf("%s %s\n", $col1, $col2);
    }*/

?>
