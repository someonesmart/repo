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
	
	if (isset($_POST['login_btn'])){
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$password = md5($password);//hash pass before storing
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$result = mysqli_query($conn,$sql);
		
		if (mysqli_num_rows($result) == 1){
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			header("location: home.php"); //redirect to home page
		} else {
			$_SESSION['message'] = "Username/password combination incorrect !";
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
<?php 
		if (isset($_SESSION['message'])){
			echo  "<div id='error_msg'>".$_SESSION['message']."</div>";
			unset ($_SESSION['message']);
		}
		?>
<form method="post" action="login.php">

	<table>
		<tr>
			<td>Username: </td>
			<td><input type="text" name="username" class="textInput"></td>
		</tr>
		<tr>
			<td>Password: </td>
			<td><input type="password" name="password" class="textInput"></td>
		</tr>
		</table>
		<center><input type="submit" name="login_btn" value="Login" class="button">
		

	</center>
</form>
</body>
</html>
