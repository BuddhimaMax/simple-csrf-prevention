<?php 
session_start();
$tempToken="NULL";
if(isset($_SESSION['CSRF_token'])){
   $tempToken=$_SESSION['CSRF_token'];
}


if(array_key_exists('addPro',$_POST)){
   if(isset($_POST['proId'])){
   		$proId=$_POST['proId'];
         $csrfToken=$_POST['csrf'];

   		if(!empty($proId) && !empty($csrfToken)){
   			if($csrfToken==$tempToken){
   				echo "product <b>".$proId."</b> added successfuly";
   			}
   			else{
   				echo "Not added! Error while authenticating the user!";
   			}
   		}
   		else{
   			echo "Invalid user input";
   		}

   }


}
else{
	echo "form did not submited!";
}

?>