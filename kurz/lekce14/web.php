
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form action='web.php' method='post'>
<input name='username' type='text' palceholder='jmeno'>
<input name='password' type="password" placeholder='heslo'>
<button type='submit'>login</button>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $ok=true;

if(empty($username)){
    echo'fill user';
    $ok=false;
}
if(empty($password)){
    echo'fill password';
    $ok=false;
}
if($ok==true){
    if($username=='admin'&& $password=='1234'){
        echo 'login success';

    }
    else{
        echo'access denied';
    }
}
}

?>

</body>
</html>



