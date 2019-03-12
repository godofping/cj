<?php 
include('connection.php');

if (isset($_GET['from']) and $_GET['from'] == 'login') {
	// accountLevel: 1 = admin; 2 = user

	$username = $db->escapeString($_POST['username']);
	$password = $db->escapeString(md5($_POST['password']));

	$db->select('users_table', '*', NULL, 'username = "' . $username  .'" and password = "' . $password . '"');
	$res = $db->getResult();

	if (count($res) > 0) {
		$res = $res[0];
		$_SESSION['accountLevel'] = $res['accountLevel'];
		$_SESSION['userId'] = $res['userId'];
		$_SESSION['username'] = $res['username'];
		$_SESSION['toast'] = 'login-successful';
		header("Location: dashboard.php");
	}
	else
	{
		$_SESSION['toast'] = 'login-failed';
		header("Location: index.php");
	}
}

if (isset($_GET['from']) and $_GET['from'] == 'logout') {
	session_destroy();
	header("Location: index.php");
}

if (isset($_GET['from']) and $_GET['from'] == 'add-match-sanctioning') {

	$dateOfFiling = $db->escapeString($_POST['dateOfFiling']);
	$nameOfMatch = $db->escapeString($_POST['nameOfMatch']);
	$shootingRangeAddress = $db->escapeString($_POST['shootingRangeAddress']);
	$dateOfMatch = $db->escapeString($_POST['dateOfMatch']);
	$level = $db->escapeString($_POST['level']);
	$zone = $db->escapeString($_POST['zone']);
	$district = $db->escapeString($_POST['district']);
	$hostGunClub = $db->escapeString($_POST['hostGunClub']);
	$shootingFormat = $db->escapeString($_POST['shootingFormat']);
	$levelHandgun = $db->escapeString($_POST['levelHandgun']);
	$levelPRR = $db->escapeString($_POST['levelPRR']);
	$levelShoutgun = $db->escapeString($_POST['levelShoutgun']);
	$levelPCC = $db->escapeString($_POST['levelPCC']);
	$level2GunHG = $db->escapeString($_POST['level2GunHG']);
	$level2GunPRR = $db->escapeString($_POST['level2GunPRR']);
	$level2GunSG = $db->escapeString($_POST['level2GunSG']);
	$level2GunPCC = $db->escapeString($_POST['level2GunPCC']);
	$level2GunSSR = $db->escapeString($_POST['level2GunSSR']);
	$level3GunHG = $db->escapeString($_POST['level3GunHG']);
	$level3GunPRR = $db->escapeString($_POST['level3GunPRR']);
	$level3GunSG = $db->escapeString($_POST['level3GunSG']);
	$level3GunPCC = $db->escapeString($_POST['level3GunPCC']);
	$level3GunSSR = $db->escapeString($_POST['level3GunSSR']);
	$speedCourseHandgun = $db->escapeString($_POST['speedCourseHandgun']);
	$speedCoursePRR = $db->escapeString($_POST['speedCoursePRR']);
	$speedCourseShotgun = $db->escapeString($_POST['speedCourseShotgun']);
	$speedCoursePCC = $db->escapeString($_POST['speedCoursePCC']);
	$speedCourse2GunHG = $db->escapeString($_POST['speedCourse2GunHG']);
	$speedCourse2GunPRR = $db->escapeString($_POST['speedCourse2GunPRR']);
	$speedCourse2GunSG = $db->escapeString($_POST['speedCourse2GunSG']);
	$speedCourse2GunPCC = $db->escapeString($_POST['speedCourse2GunPCC']);
	$speedCourse2GunSSR = $db->escapeString($_POST['speedCourse2GunSSR']);
	$speedCourse3GunHG = $db->escapeString($_POST['speedCourse3GunHG']);
	$speedCourse3GunPRR = $db->escapeString($_POST['speedCourse3GunPRR']);
	$speedCourse3GunSG = $db->escapeString($_POST['speedCourse3GunSG']);
	$speedCourse3GunPCC = $db->escapeString($_POST['speedCourse3GunPCC']);
	$speedCourse3GunSSR = $db->escapeString($_POST['speedCourse3GunSSR']);
	$intermediateCourseHandgun = $db->escapeString($_POST['intermediateCourseHandgun']);
	$intermediateCoursePRR = $db->escapeString($_POST['intermediateCoursePRR']);
	$intermediateCourseShotgun = $db->escapeString($_POST['intermediateCourseShotgun']);
	$intermediateCoursePCC = $db->escapeString($_POST['intermediateCoursePCC']);
	$intermediateCourse2GunHG = $db->escapeString($_POST['intermediateCourse2GunHG']);
	$intermediateCourse2GunPRR = $db->escapeString($_POST['intermediateCourse2GunPRR']);
	$intermediateCourse2GunSG = $db->escapeString($_POST['intermediateCourse2GunSG']);
	$intermediateCourse2GunPCC = $db->escapeString($_POST['intermediateCourse2GunPCC']);
	$intermediateCourse2GunSSR = $db->escapeString($_POST['intermediateCourse2GunSSR']);
	$intermediateCourse3GunHG = $db->escapeString($_POST['intermediateCourse3GunHG']);
	$intermediateCourse3GunPRR = $db->escapeString($_POST['intermediateCourse3GunPRR']);
	$intermediateCourse3GunSG = $db->escapeString($_POST['intermediateCourse3GunSG']);
	$intermediateCourse3GunPCC = $db->escapeString($_POST['intermediateCourse3GunPCC']);
	$intermediateCourse3GunSSR = $db->escapeString($_POST['intermediateCourse3GunSSR']);
	$ultimateCourseHandgun = $db->escapeString($_POST['ultimateCourseHandgun']);
	$ultimateCoursePRR = $db->escapeString($_POST['ultimateCoursePRR']);
	$ultimateCourseShotgun = $db->escapeString($_POST['ultimateCourseShotgun']);
	$ultimateCoursePCC = $db->escapeString($_POST['ultimateCoursePCC']);
	$ultimateCourse2GunHG = $db->escapeString($_POST['ultimateCourse2GunHG']);
	$ultimateCourse2GunPRR = $db->escapeString($_POST['ultimateCourse2GunPRR']);
	$ultimateCourse2GunSG = $db->escapeString($_POST['ultimateCourse2GunSG']);
	$ultimateCourse2GunPCC = $db->escapeString($_POST['ultimateCourse2GunPCC']);
	$ultimateCourse2GunSSR = $db->escapeString($_POST['ultimateCourse2GunSSR']);
	$ultimateCourse3GunHG = $db->escapeString($_POST['ultimateCourse3GunHG']);
	$ultimateCourse3GunPRR = $db->escapeString($_POST['ultimateCourse3GunPRR']);
	$ultimateCourse3GunSG = $db->escapeString($_POST['ultimateCourse3GunSG']);
	$ultimateCourse3GunPCC = $db->escapeString($_POST['ultimateCourse3GunPCC']);
	$ultimateCourse3GunSSR = $db->escapeString($_POST['ultimateCourse3GunSSR']);
	$noOfStagesCourseHandgun = $db->escapeString($_POST['noOfStagesCourseHandgun']);
	$noOfStagesCoursePRR = $db->escapeString($_POST['noOfStagesCoursePRR']);
	$noOfStagesCourseShotgun = $db->escapeString($_POST['noOfStagesCourseShotgun']);
	$noOfStagesCoursePCC = $db->escapeString($_POST['noOfStagesCoursePCC']);
	$noOfStagesCourse2GunHG = $db->escapeString($_POST['noOfStagesCourse2GunHG']);
	$noOfStagesCourse2GunPRR = $db->escapeString($_POST['noOfStagesCourse2GunPRR']);
	$noOfStagesCourse2GunSG = $db->escapeString($_POST['noOfStagesCourse2GunSG']);
	$noOfStagesCourse2GunPCC = $db->escapeString($_POST['noOfStagesCourse2GunPCC']);
	$noOfStagesCourse2GunSSR = $db->escapeString($_POST['noOfStagesCourse2GunSSR']);
	$noOfStagesCourse3GunHG = $db->escapeString($_POST['noOfStagesCourse3GunHG']);
	$noOfStagesCourse3GunPRR = $db->escapeString($_POST['noOfStagesCourse3GunPRR']);
	$noOfStagesCourse3GunSG = $db->escapeString($_POST['noOfStagesCourse3GunSG']);
	$noOfStagesCourse3GunPCC = $db->escapeString($_POST['noOfStagesCourse3GunPCC']);
	$noOfStagesCourse3GunSSR = $db->escapeString($_POST['noOfStagesCourse3GunSSR']);
	$matchAdministrator = $db->escapeString($_POST['matchAdministrator']);
	$matchAdministratorContactNumber = $db->escapeString($_POST['matchAdministratorContactNumber']);
	$matchMaster = $db->escapeString($_POST['matchMaster']);
	$matchMasterContactNumber = $db->escapeString($_POST['matchMasterContactNumber']);
	$chiefScoreProcOff = $db->escapeString($_POST['chiefScoreProcOff']);
	$chiefScoreProcOffContactNumber = $db->escapeString($_POST['chiefScoreProcOffContactNumber']);
	$contactPerson = $db->escapeString($_POST['contactPerson']);
	$contactPersonContactNumber = $db->escapeString($_POST['contactPersonContactNumber']);
	$nameOfGunClubPresident = $db->escapeString($_POST['nameOfGunClubPresident']);
	$nameOfGunClubPresidentContactNumber = $db->escapeString($_POST['nameOfGunClubPresidentContactNumber']);
	$nameOfMatchOrganizer = $db->escapeString($_POST['nameOfMatchOrganizer']);
	$nameOfMatchOrganizerContactNumber = $db->escapeString($_POST['nameOfMatchOrganizerContactNumber']);
	

	$db->insert('match_sanctioning_table',
	array(
		'dateOfFiling'=>$dateOfFiling,
		'nameOfMatch'=>$nameOfMatch,
		'shootingRangeAddress'=>$shootingRangeAddress,
		'dateOfMatch'=>$dateOfMatch,
		'level'=>$level,
		'zone'=>$zone,
		'district'=>$district,
		'hostGunClub'=>$hostGunClub,
		'shootingFormat'=>$shootingFormat,
		'levelHandgun'=>$levelHandgun,
		'levelPRR'=>$levelPRR,
		'levelShoutgun'=>$levelShoutgun,
		'levelPCC'=>$levelPCC,
		'level2GunHG'=>$level2GunHG,
		'level2GunPRR'=>$level2GunPRR,
		'level2GunSG'=>$level2GunSG,
		'level2GunPCC'=>$level2GunPCC,
		'level2GunSSR'=>$level2GunSSR,
		'level3GunHG'=>$level3GunHG,
		'level3GunPRR'=>$level3GunPRR,
		'level3GunSG'=>$level3GunSG,
		'level3GunPCC'=>$level3GunPCC,
		'level3GunSSR'=>$level3GunSSR,
		'speedCourseHandgun'=>$speedCourseHandgun,
		'speedCoursePRR'=>$speedCoursePRR,
		'speedCourseShotgun'=>$speedCourseShotgun,
		'speedCoursePCC'=>$speedCoursePCC,
		'speedCourse2GunHG'=>$speedCourse2GunHG,
		'speedCourse2GunPRR'=>$speedCourse2GunPRR,
		'speedCourse2GunSG'=>$speedCourse2GunSG,
		'speedCourse2GunPCC'=>$speedCourse2GunPCC,
		'speedCourse2GunSSR'=>$speedCourse2GunSSR,
		'speedCourse3GunHG'=>$speedCourse3GunHG,
		'speedCourse3GunPRR'=>$speedCourse3GunPRR,
		'speedCourse3GunSG'=>$speedCourse3GunSG,
		'speedCourse3GunPCC'=>$speedCourse3GunPCC,
		'speedCourse3GunSSR'=>$speedCourse3GunSSR,
		'intermediateCourseHandgun'=>$intermediateCourseHandgun,
		'intermediateCoursePRR'=>$intermediateCoursePRR,
		'intermediateCourseShotgun'=>$intermediateCourseShotgun,
		'intermediateCoursePCC'=>$intermediateCoursePCC,
		'intermediateCourse2GunHG'=>$intermediateCourse2GunHG,
		'intermediateCourse2GunPRR'=>$intermediateCourse2GunPRR,
		'intermediateCourse2GunSG'=>$intermediateCourse2GunSG,
		'intermediateCourse2GunPCC'=>$intermediateCourse2GunPCC,
		'intermediateCourse2GunSSR'=>$intermediateCourse2GunSSR,
		'intermediateCourse3GunHG'=>$intermediateCourse3GunHG,
		'intermediateCourse3GunPRR'=>$intermediateCourse3GunPRR,
		'intermediateCourse3GunSG'=>$intermediateCourse3GunSG,
		'intermediateCourse3GunPCC'=>$intermediateCourse3GunPCC,
		'intermediateCourse3GunSSR'=>$intermediateCourse3GunSSR,
		'ultimateCourseHandgun'=>$ultimateCourseHandgun,
		'ultimateCoursePRR'=>$ultimateCoursePRR,
		'ultimateCourseShotgun'=>$ultimateCourseShotgun,
		'ultimateCoursePCC'=>$ultimateCoursePCC,
		'ultimateCourse2GunHG'=>$ultimateCourse2GunHG,
		'ultimateCourse2GunPRR'=>$ultimateCourse2GunPRR,
		'ultimateCourse2GunSG'=>$ultimateCourse2GunSG,
		'ultimateCourse2GunPCC'=>$ultimateCourse2GunPCC,
		'ultimateCourse2GunSSR'=>$ultimateCourse2GunSSR,
		'ultimateCourse3GunHG'=>$ultimateCourse3GunHG,
		'ultimateCourse3GunPRR'=>$ultimateCourse3GunPRR,
		'ultimateCourse3GunSG'=>$ultimateCourse3GunSG,
		'ultimateCourse3GunPCC'=>$ultimateCourse3GunPCC,
		'ultimateCourse3GunSSR'=>$ultimateCourse3GunSSR,
		'noOfStagesCourseHandgun'=>$noOfStagesCourseHandgun,
		'noOfStagesCoursePRR'=>$noOfStagesCoursePRR,
		'noOfStagesCourseShotgun'=>$noOfStagesCourseShotgun,
		'noOfStagesCoursePCC'=>$noOfStagesCoursePCC,
		'noOfStagesCourse2GunHG'=>$noOfStagesCourse2GunHG,
		'noOfStagesCourse2GunPRR'=>$noOfStagesCourse2GunPRR,
		'noOfStagesCourse2GunSG'=>$noOfStagesCourse2GunSG,
		'noOfStagesCourse2GunPCC'=>$noOfStagesCourse2GunPCC,
		'noOfStagesCourse2GunSSR'=>$noOfStagesCourse2GunSSR,
		'noOfStagesCourse3GunHG'=>$noOfStagesCourse3GunHG,
		'noOfStagesCourse3GunPRR'=>$noOfStagesCourse3GunPRR,
		'noOfStagesCourse3GunSG'=>$noOfStagesCourse3GunSG,
		'noOfStagesCourse3GunPCC'=>$noOfStagesCourse3GunPCC,
		'noOfStagesCourse3GunSSR'=>$noOfStagesCourse3GunSSR,
		'matchAdministrator'=>$matchAdministrator,
		'matchAdministratorContactNumber'=>$matchAdministratorContactNumber,
		'matchMaster'=>$matchMaster,
		'matchMasterContactNumber'=>$matchMasterContactNumber,
		'chiefScoreProcOff'=>$chiefScoreProcOff,
		'chiefScoreProcOffContactNumber'=>$chiefScoreProcOffContactNumber,
		'contactPerson'=>$contactPerson,
		'contactPersonContactNumber'=>$contactPersonContactNumber,
		'nameOfGunClubPresident'=>$nameOfGunClubPresident,
		'nameOfGunClubPresidentContactNumber'=>$nameOfGunClubPresidentContactNumber,
		'nameOfMatchOrganizer'=>$nameOfMatchOrganizer,
		'nameOfMatchOrganizerContactNumber'=>$nameOfMatchOrganizerContactNumber,

		)
	);

	$res = $db->getResult();

	header("Location: add-match-sanctioning.php");
	$_SESSION['toast'] = 'add-match-sanctioning';
}


if (isset($_GET['from']) and $_GET['from'] == 'edit-match-sanctioning') {

	$dateOfFiling = $db->escapeString($_POST['dateOfFiling']);
	$nameOfMatch = $db->escapeString($_POST['nameOfMatch']);
	$shootingRangeAddress = $db->escapeString($_POST['shootingRangeAddress']);
	$dateOfMatch = $db->escapeString($_POST['dateOfMatch']);
	$level = $db->escapeString($_POST['level']);
	$zone = $db->escapeString($_POST['zone']);
	$district = $db->escapeString($_POST['district']);
	$hostGunClub = $db->escapeString($_POST['hostGunClub']);
	$shootingFormat = $db->escapeString($_POST['shootingFormat']);
	$levelHandgun = $db->escapeString($_POST['levelHandgun']);
	$levelPRR = $db->escapeString($_POST['levelPRR']);
	$levelShoutgun = $db->escapeString($_POST['levelShoutgun']);
	$levelPCC = $db->escapeString($_POST['levelPCC']);
	$level2GunHG = $db->escapeString($_POST['level2GunHG']);
	$level2GunPRR = $db->escapeString($_POST['level2GunPRR']);
	$level2GunSG = $db->escapeString($_POST['level2GunSG']);
	$level2GunPCC = $db->escapeString($_POST['level2GunPCC']);
	$level2GunSSR = $db->escapeString($_POST['level2GunSSR']);
	$level3GunHG = $db->escapeString($_POST['level3GunHG']);
	$level3GunPRR = $db->escapeString($_POST['level3GunPRR']);
	$level3GunSG = $db->escapeString($_POST['level3GunSG']);
	$level3GunPCC = $db->escapeString($_POST['level3GunPCC']);
	$level3GunSSR = $db->escapeString($_POST['level3GunSSR']);
	$speedCourseHandgun = $db->escapeString($_POST['speedCourseHandgun']);
	$speedCoursePRR = $db->escapeString($_POST['speedCoursePRR']);
	$speedCourseShotgun = $db->escapeString($_POST['speedCourseShotgun']);
	$speedCoursePCC = $db->escapeString($_POST['speedCoursePCC']);
	$speedCourse2GunHG = $db->escapeString($_POST['speedCourse2GunHG']);
	$speedCourse2GunPRR = $db->escapeString($_POST['speedCourse2GunPRR']);
	$speedCourse2GunSG = $db->escapeString($_POST['speedCourse2GunSG']);
	$speedCourse2GunPCC = $db->escapeString($_POST['speedCourse2GunPCC']);
	$speedCourse2GunSSR = $db->escapeString($_POST['speedCourse2GunSSR']);
	$speedCourse3GunHG = $db->escapeString($_POST['speedCourse3GunHG']);
	$speedCourse3GunPRR = $db->escapeString($_POST['speedCourse3GunPRR']);
	$speedCourse3GunSG = $db->escapeString($_POST['speedCourse3GunSG']);
	$speedCourse3GunPCC = $db->escapeString($_POST['speedCourse3GunPCC']);
	$speedCourse3GunSSR = $db->escapeString($_POST['speedCourse3GunSSR']);
	$intermediateCourseHandgun = $db->escapeString($_POST['intermediateCourseHandgun']);
	$intermediateCoursePRR = $db->escapeString($_POST['intermediateCoursePRR']);
	$intermediateCourseShotgun = $db->escapeString($_POST['intermediateCourseShotgun']);
	$intermediateCoursePCC = $db->escapeString($_POST['intermediateCoursePCC']);
	$intermediateCourse2GunHG = $db->escapeString($_POST['intermediateCourse2GunHG']);
	$intermediateCourse2GunPRR = $db->escapeString($_POST['intermediateCourse2GunPRR']);
	$intermediateCourse2GunSG = $db->escapeString($_POST['intermediateCourse2GunSG']);
	$intermediateCourse2GunPCC = $db->escapeString($_POST['intermediateCourse2GunPCC']);
	$intermediateCourse2GunSSR = $db->escapeString($_POST['intermediateCourse2GunSSR']);
	$intermediateCourse3GunHG = $db->escapeString($_POST['intermediateCourse3GunHG']);
	$intermediateCourse3GunPRR = $db->escapeString($_POST['intermediateCourse3GunPRR']);
	$intermediateCourse3GunSG = $db->escapeString($_POST['intermediateCourse3GunSG']);
	$intermediateCourse3GunPCC = $db->escapeString($_POST['intermediateCourse3GunPCC']);
	$intermediateCourse3GunSSR = $db->escapeString($_POST['intermediateCourse3GunSSR']);
	$ultimateCourseHandgun = $db->escapeString($_POST['ultimateCourseHandgun']);
	$ultimateCoursePRR = $db->escapeString($_POST['ultimateCoursePRR']);
	$ultimateCourseShotgun = $db->escapeString($_POST['ultimateCourseShotgun']);
	$ultimateCoursePCC = $db->escapeString($_POST['ultimateCoursePCC']);
	$ultimateCourse2GunHG = $db->escapeString($_POST['ultimateCourse2GunHG']);
	$ultimateCourse2GunPRR = $db->escapeString($_POST['ultimateCourse2GunPRR']);
	$ultimateCourse2GunSG = $db->escapeString($_POST['ultimateCourse2GunSG']);
	$ultimateCourse2GunPCC = $db->escapeString($_POST['ultimateCourse2GunPCC']);
	$ultimateCourse2GunSSR = $db->escapeString($_POST['ultimateCourse2GunSSR']);
	$ultimateCourse3GunHG = $db->escapeString($_POST['ultimateCourse3GunHG']);
	$ultimateCourse3GunPRR = $db->escapeString($_POST['ultimateCourse3GunPRR']);
	$ultimateCourse3GunSG = $db->escapeString($_POST['ultimateCourse3GunSG']);
	$ultimateCourse3GunPCC = $db->escapeString($_POST['ultimateCourse3GunPCC']);
	$ultimateCourse3GunSSR = $db->escapeString($_POST['ultimateCourse3GunSSR']);
	$noOfStagesCourseHandgun = $db->escapeString($_POST['noOfStagesCourseHandgun']);
	$noOfStagesCoursePRR = $db->escapeString($_POST['noOfStagesCoursePRR']);
	$noOfStagesCourseShotgun = $db->escapeString($_POST['noOfStagesCourseShotgun']);
	$noOfStagesCoursePCC = $db->escapeString($_POST['noOfStagesCoursePCC']);
	$noOfStagesCourse2GunHG = $db->escapeString($_POST['noOfStagesCourse2GunHG']);
	$noOfStagesCourse2GunPRR = $db->escapeString($_POST['noOfStagesCourse2GunPRR']);
	$noOfStagesCourse2GunSG = $db->escapeString($_POST['noOfStagesCourse2GunSG']);
	$noOfStagesCourse2GunPCC = $db->escapeString($_POST['noOfStagesCourse2GunPCC']);
	$noOfStagesCourse2GunSSR = $db->escapeString($_POST['noOfStagesCourse2GunSSR']);
	$noOfStagesCourse3GunHG = $db->escapeString($_POST['noOfStagesCourse3GunHG']);
	$noOfStagesCourse3GunPRR = $db->escapeString($_POST['noOfStagesCourse3GunPRR']);
	$noOfStagesCourse3GunSG = $db->escapeString($_POST['noOfStagesCourse3GunSG']);
	$noOfStagesCourse3GunPCC = $db->escapeString($_POST['noOfStagesCourse3GunPCC']);
	$noOfStagesCourse3GunSSR = $db->escapeString($_POST['noOfStagesCourse3GunSSR']);
	$matchAdministrator = $db->escapeString($_POST['matchAdministrator']);
	$matchAdministratorContactNumber = $db->escapeString($_POST['matchAdministratorContactNumber']);
	$matchMaster = $db->escapeString($_POST['matchMaster']);
	$matchMasterContactNumber = $db->escapeString($_POST['matchMasterContactNumber']);
	$chiefScoreProcOff = $db->escapeString($_POST['chiefScoreProcOff']);
	$chiefScoreProcOffContactNumber = $db->escapeString($_POST['chiefScoreProcOffContactNumber']);
	$contactPerson = $db->escapeString($_POST['contactPerson']);
	$contactPersonContactNumber = $db->escapeString($_POST['contactPersonContactNumber']);
	$nameOfGunClubPresident = $db->escapeString($_POST['nameOfGunClubPresident']);
	$nameOfGunClubPresidentContactNumber = $db->escapeString($_POST['nameOfGunClubPresidentContactNumber']);
	$nameOfMatchOrganizer = $db->escapeString($_POST['nameOfMatchOrganizer']);
	$nameOfMatchOrganizerContactNumber = $db->escapeString($_POST['nameOfMatchOrganizerContactNumber']);
	

	$db->update('match_sanctioning_table',
	array(
		'dateOfFiling'=>$dateOfFiling,
		'nameOfMatch'=>$nameOfMatch,
		'shootingRangeAddress'=>$shootingRangeAddress,
		'dateOfMatch'=>$dateOfMatch,
		'level'=>$level,
		'zone'=>$zone,
		'district'=>$district,
		'hostGunClub'=>$hostGunClub,
		'shootingFormat'=>$shootingFormat,
		'levelHandgun'=>$levelHandgun,
		'levelPRR'=>$levelPRR,
		'levelShoutgun'=>$levelShoutgun,
		'levelPCC'=>$levelPCC,
		'level2GunHG'=>$level2GunHG,
		'level2GunPRR'=>$level2GunPRR,
		'level2GunSG'=>$level2GunSG,
		'level2GunPCC'=>$level2GunPCC,
		'level2GunSSR'=>$level2GunSSR,
		'level3GunHG'=>$level3GunHG,
		'level3GunPRR'=>$level3GunPRR,
		'level3GunSG'=>$level3GunSG,
		'level3GunPCC'=>$level3GunPCC,
		'level3GunSSR'=>$level3GunSSR,
		'speedCourseHandgun'=>$speedCourseHandgun,
		'speedCoursePRR'=>$speedCoursePRR,
		'speedCourseShotgun'=>$speedCourseShotgun,
		'speedCoursePCC'=>$speedCoursePCC,
		'speedCourse2GunHG'=>$speedCourse2GunHG,
		'speedCourse2GunPRR'=>$speedCourse2GunPRR,
		'speedCourse2GunSG'=>$speedCourse2GunSG,
		'speedCourse2GunPCC'=>$speedCourse2GunPCC,
		'speedCourse2GunSSR'=>$speedCourse2GunSSR,
		'speedCourse3GunHG'=>$speedCourse3GunHG,
		'speedCourse3GunPRR'=>$speedCourse3GunPRR,
		'speedCourse3GunSG'=>$speedCourse3GunSG,
		'speedCourse3GunPCC'=>$speedCourse3GunPCC,
		'speedCourse3GunSSR'=>$speedCourse3GunSSR,
		'intermediateCourseHandgun'=>$intermediateCourseHandgun,
		'intermediateCoursePRR'=>$intermediateCoursePRR,
		'intermediateCourseShotgun'=>$intermediateCourseShotgun,
		'intermediateCoursePCC'=>$intermediateCoursePCC,
		'intermediateCourse2GunHG'=>$intermediateCourse2GunHG,
		'intermediateCourse2GunPRR'=>$intermediateCourse2GunPRR,
		'intermediateCourse2GunSG'=>$intermediateCourse2GunSG,
		'intermediateCourse2GunPCC'=>$intermediateCourse2GunPCC,
		'intermediateCourse2GunSSR'=>$intermediateCourse2GunSSR,
		'intermediateCourse3GunHG'=>$intermediateCourse3GunHG,
		'intermediateCourse3GunPRR'=>$intermediateCourse3GunPRR,
		'intermediateCourse3GunSG'=>$intermediateCourse3GunSG,
		'intermediateCourse3GunPCC'=>$intermediateCourse3GunPCC,
		'intermediateCourse3GunSSR'=>$intermediateCourse3GunSSR,
		'ultimateCourseHandgun'=>$ultimateCourseHandgun,
		'ultimateCoursePRR'=>$ultimateCoursePRR,
		'ultimateCourseShotgun'=>$ultimateCourseShotgun,
		'ultimateCoursePCC'=>$ultimateCoursePCC,
		'ultimateCourse2GunHG'=>$ultimateCourse2GunHG,
		'ultimateCourse2GunPRR'=>$ultimateCourse2GunPRR,
		'ultimateCourse2GunSG'=>$ultimateCourse2GunSG,
		'ultimateCourse2GunPCC'=>$ultimateCourse2GunPCC,
		'ultimateCourse2GunSSR'=>$ultimateCourse2GunSSR,
		'ultimateCourse3GunHG'=>$ultimateCourse3GunHG,
		'ultimateCourse3GunPRR'=>$ultimateCourse3GunPRR,
		'ultimateCourse3GunSG'=>$ultimateCourse3GunSG,
		'ultimateCourse3GunPCC'=>$ultimateCourse3GunPCC,
		'ultimateCourse3GunSSR'=>$ultimateCourse3GunSSR,
		'noOfStagesCourseHandgun'=>$noOfStagesCourseHandgun,
		'noOfStagesCoursePRR'=>$noOfStagesCoursePRR,
		'noOfStagesCourseShotgun'=>$noOfStagesCourseShotgun,
		'noOfStagesCoursePCC'=>$noOfStagesCoursePCC,
		'noOfStagesCourse2GunHG'=>$noOfStagesCourse2GunHG,
		'noOfStagesCourse2GunPRR'=>$noOfStagesCourse2GunPRR,
		'noOfStagesCourse2GunSG'=>$noOfStagesCourse2GunSG,
		'noOfStagesCourse2GunPCC'=>$noOfStagesCourse2GunPCC,
		'noOfStagesCourse2GunSSR'=>$noOfStagesCourse2GunSSR,
		'noOfStagesCourse3GunHG'=>$noOfStagesCourse3GunHG,
		'noOfStagesCourse3GunPRR'=>$noOfStagesCourse3GunPRR,
		'noOfStagesCourse3GunSG'=>$noOfStagesCourse3GunSG,
		'noOfStagesCourse3GunPCC'=>$noOfStagesCourse3GunPCC,
		'noOfStagesCourse3GunSSR'=>$noOfStagesCourse3GunSSR,
		'matchAdministrator'=>$matchAdministrator,
		'matchAdministratorContactNumber'=>$matchAdministratorContactNumber,
		'matchMaster'=>$matchMaster,
		'matchMasterContactNumber'=>$matchMasterContactNumber,
		'chiefScoreProcOff'=>$chiefScoreProcOff,
		'chiefScoreProcOffContactNumber'=>$chiefScoreProcOffContactNumber,
		'contactPerson'=>$contactPerson,
		'contactPersonContactNumber'=>$contactPersonContactNumber,
		'nameOfGunClubPresident'=>$nameOfGunClubPresident,
		'nameOfGunClubPresidentContactNumber'=>$nameOfGunClubPresidentContactNumber,
		'nameOfMatchOrganizer'=>$nameOfMatchOrganizer,
		'nameOfMatchOrganizerContactNumber'=>$nameOfMatchOrganizerContactNumber,

		),
		'matchSanctioningId=' . $_POST['matchSanctioningId']
	);

	$res = $db->getResult();

	header("Location: edit-match-sanctioning.php?matchSanctioningId=".$_POST['matchSanctioningId']."");
	$_SESSION['toast'] = 'edit-match-sanctioning';
}

if (isset($_GET['from']) and $_GET['from'] == 'delete-match-sanctioning') {

	$db->delete('match_sanctioning_table','matchSanctioningId=' . $_GET['matchSanctioningId']);
	$res = $db->getResult();
	header("Location: all-match-sanctioning.php");
	$_SESSION['toast'] = 'delete-match-sanctioning';
}

if (isset($_GET['from']) and $_GET['from'] == 'add-gun-club-affiliation') {

	$nameOfGunClub = $db->escapeString($_POST['nameOfGunClub']);
	$officeAddress = $db->escapeString($_POST['officeAddress']);
	$firingRangeLocation = $db->escapeString($_POST['firingRangeLocation']);
	$landlineNo = $db->escapeString($_POST['landlineNo']);
	$mobileNo = $db->escapeString($_POST['mobileNo']);
	$contactPerson = $db->escapeString($_POST['contactPerson']);
	$emailAddress = $db->escapeString($_POST['emailAddress']);
	$secRegistrationNo = $db->escapeString($_POST['secRegistrationNo']);
	$nameOfGunClubSecretary = $db->escapeString($_POST['nameOfGunClubSecretary']);
	$nameOfGunClubPresident = $db->escapeString($_POST['nameOfGunClubPresident']);
	$psmocDistrictManager = $db->escapeString($_POST['psmocDistrictManager']);
	$psmocZoneDirector = $db->escapeString($_POST['psmocZoneDirector']);
	$psmocSecretary = $db->escapeString($_POST['psmocSecretary']);
	$psmocPresident = $db->escapeString($_POST['psmocPresident']);



	$db->insert('gun_club_affiliation_table',
	array(
		'nameOfGunClub'=>$nameOfGunClub,
		'officeAddress'=>$officeAddress,
		'firingRangeLocation'=>$firingRangeLocation,
		'landlineNo'=>$landlineNo,
		'mobileNo'=>$mobileNo,
		'contactPerson'=>$contactPerson,
		'emailAddress'=>$emailAddress,
		'secRegistrationNo'=>$secRegistrationNo,
		'nameOfGunClubSecretary'=>$nameOfGunClubSecretary,
		'nameOfGunClubPresident'=>$nameOfGunClubPresident,
		'psmocDistrictManager'=>$psmocDistrictManager,
		'psmocZoneDirector'=>$psmocZoneDirector,
		'psmocSecretary'=>$psmocSecretary,
		'psmocPresident'=>$psmocPresident,


		)
	);

	$res = $db->getResult();

	header("Location: add-gun-club-affiliation.php");
	$_SESSION['toast'] = 'add-gun-club-affiliation';
}

if (isset($_GET['from']) and $_GET['from'] == 'edit-gun-club-affiliation') {

	$nameOfGunClub = $db->escapeString($_POST['nameOfGunClub']);
	$officeAddress = $db->escapeString($_POST['officeAddress']);
	$firingRangeLocation = $db->escapeString($_POST['firingRangeLocation']);
	$landlineNo = $db->escapeString($_POST['landlineNo']);
	$mobileNo = $db->escapeString($_POST['mobileNo']);
	$contactPerson = $db->escapeString($_POST['contactPerson']);
	$emailAddress = $db->escapeString($_POST['emailAddress']);
	$secRegistrationNo = $db->escapeString($_POST['secRegistrationNo']);
	$nameOfGunClubSecretary = $db->escapeString($_POST['nameOfGunClubSecretary']);
	$nameOfGunClubPresident = $db->escapeString($_POST['nameOfGunClubPresident']);
	$psmocDistrictManager = $db->escapeString($_POST['psmocDistrictManager']);
	$psmocZoneDirector = $db->escapeString($_POST['psmocZoneDirector']);
	$psmocSecretary = $db->escapeString($_POST['psmocSecretary']);
	$psmocPresident = $db->escapeString($_POST['psmocPresident']);



	$db->update('gun_club_affiliation_table',
	array(
		'nameOfGunClub'=>$nameOfGunClub,
		'officeAddress'=>$officeAddress,
		'firingRangeLocation'=>$firingRangeLocation,
		'landlineNo'=>$landlineNo,
		'mobileNo'=>$mobileNo,
		'contactPerson'=>$contactPerson,
		'emailAddress'=>$emailAddress,
		'secRegistrationNo'=>$secRegistrationNo,
		'nameOfGunClubSecretary'=>$nameOfGunClubSecretary,
		'nameOfGunClubPresident'=>$nameOfGunClubPresident,
		'psmocDistrictManager'=>$psmocDistrictManager,
		'psmocZoneDirector'=>$psmocZoneDirector,
		'psmocSecretary'=>$psmocSecretary,
		'psmocPresident'=>$psmocPresident,
		),
			'gunClubAffiliationId=' . $_POST['gunClubAffiliationId']
	);

	$res = $db->getResult();

	header("Location: edit-gun-club-affiliation.php?gunClubAffiliationId=".$_POST['gunClubAffiliationId']."");
	$_SESSION['toast'] = 'edit-gun-club-affiliation';
}

if (isset($_GET['from']) and $_GET['from'] == 'delete-gun-club-affiliation') {

	$db->delete('gun_club_affiliation_table','gunClubAffiliationId=' . $_GET['gunClubAffiliationId']);
	$res = $db->getResult();
	header("Location: all-gun-club-affiliation.php");
	$_SESSION['toast'] = 'delete-gun-club-affiliation';
}

if (isset($_GET['from']) and $_GET['from'] == 'add-match-remittance-sanctioning') {

	$district = $db->escapeString($_POST['district']);
	$nameOfMatch = $db->escapeString($_POST['nameOfMatch']);
	$hostClub = $db->escapeString($_POST['hostClub']);
	$venue = $db->escapeString($_POST['venue']);
	$inclusiveDates = $db->escapeString($_POST['inclusiveDates']);
	$matchLevel = $db->escapeString($_POST['matchLevel']);
	$matchAdministrator = $db->escapeString($_POST['matchAdministrator']);
	$matchMaster = $db->escapeString($_POST['matchMaster']);
	$regularShootersParticipant = $db->escapeString($_POST['regularShootersParticipant']);
	$regularShootersFee = $db->escapeString($_POST['regularShootersFee']);
	$regularShootersAmountDue = $db->escapeString($_POST['regularShootersAmountDue']);
	$juniorAndSuperSenior = $db->escapeString($_POST['juniorAndSuperSenior']);
	$lawmanPnp = $db->escapeString($_POST['lawmanPnp']);
	$lawmanUniformPnp = $db->escapeString($_POST['lawmanUniformPnp']);
	$matchOfficialOfficiating = $db->escapeString($_POST['matchOfficialOfficiating']);
	$totalParticipant = $db->escapeString($_POST['totalParticipant']);
	$totalSanctionFee = $db->escapeString($_POST['totalSanctionFee']);
	$bankCheckNo = $db->escapeString($_POST['bankCheckNo']);
	$amount = $db->escapeString($_POST['amount']);
	$orPr = $db->escapeString($_POST['orPr']);
	$recievedBy = $db->escapeString($_POST['recievedBy']);
	$submittedByMatchMaster = $db->escapeString($_POST['submittedByMatchMaster']);
	$approvedByDistrictManager = $db->escapeString($_POST['approvedByDistrictManager']);





	$db->insert('match_remittance_sanctioning_table',
	array(
		'district'=>$district,
		'nameOfMatch'=>$nameOfMatch,
		'hostClub'=>$hostClub,
		'venue'=>$venue,
		'inclusiveDates'=>$inclusiveDates,
		'matchLevel'=>$matchLevel,
		'matchAdministrator'=>$matchAdministrator,
		'matchMaster'=>$matchMaster,
		'regularShootersParticipant'=>$regularShootersParticipant,
		'regularShootersFee'=>$regularShootersFee,
		'regularShootersAmountDue'=>$regularShootersAmountDue,
		'juniorAndSuperSenior'=>$juniorAndSuperSenior,
		'lawmanPnp'=>$lawmanPnp,
		'lawmanUniformPnp'=>$lawmanUniformPnp,
		'matchOfficialOfficiating'=>$matchOfficialOfficiating,
		'totalParticipant'=>$totalParticipant,
		'totalSanctionFee'=>$totalSanctionFee,
		'bankCheckNo'=>$bankCheckNo,
		'amount'=>$amount,
		'orPr'=>$orPr,
		'recievedBy'=>$recievedBy,
		'submittedByMatchMaster'=>$submittedByMatchMaster,
		'approvedByDistrictManager'=>$approvedByDistrictManager,

		)
	);

	$res = $db->getResult();

	header("Location: add-match-remittance-sanctioning.php");
	$_SESSION['toast'] = 'add-match-remittance-sanctioning';
}

if (isset($_GET['from']) and $_GET['from'] == 'edit-match-remittance-sanctioning') {

	$district = $db->escapeString($_POST['district']);
	$nameOfMatch = $db->escapeString($_POST['nameOfMatch']);
	$hostClub = $db->escapeString($_POST['hostClub']);
	$venue = $db->escapeString($_POST['venue']);
	$inclusiveDates = $db->escapeString($_POST['inclusiveDates']);
	$matchLevel = $db->escapeString($_POST['matchLevel']);
	$matchAdministrator = $db->escapeString($_POST['matchAdministrator']);
	$matchMaster = $db->escapeString($_POST['matchMaster']);
	$regularShootersParticipant = $db->escapeString($_POST['regularShootersParticipant']);
	$regularShootersFee = $db->escapeString($_POST['regularShootersFee']);
	$regularShootersAmountDue = $db->escapeString($_POST['regularShootersAmountDue']);
	$juniorAndSuperSenior = $db->escapeString($_POST['juniorAndSuperSenior']);
	$lawmanPnp = $db->escapeString($_POST['lawmanPnp']);
	$lawmanUniformPnp = $db->escapeString($_POST['lawmanUniformPnp']);
	$matchOfficialOfficiating = $db->escapeString($_POST['matchOfficialOfficiating']);
	$totalParticipant = $db->escapeString($_POST['totalParticipant']);
	$totalSanctionFee = $db->escapeString($_POST['totalSanctionFee']);
	$bankCheckNo = $db->escapeString($_POST['bankCheckNo']);
	$amount = $db->escapeString($_POST['amount']);
	$orPr = $db->escapeString($_POST['orPr']);
	$recievedBy = $db->escapeString($_POST['recievedBy']);
	$submittedByMatchMaster = $db->escapeString($_POST['submittedByMatchMaster']);
	$approvedByDistrictManager = $db->escapeString($_POST['approvedByDistrictManager']);





	$db->update('match_remittance_sanctioning_table',
	array(
		'district'=>$district,
		'nameOfMatch'=>$nameOfMatch,
		'hostClub'=>$hostClub,
		'venue'=>$venue,
		'inclusiveDates'=>$inclusiveDates,
		'matchLevel'=>$matchLevel,
		'matchAdministrator'=>$matchAdministrator,
		'matchMaster'=>$matchMaster,
		'regularShootersParticipant'=>$regularShootersParticipant,
		'regularShootersFee'=>$regularShootersFee,
		'regularShootersAmountDue'=>$regularShootersAmountDue,
		'juniorAndSuperSenior'=>$juniorAndSuperSenior,
		'lawmanPnp'=>$lawmanPnp,
		'lawmanUniformPnp'=>$lawmanUniformPnp,
		'matchOfficialOfficiating'=>$matchOfficialOfficiating,
		'totalParticipant'=>$totalParticipant,
		'totalSanctionFee'=>$totalSanctionFee,
		'bankCheckNo'=>$bankCheckNo,
		'amount'=>$amount,
		'orPr'=>$orPr,
		'recievedBy'=>$recievedBy,
		'submittedByMatchMaster'=>$submittedByMatchMaster,
		'approvedByDistrictManager'=>$approvedByDistrictManager,

		),
		'matchRemittanceSanctioningId=' . $_POST['matchRemittanceSanctioningId']
	);

	$res = $db->getResult();

	header("Location: edit-match-remittance-sanctioning.php?matchRemittanceSanctioningId=".$_POST['matchRemittanceSanctioningId']."");
	$_SESSION['toast'] = 'edit-match-remittance-sanctioning';
}


if (isset($_GET['from']) and $_GET['from'] == 'delete-match-remittance-sanctioning') {

	$db->delete('match_remittance_sanctioning_table','matchRemittanceSanctioningId=' . $_GET['matchRemittanceSanctioningId']);
	$res = $db->getResult();
	header("Location: all-match-remittance-sanctioning.php");
	$_SESSION['toast'] = 'delete-match-remittance-sanctioning';
}


if (isset($_GET['from']) and $_GET['from'] == 'add-membership') {

	$target_dir = "images/";

	// unlink($target_dir."test.txt"); //to delete file

	if (basename($_FILES["applicantSignature"]["name"]) == "") {
		echo "has no files";
		$applicantSignature = "";
	}
	else
	{
		$applicantSignature = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["applicantSignature"]["name"]);
		$imageFileType = strtolower(pathinfo($applicantSignature,PATHINFO_EXTENSION));
   		move_uploaded_file($_FILES["applicantSignature"]["tmp_name"], $applicantSignature);
	}

	if (basename($_FILES["whiteBackgroundPicture"]["name"]) == "") {
		echo "has no files";
		$whiteBackgroundPicture = "";
	}
	else
	{
		$whiteBackgroundPicture = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["whiteBackgroundPicture"]["name"]);
		$imageFileType = strtolower(pathinfo($whiteBackgroundPicture,PATHINFO_EXTENSION));
   		move_uploaded_file($_FILES["whiteBackgroundPicture"]["tmp_name"], $whiteBackgroundPicture);
	}



	$psmocOrmoo = $db->escapeString($_POST['psmocOrmoo']);
	$newOrRenewal = $db->escapeString($_POST['newOrRenewal']);
	$psmocId = $db->escapeString($_POST['psmocId']);
	$expiryDate = $db->escapeString($_POST['expiryDate']);
	$placeOfApplicationOrSeminarAndWorkShop = $db->escapeString($_POST['placeOfApplicationOrSeminarAndWorkShop']);
	$examScore = $db->escapeString($_POST['examScore']);
	$passedFailedIncomplete = $db->escapeString($_POST['passedFailedIncomplete']);
	$localTshirtSize = $db->escapeString($_POST['localTshirtSize']);
	$zone = $db->escapeString($_POST['zone']);
	$district = $db->escapeString($_POST['district']);
	$familyName = $db->escapeString($_POST['familyName']);
	$middleName = $db->escapeString($_POST['middleName']);
	$firstName = $db->escapeString($_POST['firstName']);
	$placeOfBirth = $db->escapeString($_POST['placeOfBirth']);
	$dateOfBirth = $db->escapeString($_POST['dateOfBirth']);
	$age = $db->escapeString($_POST['age']);
	$sex = $db->escapeString($_POST['sex']);
	$status = $db->escapeString($_POST['status']);
	$bloodType = $db->escapeString($_POST['bloodType']);
	$completeHomeAddress = $db->escapeString($_POST['completeHomeAddress']);
	$occupationOrPosition = $db->escapeString($_POST['occupationOrPosition']);
	$nameOfCompanyOrOrganiztion = $db->escapeString($_POST['nameOfCompanyOrOrganiztion']);
	$completeOfficeOrBusinessAddress = $db->escapeString($_POST['completeOfficeOrBusinessAddress']);
	$mobileLandlineNo = $db->escapeString($_POST['mobileLandlineNo']);
	$emailAddress = $db->escapeString($_POST['emailAddress']);
	$nameOfGunClub = $db->escapeString($_POST['nameOfGunClub']);
	$address = $db->escapeString($_POST['address']);
	$type = $db->escapeString($_POST['type']);
	$makeModel = $db->escapeString($_POST['makeModel']);
	$calibre = $db->escapeString($_POST['calibre']);
	$serialNumber = $db->escapeString($_POST['serialNumber']);
	$LIOPFNumber = $db->escapeString($_POST['LIOPFNumber']);
	$typeOfLicense = $db->escapeString($_POST['typeOfLicense']);
	$numberOfYearsAsAGunClubMember = $db->escapeString($_POST['numberOfYearsAsAGunClubMember']);
	$licensedShooter = $db->escapeString($_POST['licensedShooter']);
	$applicantSignature = $db->escapeString($applicantSignature);
	$whiteBackgroundPicture = $db->escapeString($whiteBackgroundPicture);
	$nameOfGunClubPresident = $db->escapeString($_POST['nameOfGunClubPresident']);
	$nameOfMOOInstructor = $db->escapeString($_POST['nameOfMOOInstructor']);


	$psmocSecretary = $db->escapeString($_POST['psmocSecretary']);
	$psmocPresident = $db->escapeString($_POST['psmocPresident']);

	$db->insert('membership_table',
	array(
		'psmocOrmoo'=>$psmocOrmoo,
		'newOrRenewal'=>$newOrRenewal,
		'psmocId'=>$psmocId,
		'expiryDate'=>$expiryDate,
		'placeOfApplicationOrSeminarAndWorkShop'=>$placeOfApplicationOrSeminarAndWorkShop,
		'examScore'=>$examScore,
		'passedFailedIncomplete'=>$passedFailedIncomplete,
		'localTshirtSize'=>$localTshirtSize,
		'zone'=>$zone,
		'district'=>$district,
		'familyName'=>$familyName,
		'middleName'=>$middleName,
		'firstName'=>$firstName,
		'placeOfBirth'=>$placeOfBirth,
		'dateOfBirth'=>$dateOfBirth,
		'age'=>$age,
		'sex'=>$sex,
		'status'=>$status,
		'bloodType'=>$bloodType,
		'completeHomeAddress'=>$completeHomeAddress,
		'occupationOrPosition'=>$occupationOrPosition,
		'nameOfCompanyOrOrganiztion'=>$nameOfCompanyOrOrganiztion,
		'completeOfficeOrBusinessAddress'=>$completeOfficeOrBusinessAddress,
		'mobileLandlineNo'=>$mobileLandlineNo,
		'emailAddress'=>$emailAddress,
		'nameOfGunClub'=>$nameOfGunClub,
		'address'=>$address,
		'type'=>$type,
		'makeModel'=>$makeModel,
		'calibre'=>$calibre,
		'serialNumber'=>$serialNumber,
		'LIOPFNumber'=>$LIOPFNumber,
		'typeOfLicense'=>$typeOfLicense,
		'numberOfYearsAsAGunClubMember'=>$numberOfYearsAsAGunClubMember,
		'licensedShooter'=>$licensedShooter,
		'nameOfGunClubPresident'=>$nameOfGunClubPresident,
		'nameOfMOOInstructor'=>$nameOfMOOInstructor,
		'applicantSignature'=>$applicantSignature,
		'whiteBackgroundPicture'=>$whiteBackgroundPicture,
		'psmocSecretary'=>$psmocSecretary,
		'psmocPresident'=>$psmocPresident,
	
		)
	);

	$res = $db->getResult();

	header("Location: add-membership.php");
	$_SESSION['toast'] = 'add-membership';
}


if (isset($_GET['from']) and $_GET['from'] == 'edit-membership') {

	$target_dir = "images/";

	

	if (basename($_FILES["applicantSignature"]["name"]) == "") {
		// echo "has no files";
		$applicantSignature = $db->escapeString($_POST['applicantSignature1']);;
	}
	else
	{
		unlink($_POST['applicantSignature1']); //to delete file
		$applicantSignature = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["applicantSignature"]["name"]);
		$imageFileType = strtolower(pathinfo($applicantSignature,PATHINFO_EXTENSION));
   		move_uploaded_file($_FILES["applicantSignature"]["tmp_name"], $applicantSignature);
	}

	if (basename($_FILES["whiteBackgroundPicture"]["name"]) == "") {
		// echo "has no files";
		$whiteBackgroundPicture = $db->escapeString($_POST['whiteBackgroundPicture1']);;
	}
	else
	{
		unlink($_POST['whiteBackgroundPicture1']); //to delete file
		$whiteBackgroundPicture = $target_dir . md5(date("Y-m-d H:i:s")) .basename($_FILES["whiteBackgroundPicture"]["name"]);
		$imageFileType = strtolower(pathinfo($whiteBackgroundPicture,PATHINFO_EXTENSION));
   		move_uploaded_file($_FILES["whiteBackgroundPicture"]["tmp_name"], $whiteBackgroundPicture);
	}



	$psmocOrmoo = $db->escapeString($_POST['psmocOrmoo']);
	$newOrRenewal = $db->escapeString($_POST['newOrRenewal']);
	$psmocId = $db->escapeString($_POST['psmocId']);
	$expiryDate = $db->escapeString($_POST['expiryDate']);
	$placeOfApplicationOrSeminarAndWorkShop = $db->escapeString($_POST['placeOfApplicationOrSeminarAndWorkShop']);
	$examScore = $db->escapeString($_POST['examScore']);
	$passedFailedIncomplete = $db->escapeString($_POST['passedFailedIncomplete']);
	$localTshirtSize = $db->escapeString($_POST['localTshirtSize']);
	$zone = $db->escapeString($_POST['zone']);
	$district = $db->escapeString($_POST['district']);
	$familyName = $db->escapeString($_POST['familyName']);
	$middleName = $db->escapeString($_POST['middleName']);
	$firstName = $db->escapeString($_POST['firstName']);
	$placeOfBirth = $db->escapeString($_POST['placeOfBirth']);
	$dateOfBirth = $db->escapeString($_POST['dateOfBirth']);
	$age = $db->escapeString($_POST['age']);
	$sex = $db->escapeString($_POST['sex']);
	$status = $db->escapeString($_POST['status']);
	$bloodType = $db->escapeString($_POST['bloodType']);
	$completeHomeAddress = $db->escapeString($_POST['completeHomeAddress']);
	$occupationOrPosition = $db->escapeString($_POST['occupationOrPosition']);
	$nameOfCompanyOrOrganiztion = $db->escapeString($_POST['nameOfCompanyOrOrganiztion']);
	$completeOfficeOrBusinessAddress = $db->escapeString($_POST['completeOfficeOrBusinessAddress']);
	$mobileLandlineNo = $db->escapeString($_POST['mobileLandlineNo']);
	$emailAddress = $db->escapeString($_POST['emailAddress']);
	$nameOfGunClub = $db->escapeString($_POST['nameOfGunClub']);
	$address = $db->escapeString($_POST['address']);
	$type = $db->escapeString($_POST['type']);
	$makeModel = $db->escapeString($_POST['makeModel']);
	$calibre = $db->escapeString($_POST['calibre']);
	$serialNumber = $db->escapeString($_POST['serialNumber']);
	$LIOPFNumber = $db->escapeString($_POST['LIOPFNumber']);
	$typeOfLicense = $db->escapeString($_POST['typeOfLicense']);
	$numberOfYearsAsAGunClubMember = $db->escapeString($_POST['numberOfYearsAsAGunClubMember']);
	$licensedShooter = $db->escapeString($_POST['licensedShooter']);
	$applicantSignature = $db->escapeString($applicantSignature);
	$whiteBackgroundPicture = $db->escapeString($whiteBackgroundPicture);
	$nameOfGunClubPresident = $db->escapeString($_POST['nameOfGunClubPresident']);
	$nameOfMOOInstructor = $db->escapeString($_POST['nameOfMOOInstructor']);


	$psmocSecretary = $db->escapeString($_POST['psmocSecretary']);
	$psmocPresident = $db->escapeString($_POST['psmocPresident']);

	$db->update('membership_table',
	array(
		'psmocOrmoo'=>$psmocOrmoo,
		'newOrRenewal'=>$newOrRenewal,
		'psmocId'=>$psmocId,
		'expiryDate'=>$expiryDate,
		'placeOfApplicationOrSeminarAndWorkShop'=>$placeOfApplicationOrSeminarAndWorkShop,
		'examScore'=>$examScore,
		'passedFailedIncomplete'=>$passedFailedIncomplete,
		'localTshirtSize'=>$localTshirtSize,
		'zone'=>$zone,
		'district'=>$district,
		'familyName'=>$familyName,
		'middleName'=>$middleName,
		'firstName'=>$firstName,
		'placeOfBirth'=>$placeOfBirth,
		'dateOfBirth'=>$dateOfBirth,
		'age'=>$age,
		'sex'=>$sex,
		'status'=>$status,
		'bloodType'=>$bloodType,
		'completeHomeAddress'=>$completeHomeAddress,
		'occupationOrPosition'=>$occupationOrPosition,
		'nameOfCompanyOrOrganiztion'=>$nameOfCompanyOrOrganiztion,
		'completeOfficeOrBusinessAddress'=>$completeOfficeOrBusinessAddress,
		'mobileLandlineNo'=>$mobileLandlineNo,
		'emailAddress'=>$emailAddress,
		'nameOfGunClub'=>$nameOfGunClub,
		'address'=>$address,
		'type'=>$type,
		'makeModel'=>$makeModel,
		'calibre'=>$calibre,
		'serialNumber'=>$serialNumber,
		'LIOPFNumber'=>$LIOPFNumber,
		'typeOfLicense'=>$typeOfLicense,
		'numberOfYearsAsAGunClubMember'=>$numberOfYearsAsAGunClubMember,
		'licensedShooter'=>$licensedShooter,
		'nameOfGunClubPresident'=>$nameOfGunClubPresident,
		'nameOfMOOInstructor'=>$nameOfMOOInstructor,
		'applicantSignature'=>$applicantSignature,
		'whiteBackgroundPicture'=>$whiteBackgroundPicture,
		'psmocSecretary'=>$psmocSecretary,
		'psmocPresident'=>$psmocPresident,
		),
			'membershipId=' . $_POST['membershipId']
	);

	$res = $db->getResult();

	header("Location: edit-membership.php?membershipId=".$_POST['membershipId']."");
	$_SESSION['toast'] = 'edit-membership';
}

if (isset($_GET['from']) and $_GET['from'] == 'delete-membership') {

	$db->select('membership_table','*',NULL,'membershipId = "' . $_GET['membershipId'] . '"', NULL); 
	$res = $db->getResult(); $res = $res[0];

	unlink($res['applicantSignature']);
	unlink($res['whiteBackgroundPicture']);

	$db->delete('membership_table','membershipId=' . $_GET['membershipId']);
	$res = $db->getResult();
	header("Location: all-membership.php");
	$_SESSION['toast'] = 'delete-membership';
}

if (isset($_GET['from']) and $_GET['from'] == 'add-match') {

	$psmocOrmoo = $db->escapeString($_POST['psmocOrmoo']);
	$shooterNo = $db->escapeString($_POST['shooterNo']);
	$shooterName = $db->escapeString($_POST['shooterName']);
	$stageNo = $db->escapeString($_POST['stageNo']);
	$ft1A = $db->escapeString($_POST['ft1A']);
	$ft1M = $db->escapeString($_POST['ft1M']);
	$ft1P = $db->escapeString($_POST['ft1P']);
	$ft1Comment = $db->escapeString($_POST['ft1Comment']);
	$ft2A = $db->escapeString($_POST['ft2A']);
	$ft2M = $db->escapeString($_POST['ft2M']);
	$ft2P = $db->escapeString($_POST['ft2P']);
	$ft2Comment = $db->escapeString($_POST['ft2Comment']);
	$ft3A = $db->escapeString($_POST['ft3A']);
	$ft3M = $db->escapeString($_POST['ft3M']);
	$ft3P = $db->escapeString($_POST['ft3P']);
	$ft3Comment = $db->escapeString($_POST['ft3Comment']);
	$ft4A = $db->escapeString($_POST['ft4A']);
	$ft4M = $db->escapeString($_POST['ft4M']);
	$ft4P = $db->escapeString($_POST['ft4P']);
	$ft4Comment = $db->escapeString($_POST['ft4Comment']);
	$ft5A = $db->escapeString($_POST['ft5A']);
	$ft5M = $db->escapeString($_POST['ft5M']);
	$ft5P = $db->escapeString($_POST['ft5P']);
	$ft5Comment = $db->escapeString($_POST['ft5Comment']);
	$ft6A = $db->escapeString($_POST['ft6A']);
	$ft6M = $db->escapeString($_POST['ft6M']);
	$ft6P = $db->escapeString($_POST['ft6P']);
	$ft6Comment = $db->escapeString($_POST['ft6Comment']);
	$ft7A = $db->escapeString($_POST['ft7A']);
	$ft7M = $db->escapeString($_POST['ft7M']);
	$ft7P = $db->escapeString($_POST['ft7P']);
	$ft7Comment = $db->escapeString($_POST['ft7Comment']);
	$ft8A = $db->escapeString($_POST['ft8A']);
	$ft8M = $db->escapeString($_POST['ft8M']);
	$ft8P = $db->escapeString($_POST['ft8P']);
	$ft8Comment = $db->escapeString($_POST['ft8Comment']);
	$ft9A = $db->escapeString($_POST['ft9A']);
	$ft9M = $db->escapeString($_POST['ft9M']);
	$ft9P = $db->escapeString($_POST['ft9P']);
	$ft9Comment = $db->escapeString($_POST['ft9Comment']);
	$pt1A = $db->escapeString($_POST['pt1A']);
	$pt1B = $db->escapeString($_POST['pt1B']);
	$pt1C = $db->escapeString($_POST['pt1C']);
	$pt1M = $db->escapeString($_POST['pt1M']);
	$pt1P = $db->escapeString($_POST['pt1P']);
	$pt1Comment = $db->escapeString($_POST['pt1Comment']);
	$pt2A = $db->escapeString($_POST['pt2A']);
	$pt2B = $db->escapeString($_POST['pt2B']);
	$pt2C = $db->escapeString($_POST['pt2C']);
	$pt2M = $db->escapeString($_POST['pt2M']);
	$pt2P = $db->escapeString($_POST['pt2P']);
	$pt2Comment = $db->escapeString($_POST['pt2Comment']);
	$pt3A = $db->escapeString($_POST['pt3A']);
	$pt3B = $db->escapeString($_POST['pt3B']);
	$pt3C = $db->escapeString($_POST['pt3C']);
	$pt3M = $db->escapeString($_POST['pt3M']);
	$pt3P = $db->escapeString($_POST['pt3P']);
	$pt3Comment = $db->escapeString($_POST['pt3Comment']);
	$pt4A = $db->escapeString($_POST['pt4A']);
	$pt4B = $db->escapeString($_POST['pt4B']);
	$pt4C = $db->escapeString($_POST['pt4C']);
	$pt4M = $db->escapeString($_POST['pt4M']);
	$pt4P = $db->escapeString($_POST['pt4P']);
	$pt4Comment = $db->escapeString($_POST['pt4Comment']);
	$pt5A = $db->escapeString($_POST['pt5A']);
	$pt5B = $db->escapeString($_POST['pt5B']);
	$pt5C = $db->escapeString($_POST['pt5C']);
	$pt5M = $db->escapeString($_POST['pt5M']);
	$pt5P = $db->escapeString($_POST['pt5P']);
	$pt5Comment = $db->escapeString($_POST['pt5Comment']);
	$pt6A = $db->escapeString($_POST['pt6A']);
	$pt6B = $db->escapeString($_POST['pt6B']);
	$pt6C = $db->escapeString($_POST['pt6C']);
	$pt6M = $db->escapeString($_POST['pt6M']);
	$pt6P = $db->escapeString($_POST['pt6P']);
	$pt6Comment = $db->escapeString($_POST['pt6Comment']);
	$pt7A = $db->escapeString($_POST['pt7A']);
	$pt7B = $db->escapeString($_POST['pt7B']);
	$pt7C = $db->escapeString($_POST['pt7C']);
	$pt7M = $db->escapeString($_POST['pt7M']);
	$pt7P = $db->escapeString($_POST['pt7P']);
	$pt7Comment = $db->escapeString($_POST['pt7Comment']);
	$pt8A = $db->escapeString($_POST['pt8A']);
	$pt8B = $db->escapeString($_POST['pt8B']);
	$pt8C = $db->escapeString($_POST['pt8C']);
	$pt8M = $db->escapeString($_POST['pt8M']);
	$pt8P = $db->escapeString($_POST['pt8P']);
	$pt8Comment = $db->escapeString($_POST['pt8Comment']);
	$pt9A = $db->escapeString($_POST['pt9A']);
	$pt9B = $db->escapeString($_POST['pt9B']);
	$pt9C = $db->escapeString($_POST['pt9C']);
	$pt9M = $db->escapeString($_POST['pt9M']);
	$pt9P = $db->escapeString($_POST['pt9P']);
	$pt9Comment = $db->escapeString($_POST['pt9Comment']);
	$pt10A = $db->escapeString($_POST['pt10A']);
	$pt10B = $db->escapeString($_POST['pt10B']);
	$pt10C = $db->escapeString($_POST['pt10C']);
	$pt10M = $db->escapeString($_POST['pt10M']);
	$pt10P = $db->escapeString($_POST['pt10P']);
	$pt10Comment = $db->escapeString($_POST['pt10Comment']);
	$pt11A = $db->escapeString($_POST['pt11A']);
	$pt11B = $db->escapeString($_POST['pt11B']);
	$pt11C = $db->escapeString($_POST['pt11C']);
	$pt11M = $db->escapeString($_POST['pt11M']);
	$pt11P = $db->escapeString($_POST['pt11P']);
	$pt11Comment = $db->escapeString($_POST['pt11Comment']);
	$pt12A = $db->escapeString($_POST['pt12A']);
	$pt12B = $db->escapeString($_POST['pt12B']);
	$pt12C = $db->escapeString($_POST['pt12C']);
	$pt12M = $db->escapeString($_POST['pt12M']);
	$pt12P = $db->escapeString($_POST['pt12P']);
	$pt12Comment = $db->escapeString($_POST['pt12Comment']);
	$pt13A = $db->escapeString($_POST['pt13A']);
	$pt13B = $db->escapeString($_POST['pt13B']);
	$pt13C = $db->escapeString($_POST['pt13C']);
	$pt13M = $db->escapeString($_POST['pt13M']);
	$pt13P = $db->escapeString($_POST['pt13P']);
	$pt13Comment = $db->escapeString($_POST['pt13Comment']);
	$pt14A = $db->escapeString($_POST['pt14A']);
	$pt14B = $db->escapeString($_POST['pt14B']);
	$pt14C = $db->escapeString($_POST['pt14C']);
	$pt14M = $db->escapeString($_POST['pt14M']);
	$pt14P = $db->escapeString($_POST['pt14P']);
	$pt14Comment = $db->escapeString($_POST['pt14Comment']);
	$pt15A = $db->escapeString($_POST['pt15A']);
	$pt15B = $db->escapeString($_POST['pt15B']);
	$pt15C = $db->escapeString($_POST['pt15C']);
	$pt15M = $db->escapeString($_POST['pt15M']);
	$pt15P = $db->escapeString($_POST['pt15P']);
	$pt15Comment = $db->escapeString($_POST['pt15Comment']);
	$pt16A = $db->escapeString($_POST['pt16A']);
	$pt16B = $db->escapeString($_POST['pt16B']);
	$pt16C = $db->escapeString($_POST['pt16C']);
	$pt16M = $db->escapeString($_POST['pt16M']);
	$pt16P = $db->escapeString($_POST['pt16P']);
	$total1A = $db->escapeString($_POST['total1A']);
	$total1B = $db->escapeString($_POST['total1B']);
	$total1C = $db->escapeString($_POST['total1C']);
	$total1M = $db->escapeString($_POST['total1M']);
	$total1P = $db->escapeString($_POST['total1P']);
	$total1Comment = $db->escapeString($_POST['total1Comment']);
	$pt18A = $db->escapeString($_POST['pt18A']);
	$pt18B = $db->escapeString($_POST['pt18B']);
	$pt18C = $db->escapeString($_POST['pt18C']);
	$pt18M = $db->escapeString($_POST['pt18M']);
	$pt18P = $db->escapeString($_POST['pt18P']);
	$pt19A = $db->escapeString($_POST['pt19A']);
	$pt19B = $db->escapeString($_POST['pt19B']);
	$pt19C = $db->escapeString($_POST['pt19C']);
	$pt19M = $db->escapeString($_POST['pt19M']);
	$pt19P = $db->escapeString($_POST['pt19P']);
	$pt19Comment = $db->escapeString($_POST['pt19Comment']);
	$pt20A = $db->escapeString($_POST['pt20A']);
	$pt20B = $db->escapeString($_POST['pt20B']);
	$pt20C = $db->escapeString($_POST['pt20C']);
	$pt20M = $db->escapeString($_POST['pt20M']);
	$pt20P = $db->escapeString($_POST['pt20P']);
	$total2A = $db->escapeString($_POST['total2A']);
	$total2B = $db->escapeString($_POST['total2B']);
	$total2C = $db->escapeString($_POST['total2C']);
	$total2M = $db->escapeString($_POST['total2M']);
	$total2P = $db->escapeString($_POST['total2P']);
	$total2Comment = $db->escapeString($_POST['total2Comment']);

	

	$db->insert('match_table',
	array(
		'shooterNo'=>$shooterNo,
		'shooterName'=>$shooterName,
		'stageNo'=>$stageNo,
		'ft1A'=>$ft1A,
		'ft1M'=>$ft1M,
		'ft1P'=>$ft1P,
		'ft1Comment'=>$ft1Comment,
		'ft2A'=>$ft2A,
		'ft2M'=>$ft2M,
		'ft2P'=>$ft2P,
		'ft2Comment'=>$ft2Comment,
		'ft3A'=>$ft3A,
		'ft3M'=>$ft3M,
		'ft3P'=>$ft3P,
		'ft3Comment'=>$ft3Comment,
		'ft4A'=>$ft4A,
		'ft4M'=>$ft4M,
		'ft4P'=>$ft4P,
		'ft4Comment'=>$ft4Comment,
		'ft5A'=>$ft5A,
		'ft5M'=>$ft5M,
		'ft5P'=>$ft5P,
		'ft5Comment'=>$ft5Comment,
		'ft6A'=>$ft6A,
		'ft6M'=>$ft6M,
		'ft6P'=>$ft6P,
		'ft6Comment'=>$ft6Comment,
		'ft7A'=>$ft7A,
		'ft7M'=>$ft7M,
		'ft7P'=>$ft7P,
		'ft7Comment'=>$ft7Comment,
		'ft8A'=>$ft8A,
		'ft8M'=>$ft8M,
		'ft8P'=>$ft8P,
		'ft8Comment'=>$ft8Comment,
		'ft9A'=>$ft9A,
		'ft9M'=>$ft9M,
		'ft9P'=>$ft9P,
		'ft9Comment'=>$ft9Comment,
		'pt1A'=>$pt1A,
		'pt1B'=>$pt1B,
		'pt1C'=>$pt1C,
		'pt1M'=>$pt1M,
		'pt1P'=>$pt1P,
		'pt1Comment'=>$pt1Comment,
		'pt2A'=>$pt2A,
		'pt2B'=>$pt2B,
		'pt2C'=>$pt2C,
		'pt2M'=>$pt2M,
		'pt2P'=>$pt2P,
		'pt2Comment'=>$pt2Comment,
		'pt3A'=>$pt3A,
		'pt3B'=>$pt3B,
		'pt3C'=>$pt3C,
		'pt3M'=>$pt3M,
		'pt3P'=>$pt3P,
		'pt3Comment'=>$pt3Comment,
		'pt4A'=>$pt4A,
		'pt4B'=>$pt4B,
		'pt4C'=>$pt4C,
		'pt4M'=>$pt4M,
		'pt4P'=>$pt4P,
		'pt4Comment'=>$pt4Comment,
		'pt5A'=>$pt5A,
		'pt5B'=>$pt5B,
		'pt5C'=>$pt5C,
		'pt5M'=>$pt5M,
		'pt5P'=>$pt5P,
		'pt5Comment'=>$pt5Comment,
		'pt6A'=>$pt6A,
		'pt6B'=>$pt6B,
		'pt6C'=>$pt6C,
		'pt6M'=>$pt6M,
		'pt6P'=>$pt6P,
		'pt6Comment'=>$pt6Comment,
		'pt7A'=>$pt7A,
		'pt7B'=>$pt7B,
		'pt7C'=>$pt7C,
		'pt7M'=>$pt7M,
		'pt7P'=>$pt7P,
		'pt7Comment'=>$pt7Comment,
		'pt8A'=>$pt8A,
		'pt8B'=>$pt8B,
		'pt8C'=>$pt8C,
		'pt8M'=>$pt8M,
		'pt8P'=>$pt8P,
		'pt8Comment'=>$pt8Comment,
		'pt9A'=>$pt9A,
		'pt9B'=>$pt9B,
		'pt9C'=>$pt9C,
		'pt9M'=>$pt9M,
		'pt9P'=>$pt9P,
		'pt9Comment'=>$pt9Comment,
		'pt10A'=>$pt10A,
		'pt10B'=>$pt10B,
		'pt10C'=>$pt10C,
		'pt10M'=>$pt10M,
		'pt10P'=>$pt10P,
		'pt10Comment'=>$pt10Comment,
		'pt11A'=>$pt11A,
		'pt11B'=>$pt11B,
		'pt11C'=>$pt11C,
		'pt11M'=>$pt11M,
		'pt11P'=>$pt11P,
		'pt11Comment'=>$pt11Comment,
		'pt12A'=>$pt12A,
		'pt12B'=>$pt12B,
		'pt12C'=>$pt12C,
		'pt12M'=>$pt12M,
		'pt12P'=>$pt12P,
		'pt12Comment'=>$pt12Comment,
		'pt13A'=>$pt13A,
		'pt13B'=>$pt13B,
		'pt13C'=>$pt13C,
		'pt13M'=>$pt13M,
		'pt13P'=>$pt13P,
		'pt13Comment'=>$pt13Comment,
		'pt14A'=>$pt14A,
		'pt14B'=>$pt14B,
		'pt14C'=>$pt14C,
		'pt14M'=>$pt14M,
		'pt14P'=>$pt14P,
		'pt14Comment'=>$pt14Comment,
		'pt15A'=>$pt15A,
		'pt15B'=>$pt15B,
		'pt15C'=>$pt15C,
		'pt15M'=>$pt15M,
		'pt15P'=>$pt15P,
		'pt15Comment'=>$pt15Comment,
		'pt16A'=>$pt16A,
		'pt16B'=>$pt16B,
		'pt16C'=>$pt16C,
		'pt16M'=>$pt16M,
		'pt16P'=>$pt16P,
		'total1A'=>$total1A,
		'total1B'=>$total1B,
		'total1C'=>$total1C,
		'total1M'=>$total1M,
		'total1P'=>$total1P,
		'total1Comment'=>$total1Comment,
		'pt18A'=>$pt18A,
		'pt18B'=>$pt18B,
		'pt18C'=>$pt18C,
		'pt18M'=>$pt18M,
		'pt18P'=>$pt18P,
		'pt19A'=>$pt19A,
		'pt19B'=>$pt19B,
		'pt19C'=>$pt19C,
		'pt19M'=>$pt19M,
		'pt19P'=>$pt19P,
		'pt19Comment'=>$pt19Comment,
		'pt20A'=>$pt20A,
		'pt20B'=>$pt20B,
		'pt20C'=>$pt20C,
		'pt20M'=>$pt20M,
		'pt20P'=>$pt20P,
		'total2A'=>$total2A,
		'total2B'=>$total2B,
		'total2C'=>$total2C,
		'total2M'=>$total2M,
		'total2P'=>$total2P,
		'total2Comment'=>$total2Comment,


		)
	);

	$res = $db->getResult();

	header("Location: add-match.php");
	$_SESSION['toast'] = 'add-match';
}

if (isset($_GET['from']) and $_GET['from'] == 'edit-match') {

	$psmocOrmoo = $db->escapeString($_POST['psmocOrmoo']);
	$shooterNo = $db->escapeString($_POST['shooterNo']);
	$shooterName = $db->escapeString($_POST['shooterName']);
	$stageNo = $db->escapeString($_POST['stageNo']);
	$ft1A = $db->escapeString($_POST['ft1A']);
	$ft1M = $db->escapeString($_POST['ft1M']);
	$ft1P = $db->escapeString($_POST['ft1P']);
	$ft1Comment = $db->escapeString($_POST['ft1Comment']);
	$ft2A = $db->escapeString($_POST['ft2A']);
	$ft2M = $db->escapeString($_POST['ft2M']);
	$ft2P = $db->escapeString($_POST['ft2P']);
	$ft2Comment = $db->escapeString($_POST['ft2Comment']);
	$ft3A = $db->escapeString($_POST['ft3A']);
	$ft3M = $db->escapeString($_POST['ft3M']);
	$ft3P = $db->escapeString($_POST['ft3P']);
	$ft3Comment = $db->escapeString($_POST['ft3Comment']);
	$ft4A = $db->escapeString($_POST['ft4A']);
	$ft4M = $db->escapeString($_POST['ft4M']);
	$ft4P = $db->escapeString($_POST['ft4P']);
	$ft4Comment = $db->escapeString($_POST['ft4Comment']);
	$ft5A = $db->escapeString($_POST['ft5A']);
	$ft5M = $db->escapeString($_POST['ft5M']);
	$ft5P = $db->escapeString($_POST['ft5P']);
	$ft5Comment = $db->escapeString($_POST['ft5Comment']);
	$ft6A = $db->escapeString($_POST['ft6A']);
	$ft6M = $db->escapeString($_POST['ft6M']);
	$ft6P = $db->escapeString($_POST['ft6P']);
	$ft6Comment = $db->escapeString($_POST['ft6Comment']);
	$ft7A = $db->escapeString($_POST['ft7A']);
	$ft7M = $db->escapeString($_POST['ft7M']);
	$ft7P = $db->escapeString($_POST['ft7P']);
	$ft7Comment = $db->escapeString($_POST['ft7Comment']);
	$ft8A = $db->escapeString($_POST['ft8A']);
	$ft8M = $db->escapeString($_POST['ft8M']);
	$ft8P = $db->escapeString($_POST['ft8P']);
	$ft8Comment = $db->escapeString($_POST['ft8Comment']);
	$ft9A = $db->escapeString($_POST['ft9A']);
	$ft9M = $db->escapeString($_POST['ft9M']);
	$ft9P = $db->escapeString($_POST['ft9P']);
	$ft9Comment = $db->escapeString($_POST['ft9Comment']);
	$pt1A = $db->escapeString($_POST['pt1A']);
	$pt1B = $db->escapeString($_POST['pt1B']);
	$pt1C = $db->escapeString($_POST['pt1C']);
	$pt1M = $db->escapeString($_POST['pt1M']);
	$pt1P = $db->escapeString($_POST['pt1P']);
	$pt1Comment = $db->escapeString($_POST['pt1Comment']);
	$pt2A = $db->escapeString($_POST['pt2A']);
	$pt2B = $db->escapeString($_POST['pt2B']);
	$pt2C = $db->escapeString($_POST['pt2C']);
	$pt2M = $db->escapeString($_POST['pt2M']);
	$pt2P = $db->escapeString($_POST['pt2P']);
	$pt2Comment = $db->escapeString($_POST['pt2Comment']);
	$pt3A = $db->escapeString($_POST['pt3A']);
	$pt3B = $db->escapeString($_POST['pt3B']);
	$pt3C = $db->escapeString($_POST['pt3C']);
	$pt3M = $db->escapeString($_POST['pt3M']);
	$pt3P = $db->escapeString($_POST['pt3P']);
	$pt3Comment = $db->escapeString($_POST['pt3Comment']);
	$pt4A = $db->escapeString($_POST['pt4A']);
	$pt4B = $db->escapeString($_POST['pt4B']);
	$pt4C = $db->escapeString($_POST['pt4C']);
	$pt4M = $db->escapeString($_POST['pt4M']);
	$pt4P = $db->escapeString($_POST['pt4P']);
	$pt4Comment = $db->escapeString($_POST['pt4Comment']);
	$pt5A = $db->escapeString($_POST['pt5A']);
	$pt5B = $db->escapeString($_POST['pt5B']);
	$pt5C = $db->escapeString($_POST['pt5C']);
	$pt5M = $db->escapeString($_POST['pt5M']);
	$pt5P = $db->escapeString($_POST['pt5P']);
	$pt5Comment = $db->escapeString($_POST['pt5Comment']);
	$pt6A = $db->escapeString($_POST['pt6A']);
	$pt6B = $db->escapeString($_POST['pt6B']);
	$pt6C = $db->escapeString($_POST['pt6C']);
	$pt6M = $db->escapeString($_POST['pt6M']);
	$pt6P = $db->escapeString($_POST['pt6P']);
	$pt6Comment = $db->escapeString($_POST['pt6Comment']);
	$pt7A = $db->escapeString($_POST['pt7A']);
	$pt7B = $db->escapeString($_POST['pt7B']);
	$pt7C = $db->escapeString($_POST['pt7C']);
	$pt7M = $db->escapeString($_POST['pt7M']);
	$pt7P = $db->escapeString($_POST['pt7P']);
	$pt7Comment = $db->escapeString($_POST['pt7Comment']);
	$pt8A = $db->escapeString($_POST['pt8A']);
	$pt8B = $db->escapeString($_POST['pt8B']);
	$pt8C = $db->escapeString($_POST['pt8C']);
	$pt8M = $db->escapeString($_POST['pt8M']);
	$pt8P = $db->escapeString($_POST['pt8P']);
	$pt8Comment = $db->escapeString($_POST['pt8Comment']);
	$pt9A = $db->escapeString($_POST['pt9A']);
	$pt9B = $db->escapeString($_POST['pt9B']);
	$pt9C = $db->escapeString($_POST['pt9C']);
	$pt9M = $db->escapeString($_POST['pt9M']);
	$pt9P = $db->escapeString($_POST['pt9P']);
	$pt9Comment = $db->escapeString($_POST['pt9Comment']);
	$pt10A = $db->escapeString($_POST['pt10A']);
	$pt10B = $db->escapeString($_POST['pt10B']);
	$pt10C = $db->escapeString($_POST['pt10C']);
	$pt10M = $db->escapeString($_POST['pt10M']);
	$pt10P = $db->escapeString($_POST['pt10P']);
	$pt10Comment = $db->escapeString($_POST['pt10Comment']);
	$pt11A = $db->escapeString($_POST['pt11A']);
	$pt11B = $db->escapeString($_POST['pt11B']);
	$pt11C = $db->escapeString($_POST['pt11C']);
	$pt11M = $db->escapeString($_POST['pt11M']);
	$pt11P = $db->escapeString($_POST['pt11P']);
	$pt11Comment = $db->escapeString($_POST['pt11Comment']);
	$pt12A = $db->escapeString($_POST['pt12A']);
	$pt12B = $db->escapeString($_POST['pt12B']);
	$pt12C = $db->escapeString($_POST['pt12C']);
	$pt12M = $db->escapeString($_POST['pt12M']);
	$pt12P = $db->escapeString($_POST['pt12P']);
	$pt12Comment = $db->escapeString($_POST['pt12Comment']);
	$pt13A = $db->escapeString($_POST['pt13A']);
	$pt13B = $db->escapeString($_POST['pt13B']);
	$pt13C = $db->escapeString($_POST['pt13C']);
	$pt13M = $db->escapeString($_POST['pt13M']);
	$pt13P = $db->escapeString($_POST['pt13P']);
	$pt13Comment = $db->escapeString($_POST['pt13Comment']);
	$pt14A = $db->escapeString($_POST['pt14A']);
	$pt14B = $db->escapeString($_POST['pt14B']);
	$pt14C = $db->escapeString($_POST['pt14C']);
	$pt14M = $db->escapeString($_POST['pt14M']);
	$pt14P = $db->escapeString($_POST['pt14P']);
	$pt14Comment = $db->escapeString($_POST['pt14Comment']);
	$pt15A = $db->escapeString($_POST['pt15A']);
	$pt15B = $db->escapeString($_POST['pt15B']);
	$pt15C = $db->escapeString($_POST['pt15C']);
	$pt15M = $db->escapeString($_POST['pt15M']);
	$pt15P = $db->escapeString($_POST['pt15P']);
	$pt15Comment = $db->escapeString($_POST['pt15Comment']);
	$pt16A = $db->escapeString($_POST['pt16A']);
	$pt16B = $db->escapeString($_POST['pt16B']);
	$pt16C = $db->escapeString($_POST['pt16C']);
	$pt16M = $db->escapeString($_POST['pt16M']);
	$pt16P = $db->escapeString($_POST['pt16P']);
	$total1A = $db->escapeString($_POST['total1A']);
	$total1B = $db->escapeString($_POST['total1B']);
	$total1C = $db->escapeString($_POST['total1C']);
	$total1M = $db->escapeString($_POST['total1M']);
	$total1P = $db->escapeString($_POST['total1P']);
	$total1Comment = $db->escapeString($_POST['total1Comment']);
	$pt18A = $db->escapeString($_POST['pt18A']);
	$pt18B = $db->escapeString($_POST['pt18B']);
	$pt18C = $db->escapeString($_POST['pt18C']);
	$pt18M = $db->escapeString($_POST['pt18M']);
	$pt18P = $db->escapeString($_POST['pt18P']);
	$pt19A = $db->escapeString($_POST['pt19A']);
	$pt19B = $db->escapeString($_POST['pt19B']);
	$pt19C = $db->escapeString($_POST['pt19C']);
	$pt19M = $db->escapeString($_POST['pt19M']);
	$pt19P = $db->escapeString($_POST['pt19P']);
	$pt19Comment = $db->escapeString($_POST['pt19Comment']);
	$pt20A = $db->escapeString($_POST['pt20A']);
	$pt20B = $db->escapeString($_POST['pt20B']);
	$pt20C = $db->escapeString($_POST['pt20C']);
	$pt20M = $db->escapeString($_POST['pt20M']);
	$pt20P = $db->escapeString($_POST['pt20P']);
	$total2A = $db->escapeString($_POST['total2A']);
	$total2B = $db->escapeString($_POST['total2B']);
	$total2C = $db->escapeString($_POST['total2C']);
	$total2M = $db->escapeString($_POST['total2M']);
	$total2P = $db->escapeString($_POST['total2P']);
	$total2Comment = $db->escapeString($_POST['total2Comment']);

	

	$db->update('match_table',
	array(
		'shooterNo'=>$shooterNo,
		'shooterName'=>$shooterName,
		'stageNo'=>$stageNo,
		'ft1A'=>$ft1A,
		'ft1M'=>$ft1M,
		'ft1P'=>$ft1P,
		'ft1Comment'=>$ft1Comment,
		'ft2A'=>$ft2A,
		'ft2M'=>$ft2M,
		'ft2P'=>$ft2P,
		'ft2Comment'=>$ft2Comment,
		'ft3A'=>$ft3A,
		'ft3M'=>$ft3M,
		'ft3P'=>$ft3P,
		'ft3Comment'=>$ft3Comment,
		'ft4A'=>$ft4A,
		'ft4M'=>$ft4M,
		'ft4P'=>$ft4P,
		'ft4Comment'=>$ft4Comment,
		'ft5A'=>$ft5A,
		'ft5M'=>$ft5M,
		'ft5P'=>$ft5P,
		'ft5Comment'=>$ft5Comment,
		'ft6A'=>$ft6A,
		'ft6M'=>$ft6M,
		'ft6P'=>$ft6P,
		'ft6Comment'=>$ft6Comment,
		'ft7A'=>$ft7A,
		'ft7M'=>$ft7M,
		'ft7P'=>$ft7P,
		'ft7Comment'=>$ft7Comment,
		'ft8A'=>$ft8A,
		'ft8M'=>$ft8M,
		'ft8P'=>$ft8P,
		'ft8Comment'=>$ft8Comment,
		'ft9A'=>$ft9A,
		'ft9M'=>$ft9M,
		'ft9P'=>$ft9P,
		'ft9Comment'=>$ft9Comment,
		'pt1A'=>$pt1A,
		'pt1B'=>$pt1B,
		'pt1C'=>$pt1C,
		'pt1M'=>$pt1M,
		'pt1P'=>$pt1P,
		'pt1Comment'=>$pt1Comment,
		'pt2A'=>$pt2A,
		'pt2B'=>$pt2B,
		'pt2C'=>$pt2C,
		'pt2M'=>$pt2M,
		'pt2P'=>$pt2P,
		'pt2Comment'=>$pt2Comment,
		'pt3A'=>$pt3A,
		'pt3B'=>$pt3B,
		'pt3C'=>$pt3C,
		'pt3M'=>$pt3M,
		'pt3P'=>$pt3P,
		'pt3Comment'=>$pt3Comment,
		'pt4A'=>$pt4A,
		'pt4B'=>$pt4B,
		'pt4C'=>$pt4C,
		'pt4M'=>$pt4M,
		'pt4P'=>$pt4P,
		'pt4Comment'=>$pt4Comment,
		'pt5A'=>$pt5A,
		'pt5B'=>$pt5B,
		'pt5C'=>$pt5C,
		'pt5M'=>$pt5M,
		'pt5P'=>$pt5P,
		'pt5Comment'=>$pt5Comment,
		'pt6A'=>$pt6A,
		'pt6B'=>$pt6B,
		'pt6C'=>$pt6C,
		'pt6M'=>$pt6M,
		'pt6P'=>$pt6P,
		'pt6Comment'=>$pt6Comment,
		'pt7A'=>$pt7A,
		'pt7B'=>$pt7B,
		'pt7C'=>$pt7C,
		'pt7M'=>$pt7M,
		'pt7P'=>$pt7P,
		'pt7Comment'=>$pt7Comment,
		'pt8A'=>$pt8A,
		'pt8B'=>$pt8B,
		'pt8C'=>$pt8C,
		'pt8M'=>$pt8M,
		'pt8P'=>$pt8P,
		'pt8Comment'=>$pt8Comment,
		'pt9A'=>$pt9A,
		'pt9B'=>$pt9B,
		'pt9C'=>$pt9C,
		'pt9M'=>$pt9M,
		'pt9P'=>$pt9P,
		'pt9Comment'=>$pt9Comment,
		'pt10A'=>$pt10A,
		'pt10B'=>$pt10B,
		'pt10C'=>$pt10C,
		'pt10M'=>$pt10M,
		'pt10P'=>$pt10P,
		'pt10Comment'=>$pt10Comment,
		'pt11A'=>$pt11A,
		'pt11B'=>$pt11B,
		'pt11C'=>$pt11C,
		'pt11M'=>$pt11M,
		'pt11P'=>$pt11P,
		'pt11Comment'=>$pt11Comment,
		'pt12A'=>$pt12A,
		'pt12B'=>$pt12B,
		'pt12C'=>$pt12C,
		'pt12M'=>$pt12M,
		'pt12P'=>$pt12P,
		'pt12Comment'=>$pt12Comment,
		'pt13A'=>$pt13A,
		'pt13B'=>$pt13B,
		'pt13C'=>$pt13C,
		'pt13M'=>$pt13M,
		'pt13P'=>$pt13P,
		'pt13Comment'=>$pt13Comment,
		'pt14A'=>$pt14A,
		'pt14B'=>$pt14B,
		'pt14C'=>$pt14C,
		'pt14M'=>$pt14M,
		'pt14P'=>$pt14P,
		'pt14Comment'=>$pt14Comment,
		'pt15A'=>$pt15A,
		'pt15B'=>$pt15B,
		'pt15C'=>$pt15C,
		'pt15M'=>$pt15M,
		'pt15P'=>$pt15P,
		'pt15Comment'=>$pt15Comment,
		'pt16A'=>$pt16A,
		'pt16B'=>$pt16B,
		'pt16C'=>$pt16C,
		'pt16M'=>$pt16M,
		'pt16P'=>$pt16P,
		'total1A'=>$total1A,
		'total1B'=>$total1B,
		'total1C'=>$total1C,
		'total1M'=>$total1M,
		'total1P'=>$total1P,
		'total1Comment'=>$total1Comment,
		'pt18A'=>$pt18A,
		'pt18B'=>$pt18B,
		'pt18C'=>$pt18C,
		'pt18M'=>$pt18M,
		'pt18P'=>$pt18P,
		'pt19A'=>$pt19A,
		'pt19B'=>$pt19B,
		'pt19C'=>$pt19C,
		'pt19M'=>$pt19M,
		'pt19P'=>$pt19P,
		'pt19Comment'=>$pt19Comment,
		'pt20A'=>$pt20A,
		'pt20B'=>$pt20B,
		'pt20C'=>$pt20C,
		'pt20M'=>$pt20M,
		'pt20P'=>$pt20P,
		'total2A'=>$total2A,
		'total2B'=>$total2B,
		'total2C'=>$total2C,
		'total2M'=>$total2M,
		'total2P'=>$total2P,
		'total2Comment'=>$total2Comment,
		),
		'matchId=' . $_POST['matchId']
	);

	$res = $db->getResult();

	header("Location: edit-match.php?matchId=".$_POST['matchId']."");
	$_SESSION['toast'] = 'edit-match';
}


if (isset($_GET['from']) and $_GET['from'] == 'delete-match') {

	$db->delete('match_table','matchId=' . $_GET['matchId']);
	$res = $db->getResult();
	header("Location: all-match.php");
	$_SESSION['toast'] = 'delete-match';
}


if (isset($_GET['from']) and $_GET['from'] == 'change-password') {

	$password = $db->escapeString(md5($_POST['password']));



	$db->update('users_table',
	array(
		'password'=>$password,
		),
			'userId=' . $_SESSION['userId']
	);

	$res = $db->getResult();

	header("Location: change-password.php");
	$_SESSION['toast'] = 'change-password';
}



if (isset($_GET['from']) and $_GET['from'] == 'gce') {
	$link = mysqli_connect("localhost", "root", "", "psmoc_db");
	$listdbtables = array_column(mysqli_fetch_all($link->query('SHOW COLUMNS FROM match_table')),0);

	foreach ($listdbtables as $key) {
		echo "$" . $key ." = $ ->escapeString($ _POST['" . $key . "']);"."<br>";
		//$db
	}

}

if (isset($_GET['from']) and $_GET['from'] == 'ins') {
	$link = mysqli_connect("localhost", "root", "", "psmoc_db");
	$listdbtables = array_column(mysqli_fetch_all($link->query('SHOW COLUMNS FROM match_table')),0);

	foreach ($listdbtables as $key) {
		echo "'" . $key . "'=>" . "$" . $key .",<br>";
		//$db
	}
}

?>
