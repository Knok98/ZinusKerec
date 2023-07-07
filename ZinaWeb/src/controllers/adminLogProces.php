<?php
session_start();
require '../zinaAPI.php';

$user = $_POST['username'];
$passInput = hash('sha256', $_POST['password']);

$userLog = new DbTorii();
if ($userLog->__construct()) {
    $sql = "SELECT password FROM admin WHERE name='" . $user . "'";
    $result = $userLog->process($sql,"single");


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
if (count($userLog->error) == null) {
    header("Location: ../components/adminMain.php");
}else{header('Location: ../components/LogReg/adminLogin.php?iid=' . $userLog->getInstance());}
    