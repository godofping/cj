            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © <?php echo date('Y'); ?> PSMOC Information System
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
              text: 'Welcome to PSMOC Information System',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-match-sanctioning'): ?>
            $.toast({
              heading: 'ADDED SUCCESSFUL',
              text: 'Match Sanctioning Application Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'edit-match-sanctioning'): ?>
            $.toast({
              heading: 'UPDATED SUCCESSFUL',
              text: 'Match Sanctioning Application Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-match-sanctioning'): ?>
            $.toast({
              heading: 'DELETED SUCCESSFUL',
              text: 'Match Sanctioning Application Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-gun-club-affiliation'): ?>
            $.toast({
              heading: 'ADDED SUCCESSFUL',
              text: 'Gun Club Affiliation Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'edit-gun-club-affiliation'): ?>
            $.toast({
              heading: 'UPDATED SUCCESSFUL',
              text: 'Gun Club Affiliation Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-gun-club-affiliation'): ?>
            $.toast({
              heading: 'DELETED SUCCESSFUL',
              text: 'Gun Club Affiliation Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-match-remittance-sanctioning'): ?>
            $.toast({
              heading: 'ADDED SUCCESSFUL',
              text: 'Match Remittance Sanctioning Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'edit-match-remittance-sanctioning'): ?>
            $.toast({
              heading: 'UPDATED SUCCESSFUL',
              text: 'Match Remittance Sanctioning Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-match-remittance-sanctioning'): ?>
            $.toast({
              heading: 'DELETED SUCCESSFUL',
              text: 'Match Remittance Sanctioning Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-membership'): ?>
            $.toast({
              heading: 'ADDED SUCCESSFUL',
              text: 'Membership Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'edit-membership'): ?>
            $.toast({
              heading: 'UPDATED SUCCESSFUL',
              text: 'Membership Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-membership'): ?>
            $.toast({
              heading: 'DELETED SUCCESSFUL',
              text: 'Membership Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-match'): ?>
            $.toast({
              heading: 'ADDED SUCCESSFUL',
              text: 'Match Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'edit-match'): ?>
            $.toast({
              heading: 'UPDATED SUCCESSFUL',
              text: 'Match Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-match'): ?>
            $.toast({
              heading: 'DELETED SUCCESSFUL',
              text: 'Match Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'change-password'): ?>
            $.toast({
              heading: 'UPDATED SUCCESSFUL',
              text: 'Password Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        
    </script>

    

    
</body>

</html>