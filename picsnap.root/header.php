<?php
ob_start();
// <!-- PROJECT INFO
// Web Development Final Team Project for Pargol Poshtareh
// Developed by: Ali Nehme, Alina Gotcherian, Edgar Townsend, Mitchell Fridman, Rami Chaouki
// Last Update: July 1, 2022
// -->

// <!-- FILE INFO
// header.php file for Homing Pigeon
// Includes HTML head, navbar and header
// to be included at the top of all html pages of the project
// (insert with php require)
// Closing </body> & </html> tags must be provided by files that require header
// -->


session_start();
// session_unset(); // Uncomment to simulate "logout"
// session_destroy(); // Uncomment to simulate "logout"
include_once "includes/config/db_config.php";
require_once 'includes/functions.inc.php';

?>

<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Meta information -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Title & Description -->
  <title>
    Homing Pigeon | <?php echo $currentPage ?>
  </title>
  <meta name="description" content="Discover postcard designs from Montreal artists">
  <!-- Authors -->
  <meta name="author" content="Ali Nehme, Alina Gotcherian Edgar Townsend, Mitchell Fridman, Rami Chaouki">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="images/homing_pigeon_logo.png" />

  <!-- LINK TO BOOTSTRAP CSS LIBRARY -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <!-- LINK TO BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <!-- LINK TO FONT-AWESOME ICONS -->
  <script src="https://kit.fontawesome.com/c3d51d9f30.js" crossorigin="anonymous"></script>

  <!-- LINK TO LOCAL STYLESHEET -->
  <link rel="stylesheet" href="css/style.css">

  <!-- LINK TO JQUERY -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<!-- End of head / Start of body -->

<body>
  <!-- Navbar -->
  <nav id="nav-content-target" class="navbar navbar-expand-sm navbar-light navbar-homingpigeon">
    <div id="nav-content" class="container-fluid">

      <!-- Nav logo redirects to a different page depending on if user is an admin or customer -->
      <?php if (isset($_SESSION['email']) && is_admin()) { ?>

      <a class="navbar-brand d-flex align-items-center" href="admin-accounts.php">
        <img class="me-1" src="images/homing_pigeon_logo.png" alt="Homing Pigeon logo" />
        <p class="m-0 nav-logo">Homing Pigeon</p>
      </a>

      <?php } else { ?>

      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <img class="me-1" src="images/homing_pigeon_logo.png" alt="Homing Pigeon logo" />
        <p class="m-0 nav-logo">Homing Pigeon</p>
      </a>

      <?php } ?>

      <!-- "Hamburger menu" button toggled for mobile layout -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Nav links -->
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <?php
          /**
           * Check if user is logged in
           */
          if (isset($_SESSION['email'])) {
            /**
             * Check if user is an admin
             */
            if (is_admin()) {
          ?>
          <!-- Admin drop down -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="bi bi-sliders me-1"></i>
              admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="admin-accounts.php">accounts</a></li>
              <li><a class="dropdown-item" href="admin-postcard.php">postcards</a></li>
            </ul>
          </li>
          <!-- Profile -->
          <li class="nav-item">
            <a class="nav-link" href="profile.php">profile</a>
          </li>
          <!-- Logout -->
          <li class="nav-item">
            <a class="nav-link" href="includes/logout.inc.php">logout</a>
          </li>
          <?php
            } else {
              /**
               * User is logged in but NOT an admin
               */
            ?>
          <!-- Favorites -->
          <li class="nav-item">
            <a class="nav-link" href="favourites.php">favorites</a>
          </li>
          <!-- Cart -->
          <li class="nav-item">
            <a class="nav-link" href="checkout.php">cart</a>
          </li>
          <!-- Profile -->
          <li class="nav-item">
            <a class="nav-link" href="profile.php">profile</a>
          </li>
          <!-- Logout -->
          <li class="nav-item">
            <a class="nav-link" href="includes/logout.inc.php">logout</a>
          </li>
          <?php
            }
          } else {
            /**
             * If a user is NOT logged in (no session email)
             * then we will show these nav options --
             */
            ?>
          <!-- Login -->
          <li class="nav-item">
            <a class="nav-link" href="login.php">login</a>
          </li>
          <!-- Signup -->
          <li class="nav-item">
            <a class="nav-link" href="signup.php">signup</a>
          </li>
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End of Navbar / Start of Header -->
  <?php
  /**
   * Only displays header on the index page
   */
  if ($currentPage == "index") {
  ?>
  <header>
    <div>
      <h2>Welcome to Homing Pigeon Studios</h2>
      <p>Discover postcard designs from Montreal artists</p>
    </div>
  </header>
  <?php
  }
  ?>
  <!-- bootstap js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>

  <!-- Closing </body> & </html> tags provided by files that require header -->