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
$table = 'match_table';
 
// Table's primary key
$primaryKey = 'matchId';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(

    array( 'db' => 'shooterNo',   'dt' => 0 ),
    array( 'db' => 'shooterName',   'dt' => 1 ),
    array( 'db' => 'stageNo',   'dt' => 2 ),

    
    array( 'db' => 'matchId', 'dt' => 3,'formatter' => function( $d, $row ) {
        return '<a class = "btn btn-warning btn-xs" href="view-match.php?matchId=' . $row['matchId'] . '">View</a> <a class = "btn btn-info btn-xs" href="edit-match.php?matchId=' . $row['matchId'] . '">Edit</a> <a class = "btn btn-danger btn-xs" onclick = "return confirm('."'Are you sure want to delete this record?'".')" href="controller.php?from=delete-match&matchId=' . $row['matchId'] . '">Delete</a>';
    } ),
    
  
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'psmoc_db',
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


 