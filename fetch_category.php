<?php 
session_start();
require_once "connection.php";
$x = $link->rawQuery("select * from category where user_id = ? and is_active = 1",array($_SESSION["user_id"]));
$output='';
if($x){
	foreach($x as $xa)
	{
		$output .= '<div class="container mycontainer" style="min-height: 200px;">
							<div class="row clearfix" style="border-bottom: 1px solid var(--light-gray);">
								<div class=" col-lg-10 col-8 col-sm-8" style="padding: 18px 15px;">
									<h5> '. $xa['category_name'] .' </h5>
								</div><!-- End Col -->
								<div class="col-lg-1 col-2 col-sm-2" style="text-align: center;">
								   <a href="" onClick="return copylink('. $xa['category_name'] .')"> <i class="fas fa-copy" style="line-height:3.78;"></i>  </a>
								</div>
								<div class="col-lg-1 col-2 col-sm-2" style="text-align: center;">
								   <button class="my_addbtn" id="addlink" onClick="return linksadd('.$xa['category_id'] .')" style="margin-top:15px;"> <i class="fa fa-plus"></i> </button>
								</div><!-- End Col -->
							</div><!-- End Row -->
							<div class="row clearfix">
								
								<div style="padding: 15px 14px;width: -webkit-fill-available;" >	
								'; 
								
		$a = $link->rawQuery("select * from links where category_id = ?",array($xa['category_id']));
		if($a){
				$output .= '<ul class="list-style-one" >';
			foreach($a as $ab){ 
				$output .= '<li>
								  <div class="container">
								  <div class="row">
								   <div class=" col-lg-10 col-8 col-sm-8" > <p style="color:#2a1fbc;margin-bottom:0px;font-weight:600;"> Name : '. $ab['links_name'] .' </p> <a href="'.$ab['links_url'] .'" target="blank" > '.$ab['links_url'] .'</a>  </div>
								   <div class="col-lg-1 col-2 col-sm-2" style="text-align: center;">   <a href="" onclick="return updatemodal('. $ab['links_id'] .')"> <i class="fa fa-edit"> </i> </a>  </div>
								   <div class="col-lg-1 col-2 col-sm-2" style="text-align: center;">   <a href="" onclick="return deletemodal('. $ab['links_id'] .')"> <i class="fa fa-trash"> </i> </a>  </div>
								   </div></div>
								
								  </li>';
			}
			$output .= '</ul>';
			
		}
		else{
			$output .= '<div class="row" style="justify-content: center;">
									<h6 style="font-weight:600;color:red;"> No Links </h6>
								</div>';
		}
		
		$output .= '</div>
						</div>
                    </div>'; 
	}
}
else{
	$output .= '<div class="row" style="width:100%;justify-content: center;">
								<h5 style="font-weight:600;color:red;"> No Category </h5>
							</div>
							';
}

echo $output;
?>