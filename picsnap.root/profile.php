<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
require 'header.php';


require_once 'includes/functions.inc.php';

$dbresult = fetch_db_table_by_id("users", $_SESSION["id"]);

?>

<div class="container">
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4">
      <h1>Profile Information</h1>
      <div class="mb-3 row">
        <label for="first_name" class="fw-bold col-sm-2 col-form-label">First Name</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="first_name"
            value="<?php echo $dbresult['first_name'] ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="last_name" class="fw-bold col-sm-2 col-form-label">Last Name</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="last_name"
            value="<?php echo $dbresult['last_name'] ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="email" class="fw-bold col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="email"
            value="<?php echo $dbresult['email'] ?>">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="address" class="fw-bold col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" id="address"
            value="<?php echo $dbresult['address'] ?>">
        </div>
      </div>

      <div class="mb-3 row">
        <label for="password" class="fw-bold col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" readonly class="form-control-plaintext" id="password"
            value="<?php echo $dbresult['password'] ?>">
        </div>
      </div>

      <a href="edit_profile.php" role="button" class="btn btn-primary">Edit Profile</a>
      <a href="change_password.php" role="button" class="btn btn-primary">Change Password</a>
    </div>
  </div>