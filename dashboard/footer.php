            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © <?php echo date('Y'); ?> CJ-Ashley Fashion Hub
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
              text: 'Welcome to CJ-Ashley Fashion Hub System',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-category'): ?>
            $.toast({
              heading: 'SUCCESSFULLY ADDED',
              text: 'Category Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-category'): ?>
            $.toast({
              heading: 'SUCCESSFULLY UPDATED',
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
              heading: 'SUCCESSFULLY DELETED',
              text: 'Category Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-user'): ?>
            $.toast({
              heading: 'SUCCESSFULLY ADDED',
              text: 'User Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-user'): ?>
            $.toast({
              heading: 'SUCCESSFULLY UPDATED',
              text: 'User Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-user'): ?>
            $.toast({
              heading: 'SUCCESSFULLY DELETED',
              text: 'User Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'userName-taken'): ?>
            $.toast({
              heading: 'USERNAME TAKEN',
              text: 'Please use another Username!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        



        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'change-password'): ?>
            $.toast({
              heading: 'SUCCESSFULLY UPDATED',
              text: 'Password Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-profile'): ?>
            $.toast({
              heading: 'SUCCESSFULLY UPDATED',
              text: 'Profile Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


         <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-sub-category'): ?>
            $.toast({
              heading: 'SUCCESSFULLY ADDED',
              text: 'Sub Category Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-sub-category'): ?>
            $.toast({
              heading: 'SUCCESSFULLY UPDATED',
              text: 'Sub Category Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-sub-category'): ?>
            $.toast({
              heading: 'SUCCESSFULLY DELETED',
              text: 'Sub Category Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
         <?php endif?>


         <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-product'): ?>
            $.toast({
              heading: 'SUCCESSFULLY ADDED',
              text: 'Product Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-product'): ?>
            $.toast({
              heading: 'SUCCESSFULLY UPDATED',
              text: 'Product Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-product'): ?>
            $.toast({
              heading: 'SUCCESSFULLY DELETED',
              text: 'Product Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
         <?php endif?>

       <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'product-images'): ?>
          $.toast({
            heading: 'SUCCESSFULLY UPDATED',
            text: 'Product Images Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>


      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'confirm-feedback'): ?>
          $.toast({
            heading: 'SUCCESSFULLY CONFIRMED',
            text: 'Feedback Confirmed!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-feedback'): ?>
          $.toast({
            heading: 'SUCCESSFULLY DELETED',
            text: 'Feedback Deleted!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>


      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-product-variation'): ?>
          $.toast({
            heading: 'SUCCESSFULLY ADDED',
            text: 'Product Variation Saved!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>


      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-product-variation'): ?>
          $.toast({
            heading: 'SUCCESSFULLY UPDATED',
            text: 'Product Variation Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-product-variation'): ?>
          $.toast({
            heading: 'SUCCESSFULLY DELETED',
            text: 'Product Variation Deleted!',
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