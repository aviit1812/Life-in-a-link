<?php
session_start();
?>
<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>Dcode – Saas & Standard Software Landing Page Website Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="App and Saas Landing Template" />
        <meta name="keywords" content="Application, Clean, Saas, Dashboard, Bootstrap4, Software Landing, HTML5 Template" />
        <meta content="sacredthemes" name="author" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- WOW Animation -->
        <link href="css/animate.css" rel="stylesheet" type="text/css"  />
        <!-- Bootstrap css -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Slick Slider -->
        <link href="css/slick.css" rel="stylesheet" type="text/css"  />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/line-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/fontawesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Main css File -->
        <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-default" />
        <link href="css/rtl-style.css" rel="stylesheet" type="text/css" id="rtl-theme-default" disabled="disabled" />
        <link href="css/colors/default-color.css" rel="stylesheet" type="text/css" id="theme-color" />
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
  		function do_login(){
			var email=$("#email").val();
			var pass=$("#pass").val();
			
			if(email!="" && pass!="")
			{
				  $.ajax
				  ({
				  type:'post',
				  url:'loginajax.php',
				  data:{
				   do_login:"do_login",
				   email:email,
				   pass:pass
				  },
				  success:function(response) {
					  if(response=="success")
					  {
						window.location.href="index.php";
					  }
					  else
					  {
						$("#error").html("<div class='alert alert-danger'> <strong>Login Credential did not Match</strong> </div>");
					  }
				  }
				  });
			}
			else{
				$("#error").html("<div class='alert alert-danger'> <strong>Both Field Required</strong> </div>");
			}
			return false;
		}
		</script>
    </head>
    <body>
        <!-- box-wrapper --> 
        <div class="box-wrapper">
            <!-- Loader -->
            <div id="preloader">
                <div id="status">
                    <div class="d-loader">
                        <img src="images/dcode-loader.gif" alt="DCode">
                    </div>
                </div>
            </div>
            <!-- Loader -->
            <!-- Main Wrapper -->
            <div id="main-wrapper" class="page-wrapper">
                <div class="dc-signin theme-one">
                    <div class="signin-wrapper">
                        <div class="box-header style-dark">
                            <img src="images/d-code-logo-light.svg" class="logo-dark" alt="DCode">
                            <h1><span>Welcome Back,</span> Log In!</h1>
                        </div>
                        <div class="box-body">
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email/Username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group" style="float:right;">
                                    <a href="#" class="btn link-btn forgot-link">Forgot Password?</a>
                                </div>
								<div class="form-group text-center" id="error">
                                  
                                </div>
                                <div class="form-group"> 
									<input type="submit" name="login" id="login" class="btn btn-primary btn-full" onclick="return do_login();" value="Sign In">
                                </div>
                                <div class="or"><span>or</span></div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-full email-btn">Continue with Gmail</button>
                                </div>
                              
                                <div class="form-group text-center">
                                    <a href="register.php" class="btn link-btn signup-link">Not on DCode yet? Sign up</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Page Header -->
            </div>
            <!-- Main Wrapper -->
            
        </div>
        <!-- box-wrapper -->
        <!-- javascript -->
        
        <script src="js/jquery-migrate.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <script src="js/appear.js"></script>
        <!-- WOW Animation -->
        <script src="js/wow.min.js"></script>
        <!-- Slick Slider -->
        <script src="js/slick.min.js"></script>
        <!-- Main Js -->
        <script src="js/dcode.js"></script>
		
    </body>
</html>
<?php 

?>