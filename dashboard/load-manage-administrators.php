<?php
 session_start();
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
$table = 'administrators_view';
 
// Table's primary key
$primaryKey = 'administratorUserId';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes


$columns = array(
	array( 'db' => 'administratorUserId',   'dt' => -1 ),
    array( 'db' => 'administratorEmail',   'dt' => 0 ),
    array( 'db' => 'administratorFullName',   'dt' => 1 ),
    array( 'db' => 'isActivated',   'dt' => 2,'formatter' => function( $d, $row ) {
        if ($d == 1) {
            return 'Yes';
        }
        else
        {
            return 'No';
        }
    } ),
    array( 'db' => 'isDeleted', 'dt' => 3,'formatter' => function( $d, $row ) {

    	if ($row['administratorUserId'] == $_SESSION['administratorUserId']) {
    		return '<button class = "btn btn-info btn-xs" data-toggle="tooltip" title="You can not update your profile here.">Update</button> <button class = "btn btn-danger btn-xs" data-toggle="tooltip" title="You can not delete your own account.">Delete</button>';
    	}
    	else
    	{
    		return '<a class = "btn btn-info btn-xs" href="update-administrator.php?administratorUserId=' . $row['administratorUserId'] . '">Update</a> <a class = "btn btn-danger btn-xs" onclick = "return confirm('."'Are you sure want to delete this account?'".')" href="controller.php?from=delete-administrator&administratorUserId=' . $row['administratorUserId'] . '">Delete</a>';
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
    SSP::complex( $_POST, $sql_details, $table, $primaryKey, $columns, "isDeleted = 0" )
);


 