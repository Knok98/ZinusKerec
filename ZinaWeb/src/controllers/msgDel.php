<?php
require '../zinaAPI.php';
session_start();
$dataDel=new DbContact();
$dataDel->del();
header('Location: ../components/contactForm/adminForm.php');
?>