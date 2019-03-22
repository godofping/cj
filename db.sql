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
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `customers_table` */

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
  `productId` int(6) DEFAULT NULL,
  `orderId` int(6) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`orderDetailId`),
  KEY `FK_order_details_table2` (`orderId`),
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `product_images_table` */

insert  into `product_images_table`(`productImageId`,`productImageLocation`,`isThumbnail`,`productId`) values (1,'images/default-image.jpg',1,21),(2,'images/default-image.jpg',0,21),(3,'images/default-image.jpg',0,21);

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

/*Table structure for table `products_table` */

DROP TABLE IF EXISTS `products_table`;

CREATE TABLE `products_table` (
  `productId` int(6) NOT NULL AUTO_INCREMENT COMMENT 'product primary key ',
  `productName` varchar(60) DEFAULT NULL COMMENT 'product name',
  `productSubCategoryId` int(6) DEFAULT NULL COMMENT 'product category fk',
  `productPrice` float DEFAULT NULL COMMENT 'product price',
  `productDetails` text COMMENT 'product details',
  `productSKU` varchar(60) DEFAULT NULL COMMENT 'product code / sku',
  `productUpdateDate` datetime DEFAULT NULL COMMENT 'when ging update ang product',
  `productLive` varchar(5) DEFAULT NULL COMMENT 'if ang product is i display sa shop',
  `productStock` int(6) DEFAULT NULL COMMENT 'number of stocks sang product',
  `productStocksReorderPoint` int(6) DEFAULT NULL COMMENT 'reorder point sang product',
  `productIsDeleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`productId`),
  KEY `FK_products_table123` (`productSubCategoryId`),
  CONSTRAINT `FK_products_table123` FOREIGN KEY (`productSubCategoryId`) REFERENCES `product_sub_categories_table` (`productSubCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `products_table` */

insert  into `products_table`(`productId`,`productName`,`productSubCategoryId`,`productPrice`,`productDetails`,`productSKU`,`productUpdateDate`,`productLive`,`productStock`,`productStocksReorderPoint`,`productIsDeleted`) values (21,'Huawei Y6 Pro 2019 32GB â€” 3GB 6.09 inches HD+ Screen Smart',35,6990,'<ul class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.7e9f43d8rr8Wa7\">\r\n<li class=\"\">EMUI 9.0 (compatible with Android 9)</li>\r\n<li class=\"\">Screen Size: 6.09inches</li>\r\n<li class=\"\">Battery capacity: 3020mAh</li>\r\n<li class=\"\">3GB RAM + 32 GB ROM</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.7e9f43d8rr8Wa7\">Rear camera: 13MP, LED flash and f/1.8 aperture</li>\r\n<li class=\"\">Front camera: 8MP, LED flash and f/2.0 aperture</li>\r\n<li class=\"\">Network: LTE TDD / LTE FDD / WCDMA / GSM , support 2/3/4G &amp; wifi</li>\r\n<li class=\"\">Connectivity:Bluetooth 4.2 , Micro USB, Wi-Fi Direct, Wi-Fi Hot Spot</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i2.7e9f43d8rr8Wa7\">External memory support:microSD up to 512GB</li>\r\n</ul>','HUAWEIY6PRO201932GB','2019-03-21 19:56:33','Yes',10,1,0);

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

insert  into `users_table`(`userId`,`userName`,`userPassword`,`userLevel`,`isDeleted`,`fullName`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',1,0,'test'),(2,'user1','user1',2,0,'user1'),(3,'user2','user2',2,0,'user2'),(4,'user3','user3',2,0,'user3'),(5,'asd','asd',2,1,NULL),(6,'12','22',2,1,'33');

/*Table structure for table `product_categories_view` */

DROP TABLE IF EXISTS `product_categories_view`;

/*!50001 DROP VIEW IF EXISTS `product_categories_view` */;
/*!50001 DROP TABLE IF EXISTS `product_categories_view` */;

/*!50001 CREATE TABLE  `product_categories_view`(
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

/*Table structure for table `products_view` */

DROP TABLE IF EXISTS `products_view`;

/*!50001 DROP VIEW IF EXISTS `products_view` */;
/*!50001 DROP TABLE IF EXISTS `products_view` */;

/*!50001 CREATE TABLE  `products_view`(
 `productId` int(6) ,
 `productName` varchar(60) ,
 `productSubCategoryId` int(6) ,
 `productPrice` float ,
 `productDetails` text ,
 `productSKU` varchar(60) ,
 `productUpdateDate` datetime ,
 `productLive` varchar(5) ,
 `productStock` int(6) ,
 `productStocksReorderPoint` int(6) ,
 `productSubCategory` varchar(60) ,
 `productCategoryId` int(6) ,
 `productCategory` varchar(60) ,
 `productIsDeleted` tinyint(1) 
)*/;

/*View structure for view product_categories_view */

/*!50001 DROP TABLE IF EXISTS `product_categories_view` */;
/*!50001 DROP VIEW IF EXISTS `product_categories_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_categories_view` AS select `product_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from `product_categories_table` */;

/*View structure for view product_sub_categories_view */

/*!50001 DROP TABLE IF EXISTS `product_sub_categories_view` */;
/*!50001 DROP VIEW IF EXISTS `product_sub_categories_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_sub_categories_view` AS select `product_sub_categories_table`.`productSubCategoryId` AS `productSubCategoryId`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from (`product_sub_categories_table` join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) */;

/*View structure for view products_view */

/*!50001 DROP TABLE IF EXISTS `products_view` */;
/*!50001 DROP VIEW IF EXISTS `products_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_view` AS select `products_table`.`productId` AS `productId`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productPrice` AS `productPrice`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productSKU` AS `productSKU`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productLive` AS `productLive`,`products_table`.`productStock` AS `productStock`,`products_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory`,`products_table`.`productIsDeleted` AS `productIsDeleted` from ((`products_table` join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) where (`products_table`.`productIsDeleted` = 0) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
