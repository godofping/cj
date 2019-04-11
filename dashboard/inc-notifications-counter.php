<?php 
include('connection.php');

$db->select('notifications_table','coalesce(count(*), 0) as total',NULL,'administratorUserId = "' . $_SESSION['administratorUserId'] . '" and notificationIsRead = 0', NULL); 
$res = $db->getResult(); 

$res = $res[0];

echo $res['total'];

//--------------------notification for admin---------------------------


$db->select('orders_view','*',NULL,'orderPaymentStatus = "Unpaid" and orderStatus = "Pending Approval" and overDueDate < "' . date('Y-m-d H:i:s') . '"', NULL); 
	$output1 = $db->getResult(); 


	foreach ($output1 as $res1) {
		$userId = $db->escapeString($res1['userId']);

		$orderStatus = $db->escapeString("Cancelled");
		$orderId = $res1['orderId'];

		$db->update('orders_table',
		array(
			'orderStatus'=>$orderStatus,
			),
			'orderId=' . $orderId
		);

		$db->getResult();


		$db->select('order_details_view','*',NULL,'orderId = "' . $orderId . '"', NULL); 
		$output1234 = $db->getResult();

		foreach ($output1234 as $res1234) {

			$productStock = $db->escapeString($res1234['productStock']);
			$quantity = $db->escapeString($res1234['quantity']);
			$productVariationId = $db->escapeString($res1234['productVariationId']);

			$total = $productStock + $quantity;

			$db->update('product_variations_table',
			array(
				'productStock'=>$total,
				),
				'productVariationId=' . $res1234['productVariationId']
			);
			$db->getResult();


			$db->insert('inventory_logs_table',
			array(
				'productVariationId'=>$productVariationId,
				'inOrOut'=>'In',
				'quantity'=>$quantity,
				'transactionDateTime'=>date('Y-m-d H:i:s'),
				'inventoryLogRemark'=>'The stocks is increased by ' . $quantity . ' because the order number ' . $orderId . ' is cancelled.',
				)
			);
			$db->getResult();


		}




		
		$notificationMessage = $db->escapeString("Order number " . $orderId . " was automatically cancelled because of the payment overdue.");
		$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
		$notificationIsRead = $db->escapeString(0);

		$db->insert('notifications_table',
		array(
			'userId'=>$userId,
			'notificationMessage'=>$notificationMessage,
			'notificationDateTime'=>$notificationDateTime,
			'notificationIsRead'=>$notificationIsRead,
			'orderId'=>$orderId,

			)
		);
		$db->getResult();



		$db->select('administrators_view'); 
		$output = $db->getResult();

		foreach ($output as $res) {

			$administratorUserId = $db->escapeString($res['administratorUserId']);
			$notificationMessage = $db->escapeString("Order number " . $orderId . " was automatically cancelled because of the payment overdue.");
			$notificationDateTime = $db->escapeString(date('Y-m-d H:i:s'));
			$notificationIsRead = $db->escapeString(0);

			$db->insert('notifications_table',
			array(
				'administratorUserId'=>$administratorUserId,
				'notificationMessage'=>$notificationMessage,
				'notificationDateTime'=>$notificationDateTime,
				'notificationIsRead'=>$notificationIsRead,
				'orderId'=>$orderId,

				)
			);
			$db->getResult();
		}

	}



?>