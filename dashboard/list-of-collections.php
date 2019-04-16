<?php 
include('header.php');

$period = $_GET['period'];
$date = $_GET['date'];
$string ="";
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><?php echo $period; ?></h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
            <li class="breadcrumb-item">List of Collections</li>
            <li class="breadcrumb-item active"><?php echo $period; ?></li>
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

                    <h4 class="card-title">Total Collections are ₱<?php 
                    $totalAmount = 0;

                    if ($period == 'Daily') {

                        $db->select('payments_view','sum(paymentAmount) as total',NULL,"orderPaymentStatus = 'Paid' and paymentStatus = 'Recieved' and paymentTransactionDate like '%" . $date . "%'", NULL); 
                        $res = $db->getResult(); $res = $res[0];
                        echo number_format($res['total'],2);

                    }

                    if ($period == 'Weekly') {
                        
                        $db->select('payments_view','sum(paymentAmount) as total',NULL,"orderPaymentStatus = 'Paid' and paymentStatus = 'Recieved' and weekCode = '" . $date . "'", NULL); 
                        $res = $db->getResult(); $res = $res[0];
                        echo number_format($res['total'],2);

                    }

                    if ($period == 'Monthly') {
                        
                        $db->select('payments_view','sum(paymentAmount) as total',NULL,"orderPaymentStatus = 'Paid' and paymentStatus = 'Recieved' and paymentTransactionDate like '%" . $date. "%'", NULL); 
                        $res = $db->getResult(); $res = $res[0];
                        echo number_format($res['total'],2);
                    }

                    

                    ?>.</h4>


                    <form class="form-material">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">

                                <?php if ($period == 'Daily'): 
                                    $string = "List of Daily Collections (" . date('F d, Y', strtotime($date)) . ")";
                                ?>
                                    <label>Date</label>
                                    <input type="date" id="date" class="form-control" value="<?php echo $date ?>">
                                <?php endif ?>

                                <?php if ($period == 'Weekly'): 
                                    $string = "List of Weekly Collections (Week " . date('W, Y', strtotime($date)) . ")";
                                ?>
                                    <label>Date</label>
                                    <input type="week" id="date" class="form-control" value="<?php echo $date ?>">
                                <?php endif ?>

                                <?php if ($period == 'Monthly'): 
                                    $string = "List of Monthly Collections (" . date('F Y', strtotime($date)) . ")";
                                ?>
                                    <label>Date</label>
                                    <input type="month" id="date" class="form-control" value="<?php echo $date ?>">
                                <?php endif ?>

                                


                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="table-responsive">
                        <table id="datable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order number</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th class="noExport">Receipt</th>
                                    <th>Remittance Center</th>
                                    <th>Control Number</th>
                                    <th>Transaction Date</th>


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
	var title = "<?php echo $string; ?> Total Collections are ₱<?php 
                    $totalAmount = 0;

                    if ($period == 'Daily') {

                        $db->select('payments_view','sum(paymentAmount) as total',NULL,"orderPaymentStatus = 'Paid' and paymentStatus = 'Recieved' and paymentTransactionDate like '%" . $date . "%'", NULL); 
                        $res = $db->getResult(); $res = $res[0];
                        echo number_format($res['total'],2);

                    }

                    if ($period == 'Weekly') {
                        
                        $db->select('payments_view','sum(paymentAmount) as total',NULL,"orderPaymentStatus = 'Paid' and paymentStatus = 'Recieved' and weekCode = '" . $date . "'", NULL); 
                        $res = $db->getResult(); $res = $res[0];
                        echo number_format($res['total'],2);

                    }

                    if ($period == 'Monthly') {
                        
                        $db->select('payments_view','sum(paymentAmount) as total',NULL,"orderPaymentStatus = 'Paid' and paymentStatus = 'Recieved' and paymentTransactionDate like '%" . $date. "%'", NULL); 
                        $res = $db->getResult(); $res = $res[0];
                        echo number_format($res['total'],2);
                    }

                    

                    ?>.";
    var dataTable = $('#datable').DataTable({
        // "processing":true,
        // "serverSide":true,
        deferRender: true,
        "order":[],
        "ajax": {
                    "type": 'POST',
                    "url": 'load-list-of-collections.php',
                    "data": {
                            date:"<?php echo $date ?>",
                            period:"<?php echo $period ?>",
                    },
                    
                },
        "columnDefs":[
            {
                "targets":[2],
                "orderable":false,
            },
        ],
         buttons: [
       
        {
            extend: 'print',
            title: title,
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
        }

    ],
        dom: 'Bfrltip',
        language: { search: "",searchPlaceholder: "Search" },

        "info":     true,
        "bFilter":     true,
        responsive: true,
        autoWidth: false,
    });

</script>



<?php if ($period == 'Daily'): ?>
    <script type="text/javascript">
        $('#date').change(function(){
            var date = $('#date').val();
            window.location.replace("list-of-collections.php?period=Daily&date=" + date);
        });
    </script>
<?php endif ?>

<?php if ($period == 'Weekly'): ?>
    <script type="text/javascript">
        $('#date').change(function(){
            var date = $('#date').val();
            window.location.replace("list-of-collections.php?period=Weekly&date=" + date);
        });
    </script>
<?php endif ?>

<?php if ($period == 'Monthly'): ?>
    <script type="text/javascript">
        $('#date').change(function(){
            var date = $('#date').val();
            window.location.replace("list-of-collections.php?period=Monthly&date=" + date);
        });
    </script>
<?php endif ?>

