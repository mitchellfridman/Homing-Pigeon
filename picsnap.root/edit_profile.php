<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
require 'header.php';
require_once 'includes/functions.inc.php';

$dbresult = fetch_db_table_by_id("users", $_SESSION["id"]);
$Errors = ["empty_fields" => "", "first_name" => "", "last_name" => "", "email" => "", "mysql_error" => "", "successful" => ""];
if (array_key_exists('edit_profile', $_POST)) {
  $Errors = edit_profile();
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
          <label for="first_name" class="fw-bold col-sm-2 col-form-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" name="first_name" class="form-control" id="first_name"
              value="<?php echo $dbresult['first_name'] ?>">
            <span class="text-danger fst-italic"><?php echo $Errors["first_name"] ?></span>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="last_name" class="fw-bold col-sm-2 col-form-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" name="last_name" class="form-control" id="last_name"
              value="<?php echo $dbresult['last_name'] ?>">
            <span class="text-danger fst-italic"><?php echo $Errors["last_name"] ?></span>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="email" class="fw-bold col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="text" name="email" class="form-control" id="email" value="<?php echo $dbresult['email'] ?>">
            <span class="text-danger fst-italic"><?php echo $Errors["email"] ?></span>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="address" class="fw-bold col-sm-2 col-form-label">Address</label>
          <div class="col-sm-10">
            <input type="text" name="address" class="form-control" id="address"
              value="<?php echo $dbresult['address'] ?>">
          </div>
        </div>

        <button type="submit" name="edit_profile" class="btn btn-primary">Submit</button>

      </form>
    </div>
  </div>