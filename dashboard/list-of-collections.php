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

                    <form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=add-category">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" id="datepicker">
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="table-responsive m-t-40">
                        <table id="datable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Amount (₱)</th>
                                    <th class="noExport">Reciept</th>
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

<script type="text/javascript">
    $('#datepicker').change(function(){
        var datepicker = $('#datepicker').val();
        alert(datepicker);
    });
</script>




