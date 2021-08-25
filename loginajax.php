<?php 
session_start();
include 'connection.php';
if(isset($_POST['do_login']))
{
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$s = $link->rawQuery("select * from user where email = ? or username = ?",array($email,$email));
	if($link->count > 0)
	{
		$p = $link->rawQueryOne("select * from user where password = ? and (email = ? or username = ?)",array($pass,$email,$email));
		if($p)
		{			
			$_SESSION["username"] = $p["username"];
            $_SESSION["user_id"]=$p["user_id"];
			echo "success";		
		}
		else
		{
			echo "fail";
		}
	}
	exit();
}

if(isset($_POST['check_username']))
{
	$user = $_POST['username'];
	
	$s = $link->rawQuery("select * from user where username = ?",array($user));
	if($s){
		echo "exist";
	}
	else{
		echo "not-exist";
	}
	exit();
}

if(isset($_POST['check_email']))
{
	$email = $_POST['email'];
	
	$s = $link->rawQuery("select * from user where email = ?",array($email));
	if($s){
		echo "exist";
	}
	else{
		echo "not-exist";
	}
	exit();
}

if(isset($_POST['register']))
{
	$username = $_POST['username'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$pass = $_POST['password'];
	
	$reg = $link->insert("user",array("username"=>$username,"name"=>$name,"email"=>$email,"phone"=>$phone,"password"=>$pass,"is_active"=>1,"is_trail"=>1));
	if($reg){
		$_SESSION["username"] = $username;
        $_SESSION["user_id"]=$reg;
		echo "success";
	}
	else{
		echo "fail";
	}
	exit();
}
?>