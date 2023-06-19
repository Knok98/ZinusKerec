<?php
include 'adminHeader.php';
?>

<form action='adminLogProces.php' method='post'>
    <input type='text' name='username' placeholder='jmeno'>
    <input type='password' onchange="validity()"id='password'name='password' placeholder='heslo'>
    <input type='password' onchange="rewind()"id='rewind'name='passwordRew' placeholder='potvrdit heslo'>
    <p id='msg'></p>
    <button name='submit' disabled id='submit'>odeslat</button>
</form>


</body>
</html>