
<?php
require '../zinaAPI.php';
require 'adminFunc.php';
$registr=new DbTorii;
$data = [];

function comp($str1,$str2){
    if($str1!==$str2){
        return true;
    }
    return false;
}
//jmeno
if (empty($_POST['name'])) {
    $registr->error['name'] = 'Vyžadováno přihlašovací jméno.';
}
if (strlen($_POST['name'])<4) {
    $registr->error['name'] = 'Jméno je příliš krátké.';
}
if (preg_match("/\W/", $_POST['name'])) {
    $registr->error['name'] = 'Jméno nesmí obsahovat speciální znaky.';
}

//
if (empty($_POST['pass'])) {
    $registr->error['pass'] = 'Vyžadováno heslo ';
}
if (comp($_POST['pass'],$_POST['rewind'])) {
    $registr->error['rewind'] = 'se neschodují';
}
if (strlen($_POST['pass'])<8) {
    $registr->error['pass'][] = ' nejméně 8 znaků';
}
if (!preg_match("/\d/", $_POST['pass'])) {
    $registr->error['pass'][] = " 1 číslo";
}
if (!preg_match("/[A-Z]/", $_POST['pass'])) {
    $registr->error['pass'][] = " 1 velké písmeno";
}
if (!preg_match("/[a-z]/", $_POST['pass'])) {
    $registr->error['pass'][] = " 1 malé písmeno";
}
if (!preg_match("/\W/", $_POST['pass'])) {
    $registr->error['pass'][] = " 1 speciální znak";
}
if (preg_match("/\s/", $_POST['pass'])) {
    $registr->error['pass'][] = "nesmí obsahovat mezeru.";
}

if (!empty($registr->error)) {
    $data['success'] = false;
    $data['errors'] = $registr->error;
} else {
    $data['success'] = true;
    $data['message'] = 'uživatel byl přidán';
}

echo json_encode($data);