<?php include 'header.php';?>


<form action='process.php' method='get'>
    <input name='number' type='number' placeholder="Číslo">
    <button name='button' type='submit'>Zpracuj</button>

<?php 
if(array_key_exists('Číslo',$_GET)){echo $_GET ['number'];}
else{echo "Nebyla nalezena hodnota";}

?>






</body>
</html>