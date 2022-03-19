<?php
$page = "category";
include "includes/header.php";
echo headerInfo($page);
?>

    <!-- ekka Cart Start -->
 <?php echo cart($page); ?>
    <!-- ekka Cart End -->

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Shop</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="ec-breadcrumb-item active">Shop</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec Shop page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-12 col-md-12">
                    <!-- Shop Top Start -->
                    <div class="ec-pro-list-top d-flex">
                        <div class="col-md-6 ec-grid-list">
                            <div class="ec-gl-btn">
                                <button class="btn sidebar-toggle-icon"><img src="assets/images/icons/filter.svg"
                                        class="svg_img gl_svg" alt="filter" /></button>
                                <button class="btn btn-grid-50 active"><img src="assets/images/icons/grid.svg"
                                        class="svg_img gl_svg" alt="grid" /></button>
                                <button class="btn btn-list-50"><img src="assets/images/icons/list.svg"
                                        class="svg_img gl_svg" alt="list" /></button>
                            </div>
                        </div>
                        <div class="col-md-6 ec-sort-select">
                            <span class="sort-by">Sort by</span>
                            <div class="ec-select-inner">
                                <select name="ec-select" id="ec-select">
                                    <option selected disabled>Position</option>
                                    <option value="1">Relevance</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3">Name, Z to A</option>
                                    <option value="4">Price, low to high</option>
                                    <option value="5">Price, high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Shop Top End -->

                    <!-- Shop content Start -->
                    <div class="shop-pro-content">
                        <div class="shop-pro-inner">
                            <div class="row">
                                
                            <?php
                                    $get_cat_id = ($_GET['cat']);
                                    $get_all_gender_products = getProducts($get_cat_id);
                                    $f_i = 1;

                                    foreach($get_all_gender_products as $products) {
                                          // Listing all the variables needed for this
                                    $product_id = $products['prod_id'];
                                    $modal_id = 0;
                                    $product_name = stripslashes(htmlspecialchars_decode($products['prod_name']));
                                    $product_images = $products['pi_sub_images'];
                                    $cleanStr = preg_replace('/[^A-Za-z0-9_,.]/', '', $product_images);
                                    $product_image_array = explode(",", $cleanStr);
                                    $count_array = count($product_image_array);
                                    $random = rand(400, 800);
                                    $product_price = $products['prod_price'];
                                    $product_desc = $products['prod_desc'];
                                    $random_percent = rand(1, 100);
                                    $category_id = $products['categories_cat_id'];

                                    // Counting the array to make sure everything is intact
                                    if($count_array > 1) {
                                        $index = 1;
                                    }else {
                                        $index = 0;
                                    }
                                    
                                    // Checking our src
                                    if($products['pi_src']) {
                                        $imgurl_1 = "assets/images/".$products['pi_form']."/".$products['pi_src'];
                                        $imgurl_2 =  "assets/images/".$products['pi_form']."/".$product_image_array[$index];
                                    }else {
                                        $imgurl = "assets/images/dummy.jpg";
                                    }
                                    
                                    $modal_id++;
                                ?>

                                             
                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                    <div class="ec-product-inner">
                                        <div class="ec-pro-image-outer">
                                            <div class="ec-pro-image">
                                                <a href="product-left-sidebar.html" class="image">
                                                    <img class="main-image"
                                                        src="/<?php echo custom_site_base().$imgurl_1; ?> " alt="Product" />
                                                    <img class="hover-image"
                                                        src="/<?php echo custom_site_base().$imgurl_2; ?>" alt="Product" />
                                                </a>
                                                <span class="percentage"><?php echo $random_percent; ?>%</span>
                                                <a href="#" class="quickview" data-link-action="quickview"
                                                    title="Quick view" data-bs-toggle="modal"
                                                    data-bs-target="#ec_quickview_modal_<?php echo $category_id; ?>_<?php echo $modal_id; ?>"><img
                                                        src="assets/images/icons/quickview.svg" class="svg_img pro_svg"
                                                        alt="" /></a>
                                                <div class="ec-pro-actions">
                                                    <a href="#" class="ec-btn-group compare"
                                                        title="Compare"><img src="assets/images/icons/compare.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                <div class="addCart shop_<?php echo $product_id; ?>">

                                                <button  title="Add To Cart" class="add-to-cart"><img
                                                            src="assets/images/icons/cart.svg" class="svg_img pro_svg"
                                                            alt="" /> Add To Cart           
                                       
                                </button>

                                                    <div class="shop_<?php echo $product_id; ?>">
                                                        
                                                        <input type="hidden" name="product_type" value="1" />
                                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                                                        <input type="hidden" name="product_name" value="<?php echo $product_name; ?>" />
                                                        <input type="hidden" name="product_price" value="<?php echo $product_price; ?>" />
                                                        <input type="hidden" name="product_url" value="<?php echo $imgurl_1; ?>" />
                                                                

                                                    </div>
                                                </div>
                                                   
                                                    <a class="ec-btn-group wishlist" title="Wishlist"><img
                                                            src="assets/images/icons/wishlist.svg"
                                                            class="svg_img pro_svg" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ec-pro-content">
                                            <h5 class="ec-pro-title"><a href="product-details?prod=<?php echo $product_id; ?>"><?php echo $product_name; ?></a></h5>
                                            <div class="ec-pro-rating">
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star fill"></i>
                                                <i class="ecicon eci-star"></i>
                                            </div>
                                            <div class="ec-pro-list-desc"><?php echo $product_desc; ?></div>
                                            <span class="ec-price">
                                                <span class="old-price">#<?php echo number_format($random, 2); ?></span>
                                                <span class="new-price">#<?php echo number_format($product_price, 2); ?></span>
                                            </span>
                                            <div class="ec-pro-option">
                                                <div class="ec-pro-color">
                                                    <span class="ec-pro-opt-label">Color</span>
                                                    <ul class="ec-opt-swatch ec-change-img">
                                                        <li class="active"><a href="#" class="ec-opt-clr-img"
                                                                data-src="assets/images/product-image/6_1.jpg"
                                                                data-src-hover="assets/images/product-image/6_1.jpg"
                                                                data-tooltip="Gray"><span
                                                                    style="background-color:#e8c2ff;"></span></a></li>
                                                        <li><a href="#" class="ec-opt-clr-img"
                                                                data-src="assets/images/product-image/6_2.jpg"
                                                                data-src-hover="assets/images/product-image/6_2.jpg"
                                                                data-tooltip="Orange"><span
                                                                    style="background-color:#9cfdd5;"></span></a></li>
                                                    </ul>
                                                </div>
                                                <div class="ec-pro-size">
                                                    <span class="ec-pro-opt-label">Size</span>
                                                    <ul class="ec-opt-size">
                                                        <li class="active"><a href="#" class="ec-opt-sz"
                                                                data-old="$25.00" data-new="$20.00"
                                                                data-tooltip="Small">S</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$27.00"
                                                                data-new="$22.00" data-tooltip="Medium">M</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$30.00"
                                                                data-new="$25.00" data-tooltip="Large">X</a></li>
                                                        <li><a href="#" class="ec-opt-sz" data-old="$35.00"
                                                                data-new="$30.00" data-tooltip="Extra Large">XL</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                   
                               
                                <?php 

                                    }

                                    ?>

                            </div>
                        </div>
                        <!-- Ec Pagination Start -->
                        <div class="ec-pro-pagination">
                            <span>Showing 1-12 of 21 item(s)</span>
                            <ul class="ec-pro-pagination-inner">
                                <li><a class="active" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a class="next" href="#">Next <i class="ecicon eci-angle-right"></i></a></li>
                            </ul>
                        </div>
                        <!-- Ec Pagination End -->
                    </div>
                    <!--Shop content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="filter-sidebar-overlay"></div>
                <div class="ec-shop-leftside filter-sidebar">
                    <div class="ec-sidebar-heading">
                        <h1>Filter Products By</h1>
                        <a class="filter-cls-btn" href="javascript:void(0)">×</a>
                    </div>
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Category</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" checked /> <a href="#">clothes</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">Bags</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">Shoes</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">cosmetics</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">electrics</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" /> <a href="#">phone</a><span class="checked"></span>
                                        </div>
                                    </li>
                                    <li id="ec-more-toggle-content" style="padding: 0; display: none;">
                                        <ul>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Watch</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="ec-sidebar-block-item">
                                                    <input type="checkbox" /> <a href="#">Cap</a><span
                                                        class="checked"></span>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item ec-more-toggle">
                                            <span class="checked"></span><span id="ec-more-toggle">More
                                                Categories</span>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- Sidebar Size Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Size</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <ul>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" checked /><a href="#">S</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">M</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /> <a href="#">L</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">XL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="ec-sidebar-block-item">
                                            <input type="checkbox" value="" /><a href="#">XXL</a><span
                                                class="checked"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Shop page -->
    
    <!-- Footer Area End -->
    <?php include "includes/footer.php"; ?>
    <!-- Footer Area End -->

    
    <?PHP
      $cats = getCats();
      foreach($cats as $cat) {
          $modal_id = 0;
          $quick_view_id = 1;
          $category_name =  stripslashes(htmlspecialchars($cat['cat_name']));
          $category_id = stripslashes(htmlspecialchars($cat['cat_id']));

          $prods = getProducts($cat['cat_id']);
          $i = 1;
          
        
          foreach($prods as $prod) {
              
              
              // Listing all the variables needed for this
              $product_id = $prod['prod_id'];
              $product_name = stripslashes(htmlspecialchars_decode($prod['prod_name']));
              $product_images = $prod['pi_sub_images'];
              $cleanStr = preg_replace('/[^A-Za-z0-9_,.]/', '', $product_images);
              $product_image_array = explode(",", $cleanStr);
              $count_array = count($product_image_array);
              $random = rand(400, 800);
              $product_price = number_format($prod['prod_price'],0);
              $product_desc = $prod['prod_desc'];

              // Counting the array to make sure everything is intact
              if($count_array > 1) {
                  $index = 1;
              }else {
                  $index = 0;
              }
              
              $modal_id++;

              // Checking our src

              ?>
    <!-- Modal -->
    <div class="modal fade" id="ec_quickview_modal_<?php echo $category_id; ?>_<?php echo $modal_id; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close qty_close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <!-- Swiper -->
                            <div class="qty-product-cover">
                               <?php 
                                    for ($i=$index; $i < $count_array; $i++) { 
                                        if($prod['pi_src']) {
                                            $imgurl =  "assets/images/".$prod['pi_form']."/".$product_image_array[$i];
                                        }else {
                                            $imgurl = "assets/images/dummy.jpg";
                                        }
                                        echo '
                                        <div class="qty-slide">
                                            <img class="img-responsive" src="/'.custom_site_base().$imgurl.'" alt="">
                                        </div>
                                        ';
                                    }
                               ?>
                            </div>
                            <div class="qty-nav-thumb">
                            <?php 
                                    for ($i=$index; $i < $count_array; $i++) { 
                                        if($prod['pi_src']) {
                                            $imgurl =  "assets/images/".$prod['pi_form']."/".$product_image_array[$i];
                                        }else {
                                            $imgurl = "assets/images/dummy.jpg";
                                        }
                                        echo '
                                        <div class="qty-slide">
                                            <img class="img-responsive" src="/'.custom_site_base().$imgurl.'" alt="">
                                        </div>
                                        ';
                                    }
                               ?>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="quickview-pro-content">
                                <h5 class="ec-quick-title"><a href="product-details/da"><?php echo $product_name; ?></a>
                                </h5>
                                <div class="ec-quickview-rating">
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star fill"></i>
                                    <i class="ecicon eci-star"></i>
                                </div>

                                <div class="ec-quickview-desc"><?php echo $product_desc; ?></div>
                                <div class="ec-quickview-price">
                                    <span class="old-price">#<?php echo $random; ?>.00</span>
                                    <span class="new-price">#<?php echo $product_price; ?>.00</span>
                                </div>

                                <div class="ec-pro-variation">
                                    <div class="ec-pro-variation-inner ec-pro-variation-color">
                                        <span>Color</span>
                                        <div class="ec-pro-color">
                                            <ul class="ec-opt-swatch">
                                                <li><span style="background-color:#696d62;"></span></li>
                                                <li><span style="background-color:#d73808;"></span></li>
                                                <li><span style="background-color:#577023;"></span></li>
                                                <li><span style="background-color:#2ea1cd;"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="ec-pro-variation-inner ec-pro-variation-size ec-pro-size">
                                        <span>Size</span>
                                        <div class="ec-pro-variation-content">
                                            <ul class="ec-opt-size">
                                                <li class="active"><a href="#" class="ec-opt-sz"
                                                        data-tooltip="Small">S</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Medium">M</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Large">X</a></li>
                                                <li><a href="#" class="ec-opt-sz" data-tooltip="Extra Large">XL</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="ec-quickview-qty">
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="ec_qtybtn" value="1" />
                                    </div>
                                    <div class="ec-quickview-cart">
                                        <div  id="button" class="addCart shop_<?php echo $product_id; ?>">
                                        <button class="btn btn-primary"><img src="assets/images/icons/cart.svg"
                                                class="svg_img pro_svg" alt="" /> Add To Cart</button>

                                                <div class="shop_<?php echo $product_id; ?>">
                                                        
                                                        <input type="hidden" name="product_type" value="1" />
                                                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                                                        <input type="hidden" name="product_name" value="<?php echo $product_name; ?>" />
                                                        <input type="hidden" name="product_price" value="<?php echo $product_price; ?>" />
                                                        <input type="hidden" name="product_url" value="<?php echo $imgurl_1; ?>" />
                                                                

                                                    </div>    
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
          }
        }
          ?>
    <!-- Modal end -->

    <div class="ec-cart-float text-center"></div>                          

    <!-- Footer navigation panel for responsive display -->
    <div class="ec-nav-toolbar">
        <div class="container">
            <div class="ec-nav-panel">
                <div class="ec-nav-panel-icons">
                    <a href="#ec-mobile-menu" class="navbar-toggler-btn ec-header-btn ec-side-toggle"><img
                            src="assets/images/icons/menu.svg" class="svg_img header_svg" alt="" /></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="#ec-side-cart" class="toggle-cart ec-header-btn ec-side-toggle"><img
                            src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="" /><span
                            class="ec-cart-noti ec-header-count cart-count-lable">3</span></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="index.html" class="ec-header-btn"><img src="assets/images/icons/home.svg"
                            class="svg_img header_svg" alt="icon" /></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="wishlist.html" class="ec-header-btn"><img src="assets/images/icons/wishlist.svg"
                            class="svg_img header_svg" alt="icon" /><span class="ec-cart-noti">4</span></a>
                </div>
                <div class="ec-nav-panel-icons">
                    <a href="login.html" class="ec-header-btn"><img src="assets/images/icons/user.svg"
                            class="svg_img header_svg" alt="icon" /></a>
                </div>

            </div>
        </div>
    </div>
    <!-- Footer navigation panel for responsive display end -->

 

    <!-- Vendor JS -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/nouislider.js"></script>
    <script src="assets/js/plugins/countdownTimer.min.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/infiniteslidev2.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>

    <!-- Main Js -->
    <script src="assets/js/main.js"></script>
    <script>

$(function() {
   $(".addCart").on("click", function(e) {
        // var clickedAnchor = $(e.target);
        // var product_type = clickedAnchor.parents('.pro-gl-content').find('input[name="product_type"]').val();
        var elem = $(this);
        var className = elem.attr('class');
        var idName = elem.attr('id');
        var strippedName = className.replace("addCart ","");
        console.log(strippedName);
        console.log(idName)
        
        var product_type = $('.'+strippedName+'>input[name="product_type"]').val()
        var product_id = $('.'+strippedName+'>input[name="product_id"]').val()
        var product_name = $('.'+strippedName+'>input[name="product_name"]').val()
        var product_price = $('.'+strippedName+'>input[name="product_price"]').val()
        var product_url = $('.'+strippedName+'>input[name="product_url"]').val()


        if(product_url == "" || product_price == "" || product_name == "" || product_id == "" || product_type == ""
        || product_name == null || product_id == null || product_price == null || product_id == null ) {
            console.log("Please fill all these");
        }else {
            // passing the request via ajax
            $.post("/<?php echo custom_site_base(); ?>functions/cart_add.php", {
              
                product_type: product_type,
                product_id: product_id,
                product_name: product_name,
                product_price: product_price,
                product_url: product_url

            }, 
            
            function(data, status) {
              if(status == "success") {
                  if(idName == "button") {
                        alert(`An Item has been added to your cart 👍. \nProduct Name:${product_name} \nProduct Price: ${product_price} \n\n ✔ Thanks`)
                  }else {
                     reloadCart(data, product_name, product_price)
                  }
              } 
            });
            
        }
        
   });
});

function reloadCart(data, name, price) {
    if(data != 0) {
        data = JSON.parse(data);
        var deliveryFee = 150;
        var cartContent = '';
        var cartSubtotal = 0;
        var cartTotal = 0;
        var cartQty = 0;
        $.each(data, function(i, value) {
            // alert(i+": "+value.id);
            cartQty = cartQty + parseInt(value.count);
            cartSubtotal = cartSubtotal + parseFloat(value.price * value.count);

            cartContent = cartContent + '<li><a href=\"\" class=\"sidekka_pro_img\"><img'+
                     '   src=\"'+value.url+'\" alt=\"product\"></a>'+
              '  <div class=\"ec-pro-content\">'+
                '    <a href=\"\" class=\"cart_pro_title\">'+value.name+'</a>'+
                   ' <span class=\"cart-price\"><span>'+parseFloat(value.price).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')+'</span> x <span class=\"count\">'+value.count+'</span></span>'+
                  '  <div class=\"qty-plus-minus\"> <input class=\"qty-input\" type=\"text\" name=\"ec_qtybtn\" value=\"'+value.count+'\" /></div>'
                   ' <a href=\"javascript:void(0)\" class=\"remove\">×</a>'
               ' </div></li>';
        });

    cartTotal = cartSubtotal+parseFloat(deliveryFee);
    $('.cart_subtotal').text('₦'+parseFloat(cartSubtotal).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
    $('.cart_dfee').text('₦'+parseFloat(deliveryFee).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
    $('.cart_total').text('₦'+parseFloat(cartTotal).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
    $('.eccart-pro-items').html(cartContent);
    $('.cart_summary .count').text(parseInt(cartQty).toFixed(0).replace(/(\d)(?=(\d{3})+\.)/g, '$1,'));
    $('.cart-count-lable').text(parseFloat(cartQty));
    //alert(cartQty);
    if(cartQty > 1){
        $('.cart_summary .count_text').text('items');
    }
    completionAlert(name, price);
}

    function completionAlert(name, price){
$('.ec-cart-float').html('<a href="#ec-side-cart" style="width: 100%;" class="ec-header-btn ec-side-toggle"><div class="header-icon">'+
        '<img src="assets/images/icons/check.gif" class="svg_img header_svg" alt="" />'+
    '</div> <span> Added to your Cart<br /> <br /> <b>#'+
    parseFloat(price).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,')

   +' </b>  <br /><br />'+
    name
   +' <br /><br /><button class="btn btn-success" type="submit">Proceed to Checkout</button> '+
'</span> </a>');
}
}

</script>   

</body>

<!-- Mirrored from loopinfosol.in/themeforest/ekka-html-v2/ekka-html/shop-full-width.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Nov 2021 05:30:33 GMT -->
</html>