

<?php
session_start();

if(isset($_POST['submit_colis'])) {
    $Host = "localhost";
    $Host_user = "root";
    $Host_pswd = "";
    $database = "projet2cp";

    $connect = mysqli_connect($Host, $Host_user, $Host_pswd, $database);

    if (!$connect) {
        die("la connexion a échoué" . mysqli_connect_error());
        exit();
    } else{
        $id_compte_e = $_SESSION['id_compte'];
        $nom_colis = $_POST['N_colis'];
        $taille_colis = $_POST['taille_colis'];
        $poid_colis = $_POST['poid_colis'];
        $text_demande = $_POST['text_demande'];
        $date_annonce = date("Y-m-d");
        $date_depart = $_POST['from_date'];
        $date_arrive = $_POST['to_date'];
        $adr_depart = $_POST['@_d'];
        $adr_arrive = $_POST['@_a'];
        $willaya_d = $_POST['willaya_d'];
        $willaya_a = $_POST['willaya_a'];
        $demande_special = $_POST['text_demande'];
        if( empty($nom_colis)) {
            header("Location: ./index.php?error=nom_colis_vide");
            exit();
        }elseif( empty($poid_colis) || empty($taille_colis) ){
            header("Location: ./index.php?error=poid_ou_taille_vide&nom_colis=".$nom_colis);
            exit();

        }elseif ((isset($_POST['demande_special']) AND empty($demande_special)) OR (!isset($_POST['demande_special']) AND !empty($demande_special)) ) {
            header("Location: ./index.php?error=demande_special");
            exit();
        }elseif( empty($date_depart) || empty($date_arrive)  ){
            header("Location: ./index.php?error=date");
            exit();
        }elseif( empty($willaya_d) || empty($willaya_a)  ){
            header("Location: ./index.php?error=addrese ");
            exit();
        }
        else{

            $requet_trajet= "INSERT INTO `trajet`(`date_annonce`, `id_compte`, `willaya_d`, `willaya_a` , `lieux_depart`, `lieux_arrive`)
            VALUES ('{$date_annonce}',{$id_compte_e},'{$willaya_d}','{$willaya_a}','{$adr_depart}','{$adr_arrive}')";
            if (mysqli_query($connect, $requet_trajet)) {
                $id_trajet = mysqli_insert_id($connect);
                $file_Name = $_FILES['photo_colis']['name'];
                $file_Tmp = $_FILES['photo_colis']['tmp_name'];
                $file_size = $_FILES['photo_colis']['size'];
                $file_error = $_FILES['photo_colis']['error'];
                $file_type = $_FILES['photo_colis']['type'];
                $file_ext = explode(".",$file_Name);
                $actual_ext = strtolower(end($file_ext));
                $allowed = array('jpg','jpeg','png');
                if(in_array($actual_ext,$allowed)){
                    if ($file_error===0){
                        if($file_size < 1000000 ){
                            $actual_file_name = uniqid("",true);
                            $actual_file_name = $actual_file_name.".".$actual_ext ;
                            $file_destination ="img/".$actual_file_name ;
                            move_uploaded_file($file_Tmp , $file_destination);
                        }
                    }
                }
                $requet_colis= "INSERT INTO `colis`(`date_annonce`, `nom`, `id_compte_e`, `id_trajet`, `date_envoi`, `date_depot`, `taille`, `poids`, `demande_spec` , `photo`) 
                VALUES ('{$date_annonce}','{$nom_colis}','{$id_compte_e}','{$id_trajet}','{$date_depart}','{$date_arrive}','{$taille_colis}','{$poid_colis}','{$demande_special}','{$file_destination}')";
                if (mysqli_query($connect, $requet_colis)) {
                    header("Location: ./index.php?annonce=success");
                } else {
                    echo "Error: " .$requet_colis. "<br>" . mysqli_error($connect);
                }
            } else {
                echo "Error: " . $requet_trajet . "<br>" . mysqli_error($connect);
            }
        }
        mysqli_close($connect);
    }

}



