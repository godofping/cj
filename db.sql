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
  `customerFeedbackStatus` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`customerFeedbackId`),
  KEY `FK_customer_feedbacks_table` (`customerId`),
  CONSTRAINT `FK_customer_feedbacks_table` FOREIGN KEY (`customerId`) REFERENCES `customers_table` (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `customer_feedbacks_table` */

insert  into `customer_feedbacks_table`(`customerFeedbackId`,`customerId`,`customerFeedback`,`customerFeedbackDate`,`customerFeedbackStatus`) values (1,6,'test','2019-03-25',2),(2,6,'test','2019-03-25',2),(3,6,'tae','2019-03-25',2),(4,6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo quam ac eros suscipit, vitae rhoncus risus vestibulum. Mauris at dapibus quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut enim sodales, scelerisque libero quis, efficitur lorem. Curabitur et finibus nunc.','2019-03-25',1),(5,6,'test','2019-03-25',1),(6,6,'te','2019-03-25',0),(7,6,'tes','2019-03-25',0);

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
  `customerIsBlocked` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `customers_table` */

insert  into `customers_table`(`customerId`,`customerEmail`,`customerPassword`,`customerFirstName`,`customerLastName`,`customerAddress`,`customerRegistrationDate`,`customerPhoneNumber`,`customerType`,`customerIsBlocked`) values (1,'cjashleywalkincustomer@gmail.com','7ede9788c3c58bf9cb78147c155f0eff','Walkin','Walkin','none','2019-03-24','none','walkin',0),(6,'customer@gmail.com','91ec1f9324753048c0096d036a694f86','Cesar','Santiago','72, mabini street, tacurong city, sutltan kudarat','2019-03-24','09367489655','online',0),(7,'test@gmail.com','1aedb8d9dc4751e229a335e371db8058','albert','yale','66 malvar street, tacurong city, sultan kudarat','2019-03-24','09754363941','online',0),(8,'testing@gmail.com','ae2b1fca515949e5d54fb22b8ed95575','Jonathan','Anderson','65 National Highway, Tacurong City, Sultan Kudarat','2019-03-29','09754523655','online',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

/*Data for the table `inventory_logs_table` */

insert  into `inventory_logs_table`(`inventorylogId`,`productVariationId`,`inOrOut`,`quantity`,`transactionDateTime`,`inventoryLogRemark`) values (1,9,'In',10,'2019-03-28 09:32:21','The stocks is increased by 10.'),(2,9,'Out',1,'2019-03-28 09:32:24','The stocks is decreased by 1 manually.'),(3,9,'In',1,'2019-03-28 09:40:23','The stocks is increased by 1.'),(4,9,'In',5,'2019-03-28 09:41:53','The stocks is increased by 5.'),(5,10,'In',20,'2019-03-28 09:51:55','The stocks is increased by 20.'),(6,11,'In',11,'2019-03-28 09:52:30','The stocks is increased by 11.'),(7,12,'In',12,'2019-03-28 09:52:32','The stocks is increased by 12.'),(8,13,'In',13,'2019-03-28 09:52:35','The stocks is increased by 13.'),(9,14,'In',15,'2019-03-28 09:52:38','The stocks is increased by 15.'),(10,15,'In',9,'2019-03-28 09:52:40','The stocks is increased by 9.'),(11,16,'In',8,'2019-03-28 09:52:42','The stocks is increased by 8.'),(12,17,'In',7,'2019-03-28 09:52:44','The stocks is increased by 7.'),(13,18,'In',5,'2019-03-28 09:52:45','The stocks is increased by 5.'),(14,19,'In',10,'2019-03-28 09:53:13','The stocks is increased by 10.'),(15,20,'In',13,'2019-03-28 09:53:15','The stocks is increased by 13.'),(16,21,'In',20,'2019-03-28 09:53:17','The stocks is increased by 20.'),(17,22,'In',14,'2019-03-28 09:53:19','The stocks is increased by 14.'),(18,23,'In',15,'2019-03-28 09:53:21','The stocks is increased by 15.'),(19,24,'In',16,'2019-03-28 09:53:29','The stocks is increased by 16.'),(20,25,'In',18,'2019-03-28 09:53:31','The stocks is increased by 18.'),(21,26,'In',20,'2019-03-28 09:53:34','The stocks is increased by 20.'),(22,27,'In',25,'2019-03-28 09:53:36','The stocks is increased by 25.'),(23,28,'In',25,'2019-03-28 09:53:38','The stocks is increased by 25.'),(24,29,'In',30,'2019-03-28 09:53:40','The stocks is increased by 30.'),(25,30,'In',40,'2019-03-28 09:53:42','The stocks is increased by 40.'),(26,31,'In',41,'2019-03-28 09:53:44','The stocks is increased by 41.'),(27,32,'In',10,'2019-03-28 09:53:47','The stocks is increased by 10.'),(28,33,'In',9,'2019-03-28 09:53:50','The stocks is increased by 9.'),(29,34,'In',16,'2019-03-28 09:53:52','The stocks is increased by 16.'),(30,35,'In',15,'2019-03-28 09:53:55','The stocks is increased by 15.'),(31,36,'In',10,'2019-03-28 09:53:57','The stocks is increased by 10.'),(32,37,'In',15,'2019-03-28 09:53:59','The stocks is increased by 15.'),(33,38,'In',20,'2019-03-28 09:54:01','The stocks is increased by 20.'),(34,11,'In',10,'2019-03-28 09:54:15','The stocks is increased by 10.'),(35,12,'In',10,'2019-03-28 09:54:18','The stocks is increased by 10.'),(36,13,'In',10,'2019-03-28 09:54:20','The stocks is increased by 10.'),(37,14,'In',10,'2019-03-28 09:54:22','The stocks is increased by 10.'),(38,15,'In',10,'2019-03-28 09:54:24','The stocks is increased by 10.'),(39,16,'In',10,'2019-03-28 09:54:27','The stocks is increased by 10.'),(40,17,'In',10,'2019-03-28 09:54:29','The stocks is increased by 10.'),(41,18,'In',15,'2019-03-28 09:54:32','The stocks is increased by 15.'),(42,19,'In',16,'2019-03-28 09:54:35','The stocks is increased by 16.'),(43,20,'In',5,'2019-03-28 09:54:37','The stocks is increased by 5.'),(44,39,'In',10,'2019-03-28 09:55:15','The stocks is increased by 10.'),(45,40,'In',15,'2019-03-28 09:55:17','The stocks is increased by 15.'),(46,41,'In',11,'2019-03-28 09:55:19','The stocks is increased by 11.'),(47,42,'In',12,'2019-03-28 09:55:21','The stocks is increased by 12.'),(48,43,'In',13,'2019-03-28 09:55:23','The stocks is increased by 13.'),(49,44,'In',14,'2019-03-28 09:55:24','The stocks is increased by 14.'),(50,45,'In',15,'2019-03-28 09:55:26','The stocks is increased by 15.'),(51,46,'In',15,'2019-03-28 09:55:28','The stocks is increased by 15.'),(52,2,'In',20,'2019-03-28 09:55:30','The stocks is increased by 20.'),(53,4,'In',21,'2019-03-28 09:55:32','The stocks is increased by 21.'),(54,5,'In',10,'2019-03-28 09:55:48','The stocks is increased by 10.'),(55,6,'In',11,'2019-03-28 09:55:49','The stocks is increased by 11.'),(56,8,'In',12,'2019-03-28 09:55:51','The stocks is increased by 12.'),(57,33,'In',12,'2019-03-28 09:55:53','The stocks is increased by 12.'),(58,32,'In',14,'2019-03-28 09:55:55','The stocks is increased by 14.'),(59,36,'In',123,'2019-03-28 09:56:02','The stocks is increased by 123.'),(60,9,'Out',15,'2019-03-29 01:09:37','The stocks is decreased by 15 manually.'),(61,9,'In',10,'2019-03-29 01:09:56','The stocks is increased by 10.'),(62,14,'Out',7,'2019-04-02 14:07:18','The stocks is decreased by 7 because of Order ID 9');

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
  CONSTRAINT `FK_order_details_table2` FOREIGN KEY (`orderId`) REFERENCES `orders_table` (`orderId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `order_details_table` */

insert  into `order_details_table`(`orderDetailId`,`productVariationId`,`orderId`,`quantity`,`price`) values (1,14,9,7,159);

/*Table structure for table `orders_table` */

DROP TABLE IF EXISTS `orders_table`;

CREATE TABLE `orders_table` (
  `orderId` int(6) NOT NULL AUTO_INCREMENT,
  `orderShippingArrivalOrPickupDate` date DEFAULT NULL,
  `orderPlacedDate` date DEFAULT NULL,
  `orderShippingAddress` text,
  `orderType` varchar(60) DEFAULT NULL,
  `orderShipFirstName` varchar(60) DEFAULT NULL,
  `orderShipLastName` varchar(60) DEFAULT NULL,
  `orderShipEmail` varchar(60) DEFAULT NULL,
  `orderShipPhoneNumber` varchar(60) DEFAULT NULL,
  `orderTrackingNumber` varchar(60) DEFAULT NULL,
  `orderStatus` varchar(60) DEFAULT NULL,
  `orderTotalAmount` float DEFAULT NULL,
  `orderShippingFee` float DEFAULT NULL,
  `customerId` int(6) DEFAULT NULL,
  `deliveryMethod` varchar(60) DEFAULT NULL,
  `billingAddress` text,
  `billingFirstName` varchar(60) DEFAULT NULL,
  `billingLastName` varchar(60) DEFAULT NULL,
  `billingEmail` varchar(60) DEFAULT NULL,
  `billingPhoneNumber` varchar(60) DEFAULT NULL,
  `orderModeOfPayment` varchar(60) DEFAULT NULL,
  `remarks` text,
  PRIMARY KEY (`orderId`),
  KEY `FK_order_details_table` (`customerId`),
  CONSTRAINT `FK_order_details_table` FOREIGN KEY (`customerId`) REFERENCES `customers_table` (`customerId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `orders_table` */

insert  into `orders_table`(`orderId`,`orderShippingArrivalOrPickupDate`,`orderPlacedDate`,`orderShippingAddress`,`orderType`,`orderShipFirstName`,`orderShipLastName`,`orderShipEmail`,`orderShipPhoneNumber`,`orderTrackingNumber`,`orderStatus`,`orderTotalAmount`,`orderShippingFee`,`customerId`,`deliveryMethod`,`billingAddress`,`billingFirstName`,`billingLastName`,`billingEmail`,`billingPhoneNumber`,`orderModeOfPayment`,`remarks`) values (9,'2019-04-16','2019-04-02',NULL,'Online',NULL,NULL,NULL,NULL,NULL,'Pending Approval',1113,NULL,6,'Pick Up','72, mabini street, tacurong city, sutltan kudarat','Cesar','Santiago','customer@gmail.com','09367489655','Walk In',NULL);

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
  `paymentTransactionDate` date DEFAULT NULL,
  `userId` int(6) DEFAULT NULL,
  PRIMARY KEY (`paymentId`),
  KEY `FK_payments_table` (`orderId`),
  KEY `FK_payments_table13` (`userId`),
  CONSTRAINT `FK_payments_table` FOREIGN KEY (`orderId`) REFERENCES `orders_table` (`orderId`),
  CONSTRAINT `FK_payments_table1` FOREIGN KEY (`orderId`) REFERENCES `orders_table` (`orderId`),
  CONSTRAINT `FK_payments_table13` FOREIGN KEY (`userId`) REFERENCES `users_table` (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  CONSTRAINT `FK_product_variations_table1` FOREIGN KEY (`productId`) REFERENCES `products_table` (`productId`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

/*Data for the table `product_variations_table` */

insert  into `product_variations_table`(`productVariationId`,`productId`,`productStock`,`productStocksReorderPoint`,`productOption1`,`productOption2`,`productVariationIsDeleted`,`productPrice`) values (2,23,20,0,'250ml','',0,179),(3,23,0,0,'tae1','tae',1,1),(4,26,21,0,'620ml','',0,399),(5,26,10,0,'tae1','',0,123123),(6,21,11,0,'32GB ROM','3gb RAM',0,6990),(7,21,0,0,'1','1',1,1),(8,21,12,0,'16GB ROM','2gb RAM',0,4990),(9,28,10,5,'XS','',0,159),(10,28,20,1,'S','',0,159),(11,28,21,0,'M','',0,159),(12,28,22,0,'L','',0,159),(13,28,23,0,'XL','',0,159),(14,29,18,0,'S','',0,159),(15,29,19,0,'M','',0,159),(16,29,18,0,'L','',0,159),(17,29,17,0,'XL','',0,159),(18,30,20,0,'CHECK','M',0,89),(19,30,26,0,'KELLY','M',0,89),(20,30,18,0,'NIKE','M',0,89),(21,31,20,0,'XS','',0,199),(22,31,14,0,'S','',0,199),(23,31,15,0,'M','',0,199),(24,31,16,0,'L','',0,199),(25,31,18,0,'XL','',0,199),(26,32,20,0,'BLUE','S',0,149),(27,32,25,0,'BLUE','M',0,149),(28,32,25,0,'BLUE','L',0,149),(29,32,30,0,'GRAY','S',0,159),(30,32,40,0,'GRAY','M',0,159),(31,32,41,0,'GRAY','L',0,159),(32,32,24,0,'RED','S',0,169),(33,32,21,0,'RED','M',0,169),(34,32,16,0,'RED','L',0,169),(35,33,15,0,'M','',0,398),(36,33,133,0,'L','',0,398),(37,33,15,0,'XL','',0,398),(38,33,20,0,'XXL','',0,398),(39,34,10,0,'BLACK','40',0,299),(40,34,15,0,'BLACK','42',0,299),(41,34,11,0,'BLACK','44',0,299),(42,35,12,0,'BLACK','38',0,251.75),(43,35,13,0,'BLACK','40',0,251.75),(44,35,14,0,'BLACK','42',0,251.75),(45,35,15,0,'BLACK','44',0,251.75),(46,36,15,0,'SAND','39',0,1455);

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `products_table` */

insert  into `products_table`(`productId`,`productName`,`productSubCategoryId`,`productDetails`,`productUpdateDate`,`productIsDeleted`) values (21,'Huawei Y6 Pro 2019 6.09 inches HD+ Screen Smart',35,'<ul class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.7e9f43d8rr8Wa7\">\r\n<li class=\"\">EMUI 9.0 (compatible with Android 9)</li>\r\n<li class=\"\">Screen Size: 6.09inches</li>\r\n<li class=\"\">Battery capacity: 3020mAh</li>\r\n<li class=\"\">3GB RAM + 32 GB ROM</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.7e9f43d8rr8Wa7\">Rear camera: 13MP, LED flash and f/1.8 aperture</li>\r\n<li class=\"\">Front camera: 8MP, LED flash and f/2.0 aperture</li>\r\n<li class=\"\">Network: LTE TDD / LTE FDD / WCDMA / GSM , support 2/3/4G &amp; wifi</li>\r\n<li class=\"\">Connectivity:Bluetooth 4.2 , Micro USB, Wi-Fi Direct, Wi-Fi Hot Spot</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i2.7e9f43d8rr8Wa7\">External memory support:microSD up to 512GB</li>\r\n</ul>','2019-03-24 19:53:59',0),(22,'Imarflex IHS-210C Curling iron',26,'<ul class=\"\">\r\n<li class=\"\">CURLING IRON</li>\r\n<li class=\"\">CERAMIC Coated Curling Tong&nbsp;</li>\r\n<li class=\"\">Hanging Ring Feature</li>\r\n<li class=\"\">Foldable Stand</li>\r\n<li class=\"\">Safety Heat Guard</li>\r\n<li class=\"\">Pilot Light Indicator</li>\r\n<li class=\"\">360&deg; FREE SWIVEL Power Cord &amp; Hook</li>\r\n<li class=\"\">25W heating Power</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.291c321bKtWUcT\">Advance Heating COMPONENT</li>\r\n</ul>','2019-03-22 22:10:21',0),(23,'BODY TREATS Body Oil Lavender Almond Nut',25,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.51f6b5bfx8gvD3\">Vanishing Light Oil that makes your skin moisturized soft and silky.It absorbs quickly too!Moisturizes and protects skin from the sun damage</li>\r\n</ul>','2019-03-24 19:06:38',0),(24,'ta',5,'<p>123tae</p>','2019-03-24 08:18:45',1),(25,'Huawei MediaPad T3 7',41,'<ul class=\"\">\r\n<li class=\"\">OS : Andriod N .EMUI 5.1</li>\r\n<li class=\"\">Processor :Spreadtrum SC7731G, quad-core A7, 4 x 1.3 GHz</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.30155762ZS4VEc\">Display :7 inches, 1024&times;600 IPS</li>\r\n<li class=\"\">Internal Storage : 16GB ROM</li>\r\n<li class=\"\">Memory : 2GB RAM</li>\r\n<li class=\"\">Rear camera: 2 MP and fixed focus</li>\r\n<li class=\"\">Front camera: 2 MP and fixed focus</li>\r\n<li class=\"\">Battery :4100 mAh* (typical)</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.30155762ZS4VEc\">Supports GPS, A-GPS</li>\r\n</ul>','2019-03-24 18:40:46',0),(26,'TRESEMME HAIR CONDITIONER KERATIN SMOOTH',28,'<ul class=\"\">\r\n<li class=\"\">TRESemme Keratin Smooth Hair Conditioner with Argan Oil and Keratin.</li>\r\n<li class=\"\">Micro-Conditioning Technology.</li>\r\n<li class=\"\">5 benefits in just 1 wash: anti-frizz, detangles, shines, smoothens, tames flyaways.</li>\r\n<li class=\"\">For smooth hair.</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.6f75657ahgj17z\">Suitable for colour treated hair.</li>\r\n</ul>','2019-03-24 19:33:47',0),(27,'test delete',5,'<p>tae1</p>','2019-03-24 20:27:16',1),(28,'INSPI Tees Summer Collection tshirt printed graphic tee Mens',5,'<ul class=\"\">\r\n<li class=\"\">Please see Size Chart</li>\r\n<li class=\"\">Asian Size. Semi-fit.</li>\r\n<li class=\"\">100% Original INSPI</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Cotton tshirt</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Silk screen printed tshirts</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.1160503dnvMkQL\">Straight hem t shirts</li>\r\n</ul>','2019-03-26 11:51:57',0),(29,'INSPI Tees Whale Boat (White) tshirt printed graphic tee',5,'<ul class=\"\">\r\n<li class=\"\">Please see Size Chart</li>\r\n<li class=\"\">Asian Size</li>\r\n<li class=\"\">100% Original INSPI</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Cotton tshirt</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Silk screen printed tshirts</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.e0f61738wftiTC\">Straight hem t shirts</li>\r\n</ul>','2019-03-26 12:00:07',0),(30,'ICM #BESTSELLER TOPS T-SHIRT FOR MEN',5,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.11da481aIxK0Mj\">FREE SIZE FIT TO MEDIUM&nbsp;CHEST 16.5 INCHSLENGTH 26.5 INCHS&nbsp;#TOPS #TSHIRT #BESTSELLER#FASHION</li>\r\n</ul>','2019-03-26 12:03:27',0),(31,'INSPI shirt Set goals reach repeat (Maroon) tshirt printed g',5,'<ul class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.4d4e3765NlT0pY\">\r\n<li class=\"\">Please see Size Chart</li>\r\n<li class=\"\">Asian Size. Semi-fit.</li>\r\n<li class=\"\">100% Original INSPI</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Cotton tshirt</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Silk screen printed tshirts</li>\r\n<li class=\"\">Straight hem t shirts</li>\r\n</ul>','2019-03-26 12:05:36',0),(32,'SIMPLE Fashion Men`S Casual T Shirt Short Sleeve Round neck ',5,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.63dc17cffS0ErV\">Size S. Suggest35-50 body weight 145-168cn heightSize M . Suggest 45-55 body weight 150-170 cn heightSize L . Suggest 55-65 body weight 150-175 cn heightSize XL . Suggest 65-75 body weight 160-175 cn heightSize XXL. Suggest 65-80 body weight 165-185 cn height</li>\r\n</ul>','2019-03-26 12:07:56',0),(33,'Kuhong New Summer Men Slim Short-sleeved Round Casual T-shir',6,'<ul class=\"\">\r\n<li class=\"\">Color: Yellow</li>\r\n<li class=\"\">Size: M, L, XL, XXL</li>\r\n<li class=\"\">Material: cotton</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.473dbb76L0jtHH\">Type: T-Shirt</li>\r\n</ul>','2019-03-26 12:17:29',0),(34,'Safety Shoes Anti-smashing Work shoes Protect Shoes',12,'<ul class=\"\">\r\n<li class=\"\">Product details ofSafety Shoes Anti-smashing assassination Work shoes Protect ShoesFeatures:</li>\r\n<li class=\"\">Microfibre leather</li>\r\n<li class=\"\">Sandwich breathable mesh deodorant and comfortable</li>\r\n<li class=\"\">Waterproof and breathable</li>\r\n<li class=\"\">Anti-skidding and oil proof</li>\r\n<li class=\"\">*Smash-proof steel toe</li>\r\n<li class=\"\">*Penetration-resistant</li>\r\n<li class=\"\">*Shoes with gusset tongue</li>\r\n<li class=\"\">Specifications:</li>\r\n<li class=\"\">Color:black</li>\r\n<li class=\"\">Material:sandwich microfibre leather</li>\r\n<li class=\"\">Lining:breathable mesh</li>\r\n<li class=\"\">Sole:rubber</li>\r\n<li class=\"\">Toe:steel</li>\r\n<li class=\"\">Weight:1.2kg</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.53aa4088ubbtTy\">Function:high shoes,gusset tongue,smash-proof and penetration-resistant</li>\r\n</ul>','2019-03-26 21:54:07',0),(35,'Forklift Safety Shoes High Cut Sewed And Vulcanized',12,'<ul class=\"\">\r\n<li class=\"\">Product details ofSafety Shoes Anti-smashing assassination Work shoes Protect ShoesFeatures:</li>\r\n<li class=\"\">Microfibre leather</li>\r\n<li class=\"\">Sandwich breathable mesh deodorant and comfortable</li>\r\n<li class=\"\">Waterproof and breathable</li>\r\n<li class=\"\">Anti-skidding and oil proof</li>\r\n<li class=\"\">*Smash-proof steel toe</li>\r\n<li class=\"\">*Penetration-resistant</li>\r\n<li class=\"\">*Shoes with gusset tongue</li>\r\n<li class=\"\">Specifications:</li>\r\n<li class=\"\">Color:black</li>\r\n<li class=\"\">Material:sandwich microfibre leather</li>\r\n<li class=\"\">Lining:breathable mesh</li>\r\n<li class=\"\">Sole:rubber</li>\r\n<li class=\"\">Toe:steel</li>\r\n<li class=\"\">Weight:1.2kg</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.1f092ab31xWviP\">Function:high shoes,gusset tongue,smash-proof and penetration-resistant</li>\r\n</ul>','2019-03-27 08:29:45',0),(36,'NICUDU Men Desert Boot High Quality Cow Leather Work Shoes T',12,'<ul class=\"\">\r\n<li class=\"\">Feature:Comfortable</li>\r\n<li class=\"\">Color: Blackï¼ŒBrown</li>\r\n<li class=\"\">Upper Material:Cow leather</li>\r\n<li class=\"\">Closure Type:Lace-up</li>\r\n<li class=\"\">Shoe Width: Medium</li>\r\n<li class=\"\">Shoes Type: Casual</li>\r\n</ul>','2019-03-27 08:35:37',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `users_table` */

insert  into `users_table`(`userId`,`userName`,`userPassword`,`userLevel`,`isDeleted`,`fullName`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',1,0,'Admin Name'),(2,'user1','24c9e15e52afc47c225b757e7bee1f9d',2,0,'user1'),(3,'user2','7e58d63b60197ceb55a1c487989a3720',2,0,'user2'),(4,'user3','92877af70a45fd6a2ed7fe81e1236b78',2,0,'user3');

/*Table structure for table `customer_feedbacks_view` */

DROP TABLE IF EXISTS `customer_feedbacks_view`;

/*!50001 DROP VIEW IF EXISTS `customer_feedbacks_view` */;
/*!50001 DROP TABLE IF EXISTS `customer_feedbacks_view` */;

/*!50001 CREATE TABLE  `customer_feedbacks_view`(
 `customerFeedbackId` int(6) ,
 `customerId` int(6) ,
 `customerFeedback` text ,
 `customerFeedbackDate` date ,
 `customerFeedbackStatus` tinyint(1) ,
 `customerEmail` varchar(60) ,
 `customerPassword` varchar(60) ,
 `customerFirstName` varchar(60) ,
 `customerLastName` varchar(60) ,
 `customerFullName` varchar(121) ,
 `customerAddress` varchar(60) ,
 `customerRegistrationDate` date ,
 `customerPhoneNumber` varchar(60) ,
 `customerType` varchar(60) ,
 `customerIsBlocked` tinyint(1) 
)*/;

/*Table structure for table `customers_view` */

DROP TABLE IF EXISTS `customers_view`;

/*!50001 DROP VIEW IF EXISTS `customers_view` */;
/*!50001 DROP TABLE IF EXISTS `customers_view` */;

/*!50001 CREATE TABLE  `customers_view`(
 `customerId` int(6) ,
 `customerEmail` varchar(60) ,
 `customerPassword` varchar(60) ,
 `customerFirstName` varchar(60) ,
 `customerLastName` varchar(60) ,
 `customerAddress` varchar(60) ,
 `customerRegistrationDate` date ,
 `customerPhoneNumber` varchar(60) ,
 `customerType` varchar(60) ,
 `customerIsBlocked` tinyint(1) 
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
 `orderShippingArrivalOrPickupDate` date ,
 `orderPlacedDate` date ,
 `orderShippingAddress` text ,
 `orderType` varchar(60) ,
 `orderShipFirstName` varchar(60) ,
 `orderShipLastName` varchar(60) ,
 `orderShipEmail` varchar(60) ,
 `orderShipPhoneNumber` varchar(60) ,
 `orderShippingFee` float ,
 `remarks` text ,
 `orderTrackingNumber` varchar(60) ,
 `orderStatus` varchar(60) ,
 `customerId` int(6) ,
 `deliveryMethod` varchar(60) ,
 `billingAddress` text ,
 `billingFirstName` varchar(60) ,
 `billingLastName` varchar(60) ,
 `billingEmail` varchar(60) ,
 `billingPhoneNumber` varchar(60) ,
 `orderModeOfPayment` varchar(60) ,
 `customerEmail` varchar(60) ,
 `customerPassword` varchar(60) ,
 `customerFirstName` varchar(60) ,
 `customerLastName` varchar(60) ,
 `customerAddress` varchar(60) ,
 `customerRegistrationDate` date ,
 `customerPhoneNumber` varchar(60) ,
 `customerType` varchar(60) ,
 `customerIsBlocked` tinyint(1) 
)*/;

/*Table structure for table `orders_view` */

DROP TABLE IF EXISTS `orders_view`;

/*!50001 DROP VIEW IF EXISTS `orders_view` */;
/*!50001 DROP TABLE IF EXISTS `orders_view` */;

/*!50001 CREATE TABLE  `orders_view`(
 `orderId` int(6) ,
 `orderShippingArrivalOrPickupDate` date ,
 `orderPlacedDate` date ,
 `orderShippingAddress` text ,
 `orderType` varchar(60) ,
 `orderShipFirstName` varchar(60) ,
 `orderShipLastName` varchar(60) ,
 `orderShipEmail` varchar(60) ,
 `orderShipPhoneNumber` varchar(60) ,
 `orderTrackingNumber` varchar(60) ,
 `orderStatus` varchar(60) ,
 `orderTotalAmount` float ,
 `customerId` int(6) ,
 `deliveryMethod` varchar(60) ,
 `billingAddress` text ,
 `billingFirstName` varchar(60) ,
 `billingLastName` varchar(60) ,
 `billingEmail` varchar(60) ,
 `billingPhoneNumber` varchar(60) ,
 `orderShippingFee` float ,
 `remarks` text ,
 `orderModeOfPayment` varchar(60) ,
 `customerEmail` varchar(60) ,
 `customerPassword` varchar(60) ,
 `customerFirstName` varchar(60) ,
 `customerLastName` varchar(60) ,
 `fullName` varchar(121) ,
 `customerAddress` varchar(60) ,
 `customerRegistrationDate` date ,
 `customerPhoneNumber` varchar(60) ,
 `customerType` varchar(60) ,
 `customerIsBlocked` tinyint(1) 
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
 `userName` varchar(60) ,
 `userPassword` varchar(60) ,
 `userLevel` tinyint(1) ,
 `isDeleted` tinyint(1) ,
 `fullName` varchar(60) 
)*/;

/*View structure for view customer_feedbacks_view */

/*!50001 DROP TABLE IF EXISTS `customer_feedbacks_view` */;
/*!50001 DROP VIEW IF EXISTS `customer_feedbacks_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_feedbacks_view` AS select `customer_feedbacks_table`.`customerFeedbackId` AS `customerFeedbackId`,`customer_feedbacks_table`.`customerId` AS `customerId`,`customer_feedbacks_table`.`customerFeedback` AS `customerFeedback`,`customer_feedbacks_table`.`customerFeedbackDate` AS `customerFeedbackDate`,`customer_feedbacks_table`.`customerFeedbackStatus` AS `customerFeedbackStatus`,`customers_table`.`customerEmail` AS `customerEmail`,`customers_table`.`customerPassword` AS `customerPassword`,`customers_table`.`customerFirstName` AS `customerFirstName`,`customers_table`.`customerLastName` AS `customerLastName`,concat(`customers_table`.`customerFirstName`,' ',`customers_table`.`customerLastName`) AS `customerFullName`,`customers_table`.`customerAddress` AS `customerAddress`,`customers_table`.`customerRegistrationDate` AS `customerRegistrationDate`,`customers_table`.`customerPhoneNumber` AS `customerPhoneNumber`,`customers_table`.`customerType` AS `customerType`,`customers_table`.`customerIsBlocked` AS `customerIsBlocked` from (`customer_feedbacks_table` join `customers_table` on((`customer_feedbacks_table`.`customerId` = `customers_table`.`customerId`))) where ((`customers_table`.`customerIsBlocked` = 0) and (`customer_feedbacks_table`.`customerFeedbackStatus` <> 2)) */;

/*View structure for view customers_view */

/*!50001 DROP TABLE IF EXISTS `customers_view` */;
/*!50001 DROP VIEW IF EXISTS `customers_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customers_view` AS select `customers_table`.`customerId` AS `customerId`,`customers_table`.`customerEmail` AS `customerEmail`,`customers_table`.`customerPassword` AS `customerPassword`,`customers_table`.`customerFirstName` AS `customerFirstName`,`customers_table`.`customerLastName` AS `customerLastName`,`customers_table`.`customerAddress` AS `customerAddress`,`customers_table`.`customerRegistrationDate` AS `customerRegistrationDate`,`customers_table`.`customerPhoneNumber` AS `customerPhoneNumber`,`customers_table`.`customerType` AS `customerType`,`customers_table`.`customerIsBlocked` AS `customerIsBlocked` from `customers_table` where (`customers_table`.`customerIsBlocked` = 0) */;

/*View structure for view inventory_logs_view */

/*!50001 DROP TABLE IF EXISTS `inventory_logs_view` */;
/*!50001 DROP VIEW IF EXISTS `inventory_logs_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `inventory_logs_view` AS select `inventory_logs_table`.`inventorylogId` AS `inventorylogId`,`inventory_logs_table`.`productVariationId` AS `productVariationId`,`inventory_logs_table`.`inOrOut` AS `inOrOut`,`inventory_logs_table`.`quantity` AS `quantity`,`inventory_logs_table`.`transactionDateTime` AS `transactionDateTime`,`inventory_logs_table`.`inventoryLogRemark` AS `inventoryLogRemark`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice` from (`inventory_logs_table` join `product_variations_table` on((`inventory_logs_table`.`productVariationId` = `product_variations_table`.`productVariationId`))) */;

/*View structure for view order_details_view */

/*!50001 DROP TABLE IF EXISTS `order_details_view` */;
/*!50001 DROP VIEW IF EXISTS `order_details_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_details_view` AS select `order_details_table`.`orderDetailId` AS `orderDetailId`,`order_details_table`.`productVariationId` AS `productVariationId`,`order_details_table`.`orderId` AS `orderId`,`order_details_table`.`quantity` AS `quantity`,`order_details_table`.`price` AS `price`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory`,`orders_table`.`orderShippingArrivalOrPickupDate` AS `orderShippingArrivalOrPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`remarks` AS `remarks`,`orders_table`.`orderTrackingNumber` AS `orderTrackingNumber`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`customerId` AS `customerId`,`orders_table`.`deliveryMethod` AS `deliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`customers_table`.`customerEmail` AS `customerEmail`,`customers_table`.`customerPassword` AS `customerPassword`,`customers_table`.`customerFirstName` AS `customerFirstName`,`customers_table`.`customerLastName` AS `customerLastName`,`customers_table`.`customerAddress` AS `customerAddress`,`customers_table`.`customerRegistrationDate` AS `customerRegistrationDate`,`customers_table`.`customerPhoneNumber` AS `customerPhoneNumber`,`customers_table`.`customerType` AS `customerType`,`customers_table`.`customerIsBlocked` AS `customerIsBlocked` from ((((((`order_details_table` join `product_variations_table` on((`order_details_table`.`productVariationId` = `product_variations_table`.`productVariationId`))) join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) join `orders_table` on((`order_details_table`.`orderId` = `orders_table`.`orderId`))) join `customers_table` on((`orders_table`.`customerId` = `customers_table`.`customerId`))) */;

/*View structure for view orders_view */

/*!50001 DROP TABLE IF EXISTS `orders_view` */;
/*!50001 DROP VIEW IF EXISTS `orders_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orders_view` AS select `orders_table`.`orderId` AS `orderId`,`orders_table`.`orderShippingArrivalOrPickupDate` AS `orderShippingArrivalOrPickupDate`,`orders_table`.`orderPlacedDate` AS `orderPlacedDate`,`orders_table`.`orderShippingAddress` AS `orderShippingAddress`,`orders_table`.`orderType` AS `orderType`,`orders_table`.`orderShipFirstName` AS `orderShipFirstName`,`orders_table`.`orderShipLastName` AS `orderShipLastName`,`orders_table`.`orderShipEmail` AS `orderShipEmail`,`orders_table`.`orderShipPhoneNumber` AS `orderShipPhoneNumber`,`orders_table`.`orderTrackingNumber` AS `orderTrackingNumber`,`orders_table`.`orderStatus` AS `orderStatus`,`orders_table`.`orderTotalAmount` AS `orderTotalAmount`,`orders_table`.`customerId` AS `customerId`,`orders_table`.`deliveryMethod` AS `deliveryMethod`,`orders_table`.`billingAddress` AS `billingAddress`,`orders_table`.`billingFirstName` AS `billingFirstName`,`orders_table`.`billingLastName` AS `billingLastName`,`orders_table`.`billingEmail` AS `billingEmail`,`orders_table`.`billingPhoneNumber` AS `billingPhoneNumber`,`orders_table`.`orderShippingFee` AS `orderShippingFee`,`orders_table`.`remarks` AS `remarks`,`orders_table`.`orderModeOfPayment` AS `orderModeOfPayment`,`customers_table`.`customerEmail` AS `customerEmail`,`customers_table`.`customerPassword` AS `customerPassword`,`customers_table`.`customerFirstName` AS `customerFirstName`,`customers_table`.`customerLastName` AS `customerLastName`,concat(`customers_table`.`customerFirstName`,' ',`customers_table`.`customerFirstName`) AS `fullName`,`customers_table`.`customerAddress` AS `customerAddress`,`customers_table`.`customerRegistrationDate` AS `customerRegistrationDate`,`customers_table`.`customerPhoneNumber` AS `customerPhoneNumber`,`customers_table`.`customerType` AS `customerType`,`customers_table`.`customerIsBlocked` AS `customerIsBlocked` from (`orders_table` join `customers_table` on((`orders_table`.`customerId` = `customers_table`.`customerId`))) */;

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_view` AS select `users_table`.`userId` AS `userId`,`users_table`.`userName` AS `userName`,`users_table`.`userPassword` AS `userPassword`,`users_table`.`userLevel` AS `userLevel`,`users_table`.`isDeleted` AS `isDeleted`,`users_table`.`fullName` AS `fullName` from `users_table` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
