<?php
include('dashboard/connection.php');
?>


  <!-- SHIPPING info -->
<h6 class="margin-top-50">Shipping Information</h6>

<ul class="row">

  <li class="col-sm-6">
    <label>First name *
      <input type="text" class="form-control" name="customerFirstName" id="customerFirstName" placeholder="" required="">
    </label>
  </li>
  <li class="col-sm-6">
    <label>Last name *
      <input type="text" class="form-control" name="customerLastName" id="customerLastName" placeholder="" required="">
    </label>
  </li>
  <li class="col-sm-12">
    <label>Address * <small>(building number, street name, city, province)</small>
      <input type="text" class="form-control" name="customerAddress" id="customerAddress" placeholder="" required="">
    </label>
  </li>
  <li class="col-sm-6">
    <label>Phone Number *
      <input type="text" class="form-control" name="customerPhoneNumber" id="customerPhoneNumber" placeholder="" required="">
    </label>
  </li>


</ul>
</div>