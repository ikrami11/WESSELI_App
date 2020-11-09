<?php

if (isset($_POST['download'])) {

    # code...
   /*   $fil=$_FILES['file'];
      $file_name=$fil['name'];
      $file_tmp=$fil['tmp_name'];
      $file_size=$fil['size'];
      $file_error=$fil['error'];
      $file_type=$fil['type'];

      $file_ext =explode('.', $file_name);
      $ext=end($file_ext);
      if ($file_error==0) {
          $filenewname=uniqid('',true).".".$ext;
          $file_destination='officiel/'.$filenewname;
          move_uploaded_file($file_tmp, $file_destination);
          header("yes");
      }*/
      header("Content-type:application/pdf");


// It will be called downloaded.pdf
header("Content-Disposition:attachment;filename=../red-book-fall-of-gondolin.pdf");
readfile("../red-book-fall-of-gondolin.pdf");
header("location : index.php");

}

 
?>