
<?php
require '../zinaAPI.php';
require 'adminFunc.php';
$registr=new DbTorii;
$data = [];
$error=[];

function comp($str1,$str2){
    if($str1!==$str2){
        return true;
    }
    return false;
}


//jmeno
    $user=$_POST['name'];
    $sql = "SELECT password FROM admin WHERE name='" . $user . "'";
    $result = $registr->process($sql,"single");
        if ($result) {
        $num_row = mysqli_num_rows($result);
        $row = $result->fetch_assoc();
        if ($num_row == 1) {
            $error['name'] = 'uživatel již existuje.';
            }}

if (empty($_POST['name'])) {
    $error['name'] = 'Vyžadováno přihlašovací jméno.';
}
if (strlen($_POST['name'])<4) {
    $error['name'] = 'Jméno je příliš krátké.';
}
if (preg_match("/\W/", $_POST['name'])) {
    $error['name'] = 'Jméno nesmí obsahovat speciální znaky.';
}

//
if (empty($_POST['pass'])) {
    $error['pass'] = 'Vyžadováno heslo ';
}
if (comp($_POST['pass'],$_POST['rewind'])) {
    $error['rewind'] = 'se neschodují';
}
if (strlen($_POST['pass'])<8) {
    $error['pass'][] = ' 8 znaků';
}
if (!preg_match("/\d/", $_POST['pass'])) {
    $error['pass'][] = " 1 číslo";
}
if (!preg_match("/[A-Z]/", $_POST['pass'])) {
    $error['pass'][] = " 1 velké písmeno";
}
if (!preg_match("/[a-z]/", $_POST['pass'])) {
    $error['pass'][] = " 1 malé písmeno";
}
if (!preg_match("/\W/", $_POST['pass'])) {
    $error['pass'][] = " 1 speciální znak";
}
if (preg_match("/\s/", $_POST['pass'])) {
    $error['pass'][] = "nesmí obsahovat mezeru.";
}

if (!empty($error)) {
    $data['success'] = false;
    $data['errors'] = $error;
    
} else {
    $data['success'] = true;
    $data['message'] = 'uživatel byl přidán';

    $pass= hash('sha256', $_POST['pass']);
    $registr->addUser($user,$pass);
    

}

echo json_encode($data);

