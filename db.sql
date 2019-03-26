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

insert  into `customer_feedbacks_table`(`customerFeedbackId`,`customerId`,`customerFeedback`,`customerFeedbackDate`,`customerFeedbackStatus`) values (1,6,'test','2019-03-25',1),(2,6,'test','2019-03-25',2),(3,6,'tae','2019-03-25',2),(4,6,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer commodo quam ac eros suscipit, vitae rhoncus risus vestibulum. Mauris at dapibus quam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut enim sodales, scelerisque libero quis, efficitur lorem. Curabitur et finibus nunc.','2019-03-25',1),(5,6,'test','2019-03-25',1),(6,6,'te','2019-03-25',0),(7,6,'tes','2019-03-25',0);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `customers_table` */

insert  into `customers_table`(`customerId`,`customerEmail`,`customerPassword`,`customerFirstName`,`customerLastName`,`customerAddress`,`customerRegistrationDate`,`customerPhoneNumber`,`customerType`,`customerIsBlocked`) values (1,'cjashleywalkincustomer@gmail.com','7ede9788c3c58bf9cb78147c155f0eff','Walkin','Walkin','none','2019-03-24','none','walkin',0),(6,'customer@gmail.com','91ec1f9324753048c0096d036a694f86','Cesar','Santiago','72, mabini street, tacurong city, sutltan kudarat','2019-03-24','09367489655','online',0),(7,'test@gmail.com','1aedb8d9dc4751e229a335e371db8058','albert','yale','66 malvar street, tacurong city, sultan kudarat','2019-03-24','09754363941','online',0);

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
  `paymentAmount` varchar(60) DEFAULT NULL,
  `paymentType` varchar(60) DEFAULT NULL,
  `orderId` int(6) DEFAULT NULL,
  `paymentDetails` text,
  `paymentRecieptImage` text,
  `paymentStatus` varchar(60) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `product_images_table` */

insert  into `product_images_table`(`productImageId`,`productImageLocation`,`isThumbnail`,`productId`) values (1,'c19980b7098c74e9c05a095c603f8696test.jpg',1,21),(2,'3ea8c26260a522e6e5a689afc28178a7test.jpg',0,21),(3,'cb580195445fda73417256b844e78853test.jpg',0,21),(4,'default-image.jpg',1,22),(5,'default-image.jpg',0,22),(6,'default-image.jpg',0,22),(7,'default-image.jpg',1,23),(8,'default-image.jpg',0,23),(9,'default-image.jpg',0,23),(10,'default-image.jpg',1,24),(11,'default-image.jpg',0,24),(12,'default-image.jpg',0,24),(13,'default-image.jpg',1,25),(14,'default-image.jpg',0,25),(15,'default-image.jpg',0,25),(16,'default-image.jpg',1,26),(17,'default-image.jpg',0,26),(18,'default-image.jpg',0,26),(19,'default-image.jpg',1,27),(20,'default-image.jpg',0,27),(21,'default-image.jpg',0,27),(22,'84b2a4ebbc47b012ea64b7ffdb6cb8391407f0589fa7064dea5ad712cb0656ab.jpg_720x720q75.jpg',1,28),(23,'726938d64cdb0711fdc5f23458cc1ae6asdasd.jpg',0,28),(24,'635be41eae21fa1ed182a4c10c9a805b78b9b8d7996a9c8cc3285e2e70303943.jpg_720x720q80.jpg',0,28),(25,'ea750ffeb75c44453f159a239838cde11.jpg',1,29),(26,'ea9e9739f17a9d0f4a756048217e20942.jpG',0,29),(27,'a1c0deff5e858fe7e6b67524d96d7be23.jpg',0,29),(28,'808694bb9b0432ccae3d4efaea8accaa1.jpg',1,30),(29,'e9cf5d663bd618009ed358fea829daaf2.jpeg',0,30),(30,'d67333d50f295766033338c4975f137f3.jpeg',0,30),(31,'4700cca5612b0bb564e00814b26b50bb1.jpg',1,31),(32,'3709daac0c690905097a7ffee2b96b152.jpG',0,31),(33,'6a1c6c14b74a86a973368d45e2335a393.jpg',0,31),(34,'c1343e958909c377392037b8e75562c5blue.jpg',1,32),(35,'fc02c552684e18a77a6f8b494e04cf61grey.jpg',0,32),(36,'7e19c1303f54ffed54d4692e2b96690ered.jpg',0,32),(37,'0710d69e4303885ebf094b446baf1d805322681753bc6c7a224cf375455b71d2.jpg_720x720q80.jpg',1,33),(38,'default-image.jpg',0,33),(39,'default-image.jpg',0,33);

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `product_variations_table` */

insert  into `product_variations_table`(`productVariationId`,`productId`,`productStock`,`productStocksReorderPoint`,`productOption1`,`productOption2`,`productVariationIsDeleted`,`productPrice`) values (2,23,100,10,'250ml','',0,179),(3,23,0,2,'tae1','tae',1,1),(4,26,10,1,'620ml','',0,399),(5,26,123,123,'tae1','',0,123123),(6,21,5,5,'32GB ROM','3gb RAM',0,6990),(7,21,1,1,'1','1',1,1),(8,21,0,0,'16GB ROM','2gb RAM',0,4990),(9,28,0,0,'XS','',0,159),(10,28,0,0,'S','',0,159),(11,28,0,0,'M','',0,159),(12,28,0,0,'L','',0,159),(13,28,0,0,'XL','',0,159),(14,29,0,0,'S','',0,159),(15,29,0,0,'M','',0,159),(16,29,0,0,'L','',0,159),(17,29,0,0,'XL','',0,159),(18,30,0,0,'CHECK','M',0,89),(19,30,0,0,'KELLY','M',0,89),(20,30,0,0,'NIKE','M',0,89),(21,31,0,0,'XS','',0,199),(22,31,0,0,'S','',0,199),(23,31,0,0,'M','',0,199),(24,31,0,0,'L','',0,199),(25,31,0,0,'XL','',0,199),(26,32,0,0,'BLUE','S',0,149),(27,32,0,0,'BLUE','M',0,149),(28,32,0,0,'BLUE','L',0,149),(29,32,0,0,'GRAY','S',0,159),(30,32,0,0,'GRAY','M',0,159),(31,32,0,0,'GRAY','L',0,159),(32,32,0,0,'RED','S',0,169),(33,32,0,0,'RED','M',0,169),(34,32,0,0,'RED','L',0,169),(35,33,0,0,'M','',0,398),(36,33,0,0,'L','',0,398),(37,33,0,0,'XL','',0,398),(38,33,0,0,'XXL','',0,398);

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `products_table` */

insert  into `products_table`(`productId`,`productName`,`productSubCategoryId`,`productDetails`,`productUpdateDate`,`productIsDeleted`) values (21,'Huawei Y6 Pro 2019 6.09 inches HD+ Screen Smart',35,'<ul class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.7e9f43d8rr8Wa7\">\r\n<li class=\"\">EMUI 9.0 (compatible with Android 9)</li>\r\n<li class=\"\">Screen Size: 6.09inches</li>\r\n<li class=\"\">Battery capacity: 3020mAh</li>\r\n<li class=\"\">3GB RAM + 32 GB ROM</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.7e9f43d8rr8Wa7\">Rear camera: 13MP, LED flash and f/1.8 aperture</li>\r\n<li class=\"\">Front camera: 8MP, LED flash and f/2.0 aperture</li>\r\n<li class=\"\">Network: LTE TDD / LTE FDD / WCDMA / GSM , support 2/3/4G &amp; wifi</li>\r\n<li class=\"\">Connectivity:Bluetooth 4.2 , Micro USB, Wi-Fi Direct, Wi-Fi Hot Spot</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i2.7e9f43d8rr8Wa7\">External memory support:microSD up to 512GB</li>\r\n</ul>','2019-03-24 19:53:59',0),(22,'Imarflex IHS-210C Curling iron',26,'<ul class=\"\">\r\n<li class=\"\">CURLING IRON</li>\r\n<li class=\"\">CERAMIC Coated Curling Tong&nbsp;</li>\r\n<li class=\"\">Hanging Ring Feature</li>\r\n<li class=\"\">Foldable Stand</li>\r\n<li class=\"\">Safety Heat Guard</li>\r\n<li class=\"\">Pilot Light Indicator</li>\r\n<li class=\"\">360&deg; FREE SWIVEL Power Cord &amp; Hook</li>\r\n<li class=\"\">25W heating Power</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.291c321bKtWUcT\">Advance Heating COMPONENT</li>\r\n</ul>','2019-03-22 22:10:21',0),(23,'BODY TREATS Body Oil Lavender Almond Nut',25,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.51f6b5bfx8gvD3\">Vanishing Light Oil that makes your skin moisturized soft and silky.It absorbs quickly too!Moisturizes and protects skin from the sun damage</li>\r\n</ul>','2019-03-24 19:06:38',0),(24,'ta',5,'<p>123tae</p>','2019-03-24 08:18:45',1),(25,'Huawei MediaPad T3 7',41,'<ul class=\"\">\r\n<li class=\"\">OS : Andriod N .EMUI 5.1</li>\r\n<li class=\"\">Processor :Spreadtrum SC7731G, quad-core A7, 4 x 1.3 GHz</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i1.30155762ZS4VEc\">Display :7 inches, 1024&times;600 IPS</li>\r\n<li class=\"\">Internal Storage : 16GB ROM</li>\r\n<li class=\"\">Memory : 2GB RAM</li>\r\n<li class=\"\">Rear camera: 2 MP and fixed focus</li>\r\n<li class=\"\">Front camera: 2 MP and fixed focus</li>\r\n<li class=\"\">Battery :4100 mAh* (typical)</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.30155762ZS4VEc\">Supports GPS, A-GPS</li>\r\n</ul>','2019-03-24 18:40:46',0),(26,'TRESEMME HAIR CONDITIONER KERATIN SMOOTH',28,'<ul class=\"\">\r\n<li class=\"\">TRESemme Keratin Smooth Hair Conditioner with Argan Oil and Keratin.</li>\r\n<li class=\"\">Micro-Conditioning Technology.</li>\r\n<li class=\"\">5 benefits in just 1 wash: anti-frizz, detangles, shines, smoothens, tames flyaways.</li>\r\n<li class=\"\">For smooth hair.</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.6f75657ahgj17z\">Suitable for colour treated hair.</li>\r\n</ul>','2019-03-24 19:33:47',0),(27,'test delete',5,'<p>tae1</p>','2019-03-24 20:27:16',1),(28,'INSPI Tees Summer Collection tshirt printed graphic tee Mens',5,'<ul class=\"\">\r\n<li class=\"\">Please see Size Chart</li>\r\n<li class=\"\">Asian Size. Semi-fit.</li>\r\n<li class=\"\">100% Original INSPI</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Cotton tshirt</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Silk screen printed tshirts</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.1160503dnvMkQL\">Straight hem t shirts</li>\r\n</ul>','2019-03-26 11:51:57',0),(29,'INSPI Tees Whale Boat (White) tshirt printed graphic tee',5,'<ul class=\"\">\r\n<li class=\"\">Please see Size Chart</li>\r\n<li class=\"\">Asian Size</li>\r\n<li class=\"\">100% Original INSPI</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Cotton tshirt</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Silk screen printed tshirts</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.e0f61738wftiTC\">Straight hem t shirts</li>\r\n</ul>','2019-03-26 12:00:07',0),(30,'ICM #BESTSELLER TOPS T-SHIRT FOR MEN',5,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.11da481aIxK0Mj\">FREE SIZE FIT TO MEDIUM&nbsp;CHEST 16.5 INCHSLENGTH 26.5 INCHS&nbsp;#TOPS #TSHIRT #BESTSELLER#FASHION</li>\r\n</ul>','2019-03-26 12:03:27',0),(31,'INSPI shirt Set goals reach repeat (Maroon) tshirt printed g',5,'<ul class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.4d4e3765NlT0pY\">\r\n<li class=\"\">Please see Size Chart</li>\r\n<li class=\"\">Asian Size. Semi-fit.</li>\r\n<li class=\"\">100% Original INSPI</li>\r\n<li class=\"\">Premium Quality</li>\r\n<li class=\"\">Cotton tshirt</li>\r\n<li class=\"\">Round neck t shirt</li>\r\n<li class=\"\">Short sleeve t-shirt</li>\r\n<li class=\"\">Silk screen printed tshirts</li>\r\n<li class=\"\">Straight hem t shirts</li>\r\n</ul>','2019-03-26 12:05:36',0),(32,'SIMPLE Fashion Men`S Casual T Shirt Short Sleeve Round neck ',5,'<ul class=\"\">\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.63dc17cffS0ErV\">Size S. Suggest35-50 body weight 145-168cn heightSize M . Suggest 45-55 body weight 150-170 cn heightSize L . Suggest 55-65 body weight 150-175 cn heightSize XL . Suggest 65-75 body weight 160-175 cn heightSize XXL. Suggest 65-80 body weight 165-185 cn height</li>\r\n</ul>','2019-03-26 12:07:56',0),(33,'Kuhong New Summer Men Slim Short-sleeved Round Casual T-shir',6,'<ul class=\"\">\r\n<li class=\"\">Color: Yellow</li>\r\n<li class=\"\">Size: M, L, XL, XXL</li>\r\n<li class=\"\">Material: cotton</li>\r\n<li class=\"\" data-spm-anchor-id=\"a2o4l.pdp.product_detail.i0.473dbb76L0jtHH\">Type: T-Shirt</li>\r\n</ul>','2019-03-26 12:17:29',0);

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

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_variations_group_by_products_view` AS select `product_variations_table`.`productVariationId` AS `productVariationId`,`product_variations_table`.`productId` AS `productId`,`product_variations_table`.`productStock` AS `productStock`,`product_variations_table`.`productStocksReorderPoint` AS `productStocksReorderPoint`,`product_variations_table`.`productOption1` AS `productOption1`,`product_variations_table`.`productOption2` AS `productOption2`,`product_variations_table`.`productVariationIsDeleted` AS `productVariationIsDeleted`,`product_variations_table`.`productPrice` AS `productPrice`,`products_table`.`productName` AS `productName`,`products_table`.`productSubCategoryId` AS `productSubCategoryId`,`products_table`.`productDetails` AS `productDetails`,`products_table`.`productUpdateDate` AS `productUpdateDate`,`products_table`.`productIsDeleted` AS `productIsDeleted`,`product_sub_categories_table`.`productSubCategory` AS `productSubCategory`,`product_sub_categories_table`.`productCategoryId` AS `productCategoryId`,`product_categories_table`.`productCategory` AS `productCategory` from (((`product_variations_table` join `products_table` on((`product_variations_table`.`productId` = `products_table`.`productId`))) join `product_sub_categories_table` on((`products_table`.`productSubCategoryId` = `product_sub_categories_table`.`productSubCategoryId`))) join `product_categories_table` on((`product_sub_categories_table`.`productCategoryId` = `product_categories_table`.`productCategoryId`))) where ((`product_variations_table`.`productVariationIsDeleted` = 0) and (`products_table`.`productIsDeleted` = 0)) group by `product_variations_table`.`productId` */;

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
