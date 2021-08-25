<?php 
session_start();
include 'connection.php';
if(isset($_SESSION["user_id"])){
    $user = $link->rawQueryOne("select * from user where user_id = ?",array($_SESSION["user_id"]));
}
else{
    header("location:login.php");
}

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
		<style>
		.my_addbtn{
			border-radius: 50%;
    padding: 6px;
    background-color: #323ac8;
    color: white;
    border: 1px solid #323ac8;
		}
		</style>
		<style>
		.profile-pic {
		  color: transparent;
		  transition: all 0.3s ease;
		  display: flex;
		  justify-content: center;
		  align-items: center;
		  position: relative;
		  transition: all 0.3s ease;
		}

  .profile-pic input {
    display: none;
  }

  .profile-pic img {
	  
    position: absolute;
    object-fit: cover;
    width: 200px;
    height: 200px;
    box-shadow: 0 0 10px 0 rgba(255, 255, 255, 0.35);
    border-radius: 100px;
    z-index: 0;
  }

  .profile-pic .label {
	
    cursor: pointer;
    height: 200px;
    width: 200px;
	padding-top: 25px;
  }

  .profile-pic:hover .label {
     
      display: flex;
	  justify-content: center;
	  align-items: center;
      background-color: rgba(0, 0, 0, 0.8);
      z-index: 10000;
      color: rgb(250, 250, 250);
      transition: background-color 0.2s ease-in-out;
      border-radius: 100px;
      margin-bottom: 0;
    padding-top: 0px;
  }

  .profile-pic span {
    display: inline-flex;
    padding: 0.2em;
    height: 2em;
  }
		</style>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		
		<script type="text/javascript">
			 $(document).ready(function(){  
				$.ajax({
						url:"fetch_category.php",
						method:"POST",  
						success:function(fs)
						{
							$("#profile").html(fs);
						}
				});
			 });
		</script>
		<script>
		function copylink(catname) {
				// alert(x);
				
			  /* Get the text field */
			  var uname = "Avi" ;
			  var copyText = "https://lifeinlink.com"+ uname + "/" + catname;

			  /* Select the text field */
			  copyText.select();
			  copyText.setSelectionRange(0, 99999); /* For mobile devices */

			  /* Copy the text inside the text field */
			  document.execCommand("copy");

			  return false;
			}
			
	
		</script>
		<script src="js/myjs.js"></script>
    </head>
    <body>
	
		<div id="categoryModal" class="modal fade" role="dialog">  
				  <div class="modal-dialog">  
			   <!-- Modal content-->  
					   <div class="modal-content">  
							<div class="modal-header">  
							<h4 class="modal-title" style="float:left;">Category</h4>  
								 <button type="button" class="close" data-dismiss="modal">&times;</button>  
								 
							</div>  
							<div class="modal-body">  
							<form method="post" onsubmit="return addcategory()">
								 <input type="text" class="form-control" name="cname" id="cname" placeholder="Category Name" required />
								 <br />  
								 <button type="submit" name="add_button" id="add_button" class="btn btn-primary" >Add</button>  
							 </form>
							</div>  
					   </div>  
				  </div>  
		</div>  
		
		<div id="personalModal" class="modal fade" role="dialog">  
				  <div class="modal-dialog">  
			   <!-- Modal content-->  
					   <div class="modal-content">  
							<div class="modal-header">  
							<h4 class="modal-title" id="modaltitle" style="float:left;">Email</h4>  
							<button type="button" class="close" data-dismiss="modal">&times;</button>  
								 
							</div>  
							<div class="modal-body">  
							<form method="post">
								 <input type="text" class="form-control" name="personalinput" id="personalinput" required />
								 <br />  
								 <button type="submit" name="personal_button" id="personal_button" class="btn btn-primary" >Submit</button>  
							 </form>
							</div>  
					   </div>  
				  </div>  
		</div>  
				
		<div id="editLinkModal" class="modal fade" role="dialog">  
				  <div class="modal-dialog" id="editlink">  
			   <!-- Modal content-->  
					   
				  </div>  
		</div>  
		
		<div id="deleteLinkModal" class="modal fade" role="dialog">  
				  <div class="modal-dialog">  
			   <!-- Modal content-->  
					   <div class="modal-content">  
							<div class="modal-header">  
							<h5 class="modal-title" id="modaltitle" style="float:left;">Do you want to Delete?</h5>  
							<button type="button" class="close" data-dismiss="modal">&times;</button>  
								 
							</div>  
							<div class="modal-body">  
							<form method="post" onsubmit="return deletelink()">
								 <input type="hidden" id="deletelinkid" name="deletelinkid" />
								 <button type="submit" name="deletelink_button" id="deletelink_button" class="btn btn-primary" style="margin-top:0px;" >Yes</button>  
								 <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-top:0px;" >No</button>  
							 </form>
							</div>  
					   </div>  
				  </div>  
		</div>  
				
		<div id="linksModal" class="modal fade" role="dialog">  
				  <div class="modal-dialog">  
			   <!-- Modal content-->  
					   <div class="modal-content">  
							<div class="modal-header">  
							<h4 class="modal-title" style="float:left;">Links</h4>  
								 <button type="button" class="close" data-dismiss="modal">&times;</button>  
							</div>  
							<div class="modal-body">  
							<form method="post" onsubmit="return addlinks()">
								<div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="linkname1" id="linkname1" placeholder="Name of 1st Link" onfocus="return link_validation(1)">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <input type="text" class="form-control" name="link1" id="link1" placeholder="1st Link" onfocus="return link_validation(1)" />
                                    </div> 
                                </div>
								<div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="linkname2" id="linkname2" placeholder="Name of 2nd Link" onfocus="return link_validation(2)">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <input type="text" class="form-control" name="link2" id="link2" placeholder="2nd Link" onfocus="return link_validation(2)"/>
                                    </div> 
                                </div>
								<div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control" name="linkname3" id="linkname3" placeholder="Name of 3rd Link" onfocus="return link_validation(3)">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <input type="text" class="form-control" name="link3" id="link3" placeholder="3rd Link" onfocus="return link_validation(3)"/>
                                    </div> 
                                </div>
								 <button type="submit" name="link_button" id="link_button" class="btn btn-primary">Add</button>  
							 </form>
							</div>  
					   </div>  
				  </div>  
		</div>  		
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
            <!-- Nav Bar -->
            <?php include 'header.php'; ?>
            <!-- Nav Bar -->
            <!-- Main Wrapper -->
            <div id="main-wrapper" class="page-wrapper">
			<div class="inner-page-header section-padding style-dark">
                    <div class="container">
                        <div class="page-title-inner text-center clearfix">
                            <div class="heading-wrapper">
							<form id="imgform" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="method" value="profileupdate" />
								<div class="profile-pic">
								  <label class="label" for="imgupload">
									<i class="fas fa-camera"></i>
									<span style="font-family: 'Lato', sans-serif;">Change Image</span>
								  </label>
								  <input id="imgupload" name="imgupload" type="file" onchange="loadFile(this.form)"/>
								  <img src="<?php echo $user['user_image']; ?>" id="output" width="200" />
								</div>
							</form>
								
                               <!-- <img src="images/team-3-square.jpg" style="width:200px;height:200px;border-radius:100px;"/>  -->
                                <div class="lead-text">
                                    <p>Avi Patel</p>
                                </div>
                            </div><!-- End Heading -->
                           
                        </div><!-- Page Title Inner -->
                    </div>
                </div>
				<div class="container section-padding companies-section" style="min-height: 200px;margin-top:20px;">
                         <div class="row clearfix" style="border-bottom: 1px solid var(--light-gray);">
                            <div class=" col-lg-10 col-8 col-sm-8" style="padding: 18px 15px;">
								<h5> Personal Information </h5>
                            </div><!-- End Col -->
							
                        </div><!-- End Row -->
                       <div class="row clearfix">
							<div class="col-lg-12"> 
								<div class="companies-logo">
                                    <div class="item">
                                       <div class="logo-wrapper"> <a href="" onclick="return personal_modal('email')"> <img src="images/personal/email.png" alt="">   </a>  </div> 
                                    </div>
                                    <div class="item">
                                        <div class="logo-wrapper"><a href="" onclick="return personal_modal('phone')"><img src="images/personal/phone.jpg" alt="">  </a>    </div>   
                                    </div>
                                    <div class="item">
                                        <div class="logo-wrapper"><a href="" onclick="return personal_modal('facebook')"> <img src="images/personal/facebook.png" alt="">  </a>   </div>     
                                    </div>
                                    <div class="item">
                                       <div class="logo-wrapper"> <a href="" onclick="return personal_modal('instagram')"> <img src="images/personal/instgram.png" alt=""> </a>   </div> 
                                    </div>
                                    <div class="item">
                                      <div class="logo-wrapper"> <a href="" onclick="return personal_modal('youtube')">  <img src="images/personal/youtube.png" alt=""> </a>   </div>   
                                    </div>
									<div class="item">
                                       <div class="logo-wrapper"> <a href="" onclick="return personal_modal('twitter')"> <img src="images/personal/twitter.png" alt=""> </a>   </div>  
                                    </div>
                                </div>
							</div>
					   </div>
                 </div>
				<div class="container" style="margin-top:20px;">
					<div class="row" style="float:right;">
						<button class="btn btn-outline-primary" data-toggle="modal" data-target="#categoryModal"> Add Category </button>
					</div>
				</div>
				
                <div class="section-padding profile" id="profile">
				
                </div>
				
				
            </div>
			
			
            <!-- Main Wrapper -->
            <?php include 'footer.php'; ?>
            <!-- Main Footer -->
           
        </div>
        <!-- box-wrapper -->
        <div class="overlay overlay-search">
            <div class="close-search">
                <span class="lines"></span>
            </div>
            <div class="container">
                <form method="post">
                    <div class="form-group">
                        <input type="search" class="form-control" name="SearchInput" placeholder="Search…">
                        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!--search-form-->

        <!-- javascript -->
        
        <script src="js/jquery-migrate.min.js"></script>
        
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