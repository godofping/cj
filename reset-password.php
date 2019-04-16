<?php include('header.php'); 

$s = base64_decode($_GET['s']);


$s = explode(';', $s);
$timeNow = strtotime(date('Y-m-d H:i:s'));
$timeFromEmail = strtotime($s[0]);
$what = $s[1];
$userEmail = $s[2];


if ($timeNow > ($timeFromEmail + 600)) {
	$title = 'Password Reset Failed';
	$p = '<h3>The link has already expired.</h3>';
}
else
{
	$title = 'Password Reset Succesfully';
	$p = '<h3>You can now <a href="login.php?show=login"><b>login</b></a> your account.</h3>';

	$userEmail = $db->escapeString($userEmail);
	$userPassword = $db->escapeString(md5('1234'));

	$db->update('users_table',
	array(
		'userPassword'=>$userPassword,
		),
		'userEmail="' . $userEmail .'"'
	);

	$res = $db->getResult();


}

?>
  
<section class="sub-bnr" data-stellar-background-ratio="0.5">
<div class="position-center-center">
  <div class="container">
    <div class="heading text-center">
      <h4><?php echo $title; ?></h4>
      <hr>
    </div>
  </div>
</div>
</section>

<div id="content"> 

<section class="history-block padding-top-100 padding-bottom-100">
  <div class="container">
    <div class="about-us-con">

      <?php echo $p; ?>


    </div>
  </div>
</section>

</div>
<?php include('footer.php'); ?>
