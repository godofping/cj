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

                    <p>Customer: <b><?php echo $res['fullName']; ?></b></p>

                    <p>Delivery Method: <b><?php echo $res['orderDeliveryMethod']; ?></b></p>

                    <p>Mode of Payment: <b><?php echo $res['orderModeOfPayment']; ?></b></p>

                    <p>Date Placed: <b><?php echo date('F d, Y', strtotime($res['orderPlacedDate'])); ?></b></p>

                    <p>Status: <b><?php echo $res['orderStatus']; ?></b></p>

                  
                    
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Products Ordered</h4>

                  
                    <div class="table-responsive m-t-10">
                        <table id="datable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price (₱)</th>
                                    <th>Amount (₱)</th>
 
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="float-right">Total:<b> ₱<?php echo number_format($res['orderTotalAmount'], 2); ?></b></h3>

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





