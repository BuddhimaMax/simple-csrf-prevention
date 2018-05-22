<?php
	// Start the session
	session_start();
	$cookie_name = "sessionID";
	$cookie_value = session_id();
	setcookie($cookie_name, $cookie_value, time() + (86400), "/"); # setting the session id as a cookie named token
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | CSRF Test</title>
	<!-- By Buddhima Ekanayake -->
</head>
<body>

<h3>Hello world! Welcome to the Cross-site Request Forgery protection simple example.</h3>
<p>Very simple web application with no styles at all.</p>
<p><i>username: admin | password: password</i></p>

<form method="post" action="login.php">
	Username: <input type="text" name="username" value="admin" required="required"> &nbsp;&nbsp; 
	Password: <input type="text" name="password" value="password" required="required">
    <input type="submit" name="Login" id="Login" value="Login" /><br/> 
</form>
<br><br><br>
<p></p>

<hr>

<?php
echo "Your session id is : ".session_id()."<br>";

if(!isset($_COOKIE[$cookie_name])) {
		 echo "Cookie named '" . $cookie_name . "' is not set!";
	} else {
		 echo "Value in cookie is: " . $_COOKIE[$cookie_name];
}
?>

</body>
</html>