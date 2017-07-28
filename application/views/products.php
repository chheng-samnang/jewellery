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

	<nav data-depth="2" class="breadcrumb hidden-sm-down">
		<ol itemscope="" itemtype="http://schema.org/BreadcrumbList">
      <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
       <a itemprop="item" href="<?php echo base_url('');?>">
         <span itemprop="name">Home</span>
       </a>
       <meta itemprop="position" content="1">
     </li>
     <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
      <a itemprop="item" href="<?php echo base_url('pages/'.$main_category->cat_id);?>">
        <span itemprop="name"> <?php echo $main_category->cat_name;?></span>
      </a>
      <meta itemprop="position" content="2">
    </li>
  </ol>
</nav>

<div class="container" id="container">

  <div id="left-column" class="col-xs-12 col-sm-4 col-md-3">
    <div class="nav-side-menu">
     <div class="brand"> <i class="fa fa-bars" aria-hidden="true"></i>  <?php echo $main_category->cat_name;?></div>
     <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

     <div class="menu-list">

      <ul id="menu-content" class="menu-content collapse out">
        <?php foreach ($sub_cat as $row) {?>

        <li  data-toggle="collapse" data-target="#<?php echo $row->cat_id?>" class="collapsed active">
          <a href="<?php echo $row->cat_id;?>"><i class="fa fa-gift fa-lg"></i><?php echo $row->cat_name?><span class="arrow"></span></a>
        </li>

        <ul class="sub-menu collapse" id="<?php echo $row->cat_id;?>">
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
    </div>
    <div id="content-wrapper" class="left-column col-xs-12 col-sm-8 col-md-9">
      <section id="main">
        <div class="block-category hidden-sm-down">
          <div class="category-cover">
            <img src="<?php echo base_url('assets/uploads/'.$main_category->cat_icon);?>" alt="">
          </div>
          <h1 class="h1 title-category"><?php echo $main_category->cat_name;?>  </h1>
          <div id="category-description" class="text-muted">
            <p><?php echo $main_category->cat_desc;?></p>
          </div>
        </div>
        <div class="text-xs-center hidden-md-up">
          <h1 class="h1">Women</h1>
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
            <div class="col-md-6">
              <div class="row">
                <span class="col-sm-3 col-md-3 hidden-sm-down sort-by">Sort by:</span>
                <div class="col-sm-9 col-xs-8 col-md-9 products-sort-order dropdown">
                  <a class="select-title" rel="nofollow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select
                    <i class="fa fa-angle-down pull-xs-right"></i>
                  </a>
                  <div class="dropdown-menu">
                    <a rel="nofollow" href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/3-women?order=product.position.asc" class="select-list current js-search-link">
                      Relevance
                    </a>
                    <a rel="nofollow" href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/3-women?order=product.name.asc" class="select-list js-search-link">
                      Name, A to Z
                    </a>
                    <a rel="nofollow" href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/3-women?order=product.name.desc" class="select-list js-search-link">
                      Name, Z to A
                    </a>
                    <a rel="nofollow" href="" class="select-list js-search-link">
                      Price, low to high
                    </a>
                    <a rel="nofollow" href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/3-women?order=product.price.desc" class="select-list js-search-link">
                      Price, high to low
                    </a>
                  </div>
                </div>
                <div class="col-sm-3 col-xs-4 hidden-md-up filter-button">
                  <button id="search_filter_toggler" class="btn btn-secondary">
                    Filter
                  </button>
                </div>
              </div>
            </div>
            
            <div class="col-sm-12 hidden-md-up text-xs-center showing">
              Showing 1-12 of 20 item(s)
            </div>
          </div>
        </div>
        <div id="" class="hidden-sm-down"></div>
        <div id="">
          <div id="js-product-list" class="row">
            <div class="products product-thumbs">
              <?php foreach ($select_product as  $value) {?>
              <article class="product-miniature js-product-miniature product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12" data-id-product="1" data-id-product-attribute="0" itemscope="" itemtype="http://schema.org/Product">
                <div class="thumbnail-container">
                  <div class="ttproduct-image">

                    <a href="<?php echo base_url('detail/'.$value->p_id);?>" class="thumbnail product-thumbnail">
                      <img class="ttproduct-img1" src="<?php echo base_url('assets/uploads/'.$value->file_name);?>" alt="" data-full-size-image-url="<?php echo base_url('assets/uploads/'.$value->file_name);?>">

                      <img class="second_image img-responsive" src="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/302-home_default/faded-short-sleeves-tshirt.jpg" data-full-size-image-url="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/302-large_default/faded-short-sleeves-tshirt.jpg" alt="">
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
            <div class="container">
              <nav class="pagination">
                <div class="col-md-4 pagination-left">
                  Showing 1-12 of 20 item(s)
                </div>
                <div class="col-md-6 pagination-right">
                  <ul class="page-list clearfix text-xs-center">
                    <li>
                      <a rel="prev" href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/3-women?page=1" class="previous disabled js-search-link">
                        <i class="material-icons"></i>Previous
                      </a>
                    </li>
                    <li class="current">
                      <a rel="nofollow" href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/3-women?page=1" class="disabled js-search-link">
                        1
                      </a>
                    </li>
                    <li>
                      <a rel="nofollow" href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/3-women?page=2" class="js-search-link">
                        2
                      </a>
                    </li>
                    <li>
                      <a rel="next" href="http://demo.templatetrip.com/Prestashop/PRS003/PRS01/en/3-women?page=2" class="next js-search-link">
                        <i class="material-icons"></i>Next
                      </a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </section>
    </section>
  </div>
</div>
</section>