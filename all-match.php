
<?php include('header.php'); ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">List of All Match Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Match</a></li>
<!--             <li class="breadcrumb-item">View All</li> -->
            <li class="breadcrumb-item active">View All</li>
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
        <div class="col-12">
            <div class="card">
                            <div class="card-body">
             
                                <div class="table-responsive m-t-40">
                                    <table id="datable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Shooter #</th>
                                                <th>Shooter Name</th>
                                                <th>Stage #</th>

                                                <th class="noExport">Actions</th>

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
	var title = "List of All Match Form";
    var dataTable = $('#datable').DataTable({
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax": {
                    "type": 'POST',
                    "url": 'load-match.php',
                    
                },
        "columnDefs":[
            {
                "targets":[3],
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
        dom: 'Bfrltip',
        language: { search: "",searchPlaceholder: "Search" },

        "info":     true,
        "bFilter":     true,
        responsive: true,
        autoWidth: false,
    });

</script>




