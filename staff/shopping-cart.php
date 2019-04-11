
<?php include('header.php'); ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Shopping Cart</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<!--             <li class="breadcrumb-item">pages</li> -->
            <li class="breadcrumb-item active">Shopping Cart</li>
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
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="datable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                  
            
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                $db->select('order_details_view','*',NULL,'orderStatus = "On Cart" and userId = "' . $_SESSION['userId'] . '"', NULL); 
                                $output = $db->getResult();

                                foreach ($output as $res) { 
                                    $counter++;
                                    ?>
                                <tr>
                                    <td><?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption1']; ?>)</td>
                                    <td>
                                        <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-cart&orderDetailId=<?php echo $res['orderDetailId']; ?>">
                                            <div class="form-group">
                                                <input type="number" class="form-control pull-left" value="<?php echo $res['quantity']; ?>">
                                            </div>
                                        

                                       
                                        <button type="submit" class = "btn btn-info btn-xs pull-right" href="controller.php?from=add-cart&productPrice=' . $row['productPrice'] . '&productVariationId=' . $row['productVariationId'] . '">Update</button>
                                        </form>

                                    </td>
                                    <td>₱<?php echo number_format($res['price'],2); ?></td>
                                    <td>₱<?php echo number_format($res['quantity'] * $res['price'],2); ?></td>
                                    <td>
                                        <a href="controller.php?from=place-order"><button class="btn btn-warning btn-xs pull-right">Remove</button></a>
                                    </td>
                                  
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>

                    <?php if ($counter != 0){ ?>

                        <a href="controller.php?from=place-order"><button class="btn btn-info pull-left">Place Order</button></a>

                        <a href="controller.php?from=empty-cart&orderId=<?php echo $res['orderId'] ?>" onclick = "return confirm('Are you sure want to empty this cart?')"><button class="btn btn-danger pull-right">Empty Cart</button></a>
                        
                    <?php } else { ?>

                        <h2>Shopping car is empty.</h2>
                    <?php } ?>

                    

                </div>
            </div>
        </div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<!-- ============================================================== -->
         
<?php include('footer.php'); ?>

