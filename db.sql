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
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;



/*Data for the table `inventory_logs_table` */



insert  into `inventory_logs_table`(`inventorylogId`,`productVariationId`,`inOrOut`,`quantity`,`transactionDateTime`,`inventoryLogRemark`) values (117,49,'In',100,'2019-04-10 22:50:45','The stocks is increased by 100.'),(118,50,'In',50,'2019-04-10 22:51:05','The stocks is increased by 50.'),(119,51,'In',40,'2019-04-10 22:51:11','The stocks is increased by 40.'),(120,52,'In',50,'2019-04-10 22:57:33','The stocks is increased by 50.'),(121,53,'In',100,'2019-04-10 22:57:54','The stocks is increased by 100.'),(122,54,'In',60,'2019-04-10 22:58:12','The stocks is increased by 60.'),(123,55,'In',60,'2019-04-10 22:58:18','The stocks is increased by 60.'),(124,56,'In',100,'2019-04-10 22:58:23','The stocks is increased by 100.');



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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;



/*Data for the table `notifications_table` */



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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;



/*Data for the table `order_details_table` */



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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;



/*Data for the table `orders_table` */



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
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;



/*Data for the table `payments_table` */



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
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;



/*Data for the table `product_images_table` */



insert  into `product_images_table`(`productImageId`,`productImageLocation`,`isThumbnail`,`productId`) values (61,'88d9d5bbb3d8a02c794278b97aef431f1.jpg',1,41),(62,'default-image.jpg',0,41),(63,'default-image.jpg',0,41),(64,'0e8123716a107d4c07d8de1aed3c03f81.jpg',1,42),(65,'422166dbad80b646f91c9d3585cd48302.jpg',0,42),(66,'017821189e3650c650bc96da7ab2353b3.jpg',0,42);



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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;



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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;



/*Data for the table `product_variations_table` */



insert  into `product_variations_table`(`productVariationId`,`productId`,`productStock`,`productStocksReorderPoint`,`productOption1`,`productOption2`,`productVariationIsDeleted`,`productPrice`) values (49,41,100,10,'Blue','Small',0,288),(50,41,50,10,'Blue','Medium',0,288),(51,41,40,10,'Blue','Large',0,288),(52,42,50,5,'White','Small',0,288),(53,42,100,5,'White','Medium',0,288),(54,42,60,5,'White','Large',0,288),(55,42,60,5,'Black','Small',0,288),(56,42,100,10,'Red','Medium',0,288);



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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;



/*Data for the table `products_table` */



insert  into `products_table`(`productId`,`productName`,`productSubCategoryId`,`productDetails`,`productUpdateDate`,`productIsDeleted`) values (41,'Gilas Pilipinas t shirt Basketball Shirt ',5,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.4ac42c83RH82Bl\">Digital Print</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">100 % Preshrunk cotton</li>\r\n<li class=\"\">Shirt Brand: Gildan</li>\r\n<li class=\"\">Shirt Sizes: Kindly refer to our size chart for approximate measurement.</li>\r\n<li class=\"\">Asian sizing</li>\r\n<li class=\"\">Pilipinas shirt</li>\r\n<li class=\"\">Pilipinas tshirt</li>\r\n<li class=\"\">Male or Female fashion</li>\r\n<li class=\"\">Unisex</li>\r\n<li class=\"\">Soft premium cotton for added comfort</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Cotton t shirt</li>\r\n<li class=\"\">Men&rsquo;s shirt or women&rsquo;s shirt</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.4ac42c83RH82Bl\">AC Prints</li>\r\n</ul>','2019-04-10 22:47:10',0),(42,'AC Prints Check Logo Basketball Shirt ',5,'<ul class=\"\">\r\n<li class=\"\">Our Product:</li>\r\n<li class=\"\">Digital Print</li>\r\n<li class=\"\">Regular fit</li>\r\n<li class=\"\">Comfortable to wear</li>\r\n<li class=\"\">High Quality</li>\r\n<li class=\"\">100 % Preshrunk cotton</li>\r\n<li class=\"\">Shirt Brand: Gildan</li>\r\n<li class=\"\">Shirt Sizes: Kindly refer to our size chart for approximate measurement.</li>\r\n<li class=\"\">Asian sizing</li>\r\n<li class=\"\">Male fashion or Female fashion</li>\r\n<li class=\"\">Soft premium cotton for added comfort</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Black,Blue,White,Red</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Cotton t shirt</li>\r\n<li class=\"\">Men&rsquo;s shirt or women&rsquo;s shirt</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.768b52cdcpI465\">AC Prints</li>\r\n</ul>','2019-04-10 22:52:02',0);



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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;



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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;



/*Data for the table `users_table` */



insert  into `users_table`(`userId`,`userEmail`,`userPassword`,`userFirstName`,`userLastName`,`userAddress`,`userRegistrationDate`,`userPhoneNumber`,`userType`,`userIsBlocked`) values (6,'customer@gmail.com','91ec1f9324753048c0096d036a694f86','Cesar','Santiago','72, mabini street, tacurong city, sutltan kudarat','2019-03-24','09367489655','Customer',0),(7,'test@gmail.com','098f6bcd4621d373cade4e832627b4f6','Andrew','E','66 malvar street, tacurong city, sultan kudarat','2019-03-24','09754363941','Customer',0),(8,'testing@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','Jonathan','Anderson','65 National Highway, Tacurong City, Sultan Kudarat','2019-03-29','09754523655','Customer',0),(9,'alex@gmail.com','73503e6f479c632ebfebc6e58a3cd335','Cong','TV','88 kalawag II, Isulan, Sultan Kudarat','2019-04-09','09168575445','Customer',0),(10,'staff1@gmail.com','4d7d719ac0cf3d78ea8a94701913fe47','Lucio','Tan',NULL,'2019-04-09',NULL,'Staff',0),(11,'staff2@gmail.com','8bc01711b8163ec3f2aa0688d12cdf3b','Henry','Sy',NULL,'2019-04-09',NULL,'Staff',0),(12,'staff3@gmail.com','8f03660f569ce4023dddaea0bf560d74','Manny','Villar',NULL,'2019-04-09',NULL,'Staff',0);



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



/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orders_view` AS select `orders_table`.`orderId` AS `orderId`,`orders_table`.`orderPickupDate` AS `orderPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,(`orders_table`.`orderPlacedDate` + interval 2 day) AS `overDueDate`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`orderPaymentStatus` AS `orderPaymentStatus`,`orders_table`.`orderTotalAmount` AS `orderTotalAmount`,`orders_table`.`userId` AS `userId`,`orders_table`.`orderDeliveryMethod` AS `orderDeliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`orderRemarks` AS `orderRemarks`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`orders_table`.`orderIsReschedule` AS `orderIsReschedule`,`users_table`.`userEmail` AS `userEmail`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userFirstName` AS `userFirstName`,`users_table`.`userLastName` AS `userLastName`,concat(`users_table`.`userFirstName`,' ',`users_table`.`userLastName`) AS `userFullName`,`users_table`.`userAddress` AS `userAddress`,`users_table`.`userRegistrationDate` AS `userRegistrationDate`,`users_table`.`userPhoneNumber` AS `userPhoneNumber`,`users_table`.`userType` AS `userType`,`users_table`.`userIsBlocked` AS `userIsBlocked` from (`orders_table` join `users_table` on((`orders_table`.`userId` = `users_table`.`userId`))) */;



/*View structure for view payments_view */



/*!50001 DROP TABLE IF EXISTS `payments_view` */;

/*!50001 DROP VIEW IF EXISTS `payments_view` */;



/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `payments_view` AS select `payments_table`.`paymentId` AS `paymentId`,`payments_table`.`paymentAmount` AS `paymentAmount`,`payments_table`.`orderId` AS `orderId`,`payments_table`.`paymentRecieptImage` AS `paymentRecieptImage`,`payments_table`.`paymentStatus` AS `paymentStatus`,`payments_table`.`nameOfRemmitanceCenter` AS `nameOfRemmitanceCenter`,`payments_table`.`controlNumber` AS `controlNumber`,`payments_table`.`paymentTransactionDate` AS `paymentTransactionDate`,`orders_table`.`orderPickupDate` AS `orderPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`orderPaymentStatus` AS `orderPaymentStatus`,`orders_table`.`orderTotalAmount` AS `orderTotalAmount`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`userId` AS `userId`,`orders_table`.`orderDeliveryMethod` AS `orderDeliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`orders_table`.`orderRemarks` AS `orderRemarks`,concat(year(`payments_table`.`paymentTransactionDate`),'-W',(week(`payments_table`.`paymentTransactionDate`,) + 1)) AS `weekCode` from (`payments_table` join `orders_table` on((`payments_table`.`orderId` = `orders_table`.`orderId`))) */;



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


CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW payments_view AS 
SELECT
  payments_table.`paymentId`              AS paymentId,
  payments_table.`paymentAmount`          AS paymentAmount,
  payments_table.`orderId`                AS orderId,
  payments_table.`paymentRecieptImage`    AS paymentRecieptImage,
  payments_table.`paymentStatus`          AS paymentStatus,
  payments_table.`nameOfRemmitanceCenter` AS nameOfRemmitanceCenter,
  payments_table.`controlNumber`          AS controlNumber,
  payments_table.`paymentTransactionDate` AS paymentTransactionDate,
  orders_table.`orderPickupDate`          AS orderPickupDate,
  orders_table.`orderPlacedDate`          AS orderPlacedDate,
  orders_table.`orderShippingAddress`     AS orderShippingAddress,
  orders_table.`orderType`                AS orderType,
  orders_table.`orderShipFirstName`       AS orderShipFirstName,
  orders_table.`orderShipLastName`        AS orderShipLastName,
  orders_table.`orderShipEmail`           AS orderShipEmail,
  orders_table.`orderShipPhoneNumber`     AS orderShipPhoneNumber,
  orders_table.`orderStatus`              AS orderStatus,
  orders_table.`orderPaymentStatus`       AS orderPaymentStatus,
  orders_table.`orderTotalAmount`         AS orderTotalAmount,
  orders_table.`orderShippingFee`         AS orderShippingFee,
  orders_table.`userId`                   AS userId,
  orders_table.`orderDeliveryMethod`      AS orderDeliveryMethod,
  orders_table.`billingAddress`           AS billingAddress,
  orders_table.`billingFirstName`         AS billingFirstName,
  orders_table.`billingLastName`          AS billingLastName,
  orders_table.`billingEmail`             AS billingEmail,
  orders_table.`billingPhoneNumber`       AS billingPhoneNumber,
  orders_table.`orderModeOfPayment`       AS orderModeOfPayment,
  orders_table.`orderRemarks`             AS orderRemarks,
  CONCAT(YEAR(payments_table.`paymentTransactionDate`),'-W',(WEEK(payments_table.`paymentTransactionDate`) + 1)) AS weekCode
FROM (payments_table
   JOIN orders_table
     ON ((payments_table.`orderId` = orders_table.`orderId`)));