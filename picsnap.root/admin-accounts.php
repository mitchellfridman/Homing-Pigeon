<?php
// Stores the (string) file name of the current page in a variable to use in header.php
$currentPage = basename(__FILE__, '.php');
require 'header.php';
?>

<div class="container-fluid mt-4">
  <table class='table table-striped table-hover' id="books_table" data-show-fullscreen="true" data-show-columns="true"
    data-show-pagination-switch="true" data-pagination="true" data-show-columns-toggle-all="true"
    data-filter-control="true" data-show-search-clear-button="true">
    <thead>
      <tr>
        <th scope="col" sortable='true' , filterControl='input' , filterStrictSearch='false'>ID #</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Address</th>
        <th scope="col">Type</th>
        <th scope="col">Blocked?</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php include('./includes/admin-account.ini.php');
      ?>

    </tbody>
  </table>
</div>
</body>

</html>