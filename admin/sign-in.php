<?php
// Start session
session_start();

// Check if session variable is not set or is empty
if (isset($_SESSION['adm_id']) || !empty($_SESSION['adm_id'])) {
    // Redirect user to the login page
    header("Location: index.php");
    exit(); // Make sure to exit after redirecting
}
?>
<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from www.wrraptheme.com/templates/compass/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2024 14:15:56 GMT -->
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>TLWDFoundation Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/authentication.css">
    <link rel="stylesheet" href="assets/css/color_skins.css">
</head>

<body class="theme-cyan authentication sidebar-collapse">
<div class="page-header">
    <div class="page-header-image" style="background-image:url(assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="post" id="form_login">
                    <div class="header">
                        <div class="logo-container">
                            <img src="assets/images/favicon.png" alt="">
                        </div>
                        <h5>Admin Login</h5>
                    </div>
                    <div class="content">                                                
                        <div class="input-group input-lg">
                            <input type="text" class="form-control" id="txt_username" placeholder="Enter Username">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input type="password" placeholder="Password" id="txt_password" class="form-control" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light" id="btn_login">SIGN IN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Designed by <a href="#" target="_blank">Tech Approach</a></span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script>
    $(document).ready(function() {
        $(document).on('submit', '#form_login', function(e) {
            e.preventDefault();
            var username = $("#txt_username").val();
            var password = $("#txt_password").val();
            if (username == "" || password == "") {
                alert("Please enter username and password");
                return false;
            } else {
            $.ajax({
                url: 'includes/login.php',
                method: 'POST',
                dataType: 'json',
                data: {username: username, password: password},
                beforeSend: function(){
                    $("#btn_login").html("Please wait...");
                },
                success: function(data) {
                    if (data.error != '') {
                        alert(data.error);
                        console.log(data.error);
                    }else {
                        console.log(data.success);
                        window.location.href = "index.php";
                    }
                }
            });
        }
        });
        });
</script>
</body>

<!-- Mirrored from www.wrraptheme.com/templates/compass/html/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 May 2024 14:15:58 GMT -->
</html>