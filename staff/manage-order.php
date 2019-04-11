<?php 
include('header.php');

$db->select('orders_view','*',NULL,'orderId = "' . $_GET['orderId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Order</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Orders</a></li>
            <li class="breadcrumb-item">My Orders</li>
            <li class="breadcrumb-item active">Manage Order</li>
        </ol>
    </div>
   
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">

        <!-- left -->
        <div class="col-md-6">

            <div class="row">
            <div class="col-md-12">
            
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Order details of <b>Order Number <?php echo $res['orderId']; ?></b>.</h4>

                        <hr class="mt-1 mb-3">

                        <?php if ($res['userIsBlocked'] == 1){ ?>
                            <h1>THIS CUSTOMER IS BLOCKED.</h1>
                        <?php } ?>

                        <p>Customer: <b><?php echo $res['userFirstName'] . " " . $res['userLastName']; ?></b></p>

                        <p>Delivery Method: <b><?php echo $res['orderDeliveryMethod']; ?></b></p>

                        <?php if ($res['orderDeliveryMethod'] == 'Pick Up'){ ?>

                        <p>Schedule of Pick Up: <b><?php echo date('F d, Y', strtotime($res['orderPickupDate'])); ?></b></p>
                        
                        <?php } ?>

                        <p>Mode of Payment: <b><?php echo $res['orderModeOfPayment']; ?></b></p>

                        <p>Date Placed: <b><?php echo date('F d, Y g:i A', strtotime($res['orderPlacedDate'])); ?></b></p>

                        <p>Order Payment Status: <b><?php echo $res['orderPaymentStatus']; ?></b></p>

                        <p>Order Status: <b><?php echo $res['orderStatus']; ?></b></p>

                        <hr class="mt-1 mb-3">

                        <?php if ( $res['userIsBlocked'] == 0){ ?>
                        
                            <form method="POST" class="form-material" autocomplete="off" action="controller.php?from=save-remark&orderId=<?php echo $res['orderId'] ?>">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Remark </label>
                                        <textarea class="form-control" name="orderRemarks" id="orderRemarks" rows="5"><?php echo $res['orderRemarks']; ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Remarks</button>
                                </div>
                            </div>

                            </form>

                            <?php if ($res['orderStatus'] == 'Confirmed' and $res['orderIsReschedule'] == 0 and $res['orderDeliveryMethod'] == 'Pick Up'){ ?>


                            <form class="form-material mb-3" method="POST" action="controller.php?from=reschedule-pick-up-date&orderId=<?php echo $res['orderId'] ?>&userId=<?php echo $res['userId'] ?>" autocomplete="off">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reschedule Date</label>
                                        <input class="form-control" required="" type="date" name="orderPickupDate" min="<?php echo date('Y-m-d') ?>" value="">
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <p>The pick up date set by the customer is <?php echo date('F d, Y', strtotime($res['orderPickupDate'])); ?></p>
                                    </div>

                                </div>
                            </div>
                            

                            <div class="row">
                                <div class="col-md-12">

                                    <button onclick = "return confirm('Are you sure want to reschedule the pick up date of this order?')" type="submit" class="btn btn-warning waves-effect waves-light m-r-10 pull-left">Reschedule Pick Up Date</button> 


                                    <a onclick = "return confirm('Are you sure want to confirm the pick up date of this order?')" href="controller.php?from=confirm-pick-up-date-order&orderId=<?php echo $res['orderId'] ?>&userId=<?php echo $res['userId'] ?>"><button type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right">Confirm Pick Up Date</button></a>

                                </div>
                            </div>

                            </form>

                        <?php } ?>

                            <?php if ($res['orderStatus'] == 'Confirmed'){ ?>

                  
                                <div class="row mt-3">
                                    <div class="col-md-12">

                                    <?php if ($res['orderDeliveryMethod'] == 'Pick Up'){ ?>
                                        <?php if ($res['orderPaymentStatus'] == 'Unpaid'){ ?>
                                    
                                            <?php if ($res['orderIsReschedule'] == 0){ ?>
                                                <button type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right" data-toggle="tooltip" title="You can't set the order status to finish unless this order is paid and the pick up date is confirmed or rescheduled.">Finish Order</button>
                                            <?php } ?>

                                            <?php if ($res['orderIsReschedule'] != 0){ ?>
                                                <button type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right" data-toggle="tooltip" title="You can't set the order status to finish unless this order is paid.">Finish Order</button>
                                            <?php } ?>

                                        <?php } ?>

                                        <?php if ($res['orderPaymentStatus'] == 'Paid'){ ?>

                                            <?php if ($res['orderIsReschedule'] == 0){ ?>
                                                <button type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right" data-toggle="tooltip" title="You can't set the order status to finish unless the pick up date is confirmed or rescheduled.">Finish Order</button>
                                            <?php } ?>

                                            <?php if ($res['orderIsReschedule'] != 0){ ?>
                                                <a onclick = "return confirm('Are you sure want to finish this order?')" href="controller.php?from=finish-order&orderId=<?php echo $res['orderId'] ?>&userId=<?php echo $res['userId'] ?>"><button type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right">Finish Order</button></a>
                                            <?php } ?>

                                        <?php } ?>

                                    <?php } ?>

                                    <?php if ($res['orderDeliveryMethod'] == 'Shipping'){ ?>

                                        <?php if ($res['orderPaymentStatus'] == 'Unpaid'){ ?>
                                            <button type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right" data-toggle="tooltip" title="You can't set the order status to finish unless this order is paid.">Finish Order</button>
                                        <?php } ?>

                                        <?php if ($res['orderPaymentStatus'] == 'Paid'){ ?>
                                            <a onclick = "return confirm('Are you sure want to finish this order?')" href="controller.php?from=finish-order&orderId=<?php echo $res['orderId'] ?>&userId=<?php echo $res['userId'] ?>"><button type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right">Finish Order</button></a>
                                        <?php } ?>
                                        
                                    <?php } ?>

                                    
    

                                    </div>
                                </div>

                            
                            <?php } ?>
                            
                        
                        
                        <?php } ?>



                        <?php if ($res['orderStatus'] == 'Pending Approval' and $res['userIsBlocked'] == 0){ ?>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                
                            <?php if ($res['orderPaymentStatus'] == 'Paid'){ ?>

                                <a onclick = "return confirm('Are you sure want to confirm this order?')" href="controller.php?from=confirm-order&orderId=<?php echo $res['orderId'] ?>&userId=<?php echo $res['userId'] ?>"><button type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right">Confirm Order</button></a>  
                     
                            <?php } ?>

                            <?php if ($res['orderPaymentStatus'] == 'Unpaid'){ ?>

                                <button type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right" data-toggle="tooltip" title="Order payment status is unpaid. Please make sure it is paid before confirming the order.">Confirm Order</button> 
                             
                            <?php } ?>
                            
             
                            <a onclick = "return confirm('Are you sure want to cancel this order?')" href="controller.php?from=cancel-order&orderId=<?php echo $res['orderId'] ?>&userId=<?php echo $res['userId'] ?>"><button  type="button" class="btn btn-warning waves-effect waves-light m-r-10 pull-right">Cancel Order</button></a>  
             
                            </div>
                        </div>

                        <?php } ?>

                        <div class="row mt-3">
                            <div class="col-md-12">

                        <?php if ($res['userIsBlocked'] == 0 and $res['userType'] == 'Customer'){ ?>

                            <a onclick = "return confirm('Are you sure want to block this customer?')" href="controller.php?from=block-customer&userId=<?php echo $res['userId'] ?>&orderId=<?php echo $res['orderId'] ?>"><button  type="button" class="btn btn-danger waves-effect waves-light m-r-10 pull-right">Block Customer</button></a> 
               
                        <?php } ?>

                        <?php if ($res['userIsBlocked'] == 1 and $res['userType'] == 'Customer'){ ?>
                        
                            <a onclick = "return confirm('Are you sure want to block this customer?')" href="controller.php?from=unblock-customer&userId=<?php echo $res['userId'] ?>&orderId=<?php echo $res['orderId'] ?>"><button  type="button" class="btn btn-info waves-effect waves-light m-r-10 pull-right">Unblock Customer</button></a> 
                                
                        <?php } ?>
                            </div>
                        </div> 
                        
                        
                        
                    </div>
                </div>

            </div>
            </div>


            <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">

                        <?php

                        $db->select('payments_view', 'coalesce(sum(paymentAmount),0) as totalAmountPaid', NULL, 'orderId = "' . $res['orderId'] . '" and paymentStatus = "Recieved"');

                        $res1 = $db->getResult(); $res1 = $res1[0];

                        $totalAmountPaid = $res1['totalAmountPaid'];

                        $orderTotalAmount = $res['orderTotalAmount'];

                        $balance = $orderTotalAmount - $totalAmountPaid;

                        $orderTotalAmount = $res['orderTotalAmount'];

                        if ($res['orderDeliveryMethod'] == 'Shipping') {
                           $orderTotalAmount = $orderTotalAmount + $res['orderShippingFee'];
                           $totalAmountPaid = $totalAmountPaid + $res['orderShippingFee'];
                        }

                        

                        ?>

                        <h4 class="card-title">Payments</h4>

                        <hr class="mt-1 mb-3">

                        <p>Total Amount Paid: <b>₱<?php echo number_format($totalAmountPaid, 2); ?></b></p>
                    
                        
                        <?php if ($res['orderDeliveryMethod'] == 'Shipping'){ ?>
                        <p>Shipping Fee: <b><?php if ($res['orderShippingFee'] > 0){ ?>
                            ₱<?php echo number_format($res['orderShippingFee'], 2); ?>
                        <?php } else {echo "Not yet set.";} ?></b></p> 
                        <?php } ?>

                        <?php if ($res['orderPaymentStatus'] == 'Unpaid' and $res['userIsBlocked'] == 0 and $res['orderStatus'] != 'Cancelled'){ ?>

                        <hr>

                        
                        <p>* indicates required fields</p>
                        <div class="row">

                            <div class="col-md-6">
                            
                                <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=add-payment&orderId=<?php echo $_GET['orderId'] ?>&userId=<?php echo $res['userId'] ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Amount *</label>
                                                <input type="number" step="0.1" class="form-control form-control-line" min="<?php echo $balance ?>" max="<?php echo $balance ?>" required="" name="paymentAmount"> 
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button onclick = "return confirm('Are you sure want to save the payment?')" type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Payment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <?php if ($res['orderDeliveryMethod'] == 'Shipping' and $res['orderShippingFee'] == 0){ ?>
                            <div class="col-md-6">
                     
                                <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=set-shipping-fee&orderId=<?php echo $_GET['orderId'] ?>&userId=<?php echo $res['userId'] ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Shipping Fee *</label>
                                                <input type="number" step="0.1" class="form-control form-control-line"  required="" name="orderShippingFee"> 
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button onclick = "return confirm('Are you sure want to set the shipping fee? This is irrevocable.')" type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Set Shipping Fee</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php } ?>

                        </div>

                        <hr>
                            
                        <?php } ?>

                        
                        <div class="table-responsive m-t-10">
                            <table id="datablePayments" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Amount</th>
                                        <th>Transaction Date</th>
                                        <th>Status</th>
                              
     
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            
        </div>

        <!-- right -->
        <div class="col-md-6">

            <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Products Ordered</h4>

                        <hr class="mt-1 mb-3">
                        
                        <div class="table-responsive m-t-10">
                            <table id="datable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Amount</th>
     
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <?php

                        $additional = 0;

                        if ($res['orderDeliveryMethod'] == 'Shipping'){
                        $additional = $additional + $res['orderShippingFee'];
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="float-right">Shipping Fee:<b> ₱<?php echo number_format($res['orderShippingFee'], 2); ?></b></h4>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="float-right">Total:<b> ₱<?php echo number_format($res['orderTotalAmount'] + $additional, 2); ?></b></h3>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <a target="_blank" href="../print-acknowledgement-receipt.php?orderId=<?php echo base64_encode($res['orderId']); ?>&userId=<?php echo $res['userId'] ?>&admin=yes"><button type="button" class="btn btn-dark pull-right ">Print Acknowledgement Receipt</button></a>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            </div>

            <div class="row">
            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Billing Information</h4>

                        <hr class="mt-1 mb-3">

                        <p>First Name: <b><?php echo $res['billingFirstName']; ?></b></p>

                        <p>Last Name: <b><?php echo $res['billingLastName']; ?></b></p>

                        <p>Address: <b><?php echo $res['billingAddress']; ?></b></p>

                        <p>Phone Number: <b><?php echo $res['billingPhoneNumber']; ?></b></p>

                        <p>Email: <b><?php echo $res['billingEmail']; ?></b></p>

                      
                        
                    </div>
                </div>

            </div>
            </div>

            <?php if ($res['orderDeliveryMethod'] == 'Shipping'){ ?>
            <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Shipping Information</h4>

                        <hr class="mt-1 mb-3">

                        <p>First Name: <b><?php echo $res['orderShipFirstName']; ?></b></p>

                        <p>Last Name: <b><?php echo $res['orderShipLastName']; ?></b></p>

                        <p>Address: <b><?php echo $res['orderShippingAddress']; ?></b></p>

                        <p>Phone Number: <b><?php echo $res['orderShipPhoneNumber']; ?></b></p>

                        <p>Email: <b><?php echo $res['orderShipEmail']; ?></b></p>
                        
                    </div>
                </div>
            </div>
            </div>
            <?php } ?>
                
        </div>
    </div>


<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
         
<?php include('footer.php'); ?>

<script type="text/javascript">
    var title = "";
    var dataTable = $('#datable').DataTable({
        // "processing":true,
        // "serverSide":true,
        deferRender: true,
        "pageLength": -1,
        "order":[],
        "ajax": {
                    "type": 'POST',
                    "url": 'load-items-ordered.php',
                    "data":{
                        orderId: "<?php echo $res['orderId'] ?>",
                    }
                    
                },
        "columnDefs":[
            {
                "targets":[0,1,2,3],
                "orderable":false,
            },
        ],
         buttons: [
        {
            extend: 'excel',
            title: title,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'csv',
            title: title,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'print',
            title: title,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        }

    ],
        dom: '',
        language: { search: "",searchPlaceholder: "Search" },

        "info":     true,
        "bFilter":     true,
        responsive: true,
        autoWidth: false,
    });


</script>


<script type="text/javascript">
    var title = "";
    var dataTable = $('#datablePayments').DataTable({
        // "processing":true,
        // "serverSide":true,
        deferRender: true,
        "pageLength": -1,
        "order":[],
        "ajax": {
                    "type": 'POST',
                    "url": 'load-payments-manage-order.php',
                    "data":{
                        orderId: "<?php echo $res['orderId'] ?>",
                    }
                    
                },
        "columnDefs":[
            {
                "targets":[0,1,2],
                "orderable":false,
            },
        ],
         buttons: [
        {
            extend: 'excel',
            title: title,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'csv',
            title: title,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        },
        {
            extend: 'print',
            title: title,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        }

    ],
        dom: '',
        language: { search: "",searchPlaceholder: "Search" },

        "info":     true,
        "bFilter":     true,
        responsive: true,
        autoWidth: false,
    });


</script>






