<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
require 'header.php';

require_once 'includes/functions.inc.php';

$current_day = date("Y/m/d");

?>

<div class="container">
  <br>
  <div class="row">
    <div class="col-xs-4 col-xs-offset-4">

      <h1>Payment Information</h1>
      <form method="post" action="successful-purchase.php">
        <div id="paymentInfo">

          <label for="card-number" class="form-label">Card Number</label>
          <input type="text" class="form-control" id="card-number" size="35" maxlength="16" required="required"
            pattern="^[0-9]{16}$">
          <br>
          <label for="card-holder" class="form-label">Card Holder</label>
          <input type="text" class="form-control" id="card-holder" size="35" maxlength="100" pattern="[A-z\s]+"
            required>
          <br>
          <label for="cvs" class="form-label">CVS <sup class="bi bi-info-lg"
              title="numbers on the back of the card">i</sup></label>
          <input type="text" class="form-control" id="cvs" size="4" maxlength="4" required pattern="[0-9]{3,4}">
          <br>
          <label for="expiry-date">Expiry Date</label>
          <input type="month" id="expiry-date" name="expiry-date" required min="<?php echo $current_day ?>">
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="termsAndConditions" required
            name="Terms and Conditions">
          <label class="form-check-label" for="termsAndConditions">
            By submitting this form you agree with our <a href="terms-and-conditions.html">Terms and
              Conditions</a>
          </label>
        </div>
        <br />
        <button type="submit" name="submit_payment" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>