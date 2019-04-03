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
            <li class="breadcrumb-item">All Orders</li>
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
        <div class="col-md-6">

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Order details of <b>Order Number <?php echo $res['orderId']; ?></b>.</h4>

                    <hr class="mt-1 mb-3">

                    <h2>Customer: <b><?php echo $res['fullName']; ?></b></h2>

                    <h2>Delivery Method: <b><?php echo $res['deliveryMethod']; ?></b></h2>

                    <h2>Mode of Payment: <b><?php echo $res['orderModeOfPayment']; ?></b></h2>

                    <h2>Date Placed: <b><?php echo $res['orderPlacedDate']; ?></b></h2>

                    <h2>Status: <b><?php echo $res['orderStatus']; ?></b></h2>

                  
                    <div class="table-responsive m-t-40">
                        <table id="datable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Transaction Date Time</th>
                                    <th>In/Out</th>
                                    <th>Quantity</th>
                                    <th>Remarks</th>
 

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
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
         
<?php include('footer.php'); ?>





