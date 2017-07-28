<?php error_reporting(0);?>
<section id="wrapper">
	<nav data-depth="5" class="breadcrumb hidden-sm-down">
		<ol itemscope="">
			<li itemprop="itemListElement">
				<a itemprop="item" href="<?php echo base_url();?>">
					<span itemprop="name">Home</span>
				</a>
				<meta itemprop="position" content="1">
			</li>
			<li itemprop="itemListElement">
				<a itemprop="item" href="#">
					<span itemprop="name">dfdsfsdf</span>
				</a>
				<meta itemprop="position" content="2">
			</li>
			<li itemprop="itemListElement">
				<a itemprop="item" href="#">
					<span itemprop="name">Dresses</span>
				</a>
				<meta itemprop="position" content="3">
			</li>
			<li itemprop="itemListElement">
				<a itemprop="item" href="#">
					<span itemprop="name"><?php echo $detail->p_name?></span>
				</a>
				<meta itemprop="position" content="5">
			</li>
		</ol>
	</nav>
	<div class="container" id="container">
		<div id="content-wrapper">
			<section id="main">
				<div class="col-xs-12 col-sm-5 col-md-6 pb-left-column">
					<section class="page-content" id="content">
						<ul class="product-flags">
							<li class="product-flag on-sale">On sale!</li>
						</ul>
						<div class="images-container">

							<div class="product-cover">
								
								<img class="js-qv-product-cover" src="<?php echo base_url('assets/uploads/'.$detail->file_name);?>" alt="" title="" style="height: 406px" itemprop="image">
								
							</div>

						<!-- 	<div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
								<i class="fa fa-search-plus zoom-in"></i>
							</div> -->

							<div class="js-qv-mask mask scroll">
								<ul id="tt-jqzoom" class="product-images js-qv-product-images">
									<?php foreach ($sub_image as $value) {?>
									<?php if($value->media_type==image){?>
									<li class="thumb-container">
										<img class="thumb js-thumb " data-image-medium-src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" data-image-large-src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" alt="" title="" width="100" itemprop="image">
									</li>
									<?php } }?>

								</ul>
							</div>
						</div>
						<div class="scroll-box-arrows scroll">
							<i class=" fa fa-angle-left left"></i>
							<i class="fa fa-angle-right right"></i>
						</div>
					</section>
					
				</div>
				<div class="col-xs-12 col-sm-7  col-md-6 pb-right-column">
				<h1 class="tt-producttitle" itemprop="name"><?php echo $detail->p_name?></h1>
					<div class="product-prices">

						<div class="product-discount">

							<span class="regular-price"><?php echo "$".$detail->price?></span>
						</div>

						<div class="product-price h5 has-discount" itemprop="offers" itemscope="" itemtype="">
							<link itemprop="availability" href="">
							<meta itemprop="priceCurrency" content="USD">
							<div class="current-price">
								<span itemprop="price" content="599.49"><?php echo "$".$detail->price?></span>
								<span class="discount discount-amount">Save $0.50</span>
							</div>
						</div>
						<div class="tax-shipping-delivery-label"> </div>
					</div>
					<div class="product-information">
						<div id="product-description-short-19" itemprop="description">
							<p>molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p></div>
							<div class="product-actions">
								<form action="" method="post" id="add-to-cart-or-refresh">
									<input type="hidden" name="token" value="7a1f0e363068fa56cb89440744056fe2">
									<input type="hidden" name="id_product" value="19" id="product_page_product_id">
									<input type="hidden" name="id_customization" value="0" id="product_customization_id">

									<div class="product-variants"></div>
									<section class="product-discounts"> </section>
									<div class="social-sharing">
										<span>Share</span>
										<ul>
											<li class="facebook icon-gray"><a href="" class="text-hide" title="Share" target="_blank">Share</a></li>
											<li class="twitter icon-gray"><a href="https://twitter.com/intent/tweet?text=magni dolores eosquies http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/evening-dresses/19-printed-dress.html" class="text-hide" title="Tweet" target="_blank">Tweet</a></li>
											<li class="googleplus icon-gray"><a href="https://plus.google.com/share?url=http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/evening-dresses/19-printed-dress.html" class="text-hide" title="Google+" target="_blank">Google+</a></li>
											<li class="pinterest icon-gray"><a href="http://www.pinterest.com/pin/create/button/?media=http://demo.templatetrip.com/Prestashop/PRS003/PRS01/367/printed-dress.jpg&amp;url=http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/evening-dresses/19-printed-dress.html" class="text-hide" title="Pinterest" target="_blank">Pinterest</a></li>
										</ul>
									</div>
									<input class="product-refresh ps-hidden-by-js" name="refresh" type="submit" value="Refresh" style="display: none;">

								</form>
							</div>
						</div>
						<?php foreach ($sub_image as $value) {?>
						<?php if($value->media_type==video){?>
								<video width="420" controls style="margin-top: 10px;">
													<source src="<?php echo base_url('assets/uploads/'.$value->file_name); ?>" type="video/mp4">
														<source src="mov_bbb.ogg" type="video/ogg">

														</video>
														<iframe width="460" height="315" src="https://www.youtube.com/embed/2465kWsFsCY" frameborder="0" allowfullscreen></iframe>
						<?php } }?>
					</div>
					<div class="col-md-12">
						<div class="col-md-6">
						<h5>Comment</h5><hr />
						<p id="comment_text">

							<?php foreach ($select_comment as $value) {?>
							<p> 
								<a href="#" class="thumbnail">
	      								<img style="width: 40px;" src="<?php echo base_url('assets/uploads/avatar_2x.png');?>" alt="...">
	    						</a>
	    							<?php echo $value->date_crea; ?>
	    							<?php echo $value->cm_desc;?><br />
	    									<a href="#" style="color: #365899">Replay</a>
	    					</p>
						<?php }?>
							</p>
						<form method="post" id="commment_form">
						
						

					<!-- 	<input type="audio" accept="audio/*" capture="microphone">  -->

						<textarea style="width: 511px;" name="cm_desc" id="cm_desc"> </textarea>
						<input type="hidden"  name="p_id" value="<?php echo $detail->p_id?>" id="p_id">
						<br />
						<br />

						<input type="submit" class="btn btn-primary" name="upload" id="upload" value="POST">
						</form>
						</div>
					</div>

					<div class="ttcmsrightbanner col-xs-12 col-sm-4 col-md-3" style="">
						<div id="ttcmsrightbanner">
							<div class="ttproduct-banner">
								<div class="customNavigation"><a class="btn prev ttproductbanner_prev"><i class="icon-angle-left"> </i></a> <a class="btn next ttproductbanner_next"><i class="icon-angle-right"> </i></a></div>

							</div>
						</div>
					</div>	
				</div>
				<!-- <div class="modal fade js-product-images-modal" id="product-modal" aria-hidden="true" style="display: none;">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-body">
								<aside id="thumbnails" class="thumbnails js-thumbnails text-xs-center">
									<div class="js-modal-mask mask  nomargin ">
										<ul class="product-images js-modal-product-images">
											<?php foreach ($sub_image as $value) {?>
											<li class="thumb-container">
												<img data-image-large-src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" class="thumb js-modal-thumb" src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" alt="" title="" width="270" itemprop="image">
											</li>
											<?php }?>
										</ul>
									</div>
								</aside>
							</div>
						</div>
					</div>
				</div> -->
			</section>
<script>
	$(document).ready(function()
		{
			$('#commment_form').on('submit', function(e)
			{
				e.preventDefault();
				
				
				if($('#cm_desc').val()!="")
				{

					$.ajax({
						url:"<?php echo base_url('detail/'.$detail->p_id);?>",
						method: "post",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData:false,

						success:function(data){
							$('#cm_desc').val("");

						}
					});
				}
			});
		});
</script>
