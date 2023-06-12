<?php
    if(isset($_POST['submit'])){
        $file=$_FILES['upload'];
        $fileName=$_FILES['upload']['name'];
        $fileTmpName=$_FILES['upload']['tmp_name'];
        $fileSize=$_FILES['upload']['size'];
        $fileError=$_FILES['upload']['error'];
        $fileType=$_FILES['upload']['type'];
        
        $fileExt=explode('.',$fileName);
        $fileActualExt= strtolower(end($fileExt));

        $allowed=array('jpg','jpeg','png','pdf','gif');

        if (in_array($fileActualExt,$allowed)){

            if($fileError===0){

                if($fileSize<500000){
                    $fileNameNew=uniqid('',true).".".$fileActualExt;
                    $fileDestination='uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);
                    header('Location: ukolMain.php?uploadsuccess');


                }else{
                    echo"obrázek je příliš velký";
                }

            }else{
                echo"Chyba při nahrávání";
            }

        }else{
            echo"obrázek není daného typu";
        }

    }