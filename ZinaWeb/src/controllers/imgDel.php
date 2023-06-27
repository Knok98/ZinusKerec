<?php
require '../zinaAPI.php';

$dataDel=new DbGall();

$dataDel->del();
$dataDel->addError('obrázek smazán');
header('Location: ../components/gallery/adminGal.php?er=7');
?>