<?php 
	session_start();
	//connect to database
	/*$servername = "localhost";
	$username = "username";
	$password = "password";
	$conn = new mysqli($servername, $username, $password);*/
	$conn = mysqli_connect("localhost","root","","authentication")  
	or die ("Error:".mysqli_error().":".mysqli_error());
	mysqli_select_db($conn, "authentication");
	
	if (isset($_POST['register_btn'])){
		session_start();
		$username = mysql_real_escape_string($_POST['username']);
		$email = mysql_real_escape_string($_POST['email']);
		$password = mysql_real_escape_string($_POST['password']);
		$password2 = mysql_real_escape_string($_POST['password2']);
		
		if ($password == $password2){
			//create user
		$password = md5($password);//hash pass before storing
		$sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
		mysqli_query($conn,$sql);
		$_SESSION['message'] = "You are now logged in !";
		$_SESSION['username'] = $username;
		header("location: home.php"); //redirect to home page
	} else {
		$_SESSION['message'] = "The two passwords do not match !";
	}
}
?>
		
<!DOCTYPE html>
<html>
<head>
	<title>Register, login & logout user</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="header">
	<h1>Register, login & logout user</h1>
</div>

<form method="post" action="register.php">

	<table>
		<tr>
			<td>Username: </td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td>E-mail: </td>
			<td><input type="email" name="email" class="textInput"></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
		<tr>
			<td>Re-enter password: </td>
			<td><input type="password" name="password2" class="textInput"></td>
		</tr>	</table>
		<center><input type="submit" name="register_btn" value="Register" class="button">
		

	</center>
</form>
</body>
</html>
