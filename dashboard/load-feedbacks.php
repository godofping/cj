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
$table = 'user_feedbacks_view';
 
// Table's primary key
$primaryKey = 'userFeedbackId';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(

    array( 'db' => 'userFullName',   'dt' => 0 ),
    array( 'db' => 'userFeedback',   'dt' => 1 ),
    array( 'db' => 'userFeedbackDate',   'dt' => 2, 'formatter' => function( $d, $row ) {
        return  date('F d, Y', strtotime($d));
    }  ),
    array( 'db' => 'userFeedbackStatus', 'dt' => 3,'formatter' => function( $d, $row ) {

        if ($d == 0) {
            $status =  "Pending";
        }elseif ($d == 1) {
            $status = 'Approved';
        }
        elseif ($d == 2) {
            $status = 'Disapproved';
        }

        return  $status;
    } ),
    array( 'db' => 'userFeedbackId', 'dt' => 4,'formatter' => function( $d, $row ) {

        if ($row['userFeedbackStatus'] == 0) {
            return '<a class = "btn btn-success btn-xs" href="controller.php?from=approve-feedback&userFeedbackId=' . $row['userFeedbackId'] . '" onclick = "return confirm('."'Are you sure want to approve this feedback?'".')">Approve</a> <a class = "btn btn-danger btn-xs" onclick = "return confirm('."'Are you sure want to disapprove this record?'".')" href="controller.php?from=disapprove-feedback&userFeedbackId=' . $row['userFeedbackId'] . '">Disapprove</a>';
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


 