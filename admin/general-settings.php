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

<!-- Mirrored from www.wrraptheme.com/templates/compass/html/blog-post.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2024 10:27:42 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>TLWDFoundation Admin</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/dropzone/dropzone.css">
<link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
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
            <li><a href="index.php"><i class="zmdi zmdi-view-dashboard"></i><span>Dashboard</span> </a> </li>
            <li> <a href="list-donation.php"><i class="zmdi zmdi-view-dashboard"></i><span>Urget Donation</span> </a> </li>
            <li> <a href="gallery.php"><i class="zmdi zmdi-image-alt"></i><span>Gallery</span> </a> </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-label col-red"></i><span>Initiative</span> </a>
                <ul class="ml-menu">
                    <li class="active open"><a href="climate-change.php">Climate Change</a> </li>
                    <li><a href="youth-empowerment.php">Youth Empowerment</a> </li>
                    <li><a href="quality_education.php">Quality Education</a> </li>
                    <li><a href="health.php">Health & Personal Hygiene</a> </li>
                </ul>
            </li>
            <li> <a href="programs-list.php"><i class="zmdi zmdi-blogger"></i><span>Programs</span> </a> </li>
            <li> <a href="blog-post.php"><i class="zmdi zmdi-picture-in-picture"></i><span>Post New Blog</span> </a> </li>
            <li><a href="blog-list.php"><i class="zmdi zmdi-sort-amount-desc"></i><span>Blog List</span> </a> </li>
            <li class="active open"><a href="general-settings.php"><i class="zmdi zmdi-settings-square"></i><span>General Settings</span> </a> </li>                
        </ul>
    </div>
    <!-- #Menu --> 
</aside>

<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Settings</h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Settins</a></li>
                    <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                    <li class="breadcrumb-item active">General Settings</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Slide Shows</strong></h2>
                    </div>
                    <div class="body">
                        <form action="#" id="form_Slide">
                            <div class="form-group">
                            <input type="text" class="form-control" id="slid_title" name="slid_title" placeholder="Enter slid title" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="Enter sub-title" />
                        </div>
                        <div id="frmFileUpload" class="dropzone m-b-20 m-t-20 dz-clickable">
                            <div class="dz-message">
                                <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                <h3>Drop an image here or click to upload.</h3>
                                <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                            </div>
                            <!-- No need for the input file element here -->
                        </div> 
                        <button class="btn btn-success" type="submit">Upload</button>
                        <a href="#" class="btn btn-default" id="view_slides" title="Click here to view all slides">View List</a>
                        </form>                   
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>About Us</strong></h2>
                                    </div>
                                    <div class="body">
                                        <form id="form_About">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" id="about_id" name="about_id">
                                                    <div class="form-line">
                                                        <textarea rows="4" class="form-control no-resize" id="about_text" name="about_text" placeholder="Please type what you want..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <button class="btn btn-success" type="submit" id="update_about">Update</button>
                                        </form>                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Our Mission</strong></h2>
                                    </div>
                                    <div class="body">
                                        <form action="#" id="form_Mission">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input type="hidden" id="mission_id" name="mission_id">
                                                    <div class="form-line">
                                                        <textarea rows="4" class="form-control no-resize" id="mission_text" name="mission_text" placeholder="Please type what you want..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <button class="btn btn-success" type="submit" id="update_mission">Update</button>  
                                        </form>                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Our Vission</strong></h2>
                                    </div>
                                    <div class="body">
                                        <form action="#" id="form_Vission">
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <input type="hidden" id="vission_id" name="vission_id">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea rows="4" class="form-control no-resize" id="vission_text" name="vission_text" placeholder="Please type what you want..."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <button class="btn btn-success" type="submit" id="update_vission">Update</button>
                                        </form>                         
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                            <div class="header">
                                <h2><strong>Page Contacts</strong> <small>Insert the page contact informations here</small> </h2>                        
                            </div>
                            <div class="body">
                                <form action="#" id="form_Contact">
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">                                   
                                            <input type="text" id="phonenumber" name="phonenumber" class="form-control" placeholder="Phone number">                                    
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">                                   
                                            <input type="email" class="form-control" id="emailaddress" name="emailaddress" placeholder="email address">                                   
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" id="officeaddress" name="officeaddress" placeholder="Office address">                                    
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" id="mediafacebook" name="mediafacebook" placeholder="Facebook link address">                                    
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" id="mediatwiter" name="mediatwiter" placeholder="Tweeter Link address">                                    
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">                                   
                                            <input type="text" class="form-control" id="mediaig" name="mediaig" placeholder="Instagram Link address">                                    
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success" type="submit" id="update_all">Update Info</button>
                                </form>
                            </div>
                        </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Team members</strong></h2>
                    </div>
                    <div class="body">
                        <form action="#" method="post" id="form_add_team">
                        <div class="form-group">
                            <input type="text" class="form-control" name="team_name" id="team_name" placeholder="Enter name" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="team_position" id="team_position" placeholder="Enter Position" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="team_fb_handle" id="team_fb_handle" placeholder="Enter facebook handle" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="team_tl_handle" id="team_tl_handle" placeholder="Enter twiter handle" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="team_in_handle" id="team_in_handle" placeholder="Enter linkedin handle" />
                        </div>
                        <div id="frmFileUpload_team" class="dropzone m-b-20 m-t-20 dz-clickable">
                            <div class="dz-message">
                                <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                <h3>Drop an image here or click to upload.</h3>
                                <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                            </div>
                            <!-- No need for the input file element here -->
                        </div> 
                        <button class="btn btn-success" type="submit">Add Team</button>
                        <a href="#" class="btn btn-default" id="view_team" title="Click here to view all slides">View List</a>
                        </form>                     
                    </div>
                </div>

                <div class="card">
                    <div class="header">
                        <h2><strong>Trusties members</strong></h2>
                    </div>
                    <div class="body">
                        <form action="#" method="post" id="form_trusties" enctype="multipart/form-data">
                        <div id="FileUpload_trusties" class="dropzone m-b-20 m-t-20 dz-clickable">
                            <div class="dz-message">
                                <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                <h3>Drop an image here or click to upload.</h3>
                                <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                            </div>
                            <!-- No need for the input file element here -->
                        </div> 
                        <button class="btn btn-success" type="submit">Upload</button> 
                        <a href="#" class="btn btn-default" id="view_trusties" title="Click here to view all slides">View List</a>
                        </form>  
                                            
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">List Of Slide Show</h4>
            </div>
            <div class="modal-body">
            <table class="table table-hover m-b-0 footable footable-1 footable-paging footable-paging-center breakpoint-lg" style="">
                            <thead>
                                <tr class="footable-header">
                                    <th class="footable-sortable footable-first-visible" style="display: table-cell;">Image<span class="fooicon fooicon-sort"></span></th>
                                    <th class="footable-sortable" style="display: table-cell;">Slide Title<span class="fooicon fooicon-sort"></span></th>
                                    <th data-breakpoints="sm xs" class="footable-sortable" style="display: table-cell;">Sub Title<span class="fooicon fooicon-sort"></span></th>
                                    <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Date Posted<span class="fooicon fooicon-sort"></span></th>
                                    <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Action<span class="fooicon fooicon-sort"></span></th>
                                </tr>
                            </thead>
                            <tbody id="load_slide_list"></tbody>
                        <tfoot>
                        </tfoot>
                    </table>            
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalteam" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">List Of Team Members</h4>
            </div>
            <div class="modal-body">
            <table class="table table-hover m-b-0 footable footable-1 footable-paging footable-paging-center breakpoint-lg" id="view_team_div">
                            <thead>
                                <tr class="footable-header">
                                    <th class="footable-sortable footable-first-visible" style="display: table-cell;">Image<span class="fooicon fooicon-sort"></span></th>
                                    <th class="footable-sortable" style="display: table-cell;">Name<span class="fooicon fooicon-sort"></span></th>
                                    <th data-breakpoints="sm xs" class="footable-sortable" style="display: table-cell;">Position<span class="fooicon fooicon-sort"></span></th>
                                    <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Action<span class="fooicon fooicon-sort"></span></th>
                                </tr>
                            </thead>
                            <tbody id="load_team_list"></tbody>
                        <tfoot>
                        </tfoot>
                </table>
                <div class="side-edit d-none" id="edit_team_div">
                <form action="#" method="post" id="form_edit_team">
                    <input type="hidden" class="form-control" name="team_id" id="team_id"/>
                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_team_name" id="edit_team_name" placeholder="Enter name" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_team_position" id="edit_team_position" placeholder="Enter Position" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_team_fb_handle" id="edit_team_fb_handle" placeholder="Enter facebook handle" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_team_tl_handle" id="edit_team_tl_handle" placeholder="Enter twiter handle" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="edit_team_in_handle" id="edit_team_in_handle" placeholder="Enter linkedin handle" />
                        </div>
                        <div id="frmFileUpload_edit_team" class="dropzone m-b-20 m-t-20 dz-clickable">
                            <div class="dz-message">
                                <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                <h3>Drop an image here or click to upload.</h3>
                                <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                            </div>
                            <!-- No need for the input file element here -->
                        </div> 
                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="#" class="btn btn-danger" id="close_view_team" title="Click here to view all slides">Close</a>
                        </form>  
                </div>          
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modaltrust" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">List Of Trusties</h4>
            </div>
            <div class="modal-body">
            <table class="table table-hover m-b-0 footable footable-1 footable-paging footable-paging-center breakpoint-lg" style="">
                            <thead>
                                <tr class="footable-header">
                                    <th class="footable-sortable footable-first-visible" style="display: table-cell;">Image<span class="fooicon fooicon-sort"></span></th>
                                    <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">Action<span class="fooicon fooicon-sort"></span></th>
                                </tr>
                            </thead>
                            <tbody id="load_trust_list"></tbody>
                        <tfoot>
                        </tfoot>
                    </table>            
            </div>
        </div>
    </div>
</div>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/plugins/dropzone/dropzone.js"></script> <!-- Dropzone Plugin Js --> 

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script>
    var currentUrl = window.location.href;
    Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#frmFileUpload", {
            url: currentUrl, // Specify the URL for uploading files
            maxFiles: 1, // Maximum number of files allowed to be uploaded
            maxFilesize: 5, // Maximum file size in MB
            acceptedFiles: 'image/*', // Limit accepted file types to images only
            addRemoveLinks: true, // Show remove button for uploaded files
            dictDefaultMessage: 'Drop an image here or click to upload.', // Default message
            dictRemoveFile: 'Remove', // Text for remove file button
            dictCancelUpload: 'Cancel', // Text for cancel upload button
            dictInvalidFileType: 'Invalid file type.', // Error message for invalid file type
            dictFileTooBig: 'File is too big ({{filesize}} MB). Max file size: {{maxFilesize}} MB.', // Error message for file too big
            init: function() {
                // Customize initialization if needed
                this.on("addedfile", function(file) {
                    // Handle file added event
                    console.log("File added:", file);
                    // Remove previous error messages if any
                    $('.error-message').remove();
                });
            }
        });
    // Drop team upload
        var myDropzone_team = new Dropzone("#frmFileUpload_team", {
            url: currentUrl, // Specify the URL for uploading files
            maxFiles: 1, // Maximum number of files allowed to be uploaded
            maxFilesize: 5, // Maximum file size in MB
            acceptedFiles: 'image/*', // Limit accepted file types to images only
            addRemoveLinks: true, // Show remove button for uploaded files
            dictDefaultMessage: 'Drop an image here or click to upload.', // Default message
            dictRemoveFile: 'Remove', // Text for remove file button
            dictCancelUpload: 'Cancel', // Text for cancel upload button
            dictInvalidFileType: 'Invalid file type.', // Error message for invalid file type
            dictFileTooBig: 'File is too big ({{filesize}} MB). Max file size: {{maxFilesize}} MB.', // Error message for file too big
            init: function() {
                // Customize initialization if needed
                this.on("addedfile", function(file) {
                    // Handle file added event
                    console.log("File added:", file);
                    // Remove previous error messages if any
                    $('.error-message').remove();
                });
            }
        });
        var myDropzone_edit_team = new Dropzone("#frmFileUpload_edit_team", {
            url: currentUrl, // Specify the URL for uploading files
            maxFiles: 1, // Maximum number of files allowed to be uploaded
            maxFilesize: 5, // Maximum file size in MB
            acceptedFiles: 'image/*', // Limit accepted file types to images only
            addRemoveLinks: true, // Show remove button for uploaded files
            dictDefaultMessage: 'Drop an image here or click to upload.', // Default message
            dictRemoveFile: 'Remove', // Text for remove file button
            dictCancelUpload: 'Cancel', // Text for cancel upload button
            dictInvalidFileType: 'Invalid file type.', // Error message for invalid file type
            dictFileTooBig: 'File is too big ({{filesize}} MB). Max file size: {{maxFilesize}} MB.', // Error message for file too big
            init: function() {
                // Customize initialization if needed
                this.on("addedfile", function(file) {
                    // Handle file added event
                    console.log("File added:", file);
                    // Remove previous error messages if any
                    $('.error-message').remove();
                });
            }
        });
        var myDropzone_trust = new Dropzone("#FileUpload_trusties", {
            url: currentUrl, // Specify the URL for uploading files
            maxFiles: 1, // Maximum number of files allowed to be uploaded
            maxFilesize: 5, // Maximum file size in MB
            acceptedFiles: 'image/*', // Limit accepted file types to images only
            addRemoveLinks: true, // Show remove button for uploaded files
            dictDefaultMessage: 'Drop an image here or click to upload.', // Default message
            dictRemoveFile: 'Remove', // Text for remove file button
            dictCancelUpload: 'Cancel', // Text for cancel upload button
            dictInvalidFileType: 'Invalid file type.', // Error message for invalid file type
            dictFileTooBig: 'File is too big ({{filesize}} MB). Max file size: {{maxFilesize}} MB.', // Error message for file too big
            init: function() {
                // Customize initialization if needed
                this.on("addedfile", function(file) {
                    // Handle file added event
                    console.log("File added:", file);
                    // Remove previous error messages if any
                    $('.error-message').remove();
                });
            }
        });
    $(document).ready(function () {
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
        
            function load_slide_list(){
                $.ajax({
                    type: "POST",
                    url: "includes/load_slide_list.php",
                    success: function (result) {
                        $("#load_slide_list").html(result);
                    }
                });
                }
                function load_trust_list(){
                $.ajax({
                    type: "POST",
                    url: "includes/load_trust_list.php",
                    success: function (result) {
                        $("#load_trust_list").html(result);
                    }
                });
                }
                $("#view_trusties").on('click', function (e) {
                e.preventDefault();
                load_trust_list();
                $("#modaltrust").modal('show');
                });
                
                function load_team_list(){
                $.ajax({
                    type: "POST",
                    url: "includes/load_team_list.php",
                    success: function (result) {
                        $("#load_team_list").html(result);
                    }
                });
                }
            $("#view_slides").on('click', function (e) {
                e.preventDefault();
                load_slide_list();
                $("#largeModal").modal('show');
            });
            $("#view_team").on('click', function(e){
                e.preventDefault();
                load_team_list();
                $("#modalteam").modal('show');
            });
            $(document).on('submit', '#form_Slide', function (e) {
                e.preventDefault();

                // Create a FormData object to handle file uploads
                var formDataWithFiles = new FormData();

                // Append the first (and only) file added to Dropzone to FormData
                var files = myDropzone.getAcceptedFiles();
                if (files.length > 0) {
                    formDataWithFiles.append('file', files[0]);
                }

                // Append other form data to FormData
                formDataWithFiles.append('slid_title', $('#slid_title').val());
                formDataWithFiles.append('sub_title', $('#sub_title').val());

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "includes/post_slide_show.php",
                    data: formDataWithFiles,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.error != '') {
                            alert(response.error);
                        } else {
                            alert(response.msg);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
                        // delete slide
            $(document).on('click', '.btn_delete_slide', function (e) {
                e.preventDefault();
                var slideid = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "includes/delete_slide.php",
                    data: {
                        'slideid': slideid
                    },
                    success: function (result) {
                        load_slide_list();
                    }
                });
            });

                  // delete team
                $(document).on('click', '.btn_delete_team', function (e) {
                e.preventDefault();
                var teamid = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "includes/delete_team.php",
                    data: {
                        'teamid': teamid
                    },
                    success: function (result) {
                        load_team_list();
                    }
                });
            });
            $(document).on('click', '.btn_delete_trust', function (e) {
                e.preventDefault();
                var trustid = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "includes/delete_trust.php",
                    data: {
                        'trustid': trustid
                    },
                    success: function (result) {
                        load_trust_list();
                    }
                });
            });
            

            // fetch page info
            load_page_info();
            function load_page_info() {
                $.ajax({
                    type: "POST",
                    url: "includes/load_page_info.php",
                    dataType: 'json', // Specify JSON as the expected data type
                    success: function (data) {
                        // Set the content of the textarea with id 'about_text'
                        $('#about_text').val(data.aboutus);
                        // Set the content of the element with id 'about_id'
                        $("#about_id").val(data.pageid);
                        $("#mission_id").val(data.pageid);
                        $("#mission_text").val(data.ourmission);
                        $("#vission_id").val(data.pageid);
                        $("#vission_text").val(data.ourvission);
                        $("#phonenumber").val(data.phonenumber);
                        $("#emailaddress").val(data.pageemail);
                        $("#officeaddress").val(data.pageaddress);
                        $("#mediafacebook").val(data.mediafacebook);
                        $("#mediatwiter").val(data.mediatwiter);
                        $("#mediaig").val(data.mediaig);
                    },
                    error: function(xhr, status, error) {
                        // Handle error if the AJAX request fails
                        console.error(error);
                    }
                });
            }

            $("#update_about").on('click', function(event) {
                event.preventDefault();
                if ($('#about_text').val() == '') {
                    alert('Please enter insert text');
                }
                else {
                // Append other form data to FormData
                var about_id = $('#about_id').val();
                var about_text = $('#about_text').val();

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "includes/update_about.php",
                    data: {about_id: about_id, about_text: about_text},
                    dataType: 'Json',
                    success: function (response) {
                        // Handle success
                        if (response.error != '') {
                            alert(response.error);
                        } else {
                        alert(response.msg);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
                }
            });
            $("#update_mission").on('click', function(event) {
                event.preventDefault();
                if ($('#mission_text').val() == '') {
                    alert('Please enter insert text');
                }
                else {
                // Append other form data to FormData
                var mission_id = $('#mission_id').val();
                var mission_text = $('#mission_text').val();

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "includes/update_mission.php",
                    data: {mission_id: mission_id, mission_text: mission_text},
                    dataType: 'Json',
                    success: function (response) {
                        // Handle success
                        if (response.error != '') {
                            alert(response.error);
                        } else {
                        alert(response.msg);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
                }
            });

            $("#update_vission").on('click', function(event) {
                event.preventDefault();
                if ($('#vission_text').val() == '') {
                    alert('Please enter insert text');
                }
                else {
                // Append other form data to FormData
                var vission_id = $('#vission_id').val();
                var vission_text = $('#vission_text').val();

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "includes/update_vission.php",
                    data: {vission_id: vission_id, vission_text: vission_text},
                    dataType: 'Json',
                    success: function (response) {
                        // Handle success
                        if (response.error != '') {
                            alert(response.error);
                        } else {
                        alert(response.msg);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
                }
            });
            $("#update_all").on('click', function(event) {
                event.preventDefault();
                if ($('#phonenumber').val() == '' || $('#emailaddress').val() =="" || $('#officeaddress').val() == ""){
                    alert('Please enter insert text');
                }
                else {
                // Append other form data to FormData
                var paged_id = $('#vission_id').val();
                var phonenumber = $('#phonenumber').val();
                var emailaddress = $('#emailaddress').val();
                var officeaddress = $('#officeaddress').val();
                var mediafacebook = $('#mediafacebook').val();
                var mediatwiter = $('#mediatwiter').val();
                var mediaig = $('#mediaig').val();

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "includes/update_contact.php",
                    data: {
                        paged_id: paged_id,
                        phonenumber: phonenumber,
                        emailaddress: emailaddress,
                        officeaddress: officeaddress,
                        mediafacebook: mediafacebook,
                        mediatwiter: mediatwiter,
                        mediaig: mediaig
                    },
                    dataType: 'Json',
                    success: function (response) {
                        // Handle success
                        if (response.error != '') {
                            alert(response.error);
                        } else {
                        alert(response.msg);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
                }
            });

            $(document).on('submit', '#form_add_team', function (e) {
                e.preventDefault();

                // Get form field values
                var teamName = $('#team_name').val().trim();
                var teamPosition = $('#team_position').val().trim();
                var teamFbHandle = $('#team_fb_handle').val().trim();
                var teamTlHandle = $('#team_tl_handle').val().trim();
                var teamInHandle = $('#team_in_handle').val().trim();

                // Validate form fields
                if (!teamName || !teamPosition || !teamFbHandle || !teamTlHandle || !teamInHandle) {
                    alert('All fields are required. Please fill out all the fields.');
                    return;
                }
                // Create a FormData object to handle form data
                var formData = new FormData();
                                              // Append the first (and only) file added to Dropzone to FormData
                var files = myDropzone_team.getAcceptedFiles();
                if (files.length > 0) {
                    formData.append('file', files[0]);
                }

                formData.append('team_name', teamName);
                formData.append('team_position', teamPosition);
                formData.append('team_fb_handle', teamFbHandle);
                formData.append('team_tl_handle', teamTlHandle);
                formData.append('team_in_handle', teamInHandle);

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "includes/post_team_members.php",
                    data: formData,
                    dataType: 'json', // JSON should be in lowercase
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Handle success
                        if (response.error) {
                            alert(response.error);
                        } else {
                            alert(response.msg);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error('Error:', xhr.responseText);
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            $(document).on('submit', '#form_trusties', function (e) {
                e.preventDefault();

                // Create a FormData object to handle file uploads
                var formDataWithFiles = new FormData();

                // Append the first (and only) file added to Dropzone to FormData
                var files = myDropzone_trust.getAcceptedFiles();
                if (files.length > 0) {
                    formDataWithFiles.append('file', files[0]);
                }
                
                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "includes/post_trusties_members.php",
                    data: formDataWithFiles,
                    dataType: 'Json',
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Handle success
                        if (response.error != '') {
                            alert(response.error);
                        } else {
                        alert(response.msg);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });

            // Edit team members
            $(document).on('click', '.btn_edit_team', function(e) {
                e.preventDefault();
                var teamid = $(this).attr('id');
                $.ajax({
                    url: 'includes/fetch_team_members.php',
                    method: 'POST',
                    data: {teamid: teamid},
                    dataType: 'json',
                    success: function(response) {
                        $('#team_id').val(teamid);
                        $('#edit_team_name').val(response.team_name);
                        $('#edit_team_position').val(response.team_position);
                        $('#edit_team_fb_handle').val(response.team_fb_handle);
                        $('#edit_team_tl_handle').val(response.team_tl_handle);
                        $('#edit_team_in_handle').val(response.team_in_handle);
                        $('#edit_team_div').removeClass('d-none');
                        $('#view_team_div').addClass('d-none');
                    }
                })

            });

            $('#close_view_team').on('click', function(e) {
                e.preventDefault();
                $('#edit_team_div').addClass('d-none');
                $('#view_team_div').removeClass('d-none');
            })
            // edit team form
            $(document).on('submit', '#form_edit_team', function (e) {
                e.preventDefault();

                // Get form field values
                var teamid = $('#team_id').val();
                var teamName = $('#edit_team_name').val().trim();
                var teamPosition = $('#edit_team_position').val().trim();
                var teamFbHandle = $('#edit_team_fb_handle').val().trim();
                var teamTlHandle = $('#edit_team_tl_handle').val().trim();
                var teamInHandle = $('#edit_team_in_handle').val().trim();

                // Validate form fields
                if (!teamName || !teamPosition || !teamFbHandle || !teamTlHandle || !teamInHandle) {
                    alert('All fields are required. Please fill out all the fields.');
                    return;
                }
                // Create a FormData object to handle form data
                var formData = new FormData();
                                              // Append the first (and only) file added to Dropzone to FormData
                var files = myDropzone_edit_team.getAcceptedFiles();
                if (files.length > 0) {
                    formData.append('file', files[0]);
                }
                formData.append('teamid', teamid);
                formData.append('team_name', teamName);
                formData.append('team_position', teamPosition);
                formData.append('team_fb_handle', teamFbHandle);
                formData.append('team_tl_handle', teamTlHandle);
                formData.append('team_in_handle', teamInHandle);

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "includes/edit_team_members.php",
                    data: formData,
                    dataType: 'json', // JSON should be in lowercase
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        // Handle success
                        if (response.error) {
                            alert(response.error);
                        } else {
                            alert(response.msg);
                            $('#edit_team_div').addClass('d-none');
                            $('#view_team_div').removeClass('d-none');
                            load_team_list();
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error('Error:', xhr.responseText);
                        alert('An error occurred. Please try again.');
                    }
                });
            });
    });
</script>

</body>

<!-- Mirrored from www.wrraptheme.com/templates/compass/html/blog-post.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2024 10:27:46 GMT -->
</html>