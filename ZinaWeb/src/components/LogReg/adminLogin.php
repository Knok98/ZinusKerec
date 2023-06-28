<?php
require '../../controllers/adminFunc.php';
include '../adminHeader.php';
session_start();
?>

<link rel='stylesheet' href='../../../css/adminStyles.css'>
<form action='../../controllers/adminLogProces.php' method='post' class='form'>
    <input type='text' name='username' placeholder='jmeno'>
    <input type='password' name='password' placeholder='heslo'>
    <button name='submit'>odeslat</button>
</form>
<div class='errWind'>
<?php 
if (isset($_GET['iid'])) {
    if (isset($_SESSION[$_GET['iid']])) {
        $error = json_decode($_SESSION[$_GET['iid']]);
        foreach ($error as $err) {
            echo "<div>" . $err . "</div>";
        }
        unset($_SESSION[$_GET['iid']]);
    }
}
    error('0','Úspěšně odhlášeno');
    ?>
</div>

</body>
</html>
