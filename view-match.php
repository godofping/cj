<?php 
include('header.php');

$db->select('match_table','*',NULL,'matchId = "' . $_GET['matchId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">View Match Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascriptvoid(0)">Match</a></li>
            <li class="breadcrumb-item">View All</li>
            <li class="breadcrumb-item active">View</li>
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
                                    <p><?php echo $res['shooterNo'] ?></p>
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group">
                                    <label>Shooter Name:</label>
                                    <p><?php echo $res['shooterName'] ?></p>
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Stage #:</label>
                                    <p><?php echo $res['stageNo'] ?></p>
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
                                                    <p><?php echo $res['ft1A'] ?></p>
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft1M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft1P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft1Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT2</th>
                                            <td><div class="form-group">
                                                    <p><?php echo $res['ft2A'] ?></p>
                                                </div></td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <P><?php echo $res['ft2M'] ?></P>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <P><?php echo $res['ft2P'] ?></P>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <P><?php echo $res['ft2Comment'] ?></P>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT3</th>
                                            <td>
                                                <div class="form-group">
                                                    <P><?php echo $res['ft3A'] ?></P>
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <P><?php echo $res['ft3M'] ?></P>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <P><?php echo $res['ft3P'] ?></P>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <P><?php echo $res['ft3Comment'] ?></P>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT4</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft4A'] ?></p>
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft4M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft4P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <?php echo $res['ft4Comment'] ?>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT5</th>
                                            <td>
                                                <div class="form-group">
                                                    <?php echo $res['ft5A'] ?>
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft5M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft5P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft5Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT6</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft6A'] ?></p>
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft6M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft6P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft6Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT7</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft7A'] ?></p>
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft7M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft7P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft7Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT8</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft8A'] ?></p>
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft8M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft8P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft8Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT9</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft9A'] ?></p>
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft9M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft9P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['ft9Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT1</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt1A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt1B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt1C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt1M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt1P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt1Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT2</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt2A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt2B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt2C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt2M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt2P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt2Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT3</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt3A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt3B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt3C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt3M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt3P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt3Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT4</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt4A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt4B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt4C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt4M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt4P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt4Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT5</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt5A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt5B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt5C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt5M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt5P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt5Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT6</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt6A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt6B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt6C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt6M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt6P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt6Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT7</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt7A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt7B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt7C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt7M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt7P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt7Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT8</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt8A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt8B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt8C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt8M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt8P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt8Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT9</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt9A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt9B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt9C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt9M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt9P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt9Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT10</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt10A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt10B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt10C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt10M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt10P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt10Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT11</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt11A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt11B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt11C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt11M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt11P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt11Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table-info">PT12</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt12A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt12B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt12C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt12M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt12P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt12Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT13</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt13A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt13B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt13C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt13M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt13P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt13Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT14</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt14A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt14B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt14C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt14M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt14P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt14Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT15</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt15A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt15B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt15C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt15M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt15P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt15Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT16</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt16A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt16B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt16C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                   	<p><?php echo $res['pt16M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt16P'] ?></p>
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
                                                    <p><?php echo $res['total1A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['total1B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['total1C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['total1M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['total1P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                   	<p><?php echo $res['total1Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT18</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt18A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt18B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt18C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt18M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt18P'] ?></p>
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
                                                   	<p><?php echo $res['pt19A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt19B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt19C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt19M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt19P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt19Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                        
                                        <tr>
                                            <th class="table-info">PT20</th>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt20A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt20B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt20C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt20M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['pt20P'] ?></p>
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
                                                    <p><?php echo $res['total2A'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['total2B'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['total2C'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['total2M'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['total2P'] ?></p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <p><?php echo $res['total2Comment'] ?></p>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>


                	

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
