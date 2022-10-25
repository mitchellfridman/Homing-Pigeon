<?php

$err = [];
// $err["name_error"] = "<br>Old password does not match the entered one";

echo var_dump(empty($err));
echo "<br>";
echo print_r($err);
echo "<br>";
echo $err["name_error"];