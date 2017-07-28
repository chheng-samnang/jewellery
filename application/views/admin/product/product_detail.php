<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			
			<h1 class="page-header">Product Detail</h1>
			
			<div class="row">
				<div class="col-lg-12"><!--table-->
					<div class="panel panel-primary"><!--panel-->
	        			<div class="panel-heading">Product Detail</div>
			        	<div class="panel-body table-responsive">
				        	<div class="col-md-4">
				        		<p>Product Code:  <?php echo $product->p_code;?></p>
				        		<p>Product Name:  <?php echo $product->p_name;?></p>
				        		<p>Category Name:  <?php echo $product->cat_name;?></p>
				        		<p>Price($):  <i style="color: red;"><?php echo "$".$product->price;?></i></p>
				        		<p>User Create:  <?php echo $product->user_crea;?></p>
				        		<p>Status:  <?php if($product->p_status==1){ echo "<i style='color: #1dce25;'>Public</i>";}else if($product->p_status==0){ echo "UnPublic";}?></p>
				        	</div>
				        	<div class="col-md-8">
			        		
			        		<?php foreach ($detail_p as  $value) {?>
			        			<?php if($value->media_type=="image"){?>
			        				<div class="col-md-2 thumbnail">
			        					<img src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" style="    width: 80px;">
			        				</div>
			        			<?php }else if($value->media_type=="video") {?>
			        				<video width="200" controls>
					                    <source src="<?php echo base_url('assets/uploads/'.$value->file_name); ?>" type="video/mp4">
					                    <source src="mov_bbb.ogg" type="video/ogg">
					                </video>
			        			<?php }?>
			        		<?php }?>
			        		</div>

			        		<div class="col-md-12">
			        			<p>Desciption</p><hr />
			        			<p><?php echo $product->p_desc;?></p>
			        		</div>

			        	</div>
	        		</div>
	        	</div>
			</div>
		</div>
	</div>
</div> 