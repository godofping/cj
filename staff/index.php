<?php
include('connection.php');

if (isset($_GET['s'])) {

    $s = base64_decode($_GET['s']);
    $s = explode(';', $s);
    $timeNow = strtotime(date('Y-m-d H:i:s'));
    $timeFromEmail = strtotime($s[0]);
    $what = $s[1];
    $userEmail = $s[2];


    if ($timeNow > ($timeFromEmail + 600)) {
        $_SESSION['toast'] = 'reset-failed';
    }
    elseif ($what != 'customer' or count($s) != 3) {
        $_SESSION['toast'] = 'error';
    }
    else {

        $_SESSION['toast'] = 'success';

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
}



if (isset($_SESSION['userId'])){
    header("Location: dashboard.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PSMOC information system">
    <meta name="author" content="r.x">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>CJ Ashley Fashion Hub</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="assets/plugins/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(etc/test.png);">
            <div class="login-box card">
                <div class="card-body">

                    <form class="form-horizontal form-material" id="loginform" action="controller.php?from=login" method="POST" autocomplete="off">
                        
                        <div class="form-row text-center">
                            <div class="col-md-12">
                                <img class="mb-3" src="etc/logo.jpg" width="300">
                            </div>
                        </div>

                        <h3 class="box-title m-b-20">Sign In</h3>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" required="" placeholder="Email" name="userEmail">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password" name="userPassword">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 font-14">
                                <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"> Forgot password?</a>
                            </div>
                        </div>
    
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                    </form>

                     <form class="form-horizontal form-material" id="recoverform" action="controller.php?from=forgot-password" method="POST" autocomplete="off">

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Forgot Password</h3>
                                <p class="text-muted">We will email you the reset password link. The link is valid only for 10 minutes.</p>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="email" name="userEmail" required="" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 font-14">
                                <a href="index.php" id="to-recover" class="text-dark pull-right"> Login here!</a>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Submit</button>
                            </div>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <!--Custom JavaScript -->
    <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script type="text/javascript">
        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'session-expired'): ?>
            $.toast({
              heading: 'SESSION EXPIRED!',
              text: 'Please login again!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'warning',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'login-failed'): ?>
            $.toast({
              heading: 'LOGIN FAILED!',
              text: 'Please login again!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'warning',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'staff-account-blocked'): ?>
            $.toast({
              heading: 'LOGIN FAILED',
              text: 'Account Blocked!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'message-sent'): ?>
            $.toast({
              heading: 'SENT',
              text: 'Email sent! Please check your inbox.',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'message-sent-failed'): ?>
            $.toast({
              heading: 'FAILED',
              text: 'Email sending failed! The email is not registered in our database.',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'reset-failed'): ?>
            $.toast({
              heading: 'FAILED',
              text: 'Password Reset Failed. The link has already expired.',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'error'): ?>
            $.toast({
              heading: 'ERROR',
              text: 'Something is wrong.',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'success'): ?>
            $.toast({
              heading: 'SUCCESS',
              text: 'Password Reset Succesfully.',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php unset($_SESSION['toast']); ?>
    </script>
</body>

</html>