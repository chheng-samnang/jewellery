<section id="wrapper">
	<div class="full-container">
		<div id="content-wrapper">
			<section id="main">

				<section class="ttspecial-products clearfix">
					<div class="container" id="container">
					
						<?php 
							if($search_product !=NULL)
							{
								echo "<h2>Search....</h2>";
								foreach ($search_product as $value) 
									if($value->media_type='image'){
								{
									
						?>
						
						<article class="product-miniature js-product-miniature product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12" data-id-product="1" data-id-product-attribute="0" itemscope="" style="margin-bottom: 20px;">
							<div class="thumbnail-container">
								<div class="ttproduct-image">

									<a href="<?php echo base_url('detail/'.$value->p_id);?>" class="thumbnail product-thumbnail">
										<img class="ttproduct-img1" src="<?php echo base_url('assets/uploads/'.$value->file_name);?>">

										
									</a>
									<ul class="product-flags"></ul>
								</div>
								<div class="ttproduct-desc">
									<div class="product-description">


									<a href="#"><?php echo $value->p_name?> cat Name: <?php echo $value->cat_name;?></a>


										<span itemprop="price" class="price" style="float: right; color: red;">$23</span>

										<div class="highlighted-informations no-variants hidden-sm-down">
										</div>
									</div>
								</div>
							</div>
						</article>
						<?php
									}
								}
							}
							else
							{
						?>
								<div class="col-md-12" style="padding: 20px;">
									<h3>Your search: did not match any products</h3>
									<img src="assets_frontend/img/result.png">
								</div>

						<?php
							}


						?>
						<!-- <h1>Not Result Seacrh....</h1> -->

					</div>

				</section>
			</section>
		</div>
	</div>
</section>