<?php
    function start(){
        session_start();
        if(!isset($_SESSION['username'])){
            header('Location: loginMain.php?err=2');
        }


    }

    function errMes(){
        if($_GET['err']==1)
            {echo 'Chybné přihlašovací jméno, nebo heslo.';}
        if($_GET['err']==2)
            {echo 'Pro přístup se musíte přihlásit.';}
    }

    function WarnOff(){
        ini_set('display_errors',0);
        error_reporting(E_ERROR|E_WARNING|E_PARSE);
    }
    function logoff(){
        if($_GET['ok']==1)
        {echo 'Odhlášeno';}
    }