<?php
    function start(){
        session_start();
        if(!isset($_SESSION['username'])){
            header('Location: ../components/LogReg/adminLogin.php?er=2');
        }


    }

    function error(string $code, string $message): void {
        if(isset($_GET['er'])) {
            if($code == $_GET['er']) {
                echo "<div class='error'>" . $message . "</div>";
            }
        }
    }
