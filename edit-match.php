<?php 
include('header.php');

$db->select('match_table','*',NULL,'matchId = "' . $_GET['matchId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Edit Match Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascriptvoid(0)">Match</a></li>
            <li class="breadcrumb-item">View All</li>
            <li class="breadcrumb-item active">Edit</li>
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
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=edit-match">

                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Shooter #:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="shooterNo" value="<?php echo $res['shooterNo'] ?>"> 
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group">
                                    <label>Shooter Name:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="shooterName" value="<?php echo $res['shooterName'] ?>"> 
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Stage #:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="stageNo" value="<?php echo $res['stageNo'] ?>"> 
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                	<table class="table table-bordered color-table primary-table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th colspan="3">Points</th>
                                            <th colspan="2">Penalties</th>
                                            <th></th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Title -->
                                        <tr>
                                            <th class="table-info">Target</th>
                                            <th class="table-info">A</th>
                                            <th class="table-info">B</th>
                                            <th class="table-info">C</th>
                                            <th class="table-info">M</th>
                                            <th class="table-info">P</th>
                                            <th class="table-info">Comments</th>
                                        </tr>
                                        <!-- FT2 -->
                                        <tr>
                                            <th class="table-info">FT1</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft1A" value="<?php echo $res['ft1A'] ?>">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft1M" value="<?php echo $res['ft1M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft1P" value="<?php echo $res['ft1P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft1Comment" value="<?php echo $res['ft1Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT2</th>
                                            <td><div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft2A" value="<?php echo $res['ft2A'] ?>">
                                                </div></td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft2M" value="<?php echo $res['ft2M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft2P" value="<?php echo $res['ft2P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft2Comment" value="<?php echo $res['ft2Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT3</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft3A" value="<?php echo $res['ft3A'] ?>">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft3M" value="<?php echo $res['ft3M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft3P" value="<?php echo $res['ft3P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft3Comment" value="<?php echo $res['ft3Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT4</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft4A" value="<?php echo $res['ft4A'] ?>">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft4M" value="<?php echo $res['ft4M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft4P" value="<?php echo $res['ft4P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft4Comment" value="<?php echo $res['ft4Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT5</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft5A" value="<?php echo $res['ft5A'] ?>">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft5M" value="<?php echo $res['ft5M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft5P" value="<?php echo $res['ft5P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft5Comment" value="<?php echo $res['ft5Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT6</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft6A" value="<?php echo $res['ft6A'] ?>">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft6M" value="<?php echo $res['ft6M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft6P" value="<?php echo $res['ft6P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft6Comment" value="<?php echo $res['ft6Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT7</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft7A" value="<?php echo $res['ft7A'] ?>">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft7M" value="<?php echo $res['ft7M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft7P" value="<?php echo $res['ft7P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft7Comment" value="<?php echo $res['ft7Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT8</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft8A" value="<?php echo $res['ft8A'] ?>">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft8M" value="<?php echo $res['ft8M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft8P" value="<?php echo $res['ft8P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft8Comment" value="<?php echo $res['ft8Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT9</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft9A" value="<?php echo $res['ft9A'] ?>">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft9M" value="<?php echo $res['ft9M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft9P" value="<?php echo $res['ft9P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft9Comment" value="<?php echo $res['ft9Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT1</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1A" value="<?php echo $res['pt1A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1B" value="<?php echo $res['pt1B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1C" value="<?php echo $res['pt1C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1M" value="<?php echo $res['pt1M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1P" value="<?php echo $res['pt1P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1Comment" value="<?php echo $res['pt1Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT2</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2A" value="<?php echo $res['pt2A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2B" value="<?php echo $res['pt2B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2C" value="<?php echo $res['pt2C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2M" value="<?php echo $res['pt2M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2P" value="<?php echo $res['pt2P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2Comment" value="<?php echo $res['pt2Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT3</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3A" value="<?php echo $res['pt3A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3B" value="<?php echo $res['pt3B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3C" value="<?php echo $res['pt3C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3M" value="<?php echo $res['pt3M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3P" value="<?php echo $res['pt3P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3Comment" value="<?php echo $res['pt3Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT4</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4A" value="<?php echo $res['pt4A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4B" value="<?php echo $res['pt4B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4C" value="<?php echo $res['pt4C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4M" value="<?php echo $res['pt4M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4P" value="<?php echo $res['pt4P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4Comment" value="<?php echo $res['pt4Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT5</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5A" value="<?php echo $res['pt5A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5B" value="<?php echo $res['pt5B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5C" value="<?php echo $res['pt5C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5M" value="<?php echo $res['pt5M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5P" value="<?php echo $res['pt5P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5Comment" value="<?php echo $res['pt5Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT6</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6A" value="<?php echo $res['pt6A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6B" value="<?php echo $res['pt6B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6C" value="<?php echo $res['pt6C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6M" value="<?php echo $res['pt6M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6P" value="<?php echo $res['pt6P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6Comment" value="<?php echo $res['pt6Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT7</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7A" value="<?php echo $res['pt7A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7B" value="<?php echo $res['pt7B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7C" value="<?php echo $res['pt7C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7M" value="<?php echo $res['pt7M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7P" value="<?php echo $res['pt7P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7Comment" value="<?php echo $res['pt7Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT8</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8A" value="<?php echo $res['pt8A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8B" value="<?php echo $res['pt8B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8C" value="<?php echo $res['pt8C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8M" value="<?php echo $res['pt8M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8P" value="<?php echo $res['pt8P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8Comment" value="<?php echo $res['pt8Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT9</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9A" value="<?php echo $res['pt9A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9B" value="<?php echo $res['pt9B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9C" value="<?php echo $res['pt9C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9M" value="<?php echo $res['pt9M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9P" value="<?php echo $res['pt9P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9Comment" value="<?php echo $res['pt9Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT10</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10A" value="<?php echo $res['pt10A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10B" value="<?php echo $res['pt10B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10C" value="<?php echo $res['pt10C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10M" value="<?php echo $res['pt10M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10P" value="<?php echo $res['pt10P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10Comment" value="<?php echo $res['pt10Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT11</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11A" value="<?php echo $res['pt11A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11B" value="<?php echo $res['pt11B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11C" value="<?php echo $res['pt11C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11M" value="<?php echo $res['pt11M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11P" value="<?php echo $res['pt11P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11Comment" value="<?php echo $res['pt11Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info">PT12</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12A" value="<?php echo $res['pt12A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12B" value="<?php echo $res['pt12B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12C" value="<?php echo $res['pt12C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12M" value="<?php echo $res['pt12M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12P" value="<?php echo $res['pt12P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12Comment" value="<?php echo $res['pt12Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT13</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13A" value="<?php echo $res['pt13A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13B" value="<?php echo $res['pt13B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13C" value="<?php echo $res['pt13C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13M" value="<?php echo $res['pt13M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13P" value="<?php echo $res['pt13P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13Comment" value="<?php echo $res['pt13Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT14</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14A" value="<?php echo $res['pt14A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14B" value="<?php echo $res['pt14B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14C" value="<?php echo $res['pt14C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14M" value="<?php echo $res['pt14M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14P" value="<?php echo $res['pt14P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14Comment" value="<?php echo $res['pt14Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT15</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15A" value="<?php echo $res['pt15A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15B" value="<?php echo $res['pt15B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15C" value="<?php echo $res['pt15C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15M" value="<?php echo $res['pt15M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15P" value="<?php echo $res['pt15P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15Comment" value="<?php echo $res['pt15Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT16</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16A" value="<?php echo $res['pt16A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16B" value="<?php echo $res['pt16B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16C" value="<?php echo $res['pt16C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16M" value="<?php echo $res['pt16M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16P" value="<?php echo $res['pt16P'] ?>">
                                                </div>
                                            </td>
                                            <th class="table-info">
                                                Hit + Miss
                                            </th>
                                        </tr>

                                        <tr>
                                            <th class="table-info">Total</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1A" value="<?php echo $res['total1A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1B" value="<?php echo $res['total1B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1C" value="<?php echo $res['total1C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1M" value="<?php echo $res['total1M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1P" value="<?php echo $res['total1P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1Comment" value="<?php echo $res['total1Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT18</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18A" value="<?php echo $res['pt18A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18B" value="<?php echo $res['pt18B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18C" value="<?php echo $res['pt18C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18M" value="<?php echo $res['pt18M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18P" value="<?php echo $res['pt18P'] ?>">
                                                </div>
                                            </td>
                                            <th class="table-info">
                                                Max Pts.
                                            </th>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT19</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19A" value="<?php echo $res['pt19A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19B" value="<?php echo $res['pt19B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19C" value="<?php echo $res['pt19C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19M" value="<?php echo $res['pt19M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19P" value="<?php echo $res['pt19P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19Comment" value="<?php echo $res['pt19Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                        
                                        <tr>
                                            <th class="table-info">PT20</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20A" value="<?php echo $res['pt20A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20B" value="<?php echo $res['pt20B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20C" value="<?php echo $res['pt20C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20M" value="<?php echo $res['pt20M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20P" value="<?php echo $res['pt20P'] ?>">
                                                </div>
                                            </td>
                                            <th class="table-info">
                                                Time
                                            </th>
                                        </tr>

                                        <tr>
                                            <th class="table-info">Total</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2A" value="<?php echo $res['total2A'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2B" value="<?php echo $res['total2B'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2C" value="<?php echo $res['total2C'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2M" value="<?php echo $res['total2M'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2P" value="<?php echo $res['total2P'] ?>">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2Comment" value="<?php echo $res['total2Comment'] ?>">
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>


                		


                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>
                        <input type="text" name="matchId" value="<?php echo $res['matchId'] ?>" hidden>

                    </form>
        
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
         
<?php include('footer.php'); ?>
