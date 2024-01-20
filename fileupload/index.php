<?php 
session_start();
include('config.php');
include('common.php');
 $saveBtn = (isset($_POST['loginsub'])) ? realkillstring($_POST["loginsub"], 25, '0', '0') : "null";
if($saveBtn=='login'){
	if (isset($_POST['username'])) {
		$username = realkillstring($_POST['username'], 30, '0', '0');
	}
	if (isset($_POST['password'])) {
		$logpassword = realkillstring($_POST['password'], 30, '0', '0');	
	}
	$sql=mysqli_query($conn,"select * from user where username='".$username."'" );
	 $count=mysqli_num_rows($sql);
	 if($count==0){
		$msg="User does not exists.Please Check that correct username is entered";
	 }
	 else{
		$row = $sql->fetch_assoc();
		 $hashed_password=$row['password'];
		 if (password_verify($logpassword, $hashed_password)) {
			// Password is correct
			$_SESSION['username']=$username;
			$_SESSION['password']=$logpassword;
			header("Location: fileupload.php"); // Redirect to your login page
		exit; 
		} else {
			// Password is incorrect
			$msg= "Password is incorrect!";
		}
	 }
}
?>
<!DOCTYPE html>
<html>
 <head>
    <meta charset="utf-8">
    <title>Login Form</title> 
	 <link rel="stylesheet" href="css/index.css" type="text/css">
	 <script src="js/index.js"></script>
 </head>
 <body>
	<h1>Secure File Upload System Development</h1>
	<div class="content">
	<section>
		<div class="register-wrapper">
		<div class="register-block">
		<?php if(@$msg!=''){
			?>
			<span class="required"><?php echo $msg; ?></span>
			<?php
		}?>
		<h3 class="register-title">Login</h3>
			
			<form method="post" name="loginform">
			<input type="text" name="username" placeholder="Enter your username"/>
			<input type="password" name= "password" placeholder="Enter your password" />
			<input type="button" value="Login" onclick="login()"/>
			<input type="hidden" name="loginsub" />
			</form>
            <p>New Registration : <a href="register.php">Sign Up</a>
		</div>
		</div>
	</section>
</div>
	<footer>
		<p>Footer</p>
	</footer>
</body>
</html>
