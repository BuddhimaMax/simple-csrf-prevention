<?php 
session_start();
if(array_key_exists('Login',$_POST)){
   if(isset($_POST['username'],$_POST['password'])){
   		$username=$_POST['username'];
   		$password=$_POST['password'];

   		if(!empty($username) && !empty($password)){
   			if(($username=="admin") && ($password=="password")){
   				echo "loged in.. you'll redirect to <b>add product</b> in 2 seconds.";
   				$_SESSION["sessionID"]=session_id();
   				$_SESSION['CSRF_token'] =  base64_encode(openssl_random_pseudo_bytes(32)); #CSRF token
   				header("refresh:2;url=addproduct.php");
				die();
   			}
   			else{
   				echo "Wrong username or password!";
   			}
   		}
   		else{
   			echo "Invalid user input";
   		}

   }


}
elseif (array_key_exists('logout',$_POST)) {
	unset($_SESSION["sessionID"]);
	unset($_SESSION["CSRF_token"]);
	session_regenerate_id();
	echo "loged out.. you'll redirect to <b>home page</b> in 2 seconds.";
	header("refresh:2;url=index.php");
	exit();
}
else{
	echo "form did not submited!";
}

?>