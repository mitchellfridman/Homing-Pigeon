<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
require 'header.php';
?>

<?php
// Save variables
$userid = $_SESSION['id'];
$sum = 0;
$counter = 1;

// Query to get details on items added by current user
$get_cart_items_query = "SELECT p.id, p.name, p.price, cp.quantity, c.id as cart_id, c.user_id
                          FROM postcards p
                          JOIN carts_postcards cp
                          on p.id = cp.postcard_id
                          JOIN carts c
                          on c.id = cp.cart_id
                          WHERE c.user_id='$userid'";

$result = mysqli_query($conn, $get_cart_items_query)
  or die(mysqli_error($conn));

// If cart isn't empty, calculate sum of product prices
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {
    $sum += ($row['price'] * $row['quantity']);
  }
}
$product_count = mysqli_num_rows($result);
?>

<!-- JS that calls update_cart_items.php
with the cartid, postcardid, and quantity value
to change the quantity of postcards in the cart in the database
everytime the quantity is changed
-->
<script>
$('document').ready(function() {
  const quantities = document.querySelectorAll('#editQuantity');
  quantities.forEach((quantity) => {
    $(quantity).on('change', function() {
      const cartId = $(this).data("cart");
      const postcardId = $(this).data("postcard");
      const quantityValue = quantity.value

      $.ajax({
        url: `./includes/update_cart_items.php?cart=${cartId}&postcard=${postcardId}&value=${quantityValue}`
      });

      location.reload();
    })



  })
});
</script>



<div class="container mt-4">
  <h3 class="text-center">Cart</h3>
  <div class="row justify-content-center mt-4">
    <div class="col-12 col-lg-8">
      <table class="table">
        <thead>
          <tr>
            <th scope="col"> </th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total</th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($conn, $get_cart_items_query)
            or die(mysqli_error($conn));
          while ($row = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $counter ?></td>
            <td><?php echo $row['name'] ?></td>
            <td>$<?php echo $row['price'] ?></td>
            <td>
              <input id="editQuantity" data-cart="<?php echo $row['cart_id'] ?>"
                data-postcard="<?php echo $row['id'] ?>" class="form-control" type="number"
                value="<?php echo $row['quantity'] ?>" aria-label="default input example" min="1" max="100">
            </td>
            <td><?php echo "$" . ($row['price'] * $row['quantity']) ?></td>
            <td><a href='./includes/remove_from_cart.php?id=<?php echo $row['id'] ?>'><i
                  class="bi bi-trash3-fill"></i></a></td>
          </tr>
          <?php
            $counter += 1;
          }
          ?>
        </tbody>
      </table>
      <p>Subtotal<?php echo " \${$sum}" ?></p>
      <p>Tax 15%</p>
      <?php
      $tax = $sum * 15 / 100;
      $total = $sum + $tax;
      ?>
      <p><b>Total <?php echo "$" . number_format((float)$total, 2, '.', '') ?></b></p>
      <a class="btn btn-block btn-primary mt-4" href="payment.php">Checkout</a>
    </div>
  </div>
</div>




<div>

  <!-- Put in this a checkout button and scripts at the bottom of the page  -->
  <div>
    <!-- <h1>Stripe Checkout</h1> -->
    <!-- <button class="btn btn-block btn-primary" id="btn">Checkout</button> -->
    <!-- <script src="http://js.stripe.com/v3/"></script>
    <script src="script.js"></script> -->

  </div>