<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Add Product</h1>
			<div class="row">
				<div class="col-lg-12">

					<?php if(form_error('txt_product_name')){?>
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>Warning!</strong> <?php echo form_error('txt_product_name');?>
					</div>
					<?php }?>
					<div class="panel panel-primary"><!--panel-->
						<div class="panel-heading">Product Information</div>
						<div class="panel-body table-responsive">

							<form enctype="multipart/form-data" action="" method="post">
								<div class="form-group">
									<!-- <input type="text" name="p_id" value="<?php echo $pro->p_id?>">  -->
									<div class="row">
										<div class="col-md-4">
											<label for="txt_product_code">Product Code</label>
											<input class="form-control" type="text" name="txt_product_code" id="txt_product_code">
										</div>
										<div class="col-md-4">
											<label for="txt_product_name">Product Name</label>
											<input class="form-control" type="text" name="txt_product_name" id="txt_product_name">
										</div>
										<div class="col-md-4">
											<label for="txt_product_name">Price ($)</label>
											<input class="form-control" type="number" name="txt_price" id="txt_price">
										</div>
									</div>
									<div class="row" style="margin-top: 15px;">
										<div class="col-md-4">
											<label for="status">Status</label>
											<select class="form-control" name="status" id="status">
												<option value="1">Public</option>
												<option value="0">UnPublic</option>
											</select>
										</div>

										<div class="col-md-4">
											<label for="category">Category Name</label>
											<select class="form-control" name="category" id="category">
												<option value="0">Choose One</option>
												<?php foreach ($cat as $value) {?>
													<option value="<?php echo $value->cat_id?>"><?php echo $value->cat_name?></option>
												<?php }?>
											</select>
										</div>
										<div class="col-md-4">
											<label>Choose Image</label>
											<input type="file" class="form-control" name="userFiles[]" multiple/>
										</div>
										<div class="col-md-4">
											<label>Choose Video</label>
											<!-- <input type="text" name="userFiles1"> -->
											<input type="file" class="form-control" name="userFiles1">
										</div>
									</div>
									
									<div class="row" style="    margin-top: 15px;">
										<div class="col-md-12">
											<label>Description</label>

											<textarea type="textarea" class="textarea"  name="desc" rows="4" cols="4"></textarea>
										</div>
									</div>
								</div>
								<div class="row"><hr />
									<div class="col-md-12">
										<div class="form-group">
											<input class="btn btn-success" type="submit" name="fileSubmit" value="Save"/>
										</div>
									</div>
								</div><!-- row -->
							</form><!-- form -->
						</div><!-- panel-body table-responsive-->
					</div><!-- panel panel-primary -->
				</div><!-- col-lg-12 -->
			</div><!-- Row -->
		</div><!-- col-lg-12 -->
	</div><!-- row -->
</div><!-- page-wrapper -->