<?php
include('config.php');
include('common.php');

$saveBtn = (isset($_POST['regsub'])) ? realkillstring($_POST["regsub"], 25, '0', '0') : "null";
if ($saveBtn == 'Save') {
	// var_dump($_POST);
	if (isset($_POST['applicantname'])) {
		$applicantname = realkillstring($_POST['applicantname'], 30, '0', '0');
	}
	if (isset($_POST['username'])) {
		$username = realkillstring($_POST['username'], 30, '0', '0');
	}
	if (isset($_POST['password'])) {
		$password = realkillstring($_POST['password'], 30, '0', '0');
		$hash_password=password_hash($password,PASSWORD_DEFAULT);
	}
	$sql=mysqli_query($conn,"select * from user where username='".$username."'" );
	 $count=mysqli_num_rows($sql);
	 if($count==0){
		
      $ins=mysqli_query($conn,"insert into user (name,username,password,registered_time) values('".$applicantname ."','".$username."','".$hash_password."',now())");
	  if($ins){
		$msg= "Registration successful! Redirecting to login page...";
		header("Location: index.php"); // Redirect to your login page
		exit; 
	  }
	 }
	 else{
		$msg="Username already exists";
	 }
	// echo $hash_password;exit;
}


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Registration Form </title>
	<link rel="stylesheet" href="css/index.css" type="text/css">
	<script src="js/register.js" type="text/javascript"></script>

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
					<h3 class="register-title">Registration</h3>

					<form method="post" name="registerform" id="registerform">
						<input type="text" placeholder="Name" name="applicantname" maxlength="5" />
						<input type="text" placeholder="Username" name="username" />
						<input type="password" placeholder="passsowrd" name="password" />
						<input type="button" name="btnsubmit" value="Register" onclick="register()" />
						<input type="hidden" name="regsub">
					</form>
					<p>Login : <a href="index.php">Login</a>
				</div>
			</div>
		</section>
	</div>
	<footer>
		<p>Footer</p>
	</footer>
</body>

</html>