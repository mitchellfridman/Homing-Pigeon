<?php
session_start();

require "config/db_config.php";
require "./functions.inc.php";

if (isset($_GET['id'])) {
    $postcard_id = $_GET['id'];
    $origin = $_GET['origin'];
    $cart_id = unpaid_cart_id();

    $addquery = "INSERT INTO carts_postcards(cart_id, postcard_id, quantity) values ('$cart_id', '$postcard_id', '1')";

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
