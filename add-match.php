
<?php include('header.php'); ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Add Match Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascriptvoid(0)">Match</a></li>
<!--             <li class="breadcrumb-item">pages</li> -->
            <li class="breadcrumb-item active">Add</li>
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
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=add-match">

                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Shooter #:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="shooterNo"> 
                                </div>
                            </div>

                            <div class="col-8">
                                <div class="form-group">
                                    <label>Shooter Name:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="shooterName"> 
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Stage #:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="stageNo"> 
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
                                                    <input type="text" class="form-control form-control-line" name="ft1A">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft1M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft1P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft1Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT2</th>
                                            <td><div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft2A">
                                                </div></td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft2M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft2P">
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft2Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT3</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft3A">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft3M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft3P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft3Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT4</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft4A">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft4M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft4P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft4Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT5</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft5A">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft5M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft5P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft5Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT6</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft6A">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft6M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft6P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft6Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT7</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft7A">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft7M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft7P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft7Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT8</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft8A">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft8M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft8P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft8Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">FT9</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft9A">
                                                </div>
                                            </td>
                                            <td class="table-danger"></td>
                                            <td class="table-danger"></td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft9M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft9P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="ft9Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT1</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt1Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT2</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt2Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT3</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt3Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT4</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt4Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT5</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt5Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT6</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt6Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT7</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt7Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT8</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt8Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT9</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt9Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT10</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt10Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT11</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt11Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT12</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt12Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT13</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt13Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT14</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt14Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT15</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt15Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT16</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt16P">
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
                                                    <input type="text" class="form-control form-control-line" name="total1A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total1Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="table-info">PT18</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt18P">
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
                                                    <input type="text" class="form-control form-control-line" name="pt19A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt19Comment">
                                                </div>
                                            </td>
                                        </tr>

                                        
                                        <tr>
                                            <th class="table-info">PT20</th>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="pt20P">
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
                                                    <input type="text" class="form-control form-control-line" name="total2A">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2B">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2C">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2M">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2P">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-line" name="total2Comment">
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>


                		


                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>

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
