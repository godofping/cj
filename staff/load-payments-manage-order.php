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
$table = 'payments_view';
 
// Table's primary key
$primaryKey = 'paymentId';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(

    array( 'db' => 'userId',   'dt' => -1 ),
    array( 'db' => 'orderShippingFee',   'dt' => -1 ),
    array( 'db' => 'orderDeliveryMethod',   'dt' => -1 ),
    array( 'db' => 'orderPaymentStatus',   'dt' => -1 ),

    array( 'db' => 'paymentAmount',   'dt' => 0, 'formatter' => function( $d, $row ) {

        if ($row['orderDeliveryMethod'] == 'Shipping') {
            $d = $d + $row['orderShippingFee'];
        }

        return '₱' . number_format($d, 2);



    } ),

    array( 'db' => 'paymentTransactionDate',   'dt' => 1, 'formatter' => function( $d, $row ) {
        return date('F d, Y g:i A', strtotime($d));
    } ),
    array( 'db' => 'paymentStatus',   'dt' => 2 ),

    

    

  
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
    SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, 'orderId = "' . $_POST['orderId'] . '"')
);


 