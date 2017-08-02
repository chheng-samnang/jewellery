<style type="text/css">
  .nav-side-menu {
    //overflow: auto;
    font-family: verdana;
    font-size: 12px;
    font-weight: 200;
    background-color: #ffffff;
    //position: fixed;
    top: 0px;
    width: 300px;
    //height: 100%;
    color: #151515;
    border: solid 1px #cac8c8;
  }
  .nav-side-menu .brand {
    background-color: #eeeeee;
    line-height: 50px;
    display: block;
    text-align: center;
    font-size: 14px;
  }
  .nav-side-menu .toggle-btn {
    display: none;
  }
  .nav-side-menu ul,
  .nav-side-menu li {
    list-style: none;
    padding: 0px;
    margin: 0px;
    line-height: 50px;
    cursor: pointer;
  /*    
    .collapsed{
       .arrow:before{
                 font-family: FontAwesome;
                 content: "\f053";
                 display: inline-block;
                 padding-left:10px;
                 padding-right: 10px;
                 vertical-align: middle;
                 float:right;
            }
     }
     */
   }
   .nav-side-menu ul :not(collapsed) .arrow:before,
   .nav-side-menu li :not(collapsed) .arrow:before {
    font-family: FontAwesome;
    content: "\f078";
    display: inline-block;
    padding-left: 10px;
    padding-right: 10px;
    vertical-align: middle;
    float: right;
  }
  .nav-side-menu ul .active,
  .nav-side-menu li .active {
    //border-left: 3px solid #d19b3d;
    background-color: #ffffff;
  }
  .nav-side-menu ul .sub-menu li.active,
  .nav-side-menu li .sub-menu li.active {
    color: #d19b3d;
  }
  .nav-side-menu ul .sub-menu li.active a,
  .nav-side-menu li .sub-menu li.active a {
    color: #d19b3d;
  }
  .nav-side-menu ul .sub-menu li,
  .nav-side-menu li .sub-menu li {
    background-color: #ffffff;
    border: none;
    line-height: 42px;
    border-bottom: 1px solid  #cac8c8;
    margin-left: 0px;
  }
  .nav-side-menu ul .sub-menu li:hover,
  .nav-side-menu li .sub-menu li:hover {
    background-color: #020203;
  }
  .nav-side-menu ul .sub-menu li:before,
  .nav-side-menu li .sub-menu li:before {
    font-family: FontAwesome;
    content: "\f105";
    display: inline-block;
    padding-left: 10px;
    padding-right: 10px;
    vertical-align: middle;
  }
  .nav-side-menu li {
    padding-left: 0px;
    //border-left: 3px solid #2e353d;
    border-bottom: 1px solid #cac8c8;
  }
  .nav-side-menu li a {
    text-decoration: none;
    color: #101010;
  }
  .nav-side-menu li a i {
    padding-left: 10px;
    width: 20px;
    padding-right: 20px;
  }
  .nav-side-menu li:hover {
    border-left: 3px solid #d19b3d;
    background-color: rgba(79, 91, 105, 0.17);
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
  }
  @media (max-width: 767px) {
    .nav-side-menu {
      position: relative;
      width: 100%;
      margin-bottom: 10px;
    }
    .nav-side-menu .toggle-btn {
      display: block;
      cursor: pointer;
      position: absolute;
      right: 10px;
      top: 10px;
      z-index: 10 !important;
      padding: 3px;
      background-color: #ffffff;
      color: #000;
      width: 40px;
      text-align: center;
    }
    .brand {
      text-align: left !important;
      font-size: 22px;
      padding-left: 20px;
      line-height: 50px !important;
    }
  }
  @media (min-width: 767px) {
    .nav-side-menu .menu-list .menu-content {
      display: block;
    }
  }
  body {
    margin: 0px;
    padding: 0px;
  }

</style>
<section id="wrapper">
  <div class="container" id="container">
  <nav data-depth="2" class="breadcrumb hidden-sm-down">
    <ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
      <a itemprop="item" href="<?php echo base_url('');?>">
        <span itemprop="name">Home</span>
      </a>
      <meta itemprop="position" content="1">
    </li>
      <li itemprop="itemListElement" itemscope="">
        <a itemprop="item" href="<?php echo base_url('products/'.$product->parent_id);?>">
          <span itemprop="name"> <?php  echo  $product->parent_id;?></span>
        </a>
        <meta itemprop="position" content="2">
      </li>
      <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
        <a itemprop="item" href="">
          <span itemprop="name"> <?php echo $product->cat_name?></span>
        </a>
        <meta itemprop="position" content="2">
      </li>
    </ol>
  </nav>



    <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
    <div class="nav-side-menu">
      <div class="brand"> <i class="fa fa-bars" aria-hidden="true"></i> Category</div>
      <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      
      <div class="menu-list">
        
        <ul id="menu-content" class="menu-content collapse out">
        <?php foreach ($category1 as $row) {?> 
          <li  data-toggle="collapse" data-target="#<?php echo $row->cat_id?>" class="collapsed active">
            <a href="#"><i class="fa fa-gift fa-lg"></i><?php echo $row->cat_name;?> 
            <span class="arrow"></span></a>
          </li>
            
            <ul class="sub-menu collapse" id="<?php echo $row->cat_id?>">
              <?php foreach ($lavel_cat as $value) {

                if($row->cat_id==$value->lavel_cat){
              ?> 
             <li><a href="<?php echo base_url('product/'.$value->cat_id);?>"><?php echo $value->cat_name?></a></li> 
           <?php } }?> 
          
            </ul>
   <?php } ?> 
        </ul>
      </div>
    </div>
    <img src="<?php echo base_url('assets_frontend/img/advertising-s1.jpg');?>" style="margin-bottom: 20px;">
  </div>
    <div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-9">
      <section id="main">
        <div class="block-category hidden-sm-down">
          <div class="category-cover">
            <img src="" alt="">
          </div>
          
          <div id="category-description" class="text-muted">
            <p><?php echo $product->cat_desc;?></p>
          </div>
          </div>
         
          <section id="products">

            <div id="">
             <div id="js-product-list-top" class="products-selection">

              <div class="col-md-6 hidden-sm-down total-products">
                <!-- Grid-List Buttons --> 
                <div class="grid-list col-md-2">
                  <span id="ttgrid" class="glyphicon glyphicon-th active">

                  </span>
                  <span id="ttlist"></span>
                </div>
                <p>There are 12 products.</p>
              </div>
            
              <div class="col-sm-12 hidden-md-up text-xs-center showing">
                Showing 1-12 of 20 item(s)
              </div>
            </div>
          </div>
          <div id="" class="hidden-sm-down"></div>
   
            <div id="js-product-list" class="row">
              <div class="products product-thumbs">
              <?php foreach ($get_product1 as  $value) {?>
                <article class="product-miniature js-product-miniature product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12" data-id-product="1" data-id-product-attribute="0" itemscope="">
                  <div class="thumbnail-container">
                    <div class="ttproduct-image">

                      <a href="<?php echo base_url('detail/'.$value->p_id);?>" class="thumbnail product-thumbnail">
                        <img class="ttproduct-img1" src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" alt="" data-full-size-image-url="<?php echo base_url('assets/uploads/'.$value->file_name);?>">

                      
                      </a>
                      <ul class="product-flags"></ul>
                    </div>
                    <div class="ttproduct-desc">
                      <div class="product-description">
                      
                       
                       <a href="#"><?php echo $value->p_name?></a>
                    
                        <span itemprop="price" class="price" style="float: right; color: red;"><?php echo "$".$value->price?></span>
                     
                      <div class="highlighted-informations no-variants hidden-sm-down">
                      </div>
                    </div>
                  </div>
                </div>
              </article>
              <?php }?>
            </div>

</div>

</section>
</section>
</div>
</div>
</section>