<?php
include 'header.php';
?>

<form action='processMain.php' method='post'>
    <input type='text' name='username' placeholder='jmeno'>
    <input type='password' name='password' placeholder='heslo'>
    <button name='submit'>odeslat</button>
</form>
<div class='errWind'>
<?php 
logoff();
errMes();
    ?>
</div>

</body>
</html>

