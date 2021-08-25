<?php 
session_start();
include 'connection.php';
if(isset($_POST['method']))
{
	if($_POST['method'] == "addcategory"){
		$cname = $_POST['cname'];
		$uid = $_SESSION["user_id"];
		
		$s = $link->rawQueryOne("select * from user where user_id = ?",array($uid));
		if($s['is_trial'] != 1)
		{	
			$rega = $link->insert("category",array("category_name"=>$cname,"user_id"=>$uid,"is_active"=>1));
			if($rega)
			{
				echo "success";
			}
			else
			{
				echo "fail";
			}
		}
		else{
			$qa = $link->rawQuery("select * from category where user_id = ?",array($uid));
			if($qa)
			{
				echo "Not Allowed";
			}
			else
			{
				$rega = $link->insert("category",array("category_name"=>$cname,"user_id"=>$uid,"is_active"=>1));
			if($rega)
			{
				echo "success";
			}
			else
			{
				echo "fail";
			}
			}
			
		}
		exit();
	}
	
	if($_POST['method'] == "addlink"){
		$catid = $_POST['catid'];
		$name1 = $_POST['name1'];
		$link1 = $_POST['link1'];
		$name2 = $_POST['name2'];
		$link2 = $_POST['link2'];
		$name3 = $_POST['name3'];
		$link3 = $_POST['link3'];
		
		if($name1 != "" && $link1 != ""){
			$reg = $link->insert("links",array("links_name"=>$name1,"links_url"=>$link1,"category_id"=>$catid,"is_active"=>1));
		}
		
		if($name2 != "" && $link2 != ""){
			$reg = $link->insert("links",array("links_name"=>$name2,"links_url"=>$link2,"category_id"=>$catid,"is_active"=>1));
		}
		
		if($name3 != "" && $link3 != ""){
			$reg = $link->insert("links",array("links_name"=>$name3,"links_url"=>$link3,"category_id"=>$catid,"is_active"=>1));
		}
		
		echo "success";
		exit();
	}
	
	if($_POST['method'] == "deletelink"){
		$linkid = $_POST['lid'];
		
		$link->where("links_id",$linkid);
		$sql2=$link->delete("links");
		if($sql2){
			echo "success";
		}
		else{
			echo "fail";
		}
	}
	
	if($_POST['method'] == "getdetail"){
		$uid = $_SESSION["user_id"];
		$processtype = $_POST['processtype'];
		
		if($processtype == "email"){
			$s = $link->rawQueryOne("select * from user where user_id = ?",array($uid));
			$output = $s['email']; 
		}
		else if($processtype == "phone"){
			$s = $link->rawQueryOne("select * from user where user_id = ?",array($uid));
			$output = $s['phone']; 
		}
		else if($processtype == "facebook"){
			$s = $link->rawQueryOne("select * from user where user_id = ?",array($uid));
			$output = $s['facebook_link']; 
		}
		else if($processtype == "instagram"){
			$s = $link->rawQueryOne("select * from user where user_id = ?",array($uid));
			$output = $s['instagram_link']; 
		}
		else if($processtype == "youtube"){
			$s = $link->rawQueryOne("select * from user where user_id = ?",array($uid));
			$output = $s['youtube_link']; 
		}
		else if($processtype == "twitter"){
			$s = $link->rawQueryOne("select * from user where user_id = ?",array($uid));
			$output = $s['twitter_link']; 
		}			
		
		echo $output;
	}
	
	if($_POST['method'] == "updatedetail"){
		
		$uid = $_SESSION["user_id"];
		$processtype = $_POST['ptype'];
		$pvalue = $_POST['personalinput'];
		
		if($processtype == "email"){
			$link->where("user_id",$uid);
			$sql2=$link->update("user",array("email"=>$pvalue));
		}
		else if($processtype == "phone"){
			$link->where("user_id",$uid);
			$sql2=$link->update("user",array("phone"=>$pvalue)); 
		}
		else if($processtype == "facebook"){
			$link->where("user_id",$uid);
			$sql2=$link->update("user",array("facebook_link"=>$pvalue));
		}
		else if($processtype == "instagram"){
			$link->where("user_id",$uid);
			$sql2=$link->update("user",array("instagram_link"=>$pvalue));
		}
		else if($processtype == "youtube"){
			$link->where("user_id",$uid);
			$sql2=$link->update("user",array("youtube_link"=>$pvalue));
		}
		else if($processtype == "twitter"){
			$link->where("user_id",$uid);
			$sql2=$link->update("user",array("twitter_link"=>$pvalue));
		}			
		
		if($sql2){
			echo "success";
		}
		else{
			echo "fail";
		}
		
	}
	
	
	if($_POST['method'] == "getlinkById"){
		$lid = $_POST['lid'];
		$s = $link->rawQueryOne("select * from links where links_id = ?",array($lid));
		
		$output = "";
		
		$output .= ' <div class="modal-content">  
							<div class="modal-header">  
							<h4 class="modal-title" id="modaltitle" style="float:left;">Update Link</h4>  
							<button type="button" class="close" data-dismiss="modal">&times;</button>  
								 
							</div>  
							<div class="modal-body">  
							<form method="post" onsubmit="return updatelink()">
									<input type="hidden" id="linkid" name="linkid" value="'. $s['links_id'] .'" />
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="editlink_name" id="editlink_name" placeholder="Name of the Link" value="'. $s['links_name'] .'" required >
                                    </div>
                                    <div class="form-group">
                                       <input type="text" class="form-control" name="editlink_link" id="editlink_link" placeholder="Url of work" value="'. $s['links_url'] .'" required />
                                    </div> 
                                
								 <button type="submit" name="editlink_button" id="editlink_button" class="btn btn-primary" >Submit</button>  
							 </form>
							</div>  
					   </div> ';
		
		echo $output;
		
	}
	
	if($_POST['method'] == "updatelink"){
		
		$lid = $_POST['lid'];
		$linkname = $_POST['linkname'];
		$linkurl = $_POST['linkurl'];
		
		$link->where("links_id",$lid);
		$sql2=$link->update("links",array("links_name"=>$linkname,"links_url"=>$linkurl));
		if($sql2){
			echo "success";
		}
		else{
			echo "fail";
		}
	}
	
	if($_POST['method'] == "profileupdate"){
		$uid = $_SESSION["user_id"];
		$s = $link->rawQueryOne("select * from user where user_id = ?",array($uid));
		
		if($s['user_image'] != NULL || $s['user_image'] != ""){
				if($s['user_image'] == "images/default_user_profile.png"){ 

				}else{
					unlink($s['user_image']);
				}
		}

		$img = $_FILES['imgupload']['name'];
		$ext = pathinfo($img,PATHINFO_EXTENSION);
		$image = "user_profile_".$uid.".".$ext;
			
		if(move_uploaded_file($_FILES['imgupload']['tmp_name'],"uploads/".$image))
		{
			$link->where("user_id",$uid);
			$sql2=$link->update("user",array('user_image'=>"uploads/".$image));
			echo "uploads/".$image;
		}
		else{
			echo "fail";
		}
		
	
	}

	if($_POST['method'] == "nameupdate"){

		$uid = $_SESSION["user_id"];
		$uname = $_POST['uname'];

		$link->where("user_id",$uid);
		$sql2=$link->update("user",array('name'=>$uname));
		if($sql2){
			echo "success";
		}
		else{
			echo "fail";
		}
	}
}
?>