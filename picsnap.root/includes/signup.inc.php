<?php
require_once "functions.inc.php";
require_once "./config/db_config.php";

if(isset($_POST['submit'])){
    $fname=$_POST["first_name"];
    $lname=$_POST["last_name"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $pwd=$_POST["password"];
    $pwdr=$_POST["confirm_password"];
    
    if(isFieldEmpty($fname,$lname,$email,$address,$pwd,$pwdr)!==false){
        header("location: ../signup.php?error=emptyfield");
        exit();
    }

    if(isEmailValid($email)===false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(isPwdNotMatch($pwd,$pwdr)!==false){
        header("location: ../signup.php?error=pwddontmatch");
        exit();
    }

    if(isUIDExists($conn,$email)!==false){
        header("location: ../signup.php?error=emailalreadyexists");
        exit();
    }

    createNewUser($conn,$fname,$lname,$email,$pwd,$address);
}
