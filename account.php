<?php 
$page = "account";
include "controllers/firstcalls.php"; 
$user = getUserDetails();
if($user == 0) {
    echo "It is here now";
    // redirect them to the login page
    header('location:/'.custom_site_base()."login?ref=false");
}else {
    // Listing all variables
    $firstname = stripslashes(htmlspecialchars_decode($user['u_fname']));
    $lastname = stripslashes(htmlspecialchars_decode($user['u_sname']));
    $fullname = $lastname.' '.$firstname;
    $email = stripslashes(htmlspecialchars_decode($user['u_email']));
    $address = stripslashes(htmlspecialchars_decode($user['u_address']));
    $password = stripslashes(htmlspecialchars_decode($user['u_pass']));
    $phone = stripslashes(htmlspecialchars_decode($user['u_phone']));
}

if(isset($_POST['update_button'])){
	$i = 0;
    $err = "";
	if($_POST['f_name'] == "" || $_POST['f_name'] == NULL || $_POST['s_name'] == "" || $_POST['s_name'] == NULL || $_POST['s_name'] == "" || $_POST['s_name'] == NULL || $_POST['email'] == "" || $_POST['email'] == NULL || $_POST['address'] == "" || $_POST['phone'] == "" || $_POST['phone'] == NULL){
		if($_POST['f_name'] == "" || $_POST['f_name'] == NULL){ $err = "First name";$i++;}
		if($_POST['s_name'] == "" || $_POST['s_name'] == NULL){ if($i > 0){ $err .= ", ";} $err .= "Last name";$i++;}
		if($_POST['email'] == "" || $_POST['email'] == NULL){ if($i > 0){ $err .= ", ";} $err .= "Email";$i++;}
        if($_POST['address'] == "" || $_POST['address'] == NULL){ if($i > 0){ $err .= ", ";} $err .= "Address";$i++;}
		if($_POST['phone'] == "" || $_POST['phone'] == NULL){ if($i > 0){ $err .= ", ";} $err .= "Phone";$i++;}
        $mmsg = '
        <div class="recent-purchase">
        <img src="assets/images/product-image/1.jpg" alt="payment image">
        <div class="detail">
            <p>Important Message</p>
            <p>Please complete the following fields:<br><i>"'.$err.'"</i>. </p>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div>
        ';
	}
	else{
		
		$mmsg = updateAccount($_POST['f_name'], $_POST['s_name'], $_POST['email'], $_POST['phone'], $_POST['address'], $user['u_id']);
		$user = getUserDetails();
	}
}
else{
	$mmsg = "";
}


// Change Password
if(isset($_POST['update_pass_button'])) {
    if($_POST['o_pass'] == "" || $_POST['o_pass'] == NULL || $_POST['new_pass'] == "" || $_POST['new_pass'] == NULL || $_POST['c_pass'] == "" || $_POST['c_pass'] == NULL){
		$mmsg = '
        <div class="recent-purchase">
        <img src="assets/images/product-image/1.jpg" alt="payment image">
        <div class="detail">
            <p>Important Message</p>
            <p>Please fill all fields </p>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div>
        ';
	}
	else if($_POST['new_pass'] != $_POST['c_pass']){
		$mmsg   = '
        <div class="recent-purchase">
        <img src="assets/images/product-image/1.jpg" alt="payment image">
        <div class="detail">
            <p>Important Message</p>
            <p> Password do not Match </p>
        </div>
        <a href="javascript:void(0)" class="icon-btn recent-close">×</a>
    </div>
        ';
	}
	else{
		$mmsg = updatePassword($_POST['o_pass'], $_POST['new_pass']);
	} 
}
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
                            <h2 class="ec-breadcrumb-title">User Profile</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="">Home</a></li>
                                <li class="ec-breadcrumb-item active">Account</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- User profile section -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-vendor-block">
                                <!-- <div class="ec-vendor-block-bg"></div>
                                <div class="ec-vendor-block-detail">
                                    <img class="v-img" src="assets/images/user/1.jpg" alt="vendor image">
                                    <h5>Mariana Johns</h5>
                                </div> -->
                                <div class="ec-vendor-block-items">
                                    <ul>
                                        <li><a href="account">Dashboard</a></li>
                                        <li><a href="history">History</a></li>
                                        <li><a href="wishlist">Wishlist</a></li>
                                        <li><a href="cart">Cart</a></li>
                                        <li><a href="checkout">Checkout</a></li>
                                        <li><a href="track-order">Track Order</a></li>
                                        <li><a href="logout">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="ec-vendor-block-profile">
                                        <div class="ec-vendor-block-img space-bottom-30">
                                            <div class="ec-vendor-block-bg">
                                                <a href="#" class="btn btn-lg btn-primary"
                                                    data-link-action="editmodal" title="Edit Detail"
                                                    data-bs-toggle="modal" data-bs-target="#edit_modal">Edit Detail</a>
                                            </div>
                                            <div class="ec-vendor-block-detail">
                                                <img class="v-img" src="assets/images/user/1.jpg" alt="vendor image">
                                                <h5 class="name"><?php echo $fullname; ?></h5>
                                                <p>( Customer )</p>
                                            </div>
                                            <p>Hello <span><?php echo $fullname; ?>!</span></p>
                                            <p>From your account you can easily view and track orders. You can manage and change your account information like address, contact information and history of orders.</p>
                                        </div>
                                        <h5>Account Information</h5>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-email space-bottom-30">
                                                    <h6> Authentication Credentials <a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg"
                                                        class="svg_img pro_svg" alt="edit" /></a></h6>
                                                    <ul>
                                                        <li><strong>Email: </strong><a href="https://loopinfosol.in/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3f4c4a4f4f504d4b0e7f5a475e4f52535a115c5052"><?php echo $email; ?></a></li>
                                                        <li><strong>Password : </strong><a href="https://loopinfosol.in/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="81f2f4f1f1eef3f5b3c1e4f9e0f1ecede4afe2eeec">[password&#160;protected]</a></li>
                                                    </ul>
                                                    <br />
                                                   <b> Wanna Change Password </b> <a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_pass_modal">Click Here </a> 
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-contact space-bottom-30">
                                                    <h6>Contact nubmer<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg"
                                                        class="svg_img pro_svg" alt="edit" /></a></h6>
                                                    <ul>
                                                        <li><strong>Phone Nubmer 1 : </strong>(234) <?php echo $phone; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address mar-b-30">
                                                    <h6>Address<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><img src="assets/images/icons/edit.svg"
                                                        class="svg_img pro_svg" alt="edit" /></a></h6>
                                                    <ul>
                                                        <li><strong>Home : </strong><?php echo $address; ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="ec-vendor-detail-block ec-vendor-block-address">
                                                    <h6>Shipping Address<a href="javasript:void(0)" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#add_address_modal"><img src="assets/images/icons/edit.svg"
                                                        class="svg_img pro_svg" alt="edit" />Add Address</a></h6>
                                                    <ul>
                                                        <li><strong>Office : </strong><?php echo ""; ?></li>
                                                    </ul>
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
    </section>
    <!-- End User profile section -->

    <!-- Footer Start -->
    <?php include "includes/footer.php"; ?>
    <!-- Footer Area End -->

    <!-- Modal -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="ec-vendor-block-img space-bottom-30">
                            <div class="ec-vendor-block-bg cover-upload">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type='file' id="thumbUpload01" class="ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label><img src="assets/images/icons/edit.svg"
                                                class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview v-img"
                                                src="assets/images/banner/8.jpg" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-vendor-block-detail">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type='file' id="thumbUpload02" class="ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label><img src="assets/images/icons/edit.svg"
                                                class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview v-img"
                                                src="assets/images/user/1.jpg" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-vendor-upload-detail">
                                <form method="POST" class="row g-3">
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">First name</label>
                                        <input type="text" name="f_name" value="<?php   echo $firstname; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Last name</label>
                                        <input type="text" name="s_name" value="<?php  echo $lastname;  ?>" class="form-control">
                                    </div>
                                    <div class="col-md-12 space-t-15">
                                        <label class="form-label">Address 1</label>
                                        <input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
                                    </div>


                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" value="<?php  echo $email; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 space-t-15">
                                        <label class="form-label">Phone number </label>
                                        <input type="text" name="phone" value="<?php  echo $phone; ?>" class="form-control">
                                    </div>

                                    <div class="col-md-12 space-t-15">
                                        <button type="submit" name="update_button" class="btn btn-primary">Update</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal"
                                            aria-label="Close">Close</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- Modal -->
    <div class="modal fade" id="add_address_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="ec-vendor-block-img space-bottom-30">
                        <div class="ec-vendor-block-bg cover-upload">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type='file' id="thumbUpload01" class="ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label><img src="assets/images/icons/edit.svg"
                                                class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview v-img"
                                                src="assets/images/banner/8.jpg" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-vendor-block-detail">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type='file' id="thumbUpload02" class="ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label><img src="assets/images/icons/edit.svg"
                                                class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview v-img"
                                                src="assets/images/user/1.jpg" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-vendor-upload-detail">
                                <form method="POST" class="row g-3">
                                    <div class="col-md-12 space-t-15">
                                        <label class="form-label">Address</label>
                                        <textarea rows="6" class="form-control" name="add_address"></textarea>
                                    </div>
                                    <div class="col-md-12 space-t-15">
                                        <button type="submit" name="address_button" class="btn btn-primary">Add Address</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal"
                                            aria-label="Close">Close</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->


    <!-- Modal -->
    <div class="modal fade" id="edit_pass_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="ec-vendor-block-img space-bottom-30">
                        <div class="ec-vendor-block-bg cover-upload">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type='file' id="thumbUpload01" class="ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label><img src="assets/images/icons/edit.svg"
                                                class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview v-img"
                                                src="assets/images/banner/8.jpg" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-vendor-block-detail">
                                <div class="thumb-upload">
                                    <div class="thumb-edit">
                                        <input type='file' id="thumbUpload02" class="ec-image-upload"
                                            accept=".png, .jpg, .jpeg" />
                                        <label><img src="assets/images/icons/edit.svg"
                                                class="svg_img header_svg" alt="edit" /></label>
                                    </div>
                                    <div class="thumb-preview ec-preview">
                                        <div class="image-thumb-preview">
                                            <img class="image-thumb-preview ec-image-preview v-img"
                                                src="assets/images/user/1.jpg" alt="edit" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ec-vendor-upload-detail">
                                <form method="POST" class="row g-3">
                                <div class="col-md-12 space-t-15">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" placeholder="Enter Your Current Password" name="o_pass" class="form-control">
                                    </div>
                                    <div class="col-md-12 space-t-15">
                                        <label class="form-label">New Password</label>
                                        <input type="password" placeholder="Enter Your New Password" name="new_pass" class="form-control">
                                    </div>
                                    <div class="col-md-12 space-t-15">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password"  placeholder="Please Confirm Your New Password"  name="c_pass" class="form-control">
                                    </div>
                                    <br /><br />
                                    <div class="col-md-12 space-t-15">
                                        <button type="submit" name="update_pass_button" class="btn btn-success">Update Password</button>
                                        <a href="#" class="btn btn-lg btn-secondary qty_close" data-bs-dismiss="modal"
                                            aria-label="Close">Close</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

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

    <!-- Recent Purchase Popup  -->
    <?php
        echo $mmsg;
    ?>
    <!-- Recent Purchase Popup end -->

    <!-- Cart Floating Button -->
    <div class="ec-cart-float">
        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
            <div class="header-icon"><img src="assets/images/icons/cart.svg" class="svg_img header_svg" alt="" /></div>
            <span class="ec-cart-count cart-count-lable">3</span>
        </a>
    </div>
    <!-- Cart Floating Button end -->

    <!-- Whatsapp -->
    <div class="ec-style ec-right-bottom">
        <!-- Start Floating Panel Container -->
        <div class="ec-panel">
            <!-- Panel Header -->
            <div class="ec-header">
                <strong>Need Help?</strong>
                <p>Chat with us on WhatsApp</p>
            </div>
            <!-- Panel Content -->
            <div class="ec-body">
                <ul>
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="assets/images/whatsapp/profile_01.jpg" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Sahar Darya</span>
                                    <p>Sahar left 7 mins ago</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="assets/images/whatsapp/profile_02.jpg" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon ec-online"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Yolduz Rafi</span>
                                    <p>Yolduz is online</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="assets/images/whatsapp/profile_03.jpg" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon ec-offline"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Nargis Hawa</span>
                                    <p>Nargis left 30 mins ago</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                    <!-- Start Single Contact List -->
                    <li>
                        <a class="ec-list" data-number="918866774266"
                            data-message="Please help me! I have got wrong product - ORDER ID is : #654321485">
                            <div class="d-flex bd-highlight">
                                <!-- Profile Picture -->
                                <div class="ec-img-cont">
                                    <img src="assets/images/whatsapp/profile_04.jpg" class="ec-user-img"
                                        alt="Profile image">
                                    <span class="ec-status-icon ec-offline"></span>
                                </div>
                                <!-- Display Name & Last Seen -->
                                <div class="ec-user-info">
                                    <span>Khadija Mehr</span>
                                    <p>Khadija left 50 mins ago</p>
                                </div>
                                <!-- Chat iCon -->
                                <div class="ec-chat-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <!--/ End Single Contact List -->
                </ul>
            </div>
        </div>
        <!--/ End Floating Panel Container -->
        <!-- Start Right Floating Button-->
        <div class="ec-right-bottom">
            <div class="ec-box">
                <div class="ec-button rotateBackward">
                    <img class="whatsapp" src="assets/images/common/whatsapp.png" alt="whatsapp icon" />
                </div>
            </div>
        </div>
        <!--/ End Right Floating Button-->
    </div>
    <!-- Whatsapp end -->

  

    <!-- Vendor JS -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/bootstrap-tagsinput.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery.magnific-popup.min.js"></script>

    <!--Plugins JS-->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/nouislider.js"></script>
    <script src="assets/js/plugins/countdownTimer.min.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/infiniteslidev2.js"></script>
    <script src="assets/js/plugins/jquery.sticky-sidebar.js"></script>

    <!-- Main Js -->
    <script src="assets/js/main.js"></script>

</body>

<!-- Mirrored from loopinfosol.in/themeforest/ekka-html-v2/ekka-html/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Nov 2021 05:40:53 GMT -->
</html>