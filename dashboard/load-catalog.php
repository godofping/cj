<?php
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'products_view';
 
// Table's primary key
$primaryKey = 'productId';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(

    array( 'db' => 'productSKU',   'dt' => 0 ),
    array( 'db' => 'productName',   'dt' => 1 ),
    array( 'db' => 'productPrice', 'dt' => 2,'formatter' => function( $d, $row ) {
        return '₱' .number_format($d, 2);
    } ),
    array( 'db' => 'productCategory',   'dt' => 3 ),
    array( 'db' => 'productSubCategory',   'dt' => 4 ),
    array( 'db' => 'productUpdateDate',   'dt' => 5 ),
    array( 'db' => 'productId', 'dt' => 6,'formatter' => function( $d, $row ) {
        return '<a class = "btn btn-warning btn-xs" href="view-product.php?productId=' . $row['productId'] . '">View</a> <a class = "btn btn-success btn-xs" href="product-images.php?productId=' . $row['productId'] . '">Images</a> <a class = "btn btn-info btn-xs" href="update-product.php?productId=' . $row['productId'] . '">Update</a> <a class = "btn btn-danger btn-xs" onclick = "return confirm('."'Are you sure want to delete this record?'".')" href="controller.php?from=delete-product&productId=' . $row['productId'] . '">Delete</a>';
    } ),
    
  
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'cj_db',
    'host' => 'localhost'
);
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

   require( 'ssp.class.php' );
    echo json_encode(
    SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);


 