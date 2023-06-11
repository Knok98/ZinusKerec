<?php
    function start(){
        session_start();
        if(!isset($_SESSION['username'])){
            header('Location: loginMain.php?er=2');
        }


    }

    function logoff(){
        if($_GET['ok']==1)
        {echo 'Odhlášeno';}
    }

    function error(string $code, string $message): void {
        if(isset($_GET['er'])) {
            if($code == $_GET['er']) {
                echo "<div class='error'>" . $message . "</div>";
            }
        }
    }