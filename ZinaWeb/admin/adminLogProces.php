<?php
session_start();
$userID = 'admin';
$passID = '1234';


if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == $userID && $_POST['password'] == $passID) {
        $_SESSION['username'] = $userID;
        header('Location: adminMain.php');
    } else {
        header('Location: adminLogin.php?err=1');
    }
} else {
    header('Location: adminLogin.php?err=2');
}
