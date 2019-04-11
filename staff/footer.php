            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © <?php echo date('Y'); ?> CJ Ashley Fashion Hub
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
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
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>

    <!-- This is data table -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="assets/dt/dataTables.buttons.min.js"></script>
    <script src="assets/dt/buttons.flash.min.js"></script>
    <script src="assets/dt/jszip.min.js"></script>
    <script src="assets/dt/pdfmake.min.js"></script>
    <script src="assets/dt/vfs_fonts.js"></script>
    <script src="assets/dt/buttons.html5.min.js"></script>
    <script src="assets/dt/buttons.print.min.js"></script>

    <script src="assets/plugins/dropify/dist/js/dropify.min.js"></script>

    <!-- Magnific popup JavaScript -->
    <script src="assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <!-- ============================================================== -->

    <!--Custom JavaScript -->
    <script src="assets/plugins/toast-master/js/jquery.toast.js"></script>
    <script type="text/javascript">
        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'login-successful'): ?>
            $.toast({
              heading: 'LOGIN SUCCESSFUL',
              text: 'Welcome to CJ Ashley Fashion Hub System',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'login-failed'): ?>
            $.toast({
              heading: 'FAILED',
              text: 'Login Failed. Incorrect Credentials!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
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

        
        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-profile'): ?>
            $.toast({
              heading: 'UPDATED',
              text: 'Profile Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>




        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-category'): ?>
            $.toast({
              heading: 'UPDATED',
              text: 'Category Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-category'): ?>
            $.toast({
              heading: 'DELETED',
              text: 'Category Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-cart'): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Category Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-password-failed'): ?>
            $.toast({
              heading: 'FAILED',
              text: 'Update Password Failed! Please make sure old password is correct and new password and new confirm password are the same.',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-password'): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Password Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'empty-cart'): ?>
            $.toast({
              heading: 'EMPTIED',
              text: 'Cart Emptied!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

      

   

    </script>


    

    
    

    
</body>

</html>
<?php unset($_SESSION['toast']) ?>