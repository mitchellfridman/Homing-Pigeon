<?php
session_start();

require "config/db_config.php";
require "./functions.inc.php";


echo "hello from update";


// Save variables
$userid = $_SESSION['id'];
$cart = $_GET['cart'];
$postcard = $_GET['postcard'];
$value = $_GET['value'];

// Query to update item quantity from carts_postcards
$update_item_query = "UPDATE carts_postcards
                      SET quantity='$value'
                      WHERE cart_id='$cart'
                      and postcard_id='$postcard'";

mysqli_query($conn, $update_item_query);

// Direct to cart page
header('Location: ../checkout.php');