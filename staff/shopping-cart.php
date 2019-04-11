
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
                                $total = 0;
                                $counter = 0;
                                $db->select('order_details_view','*',NULL,'orderStatus = "On Cart" and userId = "' . $_SESSION['userId'] . '"', NULL); 
                                $output = $db->getResult();

                                foreach ($output as $res) { 
                                    $counter++;
                                    ?>
                                <tr>
                                    <td><?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?> <?php echo $res['productOption1']; ?>)</td>
                                    <td>
                                        <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-cart&orderDetailId=<?php echo $res['orderDetailId']; ?>&price=<?php echo $res['productPrice'] ?>">
                                            <div class="form-group">
                                                <input type="number" class="form-control pull-left" required="" min="1" max="<?php echo $res['productStock'] ?>" name="quantity" value="<?php echo $res['quantity']; ?>">
                                            </div>
                                        
                                        <button type="submit" class = "btn btn-info btn-xs pull-right">Update</button>
                                        </form>

                                    </td>
                                    <td>₱<?php echo number_format($res['price'],2); ?></td>
                                    <td>₱<?php echo number_format($res['quantity'] * $res['price'],2); $total += $res['quantity'] * $res['price']; ?></td>
                                    <td>
                                        <a href="controller.php?from=remove-item&orderDetailId=<?php echo $res['orderDetailId'] ?>" onclick = "return confirm('Are you sure want to remove this from the cart?')"><button class="btn btn-warning btn-xs pull-right">Remove</button></a>
                                    </td>
                                  
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="pull-right">Total: ₱<?php echo number_format($total, 2); ?></h2>
                        </div>
                    </div>

                    <?php if ($counter != 0){ ?>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="controller.php?from=empty-cart&orderId=<?php echo $res['orderId'] ?>" onclick = "return confirm('Are you sure want to empty this cart?')"><button class="btn btn-danger pull-right">Empty Cart</button></a>
                            </div>
                        </div>

                        

                        <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=place-order&orderId=<?php echo $res['orderId']; ?>&sum=<?php echo $total; ?>">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>* indicates required fields</p>

                                        <h4 class="card-title">Billing Information</h4>
                                    </div>
                                </div>


                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name *</label>
                                            <input class="form-control" type="text" required="" name="billingFirstName">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name *</label>
                                            <input class="form-control" type="text" required="" name="billingLastName">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Address * (Building Number, Street Name, City, Province)</label>
                                            <input class="form-control" type="text" required="" name="billingAddress">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number </label>
                                            <input class="form-control" type="text" name="billingPhoneNumber">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email </label>
                                            <input class="form-control" type="email"  name="billingEmail">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-info pull-right" onclick = "return confirm('Are you sure want to place order?')">Place Order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
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

