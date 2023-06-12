<?php
require 'adminFunc.php';
require 'galConnect.php';

if (isset($_FILES['upload'])) {
    $file = $_FILES['upload'];
    $fileName = $_FILES['upload']['name'];
    $fileTmpName = $_FILES['upload']['tmp_name'];
    $fileSize = $_FILES['upload']['size'];
    $fileError = $_FILES['upload']['error'];
    $fileType = $_FILES['upload']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'gif');

    if (in_array($fileActualExt, $allowed)) {

        if ($fileError === 0) {

            if ($fileSize < 5000000) {
                $fileNameNew = uniqid() . "." . $fileActualExt;
                $fileDestination = 'galUploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                
                $date = date("Y-m-d h:i:sa");
                $sql = 'INSERT INTO gallery(odkaz,datum) VALUES ("' . $fileDestination . '", "' . $date . '")';

                if (mysqli_query($con, $sql)) {
                    echo " Record has been saved";
                }


                header('Location: adminGal.php?er=3');
            } else {
                header('Location: adminGal.php?er=4');
            }
        } else {
            header('Location: adminGal.php?er=5');
        }
    } else {
        header('Location: adminGal.php?er=6');
    }
}
