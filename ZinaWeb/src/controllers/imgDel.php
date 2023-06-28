<?php
require '../zinaAPI.php';
session_start();
$dataDel=new DbGall();
$dataDel->addError('obrázek smazán');
$dataDel->del();
header('Location: ../components/gallery/adminGal.php?iid='.$dataDel->getInstance());
?>