<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			
			<h1 class="page-header">Product Info</h1>
			
			<div class="row">
				<div class="col-lg-12"><!--table--> 

					<a class="btn btn-primary" style="margin-bottom: 15px;" href="<?php echo base_url('admin/product/add');?>"> Add</a>
					<?php if($this->session->flashdata('statusMsg')){?>
					<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong><?php echo $this->session->flashdata('statusMsg'); ?></strong> 
	            	<!-- <div class="alert alert-success" role="alert">
	            		
	            	</div>
	            --> 

	        </div>  
	        <?php }?>   
	        <div class="panel panel-primary"><!--panel-->
	        	<div class="panel-heading">Product Information</div>

	        	<div class="panel-body table-responsive">
	        		<table class="table table-hover" id="mydata">
	        			<thead>
	        				<tr>
	        					<th>No</th>
	        					<th>Code</th>
	        					<th>Product</th>
	        					<th>Category</th>
	        					<th>Image</th>
	        					<th>Media Type</th>
	        					<th>Price($)</th>
	        					<th>Status</th>
	        					<th>User add</th>
	        					<th>Date add</th>
	        					<th>Action</th>
	        				</tr>
	        			</thead>
	        			<tbody>
	        				<?php $i=1; foreach ($product as $value) {?>
	        				<tr>
	        					<td><?php echo $i++;?></td>
	        					<td><a href="<?php echo base_url('admin/product/detial/'.$value->p_id);?>"><?php echo $value->p_code?></a></td>
	        					<td><a href="<?php echo base_url('admin/product/detial/'.$value->p_id);?>"><?php echo $value->p_name?></a></td>
	        					<td><?php echo $value->cat_name?></td>
	        					<td>
	        						<?php if($value->media_type==image){?>
	        						<img src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" style="width: 40px;">
	        						<?php }elseif ($value->media_type==video) {?>
	        						<video width="100" controls>
	        							<source src="<?php echo base_url('assets/uploads/'.$value->file_name); ?>" type="video/mp4">
	        								<source src="mov_bbb.ogg" type="video/ogg">

	        								</video>
	        								<?php }?>

	        							</td>
	        							<td><?php echo $value->media_type;?></td>
	        							<td><?php echo "$".$value->price?></td>
	        							<td><?php if($value->p_status==1){ ?>
	        								<i style="color:#58b358;" title="Public" class="fa fa-check-circle-o"></i>
	        								<?php }else if($value->p_status==0){?>
	        								<i style="color:red;" title="UnPublic" class="fa fa-times-circle"></i>
	        								<?php }?>
	        								
	        								<td><?php echo $value->user_crea?></td>
	        								<td><?php echo $value->date_crea?></td>
	        								<td>
	        								<a href="<?php echo base_url('admin/Product/edit/'.$value->p_id);?>" class="btn">
	        										<i class="fa fa-pencil"></i>
	        									</a>
	        									<a href="<?php echo base_url('admin/Product/delete/'.$value->p_id);?>" class="confirModal del" data-confirm-title="Confirm Delete !" data-confirm-message="Are you sure you want to Delete this ?">
	        										<i style="color: red;" class="fa fa-trash"></i>
	        									</a>
	        								</td>
	        							</tr>
	        							<?php }?>
	        						</tbody>
	        					</table>
	        				</div>
	        			</div>
	        		</div>
	        	</div> 

	        </div>
	    </div>
	</div> 
	<script>
		$(document).ready(function(){
        //data table
        $('#mydata').DataTable();
        //comfirm delete
        $('.del').confirmModal(); 
    });
	</script>