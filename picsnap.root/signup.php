<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
include_once "header.php";
require_once "./includes/functions.inc.php";
?>
<div class="container mt-4">
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4 w-50 mx-auto">
      <h3>SIGN UP</h3>
      <form method="post" action="includes/signup.inc.php">
        <div class="form-group my-2">
          <input type="text" class="form-control" name="first_name" placeholder="First Name" required="true">
        </div>
        <div class="form-group my-2">
          <input type="text" class="form-control" name="last_name" placeholder="Last Name" required="true">
        </div>
        <div class="form-group my-2">
          <input type="email" class="form-control" name="email" placeholder="Email" required="true"
            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$">
        </div>

        <div class="form-group my-2">
          <input type="text" class="form-control" name="address" placeholder="Address" required="true">
        </div>
        <div class="form-group my-2">
          <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)"
             required="true" pattern=".{6,}"> 
        </div>
        <div class="form-group my-2">
          <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"
             required="true" pattern=".{6,}"> 
        </div>
        <div class="form-group my-2">
          <input type="submit" class="btn btn-primary" name="submit" value="Sign Up">
        </div>
      </form>
    </div>
  </div>
</div>

<?php
if (isset($_GET['error'])) {
  if ($_GET['error'] == 'emptyfield') {
    echo '<h2> Please fill in all the fields</h2>';
  }
  if ($_GET['error'] == 'invalidemail') {
    echo '<h2> Please enter a valid email</h2>';
  }

  if ($_GET['error'] == 'pwddontmatch') {
    echo '<h2> Please write the same password in both password fields</h2>';
  }

  if ($_GET['error'] == 'emailalreadyexists') {
    echo '<h2> Email already exists</h2>';
  }

  if ($_GET['error'] == 'none') {
    echo '<h2> You have successfully signed up!</h2>';
  }
}