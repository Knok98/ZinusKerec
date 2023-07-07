<?php
class DbContact extends DbMain{
public $statem=false;
public function addMsg()
{
    $user = $_POST["user"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $contactPurpose = $_POST["contactPurpose"];

    $sql = 'INSERT INTO client_message(name, email, body, category) VALUES ("' . $user . '", "' . $email . '", "' . $message . '", "' . $contactPurpose . '")';

    if(mysqli_query($this->conn, $sql)) {
    $this->statem=true;
    }



}
public function del()
    {
        $id = $_GET['id'];
        $delete = "DELETE FROM client_message WHERE id=" . $id;
        $result = mysqli_query($this->conn, $delete);
    }
}