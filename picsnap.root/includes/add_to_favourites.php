<?php
session_start();

if (isset($_GET['id'])) {

    require "config/db_config.php";

    $postcard_id = $_GET['id'];
    $origin = $_GET['origin'];
    $userid = $_SESSION['id'];

    $addquery = "INSERT INTO favourites(user_id, postcard_id) values ('$userid', '$postcard_id')";

    if(mysqli_query($conn, $addquery)){
        if ($origin == "detail") {
            header("location: ../postcard-detail.php?id=$postcard_id");
        } 
        
        if($origin == "index"){
            header('location: ../index.php');
        }
    
    } else {
        printf("Error message: %s\n", mysqli_error($conn));
    }

}