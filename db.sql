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

/*Table structure for table `customer_feedbacks_table` */

DROP TABLE IF EXISTS `customer_feedbacks_table`;

CREATE TABLE `customer_feedbacks_table` (
  `customerFeedbackId` int(6) NOT NULL AUTO_INCREMENT,
  `customerId` int(6) DEFAULT NULL,
  `customerFeedback` text,
  `customerFeedbackDate` date DEFAULT NULL,
  PRIMARY KEY (`customerFeedbackId`),
  KEY `FK_customer_feedbacks_table` (`customerId`),
  CONSTRAINT `FK_customer_feedbacks_table` FOREIGN KEY (`customerId`) REFERENCES `customers_table` (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customer_feedbacks_table` */

/*Table structure for table `customers_table` */

DROP TABLE IF EXISTS `customers_table`;

CREATE TABLE `customers_table` (
  `customerId` int(6) NOT NULL AUTO_INCREMENT,
  `customerEmail` varchar(60) DEFAULT NULL,
  `customerPassword` varchar(60) DEFAULT NULL,
  `customerFirstName` varchar(60) DEFAULT NULL,
  `customerLastName` varchar(60) DEFAULT NULL,
  `customerAddress` varchar(60) DEFAULT NULL,
  `customerRegistrationDate` date DEFAULT NULL,
  `customerPhoneNumber` varchar(60) DEFAULT NULL,
  `customerType` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `customers_table` */

insert  into `customers_table`(`customerId`,`customerEmail`,`customerPassword`,`customerFirstName`,`customerLastName`,`customerAddress`,`customerRegistrationDate`,`customerPhoneNumber`,`customerType`) values (1,'cjashleywalkincustomer@gmail.com','7ede9788c3c58bf9cb78147c155f0eff','Walkin','Walkin','none','2019-03-24','none','walkin');

/*Table structure for table `inventory_logs_table` */

DROP TABLE IF EXISTS `inventory_logs_table`;

CREATE TABLE `inventory_logs_table` (
  `inventorylogId` int(6) NOT NULL AUTO_INCREMENT,
  `productId` int(6) DEFAULT NULL,
  `inOrOut` varchar(60) DEFAULT NULL,
  `quantity` int(6) DEFAULT NULL,
  PRIMARY KEY (`inventorylogId`),
  KEY `FK_inventory_logs_table` (`productId`),
  CONSTRAINT `FK_inventory_logs_table` FOREIGN KEY (`productId`) REFERENCES `products_table` (`productId`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inventory_logs_table` */

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
  CONSTRAINT `FK_order_details_table1` FOREIGN KEY (`productVariationId`) REFERENCES `product_variations_table` (`productVariationId`),
  CONSTRAINT `FK_order_details_table2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `order_details_table` */

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `orderId` int(6) NOT NULL AUTO_INCREMENT,
  `orderDate` date DEFAULT NULL,
  `shippingAddress` text,
  `orderType` varchar(60) DEFAULT NULL,
  `orderShipFirstName` varchar(60) DEFAULT NULL,
  `orderShipLastName` varchar(60) DEFAULT NULL,
  `orderShipEmail` varchar(60) DEFAULT NULL,
  `orderShipPhoneNumber` varchar(60) DEFAULT NULL,
  `orderTrackingNumber` varchar(60) DEFAULT NULL,
  `orderStatus` varchar(60) DEFAULT NULL,
  `orderTotalAmount` float DEFAULT NULL,
  `customerId` int(6) DEFAULT NULL,
  `request` text,
  PRIMARY KEY (`orderId`),
  KEY `FK_order_details_table` (`customerId`),
  CONSTRAINT `FK_order_details_table` FOREIGN KEY (`customerId`) REFERENCES `customers_table` (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `orders` */

/*Table structure for table `payment_table` */

DROP TABLE IF EXISTS `payment_table`;

CREATE TABLE `payment_table` (
  `paymentId` int(6) NOT NULL AUTO_INCREMENT,
  `amount` varchar(60) DEFAULT NULL,
  `paymentType` varchar(60) DEFAULT NULL,
  `orderId` int(6) DEFAULT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `FK_payment_table` (`orderId`),
  CONSTRAINT `FK_payment_table` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payment_table` */

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `product_images_table` */

insert  into `product_images_table`(`productImageId`,`productImageLocation`,`isThumbnail`,`productId`) values (1,'88215a14f2ff04ac6acd5398fe349304test.jpg',1,21),(2,'3ea8c26260a522e6e5a689afc28178a7test.jpg',0,21),(3,'cb580195445fda73417256b844e78853test.jpg',0,21),(4,'default-image.jpg',1,22),(5,'default-image.jpg',0,22),(6,'default-image.jpg',0,22),(7,'default-image.jpg',1,23),(8,'default-image.jpg',0,23),(9,'default-image.jpg',0,23),(10,'default-image.jpg',1,24),(11,'default-image.jpg',0,24),(12,'default-image.jpg',0,24),(13,'default-image.jpg',1,25),(14,'default-image.jpg',0,25),(15,'default-image.jpg',0,25),(16,'default-image.jpg',1,26),(17,'default-image.jpg',0,26),(18,'default-image.jpg',0,26),(19,'default-image.jpg',1,27),(20,'default-image.jpg',0,27),(21,'default-image.jpg',0,27);

/*Table structure for table `product_reviews_table` */

DROP TABLE IF EXISTS `product_reviews_table`;

CREATE TABLE `product_reviews_table` (
  `productReviewId` int(6) NOT NULL AUTO_INCREMENT,
  `productVariationId` int(6) DEFAULT NULL,
  `productReview` text,
  `productReviewDate` date DEFAULT NULL,
  `customerId` int(6) DEFAULT NULL,
  PRIMARY KEY (`productReviewId`),
  KEY `FK_product_reviews_table` (`productVariationId`),
  KEY `FK_product_reviews_table1` (`customerId`),
  CONSTRAINT `FK_product_reviews_table` FOREIGN KEY (`productVariationId`) REFERENCES `product_variations_table` (`productVariationId`),
  CONSTRAINT `FK_product_reviews_table1` FOREIGN KEY (`customerId`) REFERENCES `customers_table` (`customerId`)
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

insert  into `product_sub_categories_table`(`productSubCategoryId`,`productSubCategory`,`productCategoryId`) values (3,'t',NULL),(5,'Casual Tops',8),(6,'shirts',8),(7,'Pants',8),(8,'Jeans',8),(9,'Jackets & Coats',8),(10,'Sneakers',8),(11,'Formal Shoes',8),(12,'Boots',8),(13,'Bags',8),(14,'Accessories',8),(15,'Dresses',9),(16,'Tops',9),(17,'Pants & Leggings',9),(18,'Jackets & Coats',9),(19,'Lingerie, Sleep & Lounge',9),(20,'Flat Shoes',9),(21,'Sandals',9),(22,'Sneakers',9),(23,'Bags',9),(24,'Muslim Wear',9),(25,'Bath & Body',10),(26,'Beauty Tools',10),(27,'Fragrances',10),(28,'Hair Care',10),(29,'Makeup',10),(30,'Men\'s Care',10),(31,'Personal Care',10),(32,'Skin Care',10),(33,'Food Supplements',10),(34,'Medical Supplies',10),(35,'Mobiles',11),(36,'Tablets',11),(37,'Security Cameras',11),(38,'Car Cameras',11),(39,'Action/Video Cameras',11),(40,'Digital Cameras',11),(41,'Laptops',11),(42,'Desktops',11),(43,'Gaming Consoles',11),(44,'Gadgets',11);

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
  CONSTRAINT `FK_product_variations_table1` FOREIGN KEY (`productId`) REFERENCES `products_table` (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `product_variations_table` */

insert  into `product_variations_table`(`productVariationId`,`productId`,`productStock`,`productStocksReorderPoint`,`productOption1`,`productOption2`,`productVariationIsDeleted`,`productPrice`) values (2,23,100,10,'250ml','',0,179),(3,23,0,2,'tae1','tae',1,1),(4,26,10,1,'620ml','',0,399),(5,26,123,123,'tae1','',0,123123),(6,21,5,1,'32GB ROM','3gb RAM',0,6990);

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
  CONSTRAINT `FK_products_table123` FOREIGN KEY (`productSubCategoryId`) REFERENCES `product_sub_categories_table` (`productSubCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

/*Data for the table `products_table` */

insert  into `products_table`(`productId`,`productName`,`productSubCategoryId`,`productDetails`,`productUpdateDate`,`productIsDeleted`) values (21,'Huawei Y6 Pro 2019 6.09 inches HD+ Screen Smart',35,'<ul class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.7e9f43d8rr8Wa7\">\r\n<li class=\"\">EMUI 9.0 (compatible with Android 9)</li>\r\n<li class=\"\">Screen Size: 6.09inches</li>\r\n<li class=\"\">Battery capacity: 3020mAh</li>\r\n<li class=\"\">3GB RAM + 32 GB ROM</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.7e9f43d8rr8Wa7\">Rear camera: 13MP, LED flash and f/1.8 aperture</li>\r\n<li class=\"\">Front camera: 8MP, LED flash and f/2.0 aperture</li>\r\n<li class=\"\">Network: LTE TDD / LTE FDD / WCDMA / GSM , support 2/3/4G &amp; wifi</li>\r\n<li class=\"\">Connectivity:Bluetooth 4.2 , Micro USB, Wi-Fi Direct, Wi-Fi Hot Spot</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i2.7e9f43d8rr8Wa7\">External memory support:microSD up to 512GB</li>\r\n</ul>','2019-03-24 19:53:59',0),(22,'Imarflex IHS-210C Curling iron',26,'<ul class=\"\">\r\n<li class=\"\">CURLING IRON</li>\r\n<li class=\"\">CERAMIC Coated Curling Tong&nbsp;</li>\r\n<li class=\"\">Hanging Ring Feature</li>\r\n<li class=\"\">Foldable Stand</li>\r\n<li class=\"\">Safety Heat Guard</li>\r\n<li class=\"\">Pilot Light Indicator</li>\r\n<li class=\"\">360&deg; FREE SWIVEL Power Cord &amp; Hook</li>\r\n<li class=\"\">25W heating Power</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.291c321bKtWUcT\">Advance Heating COMPONENT</li>\r\n</ul>','2019-03-22 22:10:21',0),(23,'BODY TREATS Body Oil Lavender Almond Nut',25,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.51f6b5bfx8gvD3\">Vanishing Light Oil that makes your skin moisturized soft and silky.It absorbs quickly too!Moisturizes and protects skin from the sun damage</li>\r\n</ul>','2019-03-24 19:06:38',0),(24,'ta',5,'<p>123tae</p>','2019-03-24 08:18:45',1),(25,'Huawei MediaPad T3 7',41,'<ul class=\"\">\r\n<li class=\"\">OS : Andriod N .EMUI 5.1</li>\r\n<li class=\"\">Processor :Spreadtrum SC7731G, quad-core A7, 4 x 1.3 GHz</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.30155762ZS4VEc\">Display :7 inches, 1024&times;600 IPS</li>\r\n<li class=\"\">Internal Storage : 16GB ROM</li>\r\n<li class=\"\">Memory : 2GB RAM</li>\r\n<li class=\"\">Rear camera: 2 MP and fixed focus</li>\r\n<li class=\"\">Front camera: 2 MP and fixed focus</li>\r\n<li class=\"\">Battery :4100 mAh* (typical)</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.30155762ZS4VEc\">Supports GPS, A-GPS</li>\r\n</ul>','2019-03-24 18:40:46',0),(26,'TRESEMME HAIR CONDITIONER KERATIN SMOOTH',28,'<ul class=\"\">\r\n<li class=\"\">TRESemme Keratin Smooth Hair Conditioner with Argan Oil and Keratin.</li>\r\n<li class=\"\">Micro-Conditioning Technology.</li>\r\n<li class=\"\">5 benefits in just 1 wash: anti-frizz, detangles, shines, smoothens, tames flyaways.</li>\r\n<li class=\"\">For smooth hair.</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.6f75657ahgj17z\">Suitable for colour treated hair.</li>\r\n</ul>','2019-03-24 19:33:47',0),(27,'test delete',5,'<p>tae1</p>','2019-03-24 20:27:16',1);

/*Table structure for table `users_table` */

DROP TABLE IF EXISTS `users_table`;

CREATE TABLE `users_table` (
  `userId` int(6) NOT NULL AUTO_INCREMENT,
  `userName` varchar(60) DEFAULT NULL,
  `userPassword` varchar(60) DEFAULT NULL,
  `userLevel` tinyint(1) DEFAULT NULL,
  `isDeleted` tinyint(1) DEFAULT '0',
  `fullName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `users_table` */

insert  into `users_table`(`userId`,`userName`,`userPassword`,`userLevel`,`isDeleted`,`fullName`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',1,0,'Admin Name'),(2,'user1','24c9e15e52afc47c225b757e7bee1f9d',2,0,'user1'),(3,'user2','7e58d63b60197ceb55a1c487989a3720',2,0,'user2'),(4,'user3','92877af70a45fd6a2ed7fe81e1236b78',2,0,'user3');

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

/*View structure for view product_categories_view */

/*!50001 DROP TABLE IF EXISTS `product_categories_view` */;
/*!50001 DROP VIEW IF EXISTS `product_categories_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_categories_view` AS select `product_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from `product_categories_table` */;

/*View structure for view product_images_view */

/*!50001 DROP TABLE IF EXISTS `product_images_view` */;
/*!50001 DROP VIEW IF EXISTS `product_images_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_images_view` AS select `product_images_table`.`productImageId` AS `productImageId`,`product_images_table`.`productImageLocation` AS `productImageLocation`,`product_images_table`.`isThumbnail` AS `isThumbnail`,`product_images_table`.`productId` AS `productId`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from (((`product_images_table` join `products_table` on((`product_images_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) */;

/*View structure for view product_sub_categories_view */

/*!50001 DROP TABLE IF EXISTS `product_sub_categories_view` */;
/*!50001 DROP VIEW IF EXISTS `product_sub_categories_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_sub_categories_view` AS select `product_sub_categories_table`.`productSubCategoryId` AS `productSubCategoryId`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from (`product_sub_categories_table` join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) */;

/*View structure for view product_variations_view */

/*!50001 DROP TABLE IF EXISTS `product_variations_view` */;
/*!50001 DROP VIEW IF EXISTS `product_variations_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_variations_view` AS select `product_variations_table`.`productVariationId` AS `productVariationId`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from (((`product_variations_table` join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) where ((`product_variations_table`.`productVariationIsDeleted` = 0) and (`products_table`.`productIsDeleted` = 0)) */;

/*View structure for view products_view */

/*!50001 DROP TABLE IF EXISTS `products_view` */;
/*!50001 DROP VIEW IF EXISTS `products_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_view` AS select `products_table`.`productId` AS `productId`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from ((`products_table` join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) where (`products_table`.`productIsDeleted` = 0) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
