<?php
libxml_use_internal_errors(false);
session_start();

date_default_timezone_set("Africa/Lagos");
require "sitebase.php";
if(!isset($database)) {
    require "config/db.php";
}

function siteName() {
    $data = "My Custom Ecommerce site";
    return $data;
}

function siteLink(){
    $data = "http://localhost/my_ecommerce";
    return $data;
}

function siteBase() {
    $data = "localhost";
    return $data;
}

function siteUrl() {
    $data = "localhost/my_ecommerce";
    return $data;
}

function siteImg() {
    $data = "localhost/my_ecommerce";
    return $data;
}

function siteInfo() {
    $data = "info@my_ecommerce.com";
    return $data;
}

function siteLogo() {
    $data = "";
    return $data;
}

function genericError() {
    $data = "Somthing seems to have gone wrong. Please try again.";
    return $data;
}

function genericSearchError() {
    $data = "There are no results matching your search query.";
    return $data;
}

function genericUploadMssg() {
    $data = "Please select an image file upload: <br />Supported fortmats are .jpg, .png and .gif <br /> Maximum upload size is 2Mb";
    return $data;
}

function headerInfo($page) {
    $summary= "".siteName()."is ... ";
    if($page == "home") {
        $title = "Welcome to ".siteName()."";
    }else if($page == "index"){
		$title = "Order food on ".siteName();
	}
	else if($page == "call"){
		$title = "Place your order on the phone";
	}
	else if($page == "login"){
		$title = "Log in to your account";
	}
	else if($page == "signup"){
		$title = "Create an account";
	}else if($page == "about") {
        $title = "About Ekka Ecommerce";
    }
	else if($page == "account"){
		$title = "My account";
	}
	else if($page == "forgot"){
		$title = "Forgot your password";
	}
	else if($page == "reset"){
		$title = "Reset your password";
	}
	else if($page == "password"){
		$title = "Change your password";
	}
	else if($page == "checkout"){
		$title = "Place your order";
	}
	else if($page == "complete"){
		$title = "Your order has been placed";
	}
	else if($page == "newsletter"){
		$title = "Newsletter Subscription";
	}
	else if($page == "create"){
		$title = "Create a new customer account";
	}
	else if($page == "accountinfo"){
		$title = "Edit your account details";
	}
	else if($page == "addressbook"){
		$title = "Manage your delivery addresses";
	}
	else if($page == "addressbooknew"){
		$title = "Add a new address";
	}
	else if($page == "addressbookedit"){
		$title = "Update address";
	}else if($page == "terms"){
        $title = "Terms and Conditions";
    }else if($page == "shop") {
        $title = "Shop your items";
    }else if($page == "product_desc"){
        $title = "Product Full Description";
    }else if($page == "contact") {
        $title = "Contact Us";
    }else {
        $title = "Null ";
    }



    $header = '
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    
    <title>'.$title.'</title>
    <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">

    <!-- site Favicon -->
    <link rel="icon" href="assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="assets/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="assets/images/favicon/favicon.png" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="assets/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="assets/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="assets/css/demo1.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />


    <!-- This is only for register page  Optimzing Code-->
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="assets/css/backgrounds/bg-4.css">
</head>
<body>
   
<header class="ec-header">
        <!--Ec Header Top Start -->
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Header Top social Start -->
                    <div class="col text-left header-top-left d-none d-lg-block">
                        <div class="header-top-social">
                            <span class="social-text text-upper">Follow us on:</span>
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Top social End -->
                    <!-- Header Top Message Start -->
                    <div class="col text-center header-top-center">
                        <div class="header-top-message text-upper">
                            <span>Free Shipping</span>This Week Order Over - $75
                        </div>
                    </div>
                    <!-- Header Top Message End -->
                    <!-- Header Top Language Currency -->
                    <div class="col header-top-right d-none d-lg-block">
                        <div class="header-top-lan-curr d-flex justify-content-end">
                            <!-- Currency Start -->
                            <div class="header-top-curr dropdown">
                                <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                        class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu">
                                    <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                    <li><a class="dropdown-item" href="#">EUR €</a></li>
                                </ul>
                            </div>
                            <!-- Currency End -->
                            <!-- Language Start -->
                            <div class="header-top-lan dropdown">
                                <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                        class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu">
                                    <li class="active"><a class="dropdown-item" href="#">English</a></li>
                                    <li><a class="dropdown-item" href="#">Italiano</a></li>
                                </ul>
                            </div>
                            <!-- Language End -->

                        </div>
                    </div>
                    <!-- Header Top Language Currency -->
                    <!-- Header Top responsive Action -->
                    <div class="col d-lg-none ">
                        <div class="ec-header-bottons">
                            <!-- Header User Start -->
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                        src="assets/images/icons/user.svg" class="svg_img header_svg" alt="" /></button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a class="dropdown-item" href="register?ref=false">Register</a></li>
                                    <li><a class="dropdown-item" href="checkout">Checkout</a></li>
                                    <li><a class="dropdown-item" href="login?ref=false">Login</a></li>
                                </ul>
                            </div>
                            <!-- Header User End -->
                            <!-- Header Cart Start -->
                            <a href="wishlist" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon"><img src="assets/images/icons/wishlist.svg"
                                        class="svg_img header_svg" alt="" /></div>
                                <span class="ec-header-count">4</span>
                            </a>
                            <!-- Header Cart End -->
                            <!-- Header Cart Start -->
                            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon"><img src="assets/images/icons/cart.svg"
                                        class="svg_img header_svg" alt="" /></div>
                                <span class="ec-header-count cart-count-lable">3</span>
                            </a>
                            <!-- Header Cart End -->
                            <!-- Header menu Start -->
                            <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                                <img src="assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon" />
                            </a>
                            <!-- Header menu End -->
                        </div>
                    </div>
                    <!-- Header Top responsive Action -->
                </div>
            </div>
        </div>
        <!-- Ec Header Top  End -->
        <!-- Ec Header Bottom  Start -->
        <div class="ec-header-bottom d-none d-lg-block">
            <div class="container position-relative">
                <div class="row">
                    <div class="ec-flex">
                        <!-- Ec Header Logo Start -->
                        <div class="align-self-center">
                            <div class="header-logo">
                                <a href="'.siteLink().'"><img src="assets/images/logo/logo.png" alt="Site Logo" /><img
                                        class="dark-logo" src="assets/images/logo/dark-logo.png" alt="Site Logo"
                                        style="display: none;" /></a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                                <form class="ec-btn-group-form" action="#">
                                    <input class="form-control" placeholder="Enter Your Product Name..." type="text">
                                    <button class="submit" type="submit"><img src="assets/images/icons/search.svg"
                                            class="svg_img header_svg" alt="" /></button>
                                </form>
                            </div>
                        </div>
                        <!-- Ec Header Search End -->

                        <!-- Ec Header Button Start -->
                        <div class="align-self-center">
                            <div class="ec-header-bottons">

                                <!-- Header User Start -->
                                <div class="ec-header-user dropdown">
                                    <button class="dropdown-toggle" data-bs-toggle="dropdown"><img
                                            src="assets/images/icons/user.svg" class="svg_img header_svg" alt="" /></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="register?ref=false">Register</a></li>
                                        <li><a class="dropdown-item" href="checkout">Checkout</a></li>
                                        <li><a class="dropdown-item" href="login?ref=false">Login</a></li>
                                    </ul>
                                </div>
                                <!-- Header User End -->
                                <!-- Header wishlist Start -->
                                <a href="wishlist" class="ec-header-btn ec-header-wishlist">
                                    <div class="header-icon"><img src="assets/images/icons/wishlist.svg"
                                            class="svg_img header_svg" alt="" /></div>
                                    <span class="ec-header-count">4</span>
                                </a>
                                <!-- Header wishlist End -->
                                <!-- Header Cart Start -->
                                <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                    <div class="header-icon"><img src="assets/images/icons/cart.svg"
                                            class="svg_img header_svg" alt="" /></div>
                                    <span class="ec-header-count cart-count-lable">3</span>
                                </a>
                                <!-- Header Cart End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Header Button End -->
        <!-- Header responsive Bottom  Start -->
        <div class="ec-header-bottom d-lg-none">
            <div class="container position-relative">
                <div class="row ">

                    <!-- Ec Header Logo Start -->
                    <div class="col">
                        <div class="header-logo">
                            <a href="'.siteLink().'"><img src="assets/images/logo/logo.png" alt="Site Logo" /><img
                                    class="dark-logo" src="assets/images/logo/dark-logo.png" alt="Site Logo"
                                    style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="#">
                                <input class="form-control" placeholder="Enter Your Product Name..." type="text">
                                <button class="submit" type="submit"><img src="assets/images/icons/search.svg"
                                        class="svg_img header_svg" alt="icon" /></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->
                </div>
            </div>
        </div>
        <!-- Header responsive Bottom  End -->
        <!-- EC Main Menu Start -->
        <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-md-12 align-self-center">
                        <div class="ec-main-menu">
                            <ul>
                                <li><a href="'.siteLink().'">Home</a></li>
                                <li><a href="about-us">About Us</a></li>';
                                $cats = getMenuCats();
                                foreach($cats as $cat){
                                      $header .= '<li><a href="product-category?cat='.$cat['cat_id'].'">'.$cat['cat_name'].'</a>';
                                }
                                $header .=
                                '<li><a href="contact-us">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec Main Menu End -->
        <!-- ekka Mobile Menu Start -->
        <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
            <div class="ec-menu-title">
                <span class="menu_title">My Menu</span>
                <button class="ec-close">×</button>
            </div>
            <div class="ec-menu-inner">
                <div class="ec-menu-content">
                    <ul>
                    <li><a href="'.siteLink().'">Home</a></li>
                                <li><a href="about-us">About Us</a></li>';
                                $cats = getMenuCats();
                                foreach($cats as $cat){
                                     $header .=  '<li><a href="product-category?cat='.$cat['cat_name'].'">'.$cat['cat_id'].'</a>';
                                }
                                $header .=
                                '
                                <li><a href="contact-us">Contact Us</a></li>
                    </ul>
                </div>
                <div class="header-res-lan-curr">
                    <div class="header-top-lan-curr">
                        <!-- Language Start -->
                        <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Language <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">English</a></li>
                                <li><a class="dropdown-item" href="#">Italiano</a></li>
                            </ul>
                        </div>
                        <!-- Language End -->
                        <!-- Currency Start -->
                        <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">Currency <i
                                    class="ecicon eci-caret-down" aria-hidden="true"></i></button>
                            <ul class="dropdown-menu">
                                <li class="active"><a class="dropdown-item" href="#">USD $</a></li>
                                <li><a class="dropdown-item" href="#">EUR €</a></li>
                            </ul>
                        </div>
                        <!-- Currency End -->
                    </div>
                    <!-- Social Start -->
                    <div class="header-res-social">
                        <div class="header-top-social">
                            <ul class="mb-0">
                                <li class="list-inline-item"><a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a></li>
                                <li class="list-inline-item"><a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Social End -->
                </div>
            </div>
        </div>
        <!-- ekka mobile Menu End -->
    </header>

    ';
    return $header;

    
}

function getLocations() {
    global $database;
    $query = "SELECT * FROM locations ORDER BY loc_name ASC";
    $result = mysqli_query($database, $query);
    while($answer = mysqli_fetch_assoc($result)) {
        $data[] = $answer;
    }
    return $data;
}

function getCats() {
    global $database;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($database, $query);
    while($answer = mysqli_fetch_assoc($result)) {
        $data[] = $answer;
    }
    return $data;
}


function getMenuCats() {
    global $database;
    $query = "SELECT * FROM categories ORDER BY RAND() LIMIT 6";
    $result = mysqli_query($database, $query);
    while($answer = mysqli_fetch_assoc($result)) {
        $data[] = $answer;
    }
    return $data;
}

function getProducts($id) {
    global $database;
    $query = "SELECT * FROM products LEFT JOIN product_images ON product_images.products_prod_id = products.prod_id
     WHERE categories_cat_id = '".mysqli_real_escape_string($database, $id)."'";
    $result = mysqli_query($database, $query);
    while($answer = mysqli_fetch_assoc($result)) {
        $data[] = $answer;
    }
    return $data;
}

function getAllProducts() {
    global $database;
    $query = "SELECT * FROM products LEFT JOIN product_images ON product_images.products_prod_id = products.prod_id
    ";
    $result = mysqli_query($database, $query);
    while($answer = mysqli_fetch_assoc($result)) {
        $data[] = $answer;
    }
    return $data;
}


function getRandomProducts($limit) {
    global $database;
    $query = "SELECT * FROM products LEFT JOIN product_images ON product_images.products_prod_id = products.prod_id
    ORDER BY RAND() LIMIT ".$limit."";
    $result = mysqli_query($database, $query);
    while($answer = mysqli_fetch_assoc($result)) {
        $data[] = $answer;
    }
    return $data;
}

function getGenderProducts($gender) {
    global $database;
    $query = "SELECT * FROM products LEFT JOIN product_images ON product_images.products_prod_id = products.prod_id
    WHERE gen_cat_id = '".mysqli_real_escape_string($database, $gender)."'";
    $result = mysqli_query($database, $query);
    while($answer = mysqli_fetch_assoc($result)) {
        $data[] = $answer;
    }
    return $data;
}

function getSingleProduct($id) {
    global $database;
    $query = "SELECT * FROM products LEFT JOIN product_images ON product_images.products_prod_id = products.prod_id
     WHERE prod_id = '".mysqli_real_escape_string($database, $id)."'";
     $result = mysqli_query($database, $query);
     while($answer = mysqli_fetch_assoc($result)) {
         $data[] = $answer;
     }
     return $data;
}

function salt() {
    $data = "&%@^#^&(@&_)HWLJB-E@^#(@&)#@*(*_@)#@@#+_+_+_";
    return $data;
}

function logInUser($email, $pass, $ref) {
    global $database;
    $pass = sha1($pass.salt());
    $query = "SELECT * FROM users WHERE u_email = '".mysqli_real_escape_string($database, $email)."' AND u_pass = '".mysqli_real_escape_string($database, $pass)."'";
    $result = mysqli_query($database, $query);
    if(mysqli_num_rows($result) > 0) {
        $answer = mysqli_fetch_assoc($result);
        $_SESSION['u_ath'] = md5($answer['u_id']);
        if(isset($ref) && $ref == "checkout") {
            header('location: /'.custom_site_base()."checkout");

        }else {
            header("location:/".custom_site_base()."account");
        }
    }else {
        $data = '
        <div class="recent-purchase">
        <img src="assets/images/product-image/1.jpg" alt="payment image">
        <div class="detail">
            <p>Sorry, An Error Occured</p>
            <h6>The email/password combination that you provided is incorrect</h6>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div>
        ';
    }
    while($answer = mysqli_fetch_assoc($result)) {
        $data[] = $answer;
    }
    return $data;
}

function createAccount($f_name, $s_name, $email, $address, $city, $gender, $phone, $pass, $ref){
	global $database;
	$chkq = "SELECT * FROM users
		WHERE u_email = '".mysqli_real_escape_string($database, $email)."'";
	$chkr = mysqli_query($database, $chkq);
	if(mysqli_num_rows($chkr) == 0){
		$pass = sha1($pass.salt());
		$insq = "INSERT INTO users (u_fname, u_sname, u_email, u_address, u_city, u_gender, u_phone, u_pass) VALUES 
			('".mysqli_real_escape_string($database, $f_name)."', 
            '".mysqli_real_escape_string($database, $s_name)."', 
            '".mysqli_real_escape_string($database, $email)."',
             '".mysqli_real_escape_string($database, $address)."',
             '".mysqli_real_escape_string($database, $city)."',
              '".mysqli_real_escape_string($database, $gender)."',
               '".mysqli_real_escape_string($database, $phone)."',
                '".mysqli_real_escape_string($database, $pass)."')";
		$insr = mysqli_query($database, $insq);
		$insert_id = mysqli_insert_id($database);
		if(!$insr){
			$data = "<span class=\"alert_this_message\">".genericError()."</span>";
		}
		else{
			$_SESSION['u_auth'] = md5($insert_id);
			if(isset($ref) && $ref == "checkout"){
				header("Location:/".custom_site_base()."checkout");
			}
			else{
				header("Location:/".custom_site_base()."account");
			}
		}
	}
	else{
		$data = '
        <div class="recent-purchase">
        <img src="assets/images/product-image/1.jpg" alt="payment image">
        <div class="detail">
            <p>Important Message</p>
            <p> Sorry, the email has been registered already </p>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div>
        ';
	}
	return $data;
}

function getUserDetails() {
    global $database;
    $query = "SELECT * FROM users WHERE md5(u_id) = '".mysqli_real_escape_string($database, $_SESSION['u_auth'])."'";
    $result = mysqli_query($database, $query);
    if(mysqli_num_rows($result) > 0) {
        $answer = mysqli_fetch_assoc($result);
        $data = $answer;
    }else {
        $data = "0"; 
    }
    return $data;
}

function updateAccount($f_name, $s_name, $email, $phone, $address, $id) {
    global $database;
    $updq = "UPDATE users SET u_fname ='".mysqli_real_escape_string($database, $f_name)."', 
    u_sname = '".mysqli_real_escape_string($database, $s_name)."',
    u_email = '".mysqli_real_escape_string($database, $email)."',
    u_phone = '".mysqli_real_escape_string($database, $phone)."',
    u_address = '".mysqli_real_escape_string($database, $address)."'
    WHERE u_id = '".mysqli_real_escape_string($database, $id)."'
    ";
    $updr = mysqli_query($database, $updq);
    if(!$updr) {
        $data = '
        <div class="recent-purchase">
        <img src="assets/images/product-image/1.jpg" alt="payment image">
        <div class="detail">
            <p>Important Message</p>
            <p>'.genericError().'</p>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div>
        ';
    }else {
        // Account infomration has been updated
        $data = '
        <div class="recent-purchase">
        <img src="assets/images/product-image/1.jpg" alt="payment image">
        <div class="detail">
            <p>Important Message</p>
            <p> Account Information has been updated </p>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div>
        ';
    }
    return $data;
}

function updatePassword($oldpass, $newpass) {
    global $database;
    $oldpass = sha1($oldpass.salt());
    $newpass = sha1($newpass.salt());

    $query = "SELECT * FROM users WHERE u_pass = '".mysqli_real_escape_string($database, $oldpass)."'";
    $result = mysqli_query($database, $query);
    if(mysqli_num_rows($result) > 0) {
        $answer = mysqli_fetch_assoc($result);
        $updq = "UPDATE users SET u_pass = '".mysqli_real_escape_string($database, $newpass)."'
         WHERE u_id = '".mysqli_real_escape_string($database, $answer['u_id'])."'";
         $updr = mysqli_query($database, $updq);
         if(!$updr) {
             $data = genericError();
         }else {
             $data = '
             <div class="recent-purchase">
             <img src="assets/images/product-image/1.jpg" alt="payment image">
             <div class="detail">
                 <p>Important Message</p>
                 <p> Password updated!!! </p>
             </div>
             <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
         </div>';
         }
    }else {
        $data = '
        <div class="recent-purchase">
        <img src="assets/images/product-image/1.jpg" alt="payment image">
        <div class="detail">
            <p>Important Message</p>
            <p> Sorry, you entered an incorrect password </p>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div>
        ';
        
    }
    return $data;
}

function updateSubscription($bool, $id){
	global $database;
	if($bool == "yes"){
		$sub = 1;
	}
	else{
		$sub = 0;
	}
	$updq = "UPDATE users
		SET u_sub = '".mysqli_real_escape_string($database, $sub)."'
		WHERE u_id = '".mysqli_real_escape_string($database, $id)."'";
	$updr = mysqli_query($database, $updq);
	if(!$updr){
		$data = genericError();
	}
	else{
		$data = "Subscription settings updated";
	}
	return $data;
}

function ajaxInsertAddress($f_name, $s_name, $phone, $street, $city, $lga, $id, $default, $extra){
	global $database;
	if($extra == 1){
		$updq = "UPDATE users_addresses
			SET ua_stat = 0
			WHERE users_u_id = '".mysqli_real_escape_string($database, $id)."'";
		$updr = mysqli_query($database, $updq);
	}
	$insq = "INSERT INTO users_addresses (ua_fname, ua_sname, ua_phone, ua_street, ua_city, lgas_lga_id, users_u_id, ua_stat)
		VALUES ('".mysqli_real_escape_string($database, $f_name)."', '".mysqli_real_escape_string($database, $s_name)."', '".mysqli_real_escape_string($database, $phone)."', '".mysqli_real_escape_string($database, $street)."', '".mysqli_real_escape_string($database, $city)."', '".mysqli_real_escape_string($database, $lga)."', '".mysqli_real_escape_string($database, $id)."', '".$default."')";
	$insr = mysqli_query($database, $insq);
	$info['addressid'] = mysqli_insert_id($database);
	$info['address'] = $street;
	if(!$insr){
		$data['status'] = genericError();
	}
	else{
		$data['status'] = 1;
		$data['info'] = $info;
	}
	return $data;
}
function ajaxAddAddress($f_name, $s_name, $phone, $street, $city, $lga, $default, $extra){
	global $database;
	$user = getUserDetails();
	$query = "SELECT * FROM users_addresses
		WHERE users_u_id = '".mysqli_real_escape_string($database, $user['u_id'])."'";
	$result = mysqli_query($database, $query);
	if(mysqli_num_rows($result) == 0){
		$default = 1;
		$data = ajaxInsertAddress($f_name, $s_name, $phone, $street, $city, $lga, $user['u_id'], $default, $extra);
	}
	else{
		$exists = FALSE;
		while($answer = mysqli_fetch_assoc($result)){
			if($answer['ua_street'] == $street){
				$exists = TRUE;
			}
		}
		if($exists == TRUE){
			$data['status'] = "Address already exists on this account";
		}
		else{
			$extra = 0;
			if($default == 1){
				$extra = 1;
			}
			$data = ajaxInsertAddress($f_name, $s_name, $phone, $street, $city, $lga, $user['u_id'], $default, $extra);
		}
	}
	return $data;
}
function addAddress($f_name, $s_name, $phone, $street, $city, $lga, $default, $id){
	global $database;
	$query = "SELECT * FROM users_addresses
		WHERE users_u_id = '".mysqli_real_escape_string($database, $id)."'";
	$result = mysqli_query($database, $query);
	if(mysqli_num_rows($result) == 0){
		$default = 1;
		$data = insertAddress($f_name, $s_name, $phone, $street, $city, $lga, $id, $default);
	}
	else{
		$exists = FALSE;
		while($answer = mysqli_fetch_assoc($result)){
			if($answer['ua_street'] == $street){
				$exists = TRUE;
			}
		}
		if($exists == TRUE){
			$data = "Address already exists on this account";
		}
		else{
			$extra = 0;
			if($default == 1){
				$extra = 1;
			}
			$data = insertAddress($f_name, $s_name, $phone, $street, $city, $lga, $id, $default, $extra);
		}
	}
	return $data;
}
function editAddress($f_name, $s_name, $phone, $street, $city, $lga, $default, $id, $addid){
	global $database;
	$query = "SELECT *, COUNT(ua_id) FROM users_addresses
		WHERE users_u_id = '".mysqli_real_escape_string($database, $id)."'
		AND ua_stat = 1";
	$result = mysqli_query($database, $query);
	$answer = mysqli_fetch_assoc($result);
	if(mysqli_num_rows($result) == 0 || $answer['COUNT(ua_id)'] == 0){
		$default = 1;
	}
	if((mysqli_num_rows($result) > 0) && ($answer['ua_id']) == $addid){
		$default = 1;
	}
	$data = updateAddress($f_name, $s_name, $phone, $street, $city, $lga, $id, $default, $addid);
	return $data;
}
function insertAddress($f_name, $s_name, $phone, $street, $city, $lga, $id, $default, $extra){
	global $database;
	if($extra == 1){
		$updq = "UPDATE users_addresses
			SET ua_stat = 0
			WHERE users_u_id = '".mysqli_real_escape_string($database, $id)."'";
		$updr = mysqli_query($database, $updq);
	}
	$insq = "INSERT INTO users_addresses (ua_fname, ua_sname, ua_phone, ua_street, ua_city, lgas_lga_id, users_u_id, ua_stat)
		VALUES ('".mysqli_real_escape_string($database, $f_name)."', '".mysqli_real_escape_string($database, $s_name)."', '".mysqli_real_escape_string($database, $phone)."', '".mysqli_real_escape_string($database, $street)."', '".mysqli_real_escape_string($database, $city)."', '".mysqli_real_escape_string($database, $lga)."', '".mysqli_real_escape_string($database, $id)."', '".$default."')";
	$insr = mysqli_query($database, $insq);
	if(!$insr){
		$data = genericError();
	}
	else{
		header("Location: /".custom_site_base()."address-book");
	}
	return $data;
}
function updateAddress($f_name, $s_name, $phone, $street, $city, $lga, $id, $default, $addid){
	global $database;
	$updq = "UPDATE users_addresses 
		SET ua_fname = '".mysqli_real_escape_string($database, $f_name)."',
		ua_sname = '".mysqli_real_escape_string($database, $s_name)."',
		ua_phone = '".mysqli_real_escape_string($database, $phone)."',
		ua_street = '".mysqli_real_escape_string($database, $street)."',
		ua_city = '".mysqli_real_escape_string($database, $city)."',
		lgas_lga_id = '".mysqli_real_escape_string($database, $lga)."',
		users_u_id = '".mysqli_real_escape_string($database, $id)."',
		ua_stat = '".$default."'
		WHERE ua_id = '".mysqli_real_escape_string($database, $addid)."'";
	$updr = mysqli_query($database, $updq);
	if(!$updr){
		$data = genericError();
	}
	else{
		$updq2 = "UPDATE users_addresses
			SET ua_stat = 0
			WHERE users_u_id = '".mysqli_real_escape_string($database, $id)."'
			AND ua_id != '".mysqli_real_escape_string($database, $addid)."'";
		$updr2 = mysqli_query($database, $updq2);
		header("Location: /".custom_site_base()."address-book");
	}
	return $data;
}