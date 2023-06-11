<?php
include 'adminHeader.php';
?>

<form action='processMain.php' method='post'>
    <input type='text' name='username' placeholder='jmeno'>
    <input type='password' name='password' placeholder='heslo'>
    <button name='submit'>odeslat</button>
</form>
<div class='errWind'>
<?php 
    error('1', 'Špatné přihlašovací údaje');
    error('2', 'Pro vstup do profilu musíte být přihlášen/a.');
    ?>
</div>

</body>
</html>
