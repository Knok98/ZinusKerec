<link rel="stylesheet" href="css/gallery.css" />
<?php
include 'functions.php';
require 'admin/galConnect.php';
?>

<div id='gallery'>
        <?php 
                $sql="SELECT * FROM gallery ORDER BY id";
                $result=mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    echo "<div class='pic'>";
                    echo  "<a target='_blank' href='admin/".$row["odkaz"]."'>";
                    echo "<img src='admin/".$row["odkaz"]."'></a>";
                    echo "</div>";
                }
                
        ?>
   </div>
