<?php
include('dashboard/connection.php');
$db->select('customers_view','*',NULL,'customerId = "' . $_SESSION['customerId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>


<!-- payment info -->
<label class="margin-top-50">Payment Form</label>

  <ul class="row">
    <li class="col-sm-4">
      <label>Amount *
        <input  style="height: 45px !important;" type="number" step="0.01" min="1" class="form-control" name="paymentAmount" id="paymentAmount" placeholder="" required="" >
      </label>
    </li>

    <li class="col-sm-8">
      <label>Name of Remittance Center *
        <input  style="height: 45px !important;" type="text" class="form-control" name="nameOfRemmitanceCenter" id="nameOfRemmitanceCenter" placeholder="" required="" >
      </label>
    </li>

    <li class="col-sm-6">
      <label>Control Number *
        <input  style="height: 45px !important;" type="text" class="form-control" name="controlNumber" id="controlNumber" placeholder="" required="" >
      </label>
    </li>

    <li class="col-sm-6">
      <label>Reciept Image *
        <input  style="border:none;" type="file" class="form-control" name="paymentRecieptImage" id="paymentRecieptImage" placeholder="" required="" >
      </label>
    </li>

    
  </ul>
</div>