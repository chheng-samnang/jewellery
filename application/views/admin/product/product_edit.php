<?php
error_reporting(0);
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
							<!-- <?php echo form_open('admin/Product/edit_value/'.$edit_product->p_id)?> -->
							<form enctype="multipart/form-data" action="<?php echo base_url('admin/Product/edit_value/'.$edit_product->p_id);?>" method="post">
							<input type="text" name="p_id" id="p_id" value="<?php echo $edit_product->p_id?>">
							<div class="form-group">
								
								<div class="row">
									<div class="col-md-4">
										<label for="txt_product_code">Product Code</label>
										<input class="form-control" value="<?php echo $edit_product->p_code?>" type="text" name="txt_product_code" id="txt_product_code">
									</div>
									<div class="col-md-4">
										<label for="txt_product_name">Product Name</label>
										<input class="form-control" value="<?php echo $edit_product->p_name?>" type="text" name="txt_product_name" id="txt_product_name">
									</div>
									<div class="col-md-4">
										<label for="txt_product_name">Price ($)</label>
										<input class="form-control" value="<?php echo $edit_product->price?>" type="number" name="txt_price" id="txt_price">
									</div>
								</div>
								<div class="row" style="margin-top: 15px;">
									<div class="col-md-4">
										<label for="status">Status</label>
										<select class="form-control" name="status" id="status">
											<?php if($edit_product->p_status==1){?>
											<option value="1">Public</option>
											<option value="0">UnPublic</option>
											<?php }else{?>
											<option value="0">UnPublic</option>
											<option value="1">Public</option>
											<?php }?>
										</select>
									</div>
									<div class="col-md-4">
										<label for="status">Media Type</label>
										<!-- <input type="" value="<?php echo $get_media->media_type;?>"> -->
										<select class="form-control" name="media_type" id="media_type">
											<?php if($get_media->media_type==image){?>

											<option value="image">Image</option>
											<option value="video" >Video</option>
											<?php }else {?>
											<option value="video">Video</option>
											<option value="image">Image</option>

											<?php }?>
										</select>
									</div>
									<div class="col-md-4">
										<label for="category">Category Name</label>
										<select class="form-control" name="category" id="category">
											<option value="0">Choose One</option>
											<?php foreach ($cat as $value) {?>
											<option value="<?php echo $value->cat_id?>"<?php if($value->cat_id==$edit_product->cat_id)  echo "selected";?>  ><?php echo $value->cat_name?></option>
											<?php }?> 
										</select>
									</div>
								</div>
								<div class="" style="margin-top: 15px;">
									<div class="panel panel-default">
										<div class="panel-body">
											<label>Media Type </label><hr />
											<input style="width: 20%; " type="file" class="form-control" name="userFiles[]" id="userFiles[]" multiple/>
											<?php foreach ($get_media as $value) {?>
											<div class="" style="width: 11.9%; margin-left: 5px; float: left;">
												<?php if($value->media_type=="image"){?>



												<img class="thumbnail" src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" style=" height: 79px; margin-bottom: 0px; margin-top: 10px;">	
												<button onclick="delenquiry(<?php echo $value->media_id?>)">Remove</button>
												
												<!-- <a href="<?php echo base_url('admin/product/delete_media/'.$value->media_id);?>"><span class="glyphicon glyphicon-remove-sign" style="color: red; font-size: 19px;"></span></a>								 -->
												<?php }elseif($value->media_type=="video"){?>


												<video width="120" controls style="margin-top: 10px;">
													<source src="<?php echo base_url('assets/uploads/'.$value->file_name); ?>" type="video/mp4">
														<source src="mov_bbb.ogg" type="video/ogg">

														</video>
														<a href="<?php echo base_url('admin/product/delete_media/'.$value->media_id);?>"><span class="glyphicon glyphicon-remove-sign" style="color: red; font-size: 19px;"></span></a>								
														<?php }?>
													</div>
													<?php }?>
												</div>
											</div>
										</div>
										<div class="row" style="    margin-top: 15px;">
											<div class="col-md-12">
												<label>Description</label>

												<textarea type="textarea" class="textarea"  name="desc" rows="4" cols="4"><?php echo $edit_product->p_desc?></textarea>
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
	<script>
	function delenquiry(media_id) {
   
        $.ajax({
        	url:"<?php echo base_url('admin/product/delete_media/'.$value->media_id);?>",
           // url: base_url + 'admin/product/delete_media',
            type: 'post',
            //data: media_id,
            // success: function () {
            //     alert('ajax success');
            // },
            // error: function () {
            //     alert('ajax failure');
            // }
        });
   
}
</script>