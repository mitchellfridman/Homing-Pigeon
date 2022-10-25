<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
require 'header.php';
?>

<?php
// session_start() provided by header.php
// $_SESSION["id"] = 1;
// $_SESSION["email"] = "chaoukirami@live.ca";
require_once 'includes/functions.inc.php';
$dbresult = filter_postcards();
add_postcard();
?>

<div class="container mt-4">
  <p class="text-center"><i class="text-danger">You can choose the number of postcards to order in cart before
      checkout</i></p>
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
    create_postcard_cards($dbresult)
    ?>
  </div>
</div>


</body>

</html>