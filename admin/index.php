<?php
// Start session
session_start();

// Check if session variable is not set or is empty
if (!isset($_SESSION['adm_id']) || empty($_SESSION['adm_id'])) {
    // Redirect user to the login page
    header("Location: sign-in.php");
    exit(); // Make sure to exit after redirecting
}
?>
<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from www.wrraptheme.com/templates/compass/html/blog-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2024 10:25:30 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>TLWDFoundation Admin Dashboard</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css"/>
<link rel="stylesheet" href="assets/plugins/morrisjs/morris.css" />
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/blog.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
</head>
<body class="theme-blush">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/favicon.png" width="48" height="48" alt="Compass"></div>
        <p>Please wait...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar">
    <div class="col-12">        
        <div class="navbar-header">
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="index.php"><img src="assets/images/favicon.png" width="30" alt="Compass"><span class="m-l-10">Admin</span></a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                </a>
                <ul class="dropdown-menu dropdown-menu-right slideDown">
                    <li class="header">NOTIFICATIONS</li>
                    <li class="body">
                        <ul class="menu list-unstyled">
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-blue"><i class="zmdi zmdi-account"></i></div>
                                <div class="menu-info">
                                    <h4>8 New Members joined</h4>
                                    <p><i class="zmdi zmdi-time"></i> 14 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-amber"><i class="zmdi zmdi-shopping-cart"></i></div>
                                <div class="menu-info">
                                    <h4>4 Sales made</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 22 mins ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-red"><i class="zmdi zmdi-delete"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy Doe</b> Deleted account</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-green"><i class="zmdi zmdi-edit"></i></div>
                                <div class="menu-info">
                                    <h4><b>Nancy</b> Changed name</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 2 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-grey"><i class="zmdi zmdi-comment-text"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> Commented your post</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 4 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-purple"><i class="zmdi zmdi-refresh"></i></div>
                                <div class="menu-info">
                                    <h4><b>John</b> Updated status</h4>
                                    <p> <i class="zmdi zmdi-time"></i> 3 hours ago </p>
                                </div>
                                </a> </li>
                            <li> <a href="javascript:void(0);">
                                <div class="icon-circle bg-light-blue"><i class="zmdi zmdi-settings"></i></div>
                                <div class="menu-info">
                                    <h4>Settings Updated</h4>
                                    <p> <i class="zmdi zmdi-time"></i> Yesterday </p>
                                </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a>
            </li>
            <a href="#" class="btn_logout" title="Sign out"><i class="zmdi zmdi-power"></i></a>
        </ul>
    </div>
</nav>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar"> 
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="profile.html"><img src="assets/images/profile_av.jpg" alt="User"></a></div>
                    <div class="detail">
                        <h4 id="user_name"></h4>
                        <small id="user_position"></small>                        
                    </div>
                    <a href="mail-inbox.html" title="Inbox"><i class="zmdi zmdi-email"></i></a>
                    <a href="#" class="btn_logout" title="Sign out"><i class="zmdi zmdi-power"></i></a>
                </div>
            </li>
            <li class="header">MAIN NAVIGATION</li>
            <li class="active open"><a href="index.php"><i class="zmdi zmdi-view-dashboard"></i><span>Dashboard</span> </a> </li>
            <li> <a href="list-donation.php"><i class="zmdi zmdi-view-dashboard"></i><span>Urget Donation</span> </a> </li>
            <li> <a href="gallery.php"><i class="zmdi zmdi-image-alt"></i><span>Gallery</span> </a> </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label col-red"></i><span>Initiative</span> </a>
                <ul class="ml-menu">
                    <li><a href="climate-change.php">Climate Change</a> </li>
                    <li><a href="youth-empowerment.php">Youth Empowerment</a> </li>
                    <li><a href="quality_education.php">Quality Education</a> </li>
                    <li><a href="health.php">Health & Personal Hygiene</a> </li>
                </ul>
            </li>
            <li> <a href="programs-list.php"><i class="zmdi zmdi-blogger"></i><span>Programs</span> </a> </li>
            <li> <a href="blog-post.php"><i class="zmdi zmdi-picture-in-picture"></i><span>Post New Blog</span> </a> </li>
            <li><a href="blog-list.php"><i class="zmdi zmdi-sort-amount-desc"></i><span>Blog List</span> </a> </li>
            <li><a href="general-settings.php"><i class="zmdi zmdi-settings-square"></i><span>General Settings</span> </a> </li>                
        </ul>
    </div>
    <!-- #Menu --> 
</aside>

<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Dashboard</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card widget_2">
            <ul class="row clearfix list-unstyled m-b-0">
                <li class="col-lg-3 col-md-6 col-sm-12">
                    <div class="body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="m-t-0">Total Donation</h5>
                                <p class="text-small">This month</p>
                            </div>
                            <div class="col-5 text-right">
                                <h2 class="total_donation"></h2>
                            </div>
                            <div class="col-12">
                                <div class="progress m-t-20">
                                <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12">
                    <div class="body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="m-t-0">Total Donators</h5>
                                <p class="text-small">This month</p>
                            </div>
                            <div class="col-5 text-right">
                                <h2 class="total_donators"></h2>
                            </div>
                            <div class="col-12" id="progress_donators">
                              
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12">
                    <div class="body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="m-t-0">Initiative</h5>
                                <p class="text-small">Total Initiative Post</p>
                            </div>
                            <div class="col-5 text-right">
                                <h2 class="total_Initiative"></h2>
                            </div>
                            <div class="col-12">
                                <div class="progress m-t-20">
                                <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100" style="width: 39%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="col-lg-3 col-md-6 col-sm-12">
                    <div class="body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="m-t-0">Urgent Donation</h5>
                                <p class="text-small">Total active urgent donation Post</p>
                            </div>
                            <div class="col-5 text-right">
                                <h2 class="total_donationspost"></h2>
                            </div>
                            <div class="col-12">
                                <div class="progress m-t-20">
                                <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="row profile_state list-unstyled">
                        <li class="col-lg-6 col-md-3 col-6">
                            <div class="body">
                                <i class="zmdi zmdi-eye col-amber"></i>
                                <h4>2,365</h4>
                                <span>Blog Viewers</span>
                            </div>
                        </li>
                        <li class="col-lg-6 col-md-3 col-6">
                            <div class="body">
                                <i class="zmdi zmdi-comment-text col-red"></i>
                                <h4>65</h4>
                                <span>Comments</span>
                            </div>
                        </li>                     
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card project_list">
                    <div class="header">
                        <h2><strong>Active Donation</strong> List</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>                                       
                                        <th>Donation Name</th>
                                        <th>Terget</th>   
                                        <th class="hidden-md-down">Raised Amount</th>                                     
                                        <th class="hidden-md-down">Status</th>
                                        <th>Due Date</th>
                                    </tr>
                                </thead>
                                <tbody id="active_donation">
                                  
    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
        <div class="row clearfix">
            <div class="col-sm-12">
                 <div class="card">
                    <div class="header">
                        <h2><strong>Blog</strong> Post</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive social_media_table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Blog Name</th>
                                        <th>Poster Name</th>                                                                               
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody id="active_blog">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>   
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script><!-- USA Map Js -->

<script src="assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/blog/blog.js"></script>
<script src="assets/js/pages/charts/jquery-knob.min.js"></script>
<script>
    $(document).ready(function(){
        fetch_users_info();
        function fetch_users_info() {
            $.ajax({
                url: 'includes/fetch_users_info.php',
                method: 'POST',
                success: function(data) {
                    $('#user_name').html(data.fullname);
                    $('#user_position').html(data.userposition);
                }
            });
        }
        // fetch total donation
        getTotalDonation();
        function getTotalDonation() {
            $.ajax({
                url: 'includes/fetch_total_donation.php',
                method: 'POST',
                success: function(data) {
                    $('.total_donation').html(data.totaldonation);
                    $('.total_donators').html(data.totaldonators);
                }
            });
        }
        // fetch total program
        getTotalprogram();
        function getTotalprogram() {
            $.ajax({
                url: 'includes/fetch_total_Initiative.php',
                method: 'POST',
                success: function(data) {
                    $('.total_Initiative').html(data.totalInitiative);
                }
            });
        }
        // fetch all total donations
        getTotalurgentdonation();
        function getTotalurgentdonation() {
            $.ajax({
                url: 'includes/fetch_total_udonation.php',
                method: 'POST',
                success: function(data) {
                    $('.total_donationspost').html(data.totaldonationspost);
                }
            });
        }
        // fetch active donation
        getActiveDonation();
        function getActiveDonation() {
            $.ajax({
                url: 'includes/fetch_active_donation.php',
                method: 'POST',
                success: function(data) {
                    $('#active_donation').html(data);
                }
            });
        }
        // fetch blog posts
        getBlogposts();
        function getBlogposts() {
            $.ajax({
                url: 'includes/fetch_blog_posts.php',
                method: 'POST',
                success: function(data) {
                    $('#active_blog').html(data);
                }
            });
        }
        // logout function call
        $(".btn_logout").on('click', function(e){
            e.preventDefault();
            // Ajax request for logout
            $.ajax({
                type: 'POST',
                url: 'includes/logout.php', // PHP script to handle logout
                dataType: 'json',
                success: function(response) {
                    // Redirect to login page after logout
                    window.location.href = "sign-in.php";
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                    alert('Error logging out. Please try again.');
                }
            });

        });
    });
</script>
</body>

<!-- Mirrored from www.wrraptheme.com/templates/compass/html/blog-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2024 10:26:21 GMT -->
</html>