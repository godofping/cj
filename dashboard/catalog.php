
<?php include('header.php'); ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Catalog</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
<!--             <li class="breadcrumb-item">pages</li> -->
            <li class="breadcrumb-item active">Catalog</li>
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
                            <a href="add-product.php"><button class="btn btn-info pull-right">Add Product</button></a>
                                <div class="table-responsive m-t-40">
                                    <table id="datable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product SKU</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Category</th>
                                                <th>Sub Category</th>
                                                <th>Updated</th>
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
        "processing":true,
        "serverSide":true,
        "order":[],
        "ajax": {
                    "type": 'POST',
                    "url": 'load-catalog.php',
                    
                },
        "columnDefs":[
            {
                "targets":[6],
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




