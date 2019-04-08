/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.1.38-MariaDB : Database - cj_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cj_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cj_db`;

/*Table structure for table `administrators_table` */

DROP TABLE IF EXISTS `administrators_table`;

CREATE TABLE `administrators_table` (
  `administratorUserId` int(6) NOT NULL AUTO_INCREMENT,
  `administratorUserName` varchar(60) DEFAULT NULL,
  `administratorUserPassword` varchar(60) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  `administratorfullName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`administratorUserId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `administrators_table` */

insert  into `administrators_table`(`administratorUserId`,`administratorUserName`,`administratorUserPassword`,`isDeleted`,`administratorfullName`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',0,'Admin Name1'),(2,'user1','24c9e15e52afc47c225b757e7bee1f9d',1,'user1'),(3,'user2','7e58d63b60197ceb55a1c487989a3720',1,'user2'),(4,'user3','92877af70a45fd6a2ed7fe81e1236b78',1,'user3'),(5,'1','c4ca4238a0b923820dcc509a6f75849b',1,'1');

/*Table structure for table `inventory_logs_table` */

DROP TABLE IF EXISTS `inventory_logs_table`;

CREATE TABLE `inventory_logs_table` (
  `inventorylogId` int(6) NOT NULL AUTO_INCREMENT,
  `productVariationId` int(6) DEFAULT NULL,
  `inOrOut` varchar(60) DEFAULT NULL,
  `quantity` int(6) DEFAULT NULL,
  `transactionDateTime` datetime DEFAULT NULL,
  `inventoryLogRemark` text,
  PRIMARY KEY (`inventorylogId`),
  KEY `FK_inventory_logs_table` (`productVariationId`),
  CONSTRAINT `FK_inventory_logs_table` FOREIGN KEY (`productVariationId`) REFERENCES `product_variations_table` (`productVariationId`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

/*Data for the table `inventory_logs_table` */

insert  into `inventory_logs_table`(`inventorylogId`,`productVariationId`,`inOrOut`,`quantity`,`transactionDateTime`,`inventoryLogRemark`) values (1,9,'In',10,'2019-03-28 09:32:21','The stocks is increased by 10.'),(2,9,'Out',1,'2019-03-28 09:32:24','The stocks is decreased by 1 manually.'),(3,9,'In',1,'2019-03-28 09:40:23','The stocks is increased by 1.'),(4,9,'In',5,'2019-03-28 09:41:53','The stocks is increased by 5.'),(5,10,'In',20,'2019-03-28 09:51:55','The stocks is increased by 20.'),(6,11,'In',11,'2019-03-28 09:52:30','The stocks is increased by 11.'),(7,12,'In',12,'2019-03-28 09:52:32','The stocks is increased by 12.'),(8,13,'In',13,'2019-03-28 09:52:35','The stocks is increased by 13.'),(9,14,'In',15,'2019-03-28 09:52:38','The stocks is increased by 15.'),(10,15,'In',9,'2019-03-28 09:52:40','The stocks is increased by 9.'),(11,16,'In',8,'2019-03-28 09:52:42','The stocks is increased by 8.'),(12,17,'In',7,'2019-03-28 09:52:44','The stocks is increased by 7.'),(13,18,'In',5,'2019-03-28 09:52:45','The stocks is increased by 5.'),(14,19,'In',10,'2019-03-28 09:53:13','The stocks is increased by 10.'),(15,20,'In',13,'2019-03-28 09:53:15','The stocks is increased by 13.'),(16,21,'In',20,'2019-03-28 09:53:17','The stocks is increased by 20.'),(17,22,'In',14,'2019-03-28 09:53:19','The stocks is increased by 14.'),(18,23,'In',15,'2019-03-28 09:53:21','The stocks is increased by 15.'),(19,24,'In',16,'2019-03-28 09:53:29','The stocks is increased by 16.'),(20,25,'In',18,'2019-03-28 09:53:31','The stocks is increased by 18.'),(21,26,'In',20,'2019-03-28 09:53:34','The stocks is increased by 20.'),(22,27,'In',25,'2019-03-28 09:53:36','The stocks is increased by 25.'),(23,28,'In',25,'2019-03-28 09:53:38','The stocks is increased by 25.'),(24,29,'In',30,'2019-03-28 09:53:40','The stocks is increased by 30.'),(25,30,'In',40,'2019-03-28 09:53:42','The stocks is increased by 40.'),(26,31,'In',41,'2019-03-28 09:53:44','The stocks is increased by 41.'),(27,32,'In',10,'2019-03-28 09:53:47','The stocks is increased by 10.'),(28,33,'In',9,'2019-03-28 09:53:50','The stocks is increased by 9.'),(29,34,'In',16,'2019-03-28 09:53:52','The stocks is increased by 16.'),(30,35,'In',15,'2019-03-28 09:53:55','The stocks is increased by 15.'),(31,36,'In',10,'2019-03-28 09:53:57','The stocks is increased by 10.'),(32,37,'In',15,'2019-03-28 09:53:59','The stocks is increased by 15.'),(33,38,'In',20,'2019-03-28 09:54:01','The stocks is increased by 20.'),(34,11,'In',10,'2019-03-28 09:54:15','The stocks is increased by 10.'),(35,12,'In',10,'2019-03-28 09:54:18','The stocks is increased by 10.'),(36,13,'In',10,'2019-03-28 09:54:20','The stocks is increased by 10.'),(37,14,'In',10,'2019-03-28 09:54:22','The stocks is increased by 10.'),(38,15,'In',10,'2019-03-28 09:54:24','The stocks is increased by 10.'),(39,16,'In',10,'2019-03-28 09:54:27','The stocks is increased by 10.'),(40,17,'In',10,'2019-03-28 09:54:29','The stocks is increased by 10.'),(41,18,'In',15,'2019-03-28 09:54:32','The stocks is increased by 15.'),(42,19,'In',16,'2019-03-28 09:54:35','The stocks is increased by 16.'),(43,20,'In',5,'2019-03-28 09:54:37','The stocks is increased by 5.'),(44,39,'In',10,'2019-03-28 09:55:15','The stocks is increased by 10.'),(45,40,'In',15,'2019-03-28 09:55:17','The stocks is increased by 15.'),(46,41,'In',11,'2019-03-28 09:55:19','The stocks is increased by 11.'),(47,42,'In',12,'2019-03-28 09:55:21','The stocks is increased by 12.'),(48,43,'In',13,'2019-03-28 09:55:23','The stocks is increased by 13.'),(49,44,'In',14,'2019-03-28 09:55:24','The stocks is increased by 14.'),(50,45,'In',15,'2019-03-28 09:55:26','The stocks is increased by 15.'),(51,46,'In',15,'2019-03-28 09:55:28','The stocks is increased by 15.'),(52,2,'In',20,'2019-03-28 09:55:30','The stocks is increased by 20.'),(53,4,'In',21,'2019-03-28 09:55:32','The stocks is increased by 21.'),(54,5,'In',10,'2019-03-28 09:55:48','The stocks is increased by 10.'),(55,6,'In',11,'2019-03-28 09:55:49','The stocks is increased by 11.'),(56,8,'In',12,'2019-03-28 09:55:51','The stocks is increased by 12.'),(57,33,'In',12,'2019-03-28 09:55:53','The stocks is increased by 12.'),(58,32,'In',14,'2019-03-28 09:55:55','The stocks is increased by 14.'),(59,36,'In',123,'2019-03-28 09:56:02','The stocks is increased by 123.'),(60,9,'Out',15,'2019-03-29 01:09:37','The stocks is decreased by 15 manually.'),(61,9,'In',10,'2019-03-29 01:09:56','The stocks is increased by 10.'),(66,9,'Out',4,'2019-04-04 11:07:07','The stocks is decreased by 4 because of Order ID 12'),(67,46,'Out',2,'2019-04-04 15:26:51','The stocks is decreased by 2 because of Order ID 13'),(68,18,'Out',2,'2019-04-04 15:26:51','The stocks is decreased by 2 because of Order ID 13'),(69,42,'Out',3,'2019-04-04 22:41:48','The stocks is decreased by 3 because of Order ID 14'),(70,21,'Out',1,'2019-04-05 11:25:16','The stocks is decreased by 1 because of Order ID 16'),(71,40,'Out',1,'2019-04-05 11:25:16','The stocks is decreased by 1 because of Order ID 16'),(72,9,'Out',2,'2019-04-05 12:05:49','The stocks is decreased by 2 because of Order ID 17'),(73,35,'Out',1,'2019-04-05 15:27:28','The stocks is decreased by 1 because of Order ID 18'),(74,9,'Out',2,'2019-04-05 15:58:10','The stocks is decreased by 2 because of Order ID 19'),(75,46,'Out',13,'2019-04-06 15:53:34','The stocks is decreased by 13 because of Order ID 20'),(76,9,'Out',1,'2019-04-06 18:59:59','The stocks is decreased by 1 because of Order ID 21'),(77,39,'Out',1,'2019-04-06 18:59:59','The stocks is decreased by 1 because of Order ID 21'),(78,42,'Out',2,'2019-04-06 18:59:59','The stocks is decreased by 2 because of Order ID 21'),(79,44,'Out',1,'2019-04-06 19:06:38','The stocks is decreased by 1 because of Order ID 22'),(80,43,'Out',1,'2019-04-06 22:55:00','The stocks is decreased by 1 because of Order ID 23'),(81,22,'Out',1,'2019-04-07 09:25:48','The stocks is decreased by 1 because of Order ID 24'),(82,27,'Out',2,'2019-04-07 10:26:06','The stocks is decreased by 2 because of Order ID 25'),(83,26,'Out',2,'2019-04-07 16:50:05','The stocks is decreased by 2 because of Order ID 26'),(84,28,'Out',1,'2019-04-07 16:58:20','The stocks is decreased by 1 because of Order ID 27'),(85,34,'Out',8,'2019-04-07 20:25:50','The stocks is decreased by 8 because of Order ID 28'),(86,34,'Out',3,'2019-04-07 21:25:28','The stocks is decreased by 3 because of Order ID 29'),(87,31,'Out',4,'2019-04-07 22:02:15','The stocks is decreased by 4 because of Order ID 30'),(88,28,'Out',1,'2019-04-07 22:05:31','The stocks is decreased by 1 because of Order ID 31'),(89,28,'Out',2,'2019-04-07 22:31:21','The stocks is decreased by 2 because of Order ID 32'),(90,42,'Out',3,'2019-04-08 07:44:51','The stocks is decreased by 3 because of Order ID 33'),(91,42,'In',3,'2019-04-08 07:54:55','The stocks is increased by 3 because the order number 33 is cancelled.'),(92,42,'Out',2,'2019-04-08 07:56:46','The stocks is decreased by 2 because of Order number 34'),(93,42,'In',2,'2019-04-08 07:57:21','The stocks is increased by 2 because the order number 34 is cancelled.'),(94,15,'Out',2,'2019-04-08 11:17:24','The stocks is decreased by 2 because of Order number 35.'),(95,36,'Out',2,'2019-04-08 11:26:59','The stocks is decreased by 2 because of Order number 36.'),(96,29,'Out',1,'2019-04-08 12:58:21','The stocks is decreased by 1 because of Order number 37.'),(97,35,'Out',2,'2019-04-08 13:53:45','The stocks is decreased by 2 because of Order number 38.'),(98,35,'In',2,'2019-04-08 14:00:11','The stocks is increased by 2 because the order number 38 is cancelled.'),(99,37,'Out',2,'2019-04-08 14:35:44','The stocks is decreased by 2 because of Order number 39.'),(100,14,'Out',1,'2019-04-08 14:43:10','The stocks is decreased by 1 because of Order number 40.'),(101,36,'Out',3,'2019-04-08 14:56:26','The stocks is decreased by 3 because of Order number 41.'),(102,36,'In',3,'2019-04-08 15:45:45','The stocks is increased by 3 because the order number 41 is cancelled.');

/*Table structure for table `notifications_table` */

DROP TABLE IF EXISTS `notifications_table`;

CREATE TABLE `notifications_table` (
  `notificationId` int(6) NOT NULL AUTO_INCREMENT,
  `userId` int(6) DEFAULT NULL,
  `administratorUserId` int(6) DEFAULT NULL,
  `notificationMessage` text,
  `notificationDateTime` varchar(60) DEFAULT NULL,
  `notificationIsRead` tinyint(1) DEFAULT NULL,
  `orderId` int(6) DEFAULT NULL,
  `productVariationId` int(6) DEFAULT NULL,
  PRIMARY KEY (`notificationId`),
  KEY `FK_notifications_table` (`userId`),
  KEY `FK_notifications_table1` (`administratorUserId`),
  KEY `FK_notifications_table12` (`orderId`),
  KEY `FK_notifications_table3` (`productVariationId`),
  CONSTRAINT `FK_notifications_table` FOREIGN KEY (`administratorUserId`) REFERENCES `administrators_table` (`administratorUserId`),
  CONSTRAINT `FK_notifications_table1` FOREIGN KEY (`orderId`) REFERENCES `orders_table` (`orderId`),
  CONSTRAINT `FK_notifications_table2` FOREIGN KEY (`userId`) REFERENCES `users_table` (`userId`),
  CONSTRAINT `FK_notifications_table3` FOREIGN KEY (`productVariationId`) REFERENCES `product_variations_table` (`productVariationId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `notifications_table` */

insert  into `notifications_table`(`notificationId`,`userId`,`administratorUserId`,`notificationMessage`,`notificationDateTime`,`notificationIsRead`,`orderId`,`productVariationId`) values (1,7,NULL,'Order number 37 was confirmed.','2019-04-08 12:58:55',1,37,NULL),(2,7,NULL,'Order number 38 was cancelled.','2019-04-08 14:00:11',1,38,NULL),(3,7,NULL,'Order number 39 was confirmed.','2019-04-08 14:36:17',1,39,NULL),(4,7,NULL,'Order number 39 was rescheduled to April 09, 2019.','2019-04-08 14:39:25',1,39,NULL),(5,7,NULL,'Order number 39 was finished.','2019-04-08 14:42:42',1,39,NULL),(6,7,NULL,'Order number 40 was confirmed.','2019-04-08 14:43:38',1,40,NULL),(7,7,NULL,'Order number 40 pick up date is confirmed.','2019-04-08 14:44:52',1,40,NULL),(8,7,NULL,'Order number 41 payment was recieved.','2019-04-08 15:23:27',1,41,NULL),(9,7,NULL,'Order number 41 payment was invalid.','2019-04-08 15:28:09',1,41,NULL),(10,7,NULL,'Order number 41 was cancelled.','2019-04-08 15:45:45',1,41,NULL);

/*Table structure for table `order_details_table` */

DROP TABLE IF EXISTS `order_details_table`;

CREATE TABLE `order_details_table` (
  `orderDetailId` int(6) NOT NULL AUTO_INCREMENT,
  `productVariationId` int(6) DEFAULT NULL,
  `orderId` int(6) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`orderDetailId`),
  KEY `FK_order_details_table2` (`orderId`),
  KEY `FK_order_details_table1` (`productVariationId`),
  CONSTRAINT `FK_order_details_table` FOREIGN KEY (`orderId`) REFERENCES `orders_table` (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

/*Data for the table `order_details_table` */

insert  into `order_details_table`(`orderDetailId`,`productVariationId`,`orderId`,`quantity`,`price`) values (7,21,16,1,199),(8,40,16,1,299),(9,9,17,2,159),(10,35,18,1,398),(11,9,19,2,159),(15,46,20,13,1455),(16,9,21,1,159),(17,39,21,1,299),(18,42,21,2,251.75),(19,44,22,1,251.75),(20,43,23,1,251.75),(21,22,24,1,199),(22,27,25,2,149),(23,26,26,2,149),(24,28,27,1,149),(28,34,29,3,169),(29,31,30,4,159),(30,28,31,1,149),(31,28,32,2,149),(32,42,33,3,251.75),(33,42,34,2,251.75),(34,15,35,2,159),(35,36,36,2,398),(36,29,37,1,159),(37,35,38,2,398),(38,37,39,2,398),(39,14,40,1,159),(40,36,41,3,398);

/*Table structure for table `orders_table` */

DROP TABLE IF EXISTS `orders_table`;

CREATE TABLE `orders_table` (
  `orderId` int(6) NOT NULL AUTO_INCREMENT,
  `orderPickupDate` date DEFAULT NULL,
  `orderPlacedDate` datetime DEFAULT NULL,
  `orderShippingAddress` text,
  `orderType` varchar(60) DEFAULT NULL,
  `orderShipFirstName` varchar(60) DEFAULT NULL,
  `orderShipLastName` varchar(60) DEFAULT NULL,
  `orderShipEmail` varchar(60) DEFAULT NULL,
  `orderShipPhoneNumber` varchar(60) DEFAULT NULL,
  `orderStatus` varchar(60) DEFAULT NULL,
  `orderTotalAmount` float DEFAULT NULL,
  `orderShippingFee` float DEFAULT NULL,
  `userId` int(6) DEFAULT NULL,
  `orderDeliveryMethod` varchar(60) DEFAULT NULL,
  `billingAddress` text,
  `billingFirstName` varchar(60) DEFAULT NULL,
  `billingLastName` varchar(60) DEFAULT NULL,
  `billingEmail` varchar(60) DEFAULT NULL,
  `billingPhoneNumber` varchar(60) DEFAULT NULL,
  `orderModeOfPayment` varchar(60) DEFAULT NULL,
  `orderRemarks` text,
  `orderPaymentStatus` varchar(60) DEFAULT NULL,
  `orderIsReschedule` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`orderId`),
  KEY `FK_order_details_table` (`userId`),
  CONSTRAINT `FK_orders_table` FOREIGN KEY (`userId`) REFERENCES `users_table` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

/*Data for the table `orders_table` */

insert  into `orders_table`(`orderId`,`orderPickupDate`,`orderPlacedDate`,`orderShippingAddress`,`orderType`,`orderShipFirstName`,`orderShipLastName`,`orderShipEmail`,`orderShipPhoneNumber`,`orderStatus`,`orderTotalAmount`,`orderShippingFee`,`userId`,`orderDeliveryMethod`,`billingAddress`,`billingFirstName`,`billingLastName`,`billingEmail`,`billingPhoneNumber`,`orderModeOfPayment`,`orderRemarks`,`orderPaymentStatus`,`orderIsReschedule`) values (16,NULL,'2019-04-05 11:25:16','72, mabini street, tacurong city, sutltan kudarat','Online','Cesar','Santiago','customer@gmail.com','09367489655','Confirmed',498,NULL,6,'Shipping','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Remittance','tae1','Unpaid',NULL),(17,NULL,'2019-04-05 12:05:48','72, mabini street, tacurong city, sutltan kudarat','Online','Cesar','Santiago','customer@gmail.com','09367489655','Finished',318,NULL,6,'Shipping','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Remittance','tasdasd','Paid',NULL),(18,'2019-04-18','2019-04-05 15:27:28',NULL,'Online',NULL,NULL,NULL,NULL,'Cancelled',398,NULL,6,'Pick Up','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Walk In',NULL,'Unpaid',NULL),(19,'2019-04-12','2019-04-05 15:58:10',NULL,'Online',NULL,NULL,NULL,NULL,'Cancelled',318,NULL,6,'Pick Up','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Remittance','testing','Paid',NULL),(20,'2019-04-18','2019-04-06 15:53:34',NULL,'Online',NULL,NULL,NULL,NULL,'Confirmed',18915,NULL,6,'Pick Up','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Walk In',NULL,'Unpaid',NULL),(21,NULL,'2019-04-06 18:59:59','72, mabini street, tacurong city, sutltan kudarat','Online','Cesar','Santiago','customer@gmail.com','09367489655','Pending Approval',961.5,NULL,6,'Shipping','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Walk In',NULL,'Unpaid',NULL),(22,NULL,'2019-04-06 19:06:38','72, mabini street, tacurong city, sutltan kudarat','Online','Cesar','Santiago','customer@gmail.com','09367489655','Finished',251.75,NULL,6,'Shipping','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Remittance',NULL,'Paid',NULL),(23,'2019-04-10','2019-04-06 22:55:00',NULL,'Online',NULL,NULL,NULL,NULL,'Confirmed',251.75,NULL,6,'Pick Up','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Remittance',NULL,'Unpaid',NULL),(24,'2019-04-08','2019-04-07 09:25:48',NULL,'Online',NULL,NULL,NULL,NULL,'Finished',199,NULL,6,'Pick Up','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Walk In',NULL,'Paid',2),(25,'2019-04-10','2019-04-07 10:26:06',NULL,'Online',NULL,NULL,NULL,NULL,'Cancelled',298,NULL,6,'Pick Up','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Walk In',NULL,'Paid',2),(26,NULL,'2019-04-07 16:50:05','72, mabini street, tacurong city, sutltan kudarat','Online','Cesar','Santiago','customer@gmail.com','09367489655','Confirmed',298,NULL,6,'Shipping','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Remittance',NULL,'Paid',0),(27,NULL,'2019-04-07 16:58:20','72, mabini street, tacurong city, sutltan kudarat','Online','Cesar','Santiago','customer@gmail.com','09367489655','Confirmed',149,NULL,6,'Shipping','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Walk In',NULL,'Paid',0),(28,NULL,'2019-04-07 20:25:50','72, mabini street, tacurong city, sutltan kudarat','Online','Cesar','Santiago','customer@gmail.com','09367489655','Confirmed',1352,NULL,6,'Shipping','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Remittance',NULL,'Paid',0),(29,'2019-04-15','2019-04-07 21:25:28',NULL,'Online',NULL,NULL,NULL,NULL,'Confirmed',507,NULL,7,'Pick Up','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Remittance','tae nga basa','Paid',0),(30,NULL,'2019-04-07 22:02:15','66 malvar street, tacurong city, sultan kudarat','Online','Albert','Yale','test@gmail.com','09754363941','Cancelled',636,NULL,7,'Shipping','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Walk In','','Unpaid',0),(31,NULL,'2019-04-07 22:05:31','66 malvar street, tacurong city, sultan kudarat','Online','Albert','Yale','test@gmail.com','09754363941','Cancelled',149,NULL,7,'Shipping','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Remittance','tae','Unpaid',0),(32,'2019-04-09','2019-04-07 22:31:21',NULL,'Online',NULL,NULL,NULL,NULL,'Finished',298,NULL,7,'Pick Up','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Walk In','test','Paid',1),(33,NULL,'2019-04-08 07:44:51','66 malvar street, tacurong city, sultan kudarat','Online','Albert','Yale','test@gmail.com','09754363941','Cancelled',755.25,NULL,7,'Shipping','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Walk In',NULL,'Paid',0),(34,NULL,'2019-04-08 07:56:46','66 malvar street, tacurong city, sultan kudarat','Online','Albert','Yale','test@gmail.com','09754363941','Cancelled',503.5,NULL,7,'Shipping','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Remittance',NULL,'Unpaid',0),(35,'2019-04-09','2019-04-08 11:17:24',NULL,'Online',NULL,NULL,NULL,NULL,'Finished',318,NULL,7,'Pick Up','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Walk In',NULL,'Paid',2),(36,NULL,'2019-04-08 11:26:59','66 malvar street, tacurong city, sultan kudarat','Online','Albert','Yale','test@gmail.com','09754363941','Finished',796,NULL,7,'Shipping','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Walk In',NULL,'Paid',0),(37,NULL,'2019-04-08 12:58:21','66 malvar street, tacurong city, sultan kudarat','Online','Albert','Yale','test@gmail.com','09754363941','Confirmed',159,NULL,7,'Shipping','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Remittance',NULL,'Paid',0),(38,NULL,'2019-04-08 13:53:45','66 malvar street, tacurong city, sultan kudarat','Online','Albert','Yale','test@gmail.com','09754363941','Cancelled',796,NULL,7,'Shipping','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Remittance',NULL,'Paid',0),(39,'2019-04-09','2019-04-08 14:35:44',NULL,'Online',NULL,NULL,NULL,NULL,'Finished',796,NULL,7,'Pick Up','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Walk In',NULL,'Paid',2),(40,'2019-04-12','2019-04-08 14:43:10',NULL,'Online',NULL,NULL,NULL,NULL,'Confirmed',159,NULL,7,'Pick Up','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Walk In',NULL,'Paid',1),(41,NULL,'2019-04-08 14:56:26','66 malvar street, tacurong city, sultan kudarat','Online','Albert','Yale','test@gmail.com','09754363941','Cancelled',1194,NULL,7,'Shipping','66 malvar street, tacurong city, sultan kudarat','Albert','Yale','test@gmail.com','09754363941','Remittance',NULL,'Paid',0);

/*Table structure for table `payments_table` */

DROP TABLE IF EXISTS `payments_table`;

CREATE TABLE `payments_table` (
  `paymentId` int(6) NOT NULL AUTO_INCREMENT,
  `paymentAmount` varchar(60) DEFAULT NULL,
  `orderId` int(6) DEFAULT NULL,
  `paymentRecieptImage` text,
  `paymentStatus` varchar(60) DEFAULT NULL,
  `nameOfRemmitanceCenter` varchar(60) DEFAULT NULL,
  `controlNumber` varchar(60) DEFAULT NULL,
  `paymentTransactionDate` datetime DEFAULT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `FK_payments_table` (`orderId`),
  CONSTRAINT `FK_payments_table` FOREIGN KEY (`orderId`) REFERENCES `orders_table` (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `payments_table` */

insert  into `payments_table`(`paymentId`,`paymentAmount`,`orderId`,`paymentRecieptImage`,`paymentStatus`,`nameOfRemmitanceCenter`,`controlNumber`,`paymentTransactionDate`) values (1,'318',19,'0c011f55ccc606501a6566b30369b524Adidas_Logo_Flower__83153.1337144903.380.380.jpg','Recieved','palawan','6a5sd-as65d4','2019-04-05 22:33:46'),(2,'318',17,'ad7733be89b7037248706bf299cad3edAdidas_Logo_Flower__83153.1337144903.380.380.jpg','Recieved','lbc','a63s5d-as6d5','2019-04-06 16:44:44'),(7,'251.75',22,NULL,'Recieved',NULL,NULL,'2019-04-06 19:52:25'),(8,'199',24,NULL,'Recieved',NULL,NULL,'2019-04-07 10:16:22'),(9,'298',25,NULL,'Recieved',NULL,NULL,'2019-04-07 10:30:42'),(11,'298',26,NULL,'Recieved',NULL,NULL,'2019-04-07 16:56:49'),(12,'149',27,NULL,'Recieved',NULL,NULL,'2019-04-07 17:02:06'),(13,'507',29,'57b60f59b7942ec68d1cdd071c4274ffbank-transfer-png-3.png','Recieved','palawan','a6sd5a6s5d','2019-04-07 21:45:37'),(14,'298',32,NULL,'Recieved',NULL,NULL,'2019-04-07 22:31:41'),(15,'755.25',33,NULL,'Recieved',NULL,NULL,'2019-04-08 07:45:29'),(16,'1352',28,NULL,'Recieved',NULL,NULL,'2019-04-08 11:16:01'),(17,'318',35,NULL,'Recieved',NULL,NULL,'2019-04-08 11:17:51'),(18,'796',36,NULL,'Recieved',NULL,NULL,'2019-04-08 11:27:20'),(19,'159',37,NULL,'Recieved',NULL,NULL,'2019-04-08 12:58:42'),(20,'796',38,NULL,'Recieved',NULL,NULL,'2019-04-08 13:54:09'),(21,'796',39,NULL,'Recieved',NULL,NULL,'2019-04-08 14:36:03'),(22,'159',40,NULL,'Recieved',NULL,NULL,'2019-04-08 14:43:23'),(23,'1194',41,'423e858311ab3c7b837f3a4cd7fde424bank-transfer-png-3.png','Invalid','palawan','54aszd5-as54dasd','2019-04-08 15:02:01'),(24,'1194',41,NULL,'Recieved',NULL,NULL,'2019-04-08 15:23:27');

/*Table structure for table `product_categories_table` */

DROP TABLE IF EXISTS `product_categories_table`;

CREATE TABLE `product_categories_table` (
  `productCategoryId` int(6) NOT NULL AUTO_INCREMENT,
  `productCategory` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`productCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `product_categories_table` */

insert  into `product_categories_table`(`productCategoryId`,`productCategory`) values (8,'Men Fashion'),(9,'Women Fashion'),(10,'Health & Beauty'),(11,'Electronic Devices');

/*Table structure for table `product_images_table` */

DROP TABLE IF EXISTS `product_images_table`;

CREATE TABLE `product_images_table` (
  `productImageId` int(6) NOT NULL AUTO_INCREMENT,
  `productImageLocation` text,
  `isThumbnail` tinyint(1) DEFAULT '0',
  `productId` int(6) DEFAULT NULL,
  PRIMARY KEY (`productImageId`),
  KEY `FK_product_images_table` (`productId`),
  CONSTRAINT `FK_product_images_table` FOREIGN KEY (`productId`) REFERENCES `products_table` (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

/*Data for the table `product_images_table` */

insert  into `product_images_table`(`productImageId`,`productImageLocation`,`isThumbnail`,`productId`) values (1,'c19980b7098c74e9c05a095c603f8696test.jpg',1,21),(2,'3ea8c26260a522e6e5a689afc28178a7test.jpg',0,21),(3,'cb580195445fda73417256b844e78853test.jpg',0,21),(4,'default-image.jpg',1,22),(5,'default-image.jpg',0,22),(6,'default-image.jpg',0,22),(7,'default-image.jpg',1,23),(8,'default-image.jpg',0,23),(9,'default-image.jpg',0,23),(10,'default-image.jpg',1,24),(11,'default-image.jpg',0,24),(12,'default-image.jpg',0,24),(13,'default-image.jpg',1,25),(14,'default-image.jpg',0,25),(15,'default-image.jpg',0,25),(16,'default-image.jpg',1,26),(17,'default-image.jpg',0,26),(18,'default-image.jpg',0,26),(19,'default-image.jpg',1,27),(20,'default-image.jpg',0,27),(21,'default-image.jpg',0,27),(22,'84b2a4ebbc47b012ea64b7ffdb6cb8391407f0589fa7064dea5ad712cb0656ab.jpg_720x720q75.jpg',1,28),(23,'726938d64cdb0711fdc5f23458cc1ae6asdasd.jpg',0,28),(24,'635be41eae21fa1ed182a4c10c9a805b78b9b8d7996a9c8cc3285e2e70303943.jpg_720x720q80.jpg',0,28),(25,'ea750ffeb75c44453f159a239838cde11.jpg',1,29),(26,'ea9e9739f17a9d0f4a756048217e20942.jpG',0,29),(27,'a1c0deff5e858fe7e6b67524d96d7be23.jpg',0,29),(28,'808694bb9b0432ccae3d4efaea8accaa1.jpg',1,30),(29,'e9cf5d663bd618009ed358fea829daaf2.jpeg',0,30),(30,'d67333d50f295766033338c4975f137f3.jpeg',0,30),(31,'4700cca5612b0bb564e00814b26b50bb1.jpg',1,31),(32,'3709daac0c690905097a7ffee2b96b152.jpG',0,31),(33,'6a1c6c14b74a86a973368d45e2335a393.jpg',0,31),(34,'c1343e958909c377392037b8e75562c5blue.jpg',1,32),(35,'fc02c552684e18a77a6f8b494e04cf61grey.jpg',0,32),(36,'7e19c1303f54ffed54d4692e2b96690ered.jpg',0,32),(37,'0710d69e4303885ebf094b446baf1d805322681753bc6c7a224cf375455b71d2.jpg_720x720q80.jpg',1,33),(38,'default-image.jpg',0,33),(39,'default-image.jpg',0,33),(40,'2e8ba2a82156b7b9c67c4c83b46500791.jpg',1,34),(41,'852688d54f7cbddb8cf05b7ff06806e52.jpg',0,34),(42,'default-image.jpg',0,34),(43,'f2b0c5ee1cc34f634200a28546eeef9d1.jpg',1,35),(44,'3e989ac852301ce7f8850daec6d5e26d2.jpg',0,35),(45,'94996e1d0bd98741b6f29271a77b82d93.jpg',0,35),(46,'f0ccaf9aa4cce3784e89952f65311ff31.jpg',1,36),(47,'e287ec8e1bdc1422f078dceba5cd386c2.jpg',0,36),(48,'f176a8bfce32ff42926d365bcd7985253.jpg',0,36);

/*Table structure for table `product_reviews_table` */

DROP TABLE IF EXISTS `product_reviews_table`;

CREATE TABLE `product_reviews_table` (
  `productReviewId` int(6) NOT NULL AUTO_INCREMENT,
  `productVariationId` int(6) DEFAULT NULL,
  `productReview` text,
  `productReviewDate` date DEFAULT NULL,
  `userId` int(6) DEFAULT NULL,
  PRIMARY KEY (`productReviewId`),
  KEY `FK_product_reviews_table` (`productVariationId`),
  KEY `FK_product_reviews_table1` (`userId`),
  CONSTRAINT `FK_product_reviews_table` FOREIGN KEY (`userId`) REFERENCES `users_table` (`userId`),
  CONSTRAINT `FK_product_reviews_table1` FOREIGN KEY (`productVariationId`) REFERENCES `product_variations_table` (`productVariationId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `product_reviews_table` */

insert  into `product_reviews_table`(`productReviewId`,`productVariationId`,`productReview`,`productReviewDate`,`userId`) values (1,9,'nice product','2019-04-06',6);

/*Table structure for table `product_sub_categories_table` */

DROP TABLE IF EXISTS `product_sub_categories_table`;

CREATE TABLE `product_sub_categories_table` (
  `productSubCategoryId` int(6) NOT NULL AUTO_INCREMENT,
  `productSubCategory` varchar(60) DEFAULT NULL,
  `productCategoryId` int(6) DEFAULT NULL,
  PRIMARY KEY (`productSubCategoryId`),
  KEY `FK_product_sub_categories_table` (`productCategoryId`),
  CONSTRAINT `FK_product_sub_categories_table` FOREIGN KEY (`productCategoryId`) REFERENCES `product_categories_table` (`productCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `product_sub_categories_table` */

insert  into `product_sub_categories_table`(`productSubCategoryId`,`productSubCategory`,`productCategoryId`) values (3,'t',NULL),(5,'Casual Tops',8),(6,'Shirts',8),(7,'Pants',8),(8,'Jeans',8),(9,'Jackets & Coats',8),(10,'Sneakers',8),(11,'Formal Shoes',8),(12,'Boots',8),(13,'Bags',8),(14,'Accessories',8),(15,'Dresses',9),(16,'Tops',9),(17,'Pants & Leggings',9),(18,'Jackets & Coats',9),(19,'Lingerie, Sleep & Lounge',9),(20,'Flat Shoes',9),(21,'Sandals',9),(22,'Sneakers',9),(23,'Bags',9),(24,'Muslim Wear',9),(25,'Bath & Body',10),(26,'Beauty Tools',10),(27,'Fragrances',10),(28,'Hair Care',10),(29,'Makeup',10),(30,'Men\'s Care',10),(31,'Personal Care',10),(32,'Skin Care',10),(33,'Food Supplements',10),(34,'Medical Supplies',10),(35,'Mobiles',11),(36,'Tablets',11),(37,'Security Cameras',11),(38,'Car Cameras',11),(39,'Action/Video Cameras',11),(40,'Digital Cameras',11),(41,'Laptops',11),(42,'Desktops',11),(43,'Gaming Consoles',11),(44,'Gadgets',11);

/*Table structure for table `product_variations_table` */

DROP TABLE IF EXISTS `product_variations_table`;

CREATE TABLE `product_variations_table` (
  `productVariationId` int(6) NOT NULL AUTO_INCREMENT,
  `productId` int(6) DEFAULT NULL,
  `productStock` int(6) DEFAULT NULL,
  `productStocksReorderPoint` int(6) DEFAULT NULL,
  `productOption1` varchar(60) DEFAULT NULL,
  `productOption2` varchar(60) DEFAULT NULL,
  `productVariationIsDeleted` tinyint(1) DEFAULT NULL,
  `productPrice` float DEFAULT NULL,
  PRIMARY KEY (`productVariationId`),
  KEY `FK_product_variations_table1` (`productId`),
  CONSTRAINT `FK_product_variations_table` FOREIGN KEY (`productId`) REFERENCES `products_table` (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `product_variations_table` */

insert  into `product_variations_table`(`productVariationId`,`productId`,`productStock`,`productStocksReorderPoint`,`productOption1`,`productOption2`,`productVariationIsDeleted`,`productPrice`) values (2,23,20,0,'250ml','',0,179),(3,23,0,0,'tae1','tae',1,1),(4,26,21,0,'620ml','',0,399),(5,26,10,0,'tae1','',0,123123),(6,21,11,0,'32GB ROM','3gb RAM',0,6990),(7,21,0,0,'1','1',1,1),(8,21,12,0,'16GB ROM','2gb RAM',0,4990),(9,28,1,5,'XS','',0,159),(10,28,20,1,'S','',0,159),(11,28,21,0,'M','',0,159),(12,28,22,0,'L','',0,159),(13,28,23,0,'XL','',0,159),(14,29,17,0,'S','',0,159),(15,29,17,0,'M','',0,159),(16,29,18,0,'L','',0,159),(17,29,17,0,'XL','',0,159),(18,30,18,0,'CHECK','M',0,89),(19,30,26,0,'KELLY','M',0,89),(20,30,18,0,'NIKE','M',0,89),(21,31,19,0,'XS','',0,199),(22,31,13,0,'S','',0,199),(23,31,15,0,'M','',0,199),(24,31,16,0,'L','',0,199),(25,31,18,0,'XL','',0,199),(26,32,18,0,'BLUE','S',0,149),(27,32,23,0,'BLUE','M',0,149),(28,32,21,0,'BLUE','L',0,149),(29,32,29,0,'GRAY','S',0,159),(30,32,40,0,'GRAY','M',0,159),(31,32,37,0,'GRAY','L',0,159),(32,32,24,0,'RED','S',0,169),(33,32,21,0,'RED','M',0,169),(34,32,5,0,'RED','L',0,169),(35,33,14,0,'M','',0,398),(36,33,131,0,'L','',0,398),(37,33,13,0,'XL','',0,398),(38,33,20,0,'XXL','',0,398),(39,34,3,0,'BLACK','40',0,299),(40,34,14,0,'BLACK','42',0,299),(41,34,11,0,'BLACK','44',0,299),(42,35,5,0,'BLACK','38',0,251.75),(43,35,12,0,'BLACK','40',0,251.75),(44,35,13,0,'BLACK','42',0,251.75),(45,35,15,0,'BLACK','44',0,251.75),(46,36,0,0,'SAND','39',0,1455);

/*Table structure for table `products_table` */

DROP TABLE IF EXISTS `products_table`;

CREATE TABLE `products_table` (
  `productId` int(6) NOT NULL AUTO_INCREMENT COMMENT 'product primary key ',
  `productName` varchar(60) DEFAULT NULL COMMENT 'product name',
  `productSubCategoryId` int(6) DEFAULT NULL COMMENT 'product category fk',
  `productDetails` text COMMENT 'product details',
  `productUpdateDate` datetime DEFAULT NULL COMMENT 'when ging update ang product',
  `productIsDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`productId`),
  KEY `FK_products_table123` (`productSubCategoryId`),
  CONSTRAINT `FK_products_table` FOREIGN KEY (`productSubCategoryId`) REFERENCES `product_sub_categories_table` (`productSubCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `products_table` */

insert  into `products_table`(`productId`,`productName`,`productSubCategoryId`,`productDetails`,`productUpdateDate`,`productIsDeleted`) values (21,'Huawei Y6 Pro 2019 6.09 inches HD+ Screen Smart',35,'<ul class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.7e9f43d8rr8Wa7\">\r\n<li class=\"\">EMUI 9.0 (compatible with Android 9)</li>\r\n<li class=\"\">Screen Size: 6.09inches</li>\r\n<li class=\"\">Battery capacity: 3020mAh</li>\r\n<li class=\"\">3GB RAM + 32 GB ROM</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.7e9f43d8rr8Wa7\">Rear camera: 13MP, LED flash and f/1.8 aperture</li>\r\n<li class=\"\">Front camera: 8MP, LED flash and f/2.0 aperture</li>\r\n<li class=\"\">Network: LTE TDD / LTE FDD / WCDMA / GSM , support 2/3/4G &amp; wifi</li>\r\n<li class=\"\">Connectivity:Bluetooth 4.2 , Micro USB, Wi-Fi Direct, Wi-Fi Hot Spot</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i2.7e9f43d8rr8Wa7\">External memory support:microSD up to 512GB</li>\r\n</ul>','2019-03-24 19:53:59',0),(22,'Imarflex IHS-210C Curling iron',26,'<ul class=\"\">\r\n<li class=\"\">CURLING IRON</li>\r\n<li class=\"\">CERAMIC Coated Curling Tong&nbsp;</li>\r\n<li class=\"\">Hanging Ring Feature</li>\r\n<li class=\"\">Foldable Stand</li>\r\n<li class=\"\">Safety Heat Guard</li>\r\n<li class=\"\">Pilot Light Indicator</li>\r\n<li class=\"\">360&deg; FREE SWIVEL Power Cord &amp; Hook</li>\r\n<li class=\"\">25W heating Power</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.291c321bKtWUcT\">Advance Heating COMPONENT</li>\r\n</ul>','2019-03-22 22:10:21',0),(23,'BODY TREATS Body Oil Lavender Almond Nut',25,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.51f6b5bfx8gvD3\">Vanishing Light Oil that makes your skin moisturized soft and silky.It absorbs quickly too!Moisturizes and protects skin from the sun damage</li>\r\n</ul>','2019-03-24 19:06:38',0),(24,'ta',5,'<p>123tae</p>','2019-03-24 08:18:45',1),(25,'Huawei MediaPad T3 7',41,'<ul class=\"\">\r\n<li class=\"\">OS : Andriod N .EMUI 5.1</li>\r\n<li class=\"\">Processor :Spreadtrum SC7731G, quad-core A7, 4 x 1.3 GHz</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.30155762ZS4VEc\">Display :7 inches, 1024&times;600 IPS</li>\r\n<li class=\"\">Internal Storage : 16GB ROM</li>\r\n<li class=\"\">Memory : 2GB RAM</li>\r\n<li class=\"\">Rear camera: 2 MP and fixed focus</li>\r\n<li class=\"\">Front camera: 2 MP and fixed focus</li>\r\n<li class=\"\">Battery :4100 mAh* (typical)</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.30155762ZS4VEc\">Supports GPS, A-GPS</li>\r\n</ul>','2019-03-24 18:40:46',0),(26,'TRESEMME HAIR CONDITIONER KERATIN SMOOTH',28,'<ul class=\"\">\r\n<li class=\"\">TRESemme Keratin Smooth Hair Conditioner with Argan Oil and Keratin.</li>\r\n<li class=\"\">Micro-Conditioning Technology.</li>\r\n<li class=\"\">5 benefits in just 1 wash: anti-frizz, detangles, shines, smoothens, tames flyaways.</li>\r\n<li class=\"\">For smooth hair.</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.6f75657ahgj17z\">Suitable for colour treated hair.</li>\r\n</ul>','2019-03-24 19:33:47',0),(27,'test delete',5,'<p>tae1</p>','2019-03-24 20:27:16',1),(28,'INSPI Tees Summer Collection tshirt printed graphic tee Mens',5,'<ul class=\"\">\r\n<li class=\"\">Please see Size Chart</li>\r\n<li class=\"\">Asian Size. Semi-fit.</li>\r\n<li class=\"\">100% Original INSPI</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Cotton tshirt</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Silk screen printed tshirts</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.1160503dnvMkQL\">Straight hem t shirts</li>\r\n</ul>','2019-03-26 11:51:57',0),(29,'INSPI Tees Whale Boat (White) tshirt printed graphic tee',5,'<ul class=\"\">\r\n<li class=\"\">Please see Size Chart</li>\r\n<li class=\"\">Asian Size</li>\r\n<li class=\"\">100% Original INSPI</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Cotton tshirt</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Silk screen printed tshirts</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.e0f61738wftiTC\">Straight hem t shirts</li>\r\n</ul>','2019-03-26 12:00:07',0),(30,'ICM #BESTSELLER TOPS T-SHIRT FOR MEN',5,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.11da481aIxK0Mj\">FREE SIZE FIT TO MEDIUM&nbsp;CHEST 16.5 INCHSLENGTH 26.5 INCHS&nbsp;#TOPS #TSHIRT #BESTSELLER#FASHION</li>\r\n</ul>','2019-03-26 12:03:27',0),(31,'INSPI shirt Set goals reach repeat (Maroon) tshirt printed g',5,'<ul class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.4d4e3765NlT0pY\">\r\n<li class=\"\">Please see Size Chart</li>\r\n<li class=\"\">Asian Size. Semi-fit.</li>\r\n<li class=\"\">100% Original INSPI</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Cotton tshirt</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Silk screen printed tshirts</li>\r\n<li class=\"\">Straight hem t shirts</li>\r\n</ul>','2019-03-26 12:05:36',0),(32,'SIMPLE Fashion Men`S Casual T Shirt Short Sleeve Round neck ',5,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.63dc17cffS0ErV\">Size S. Suggest35-50 body weight 145-168cn heightSize M . Suggest 45-55 body weight 150-170 cn heightSize L . Suggest 55-65 body weight 150-175 cn heightSize XL . Suggest 65-75 body weight 160-175 cn heightSize XXL. Suggest 65-80 body weight 165-185 cn height</li>\r\n</ul>','2019-03-26 12:07:56',0),(33,'Kuhong New Summer Men Slim Short-sleeved Round Casual T-shir',6,'<ul class=\"\">\r\n<li class=\"\">Color: Yellow</li>\r\n<li class=\"\">Size: M, L, XL, XXL</li>\r\n<li class=\"\">Material: cotton</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.473dbb76L0jtHH\">Type: T-Shirt</li>\r\n</ul>','2019-03-26 12:17:29',0),(34,'Safety Shoes Anti-smashing Work shoes Protect Shoes',12,'<ul class=\"\">\r\n<li class=\"\">Product details ofSafety Shoes Anti-smashing assassination Work shoes Protect ShoesFeatures:</li>\r\n<li class=\"\">Microfibre leather</li>\r\n<li class=\"\">Sandwich breathable mesh deodorant and comfortable</li>\r\n<li class=\"\">Waterproof and breathable</li>\r\n<li class=\"\">Anti-skidding and oil proof</li>\r\n<li class=\"\">*Smash-proof steel toe</li>\r\n<li class=\"\">*Penetration-resistant</li>\r\n<li class=\"\">*Shoes with gusset tongue</li>\r\n<li class=\"\">Specifications:</li>\r\n<li class=\"\">Color:black</li>\r\n<li class=\"\">Material:sandwich microfibre leather</li>\r\n<li class=\"\">Lining:breathable mesh</li>\r\n<li class=\"\">Sole:rubber</li>\r\n<li class=\"\">Toe:steel</li>\r\n<li class=\"\">Weight:1.2kg</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.53aa4088ubbtTy\">Function:high shoes,gusset tongue,smash-proof and penetration-resistant</li>\r\n</ul>','2019-03-26 21:54:07',0),(35,'Forklift Safety Shoes High Cut Sewed And Vulcanized',12,'<ul class=\"\">\r\n<li class=\"\">Product details ofSafety Shoes Anti-smashing assassination Work shoes Protect ShoesFeatures:</li>\r\n<li class=\"\">Microfibre leather</li>\r\n<li class=\"\">Sandwich breathable mesh deodorant and comfortable</li>\r\n<li class=\"\">Waterproof and breathable</li>\r\n<li class=\"\">Anti-skidding and oil proof</li>\r\n<li class=\"\">*Smash-proof steel toe</li>\r\n<li class=\"\">*Penetration-resistant</li>\r\n<li class=\"\">*Shoes with gusset tongue</li>\r\n<li class=\"\">Specifications:</li>\r\n<li class=\"\">Color:black</li>\r\n<li class=\"\">Material:sandwich microfibre leather</li>\r\n<li class=\"\">Lining:breathable mesh</li>\r\n<li class=\"\">Sole:rubber</li>\r\n<li class=\"\">Toe:steel</li>\r\n<li class=\"\">Weight:1.2kg</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.1f092ab31xWviP\">Function:high shoes,gusset tongue,smash-proof and penetration-resistant</li>\r\n</ul>','2019-03-27 08:29:45',0),(36,'NICUDU Men Desert Boot High Quality Cow Leather Work Shoes T',12,'<ul class=\"\">\r\n<li class=\"\">Feature:Comfortable</li>\r\n<li class=\"\">Color: Blackï¼ŒBrown</li>\r\n<li class=\"\">Upper Material:Cow leather</li>\r\n<li class=\"\">Closure Type:Lace-up</li>\r\n<li class=\"\">Shoe Width: Medium</li>\r\n<li class=\"\">Shoes Type: Casual</li>\r\n</ul>','2019-03-27 08:35:37',0);

/*Table structure for table `user_feedbacks_table` */

DROP TABLE IF EXISTS `user_feedbacks_table`;

CREATE TABLE `user_feedbacks_table` (
  `userFeedbackId` int(6) NOT NULL AUTO_INCREMENT,
  `userId` int(6) DEFAULT NULL,
  `userFeedback` text,
  `userFeedbackDate` date DEFAULT NULL,
  `userFeedbackStatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`userFeedbackId`),
  KEY `FK_customer_feedbacks_table` (`userId`),
  CONSTRAINT `FK_user_feedbacks_table` FOREIGN KEY (`userId`) REFERENCES `users_table` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `user_feedbacks_table` */

insert  into `user_feedbacks_table`(`userFeedbackId`,`userId`,`userFeedback`,`userFeedbackDate`,`userFeedbackStatus`) values (1,6,'test','2019-03-25',2),(2,6,'test','2019-03-25',2),(3,6,'tae','2019-03-25',2),(4,6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo quam ac eros suscipit, vitae rhoncus risus vestibulum. Mauris at dapibus quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut enim sodales, scelerisque libero quis, efficitur lorem. Curabitur et finibus nunc.','2019-03-25',1),(5,6,'test','2019-03-25',1),(6,6,'te','2019-03-25',1),(7,6,'tes','2019-03-25',1),(8,7,'hahaha','2019-04-04',1);

/*Table structure for table `users_table` */

DROP TABLE IF EXISTS `users_table`;

CREATE TABLE `users_table` (
  `userId` int(6) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(60) DEFAULT NULL,
  `userPassword` varchar(60) DEFAULT NULL,
  `userFirstName` varchar(60) DEFAULT NULL,
  `userLastName` varchar(60) DEFAULT NULL,
  `userAddress` varchar(60) DEFAULT NULL,
  `userRegistrationDate` date DEFAULT NULL,
  `userPhoneNumber` varchar(60) DEFAULT NULL,
  `userType` varchar(60) DEFAULT NULL,
  `userIsBlocked` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `users_table` */

insert  into `users_table`(`userId`,`userEmail`,`userPassword`,`userFirstName`,`userLastName`,`userAddress`,`userRegistrationDate`,`userPhoneNumber`,`userType`,`userIsBlocked`) values (1,'cjashleywalkincustomer@gmail.com','7ede9788c3c58bf9cb78147c155f0eff','Walkin','Walkin','none','2019-03-24','none','Walkin',0),(6,'customer@gmail.com','91ec1f9324753048c0096d036a694f86','Cesar','Santiago','72, mabini street, tacurong city, sutltan kudarat','2019-03-24','09367489655','Online',0),(7,'test@gmail.com','098f6bcd4621d373cade4e832627b4f6','Albert','Yale','66 malvar street, tacurong city, sultan kudarat','2019-03-24','09754363941','Online',0),(8,'testing@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','Jonathan','Anderson','65 National Highway, Tacurong City, Sultan Kudarat','2019-03-29','09754523655','Online',0);

/*Table structure for table `administrators_view` */

DROP TABLE IF EXISTS `administrators_view`;

/*!50001 DROP VIEW IF EXISTS `administrators_view` */;
/*!50001 DROP TABLE IF EXISTS `administrators_view` */;

/*!50001 CREATE TABLE  `administrators_view`(
 `administratorUserId` int(6) ,
 `administratorUserName` varchar(60) ,
 `administratorUserPassword` varchar(60) ,
 `isDeleted` tinyint(1) ,
 `administratorfullName` varchar(60) 
)*/;

/*Table structure for table `inventory_logs_view` */

DROP TABLE IF EXISTS `inventory_logs_view`;

/*!50001 DROP VIEW IF EXISTS `inventory_logs_view` */;
/*!50001 DROP TABLE IF EXISTS `inventory_logs_view` */;

/*!50001 CREATE TABLE  `inventory_logs_view`(
 `inventorylogId` int(6) ,
 `productVariationId` int(6) ,
 `inOrOut` varchar(60) ,
 `quantity` int(6) ,
 `transactionDateTime` datetime ,
 `inventoryLogRemark` text ,
 `productId` int(6) ,
 `productStock` int(6) ,
 `productStocksReorderPoint` int(6) ,
 `productOption1` varchar(60) ,
 `productOption2` varchar(60) ,
 `productVariationIsDeleted` tinyint(1) ,
 `productPrice` float 
)*/;

/*Table structure for table `order_details_view` */

DROP TABLE IF EXISTS `order_details_view`;

/*!50001 DROP VIEW IF EXISTS `order_details_view` */;
/*!50001 DROP TABLE IF EXISTS `order_details_view` */;

/*!50001 CREATE TABLE  `order_details_view`(
 `orderDetailId` int(6) ,
 `productVariationId` int(6) ,
 `orderId` int(6) ,
 `quantity` int(11) ,
 `price` float ,
 `productId` int(6) ,
 `productStock` int(6) ,
 `productStocksReorderPoint` int(6) ,
 `productOption1` varchar(60) ,
 `productOption2` varchar(60) ,
 `productVariationIsDeleted` tinyint(1) ,
 `productPrice` float ,
 `productName` varchar(60) ,
 `productSubCategoryId` int(6) ,
 `productDetails` text ,
 `productUpdateDate` datetime ,
 `productIsDeleted` tinyint(1) ,
 `productSubCategory` varchar(60) ,
 `productCategoryId` int(6) ,
 `productCategory` varchar(60) ,
 `orderPickupDate` date ,
 `orderPlacedDate` datetime ,
 `orderPaymentStatus` varchar(60) ,
 `orderShippingAddress` text ,
 `orderType` varchar(60) ,
 `orderShipFirstName` varchar(60) ,
 `orderShipLastName` varchar(60) ,
 `orderShipEmail` varchar(60) ,
 `orderIsReschedule` tinyint(1) ,
 `orderShipPhoneNumber` varchar(60) ,
 `orderShippingFee` float ,
 `orderRemarks` text ,
 `orderStatus` varchar(60) ,
 `userId` int(6) ,
 `orderDeliveryMethod` varchar(60) ,
 `billingAddress` text ,
 `billingFirstName` varchar(60) ,
 `billingLastName` varchar(60) ,
 `billingEmail` varchar(60) ,
 `billingPhoneNumber` varchar(60) ,
 `orderModeOfPayment` varchar(60) ,
 `userEmail` varchar(60) ,
 `userPassword` varchar(60) ,
 `userFirstName` varchar(60) ,
 `userLastName` varchar(60) ,
 `userAddress` varchar(60) ,
 `userRegistrationDate` date ,
 `userPhoneNumber` varchar(60) ,
 `userType` varchar(60) ,
 `userIsBlocked` tinyint(1) 
)*/;

/*Table structure for table `orders_view` */

DROP TABLE IF EXISTS `orders_view`;

/*!50001 DROP VIEW IF EXISTS `orders_view` */;
/*!50001 DROP TABLE IF EXISTS `orders_view` */;

/*!50001 CREATE TABLE  `orders_view`(
 `orderId` int(6) ,
 `orderPickupDate` date ,
 `orderPlacedDate` datetime ,
 `orderShippingAddress` text ,
 `orderType` varchar(60) ,
 `orderShipFirstName` varchar(60) ,
 `orderShipLastName` varchar(60) ,
 `orderShipEmail` varchar(60) ,
 `orderShipPhoneNumber` varchar(60) ,
 `orderStatus` varchar(60) ,
 `orderPaymentStatus` varchar(60) ,
 `orderTotalAmount` float ,
 `userId` int(6) ,
 `orderDeliveryMethod` varchar(60) ,
 `billingAddress` text ,
 `billingFirstName` varchar(60) ,
 `billingLastName` varchar(60) ,
 `billingEmail` varchar(60) ,
 `billingPhoneNumber` varchar(60) ,
 `orderShippingFee` float ,
 `orderRemarks` text ,
 `orderModeOfPayment` varchar(60) ,
 `orderIsReschedule` tinyint(1) ,
 `userEmail` varchar(60) ,
 `userPassword` varchar(60) ,
 `userFirstName` varchar(60) ,
 `userLastName` varchar(60) ,
 `administratorfullName` varchar(121) ,
 `userAddress` varchar(60) ,
 `userRegistrationDate` date ,
 `userPhoneNumber` varchar(60) ,
 `userType` varchar(60) ,
 `userIsBlocked` tinyint(1) 
)*/;

/*Table structure for table `payments_view` */

DROP TABLE IF EXISTS `payments_view`;

/*!50001 DROP VIEW IF EXISTS `payments_view` */;
/*!50001 DROP TABLE IF EXISTS `payments_view` */;

/*!50001 CREATE TABLE  `payments_view`(
 `paymentId` int(6) ,
 `paymentAmount` varchar(60) ,
 `orderId` int(6) ,
 `paymentRecieptImage` text ,
 `paymentStatus` varchar(60) ,
 `nameOfRemmitanceCenter` varchar(60) ,
 `controlNumber` varchar(60) ,
 `paymentTransactionDate` datetime ,
 `orderPickupDate` date ,
 `orderPlacedDate` datetime ,
 `orderShippingAddress` text ,
 `orderType` varchar(60) ,
 `orderShipFirstName` varchar(60) ,
 `orderShipLastName` varchar(60) ,
 `orderShipEmail` varchar(60) ,
 `orderShipPhoneNumber` varchar(60) ,
 `orderStatus` varchar(60) ,
 `orderPaymentStatus` varchar(60) ,
 `orderTotalAmount` float ,
 `orderShippingFee` float ,
 `userId` int(6) ,
 `orderDeliveryMethod` varchar(60) ,
 `billingAddress` text ,
 `billingFirstName` varchar(60) ,
 `billingLastName` varchar(60) ,
 `billingEmail` varchar(60) ,
 `billingPhoneNumber` varchar(60) ,
 `orderModeOfPayment` varchar(60) ,
 `orderRemarks` text 
)*/;

/*Table structure for table `product_categories_view` */

DROP TABLE IF EXISTS `product_categories_view`;

/*!50001 DROP VIEW IF EXISTS `product_categories_view` */;
/*!50001 DROP TABLE IF EXISTS `product_categories_view` */;

/*!50001 CREATE TABLE  `product_categories_view`(
 `productCategoryId` int(6) ,
 `productCategory` varchar(60) 
)*/;

/*Table structure for table `product_images_view` */

DROP TABLE IF EXISTS `product_images_view`;

/*!50001 DROP VIEW IF EXISTS `product_images_view` */;
/*!50001 DROP TABLE IF EXISTS `product_images_view` */;

/*!50001 CREATE TABLE  `product_images_view`(
 `productImageId` int(6) ,
 `productImageLocation` text ,
 `isThumbnail` tinyint(1) ,
 `productId` int(6) ,
 `productName` varchar(60) ,
 `productSubCategoryId` int(6) ,
 `productDetails` text ,
 `productUpdateDate` datetime ,
 `productIsDeleted` tinyint(1) ,
 `productSubCategory` varchar(60) ,
 `productCategoryId` int(6) ,
 `productCategory` varchar(60) 
)*/;

/*Table structure for table `product_reviews_view` */

DROP TABLE IF EXISTS `product_reviews_view`;

/*!50001 DROP VIEW IF EXISTS `product_reviews_view` */;
/*!50001 DROP TABLE IF EXISTS `product_reviews_view` */;

/*!50001 CREATE TABLE  `product_reviews_view`(
 `productReviewId` int(6) ,
 `productVariationId` int(6) ,
 `productReview` text ,
 `productReviewDate` date ,
 `userId` int(6) ,
 `productId` int(6) ,
 `productStock` int(6) ,
 `productStocksReorderPoint` int(6) ,
 `productOption1` varchar(60) ,
 `productOption2` varchar(60) ,
 `productVariationIsDeleted` tinyint(1) ,
 `productPrice` float ,
 `productName` varchar(60) ,
 `productSubCategoryId` int(6) ,
 `productDetails` text ,
 `productUpdateDate` datetime ,
 `productIsDeleted` tinyint(1) ,
 `productSubCategory` varchar(60) ,
 `productCategory` varchar(60) ,
 `userEmail` varchar(60) ,
 `userPassword` varchar(60) ,
 `userFirstName` varchar(60) ,
 `userLastName` varchar(60) ,
 `userAddress` varchar(60) ,
 `userRegistrationDate` date ,
 `userPhoneNumber` varchar(60) ,
 `userType` varchar(60) ,
 `userIsBlocked` tinyint(1) 
)*/;

/*Table structure for table `product_sub_categories_view` */

DROP TABLE IF EXISTS `product_sub_categories_view`;

/*!50001 DROP VIEW IF EXISTS `product_sub_categories_view` */;
/*!50001 DROP TABLE IF EXISTS `product_sub_categories_view` */;

/*!50001 CREATE TABLE  `product_sub_categories_view`(
 `productSubCategoryId` int(6) ,
 `productSubCategory` varchar(60) ,
 `productCategoryId` int(6) ,
 `productCategory` varchar(60) 
)*/;

/*Table structure for table `product_variations_group_by_products_view` */

DROP TABLE IF EXISTS `product_variations_group_by_products_view`;

/*!50001 DROP VIEW IF EXISTS `product_variations_group_by_products_view` */;
/*!50001 DROP TABLE IF EXISTS `product_variations_group_by_products_view` */;

/*!50001 CREATE TABLE  `product_variations_group_by_products_view`(
 `productVariationId` int(6) ,
 `productId` int(6) ,
 `productStock` int(6) ,
 `productStocksReorderPoint` int(6) ,
 `productOption1` varchar(60) ,
 `productOption2` varchar(60) ,
 `productVariationIsDeleted` tinyint(1) ,
 `productPrice` float ,
 `productName` varchar(60) ,
 `productSubCategoryId` int(6) ,
 `productDetails` text ,
 `productUpdateDate` datetime ,
 `productIsDeleted` tinyint(1) ,
 `productSubCategory` varchar(60) ,
 `productCategoryId` int(6) ,
 `productCategory` varchar(60) ,
 `totalProductVariation` bigint(21) 
)*/;

/*Table structure for table `product_variations_view` */

DROP TABLE IF EXISTS `product_variations_view`;

/*!50001 DROP VIEW IF EXISTS `product_variations_view` */;
/*!50001 DROP TABLE IF EXISTS `product_variations_view` */;

/*!50001 CREATE TABLE  `product_variations_view`(
 `productVariationId` int(6) ,
 `productId` int(6) ,
 `productStock` int(6) ,
 `productStocksReorderPoint` int(6) ,
 `productOption1` varchar(60) ,
 `productOption2` varchar(60) ,
 `productVariationIsDeleted` tinyint(1) ,
 `productPrice` float ,
 `productName` varchar(60) ,
 `productSubCategoryId` int(6) ,
 `productDetails` text ,
 `productUpdateDate` datetime ,
 `productIsDeleted` tinyint(1) ,
 `productSubCategory` varchar(60) ,
 `productCategoryId` int(6) ,
 `productCategory` varchar(60) 
)*/;

/*Table structure for table `products_view` */

DROP TABLE IF EXISTS `products_view`;

/*!50001 DROP VIEW IF EXISTS `products_view` */;
/*!50001 DROP TABLE IF EXISTS `products_view` */;

/*!50001 CREATE TABLE  `products_view`(
 `productId` int(6) ,
 `productName` varchar(60) ,
 `productSubCategoryId` int(6) ,
 `productDetails` text ,
 `productUpdateDate` datetime ,
 `productIsDeleted` tinyint(1) ,
 `productSubCategory` varchar(60) ,
 `productCategoryId` int(6) ,
 `productCategory` varchar(60) 
)*/;

/*Table structure for table `users_view` */

DROP TABLE IF EXISTS `users_view`;

/*!50001 DROP VIEW IF EXISTS `users_view` */;
/*!50001 DROP TABLE IF EXISTS `users_view` */;

/*!50001 CREATE TABLE  `users_view`(
 `userId` int(6) ,
 `userEmail` varchar(60) ,
 `userPassword` varchar(60) ,
 `userFirstName` varchar(60) ,
 `userLastName` varchar(60) ,
 `userAddress` varchar(60) ,
 `userRegistrationDate` date ,
 `userPhoneNumber` varchar(60) ,
 `userType` varchar(60) ,
 `userIsBlocked` tinyint(1) 
)*/;

/*View structure for view administrators_view */

/*!50001 DROP TABLE IF EXISTS `administrators_view` */;
/*!50001 DROP VIEW IF EXISTS `administrators_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `administrators_view` AS select `administrators_table`.`administratorUserId` AS `administratorUserId`,`administrators_table`.`administratorUserName` AS `administratorUserName`,`administrators_table`.`administratorUserPassword` AS `administratorUserPassword`,`administrators_table`.`isDeleted` AS `isDeleted`,`administrators_table`.`administratorfullName` AS `administratorfullName` from `administrators_table` */;

/*View structure for view inventory_logs_view */

/*!50001 DROP TABLE IF EXISTS `inventory_logs_view` */;
/*!50001 DROP VIEW IF EXISTS `inventory_logs_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventory_logs_view` AS select `inventory_logs_table`.`inventorylogId` AS `inventorylogId`,`inventory_logs_table`.`productVariationId` AS `productVariationId`,`inventory_logs_table`.`inOrOut` AS `inOrOut`,`inventory_logs_table`.`quantity` AS `quantity`,`inventory_logs_table`.`transactionDateTime` AS `transactionDateTime`,`inventory_logs_table`.`inventoryLogRemark` AS `inventoryLogRemark`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice` from (`inventory_logs_table` join `product_variations_table` on((`inventory_logs_table`.`productVariationId` = `product_variations_table`.`productVariationId`))) */;

/*View structure for view order_details_view */

/*!50001 DROP TABLE IF EXISTS `order_details_view` */;
/*!50001 DROP VIEW IF EXISTS `order_details_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_details_view` AS select `order_details_table`.`orderDetailId` AS `orderDetailId`,`order_details_table`.`productVariationId` AS `productVariationId`,`order_details_table`.`orderId` AS `orderId`,`order_details_table`.`quantity` AS `quantity`,`order_details_table`.`price` AS `price`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory`,`orders_table`.`orderPickupDate` AS `orderPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,`orders_table`.`orderPaymentStatus` AS `orderPaymentStatus`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderIsReschedule` AS `orderIsReschedule`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`orderRemarks` AS `orderRemarks`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`userId` AS `userId`,`orders_table`.`orderDeliveryMethod` AS `orderDeliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from ((((((`order_details_table` join `product_variations_table` on((`order_details_table`.`productVariationId` = `product_variations_table`.`productVariationId`))) join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) join `orders_table` on((`order_details_table`.`orderId` = `orders_table`.`orderId`))) join `users_table` on((`orders_table`.`userId` = `users_table`.`userId`))) */;

/*View structure for view orders_view */

/*!50001 DROP TABLE IF EXISTS `orders_view` */;
/*!50001 DROP VIEW IF EXISTS `orders_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orders_view` AS select `orders_table`.`orderId` AS `orderId`,`orders_table`.`orderPickupDate` AS `orderPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`orderPaymentStatus` AS `orderPaymentStatus`,`orders_table`.`orderTotalAmount` AS `orderTotalAmount`,`orders_table`.`userId` AS `userId`,`orders_table`.`orderDeliveryMethod` AS `orderDeliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`orderRemarks` AS `orderRemarks`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`orders_table`.`orderIsReschedule` AS `orderIsReschedule`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,concat(`users_table`.`userFirstName`,' ',`users_table`.`userFirstName`) AS `administratorfullName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from (`orders_table` join `users_table` on((`orders_table`.`userId` = `users_table`.`userId`))) */;

/*View structure for view payments_view */

/*!50001 DROP TABLE IF EXISTS `payments_view` */;
/*!50001 DROP VIEW IF EXISTS `payments_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `payments_view` AS select `payments_table`.`paymentId` AS `paymentId`,`payments_table`.`paymentAmount` AS `paymentAmount`,`payments_table`.`orderId` AS `orderId`,`payments_table`.`paymentRecieptImage` AS `paymentRecieptImage`,`payments_table`.`paymentStatus` AS `paymentStatus`,`payments_table`.`nameOfRemmitanceCenter` AS `nameOfRemmitanceCenter`,`payments_table`.`controlNumber` AS `controlNumber`,`payments_table`.`paymentTransactionDate` AS `paymentTransactionDate`,`orders_table`.`orderPickupDate` AS `orderPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`orderPaymentStatus` AS `orderPaymentStatus`,`orders_table`.`orderTotalAmount` AS `orderTotalAmount`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`userId` AS `userId`,`orders_table`.`orderDeliveryMethod` AS `orderDeliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`orders_table`.`orderRemarks` AS `orderRemarks` from (`payments_table` join `orders_table` on((`payments_table`.`orderId` = `orders_table`.`orderId`))) */;

/*View structure for view product_categories_view */

/*!50001 DROP TABLE IF EXISTS `product_categories_view` */;
/*!50001 DROP VIEW IF EXISTS `product_categories_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_categories_view` AS select `product_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from `product_categories_table` */;

/*View structure for view product_images_view */

/*!50001 DROP TABLE IF EXISTS `product_images_view` */;
/*!50001 DROP VIEW IF EXISTS `product_images_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_images_view` AS select `product_images_table`.`productImageId` AS `productImageId`,`product_images_table`.`productImageLocation` AS `productImageLocation`,`product_images_table`.`isThumbnail` AS `isThumbnail`,`product_images_table`.`productId` AS `productId`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from (((`product_images_table` join `products_table` on((`product_images_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) */;

/*View structure for view product_reviews_view */

/*!50001 DROP TABLE IF EXISTS `product_reviews_view` */;
/*!50001 DROP VIEW IF EXISTS `product_reviews_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_reviews_view` AS select `product_reviews_table`.`productReviewId` AS `productReviewId`,`product_reviews_table`.`productVariationId` AS `productVariationId`,`product_reviews_table`.`productReview` AS `productReview`,`product_reviews_table`.`productReviewDate` AS `productReviewDate`,`product_reviews_table`.`userId` AS `userId`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_categories_table`.`productCategory` AS `productCategory`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from (((((`product_reviews_table` join `product_variations_table` on((`product_reviews_table`.`productVariationId` = `product_variations_table`.`productVariationId`))) join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) join `users_table` on((`product_reviews_table`.`userId` = `users_table`.`userId`))) where (`users_table`.`userIsBlocked` = 0) */;

/*View structure for view product_sub_categories_view */

/*!50001 DROP TABLE IF EXISTS `product_sub_categories_view` */;
/*!50001 DROP VIEW IF EXISTS `product_sub_categories_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_sub_categories_view` AS select `product_sub_categories_table`.`productSubCategoryId` AS `productSubCategoryId`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from (`product_sub_categories_table` join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) */;

/*View structure for view product_variations_group_by_products_view */

/*!50001 DROP TABLE IF EXISTS `product_variations_group_by_products_view` */;
/*!50001 DROP VIEW IF EXISTS `product_variations_group_by_products_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_variations_group_by_products_view` AS select `product_variations_table`.`productVariationId` AS `productVariationId`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory`,count(0) AS `totalProductVariation` from (((`product_variations_table` join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) where ((`product_variations_table`.`productVariationIsDeleted` = 0) and (`products_table`.`productIsDeleted` = 0)) group by `product_variations_table`.`productId` */;

/*View structure for view product_variations_view */

/*!50001 DROP TABLE IF EXISTS `product_variations_view` */;
/*!50001 DROP VIEW IF EXISTS `product_variations_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_variations_view` AS select `product_variations_table`.`productVariationId` AS `productVariationId`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from (((`product_variations_table` join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) where ((`product_variations_table`.`productVariationIsDeleted` = 0) and (`products_table`.`productIsDeleted` = 0)) */;

/*View structure for view products_view */

/*!50001 DROP TABLE IF EXISTS `products_view` */;
/*!50001 DROP VIEW IF EXISTS `products_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_view` AS select `products_table`.`productId` AS `productId`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from ((`products_table` join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) where (`products_table`.`productIsDeleted` = 0) */;

/*View structure for view users_view */

/*!50001 DROP TABLE IF EXISTS `users_view` */;
/*!50001 DROP VIEW IF EXISTS `users_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_view` AS select `users_table`.`userId` AS `userId`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from `users_table` where (`users_table`.`userIsBlocked` = 0) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
