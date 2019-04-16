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

insert  into `administrators_table`(`administratorUserId`,`administratorUserName`,`administratorUserPassword`,`isDeleted`,`administratorfullName`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',0,'Admin Name1'),(2,'user1','24c9e15e52afc47c225b757e7bee1f9d',1,'user1'),(3,'user2','7e58d63b60197ceb55a1c487989a3720',1,'user2'),(4,'user3','92877af70a45fd6a2ed7fe81e1236b78',1,'user3'),(5,'1','c4ca4238a0b923820dcc509a6f75849b',0,'1');

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
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

/*Data for the table `inventory_logs_table` */

insert  into `inventory_logs_table`(`inventorylogId`,`productVariationId`,`inOrOut`,`quantity`,`transactionDateTime`,`inventoryLogRemark`) values (117,49,'In',100,'2019-04-10 22:50:45','The stocks is increased by 100.'),(118,50,'In',50,'2019-04-10 22:51:05','The stocks is increased by 50.'),(119,51,'In',40,'2019-04-10 22:51:11','The stocks is increased by 40.'),(120,52,'In',50,'2019-04-10 22:57:33','The stocks is increased by 50.'),(121,53,'In',100,'2019-04-10 22:57:54','The stocks is increased by 100.'),(122,54,'In',60,'2019-04-10 22:58:12','The stocks is increased by 60.'),(123,55,'In',60,'2019-04-10 22:58:18','The stocks is increased by 60.'),(124,56,'In',100,'2019-04-10 22:58:23','The stocks is increased by 100.'),(125,49,'Out',1,'2019-04-12 04:18:07','The stocks is decreased by 1 because of Order number 48.'),(126,58,'In',20,'2019-04-12 04:32:17','The stocks is increased by 20.'),(127,57,'In',25,'2019-04-12 04:32:41','The stocks is increased by 25.'),(128,59,'In',20,'2019-04-12 04:33:15','The stocks is increased by 20.'),(129,60,'In',15,'2019-04-12 04:37:13','The stocks is increased by 15.'),(130,61,'In',10,'2019-04-12 04:37:32','The stocks is increased by 10.'),(131,62,'In',10,'2019-04-12 04:39:39','The stocks is increased by 10.'),(132,49,'Out',2,'2019-04-12 04:39:59','The stocks is decreased by 2 because of Order number 49.'),(133,63,'In',15,'2019-04-12 04:41:31','The stocks is increased by 15.'),(134,64,'In',30,'2019-04-12 04:46:30','The stocks is increased by 30.'),(135,65,'In',20,'2019-04-12 04:59:54','The stocks is increased by 20.'),(136,66,'In',25,'2019-04-12 05:00:21','The stocks is increased by 25.'),(137,67,'In',10,'2019-04-12 05:00:39','The stocks is increased by 10.'),(138,68,'In',30,'2019-04-12 05:01:10','The stocks is increased by 30.'),(139,69,'In',10,'2019-04-12 05:01:42','The stocks is increased by 10.'),(140,70,'In',35,'2019-04-12 05:02:04','The stocks is increased by 35.'),(141,71,'In',7,'2019-04-12 05:02:37','The stocks is increased by 7.'),(142,72,'In',20,'2019-04-12 05:02:56','The stocks is increased by 20.'),(143,60,'Out',1,'2019-04-12 12:23:12','The stocks is decreased by 1 because of Order number 50.'),(144,60,'In',1,'2019-04-12 12:24:22','The stocks is increased by 1 because the order number 50 is cancelled.'),(145,73,'In',20,'2019-04-12 18:05:11','The stocks is increased by 20.'),(146,73,'Out',20,'2019-04-12 18:11:40','The stocks is decreased by 20 because of Order number 51.'),(147,57,'Out',4,'2019-04-12 18:14:08','The stocks is decreased by 4 because of Order number 52.'),(148,49,'Out',1,'2019-04-15 10:11:46','The stocks is decreased by 1 because of Order number 54.'),(149,49,'Out',7,'2019-04-15 15:26:34','The stocks is decreased by 7 because of Order number 53.');

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
  CONSTRAINT `FK_notifications_table1` FOREIGN KEY (`orderId`) REFERENCES `orders_table` (`orderId`),
  CONSTRAINT `FK_notifications_table123123` FOREIGN KEY (`administratorUserId`) REFERENCES `administrators_table` (`administratorUserId`),
  CONSTRAINT `FK_notifications_table2` FOREIGN KEY (`userId`) REFERENCES `users_table` (`userId`),
  CONSTRAINT `FK_notifications_table3` FOREIGN KEY (`productVariationId`) REFERENCES `product_variations_table` (`productVariationId`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

/*Data for the table `notifications_table` */

insert  into `notifications_table`(`notificationId`,`userId`,`administratorUserId`,`notificationMessage`,`notificationDateTime`,`notificationIsRead`,`orderId`,`productVariationId`) values (66,NULL,1,'Order number 48 was Finished.','2019-04-12 04:18:07',1,48,NULL),(67,NULL,5,'Order number 48 was Finished.','2019-04-12 04:18:07',0,48,NULL),(68,NULL,1,'Order number 48 payment was recieved.','2019-04-12 04:18:07',1,48,NULL),(69,NULL,5,'Order number 48 payment was recieved.','2019-04-12 04:18:07',0,48,NULL),(70,NULL,1,'Order number 49 was placed.','2019-04-12 04:39:59',1,49,NULL),(71,NULL,5,'Order number 49 was placed.','2019-04-12 04:39:59',0,49,NULL),(72,14,NULL,'Order number 49 payment was recieved.','2019-04-12 04:45:38',1,49,NULL),(73,14,NULL,'Order number 49 was confirmed.','2019-04-12 04:45:42',1,49,NULL),(74,NULL,1,'Order number 50 was placed.','2019-04-12 12:23:12',1,50,NULL),(75,NULL,5,'Order number 50 was placed.','2019-04-12 12:23:12',0,50,NULL),(76,NULL,1,'Order number 50 was cancelled by the customer.','2019-04-12 12:24:22',1,50,NULL),(77,NULL,5,'Order number 50 was cancelled by the customer.','2019-04-12 12:24:22',0,50,NULL),(78,NULL,1,'Order number 51 was placed.','2019-04-12 18:11:40',1,51,NULL),(79,NULL,5,'Order number 51 was placed.','2019-04-12 18:11:40',0,51,NULL),(80,NULL,1,'Order number 52 was placed.','2019-04-12 18:14:08',1,52,NULL),(81,NULL,5,'Order number 52 was placed.','2019-04-12 18:14:08',0,52,NULL),(82,6,NULL,'Order number 51 payment was recieved.','2019-04-12 18:14:19',1,51,NULL),(83,6,NULL,'Order number 51 was confirmed.','2019-04-12 18:14:56',1,51,NULL),(84,6,NULL,'Order number 51 pick up date was confirmed.','2019-04-12 18:15:31',1,51,NULL),(85,6,NULL,'Order number 51 was finished.','2019-04-12 18:15:47',1,51,NULL),(86,23,NULL,'Order number 52 shipping fee was set.','2019-04-12 18:18:48',1,52,NULL),(87,NULL,1,'Order number 52 payment was sent.','2019-04-12 18:19:59',1,52,NULL),(88,NULL,5,'Order number 52 payment was sent.','2019-04-12 18:19:59',0,52,NULL),(89,23,NULL,'Order number 52 payment was recieved.','2019-04-12 18:21:12',0,52,NULL),(90,23,NULL,'Order number 52 was confirmed.','2019-04-12 18:28:16',0,52,NULL),(91,23,NULL,'Order number 52 was finished.','2019-04-12 18:28:26',0,52,NULL),(92,NULL,1,'Order number 54 was Finished.','2019-04-15 10:11:46',1,54,NULL),(93,NULL,5,'Order number 54 was Finished.','2019-04-15 10:11:46',0,54,NULL),(94,NULL,1,'Order number 54 payment was recieved.','2019-04-15 10:11:46',1,54,NULL),(95,NULL,5,'Order number 54 payment was recieved.','2019-04-15 10:11:46',0,54,NULL),(96,NULL,1,'Order number 53 was placed.','2019-04-15 15:26:34',0,53,NULL),(97,NULL,5,'Order number 53 was placed.','2019-04-15 15:26:34',0,53,NULL),(98,6,NULL,'Order number 53 shipping fee was set.','2019-04-15 15:28:21',0,53,NULL),(99,NULL,1,'Order number 53 payment was sent.','2019-04-15 15:28:45',0,53,NULL),(100,NULL,5,'Order number 53 payment was sent.','2019-04-15 15:28:45',0,53,NULL),(101,6,NULL,'Order number 53 payment was recieved.','2019-04-15 15:29:19',0,53,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

/*Data for the table `order_details_table` */

insert  into `order_details_table`(`orderDetailId`,`productVariationId`,`orderId`,`quantity`,`price`) values (48,49,48,1,288),(49,49,49,2,288),(50,60,50,1,165),(52,73,51,20,100),(53,57,52,4,398),(54,49,53,7,288),(55,49,54,1,288);

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
  `orderShippingFee` float DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

/*Data for the table `orders_table` */

insert  into `orders_table`(`orderId`,`orderPickupDate`,`orderPlacedDate`,`orderShippingAddress`,`orderType`,`orderShipFirstName`,`orderShipLastName`,`orderShipEmail`,`orderShipPhoneNumber`,`orderStatus`,`orderTotalAmount`,`orderShippingFee`,`userId`,`orderDeliveryMethod`,`billingAddress`,`billingFirstName`,`billingLastName`,`billingEmail`,`billingPhoneNumber`,`orderModeOfPayment`,`orderRemarks`,`orderPaymentStatus`,`orderIsReschedule`) values (48,'2019-04-12','2019-04-12 04:18:07',NULL,'Online',NULL,NULL,NULL,NULL,'Finished',288,0,13,'Pick Up','tacurong city','Staff','staff','123456@gmail.com','0913456789','Walk In',NULL,'Paid',0),(49,'2019-04-13','2019-04-12 04:39:59',NULL,'Online',NULL,NULL,NULL,NULL,'Confirmed',576,0,14,'Pick Up','midtapok','datualjaj','alolo','datu@gmail.com','0997272319','Walk In',NULL,'Paid',0),(50,'2019-04-12','2019-04-12 12:23:12',NULL,'Online',NULL,NULL,NULL,NULL,'Cancelled',165,0,15,'Pick Up','6969 Purok,Malipayon Tacurong City Sultan Kudarat','Kevin','Palma Gil','zxckev@gmail.com','aweqweqwe','Walk In',NULL,'Unpaid',0),(51,'2019-04-12','2019-04-12 18:11:40',NULL,'Online',NULL,NULL,NULL,NULL,'Finished',2000,0,6,'Pick Up','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Remittance',NULL,'Paid',1),(52,NULL,'2019-04-12 18:14:08','Isulan, Sultan Kudarat','Online','Jufren','Cervantes','jufrenskix@gmail.com','09273737377373','Finished',1592,1000,23,'Shipping','Isulan, Sultan Kudarat','Jufren','Cervantes','jufrenskix@gmail.com','09273737377373','Remittance',NULL,'Paid',0),(53,NULL,'2019-04-15 15:26:34','72, mabini street, tacurong city, sutltan kudarat','Online','Cesar','Santiago','customer@gmail.com','09367489655','Pending Approval',2016,200,6,'Shipping','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Remittance',NULL,'Paid',0),(54,'2019-04-15','2019-04-15 10:11:46',NULL,'Online',NULL,NULL,NULL,NULL,'Finished',288,0,10,'Pick Up','Tacurong City','John','Matina','','','Walk In',NULL,'Paid',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

/*Data for the table `payments_table` */

insert  into `payments_table`(`paymentId`,`paymentAmount`,`orderId`,`paymentRecieptImage`,`paymentStatus`,`nameOfRemmitanceCenter`,`controlNumber`,`paymentTransactionDate`) values (76,'288',48,'','Recieved','','','2019-04-12 04:18:07'),(77,'576',49,NULL,'Recieved',NULL,NULL,'2019-04-12 04:45:38'),(78,'2000',51,NULL,'Recieved',NULL,NULL,'2019-04-12 18:14:19'),(79,'1592',52,'35fda6959e92d747b274fdf240bfa293images (2).png','Recieved','lbc','12345','2019-04-12 18:19:59'),(80,'288',54,'','Recieved','','','2019-04-15 10:11:46'),(81,'2016',53,'2b2f59b7db576155de9e3ae48c42b7321.jpg','Recieved','palawan','12534612','2019-04-15 15:28:45');

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
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=latin1;

/*Data for the table `product_images_table` */

insert  into `product_images_table`(`productImageId`,`productImageLocation`,`isThumbnail`,`productId`) values (61,'88d9d5bbb3d8a02c794278b97aef431f1.jpg',1,41),(62,'default-image.jpg',0,41),(63,'default-image.jpg',0,41),(64,'0e8123716a107d4c07d8de1aed3c03f81.jpg',1,42),(65,'422166dbad80b646f91c9d3585cd48302.jpg',0,42),(66,'017821189e3650c650bc96da7ab2353b3.jpg',0,42),(67,'737d5de144ff841d421bec273f411c391Ca.jpg',1,43),(68,'default-image.jpg',0,43),(69,'default-image.jpg',0,43),(70,'5cc091ceb816fc34d0b93e93eb773c311cs.jpg',1,44),(71,'default-image.jpg',0,44),(72,'default-image.jpg',0,44),(73,'afd8a4908d83b355c78df88c7facfe5a2cs.jpg',1,45),(74,'default-image.jpg',0,45),(75,'default-image.jpg',0,45),(76,'cef91a4d659ff99233f8299e4c654c4a1Cp.jpg',1,46),(77,'default-image.jpg',0,46),(78,'default-image.jpg',0,46),(79,'defa61b07d2cf481661cb01d83e7796a2Cp.jpg',1,47),(80,'default-image.jpg',0,47),(81,'default-image.jpg',0,47),(82,'b80187714c45eb3072e0f0d1844662501Cb.jpg',1,48),(83,'default-image.jpg',0,48),(84,'default-image.jpg',0,48),(85,'1d7896cf079317452c5f90842a3259a22Cb.jpg',1,49),(86,'default-image.jpg',0,49),(87,'default-image.jpg',0,49),(88,'c928a1cc6bc101bd0efe96b0348a80a21Wd.jpg',1,50),(89,'default-image.jpg',0,50),(90,'default-image.jpg',0,50),(91,'b8e5cd50323fc025ad45e0d3b44283632Wd.jpg',1,51),(92,'default-image.jpg',0,51),(93,'default-image.jpg',0,51),(94,'f137e38cd2bcdc475bfd5b237fc79a181Wl.jpg',1,52),(95,'default-image.jpg',0,52),(96,'default-image.jpg',0,52),(97,'3bbe3e5989b4d7a1315955c7bfa2b73a1Wb.jpg',1,53),(98,'default-image.jpg',0,53),(99,'default-image.jpg',0,53),(100,'a8328128e2eb9779a6966275c096b36f1Wm.jpg',1,54),(101,'default-image.jpg',0,54),(102,'default-image.jpg',0,54),(103,'61a8641e3d01806faa49c1f26f470b0c1Hb.jpg',1,55),(104,'default-image.jpg',0,55),(105,'default-image.jpg',0,55),(106,'8a70e56d34bd85825f96210d4dedcdbd1Hh.jpg',1,56),(107,'default-image.jpg',0,56),(108,'default-image.jpg',0,56),(109,'c5323b6a1dd5a16c1610ae08049a0bf01Em.jpg',1,57),(110,'default-image.jpg',0,57),(111,'default-image.jpg',0,57),(112,'46b6130995dd235218f86a722865d7451El.jpg',1,58),(113,'default-image.jpg',0,58),(114,'default-image.jpg',0,58),(115,'f4439ba5a30e11e9419b379fa2fc15923-queen-size-bed-room.jpg',1,59),(116,'3b079d87791fb455bd1a58a0489a047ejseerj.png',0,59),(117,'b8239b1fd37772ea810e9bbbafd03be7Dubai-Underwater-Hotel-Rooms.jpg',0,59);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_reviews_table` */

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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

/*Data for the table `product_variations_table` */

insert  into `product_variations_table`(`productVariationId`,`productId`,`productStock`,`productStocksReorderPoint`,`productOption1`,`productOption2`,`productVariationIsDeleted`,`productPrice`) values (49,41,89,10,'Blue','Small',0,288),(50,41,50,10,'Blue','Medium',0,288),(51,41,40,10,'Blue','Large',0,288),(52,42,50,5,'White','Small',0,288),(53,42,100,5,'White','Medium',0,288),(54,42,60,5,'White','Large',0,288),(55,42,60,5,'Black','Small',0,288),(56,42,100,10,'Red','Medium',0,288),(57,43,21,0,'Yellow','Small,Medium',0,398),(58,44,20,0,'Red,Black,Yellow','Small,Medium',0,299),(59,45,20,0,'White','Small,Medium',0,99),(60,46,15,0,'Gray','Medium',0,165),(61,47,10,0,'Black','Medium',0,158),(62,48,10,0,'Black','42',0,299),(63,49,15,0,'Black','45',0,275),(64,50,30,0,'Black Floral','Medium',0,148),(65,51,20,0,'Red','Small,Medium',0,199),(66,52,25,0,'Pink','Medium',0,149),(67,53,10,0,'Mocha','Medium',0,550),(68,54,30,0,'Brown','Small',0,399),(69,55,10,0,'BLack','',0,600),(70,56,35,0,'Green','',0,250),(71,57,7,0,'Silver','',0,4495),(72,58,20,0,'Black','',0,12099),(73,59,0,0,'white','Large',0,100),(74,59,0,0,'Blue','Medium',0,250);

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

/*Data for the table `products_table` */

insert  into `products_table`(`productId`,`productName`,`productSubCategoryId`,`productDetails`,`productUpdateDate`,`productIsDeleted`) values (41,'Gilas Pilipinas t shirt Basketball Shirt ',5,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.4ac42c83RH82Bl\">Digital Print</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">100 % Preshrunk cotton</li>\r\n<li class=\"\">Shirt Brand: Gildan</li>\r\n<li class=\"\">Shirt Sizes: Kindly refer to our size chart for approximate measurement.</li>\r\n<li class=\"\">Asian sizing</li>\r\n<li class=\"\">Pilipinas shirt</li>\r\n<li class=\"\">Pilipinas tshirt</li>\r\n<li class=\"\">Male or Female fashion</li>\r\n<li class=\"\">Unisex</li>\r\n<li class=\"\">Soft premium cotton for added comfort</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Cotton t shirt</li>\r\n<li class=\"\">Men&rsquo;s shirt or women&rsquo;s shirt</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.4ac42c83RH82Bl\">AC Prints</li>\r\n</ul>','2019-04-10 22:47:10',0),(42,'AC Prints Check Logo Basketball Shirt ',5,'<ul class=\"\">\r\n<li class=\"\">Our Product:</li>\r\n<li class=\"\">Digital Print</li>\r\n<li class=\"\">Regular fit</li>\r\n<li class=\"\">Comfortable to wear</li>\r\n<li class=\"\">High Quality</li>\r\n<li class=\"\">100 % Preshrunk cotton</li>\r\n<li class=\"\">Shirt Brand: Gildan</li>\r\n<li class=\"\">Shirt Sizes: Kindly refer to our size chart for approximate measurement.</li>\r\n<li class=\"\">Asian sizing</li>\r\n<li class=\"\">Male fashion or Female fashion</li>\r\n<li class=\"\">Soft premium cotton for added comfort</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Black,Blue,White,Red</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Cotton t shirt</li>\r\n<li class=\"\">Men&rsquo;s shirt or women&rsquo;s shirt</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.768b52cdcpI465\">AC Prints</li>\r\n</ul>','2019-04-10 22:52:02',0),(43,'Kuhong New Summer Men Slim Short-sleeved Round Casual T-shir',5,'<p><br />Material: cotton<br />Type: T-Shirt<br />Quantity: 1<br />Tag Size: M, Bust: 96cm (37.8in), Length: 66cm (26in), Shoulder: 42cm (16.5in), Sleeve: 20cm (7.9in)<br />Tag Size: L, Bust: 100cm (39.4in), Length: 68cm (26.8in), Shoulder: 43cm (16.9in), Sleeve: 21cm (8.3in)<br />Tag Size: XL, Bust: 104cm (40.9in), Length: 70cm (27.6in), Shoulder: 44cm (17.3in), Sleeve: 22cm (8.7in)<br />Tag Size: 2XL, Bust: 108cm (42.5in), Length: 72cm (28.3in), Shoulder: 45cm (17.7in), Sleeve: 23cm (9.1in)</p>','2019-04-12 04:21:05',0),(44,'JSNH Knitted Longsleeve',6,'<ul class=\"\">\r\n<li class=\"\">Soft</li>\r\n<li class=\"\">Comfy</li>\r\n<li class=\"\">Stretch</li>\r\n<li class=\"\">Cotton Knit</li>\r\n<li class=\"\">Fits Medium</li>\r\n</ul>','2019-04-12 04:25:55',0),(45,'BF PLAIN LONG SLEEVE FOR MEN#Y3',6,'','2019-04-12 04:30:24',0),(46,'Moso Unisex Cotton Plain Jogger Pants With Zippered Pocket',7,'<ul class=\"\">\r\n<li class=\"\">Moso Unisex Cotton Plain Jogger Pants With Zippered Pocket</li>\r\n<li class=\"\">Material: Cotton</li>\r\n</ul>','2019-04-12 04:34:35',0),(47,'Franco Plain Tiro Korean Joggers (Comfort Fit)',7,'','2019-04-12 04:38:04',0),(48,'Safety Shoes Anti-smashing Work shoes Protect Shoes',12,'','2019-04-12 04:38:39',0),(49,'Forklift Safety Shoes High Cut Sewed And Vulcanized',12,'','2019-04-12 04:40:52',0),(50,' Etudecollection Korean Casual V Neck Floral Dress For Women',15,'','2019-04-12 04:42:46',0),(51,'Front Slit Dress',15,'','2019-04-12 04:59:33',0),(52,'Dual Lining Track Pants 7A0004',17,'','2019-04-12 04:48:35',0),(53,'Long Champ Tote Bag With Sling Bag Set 15 inch and 11 inch',23,'','2019-04-12 04:49:51',0),(54,'Maybelline Fit Me Matte + Poreless Liquid Foundation 30 mL',29,'','2019-04-12 04:51:17',0),(55,'Imarflex HD-1300 Hair Dryer (Black)',26,'','2019-04-12 04:52:50',0),(56,'Jeju Aloe Fresh Soothing Gel',32,'','2019-04-12 04:54:08',0),(57,'ORIGINAL lPHONE 5S 16GB / 32GB',35,'','2019-04-12 04:56:48',0),(58,'Lenovo Ideapad S130-11IGM Midnight Blue',41,'','2019-04-12 04:58:08',0),(59,'jansport',13,'<p>floral</p>','2019-04-12 18:01:53',0);

/*Table structure for table `user_feedbacks_table` */

DROP TABLE IF EXISTS `user_feedbacks_table`;

CREATE TABLE `user_feedbacks_table` (
  `userFeedbackId` int(6) NOT NULL AUTO_INCREMENT,
  `userId` int(6) DEFAULT NULL,
  `userFeedback` text,
  `userFeedbackDate` date DEFAULT NULL,
  PRIMARY KEY (`userFeedbackId`),
  KEY `FK_customer_feedbacks_table` (`userId`),
  CONSTRAINT `FK_user_feedbacks_table` FOREIGN KEY (`userId`) REFERENCES `users_table` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_feedbacks_table` */

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `users_table` */

insert  into `users_table`(`userId`,`userEmail`,`userPassword`,`userFirstName`,`userLastName`,`userAddress`,`userRegistrationDate`,`userPhoneNumber`,`userType`,`userIsBlocked`) values (6,'customer@gmail.com','91ec1f9324753048c0096d036a694f86','Cesar','Santiago','72, mabini street, tacurong city, sutltan kudarat','2019-03-24','09367489655','Customer',0),(7,'test@gmail.com','098f6bcd4621d373cade4e832627b4f6','Andrew','E','66 malvar street, tacurong city, sultan kudarat','2019-03-24','09754363941','Customer',0),(8,'testing@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','Jonathan','Anderson','65 National Highway, Tacurong City, Sultan Kudarat','2019-03-29','09754523655','Customer',0),(9,'alex@gmail.com','73503e6f479c632ebfebc6e58a3cd335','Cong','TV','88 kalawag II, Isulan, Sultan Kudarat','2019-04-09','09168575445','Customer',0),(10,'staff1@gmail.com','4d7d719ac0cf3d78ea8a94701913fe47','Lucio','Tan',NULL,'2019-04-09',NULL,'Staff',0),(11,'staff2@gmail.com','8bc01711b8163ec3f2aa0688d12cdf3b','Henry','Sy',NULL,'2019-04-09',NULL,'Staff',0),(12,'staff3@gmail.com','8f03660f569ce4023dddaea0bf560d74','Manny','Villar',NULL,'2019-04-09',NULL,'Staff',0),(13,'Staff11@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','Staff','Staff',NULL,'2019-04-12',NULL,'Staff',0),(14,'datu@gmail.com','18b473de493fc7124495f236d5f10150','datualjaj','alolo','midtapok','2019-04-12','0997272319','Customer',0),(15,'zxckev@gmail.com','0cf31b2c283ce3431794586df7b0996d','Kevin','Palma Gil','6969 Purok,Malipayon Tacurong City Sultan Kudarat','2019-04-12','aweqweqwe','Customer',0),(16,'errol@gmail.com','628631f07321b22d8c176c200c855e1b',NULL,NULL,NULL,'2019-04-12',NULL,'Customer',0),(17,'errol2@gmail.com','11340131feec68e7ca463f960f0f341c',NULL,NULL,NULL,'2019-04-12',NULL,'Customer',0),(18,'errrol11@gmail.com','628631f07321b22d8c176c200c855e1b',NULL,NULL,NULL,'2019-04-12',NULL,'Customer',0),(19,'Errol123@gmail.com','628631f07321b22d8c176c200c855e1b',NULL,NULL,NULL,'2019-04-12',NULL,'Customer',0),(20,'Errrol23456@yahoo.com','628631f07321b22d8c176c200c855e1b',NULL,NULL,NULL,'2019-04-12',NULL,'Customer',0),(21,'earl@gmail.com','628631f07321b22d8c176c200c855e1b',NULL,NULL,NULL,'2019-04-12',NULL,'Customer',0),(22,'john@gmail.com','73b65f2a0b6c9f399cdf393cbbbe9d5c','john','michael',NULL,'2019-04-12',NULL,'Staff',0),(23,'jufrenskix@gmail.com','429f61ffbdfc9cd4dc2547ea10de84f9','Jufren','Cervantes','Isulan, Sultan Kudarat','2019-04-12','09273737377373','Customer',0);

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

/*Table structure for table `customers_view` */

DROP TABLE IF EXISTS `customers_view`;

/*!50001 DROP VIEW IF EXISTS `customers_view` */;
/*!50001 DROP TABLE IF EXISTS `customers_view` */;

/*!50001 CREATE TABLE  `customers_view`(
 `userId` int(6) ,
 `userEmail` varchar(60) ,
 `userPassword` varchar(60) ,
 `userFirstName` varchar(60) ,
 `userLastName` varchar(60) ,
 `userFullName` varchar(121) ,
 `userAddress` varchar(60) ,
 `userRegistrationDate` date ,
 `userPhoneNumber` varchar(60) ,
 `userType` varchar(60) ,
 `userIsBlocked` tinyint(1) 
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
 `overDueDate` datetime ,
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
 `userFullName` varchar(121) ,
 `billingFullName` varchar(121) ,
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
 `orderRemarks` text ,
 `billingFullName` varchar(121) ,
 `weekCode` varchar(9) 
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
 `userEmail` varchar(60) ,
 `userPassword` varchar(60) ,
 `userFirstName` varchar(60) ,
 `userLastName` varchar(60) ,
 `userFullName` varchar(121) ,
 `userAddress` varchar(60) ,
 `userRegistrationDate` date ,
 `userPhoneNumber` varchar(60) ,
 `userType` varchar(60) ,
 `userIsBlocked` tinyint(1) ,
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

/*Table structure for table `staffs_view` */

DROP TABLE IF EXISTS `staffs_view`;

/*!50001 DROP VIEW IF EXISTS `staffs_view` */;
/*!50001 DROP TABLE IF EXISTS `staffs_view` */;

/*!50001 CREATE TABLE  `staffs_view`(
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

/*Table structure for table `user_feedbacks_view` */

DROP TABLE IF EXISTS `user_feedbacks_view`;

/*!50001 DROP VIEW IF EXISTS `user_feedbacks_view` */;
/*!50001 DROP TABLE IF EXISTS `user_feedbacks_view` */;

/*!50001 CREATE TABLE  `user_feedbacks_view`(
 `userFeedbackId` int(6) ,
 `userId` int(6) ,
 `userFeedback` text ,
 `userFeedbackDate` date ,
 `userEmail` varchar(60) ,
 `userPassword` varchar(60) ,
 `userFirstName` varchar(60) ,
 `userLastName` varchar(60) ,
 `userFullName` varchar(121) ,
 `userAddress` varchar(60) ,
 `userRegistrationDate` date ,
 `userPhoneNumber` varchar(60) ,
 `userType` varchar(60) ,
 `userIsBlocked` tinyint(1) 
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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `administrators_view` AS select `administrators_table`.`administratorUserId` AS `administratorUserId`,`administrators_table`.`administratorUserName` AS `administratorUserName`,`administrators_table`.`administratorUserPassword` AS `administratorUserPassword`,`administrators_table`.`isDeleted` AS `isDeleted`,`administrators_table`.`administratorfullName` AS `administratorfullName` from `administrators_table` where (`administrators_table`.`isDeleted` = 0) */;

/*View structure for view customers_view */

/*!50001 DROP TABLE IF EXISTS `customers_view` */;
/*!50001 DROP VIEW IF EXISTS `customers_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customers_view` AS select `users_table`.`userId` AS `userId`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,concat(`users_table`.`userFirstName`,' ',`users_table`.`userLastName`) AS `userFullName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from `users_table` where (`users_table`.`userType` = 'Customer') */;

/*View structure for view inventory_logs_view */

/*!50001 DROP TABLE IF EXISTS `inventory_logs_view` */;
/*!50001 DROP VIEW IF EXISTS `inventory_logs_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventory_logs_view` AS select `inventory_logs_table`.`inventorylogId` AS `inventorylogId`,`inventory_logs_table`.`productVariationId` AS `productVariationId`,`inventory_logs_table`.`inOrOut` AS `inOrOut`,`inventory_logs_table`.`quantity` AS `quantity`,`inventory_logs_table`.`transactionDateTime` AS `transactionDateTime`,`inventory_logs_table`.`inventoryLogRemark` AS `inventoryLogRemark`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from ((((`inventory_logs_table` join `product_variations_table` on((`inventory_logs_table`.`productVariationId` = `product_variations_table`.`productVariationId`))) join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) where (`products_table`.`productIsDeleted` = 0) */;

/*View structure for view order_details_view */

/*!50001 DROP TABLE IF EXISTS `order_details_view` */;
/*!50001 DROP VIEW IF EXISTS `order_details_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_details_view` AS select `order_details_table`.`orderDetailId` AS `orderDetailId`,`order_details_table`.`productVariationId` AS `productVariationId`,`order_details_table`.`orderId` AS `orderId`,`order_details_table`.`quantity` AS `quantity`,`order_details_table`.`price` AS `price`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory`,`orders_table`.`orderPickupDate` AS `orderPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,`orders_table`.`orderPaymentStatus` AS `orderPaymentStatus`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderIsReschedule` AS `orderIsReschedule`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`orderRemarks` AS `orderRemarks`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`userId` AS `userId`,`orders_table`.`orderDeliveryMethod` AS `orderDeliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from ((((((`order_details_table` join `product_variations_table` on((`order_details_table`.`productVariationId` = `product_variations_table`.`productVariationId`))) join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) join `orders_table` on((`order_details_table`.`orderId` = `orders_table`.`orderId`))) join `users_table` on((`orders_table`.`userId` = `users_table`.`userId`))) */;

/*View structure for view orders_view */

/*!50001 DROP TABLE IF EXISTS `orders_view` */;
/*!50001 DROP VIEW IF EXISTS `orders_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orders_view` AS select `orders_table`.`orderId` AS `orderId`,`orders_table`.`orderPickupDate` AS `orderPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,(`orders_table`.`orderPlacedDate` + interval 2 day) AS `overDueDate`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`orderPaymentStatus` AS `orderPaymentStatus`,`orders_table`.`orderTotalAmount` AS `orderTotalAmount`,`orders_table`.`userId` AS `userId`,`orders_table`.`orderDeliveryMethod` AS `orderDeliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`orderRemarks` AS `orderRemarks`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`orders_table`.`orderIsReschedule` AS `orderIsReschedule`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,concat(`users_table`.`userFirstName`,' ',`users_table`.`userLastName`) AS `userFullName`,concat(`orders_table`.`billingFirstName`,' ',`orders_table`.`billingLastName`) AS `billingFullName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from (`orders_table` join `users_table` on((`orders_table`.`userId` = `users_table`.`userId`))) */;

/*View structure for view payments_view */

/*!50001 DROP TABLE IF EXISTS `payments_view` */;
/*!50001 DROP VIEW IF EXISTS `payments_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `payments_view` AS select `payments_table`.`paymentId` AS `paymentId`,`payments_table`.`paymentAmount` AS `paymentAmount`,`payments_table`.`orderId` AS `orderId`,`payments_table`.`paymentRecieptImage` AS `paymentRecieptImage`,`payments_table`.`paymentStatus` AS `paymentStatus`,`payments_table`.`nameOfRemmitanceCenter` AS `nameOfRemmitanceCenter`,`payments_table`.`controlNumber` AS `controlNumber`,`payments_table`.`paymentTransactionDate` AS `paymentTransactionDate`,`orders_table`.`orderPickupDate` AS `orderPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`orderPaymentStatus` AS `orderPaymentStatus`,`orders_table`.`orderTotalAmount` AS `orderTotalAmount`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`userId` AS `userId`,`orders_table`.`orderDeliveryMethod` AS `orderDeliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`orders_table`.`orderRemarks` AS `orderRemarks`,concat(`orders_table`.`billingFirstName`,' ',`orders_table`.`billingLastName`) AS `billingFullName`,concat(year(`payments_table`.`paymentTransactionDate`),'-W',(week(`payments_table`.`paymentTransactionDate`,0) + 1)) AS `weekCode` from (`payments_table` join `orders_table` on((`payments_table`.`orderId` = `orders_table`.`orderId`))) */;

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_reviews_view` AS select `product_reviews_table`.`productReviewId` AS `productReviewId`,`product_reviews_table`.`productVariationId` AS `productVariationId`,`product_reviews_table`.`productReview` AS `productReview`,`product_reviews_table`.`productReviewDate` AS `productReviewDate`,`product_reviews_table`.`userId` AS `userId`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,concat(`users_table`.`userFirstName`,' ',`users_table`.`userLastName`) AS `userFullName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from (((((`product_reviews_table` join `users_table` on((`product_reviews_table`.`userId` = `users_table`.`userId`))) join `product_variations_table` on((`product_reviews_table`.`productVariationId` = `product_variations_table`.`productVariationId`))) join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) where (`users_table`.`userIsBlocked` = 0) order by `product_reviews_table`.`productReviewId` desc */;

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

/*View structure for view staffs_view */

/*!50001 DROP TABLE IF EXISTS `staffs_view` */;
/*!50001 DROP VIEW IF EXISTS `staffs_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `staffs_view` AS select `users_table`.`userId` AS `userId`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from `users_table` where (`users_table`.`userType` = 'Staff') */;

/*View structure for view user_feedbacks_view */

/*!50001 DROP TABLE IF EXISTS `user_feedbacks_view` */;
/*!50001 DROP VIEW IF EXISTS `user_feedbacks_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_feedbacks_view` AS select `user_feedbacks_table`.`userFeedbackId` AS `userFeedbackId`,`user_feedbacks_table`.`userId` AS `userId`,`user_feedbacks_table`.`userFeedback` AS `userFeedback`,`user_feedbacks_table`.`userFeedbackDate` AS `userFeedbackDate`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,concat(`users_table`.`userFirstName`,' ',`users_table`.`userLastName`) AS `userFullName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from (`user_feedbacks_table` join `users_table` on((`user_feedbacks_table`.`userId` = `users_table`.`userId`))) where (`users_table`.`userIsBlocked` = 0) order by `user_feedbacks_table`.`userFeedbackId` desc */;

/*View structure for view users_view */

/*!50001 DROP TABLE IF EXISTS `users_view` */;
/*!50001 DROP VIEW IF EXISTS `users_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_view` AS select `users_table`.`userId` AS `userId`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from `users_table` where (`users_table`.`userIsBlocked` = 0) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
