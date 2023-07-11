<?php
require '../zinaAPI.php';
$message=new DbContact;
$data = [];
$error=[];

if ($_POST['user'] && $_POST['email'] && $_POST['message'] && $_POST['contactPurpose']) {
    $message->addMsg();
    $data['success'] = true;

}else{
    $data['success'] = false;
}
echo json_encode($data);
