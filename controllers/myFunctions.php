<?php 
function isEmpty($v){
	if($v==""){
		return 1;
	}else{
		return 0;
	}
}

function addAccount($email,$password,$lname,$fname){
	require "config.php";
	$sql = "Select * from accounts where username = '".$email."'";
	$res = mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)){
		
		return "Email Already In Use";
	}else{
		$sql  ="Insert into Accounts (username,password,isAdmin) values('".$email."','".$password."','FALSE')";
		$flag = mysqli_query($conn,$sql);
			if($flag){
				$sql="Insert into Customers(lname,fname,age,birthday,gender,email)values(
				'".$lname."',
				'".$fname."',
				'',
				'',
				'',
				'".$email."'
				)";
				$flag = mysqli_query($conn,$sql);
				if($flag){
					return 'Account Added!';
				}else{
					return 'Something Went Wrong ( Customers )';
				}

			}else{
				return "Something Went Wrong";	
			}
	}
}
function logIn($email,$password){
	require "config.php";
	$sql ="Select * from accounts where username ='".$email."' and password ='".$password."'";
	$res = mysqli_query($conn,$sql);
	if(!mysqli_num_rows($res)){
		$_SESSION['msg']='WRONG USERNAME/PASSWORD';
		return '4';
	}
	$data= mysqli_fetch_array($res);

		if($data['isAdmin']=="TRUE"){
			$_SESSION['user'] = "ADMIN";
			$_SESSION['admin'] = "TRUE";
			$_SESSION['username'] = $email;

			return 'ADMIN';	
		}
			if($res){
				$sql = "Select * from qryinformation where email='".$email."'";
				$res = mysqli_query($conn,$sql);
				$data= mysqli_fetch_array($res);
				$id = $data['acc_id'];
				$isAdmin = $data['isAdmin'];
				$username = $data['fname']." ".$data['fname'];
					if($isAdmin=="TRUE"){
						$_SESSION['username'] = $email;
						$_SESSION['user'] = "ADMIN";
						$_SESSION['admin'] = "TRUE";
						return 'ADMIN';
					}else{
						$_SESSION['username'] = $email;
						$_SESSION['user'] = $username;
						$_SESSION['admin'] = "FALSE";
						$_SESSION['myID'] = $id;
						return 'PATIENT';
					}
			}else{
				$_SESSION['msg']='WRONG USERNAME/PASSWORD';
				return '4';
			}
}
function checkIfLoggedIn(){
	return $_SESSION['user'];
}
function logOut(){
	session_destroy();
}
function changePassword($username,$password){
	require "config.php";

	$sql ="update  accounts set password ='".$password."' where username ='".$email."' " ;
	$res = mysqli_query($conn,$sql);
	if($res){
		$msg=array('MSG'=>'ACCOUNT UPDATED');
		$x = 1;	
	}else{
		$msg=array('MSG'=>'SOMETHING WENT WRONG');
		$x = 0;
	}
	return $x;
}
?>