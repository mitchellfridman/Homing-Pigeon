<?php

if(isset($_POST['email'])){
    $uname=$_POST["email"];
    $pwd=$_POST["password"];

    require_once './config/db_config.php';
    require_once 'functions.inc.php';

    if(isFieldEmptyLogin($uname,$pwd)!==false){
        header("location:../login.php?error=emptyfield");
        exit();
    }

    loginUser($conn,$uname,$pwd);
}