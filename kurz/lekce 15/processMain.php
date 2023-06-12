<?php
session_start();
$userID = 'admin';
$passID = '1234';


if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $userID && $_POST['password'] == $passID) {
        $_SESSION['username'] = $userID;
        header('Location: ukolMain.php');
    } else {
        header('Location: loginMain.php?err=1');
    }
} else {
    header('Location: loginMain.php?err=2');
}
if(isset($_POST['logoff'])){
    session_unset();
    session_destroy();
    header('Location: loginMain.php?ok=1');
}