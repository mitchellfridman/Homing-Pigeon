<?php
// include_once "includes/config/db_config.php";
session_start();
session_unset();
session_destroy();

header('location:../index.php');