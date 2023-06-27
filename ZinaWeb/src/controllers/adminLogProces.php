<?php
session_start();
require '../zinaAPI.php';

$user = $_POST['username'];
$passInput = hash('sha256', $_POST['password']);

$userLog = new Dbtorii();
if ($userLog->__construct()) {
    $sql = "SELECT password FROM admin WHERE name='" . $user . "'";
    $result = $userLog->process($sql);


    if ($result) {
        $num_row = mysqli_num_rows($result);
        $row = $result->fetch_assoc();
        if ($num_row == 1) {
            $password = $row['password'];
            if ($password == $passInput) {
                $_SESSION['username'] = $user;
                
                $sucess = true;
            } else {
                $userLog->addError('špatne heslo');
            }
        } else {
            $userLog->addError('Uživatel neexistuje, nebo jste zadali špatné jméno');
        }
    } else {
        $userLog->addError('žádné výsledky');
    }
}
if (count($userLog->error) != 0) {
    foreach ($userLog->error as $value) {
        echo $value;
        echo '<br>';
    }
    header("Location: ../components/adminLogin.php");
}
header("Location: ../components/adminMain.php");
