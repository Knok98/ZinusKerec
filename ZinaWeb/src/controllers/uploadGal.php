<?php
require 'adminFunc.php';
require '../zinaAPI.php';

$error=[];
$success=false;
$dataSave=new DbGall;
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
                $fileDestination = '../../data/galUploads/' . $fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                
                $dataSave->save($fileDestination);
                $dataSave->addError('Nahrání proběhlo úspěšně');
                header('Location: ../components/gallery/adminGal.php?er=3');
            } else {
                $dataSave->addError('obrázek je příliš velký');
                header('Location: ../components/gallery/adminGal.php?er=4');
            }
        } else {
            $dataSave->addError('Chyba při nahrávání');
            header('Location: ../components/gallery/adminGal.php?er=5');
        }
    } else {
        $dataSave->addError('obrázek není daného typu');
        header('Location: ../components/gallery/adminGal.php?er=6');
    }
}
//header('Location: ../components/gallery/adminGal.php?iid=' . $dataSave->getInstance());
