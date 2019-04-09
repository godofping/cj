<?php 
include('header.php');

$period = $_GET['period'];

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

                    <form class="form-material">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">

                                <?php if ($_GET['period'] == 'Daily'): ?>
                                    <label>Date</label>
                                    <input type="date" id="date" class="form-control" value="<?php echo $_GET['date'] ?>">
                                <?php endif ?>

                                <?php if ($_GET['period'] == 'Weekly'): ?>
                                    <label>Date</label>
                                    <input type="week" id="date" class="form-control" value="<?php echo $_GET['date'] ?>">
                                <?php endif ?>

                                <?php if ($_GET['period'] == 'Monthly'): ?>
                                    <label>Date</label>
                                    <input type="month" id="date" class="form-control" value="<?php echo $_GET['date'] ?>">
                                <?php endif ?>

                                


                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="table-responsive">
                        <table id="datable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Amount (₱)</th>
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
	var title = "List of Customers";
    var dataTable = $('#datable').DataTable({
        // "processing":true,
        // "serverSide":true,
        deferRender: true,
        "order":[],
        "ajax": {
                    "type": 'POST',
                    "url": 'load-list-of-collections.php',
                    
                },
        "columnDefs":[
            {
                "targets":[],
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



<?php if ($_GET['period'] == 'Daily'): ?>
    <script type="text/javascript">
        $('#date').change(function(){
            var date = $('#date').val();
            window.location.replace("list-of-orders-daily.php?date=" + date);
        });
    </script>
<?php endif ?>

<?php if ($_GET['period'] == 'Weekly'): ?>
    <script type="text/javascript">
        $('#date').change(function(){
            var date = $('#date').val();
            window.location.replace("list-of-orders-daily.php?date=" + date);
        });
    </script>
<?php endif ?>

<?php if ($_GET['period'] == 'Monthly'): ?>
    <script type="text/javascript">
        $('#date').change(function(){
            var date = $('#date').val();
            window.location.replace("list-of-orders-daily.php?date=" + date);
        });
    </script>
<?php endif ?>

