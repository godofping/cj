<?php 
include('header.php');

$db->select('product_variations_view','*',NULL,'productVariationId = "' . $_GET['productVariationId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage Stocks</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Inventory</a></li>
            <li class="breadcrumb-item">View all</li>
            <li class="breadcrumb-item active">Manage Stocks</li>
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
                    <p>* indicates required fields</p>

                    <h4 class="card-title">Current stocks, reorder point and inventory history of <b>"<?php echo $res['productName']; ?> (<?php echo $res['productOption1']; ?>  <?php echo $res['productOption2']; ?>)".</b></h4>

                    <h5 class="card-title">Current stocks is <b><?php echo $res['productStock']; ?></b>. Reorder point is <b><?php echo $res['productStocksReorderPoint']; ?></b>.</h5>
                    <h5 class="card-title">Stocks status: <b><?php 
                    if ($res['productStock'] > $res['productStocksReorderPoint']) {
                        $string = "Above Reorder Point";
                    }
                    else
                    {
                        $string = "Below Reorder Point";
                    }


                    if ($res['productStock'] == 0 and $res['productStocksReorderPoint'] == 0) {
                        $string = "No stocks";
                    }

                    echo $string;

                     ?></b>.</h5>


                    <div class="row">
                        <div class="col-md-4">
                            <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=stock-in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stock In *</label>
                                            <input type="number" min="1" class="form-control form-control-line" required="" name="quantity"> 
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>
                                <input type="text" name="productVariationId" value="<?php echo $res['productVariationId'] ?>" hidden="">
                                <input type="text" name="productStock" value="<?php echo $res['productStock'] ?>" hidden="">
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=stock-out">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Stock Out * <?php if ($res['productStock'] == 0) {
                                                echo "<small>(Can't stock out because you have 0 stocks left in this product.)</small>";
                                            }else
                                            {
                                                echo "<small>(Max quantity for stock out is " . $res['productStock'] . ".)</small>";
                                            }
                                             ?></label>
                                            
                                            <input type="number" min="1" max="<?php echo $res['productStock'] ?>" class="form-control form-control-line" required="" name="quantity"> 
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" <?php if ($res['productStock'] == 0) {
                                                echo "disabled";
                                            } ?> class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>
                                <input type="text" name="productVariationId" value="<?php echo $res['productVariationId'] ?>" hidden="">
                                <input type="text" name="productStock" value="<?php echo $res['productStock'] ?>" hidden=""> 
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=reorder-point">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Reorder Point *</label>
                                            
                                            <input type="number" min="0" class="form-control form-control-line" required="" name="productStocksReorderPoint"> 
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>
                                <input type="text" name="productVariationId" value="<?php echo $res['productVariationId'] ?>" hidden="">
                            </form>
                        </div>
                    </div>

                    <hr class="mt-5 mb-5">

                    <h4 class="card-title">Inventory History</b></h4>
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

<script type="text/javascript">
    var title = "";
    var dataTable = $('#datable').DataTable({
        // "processing":true,
        // "serverSide":true,
        deferRender: true,
        "order":[],
        "ajax": {
                    "type": 'POST',
                    "url": 'load-manage-stocks.php',
                    "data":{
                        "productVariationId": "<?php echo $res['productVariationId']; ?>",
                    },
                    
                },
        "columnDefs":[
            {
                "targets":[],
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
        // dom: 'Bfrltip',
        language: { search: "",searchPlaceholder: "Search" },

        "info":     true,
        "bFilter":     true,
        responsive: true,
        autoWidth: false,
    });

</script>




