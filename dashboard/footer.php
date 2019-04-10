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
      
      setInterval(function(){

      $.get("inc-notifications-counter.php", function(data, status){
        $('#notificationCounter').text(data);
      });

      },1000);

    </script>
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


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-category'): ?>
            $.toast({
              heading: 'ADDED',
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

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-category-failed'): ?>
            $.toast({
              heading: 'Failed',
              text: 'Category Deletion Failed!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-staff'): ?>
            $.toast({
              heading: 'ADDED',
              text: 'Staff Added!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'update-staff'): ?>
            $.toast({
              heading: 'UPDATED',
              text: 'Staff Profile Updated!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'block-staff'): ?>
            $.toast({
              heading: 'BLOCKED',
              text: 'Staff Blocked!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'unblock-staff'): ?>
            $.toast({
              heading: 'UNBLOCKED',
              text: 'Staff Unblocked!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'block-customer-view-all'): ?>
            $.toast({
              heading: 'BLOCKED',
              text: 'Customer Blocked!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>


        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'unblock-customer-view-all'): ?>
            $.toast({
              heading: 'UNBLOCKED',
              text: 'Customer Unblocked!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>





        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'userEmail-taken'): ?>
            $.toast({
              heading: 'EMAIL ALREADY TAKEN',
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
              heading: 'UPDATED',
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
              heading: 'UPDATED',
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
              heading: 'ADDED',
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
              heading: 'UPDATED',
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
              heading: 'DELETED',
              text: 'Sub Category Deleted!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
         <?php endif?>

         <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-sub-category-failed'): ?>
            $.toast({
              heading: 'FAILED',
              text: 'Sub Category Deletion Failed!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'error',
              hideAfter: 5000, 
              stack: 6
            });
         <?php endif?>

         


         <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-product'): ?>
            $.toast({
              heading: 'ADDED',
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
              heading: 'UPDATED',
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
              heading: 'DELETED',
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
            heading: 'UPDATED',
            text: 'Product Images Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>


      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-feedback'): ?>
          $.toast({
            heading: 'DELETED',
            text: 'Feedback Deleted!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'delete-review'): ?>
          $.toast({
            heading: 'DELETED',
            text: 'Review Deleted!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>


      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-product-variation'): ?>
          $.toast({
            heading: 'ADDED',
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
            heading: 'UPDATED',
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
            heading: 'DELETED',
            text: 'Product Variation Deleted!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>
         
      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'stock-in'): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Stocks Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'stock-out'): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Stocks Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'reorder-point'): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Stocks Reorder Point Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'block-customer'): ?>
          $.toast({
            heading: 'BLOCKED',
            text: 'Customer Blocked!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>


      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'unblock-customer'): ?>
          $.toast({
            heading: 'UNBLOCKED',
            text: 'Customer Unblocked!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'confirm-order'): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Order Confirmed!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>


      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'cancel-order'): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Customer Cancelled!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>


      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'finish-order'): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Order Finished!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>


      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'save-remark'): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Order Remark Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and ($_SESSION['toast'] == 'recieve-payment' or $_SESSION['toast'] == 'invalid-payment')): ?>
          $.toast({
            heading: 'UPDATED',
            text: 'Order Payment Status Updated!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'change-password-failed'): ?>
          $.toast({
            heading: 'PASSWORD CHANGE FAILED',
            text: 'Incorrect old password or new password and confirm password does not match!',
            position: 'top-center',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 5000, 
            stack: 6
          });
      <?php endif?>

      <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'add-payment'): ?>
            $.toast({
              heading: 'SAVED',
              text: 'Payment Saved!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'confirm-pick-up-date-order'): ?>
            $.toast({
              heading: 'UPDATED',
              text: 'Pick Up Date Confirmed!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'reschedule-pick-up-date'): ?>
            $.toast({
              heading: 'RESCHEDULED',
              text: 'Pick Up Date Rescheduled!',
              position: 'top-center',
              loaderBg:'#ff6849',
              icon: 'success',
              hideAfter: 5000, 
              stack: 6
            });
        <?php endif?>

        <?php if (isset($_SESSION['toast']) and $_SESSION['toast'] == 'set-shipping-fee'): ?>
            $.toast({
              heading: 'SAVED',
              text: 'Shipping Fee Set!',
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
<?php unset($_SESSION['toast']) ?>