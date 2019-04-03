<?php 
include('header.php');

$db->select('product_sub_categories_view','*',NULL,'productSubCategoryId = "' . $_GET['productSubCategoryId'] . '"', NULL); 
$res = $db->getResult(); $res = $res[0];
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Update Sub Category</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Products</a></li>
            <li class="breadcrumb-item">Sub Categories</li>
            <li class="breadcrumb-item active">Update Sub Category</li>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                	<form autocomplete="off" class="form-material m-t-40" method="POST" action="controller.php?from=update-sub-category">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" required="" name="productCategoryId">
                                        <option value="<?php echo $res['productCategoryId'] ?>"><?php echo $res['productCategory']; ?></option>
                                        <?php 
                                        $db->sql('SELECT * FROM product_categories_table');
                                        $res1 = $db->getResult();
                                        foreach($res1 as $output){ ?>
                                            <option value="<?php echo $output["productCategoryId"] ?>"><?php echo $output["productCategory"]; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="form-group">
		                            <label>Sub Category:</label>
		                            <input type="text" class="form-control form-control-line" required="" name="productSubCategory" value="<?php echo $res['productSubCategory'] ?>"> 
		                        </div>
                        	</div>
                        </div>

                                               

                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Save Changes</button>

                    <input type="text" name="productSubCategoryId" value="<?php echo $res['productSubCategoryId'] ?>" hidden>


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
