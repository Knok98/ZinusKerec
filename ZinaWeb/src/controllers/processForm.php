<?php
$user = $_POST["user"];
$email = $_POST["email"];
$message = $_POST["message"];
$contactPurpose = $_POST["contactPurpose"];

$host = "localhost";
$dbname = "zinuskerec";
$username = "root";
$password = "";

$this->conn=new mysqli($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Conection Error " . mysqli_connect_error());
}

$sql = 'INSERT INTO client_message(name, email, body, category) VALUES ("' . $user . '", "' . $email . '", "' . $message . '", "' . $contactPurpose . '")';

if (mysqli_query($conn, $sql)) {
    header('Location:../components/index.php?page=booking');
    
}
