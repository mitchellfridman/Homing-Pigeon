<?php
session_start();

require "config/db_config.php";
require "./functions.inc.php";

// Save variables
$userid = $_SESSION['id'];
$itemid = $_GET['id'];

// Query to delete item from carts_postcards
$delete_user_item_query = "DELETE carts_postcards
                            FROM carts_postcards
                            JOIN carts
                            ON carts_postcards.cart_id = carts.id
                            WHERE carts_postcards.postcard_id='$itemid'
                            and carts.user_id='$userid'";

mysqli_query($conn, $delete_user_item_query);

// Direct to cart page
header('Location: ../checkout.php');