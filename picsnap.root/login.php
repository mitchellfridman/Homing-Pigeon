<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
include_once "header.php";
?>

<div class="container mt-4">
  <div class="row">
    <div class="col-xs-6 col-xs-offset-3 w-50 mx-auto">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3>LOGIN</h3>
                </div>
                <div class="panel-body">
                    <p>Login to favourite a postcard.</p>
                    <form method="post" action="./includes/login.inc.php">
                        <div class="form-group my-2">
                            <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$">
                        </div>
                        <div class="form-group my-2">
                            <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                        </div>
                        <div class="form-group my-2">
                            <input type="submit" value="Login" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="panel-footer">Don't have an account yet? <a href="signup.php">Register</a></div>
            </div>
       
    </div>
  </div>
</div>

<?php
if (isset($_GET['error'])) {
  if ($_GET['error'] == 'emptyfield') {
    echo '<h2> Please fill in all the fields</h2>';
  }
  if ($_GET['error'] == 'wronguserinfo') {
    echo '<h2> Wrong account information, please try again or sign-up!</h2>';
  }
}

