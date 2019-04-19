<?php 
include('header.php');
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">List of Reviews</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>
            <!-- <li class="breadcrumb-item"></li> -->
            <li class="breadcrumb-item active">List of Reviews</li>
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
                                	<th>Customer</th>
                                    <th>Product Name</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                    <th>Date Submitted</th>
                                    <th>Review</th>


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
    var title = "List of Reviews (<?php echo date('F d, Y') ?>)";
    var dataTable = $('#datable').DataTable({
        // "processing":true,
        // "serverSide":true,
        deferRender: true,
        "order":[],
        "ajax": {
                    "type": 'POST',
                    "url": 'load-list-of-reviews.php',
    
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
            },
            customize: function ( win ) {
                $(win.document.body)
                    .css( 'font-size', '10pt' )
                    .prepend(
                        '<div style="text-align: center; margin-bottom: 20px;"><img src="http://cjashleyfashionhub.tk/dashboard/etc/logo.jpg" height= "100px" /></div><div style="text-align: left"><p>Prepared by: <?php echo $_SESSION['administratorFullName']; ?></p></div>'
                    );

                $(win.document.body).find( 'table' )
                    .addClass( 'compact' )
                    .css( 'font-size', 'inherit' );

                $(win.document.body).find( 'h1' )
                    .addClass( 'compact' )
                    .css( 'font-size', '20px' );



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



