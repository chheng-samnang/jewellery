<?php error_reporting(0);?>
<section id="wrapper">
	<div class="full-container">
		<div id="content-wrapper">
			<section id="main">

				<section class="ttspecial-products clearfix">
					<?php foreach ($sub_category as  $value) {?>
					<div class="container" id="category">
						<div class="col-md-12">
							<div class="col-sm-9">
								<h3 class="tt-title"  style="margin-left: -9px;"><?php echo $value->cat_name?></h3>
							</div>
							<div class="col-md-3"></div>
						</div>
					</div>
					<div class="ttspecial-list container">
						<div class="row">
							<div class="products">
								<?php foreach ($product as $row) {?>
								<?php if($value->cat_id==$row->cat_id){?>
								
								<article class="product-miniature js-product-miniature col-sm-4" style="    padding: 0px 10px 0px 0px;" data-id-product="4" data-id-product-attribute="16" itemscope itemtype="http://schema.org/Product">
									<div class="thumbnail-container">
										<div class="ttproduct-image">
											<a href="<?php echo base_url('detail/'.$row->p_id);?>" class="thumbnail product-thumbnail">
												<img class="ttproduct-img1" src = "<?php echo base_url('assets/uploads/'.$row->file_name);?>" alt = "" data-full-size-image-url = "<?php echo base_url('assets/uploads/'.$row->file_name);?>" >

									</a>

										</div>
										<!-- <div class="ttproduct-desc"> -->
										<div class="product-description">
											<a href="#"><?php echo $row->p_name?></a>
											<span itemprop="price" class="price" style="float: right; color: red;"><?php echo "$".$row->price?></span>


		</div>

	</div>
</article>
<?php } }?>

</div><!-- products -->
</div><!-- row -->
</div><!-- ttspecial-list container -->
<?php }?>
<!-- <div class="allproduct"><a href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/prices-drop">All sale products</a></div> -->
</section><!-- Specials-->
<div class="container" id="container">
	<h1>OUR CLIENT</h1>
</div>
<section class="brands container" style="background: #fff;    box-shadow: 0px 40px 71px 10px #2c1608;">

	

	<div class="products">
		<ul id="ttbrandlogo-carousel" class="product_list">
			<li>
				<div class="brand-image">
					<a href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/1_fashion-manufacturer1" title="Fashion Manufacturer1">
						<img src="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/img/m/1.jpg" alt="Fashion Manufacturer1" />
					</a>
				</div>
			</li>
			<li>
				<div class="brand-image">
					<a href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/2_fashion-manufacturer2" title="Fashion Manufacturer2">
						<img src="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/img/m/2.jpg" alt="Fashion Manufacturer2" />
					</a>
				</div>
			</li>
			<li>
				<div class="brand-image">
					<a href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/3_fashion-manufacturer3" title="Fashion Manufacturer3">
						<img src="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/img/m/3.jpg" alt="Fashion Manufacturer3" />
					</a>
				</div>
			</li>
			<li>
				<div class="brand-image">
					<a href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/4_fashion-manufacturer4" title="Fashion Manufacturer4">
						<img src="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/img/m/4.jpg" alt="Fashion Manufacturer4" />
					</a>
				</div>
			</li>
			<li>
				<div class="brand-image">
					<a href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/5_fashion-manufacturer5" title="Fashion Manufacturer5">
						<img src="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/img/m/5.jpg" alt="Fashion Manufacturer5" />
					</a>
				</div>
			</li>
			<li>
				<div class="brand-image">
					<a href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/6_fashion-manufacturer6" title="Fashion Manufacturer6">
						<img src="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/img/m/6.jpg" alt="Fashion Manufacturer6" />
					</a>
				</div>
			</li>
			<li>
				<div class="brand-image">
					<a href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/7_fashion-manufacturer7" title="Fashion Manufacturer7">
						<img src="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/img/m/7.jpg" alt="Fashion Manufacturer7" />
					</a>
				</div>
			</li>
			<li>
				<div class="brand-image">
					<a href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/8_fashion-manufacturer8" title="Fashion Manufacturer8">
						<img src="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/img/m/8.jpg" alt="Fashion Manufacturer8" />
					</a>
				</div>
			</li>
		</ul>
	</div>
</section><!-- brands container -->
<!-- <div id="ttcmsservices" class="container">
	<div class="ttservicebanner col-sm-6">
		<div class="ttservices-img"><a href="#"><img src="assets/img/services.jpg" alt="services.jpg" /></a></div>
	</div>
	<div class="services col-sm-6">
		<div class="ttservices-inner">
			<h4 class="title_block"><a href="#" class="ttblock-heading">Our Services</a></h4>
			<div class="ttexchange col-sm-12">
				<div class="ttcontent_inner">
					<div class="service">
						<div class="ttexchange_img service-icon"></div>
						<div class="service-content">
							<div class="service-title">Best preformance</div>
							<div class="service-desc">computers network connection Many desktop publishing.</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ttshinpping col-sm-12">
				<div class="ttcontent_inner">
					<div class="service">
						<div class="ttshinpping_img service-icon"></div>
						<div class="service-content">
							<div class="service-title">Mobile friendly</div>
							<div class="service-desc">computers network connection Many desktop publishing.</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ttoffers col-sm-12">
				<div class="ttcontent_inner">
					<div class="service">
						<div class="ttoffers_img service-icon"></div>
						<div class="service-content">
							<div class="service-title">Easy customaization</div>
							<div class="service-desc">computers network connection Many desktop publishing.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
</section>