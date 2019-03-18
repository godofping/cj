/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.1.37-MariaDB : Database - cj_db
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `product_categories_table` */

insert  into `product_categories_table`(`productCategoryId`,`productCategory`) values (1,'Clothing'),(3,'Accessories'),(4,'Beauty Products'),(5,'Bags'),(6,'Shoes'),(7,'Gadgets');

/*Table structure for table `product_images_table` */

DROP TABLE IF EXISTS `product_images_table`;

CREATE TABLE `product_images_table` (
  `productImageId` int(6) NOT NULL AUTO_INCREMENT,
  `productImageLocation` text,
  `isThumbnail` tinyint(1) DEFAULT NULL,
  `productId` int(6) DEFAULT NULL,
  PRIMARY KEY (`productImageId`),
  KEY `FK_product_images_table` (`productId`),
  CONSTRAINT `FK_product_images_table` FOREIGN KEY (`productId`) REFERENCES `products_table` (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_images_table` */

/*Table structure for table `product_sub_categories_table` */

DROP TABLE IF EXISTS `product_sub_categories_table`;

CREATE TABLE `product_sub_categories_table` (
  `productSubCategoryId` int(6) NOT NULL AUTO_INCREMENT,
  `productSubCategory` varchar(60) DEFAULT NULL,
  `productCategoryId` int(6) DEFAULT NULL,
  PRIMARY KEY (`productSubCategoryId`),
  KEY `FK_product_sub_categories_table` (`productCategoryId`),
  CONSTRAINT `FK_product_sub_categories_table` FOREIGN KEY (`productCategoryId`) REFERENCES `product_categories_table` (`productCategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_sub_categories_table` */

/*Table structure for table `products_table` */

DROP TABLE IF EXISTS `products_table`;

CREATE TABLE `products_table` (
  `productId` int(6) NOT NULL AUTO_INCREMENT COMMENT 'product primary key ',
  `productName` varchar(60) DEFAULT NULL COMMENT 'product name',
  `productSubCategoryId` int(6) DEFAULT NULL COMMENT 'product category fk',
  `productPrice` float DEFAULT NULL COMMENT 'product price',
  `productWeight` varchar(60) DEFAULT NULL,
  `productDetails` text COMMENT 'product details',
  `productSKU` varchar(60) DEFAULT NULL COMMENT 'product code / sku',
  `productUpdateDate` varchar(60) DEFAULT NULL COMMENT 'when ging update ang product',
  `productLive` tinyint(1) DEFAULT NULL COMMENT 'if ang product is i display sa shop',
  PRIMARY KEY (`productId`),
  KEY `FK_products_table123` (`productSubCategoryId`),
  CONSTRAINT `FK_products_table123` FOREIGN KEY (`productSubCategoryId`) REFERENCES `product_sub_categories_table` (`productSubCategoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `products_table` */

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
