<link rel="stylesheet" href="<?php echo base_url('assets_frontend/css/style.css');?>" type="text/css" media="all">
<script type="text/javascript" src=" https://code.jquery.com/jquery-3.2.1.min.js"></script>
<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-md-2 hidden-sm-down" id="_desktop_logo">
				<a href="<?php echo base_url();?>">
					<img class="logo img-responsive" src="<?php echo base_url('assets/img/4380977.png');?>" style="height: 92px;" alt="Demo Store">
				</a>
			</div>
			<div class="col-md-4"></div>
			<div class="col-lg-6" id="form-search">
			    <div class="input-group">
			      <input type="text" class="form-control" placeholder="Search for...">
			      <span class="input-group-btn">
			        <button class="btn btn-default" type="button" id="btn-search"> <i class="fa fa-search" aria-hidden="true"></i> Search  </button>
			      </span>
			    </div><!-- /input-group -->
	 		</div><!-- /.col-lg-6 -->
		</div>
		<div id="mobile_top_menu_wrapper" class="row hidden-md-up" style="display:none;">
			<div class="js-top-menu mobile" id="_mobile_top_menu"></div>
			<div class="js-top-menu-bottom">
				<div id="_mobile_currency_selector"></div>
				<div id="_mobile_language_selector"></div>
				<div id="_mobile_contact_link"></div>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 position-static">
		<div class="row">
			<div class="topmenu" style="border-bottom: solid #cac7c7 1px;">
				<div class="container">
					<div class="menu">
						<ul>
							<li><a href="<?php echo base_url();?>">Home</a></li>
							<?php foreach ($category as  $value) {?>
								<li>
									<a href="<?php echo base_url('products/'.$value->cat_id)?>"><?php echo $value->cat_name?> <i class="fa fa-angle-down" aria-hidden="true"></i></a><!-- main menu -->
									<ul>
										<?php foreach ($sub_category as $row) {?>
											<?php if($value->cat_id==$row->parent_id){?>
												<li>
													<a href="#"><?php echo $row->cat_name?></a>
													<ul>
														<?php foreach ($sub_cat1 as  $sub) { ?>
															<?php if($row->cat_id==$sub->lavel_cat){?>
																<li><a href="<?php echo base_url('product/'.$sub->cat_id);?>"><?php echo $sub->cat_name?></a></li>
															<?php }?>
														<?php }?>
													</ul>
												</li>
											<?php }?>
										<?php }?>
									</ul>
								</li><!--main menu-->
							<?php }?>
						</ul>
					</div>
				</div>
				<script>
					/*global $ */
					$(document).ready(function () {

						"use strict";

						$('.menu > ul > li:has( > ul)').addClass('menu-dropdown-icon');
  

					    $('.menu > ul > li > ul:not(:has(ul))').addClass('normal-sub');
					  
					    $(".menu > ul").before("<a href=\"#\" class=\"menu-mobile\">MENU</a>");


					    $(".menu > ul > li").hover(function (e) {
					    	if ($(window).width() > 943) {
					    		$(this).children("ul").stop(true, false).fadeToggle(150);
					    		e.preventDefault();
					    	}
					    });

					    $(".menu > ul > li").click(function () {
					    	if ($(window).width() <= 943) {
					    		$(this).children("ul").fadeToggle(150);
					    	}
					    });
					  

					    $(".menu-mobile").click(function (e) {
					    	$(".menu > ul").toggleClass('show-on-mobile');
					    	e.preventDefault();
					    });
					});
				</script>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>