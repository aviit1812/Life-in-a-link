<!DOCTYPE html>
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
		<style>
		.error{
			color: red;
    font-size: 12px;
    margin-bottom: 0px !important;
		}
		</style>
		
		<script src="js/jquery.min.js"></script>
		<script>
		var e1=0,e2=0,e3=0,e4=0,e5=0;
		function username_check(){
			var username=$("#username").val();
			if(username == ""){
				$("#username_error").html("<p class='error'>*Enter the Username</p>");
				e1=1;
			}
			else{
				 $.ajax
				  ({
				  type:'post',
				  url:'loginajax.php',
				  data:{
				   check_username:"check_username",
				   username:username
				  },
				  success:function(response) {
					  if(response=="exist")
					  {
						$("#username_error").html("<p class='error'>*Username Already Exits</p>");
						e1=1;
					  }
					  else
					  {
						$("#username_error").html("");
						e1=0;
					  }
				  }
				  });
				
			}
			return false;
		}
		
		function name_check(){
			var name=$("#uname").val();
			if(name == ""){
				$("#name_error").html("<p class='error'>*Enter the Full name</p>");
				e2=1;
			}
			else{
				$("#name_error").html("");
				e2=0;
			}
			return false;
		}
		
		function email_check(){
			var email=$("#email").val();
			if(email == ""){
				$("#email_error").html("<p class='error'>*Enter the Email</p>");
				e3=1;
			}
			else{
				 $.ajax
				  ({
				  type:'post',
				  url:'loginajax.php',
				  data:{
				   check_email:"check_email",
				   email:email
				  },
				  success:function(response) {
					  if(response=="exist")
					  {
						$("#email_error").html("<p class='error'>*Email Already Exits</p>");
						e3=1;
					  }
					  else
					  {
						$("#email_error").html("");
						e3=0;
					  }
				  }
				  });
				
			}
			return false;
		}
		
		function phone_check(){
			var phone=$("#phone").val();
			if(phone == ""){
				$("#phone_error").html("<p class='error'>*Enter the Phone No</p>");
				e4=1;
			}
			else if(phone.length != 10){
				$("#phone_error").html("<p class='error'>*Enter the Correct Phone No</p>");
				e4=1;
			}
			else{
				$("#phone_error").html("");
				e4=0;
			}
			return false;
		}
		
		function password_check(){
			var password=$("#password").val();
			if(password == ""){
				$("#password_error").html("<p class='error'>*Enter the Password</p>");
				e5=1;
			}
			else{
				$("#password_error").html("");
				e5=0;
			}
			return false;
		}
		
		function register(){
			if(e1==0 && e2==0 && e3==0 && e4==0 && e5==0){
				var username=$("#username").val();
				var name=$("#uname").val();
				var email=$("#email").val();
				var phone=$("#phone").val();
				var password=$("#password").val();
				$.ajax
				  ({
				  type:'post',
				  url:'loginajax.php',
				  data:{
				   register:"register",
				   username:username,
				   name:name,
				   email:email,
				   phone:phone,
				   password:password
				  },
				  success:function(response) {
					  if(response=="success")
					  {
						window.location.href="index.php";
					  }
					  else
					  {
						$("#error_msg").html("<div class='alert alert-danger'> <strong>Error in register, Try Again!</strong> </div>");
					  }
				  }
				  });
			}
			else{
				$("#error_msg").html("<div class='alert alert-danger'> <strong>Error is there in Form</strong> </div>");
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
                            <h1><span>Get Started,</span> Sign Up!</h1>
                        </div>
                        <div class="box-body">
                            <form>
								<div class="form-group">
                                    <input type="text" id="username" class="form-control" placeholder="Enter Username" onfocusout="username_check()">
									<span id="username_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="uname" class="form-control" placeholder="Enter Full Name" onfocusout="name_check()">
									<span id="name_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="email" id="email" class="form-control" placeholder="Enter Email Address" onfocusout="email_check()">
									<span id="email_error"></span>
							   </div>
								<div class="form-group">
                                    <input type="number" id="phone" class="form-control" placeholder="Enter Phone No" onfocusout="phone_check()">
									<span id="phone_error"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" id="password" class="form-control" placeholder="Enter Password" onfocusout="password_check()">
									<span id="password_error"></span>
                                </div>
                               <!-- <div class="form-group text-center">
                                    <label><input type="checkbox" required="required"> I accept the policy and terms</label>
                                </div> -->
								<div class="form-group text-center" id="error_msg">
                                  
                                </div>
                                <div class="form-group">
								
                                    <button class="btn btn-primary btn-full" onclick="return register()">Sign Up</button>
                                </div>
								
                                <div class="or"><span>or</span></div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-full email-btn">Continue with Google</button>
                                </div>
                                
                                <div class="form-group text-center">
                                    <a href="login.php" class="btn link-btn signup-link">already have account? Login</a>
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

<!-- Mirrored from dcode.sacredthemes.net/layouts/page-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 26 Jul 2021 11:21:32 GMT -->
</html>