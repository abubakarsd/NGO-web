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
                    <li><a href="climate-change.php">Climate Change</a> </li>
                    <li><a href="youth-empowerment.php">Youth Empowerment</a> </li>
                    <li><a href="quality_education.php">Quality Education</a> </li>
                    <li><a href="health.php">Health & Personal Hygiene</a> </li>
                </ul>
            </li>
            <li> <a href="programs-list.php"><i class="zmdi zmdi-blogger"></i><span>Programs</span> </a> </li>
            <li> <a href="blog-post.php"><i class="zmdi zmdi-picture-in-picture"></i><span>Post New Blog</span> </a> </li>
            <li class="active open"><a href="blog-list.php"><i class="zmdi zmdi-sort-amount-desc"></i><span>Blog List</span> </a> </li>
            <li><a href="general-settings.php"><i class="zmdi zmdi-settings-square"></i><span>General Settings</span> </a> </li>                
        </ul>
    </div>
    <!-- #Menu --> 
</aside>
<!-- Chat-launcher -->
<div class="chat-launcher"></div>
<div class="chat-wrapper">
    <div class="card">
        <div class="header">
            <ul class="list-unstyled team-info margin-0">
                <li class="m-r-15"><h2>Design Team</h2></li>
                <li>
                    <img src="assets/images/xs/avatar2.jpg" alt="Avatar">
                </li>
                <li>
                    <img src="assets/images/xs/avatar3.jpg" alt="Avatar">
                </li>
                <li>
                    <img src="assets/images/xs/avatar4.jpg" alt="Avatar">
                </li>
                <li>
                    <img src="assets/images/xs/avatar6.jpg" alt="Avatar">
                </li>
                <li>
                    <a href="javascript:void(0);" title="Add Member"><i class="zmdi zmdi-plus-circle"></i></a>
                </li>
            </ul>                       
        </div>
        <div class="body">
            <div class="chat-widget">
            <ul class="chat-scroll-list clearfix">
                <li class="left float-left">
                    <img src="assets/images/xs/avatar3.jpg" class="rounded-circle" alt="">
                    <div class="chat-info">
                        <a class="name" href="#">Alexander</a>
                        <span class="datetime">6:12</span>                            
                        <span class="message">Hello, John </span>
                    </div>
                </li>
                <li class="right">
                    <div class="chat-info"><span class="datetime">6:15</span> <span class="message">Hi, Alexander<br> How are you!</span> </div>
                </li>
                <li class="right">
                    <div class="chat-info"><span class="datetime">6:16</span> <span class="message">There are many variations of passages of Lorem Ipsum available</span> </div>
                </li>
                <li class="left float-left"> <img src="assets/images/xs/avatar2.jpg" class="rounded-circle" alt="">
                    <div class="chat-info"> <a class="name" href="#">Elizabeth</a> <span class="datetime">6:25</span> <span class="message">Hi, Alexander,<br> John <br> What are you doing?</span> </div>
                </li>
                <li class="left float-left"> <img src="assets/images/xs/avatar1.jpg" class="rounded-circle" alt="">
                    <div class="chat-info"> <a class="name" href="#">Michael</a> <span class="datetime">6:28</span> <span class="message">I would love to join the team.</span> </div>
                </li>
                    <li class="right">
                    <div class="chat-info"><span class="datetime">7:02</span> <span class="message">Hello, <br>Michael</span> </div>
                </li>
            </ul>
            </div>
            <div class="input-group p-t-15">
                <input type="text" class="form-control" placeholder="Enter text here...">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-mail-send"></i>
                </span>
            </div>
        </div>
    </div>
</div>

<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <h2>Blog Detail
                    <small>Welcome to Compass</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                    <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                    <li class="breadcrumb-item active">Blog Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card single_post">
                    <div class="body">
                        <h3 class="m-t-0 m-b-5" id="blog_title"></h3>
                        <ul class="meta">
                            <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: <span id="poster_name"></span></a></li>
                            <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: <span class="total_comments"></span></a></li>
                        </ul>
                    </div>                    
                    <div class="body">
                        <div class="img-post m-b-15">
                            <img src="" id="blog_img" alt="Awesome Image">
                        </div>
                        <p id="post_details"></p>
                        <a href="#" title="read more" class="btn btn-round btn-info btn-edit" id="">Edit</a>
                        <a href="#" title="read more" class="btn btn-round btn-danger btn-delete" id="">Delete Post</a>                       
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Comments</strong> (<span class="total_comments"></span>)</h2>
                    </div>
                    <div class="body" id="list_blog_comment">                                    
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Leave</strong> a reply</h2>
                    </div>
                    <div class="body">
                        <div class="comment-form">
                            <form class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control poster_name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn btn-primary btn-round">SUBMIT</button>
                                </div>                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 right-box">
                <div class="card">
                    <div class="body search">
                        <div class="input-group m-b-0">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Popular</strong> Posts</h2>                        
                    </div>
                    <div class="body widget popular-post">
                    <ul class="list-unstyled m-b-0" id="list_blog">
                    </ul>
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
                <h4 class="title" id="largeModalLabel">Edit Blog</h4>
            </div>
            <div class="modal-body">
            <form action="#" id="edit_blog_form" enctype="multipart/form-data">
                <input type="hidden" id="txt_blog_id" name="txt_blog_id">
                <div class="form-group">
                    <input type="text" class="form-control" id="txt_blog_title" name="blog_title" placeholder="Enter Title">
                </div>
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <textarea id="myTextarea" name="txt_description" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="frmFileUpload" class="dropzone m-b-20 m-t-20 dz-clickable">
                    <div class="dz-message">
                        <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                        <h3>Drop an image here or click to upload.</h3>
                        <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                    </div>
                    <!-- No need for the input file element here -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default btn-round waves-effect">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
                        
            </div>
        </div>
    </div>
</div>
<!-- Jquery Core Js --> 
<script src="https://cdn.tiny.cloud/1/uqjr96ttph2jje5ulmyo6h4sxynphrx0yvf8a1ps4nqg4u8z/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
    $(document).ready(function(){
        // Function to extract ID from URL query parameters
        function getUrlParameter(name) {
                name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
                var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
                var results = regex.exec(location.search);
                return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
            }

            // Get the ID from the URL
            var blogpostid = getUrlParameter('id');

            // Make AJAX request with the extracted ID
            if (blogpostid) {
                // Make AJAX request to fetch program details
                fetch_blog_details(blogpostid);

                // Load comments
                load_comments(blogpostid);
            } else {
                console.error('ID not found in the URL.');
            }
            
            tinymce.init({
                selector: '#myTextarea',
                plugins: 'advlist autolink lists link image charmap print preview anchor',
                toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | image link',
                height: 400,
                content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i'
                ]
            });
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

        function fetch_blog_details(id) {
                // Make AJAX request using the ID
                $.ajax({
                    url: "includes/fetch_blog_details.php",
                    method: "GET",
                    dataType: 'json', // Change dataType to 'json'
                    data: { blogid: id }, // Pass the ID as data
                    success: function(response) {
                        $("#blog_title").html(response.blogheader);
                        $("#blog_img").attr("src", "../images/" + response.blogimg);
                        $("#poster_name").html(response.postername);
                        $(".poster_name").val(response.postername);
                        $(".total_comments").html(response.totalcomments);
                        $("#post_details").html(response.blogdetails);
                        $(".btn-delete").attr('id', response.blogid);
                        $(".btn-edit").attr('id', response.blogid);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        alert('Error fetching donation summary.');
                    }
                });
            }
        // delete post
        $(document).on('click', '.btn-delete', function(e){
            e.preventDefault();
            var postid = $(this).attr('id');
                 // Display confirmation dialog
                 var confirmation = confirm("Are you sure you want to delete this data?");
                
                // Check user's choice
                if (confirmation) {
                    // If user clicks OK, proceed with deletion
                    $.ajax({
                        type: "POST",
                        url: "includes/delete_blog_post.php",
                        data: {postid: postid},
                        success: function (result) {
                            // Reload donation list after successful deletion
                            load_blog_posts();
                            // Close the modal
                        }
                    });
                } else {
                    // If user clicks Cancel, do nothing
                    // Optionally, you can provide feedback to the user here
                }
        });

        // edit button
        $(document).on('click', '.btn-edit', function(e) {
            e.preventDefault();
            var postid = $(this).attr('id');
            $.ajax({
                        type: "POST",
                        url: "includes/view_blog_post.php",
                        dataType: 'json',
                        data: {postid: postid},
                        success: function (result) {
                            $("#txt_blog_id").val(postid);
                            $("#txt_blog_title").val(result.blogheader);
                            // Set content inside the rich text editor using TinyMCE API
                            tinymce.get('myTextarea').setContent(result.blogdetails);
                            // Display the image in the dropzone div
                            var imageUrl = result.imageUrl;
                            if (imageUrl) {
                                // Create an img element
                                var imgElement = $('<img>').attr('src', imageUrl).addClass('uploaded-image');
                                // Remove any previously uploaded images
                                $("#frmFileUpload .uploaded-image").remove();
                                // Append the new image element to the dropzone div
                                $("#frmFileUpload").append(imgElement);
                            }
                            
                            $("#largeModal").modal("show");
                        }
                    });
        });

           // Handle form submission
           $(document).on('submit', '#edit_blog_form', function (e) {
                e.preventDefault();

                // Get the content of the rich text editor
                var description = tinymce.get('myTextarea').getContent();

                // Create a FormData object to handle file uploads
                var formDataWithFiles = new FormData();

                // Append the first (and only) file added to Dropzone to FormData
                var files = myDropzone.getAcceptedFiles();
                if (files.length > 0) {
                    formDataWithFiles.append('file', files[0]);
                }

                // Append other form data to FormData
                formDataWithFiles.append('txt_blog_id', $('#txt_blog_id').val());
                formDataWithFiles.append('txt_blog_title', $('#txt_blog_title').val());
                formDataWithFiles.append('txt_description', description);

                // Send the AJAX request
                $.ajax({
                    type: "POST",
                    url: "includes/update_blog_post.php",
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
                        $("#largeModal").modal('hide');
                        fetch_blog_details(blogpostid);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });

        // list_blog_comment
        function load_comments(id) {
                $.ajax({
                    url: "includes/fetch_blog_comments.php",
                    method: "GET",
                    dataType: 'html',
                    data: {blogID: id},
                    success: function(data) {
                        $("#list_blog_comment").html(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        // Handle the error, e.g., display an error message
                        $("#list_blog_comment").html("<p>Error loading comments.</p>");
                    }
                });
            }
        // function to fetch blog
         load_most_posts();
                function load_most_posts() {
                    $.ajax({
                        url: "includes/most_post.php",
                        method: 'POST',
                        success: function(data) {
                            $('#list_blog').html(data);
                        }
                    });
                }
    });
</script>
</body>
<!-- Mirrored from www.wrraptheme.com/templates/compass/html/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2024 10:28:01 GMT -->
</html>