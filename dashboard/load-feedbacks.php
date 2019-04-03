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
$table = 'customer_feedbacks_view';
 
// Table's primary key
$primaryKey = 'customerFeedbackId';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(

    array( 'db' => 'customerFullName',   'dt' => 0 ),
    array( 'db' => 'customerFeedback',   'dt' => 1 ),
    array( 'db' => 'customerFeedbackDate',   'dt' => 2 ),
    array( 'db' => 'customerFeedbackStatus', 'dt' => 3,'formatter' => function( $d, $row ) {

        if ($d == 0) {
            $status =  "Pending";
        }elseif ($d == 1) {
            $status = 'Approved';
        }

        return  $status;
    } ),
    array( 'db' => 'customerFeedbackId', 'dt' => 4,'formatter' => function( $d, $row ) {
        return '<a class = "btn btn-success btn-xs" href="controller.php?from=confirm-feedback&customerFeedbackId=' . $row['customerFeedbackId'] . '">Confirm</a> <a class = "btn btn-danger btn-xs" onclick = "return confirm('."'Are you sure want to delete this record?'".')" href="controller.php?from=delete-feedback&customerFeedbackId=' . $row['customerFeedbackId'] . '">Delete</a>';
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


 