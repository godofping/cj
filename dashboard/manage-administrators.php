
<?php include('header.php'); ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Manage</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Administrators</a></li>
<!--             <li class="breadcrumb-item">pages</li> -->
            <li class="breadcrumb-item active">Manage</li>
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
 					<a href="add-administrator.php"><button class="btn btn-info pull-right">Add Administrator</button></a>
                    <div class="table-responsive m-t-40">
                        <table id="datable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Full Name</th>
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
	var title = "";
    var dataTable = $('#datable').DataTable({
        // "processing":true,
        // "serverSide":true,
        deferRender: true,
        "order":[],
        "ajax": {
                    "type": 'POST',
                    "url": 'load-manage-administrators.php',
                    
                },
        "columnDefs":[
            {
                "targets":[2],
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



