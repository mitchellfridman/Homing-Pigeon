<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
require 'header.php';
require_once 'includes/functions.inc.php';
$userFavourites = filter_favourite_postcards();
remove_favourite();
add_postcard();
?>

<div class="container mt-4">
  <h3><?php echo get_user_name() . "'s Favourites" ?></h3>

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="row w-100 mt-4">
    <div class="col">
      <input type="text" name="name" class="form-control">
    </div>
    <div class="col">
      <input type="submit" value="Filter by name" class="btn btn-light">
    </div>
    <div class="col">
      <input type="text" name="artist" class="form-control">
    </div>
    <div class="col">
      <input type="submit" value="Filter by artist" class="btn btn-light">
    </div>
    <input type="submit" name="reset" value="Reset" class="btn btn-secondary col">
  </form>
  <br>
  <div class="row mt-4">
    <?php
    if (mysqli_num_rows($userFavourites) < 1) {
      echo "<p>Nothing found 😢</p>";
    } else {
      create_fav_cards($userFavourites)
    ?>
  </div>
  <?php
    }
?>

</div>



</body>

</html>