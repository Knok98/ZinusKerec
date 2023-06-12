<?php
require 'galConnect.php';
$id=$_GET['id'];


$sql="SELECT * FROM gallery WHERE id=".$id;
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
unlink($row['odkaz']);


$delete="DELETE FROM gallery WHERE id=".$id;
$result=mysqli_query($con,$delete);


header('Location: adminGal.php?er=7');
?>