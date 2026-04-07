<?php
session_start();

if(isset($_SESSION['username']) and isset($_SESSION['password'])){

    include "dashboard.php";
}
else{
    include "login.php";
}
?>
