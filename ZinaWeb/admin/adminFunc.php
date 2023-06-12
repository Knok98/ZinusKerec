<?php
    function start(){
        session_start();
        if(!isset($_SESSION['username'])){
            header('Location: adminLogin.php?er=2');
        }


    }

    function error(string $code, string $message): void {
        if(isset($_GET['er'])) {
            if($code == $_GET['er']) {
                echo "<div class='error'>" . $message . "</div>";
            }
        }
    }

    function countPic(){
        $con=mysqli_connect("localhost","root","","zinuskerec");
        $sql="SELECT * from gallery";
        if($result=mysqli_query($con,$sql)){
            $rowcount=mysqli_num_rows($result);
            return $rowcount;
        }
    }
