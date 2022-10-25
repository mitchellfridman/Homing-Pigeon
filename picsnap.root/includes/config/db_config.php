<?php

$servername = 'localhost:3307';
$username = 'root';
$serpass = '';
$databasename = 'homing_pigeon';
$imgDir='http://localhost/picsnap.root/images';
$localImgDir='C:\Users\Rami\Desktop\John Abbott\Web Development 1\HomingPigeonProject\picsnap.root\images';

$conn = mysqli_connect($servername, $username, $serpass, $databasename);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}