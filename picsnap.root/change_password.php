<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
require 'header.php';

$Errors = $err = ["empty_fields" => "", "old_password" => "", "new_password" => "", "confirm_password" => "", "mysql_error" => "", "successful" => ""];
if (array_key_exists('change_password', $_POST)) {
  $Errors = change_password();
}
?>

<div class="container">
  <br>
  <div>
    <p class="text-danger fst-italic"><?php echo $Errors["empty_fields"] . "<br>" . $Errors["mysql_error"] ?></p>
    <p class="text-success fst-italic"><?php echo $Errors["successful"] ?></p>
  </div>
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4">
      <h1>Profile Information</h1>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="mb-3 row">
          <label for="old_password" class="fw-bold col-sm-2 col-form-label">Old Password</label>
          <div class="col-sm-10">
            <input type="password" name="old_password" class="form-control" id="old_password" pattern=".{6,}">
            <span class="text-danger fst-italic"><?php echo $Errors["old_password"] ?></span>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="new_password" class="fw-bold col-sm-2 col-form-label">New Password</label>
          <div class="col-sm-10">
            <input type="password" name="new_password" class="form-control" id="new_password" pattern=".{6,}">
            <span class="text-danger fst-italic"><?php echo $Errors["new_password"] ?></span>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="confirm_password" class="fw-bold col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-10">
            <input type="password" name="confirm_password" class="form-control" id="confirm_password" pattern=".{6,}">
            <span class="text-danger fst-italic"><?php echo $Errors["confirm_password"] ?></span>
          </div>
        </div>

        <button type="submit" name="change_password" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>