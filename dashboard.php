
<?php include('header.php'); ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
<!--             <li class="breadcrumb-item">pages</li> -->
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
   
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Welcome to CJ-Ashley Fashion Hub System</h1>
                    
                </div>
            </div>
        </div>
    </div>


    <?php 
    $db->sql('select count(*) as total from match_sanctioning_table'); 
    $res = $db->getResult(); $res = $res[0]; 
    ?>
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi mdi-crosshairs-gps text-info"></i></h2>
                        <h3 class=""><?php echo $res['total']; ?></h3>
                        <h6 class="card-subtitle">Match Sanctioning</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <?php 
        $db->sql('select count(*) as total from gun_club_affiliation_table'); 
        $res = $db->getResult(); $res = $res[0]; 
        ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-alert-circle text-success"></i></h2>
                        <h3 class=""><?php echo $res['total']; ?></h3>
                        <h6 class="card-subtitle">Gun Club Affiliation</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <?php 
        $db->sql('select count(*) as total from match_remittance_sanctioning_table'); 
        $res = $db->getResult(); $res = $res[0]; 
        ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-wallet text-purple"></i></h2>
                        <h3 class=""><?php echo $res['total']; ?></h3>
                        <h6 class="card-subtitle">Match Remittance Sanctioning</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="100" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <?php 
        $db->sql('select count(*) as total from membership_table'); 
        $res = $db->getResult(); $res = $res[0]; 
        ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-buffer text-warning"></i></h2>
                        <h3 class=""><?php echo $res['total']; ?></h3>
                        <h6 class="card-subtitle">Membership</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <?php 
        $db->sql('select count(*) as total from match_table'); 
        $res = $db->getResult(); $res = $res[0]; 
        ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h2 class="m-b-0"><i class="mdi mdi-buffer text-secondary"></i></h2>
                        <h3 class=""><?php echo $res['total']; ?></h3>
                        <h6 class="card-subtitle">Match</h6></div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

   
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
         
<?php include('footer.php'); ?>
