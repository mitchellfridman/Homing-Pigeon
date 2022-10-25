<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
require 'header.php';
?>

<?php
// session_start() provided by header.php
// $_SESSION["id"] = 1;
// $_SESSION["email"] = "ali.nehme@gmail.com";
require_once 'includes/functions.inc.php';
if (isset($_GET['id'])) {
  $row = fetch_db_table_by_id("postcards", $_GET['id']);
}
add_postcard();
?>


<!-- body -->
<div class="container mt-4">
  <div class="card text-center">
    <div class="card-header">
      <h4 class="card-title"><?php echo $row['name'] ?></h4>
      <h6 class="card-subtitle mb-2 text-muted"><i>by <?php echo $row['artist'] ?></i></h6>
      <div class="row">
        <div class="col">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item">
              <a class="nav-link active" aria-current="true" data-bs-toggle="tab" href="#recto">Recto image</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#verso">Verso Image</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#description">Description</a>
            </li>
          </ul>
        </div>
        <div class="col">
          <?php if (!isset($_SESSION['email'])) {  ?>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="login.php" role="button" class="btn btn-primary btn-block">Login</a>
          </div>
          <?php
          } else {
          ?>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <?php
              // favourites button
              if (check_if_favourite($row['id'])) {
              ?>
            <a href="#" class="btn btn-block btn-outline-success disabled"><i
                class="fa-solid fa-heart-circle-check"></i> In Favorites</a>
            <?php
              } else {
              ?>
            <form method="post">
              <button class="btn btn-block btn-primary" type="submit" name="add_to_favourites"
                value="<?php echo $row['id'] ?>"><i class="fa-solid fa-heart-circle-plus"></i> Add to favorites</button>
            </form>
            <?php
              }
              // cart button
              if (check_if_in_cart($row['id'])) {
              ?>
            <a href="#" class="btn btn-block btn-success disabled"><i class="fa-solid fa-check"></i> In Cart</a>
            <?php
              } else {
              ?>
            <form method="post">
              <button class="btn btn-block btn-primary" type="submit" name="add_to_cart"
                value="<?php echo $row['id'] ?>"><i class="fa-solid fa-cart-plus"></i> Add to Cart</button>
            </form>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body tab-content">
      <div class="tab-pane active" id="recto">
        <img src='<?php echo "images/artist_" . $row['artist'] . "/recto_" . $row['id'] . ".png" ?>'
          alt='<?php echo $row['name'] . " recto image" ?>' class="card-img">
      </div>
      <div class="tab-pane" id="verso">
        <img src='<?php echo "images/artist_" . $row['artist'] . "/verso_" . $row['id'] . ".png" ?>'
          alt='<?php echo $row['name'] . " verso image" ?>' class="card-img">
      </div>
      <div class="tab-pane" id="description">
        <p class=" card-text"><?php echo $row['description'] ?></p>
      </div>
    </div>
  </div>
</div>


<?php
function testfun()
{
  echo "Your test function on button click is working";
}
if (array_key_exists('test', $_POST)) {
  testfun();
} ?>


</html>