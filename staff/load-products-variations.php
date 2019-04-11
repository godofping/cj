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
$table = 'product_variations_view';
 
// Table's primary key
$primaryKey = 'productVariationId';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(

    array( 'db' => 'productVariationId',   'dt' => 0,'formatter' => function( $d, $row ) {
        return $d;
    } ),
    array( 'db' => 'productName',   'dt' => 1 ),
    array( 'db' => 'productCategory',   'dt' => 2 ),
    array( 'db' => 'productSubCategory',   'dt' => 3 ),
    array( 'db' => 'productPrice', 'dt' => 4,'formatter' => function( $d, $row ) {
        return number_format($d,2);
    } ),
    array( 'db' => 'productOption1',   'dt' => 5 ),
    array( 'db' => 'productOption2',   'dt' => 6 ),
    array( 'db' => 'productStock',   'dt' => 7 ),
    array( 'db' => 'productVariationId', 'dt' => 8,'formatter' => function( $d, $row ) {

        if ($row['productStock'] != 0) {
            return '<a class = "btn btn-info btn-xs" href="controller.php?from=add-cart&productPrice=' . $row['productPrice'] . '&productVariationId=' . $row['productVariationId'] . '">Add to Cart</a>';
        }
        else
        {
            return '';
        }
        

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


 