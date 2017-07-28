<div id="top_column" class="">
	<div id="carousel" data-ride="carousel" class="carousel slide homeslider col-sm-9" data-interval="5000" data-wrap="true" data-pause="hover">
		<div class="ttloading-bg" style="display: none;"></div>
		<ul class="carousel-inner" role="listbox">
			<li class="carousel-item active">
				<figure>
					<a href="#" title="sample-1">
						<img src="<?php echo base_url('assets/uploads/'.$slide_active->slide_parth);?>" alt="sample-1">
						<div class="caption">
							<h2 class="display-1 text-uppercase">Sample 1</h2>
							<div class="caption-description"><h2>EXCEPTEUR OCCAECAT</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique in tortor et dignissim. Quisque non tempor leo. Maecenas egestas sem elit</p></div>
							</div>
						</a>
					</figure>
				</li>
				<?php foreach ($slide_no_active as  $value) {?>
				<li class="carousel-item">
					<figure>
						<a href="#" title="sample-2">
						<img src="<?php echo base_url('assets/uploads/'.$value->slide_parth)?>" alt="sample-2">
							<div class="caption">
								<h2 class="display-1 text-uppercase">Sample 2</h2>
								<div class="caption-description"><h2>EXCEPTEUR OCCAECAT</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique in tortor et dignissim. Quisque non tempor leo. Maecenas egestas sem elit</p></div>
								</div>
							</a>
						</figure>
					</li>
					<?php }?>
				<!-- 	<li class="carousel-item">
					<figure>
						<a href="#" title="sample-2">
						<img src="<?php echo base_url('assets/img/36c70b5aa2485469ebe8502aa7e0bd0c37f08e93_sample-2.jpg')?>" alt="sample-2">
							<div class="caption">
								<h2 class="display-1 text-uppercase">Sample 2</h2>
								<div class="caption-description"><h2>EXCEPTEUR OCCAECAT</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique in tortor et dignissim. Quisque non tempor leo. Maecenas egestas sem elit</p></div>
								</div>
							</a>
						</figure>
					</li> -->
				</ul><!-- slide -->

				<div class="direction">
					<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
						<span class="icon-prev hidden-xs" aria-hidden="true">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
						<span class="icon-next" aria-hidden="true">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			
			<!-- <div id="ttcmssubbanners">
				<div class="ttsubbannerblock">
					<div class="ttsubbanner1 ttsubbanner col-sm-4">
						<div class="ttsubbanner-img">
							<a href="#">
								<img src="<?php echo base_url('assets/img/subbanner-1.jpg');?>" alt="subbanner-1.jpg">
							</a>
						</div>
					</div>
					<div class="ttsubbanner2 ttsubbanner col-sm-4">
						<div class="ttsubbanner-img">
							<a href="#">
								<img src="<?php echo base_url('assets/img/subbanner-2.jpg');?>" alt="subbanner-2.jpg">
							</a>
						</div>
					</div>
					<div class="ttsubbanner3 ttsubbanner col-sm-4">
						<div class="ttsubbanner-img">
							<a href="#">
								<img src="<?php echo base_url('assets/img/subbanner-3.jpg');?>" alt="subbanner-3.jpg">
							</a>
						</div>
					</div>
				</div>
			</div> -->
		</div>