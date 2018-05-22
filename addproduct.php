<?php 
session_start();

function Submit()
{
   echo "Your test function on button click is working<br><br>";
   session_unset();
}

if(array_key_exists('Submit',$_POST)){
   Submit();
}


if(!isset($_SESSION["sessionID"])) {
		 echo "Invalid! YOU HAVE TO LOGIN FIRST!";
		 header("location:index.php");
	} else {
		 echo "Cookie sessionID is set!<br>";
		 echo "Value is: " . $_COOKIE['sessionID'];
		 echo "<br>";
		 echo "Value of CSRF token is : ".$_SESSION['CSRF_token'];
		 echo "<hr>";
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home | CSRF Test</title>
	</head>
<body>
	<h3>Add products</h3>
	<p>This simple web page is to demo user to add products in to the system. Use below form to enter to the system. However these information will only be saved in browser memory. Not in server side.</p>
	<br>

<form method="post" action="added.php">
	Add Product ID: <input type="text" name="proId" value="" required="required">
	<input type="hidden" name="csrf" value="<?php echo $_SESSION['CSRF_token'] ?>">
    <input type="submit" name="addPro" id="addPro" value="Add product" /><br/> 
</form>

<br><hr>
<p>Click below button to logout.</p>
<form method="post" action="login.php">
    <input type="submit" name="logout" id="logout" value="LogOut" /><br/> 
</form>


</body>
</html>