<?php
include('dashboard/connection.php');
$db->select('customers_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>


<!-- SHIPPING info -->
<h6 class="margin-top-50">Shipping Information</h6>

<ul class="row">
  <li class="col-sm-6">
    <label>First name *
      <input type="text" class="form-control" name="orderShipFirstName" id="orderShipFirstName" placeholder="" required="" value="<?php echo $res['customerFirstName'] ?>">
    </label>
  </li>
  <li class="col-sm-6">
    <label>Last name *
      <input type="text" class="form-control" name="orderShipLastName" id="orderShipLastName" placeholder="" required="" value="<?php echo $res['customerLastName'] ?>">
    </label>
  </li>
  <li class="col-sm-12">
    <label>Address * <small>(building number, street name, city, province)</small>
      <input type="text" class="form-control" name="orderShippingAddress" id="orderShippingAddress" placeholder="" required="" value="<?php echo $res['customerAddress'] ?>">
    </label>
  </li>
  <li class="col-sm-6">
    <label>Phone Number *
      <input type="text" class="form-control" name="orderShipPhoneNumber" id="orderShipPhoneNumber" placeholder="" required="" value="<?php echo $res['customerPhoneNumber'] ?>">
    </label>
  </li>

  <li class="col-sm-6">
    <label>Email *
      <input type="text" class="form-control" name="orderShipEmail" id="orderShipEmail" placeholder="" required="" value="<?php echo $res['customerEmail'] ?>">
    </label>
  </li>
  
</ul>
</div>