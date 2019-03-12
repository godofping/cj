/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.1.37-MariaDB : Database - psmoc_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`psmoc_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `psmoc_db`;

/*Table structure for table `gun_club_affiliation_table` */

DROP TABLE IF EXISTS `gun_club_affiliation_table`;

CREATE TABLE `gun_club_affiliation_table` (
  `gunClubAffiliationId` int(6) NOT NULL AUTO_INCREMENT,
  `nameOfGunClub` varchar(100) DEFAULT NULL,
  `officeAddress` text,
  `firingRangeLocation` text,
  `landlineNo` varchar(100) DEFAULT NULL,
  `mobileNo` varchar(100) DEFAULT NULL,
  `contactPerson` varchar(100) DEFAULT NULL,
  `emailAddress` varchar(100) DEFAULT NULL,
  `secRegistrationNo` varchar(100) DEFAULT NULL,
  `nameOfGunClubSecretary` varchar(100) DEFAULT NULL,
  `nameOfGunClubPresident` varchar(100) DEFAULT NULL,
  `psmocDistrictManager` varchar(100) DEFAULT NULL,
  `psmocZoneDirector` varchar(100) DEFAULT NULL,
  `psmocSecretary` varchar(100) DEFAULT NULL,
  `psmocPresident` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`gunClubAffiliationId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `gun_club_affiliation_table` */

/*Table structure for table `match_remittance_sanctioning_table` */

DROP TABLE IF EXISTS `match_remittance_sanctioning_table`;

CREATE TABLE `match_remittance_sanctioning_table` (
  `matchRemittanceSanctioningId` int(6) NOT NULL AUTO_INCREMENT,
  `district` varchar(100) DEFAULT NULL,
  `nameOfMatch` varchar(100) DEFAULT NULL,
  `hostClub` varchar(100) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `inclusiveDates` varchar(100) DEFAULT NULL,
  `matchLevel` varchar(100) DEFAULT NULL,
  `matchAdministrator` varchar(100) DEFAULT NULL,
  `matchMaster` varchar(100) DEFAULT NULL,
  `regularShootersParticipant` varchar(100) DEFAULT NULL,
  `regularShootersFee` varchar(100) DEFAULT NULL,
  `regularShootersAmountDue` varchar(100) DEFAULT NULL,
  `juniorAndSuperSenior` varchar(100) DEFAULT NULL,
  `lawmanPnp` varchar(100) DEFAULT NULL,
  `lawmanUniformPnp` varchar(100) DEFAULT NULL,
  `matchOfficialOfficiating` varchar(100) DEFAULT NULL,
  `totalParticipant` varchar(100) DEFAULT NULL,
  `totalSanctionFee` varchar(100) DEFAULT NULL,
  `bankCheckNo` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `orPr` varchar(100) DEFAULT NULL,
  `recievedBy` varchar(100) DEFAULT NULL,
  `submittedByMatchMaster` varchar(100) DEFAULT NULL,
  `approvedByDistrictManager` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`matchRemittanceSanctioningId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `match_remittance_sanctioning_table` */

/*Table structure for table `match_sanctioning_table` */

DROP TABLE IF EXISTS `match_sanctioning_table`;

CREATE TABLE `match_sanctioning_table` (
  `matchSanctioningId` int(6) NOT NULL AUTO_INCREMENT,
  `dateOfFiling` date DEFAULT NULL,
  `nameOfMatch` varchar(200) DEFAULT NULL,
  `shootingRangeAddress` text,
  `dateOfMatch` date DEFAULT NULL,
  `level` varchar(60) DEFAULT NULL,
  `zone` varchar(60) DEFAULT NULL,
  `district` varchar(60) DEFAULT NULL,
  `hostGunClub` varchar(200) DEFAULT NULL,
  `shootingFormat` varchar(60) DEFAULT NULL,
  `levelHandgun` varchar(60) DEFAULT NULL,
  `levelPRR` varchar(60) DEFAULT NULL,
  `levelShoutgun` varchar(60) DEFAULT NULL,
  `levelPCC` varchar(60) DEFAULT NULL,
  `level2GunHG` varchar(60) DEFAULT NULL,
  `level2GunPRR` varchar(60) DEFAULT NULL,
  `level2GunSG` varchar(60) DEFAULT NULL,
  `level2GunPCC` varchar(60) DEFAULT NULL,
  `level2GunSSR` varchar(60) DEFAULT NULL,
  `level3GunHG` varchar(60) DEFAULT NULL,
  `level3GunPRR` varchar(60) DEFAULT NULL,
  `level3GunSG` varchar(60) DEFAULT NULL,
  `level3GunPCC` varchar(60) DEFAULT NULL,
  `level3GunSSR` varchar(60) DEFAULT NULL,
  `speedCourseHandgun` varchar(60) DEFAULT NULL,
  `speedCoursePRR` varchar(60) DEFAULT NULL,
  `speedCourseShotgun` varchar(60) DEFAULT NULL,
  `speedCoursePCC` varchar(60) DEFAULT NULL,
  `speedCourse2GunHG` varchar(60) DEFAULT NULL,
  `speedCourse2GunPRR` varchar(60) DEFAULT NULL,
  `speedCourse2GunSG` varchar(60) DEFAULT NULL,
  `speedCourse2GunPCC` varchar(60) DEFAULT NULL,
  `speedCourse2GunSSR` varchar(60) DEFAULT NULL,
  `speedCourse3GunHG` varchar(60) DEFAULT NULL,
  `speedCourse3GunPRR` varchar(60) DEFAULT NULL,
  `speedCourse3GunSG` varchar(60) DEFAULT NULL,
  `speedCourse3GunPCC` varchar(60) DEFAULT NULL,
  `speedCourse3GunSSR` varchar(60) DEFAULT NULL,
  `intermediateCourseHandgun` varchar(60) DEFAULT NULL,
  `intermediateCoursePRR` varchar(60) DEFAULT NULL,
  `intermediateCourseShotgun` varchar(60) DEFAULT NULL,
  `intermediateCoursePCC` varchar(60) DEFAULT NULL,
  `intermediateCourse2GunHG` varchar(60) DEFAULT NULL,
  `intermediateCourse2GunPRR` varchar(60) DEFAULT NULL,
  `intermediateCourse2GunSG` varchar(60) DEFAULT NULL,
  `intermediateCourse2GunPCC` varchar(60) DEFAULT NULL,
  `intermediateCourse2GunSSR` varchar(60) DEFAULT NULL,
  `intermediateCourse3GunHG` varchar(60) DEFAULT NULL,
  `intermediateCourse3GunPRR` varchar(60) DEFAULT NULL,
  `intermediateCourse3GunSG` varchar(60) DEFAULT NULL,
  `intermediateCourse3GunPCC` varchar(60) DEFAULT NULL,
  `intermediateCourse3GunSSR` varchar(60) DEFAULT NULL,
  `ultimateCourseHandgun` varchar(60) DEFAULT NULL,
  `ultimateCoursePRR` varchar(60) DEFAULT NULL,
  `ultimateCourseShotgun` varchar(60) DEFAULT NULL,
  `ultimateCoursePCC` varchar(60) DEFAULT NULL,
  `ultimateCourse2GunHG` varchar(60) DEFAULT NULL,
  `ultimateCourse2GunPRR` varchar(60) DEFAULT NULL,
  `ultimateCourse2GunSG` varchar(60) DEFAULT NULL,
  `ultimateCourse2GunPCC` varchar(60) DEFAULT NULL,
  `ultimateCourse2GunSSR` varchar(60) DEFAULT NULL,
  `ultimateCourse3GunHG` varchar(60) DEFAULT NULL,
  `ultimateCourse3GunPRR` varchar(60) DEFAULT NULL,
  `ultimateCourse3GunSG` varchar(60) DEFAULT NULL,
  `ultimateCourse3GunPCC` varchar(60) DEFAULT NULL,
  `ultimateCourse3GunSSR` varchar(60) DEFAULT NULL,
  `noOfStagesCourseHandgun` varchar(60) DEFAULT NULL,
  `noOfStagesCoursePRR` varchar(60) DEFAULT NULL,
  `noOfStagesCourseShotgun` varchar(60) DEFAULT NULL,
  `noOfStagesCoursePCC` varchar(60) DEFAULT NULL,
  `noOfStagesCourse2GunHG` varchar(60) DEFAULT NULL,
  `noOfStagesCourse2GunPRR` varchar(60) DEFAULT NULL,
  `noOfStagesCourse2GunSG` varchar(60) DEFAULT NULL,
  `noOfStagesCourse2GunPCC` varchar(60) DEFAULT NULL,
  `noOfStagesCourse2GunSSR` varchar(60) DEFAULT NULL,
  `noOfStagesCourse3GunHG` varchar(60) DEFAULT NULL,
  `noOfStagesCourse3GunPRR` varchar(60) DEFAULT NULL,
  `noOfStagesCourse3GunSG` varchar(60) DEFAULT NULL,
  `noOfStagesCourse3GunPCC` varchar(60) DEFAULT NULL,
  `noOfStagesCourse3GunSSR` varchar(60) DEFAULT NULL,
  `matchAdministrator` varchar(60) DEFAULT NULL,
  `matchAdministratorContactNumber` varchar(60) DEFAULT NULL,
  `matchMaster` varchar(60) DEFAULT NULL,
  `matchMasterContactNumber` varchar(60) DEFAULT NULL,
  `chiefScoreProcOff` varchar(60) DEFAULT NULL,
  `chiefScoreProcOffContactNumber` varchar(60) DEFAULT NULL,
  `contactPerson` varchar(60) DEFAULT NULL,
  `contactPersonContactNumber` varchar(60) DEFAULT NULL,
  `nameOfGunClubPresident` varchar(60) DEFAULT NULL,
  `nameOfGunClubPresidentContactNumber` varchar(60) DEFAULT NULL,
  `nameOfMatchOrganizer` varchar(60) DEFAULT NULL,
  `nameOfMatchOrganizerContactNumber` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`matchSanctioningId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `match_sanctioning_table` */

/*Table structure for table `match_table` */

DROP TABLE IF EXISTS `match_table`;

CREATE TABLE `match_table` (
  `matchId` int(6) NOT NULL AUTO_INCREMENT,
  `shooterNo` varchar(60) DEFAULT NULL,
  `shooterName` varchar(100) DEFAULT NULL,
  `stageNo` varchar(60) DEFAULT NULL,
  `ft1A` varchar(60) DEFAULT NULL,
  `ft1M` varchar(60) DEFAULT NULL,
  `ft1P` varchar(60) DEFAULT NULL,
  `ft1Comment` varchar(60) DEFAULT NULL,
  `ft2A` varchar(60) DEFAULT NULL,
  `ft2M` varchar(60) DEFAULT NULL,
  `ft2P` varchar(60) DEFAULT NULL,
  `ft2Comment` varchar(60) DEFAULT NULL,
  `ft3A` varchar(60) DEFAULT NULL,
  `ft3M` varchar(60) DEFAULT NULL,
  `ft3P` varchar(60) DEFAULT NULL,
  `ft3Comment` varchar(60) DEFAULT NULL,
  `ft4A` varchar(60) DEFAULT NULL,
  `ft4M` varchar(60) DEFAULT NULL,
  `ft4P` varchar(60) DEFAULT NULL,
  `ft4Comment` varchar(60) DEFAULT NULL,
  `ft5A` varchar(60) DEFAULT NULL,
  `ft5M` varchar(60) DEFAULT NULL,
  `ft5P` varchar(60) DEFAULT NULL,
  `ft5Comment` varchar(60) DEFAULT NULL,
  `ft6A` varchar(60) DEFAULT NULL,
  `ft6M` varchar(60) DEFAULT NULL,
  `ft6P` varchar(60) DEFAULT NULL,
  `ft6Comment` varchar(60) DEFAULT NULL,
  `ft7A` varchar(60) DEFAULT NULL,
  `ft7M` varchar(60) DEFAULT NULL,
  `ft7P` varchar(60) DEFAULT NULL,
  `ft7Comment` varchar(60) DEFAULT NULL,
  `ft8A` varchar(60) DEFAULT NULL,
  `ft8M` varchar(60) DEFAULT NULL,
  `ft8P` varchar(60) DEFAULT NULL,
  `ft8Comment` varchar(60) DEFAULT NULL,
  `ft9A` varchar(60) DEFAULT NULL,
  `ft9M` varchar(60) DEFAULT NULL,
  `ft9P` varchar(60) DEFAULT NULL,
  `ft9Comment` varchar(60) DEFAULT NULL,
  `pt1A` varchar(60) DEFAULT NULL,
  `pt1B` varchar(60) DEFAULT NULL,
  `pt1C` varchar(60) DEFAULT NULL,
  `pt1M` varchar(60) DEFAULT NULL,
  `pt1P` varchar(60) DEFAULT NULL,
  `pt1Comment` varchar(60) DEFAULT NULL,
  `pt2A` varchar(60) DEFAULT NULL,
  `pt2B` varchar(60) DEFAULT NULL,
  `pt2C` varchar(60) DEFAULT NULL,
  `pt2M` varchar(60) DEFAULT NULL,
  `pt2P` varchar(60) DEFAULT NULL,
  `pt2Comment` varchar(60) DEFAULT NULL,
  `pt3A` varchar(60) DEFAULT NULL,
  `pt3B` varchar(60) DEFAULT NULL,
  `pt3C` varchar(60) DEFAULT NULL,
  `pt3M` varchar(60) DEFAULT NULL,
  `pt3P` varchar(60) DEFAULT NULL,
  `pt3Comment` varchar(60) DEFAULT NULL,
  `pt4A` varchar(60) DEFAULT NULL,
  `pt4B` varchar(60) DEFAULT NULL,
  `pt4C` varchar(60) DEFAULT NULL,
  `pt4M` varchar(60) DEFAULT NULL,
  `pt4P` varchar(60) DEFAULT NULL,
  `pt4Comment` varchar(60) DEFAULT NULL,
  `pt5A` varchar(60) DEFAULT NULL,
  `pt5B` varchar(60) DEFAULT NULL,
  `pt5C` varchar(60) DEFAULT NULL,
  `pt5M` varchar(60) DEFAULT NULL,
  `pt5P` varchar(60) DEFAULT NULL,
  `pt5Comment` varchar(60) DEFAULT NULL,
  `pt6A` varchar(60) DEFAULT NULL,
  `pt6B` varchar(60) DEFAULT NULL,
  `pt6C` varchar(60) DEFAULT NULL,
  `pt6M` varchar(60) DEFAULT NULL,
  `pt6P` varchar(60) DEFAULT NULL,
  `pt6Comment` varchar(60) DEFAULT NULL,
  `pt7A` varchar(60) DEFAULT NULL,
  `pt7B` varchar(60) DEFAULT NULL,
  `pt7C` varchar(60) DEFAULT NULL,
  `pt7M` varchar(60) DEFAULT NULL,
  `pt7P` varchar(60) DEFAULT NULL,
  `pt7Comment` varchar(60) DEFAULT NULL,
  `pt8A` varchar(60) DEFAULT NULL,
  `pt8B` varchar(60) DEFAULT NULL,
  `pt8C` varchar(60) DEFAULT NULL,
  `pt8M` varchar(60) DEFAULT NULL,
  `pt8P` varchar(60) DEFAULT NULL,
  `pt8Comment` varchar(60) DEFAULT NULL,
  `pt9A` varchar(60) DEFAULT NULL,
  `pt9B` varchar(60) DEFAULT NULL,
  `pt9C` varchar(60) DEFAULT NULL,
  `pt9M` varchar(60) DEFAULT NULL,
  `pt9P` varchar(60) DEFAULT NULL,
  `pt9Comment` varchar(60) DEFAULT NULL,
  `pt10A` varchar(60) DEFAULT NULL,
  `pt10B` varchar(60) DEFAULT NULL,
  `pt10C` varchar(60) DEFAULT NULL,
  `pt10M` varchar(60) DEFAULT NULL,
  `pt10P` varchar(60) DEFAULT NULL,
  `pt10Comment` varchar(60) DEFAULT NULL,
  `pt11A` varchar(60) DEFAULT NULL,
  `pt11B` varchar(60) DEFAULT NULL,
  `pt11C` varchar(60) DEFAULT NULL,
  `pt11M` varchar(60) DEFAULT NULL,
  `pt11P` varchar(60) DEFAULT NULL,
  `pt11Comment` varchar(60) DEFAULT NULL,
  `pt12A` varchar(60) DEFAULT NULL,
  `pt12B` varchar(60) DEFAULT NULL,
  `pt12C` varchar(60) DEFAULT NULL,
  `pt12M` varchar(60) DEFAULT NULL,
  `pt12P` varchar(60) DEFAULT NULL,
  `pt12Comment` varchar(60) DEFAULT NULL,
  `pt13A` varchar(60) DEFAULT NULL,
  `pt13B` varchar(60) DEFAULT NULL,
  `pt13C` varchar(60) DEFAULT NULL,
  `pt13M` varchar(60) DEFAULT NULL,
  `pt13P` varchar(60) DEFAULT NULL,
  `pt13Comment` varchar(60) DEFAULT NULL,
  `pt14A` varchar(60) DEFAULT NULL,
  `pt14B` varchar(60) DEFAULT NULL,
  `pt14C` varchar(60) DEFAULT NULL,
  `pt14M` varchar(60) DEFAULT NULL,
  `pt14P` varchar(60) DEFAULT NULL,
  `pt14Comment` varchar(60) DEFAULT NULL,
  `pt15A` varchar(60) DEFAULT NULL,
  `pt15B` varchar(60) DEFAULT NULL,
  `pt15C` varchar(60) DEFAULT NULL,
  `pt15M` varchar(60) DEFAULT NULL,
  `pt15P` varchar(60) DEFAULT NULL,
  `pt15Comment` varchar(60) DEFAULT NULL,
  `pt16A` varchar(60) DEFAULT NULL,
  `pt16B` varchar(60) DEFAULT NULL,
  `pt16C` varchar(60) DEFAULT NULL,
  `pt16M` varchar(60) DEFAULT NULL,
  `pt16P` varchar(60) DEFAULT NULL,
  `total1A` varchar(60) DEFAULT NULL,
  `total1B` varchar(60) DEFAULT NULL,
  `total1C` varchar(60) DEFAULT NULL,
  `total1M` varchar(60) DEFAULT NULL,
  `total1P` varchar(60) DEFAULT NULL,
  `total1Comment` varchar(60) DEFAULT NULL,
  `pt18A` varchar(60) DEFAULT NULL,
  `pt18B` varchar(60) DEFAULT NULL,
  `pt18C` varchar(60) DEFAULT NULL,
  `pt18M` varchar(60) DEFAULT NULL,
  `pt18P` varchar(60) DEFAULT NULL,
  `pt19A` varchar(60) DEFAULT NULL,
  `pt19B` varchar(60) DEFAULT NULL,
  `pt19C` varchar(60) DEFAULT NULL,
  `pt19M` varchar(60) DEFAULT NULL,
  `pt19P` varchar(60) DEFAULT NULL,
  `pt19Comment` varchar(60) DEFAULT NULL,
  `pt20A` varchar(60) DEFAULT NULL,
  `pt20B` varchar(60) DEFAULT NULL,
  `pt20C` varchar(60) DEFAULT NULL,
  `pt20M` varchar(60) DEFAULT NULL,
  `pt20P` varchar(60) DEFAULT NULL,
  `total2A` varchar(60) DEFAULT NULL,
  `total2B` varchar(60) DEFAULT NULL,
  `total2C` varchar(60) DEFAULT NULL,
  `total2M` varchar(60) DEFAULT NULL,
  `total2P` varchar(60) DEFAULT NULL,
  `total2Comment` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`matchId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `match_table` */

/*Table structure for table `membership_table` */

DROP TABLE IF EXISTS `membership_table`;

CREATE TABLE `membership_table` (
  `membershipId` int(6) NOT NULL AUTO_INCREMENT,
  `psmocOrmoo` varchar(10) DEFAULT NULL,
  `newOrRenewal` varchar(10) DEFAULT NULL,
  `psmocId` varchar(60) DEFAULT NULL,
  `expiryDate` date DEFAULT NULL,
  `placeOfApplicationOrSeminarAndWorkShop` varchar(200) DEFAULT NULL,
  `examScore` varchar(60) DEFAULT NULL,
  `passedFailedIncomplete` varchar(20) DEFAULT NULL,
  `localTshirtSize` varchar(20) DEFAULT NULL,
  `zone` varchar(60) DEFAULT NULL,
  `district` varchar(60) DEFAULT NULL,
  `familyName` varchar(60) DEFAULT NULL,
  `middleName` varchar(60) DEFAULT NULL,
  `firstName` varchar(60) DEFAULT NULL,
  `placeOfBirth` varchar(200) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `bloodType` varchar(20) DEFAULT NULL,
  `completeHomeAddress` varchar(200) DEFAULT NULL,
  `occupationOrPosition` varchar(60) DEFAULT NULL,
  `nameOfCompanyOrOrganiztion` varchar(60) DEFAULT NULL,
  `completeOfficeOrBusinessAddress` varchar(60) DEFAULT NULL,
  `mobileLandlineNo` varchar(60) DEFAULT NULL,
  `emailAddress` varchar(60) DEFAULT NULL,
  `nameOfGunClub` varchar(60) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  `makeModel` varchar(60) DEFAULT NULL,
  `calibre` varchar(60) DEFAULT NULL,
  `serialNumber` varchar(60) DEFAULT NULL,
  `LIOPFNumber` varchar(60) DEFAULT NULL,
  `typeOfLicense` varchar(60) DEFAULT NULL,
  `numberOfYearsAsAGunClubMember` varchar(60) DEFAULT NULL,
  `licensedShooter` varchar(60) DEFAULT NULL,
  `nameOfGunClubPresident` varchar(60) DEFAULT NULL,
  `nameOfMOOInstructor` varchar(60) DEFAULT NULL,
  `applicantSignature` varchar(200) DEFAULT NULL,
  `whiteBackgroundPicture` varchar(200) DEFAULT NULL,
  `psmocSecretary` varchar(60) DEFAULT NULL,
  `psmocPresident` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`membershipId`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `membership_table` */

/*Table structure for table `user_table` */

DROP TABLE IF EXISTS `user_table`;

CREATE TABLE `user_table` (
  `userId` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `accountLevel` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `user_table` */

insert  into `user_table`(`userId`,`username`,`password`,`accountLevel`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3',1);

/*Table structure for table `membership_view` */

DROP TABLE IF EXISTS `membership_view`;

/*!50001 DROP VIEW IF EXISTS `membership_view` */;
/*!50001 DROP TABLE IF EXISTS `membership_view` */;

/*!50001 CREATE TABLE  `membership_view`(
 `membershipId` int(6) ,
 `psmocOrmoo` varchar(10) ,
 `newOrRenewal` varchar(10) ,
 `psmocId` varchar(60) ,
 `expiryDate` date ,
 `placeOfApplicationOrSeminarAndWorkShop` varchar(200) ,
 `examScore` varchar(60) ,
 `passedFailedIncomplete` varchar(20) ,
 `localTshirtSize` varchar(20) ,
 `zone` varchar(60) ,
 `district` varchar(60) ,
 `familyName` varchar(60) ,
 `middleName` varchar(60) ,
 `firstName` varchar(60) ,
 `placeOfBirth` varchar(200) ,
 `dateOfBirth` date ,
 `age` varchar(20) ,
 `sex` varchar(20) ,
 `status` varchar(20) ,
 `bloodType` varchar(20) ,
 `completeHomeAddress` varchar(200) ,
 `occupationOrPosition` varchar(60) ,
 `nameOfCompanyOrOrganiztion` varchar(60) ,
 `completeOfficeOrBusinessAddress` varchar(60) ,
 `mobileLandlineNo` varchar(60) ,
 `emailAddress` varchar(60) ,
 `nameOfGunClub` varchar(60) ,
 `address` varchar(60) ,
 `type` varchar(60) ,
 `makeModel` varchar(60) ,
 `calibre` varchar(60) ,
 `serialNumber` varchar(60) ,
 `LIOPFNumber` varchar(60) ,
 `typeOfLicense` varchar(60) ,
 `numberOfYearsAsAGunClubMember` varchar(60) ,
 `licensedShooter` varchar(60) ,
 `nameOfGunClubPresident` varchar(60) ,
 `nameOfMOOInstructor` varchar(60) ,
 `applicantSignature` varchar(200) ,
 `whiteBackgroundPicture` varchar(200) ,
 `psmocSecretary` varchar(60) ,
 `psmocPresident` varchar(60) ,
 `full_name` varchar(183) 
)*/;

/*View structure for view membership_view */

/*!50001 DROP TABLE IF EXISTS `membership_view` */;
/*!50001 DROP VIEW IF EXISTS `membership_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `membership_view` AS select `membership_table`.`membershipId` AS `membershipId`,`membership_table`.`psmocOrmoo` AS `psmocOrmoo`,`membership_table`.`newOrRenewal` AS `newOrRenewal`,`membership_table`.`psmocId` AS `psmocId`,`membership_table`.`expiryDate` AS `expiryDate`,`membership_table`.`placeOfApplicationOrSeminarAndWorkShop` AS `placeOfApplicationOrSeminarAndWorkShop`,`membership_table`.`examScore` AS `examScore`,`membership_table`.`passedFailedIncomplete` AS `passedFailedIncomplete`,`membership_table`.`localTshirtSize` AS `localTshirtSize`,`membership_table`.`zone` AS `zone`,`membership_table`.`district` AS `district`,`membership_table`.`familyName` AS `familyName`,`membership_table`.`middleName` AS `middleName`,`membership_table`.`firstName` AS `firstName`,`membership_table`.`placeOfBirth` AS `placeOfBirth`,`membership_table`.`dateOfBirth` AS `dateOfBirth`,`membership_table`.`age` AS `age`,`membership_table`.`sex` AS `sex`,`membership_table`.`status` AS `status`,`membership_table`.`bloodType` AS `bloodType`,`membership_table`.`completeHomeAddress` AS `completeHomeAddress`,`membership_table`.`occupationOrPosition` AS `occupationOrPosition`,`membership_table`.`nameOfCompanyOrOrganiztion` AS `nameOfCompanyOrOrganiztion`,`membership_table`.`completeOfficeOrBusinessAddress` AS `completeOfficeOrBusinessAddress`,`membership_table`.`mobileLandlineNo` AS `mobileLandlineNo`,`membership_table`.`emailAddress` AS `emailAddress`,`membership_table`.`nameOfGunClub` AS `nameOfGunClub`,`membership_table`.`address` AS `address`,`membership_table`.`type` AS `type`,`membership_table`.`makeModel` AS `makeModel`,`membership_table`.`calibre` AS `calibre`,`membership_table`.`serialNumber` AS `serialNumber`,`membership_table`.`LIOPFNumber` AS `LIOPFNumber`,`membership_table`.`typeOfLicense` AS `typeOfLicense`,`membership_table`.`numberOfYearsAsAGunClubMember` AS `numberOfYearsAsAGunClubMember`,`membership_table`.`licensedShooter` AS `licensedShooter`,`membership_table`.`nameOfGunClubPresident` AS `nameOfGunClubPresident`,`membership_table`.`nameOfMOOInstructor` AS `nameOfMOOInstructor`,`membership_table`.`applicantSignature` AS `applicantSignature`,`membership_table`.`whiteBackgroundPicture` AS `whiteBackgroundPicture`,`membership_table`.`psmocSecretary` AS `psmocSecretary`,`membership_table`.`psmocPresident` AS `psmocPresident`,concat(`membership_table`.`familyName`,', ',`membership_table`.`firstName`,' ',`membership_table`.`middleName`) AS `full_name` from `membership_table` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
