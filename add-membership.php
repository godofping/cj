
<?php include('header.php'); ?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Add Membership Form</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascriptvoid(0)">Membership</a></li>
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
                    <form autocomplete="off" enctype="multipart/form-data" class="form-material m-t-40" method="POST" action="controller.php?from=add-membership">

                        <div class="row">
                            <div class="col-6">
                                 <span class="help-block text-muted"><small>&nbsp;</small></span>
                                <div class="demo-radio-button">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="radio" class="with-gap" id="psmoc" name="psmocOrmoo" value="PSMOC" checked="" required="" />
                                            <label for="psmoc">PSMOC</label>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input name="newOrRenewal" type="radio" class="with-gap" id="radio_1" checked="" value="NEW"/>
                                                    <label for="radio_1">NEW</label>
                                                <input name="newOrRenewal" type="radio" class="with-gap" id="radio_2" value="RENEWAL" />
                                                    <label for="radio_2">RENEWAL</label>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label>PSMOC ID No. (For Existing Member):</label>
                                                <input type="text" class="form-control form-control-line" name="psmocId"> 
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label>Expiry Date:</label>
                                                <input type="date" class="form-control form-control-line" name="expiryDate"> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Place of Application / Seminar & Workshop:</label>
                                                <input type="text" class="form-control form-control-line" name="placeOfApplicationOrSeminarAndWorkShop"> 
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 bg-light">
                                 <span class="help-block text-muted"><small>For MOO applicant only</small></span>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="demo-radio-button">
                                            <input type="radio" class="with-gap" id="moo" name="psmocOrmoo" value="MOO"/>
                                            <label for="moo">MOO</label> 
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Exam Score:</label>
                                            <input type="text" class="form-control form-control-line" name="examScore"> 
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-check">
                                                <input name="passedFailedIncomplete" type="radio" class="with-gap" id="PASSED" value="PASSED" />
                                                    <label for="PASSED">PASSED</label>
                                                <input name="passedFailedIncomplete" type="radio" class="with-gap" id="FAILED" value="FAILED" />
                                                    <label for="FAILED">FAILED</label>
                                                <input name="passedFailedIncomplete" type="radio" class="with-gap" id="INCOMPLETE" value="INCOMPLETE" />
                                                    <label for="INCOMPLETE">INCOMPLETE</label>
                                            </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Local T-Shirt Size:</label>
                                            <input type="text" class="form-control form-control-line" name="localTshirtSize"> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label>Zone (Please ask the MOO Staff):</label>
                                            <input type="text" class="form-control form-control-line" name="zone"> 
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label>District:</label>
                                            <input type="text" class="form-control form-control-line" name="district"> 
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Family Name:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="familyName"> 
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Middle Name:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="middleName"> 
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>First Name / Given Name:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="firstName"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Place of Birth:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="placeOfBirth"> 
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Date of Birth:</label>
                                    <input type="date" class="form-control form-control-line" required="" name="dateOfBirth"> 
                                </div>
                            </div>

                            <div class="col-1">
                                <div class="form-group">
                                    <label>Age:</label>
                                    <input type="number" class="form-control form-control-line" required="" name="age"> 
                                </div>
                            </div>

                            <div class="col-1">
                                <div class="form-group">
                                    <label>Sex:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="sex"> 
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Status:</label>
                                    <input type="text" class="form-control form-control-line" required="" name="status"> 
                                </div>
                            </div>

                            <div class="col-2">
                                <div class="form-group">
                                    <label>Blood Type:</label>
                                    <input type="text" class="form-control form-control-line" name="bloodType"> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Complete Home Address:</label>
                                    <input type="text" class="form-control form-control-line" name="completeHomeAddress">
                                    <span class="help-block text-muted"><small>No. Street Name / Bldg. Name / Condo / Subdivision / Barangay / City / Town / Province</small></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Occupation / Position:</label>
                                    <input type="text" class="form-control form-control-line" name="occupationOrPosition">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Company / Organization:</label>
                                    <input type="text" class="form-control form-control-line" name="nameOfCompanyOrOrganiztion">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Complete Office / Business Address:</label>
                                    <input type="text" class="form-control form-control-line" name="completeOfficeOrBusinessAddress">
                                    <span class="help-block text-muted"><small>No. Street Name / Bldg. Name / Condo / Subdivision / Barangay / City / Town / Province</small></span>
                                </div>
                            </div>
                        </div>

   

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Mobile / Landline No.:</label>
                                    <input type="text" class="form-control form-control-line" name="mobileLandlineNo">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Email Address:</label>
                                    <input type="text" class="form-control form-control-line" name="emailAddress">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Gun Club:</label>
                                    <input type="text" class="form-control form-control-line" name="nameOfGunClub">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Address:</label>
                                    <input type="text" class="form-control form-control-line" name="address">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Type:</label>
                                    <input type="text" class="form-control form-control-line" name="type">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Make / Model:</label>
                                    <input type="text" class="form-control form-control-line" name="makeModel">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Caliber:</label>
                                    <input type="text" class="form-control form-control-line" name="calibre">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Serial Number:</label>
                                    <input type="text" class="form-control form-control-line" name="serialNumber">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>LIOPF Number:</label>
                                    <input type="text" class="form-control form-control-line" name="LIOPFNumber">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label>Type of License:</label>
                                    <input type="text" class="form-control form-control-line" name="typeOfLicense">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Number of Years as a Gun Club Member:</label>
                                    <input type="text" class="form-control form-control-line" name="numberOfYearsAsAGunClubMember">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Are you a licensed shooter?</label>
                                    <select class="form-control" name="licensedShooter">
                                        <option>YES</option>
                                        <option>NO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of Gun Club President:</label>
                                    <input type="text" class="form-control form-control-line" name="nameOfGunClubPresident">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>Name of MOO Instructor:</label>
                                    <input type="text" class="form-control form-control-line" name="nameOfMOOInstructor">
                                </div>
                            </div>
                        </div>

                        <style type="text/css">
                            #center p{
                                text-align: center;
                            }
                        </style>
                        <div class="row" id="center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Applicant Signature:</label>
                                    <input type="file" id="input-file-now" class="dropify" name="applicantSignature" />
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>2" x 2" White Background Picture:</label>
                                    <input type="file" id="input-file-now" class="dropify" name="whiteBackgroundPicture" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>PSMOC Secretary:</label>
                                    <input type="text" class="form-control form-control-line" name="psmocSecretary">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label>PSMOC President:</label>
                                    <input type="text" class="form-control form-control-line" name="psmocPresident">
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
<script type="text/javascript">
    $('.dropify').dropify();
</script>

<script type="text/javascript">
    
    $('#psmoc').click(function(){
       $("#PASSED").prop('checked', false);
       $("#FAILED").prop('checked', false);
       $("#INCOMPLETE").prop('checked', false);
    });


    if($('#psmoc').prop("checked")) {
        $("#PASSED").prop('checked', false);
        $("#FAILED").prop('checked', false);
        $("#INCOMPLETE").prop('checked', false);
    }


    $('#PASSED').click(function(){
        if($('#psmoc').prop("checked")) {
            $("#PASSED").prop('checked', false);
        }
    });

    $('#FAILED').click(function(){
        if($('#psmoc').prop("checked")) {
            $("#FAILED").prop('checked', false);
        }
    });

    $('#INCOMPLETE').click(function(){
        if($('#psmoc').prop("checked")) {
            $("#INCOMPLETE").prop('checked', false);
        }
    });

</script>




